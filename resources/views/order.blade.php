@extends('master')
@section('content')

    <main>
        <section class="mt-5 py-3">
        </section>
        <div class="container col-md-5">
            <div class="mt-3 pb-3 mb-4 border-bottom">
                <h6>مرحباً بك</h6>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pt-md-0 pt-2">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-dark">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cart.index') }}" class="text-decoration-none text-dark">سلة المشتريات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">انهاء الطلب</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex align-items-center container mb-3">
                <i class="fas fa-circle fa-fw text-dark fa-xl opacity-75"></i>
                <img src="{{asset('assets/image/icons/delevary.svg')}}" class="mx-3" alt="">
                <span>الشحن</span>
                <hr class="mx-2 w-100">
            </div>
            <div class="container mb-5">
                <div class="container">
                    <!--  ****************************form*****************************S -->
                    <form action="{{ route('create-order') }}" method="POST" data-gtm-form-interact-id="0">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" autocomplete="off" name="full_name" id="floatingInput" required="" placeholder="الاسم كامل">
                            <label for="cardname text-secondary">
                                <i class="fas fa-user fa-fw text-secondary mx-2"></i>
                                <span class="text-secondary">الأسم كامل</span>
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" name="phone" autocomplete="off" class="form-control" required="" placeholder="رقم الجوال">
                            <label for="cardNumber text-secondary">
                                <i class="fas fa-phone-flip fa-fw text-secondary mx-2"></i>
                                <span class="text-secondary">رقم الجوال</span>
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="area" autocomplete="off" class="form-control" required="" placeholder="العنوان بالتفصيل">
                            <label for="cardNumber text-secondary">
                                <i class="fas fa-location-dot fa-fw text-secondary mx-2"></i>
                                <span class="text-secondary">المنطقة</span>
                            </label>
                            <input type="hidden" name="total_price" autocomplete="off" value="{{$total}}" id="total_price">
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="street" autocomplete="off" class="form-control" required="" placeholder="العنوان بالتفصيل">
                            <label for="cardNumber text-secondary">
                                <i class="fas fa-map-pin fa-fw text-secondary mx-2"></i>
                                <span class="text-secondary">الشارع</span>
                            </label>
                            <input type="hidden" name="total_price" autocomplete="off" value="{{$total}}" id="total_price">
                        </div>
                        <div class="mb-3 d-none">
                            <label class="mb-3 mx-1">طريقة الدفع</label>
                            <div class="row px-3">
                                <div class="form-check col-4">
                                    <input class="form-check-input mt-3" type="radio" value="visa" checked="" name="paymentWay" id="flexRadioDefault1">
                                    <label class="form-check-label w-100 border text-center rounded py-1" for="flexRadioDefault1">
                                        <img src="{{asset('assets/image/icons/mada.webp')}}" width="45" height="45" class="mx-1" alt="">
                                    </label>
                                </div>
                                <div class="form-check col-4">
                                    <input class="form-check-input mt-3" type="radio" value="visa" name="paymentWay" id="flexRadioDefault3">
                                    <label class="form-check-label w-100 border text-center rounded py-1" for="flexRadioDefault3">
                                        <img src="{{asset('assets/image/icons/visa.png')}}" width="" height="45" class="mx-1" alt="">
                                    </label>
                                </div>
                                <div class="form-check col-4">
                                    <input class="form-check-input mt-3" type="radio" value="direct" name="paymentWay" id="flexRadioDefault2">
                                    <label class="form-check-label w-100 border text-center rounded py-2" for="flexRadioDefault2">
                                        <img src="{{asset('assets/image/icons/trans.png')}}" width="35" class="mx-1" alt="">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="container mb-3 form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_installment" id="taqseet" data-gtm-form-interact-field-id="0">
                                <label class="form-check-label" for="taqseet">هل تريد تقسيط الجهاز دفعة مقدمة {<span class="text-danger">1000 ر.س</span>}</label>
                            </div>
                        </div>
                        <div id="taqsetBox" class="d-none">
                            <h4 class="mb-3 text-center">اختار مدة التقسيط ليتم الإحتساب</h4>
                            <div class="">
                                <label class="text-secondary mb-2 mx-1">الدفعة المقدمة</label>
                                <div class="form-floating mb-3">
                                    <input type="hidden" name="total_price" autocomplete="off" value="{{$total}}" id="total_price">
                                    <select class="form-select form-select-lg mb-3 rounded py-3" id="payment" name="payment" aria-label=".form-select-lg example" style="font-size: 17px;" maxlength="4">
                                        <option value="2200" selected="" disabled="">اختر الدفعة الاولى</option>
                                        <option value="500" selected="">500 ر.س</option>
                                        <option value="1000">1000 ر.س</option>
                                        <option value="1500">1500 ر.س</option>
                                        <option value="2000">2000 ر.س</option>
                                    </select>
                                </div>
                            </div>

                            <div class="">
                                <label class="text-secondary mb-2 mx-1">مدة الأقساط</label>
                                <div class="mb-3">
                                    <select class="form-select form-select-lg mb-3 rounded py-3" id="monthes" name="first_batch" aria-label=".form-select-lg example" style="font-size: 17px;">
                                        <option value="1" selected="" disabled="">اختر مدة الاقساط</option>
                                        <option value="3">3 اشهر</option>
                                        <option value="6">6 اشهر</option>
                                        <option value="12">12 شهر</option>
                                        <option value="24">24 شهر</option>
                                    </select>
                                </div>
                            </div>
                            <div class="">
                                <label class="text-secondary mb-2 mx-1">القسط الشهري</label>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded" autocomplete="off" name="floatingInput" value="" id="floatingInput" disabled="" placeholder="">
                                    <label for="floatingInput" id="qest">SAR Infinity</label>
                                    <input type="hidden" name="monthly_installment" value="" id="monthly_installment">
                                </div>
                            </div>
                        </div>
                        <div class="form-check mx-3 mb-3">
                            <input class="form-check-input" type="checkbox" required="" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                اقر بأني راغب في استلام الطلب و موافق على سياسة الضمان والأسترجاع والتوصيل
                            </label>
                        </div>

                        <div class="container text-secondary mb-4">

                            <p style="font-size: 14px;">تسوق إلكتروني آمن 100%
                                <i class="fab fa-cc-amazon-pay fa-fw mx-1"></i>
                                <i class="fab fa-cc-apple-pay fa-fw"></i>
                                <i class="fas fa-shield fa-fw mx-1"></i>
                            </p>
                        </div>
                        <div class="">
                            <button type="submit" name="confirm" class="btn btn-dark w-100">
                                <span>إكمال الطلب</span>
                                <i class="fa-solid fa-angle-left fa-fade fa-fw"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>




@endsection
