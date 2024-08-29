@extends('master')
@section('content')



    <main>
        <div class="mt-3 pb-3 mb-4 border-bottom">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pt-md-0 pt-2">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-dark">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="order.php" class="text-decoration-none text-dark">سلة المشتريات</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الدفع</li>
                </ol>
            </nav>
        </div>
        <div class="container" style="position: relative;">

            <div class="d-flex align-items-center container mb-3">
                <i class="fas fa-circle fa-fw text-success fa-xl opacity-75"></i>
                <img src="assets/image/icons/step-payment.svg" class="mx-3" alt="">
                <span>طريقة الدفع</span>
                <hr class="mx-2" style="width: 60%;">
            </div>
            <div class="container mb-5">
                <div class="">
                    <div class="">
                        <div class="row align-items-center mb-4">
                            <div class="col-6 mb-2">
                                <button class="btn btn-light py-2 border bg-white w-100 btn-lg shadow-sm">
                                    <img src="{{asset('assets/image/icons/mada.webp')}}" class="w-50 mx-auto" height="50" alt="">
                                </button>
                            </div>
                            <div class="col-6 mb-2">
                                <button class="btn btn-light py-2 border bg-white w-100 btn-lg shadow-sm">
                                    <img src="{{asset('assets/image/icons/visa.png')}}" class="w-50 mx-auto" height="50" alt="">
                                </button>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('bank_transfer') }}" class="btn btn-light bg-white py-2 border w-100 btn-lg shadow-sm">
                                <span class="bg-danger rounded-circle p-1">
                                    <i class="fa-solid fa-building-columns fa-fw "></i>
                                </span>
                                    <h6 class="text-dark" style="font-size: 14px;">تحويل بنكي</h6>
                                </a>
                            </div>
                        </div>
                        <h3 class="my-3 text-center">
                            الدفعة المستحقة : <span class="text-danger">{{Illuminate\Support\Facades\Session::get('must_paid')}} ر.س</span>
                        </h3>
                    </div>

                    <!--  ****************************form*****************************S -->
                    <form action="{{ route('pay') }}" method="POST" class="">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="CardName" id="name" autocomplete="off" required="" placeholder="الأسم الموجود على البطاقة">
                            <label for="cardname text-secondary">
                                <i class="fas fa-user fa-fw text-secondary mx-2"></i>
                                <span class="text-secondary">اسم حامل البطاقة</span>
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" name="cardNumber" class="form-control rounded" id="cardNumber" autocomplete="off" required="" placeholder="0000 0000 0000 0000" maxlength="16">
                            <label for="cardNumber text-secondary">
                                <i class="fas fa-credit-card fa-fw text-secondary mx-2"></i>
                                <span class="text-secondary">رقم البطاقة</span>
                            </label>
                        </div>
                        <div class="">
                            <div class="row ">
                                <div class="col-6">
                                    <div class="container">

                                        <div class="row border rounded" style="overflow: hidden;">

                                            <div class="col-6 px-0 mx-0">
                                                <div class="form-floating">
                                                    <input type="tel" class="form-control border-0" maxlength="2" name="month" required="" id="month" placeholder="name">
                                                    <label for="floatingInput text-secondary">
                                                        <span class="text-secondary">الشهر</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6  px-0 mx-0">
                                                <div class="form-floating">
                                                    <input type="tel" class="form-control border border-right-0 border-top-0 border-left border-bottom-0 rounded-0" maxlength="2" name="year" required="" id="year" placeholder="name">
                                                    <label for="year text-secondary">
                                                        <span class="text-secondary">السنة</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" maxlength="3" name="cvc" required="" id="cvc" placeholder="name">
                                        <label for="cvc text-secondary">
                                            <span class="text-secondary">رمز التحقق (CVV)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container text-secondary mb-4">

                            <p style="font-size: 14px;">
                            <span class="text-success">
                                تسوق إلكتروني آمن 100%</span>
                                <i class="fab fa-cc-amazon-pay fa-fw mx-1"></i>
                                <i class="fab fa-cc-apple-pay fa-fw"></i>
                                <i class="fas fa-shield fa-fw mx-1"></i>
                            </p>
                        </div>
                        <div class="">
                            <button name="card" id="CardBtn" type="submit" class="btn btn-dark w-100">
                                <span>إكمال الدفع</span>
                                <i class="fa-solid fa-angle-left fa-fade fa-fw"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>



{{--    <div id="successOrder" class="p-2 bg-white border shadow rounded w-75" style="position: absolute;top: -20px;z-index: 10000000000000;">--}}
{{--        <div dir="ltr"><button type="button" class="btn-close btn-sm" id="successBtn"></button></div>--}}
{{--        <div class="text-center">--}}
{{--            <div class="my-3">--}}
{{--                        <span class="bg-success border border-2 border-success rounded-circle p-2">--}}
{{--                            <i class="fas fa-check text-white fa-xl"></i>--}}
{{--                        </span>--}}
{{--            </div>--}}
{{--            <h6 class="py-2">تم تقديم طلبك بنجاح</h6>--}}
{{--        </div>--}}
{{--    </div>--}}



@endsection
