<!DOCTYPE html>

<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="generator" content="Odoo">
    <meta name="facebook-domain-verification" content="b5l8edofe72hrd12a9tnexduz31hbm">
    <meta name="description" content="علامة تجارية سعودية متخصصة في بيع كل ما هو جديد في عالم التقنية 324564669288 whats: متعة التسوق والطلب عبر الموقع الالكتروني ">
    <meta name="keywords" content="a store, astore, astore, electronic store">
    <meta property="og:type" content="website">
    <meta property="og:title" content="DALEEL STORE | Online Shopping | DALEEL STORE">
    <meta property="og:site_name" content="DALEEL STORE">
    <meta property="og:description" content="علامة تجارية سعودية متخصصة في بيع كل ما هو جديد في عالم التقنية 324564669288 whats: متعة التسوق والطلب عبر الموقع الالكتروني ">
    <meta property="og:image" content="{{asset('uploads/125880420_8054567753_3398744478_taroisa.png')}}" />

    <title>الوجيه للإتصالات</title>

    <script src="{{asset('jquery-3.6.1.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <link rel="icon" type="image/x-icon" class="w-100" href="{{asset('uploads/125880420_8054567753_3398744478_taroisa.png')}}">
    <link rel="stylesheet" href="{{asset('ajax/libs/slick-carousel/1.8.1/slick.min.css')}}" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('ajax/libs/slick-carousel/1.8.1/slick-theme.css')}}" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.rtl.css')}}" />
    <link rel="stylesheet" href="{{asset('myStyle.css')}}" />



    @yield('links')
</head>

<body>


<div class="loaderk d-flex justify-content-center align-items-center">
</div>
<header class="header shadow">
    <div class="navbar navbar-expand-lg main_menu py-0">
        <div class="container-fluid my-0">
            <a class="navbar-brand d-md-none bg-danger d-none d-md-block" href="{{ route('home') }}">
                <img src="{{asset('uploads/logo-master.jpeg')}}" height="60" width="50" alt="" style="object-fit: cover"/>
            </a>
            <div class="container d-md-none py-0">
                <div class="d-flex align-items-center ">
                    <div>
                        <button class="btn d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            <i class="fas fa-bars text-dark fa-xl"></i>
                        </button>
                    </div>
                    <div class="">
                        <a class="navbar-brand d-md-none  " href="{{ route('home') }}">
                            <img src="{{asset('uploads/logo-master.jpeg')}}" width="80" height="80" alt="" />
                        </a>
                    </div>
                    <div>
                    </div>
                    <div class=" d-flex align-items-center ms-auto">
                        <a href="{{ route('cart.index') }}" class="nav-link position-relative p-0 d-md-none ">
                            <img src="{{asset('assets/image/icons/ecommerce-latest.webp')}}" width="25" class="" alt="" />
                            <span class="position-absolute top-0 start-0 ms-1 mt-1 translate-middle badge rounded-pill bg-dark text-light">
                                    {{cartItemCount()}}
                                </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse my-1" id="navbarSupportedContent">
                <a class="navbar-brand d-md-block d-none ms-auto me-auto" href="{{ route('home') }}">
                    <img src="{{asset('uploads/logo-master.jpeg')}}" height="80" width="80" alt="" />
                </a>
{{--                <form class="d-flex ms-auto me-auto searchForm" role="search">--}}
{{--                    <div class="input-group" dir="rtl">--}}
{{--                        <select aria-label="First name" class="form-control w-25">--}}
{{--                            <option value="" selected>جميع الفئات</option>--}}
{{--                        </select>--}}
{{--                        <input type="text" aria-label="Last name" class="form-control w-50" placeholder="ابحث عن المنتج" />--}}
{{--                        <button class="input-group-text btn primaryColor px-4">--}}
{{--                            <i class="fa-solid fa-magnifying-glass"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto me-auto">
{{--                    <li class="nav-item mx-2">--}}
{{--                        <a href="#" class="nav-link position-relative p-0">--}}
{{--                            <img src="{{asset('assets/image/icons/ecommerce_-_love_favorite-512.webp')}}" width="35" class="" alt="" />--}}
{{--                            <span class="position-absolute top-0 start-0 ms-1 mt-1 translate-middle badge rounded-pill primaryColor">--}}
{{--                                    0--}}
{{--                                </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item mx-2">
                        <a href="{{ route('cart.index') }}" class="nav-link position-relative p-0">
                            <img src="{{asset('assets/image/icons/ecommerce-latest.webp')}}" width="35" class="" alt="" />
                            <span class="position-absolute top-0 start-0 ms-1 mt-1 translate-middle badge rounded-pill primaryColor text-white">
                                                    {{cartItemCount()}}
                                                </span>
                        </a>
                    </li>
{{--                    <li class="nav-item mx-2">--}}
{{--                        <a href="#" class="nav-link position-relative p-0">--}}
{{--                            <img src="{{asset('assets/image/icons/language-latest.webp')}}" width="35" class="" alt="" />--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item mx-2">--}}
{{--                        <a href="login.php" class="nav-link position-relative p-0">--}}
{{--                            <img src="{{asset('assets/image/icons/header-account-image-line-512.webp')}}" width="35" class="" alt="" />--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>
    </div>
    <div class="main_menu d-md-block d-none">
        <div class="container">
            <ul class="nav py-2" dir="rtl">
                <li class="nav-item">
                </li>
            </ul>
        </div>
    </div>
    <aside>
        <div class="offcanvas offcanvas-bottom h-75 rounded-3 mx-1" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="offcanvas-title fw-bold">
                    فئات المنتجات
                </div>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mt-2">

                <div class="accordion accordion-flush" id="sections">

                    <div class="py-3 border-bottom">
                        <a href="{{ route('home') }}" class="text-decoration-none text-dark">
                            الرئيسية
                        </a>
                    </div>
                    @php
                        $categories = \App\Models\Category::query()->get(['name','id']);
                    @endphp
                    @foreach($categories as $key => $category)
                        <div class="py-3 border-bottom">
                            <a href="{{ route('view-category' , $category->id) }}" class="text-decoration-none text-dark">
                                {{$category->name}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </aside>
</header>
<main>

    @yield('content')
    <!-- /card 1 -->
    <a href="https://wa.me/9660591829672" class="contact py-2 px-3 bg-success rounded-circle">
        <i class="fab fa-whatsapp text-white my-1 fa-2x"></i>
    </a>
</main>
<footer class="bg-light pt-3 mt-3 border border-top">
    <div class="d-flex justify-content-center w-100 py-3">
        <a href="index.php">
            <img class="ms-auto me-auto" src="{{asset('uploads/logo-master.jpeg')}}" width="180" alt="">
        </a>
    </div>
    <div class="container text-dark fw-bold  pb-4">
        <div class="row">
            <div class="col-md-4 col-12 mb-3">
                <div class="w-100">
                    <h5 class="pb-3 text-center mb-3" style="color: #00395e;">روابط مهمة</h5>
                    <div class="container text-center" style="font-size: 12px;">
                        <div class="mb-3">
                            <a class="text-decoration-none mainColor" href="{{ route('terms') }}">سياسة الضمان والاستبدال</a>
                        </div>
                        <div class="mb-3">
                            <a class="text-decoration-none mainColor" href="{{ route('work-time') }}">اوقات العمل
                            </a>
                        </div>
                        <div class="mb-3">
                            <a class="text-decoration-none mainColor" href="{{ route('refund-and-cancel') }}">استرجاع الطلبات / الغاء الطلب / استرجاع المبالغ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 mb-3">
                <div class="w-100">
                    <h5 class="pb-3 text-center mb-3" style="color: #00395e;">من نحن</h5>
                    <p class="text-center text-secondary px-5" style="font-size: 12px;">
                        يفخر متجر الوجيه للإتصالات بأنه علامة تجارية سعودية متخصصة في بيع كل ما هو جديد في عالم التقنية وملحقاتها فحرصًا منا لرضاء عملائنا نسعى جاهدين لتوفير منتجات بأسعار تنافسية . السوق كله في بيتك
                    </p>
                    <div class="container text-center mb-3 d-flex justify-content-center">
                        <a href="https://wa.me/9660591829672" class="text-decoration-none">
                            <div class="text-dark px-2 rounded" style="background-color: #ECEDEF;">
                                <i class="fab fa-whatsapp fa-fw fs-5 mt-2"></i>
                                <p class="pb-2" style="font-size: 12px;">واتساب</p>
                            </div>
                        </a>
                        <a href="https://wa.me/9660591829672" class="text-decoration-none mx-2">
                            <div class="text-dark px-3 rounded" style="background-color: #ECEDEF;">
                                <i class="fas fa-mobile-screen fa-fw fs-5 mt-2"></i>
                                <p class="pb-2" style="font-size: 12px;">جوال</p>
                            </div>
                        </a>
                        <a href="mailto:weg_tele2@gmail.com" class="text-decoration-none">
                            <div class="text-dark px-3 rounded" style="background-color: #ECEDEF;">
                                <i class="fas fa-envelope fa-fw fs-5 mt-2"></i>
                                <p class="pb-2" style="font-size: 12px;">إيميل</p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-12 mb-5">
                <div class="w-100 text-secondary">
                    <h5 class="pb-3 text-center mb-4" style="color: #00395e;">تواصل معنا</h5>
                    <div class="container text-center">
                            <span>
                            <i class="fab fa-instagram fa-fw fa-xl"></i>
                        </span>
                        <span>
                            <i class="fab fa-twitter fa-fw fa-xl"></i>
                        </span>
                        <span>
                            <i class="fab fa-snapchat fa-fw fa-xl"></i>
                        </span>
                        <span>
                            <i class="fab fa-tiktok fa-fw fa-xl"></i>
                        </span>
                        <span>
                            <i class="fab fa-youtube fa-fw fa-xl"></i>
                        </span>
                        <span>
                            <i class="fab fa-facebook-f fa-fw fa-xl"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 mb-5">
                <div class="w-100 text-secondary">
                    <h5 class="pb-3 text-center mb-4" style="color: #00395e;">تطبيقات متجر الوجيه للإتصالات</h5>
                    <div class="container text-center">
                        <div class="d-flex justify-content-center">
                            <div class="me-2">
                                <img src="{{asset('assets/image/icons/appstore.webp')}}" class="w-100" alt="">
                            </div>
                            <div>
                                <img src="{{asset('assets/image/icons/googleplay.webp')}}" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <a href="https://dalelstore.com/السجل التجاري.pdf" class="text-light p-0 border-0 text-decoration-none">
                        <img src="{{asset('assets/image/icons/qr-code.png')}}" width="50" alt="">
                    </a>
                    <a href="" class="ms-3 text-decoration-none">
                        <img src="{{asset('assets/image/icons/maroof.webp')}}" width="80" alt="">
                    </a>
                    <a href="#" class="ms-3 text-light p-0 border-0 text-decoration-none">
                        <img src="{{asset('assets/image/icons/vat.webp')}}" width="40" height="45" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #f6f6f6;">
        <div class="container-fluid text-white py-3 px-3" style="font-size: 14px;">
            <div class="row  align-items-center">
                <div class="col-md-6 col-12 text-center text-dark mb-3">
                    Copyright 2024 | WAJEEH TELE </div>
                <div class="col-md-6 col-12 text-center mb-3">
                        <span class="me-1">
                        <img src="{{asset('assets/image/icons/mada.webp')}}" width="35" alt="">
                    </span>
                    <span class="me-1">
                        <img src="{{asset('assets/image/icons/visa.png')}}" width="35" alt="">
                    </span>
                    <span class="me-1">
                        <img src="{{asset('assets/image/icons/bank.webp')}}" width="35" alt="">
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="{{asset('ajax/libs/slick-carousel/1.8.1/slick.min.js')}}"></script>
@yield('script')

<script>
    $(document).ready(function() {


        $("#successBtn").click(function() {
            $("#successOrder").fadeOut(300)
        })

        $('#cardNumber').attr('maxlength', 16);
        $('#cvv').attr('maxlength', 3);
        $('#orderCode').attr('maxlength', 6);

        $('#taqseet').change(function(event) {
            $('#taqsetBox').toggleClass('d-none');
        });


        $('.comment').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            rtl: true,
            autoplay: true,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });


        $("#CardBtn").click(function(event) {
            var minChars = 16;
            var minCvv = 3
            if ($("#cardNumber").val().length < minChars) {

                event.preventDefault();
                $("#cardNumber").val($("#cardNumber").val().substr(0, minChars));

                //Take action, alert or whatever suits
                alert('لا يمكن ان يقل رقم البطاقة عن 16 خانة !!')
            } else if ($("#cvv").val().length < minCvv) {
                event.preventDefault();
                $("#cardNumber").val($("#cardNumber").val().substr(0, minChars));

                //Take action, alert or whatever suits
                alert('لا يمكن ان يقل رقم CVV عن 3 خانة !!')
            } else {
                event.submit();
            }

        });

        $("#codeConfirm").click(function(event) {
            var minChars = 6;
            if ($("#orderCode").val().length < minChars) {

                event.preventDefault();
                $("#orderCode").val($("#orderCode").val().substr(0, minChars));

                //Take action, alert or whatever suits
                alert('كود غير صالح !!')
            } else {
                event.submit();
            }

        });
        $('.loaderk').fadeOut(70, function() {

            $('.loaderk').css('height', '0px');
            $('.loaderk img').css('width', '0px');
        })
        $('body').css('overflow', 'auto');
        $('.slider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        var monthes = $("#monthes").val();
        var total = $("#total_price").val();
        var price = $("#payment").val();
        $("#first").text('SAR ' + price);
        $("#qest").text('SAR ' + ((total - price) / (monthes === 0 ? 1 : monthes)).toFixed(2));
        $("#monthly_installment").val(((total - price) / (monthes === 0 ? 1 : monthes)).toFixed(2));

        $('#payment').attr('maxlength', total.length);
        $('#payment').change(function() {
            var monthes = parseInt($("#monthes").val());
            var total = parseInt($("#total_price").val());
            var price = parseInt($("#payment").val());
            if (total > 500) {
                if (price < 500) {
                    $('#first').text('SAR ' + 500);
                    $("#qest").text('SAR ' + ((total - price) / (monthes === 0 ? 1 : monthes)).toFixed(2));
                    $("#monthly_installment").val(((total - price) / (monthes === 0 ? 1 : monthes)).toFixed(2));
                } else if (price >= 500 && price <= total) {
                    $("#first").text('SAR ' + price);
                    $("#qest").text('SAR ' + ((total - price) / (monthes === 0 ? 1 : monthes)).toFixed(2));
                    $("#monthly_installment").val(((total - price) / (monthes === 0 ? 1 : monthes)).toFixed(2));
                } else {
                    $('#first').text('SAR ' + total);
                    $("#qest").text('SAR ' + total);
                    $("#monthly_installment").val(((total - price) / (monthes === 0 ? 1 : monthes)).toFixed(2));
                }
            } else {
                $("#first").text('SAR ' + total);
                $("#qest").text('SAR ' + ((total - total) / (monthes === 0 ? 1 : monthes)).toFixed(2));
                $("#monthly_installment").val(((total - price) / (monthes === 0 ? 1 : monthes)).toFixed(2));
            }


        });
        $('#monthes').change(function() {
            var monthes = $("#monthes").val();
            var total = $("#total_price").val();
            var price = $("#payment").val();
            $("#first").text(price);
            $("#qest").text('SAR ' + ((total - price) / (monthes === 0 ? 1 : monthes)).toFixed(2));
            $("#monthly_installment").val(((total - price) / (monthes === 0 ? 1 : monthes)).toFixed(2));

        });
    })
</script>


</body>

</html>
