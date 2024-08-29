<html lang="ar" dir="rtl"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> طباعة الفاتورة </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function pafD(){
            let filePDF = this.document.getElementById('main');
            html2pdf().from(filePDF).save();
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Tajawal', sans-serif;
            font-size: 10px;
        }
        :root
        {
            --main-color:#643543
        }
        body
        {
            padding: 20px;
            --main-color:#000
        }
        .page_invoce
        {
            /* width: 550px; */
            margin: 0 auto;
            height: auto;
            background-color: #fff;
            padding: 10px 20px;
        }
        .Heading_info img
        {
            width: 50px;
        }
        .flex
        {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .center
        {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .NameSite  , .Date
        {
            color: var(--main-color);
            font-weight: bold;
            font-size: 15px;
        }
        .info_customer
        {
            margin-top: 20px;
            border: 1px solid #989898;
            padding: 15px 10px;
            border-radius: 10px;
        }
        .info_customer span  , .text_info_table span
        {

            color:#777;
            font-weight: bold;
        }
        .info_customer div  , .text_info_table div
        {
            color: var(--main-color);
            font-weight: bold;

        }
        .table table
        {
            margin-top: 15px;
            border-collapse: collapse;
            width: 100%;
        }
        .table table thead tr
        {
            background-color: var(--main-color);
            color: #fff;
        }
        .table table thead tr th
        {
            padding: 7px;
        }

        .table table thead tr th
        {
            background-color: #1fa2d8;
            color: #fff;
            height: 25px;
            padding: 0 5px;
        }
        tbody tr
        {
            background-color: #e3e3e3;
            color: var(--main-color);
            font-size: 17px;
            border-top: 1px solid #fff;
        }
        tbody tr td
        {
            padding: 7px;
            text-align: center;
        }
        tbody tr:nth-child(even)
        {
            background-color: #f2f2f2;
        }

        footer
        {
            padding: 10px;
            background-color: var(--main-color) !important;
            margin-top: 10px;
        }

        footer div
        {
            color: #fff;
        }
    </style>
</head>
<body>
<!-- <pre></pre> -->
<!-- <button onclick="pafD()" style="width: 100px; height: 40px; background-color: #00a8ff; border: 1px solid; color: #ffffff; font-size: 15px;">تحميل</button> -->
<div id="main" style="padding: 5px;">
    <div class="page_invoce" style="border: 1px solid #000;border-radius: 10px;padding: 30px;">
        <div class="Heading_info flex">
            <div class="Logo center"><span class="NameSite"> الوجيه للإتصالات </span> </div>
            <div class="Logo center"><img src="{{asset('uploads/logo-master.jpeg')}}" alt="LOGO"></div>
            <div class="Logo center"><span class="NameSite">ALWAJEEH TELE</span> </div>
        </div>
        <div class="info_customer flex" style="align-items: flex-start;">
            <div class="info_cus">
                <div style="color: #f00;"><span>رقم الفاتورة : </span> {{$order->number}}# </div>
                <div><span>اسم العميل : </span> {{$order->full_name}} </div>
                <div><span>رقم الهاتف : </span> {{$order->phone}} </div>
            </div>
            <div class="info_cus">
                <div style="text-align: right;"><span>التاريخ : </span> {{\Carbon\Carbon::create($order->created_at)->locale("ar_SA")->translatedFormat("d/m/Y")}}</div>
                <div style="text-align: right;"><span>العنوان : </span>  {{$order->area .' - '. $order->street}} </div>
            </div>
        </div>
        <hr style="margin-top: 10px;">
        <div class="table" style="margin-top: 10px;">
            <h4 style="text-align: center;">تفاصيل الطلب</h4>
            <div class="table_Res">
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>صورة المنتج</th>
                        <th>اسم المنتج </th>
                        <th>الكمية</th>
                        <th>السعر</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $key => $product)
                        <tr>
                            <td>
                                <span>{{$key+1}}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px ">
                                        <img src="{{asset('products-images/'.$product->image)}}" class="" alt="" style="width: 30px;height: 30px">
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="text-dark fw-bolder  mb-1 fs-6">{{$product->name}}</span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="text-dark fw-bolder  mb-1 fs-6">{{$product->pivot->count}}</span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="text-dark fw-bolder  mb-1 fs-6">{{$product->price}}</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @php
            $grandTotal = 0;
        @endphp

        @foreach ($order->products as $product)
            @php
                $price = $product->price;
                $count = $product->pivot->count;
                $total = $price * $count;
                $grandTotal += $total;
            @endphp

        @endforeach
        <div class="table" style="margin-top: 10px;">
            <div class="text_info_table flex" style="align-items: flex-start;">
                <div>
                    <div style="text-align: right;"><span>مدة الأقساط : </span> {{$order->is_installment ? $order->installments_period . ' ' . 'شهر' : 'نقدا'}} </div>
                    <div style="text-align: right; color: #f00"><span>المبلغ الكلي  : </span> {{$grandTotal}} ر.س </div>
                </div>
                <div>
                    <div style="text-align: right;"><span>الدفعة الأولى : </span> {{$order->is_installment ? $order->first_installment : $grandTotal}} ر.س</div>
                    <div style="text-align: right;"><span>الختم : </span> </div>
                </div>
            </div>
        </div>
        <div class="table" style="margin-top: 10px;">
            <div>
                <div style="text-align: left;"><img style="width: 60px;margin: -24px 35px;transform: rotate(-20deg);" src="{{asset('sign.png')}}"> </div>
            </div>
        </div>
{{--        <div class="table_Res" style="margin-top: 30px;">--}}
{{--            <table style="width: 100%;">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th style="background-color: #1fa2d8;color: #fff;height: 25px;padding: 0 5px;">#</th>--}}
{{--                    <th style="background-color: #1fa2d8;color: #fff;height: 25px;padding: 0 5px;">المبلغ</th>--}}
{{--                    <th style="background-color: #1fa2d8;color: #fff;height: 25px;padding: 0 5px;">تاريخ الاستحقاق</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                <tr><td>1</td>--}}
{{--                    <td></td>--}}
{{--                    <td> 2024/08/28 </td>--}}
{{--                </tr></tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
        <div class="info_customer flex" style="align-items: flex-start;">
            <div class="info_cus" style="border-left: 1px solid #919191;width: 50%;">
                <div><span>التوصيل من خلال شركة ارامكس خلال 24 ساعة من تاريخ الفاتورة</span></div>
            </div>
            <div class="info_cus" style="width: 50%;">
                <div style="text-align: left;"><span>Ihave recived the above devive in good<br>
                            condition with all collected accessories
                        </span></div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <footer class="flex">
        <div>
            <span>  966123456789 </span>
        </div>
        <div>
            <span>  wajeeh-tele@gmail.com </span>
        </div>
    </footer>
    <!-- <div> -->
</div>
<script>
    let  tbody   = document.querySelector(".Table_Tackset table tbody");
    let  ini     = document.getElementById("by").value;
    let firstpay = document.getElementById("firstpay").value;
    let toatl    = document.getElementById("toatl").value;
    let cur   = document.getElementById("cur").value;

    let Resultpay = parseFloat(toatl) - parseFloat(firstpay);
    let valFirstpay = Resultpay / ini;
    let numpay = 1;

    var Toatalpay = parseFloat(firstpay);

    var d = new Date();
    for(let x = 0 ; x <ini ; x++ )
    {
        Toatalpay+=valFirstpay;
        d.setMonth(d.getMonth() + 1);
        var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
        let temp = `<tr>  <td>الدفعة ${x + 1}</td> <td>${strDate}</td> <td>${valFirstpay.toFixed(2)}</td> <td class = "Toatl">${Toatalpay.toFixed(2)}</td> </tr>`;
        tbody.innerHTML += temp;

    }
</script>

</body></html>
