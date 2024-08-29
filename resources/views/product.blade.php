@extends('master')
@section('content')

    <section class="mt-5 py-3">
    </section>
    <section class="container">

        <nav aria-label="breadcrumb" style="margin-top: 20px;">
            <ol class="breadcrumb pt-md-0 pt-2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class=" text-dark">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('view-category',$product->category->id) }}"
                                               class=" text-dark">{{$product->category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
            </ol>
        </nav>
        <h5 class="text-start text-secondary d-md-none  container-fluid">{{$product->name}}</h5>
        <!-- details -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="slider-for border shadow rounded slick-initialized slick-slider">
                        <div class="slick-list draggable">
                            <div class="slick-track" style="opacity: 1; width: 326px;">
                                <div class="border slick-slide slick-current slick-active" data-slick-index="0"
                                     aria-hidden="false"
                                     style="width: 326px; position: relative; right: 0px; top: 0px; z-index: 999; opacity: 1;"
                                     tabindex="0">
                                    <img src="{{asset('products-images/'.$product->image)}}"
                                         class="itemImage ms-auto me-auto"
                                         alt="{{$product->name}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-nav mt-1 rounded slick-initialized slick-slider">
                        <div class="slick-list draggable" style="padding: 0px 50px;">
                            <div class="slick-track"
                                 style="opacity: 1; width: 0px; transform: translate3d(-262px, 0px, 0px);"></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 border rounded mt-md-0 mt-2 py-3">
                    <h5 class="d-md-block d-none">{{$product->name}}</h5>
                    <div class="row">
                        <div class="col-6">
                            <a href="" class="text-secondary">اضف تقييمك</a>
                        </div>
                        <div class="col-6">
                            <div class="text-end text-warning">
                                <i class="fas fa-star-half-stroke"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                        </div>
                        <div class="col-6">
                            <p class="text-secondary text-end">
                                <i class="fas fa-share-nodes fa-fw mx-1"></i>
                                مشاركة
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-5">السعر :</div>
                                <div class="col-7">
                                    {{$product->price}} ر.س
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-7 "></div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('cart.add' , $product->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="row align-items-center">
                                        <div class="col-5">الكمية :</div>
                                        <div class="col-7">
                                            <input type="hidden" name="product_id" value="{{$product->id}}" id="">
                                            <input type="number" value="1" class="text-center form-control w-100"
                                                   min="1" max="10" name="qnt" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-2">
                                    <button class="btn btn-outline-warning w-100">
                                        <i class="fas fa-heart "></i>
                                    </button>
                                </div>
                                <div class="col-10">
                                    <button type="submit" class="btn primaryColor w-100">أضف إلى
                                        السلة
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- navs -->
                <ul class="nav nav-tabs my-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-secondary" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="true">التقييم
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-secondary" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                aria-controls="home-tab-pane" aria-selected="false" tabindex="-1">الوصف
                        </button>
                    </li>
                </ul>
                <div class="tab-content border-bottom" id="myTabContent">
                    <div class="tab-pane fade " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                         tabindex="0">
                        <div class="pt-2 pb-4">{{$product->description}}</div>
                    </div>
                    <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel"
                         aria-labelledby="profile-tab" tabindex="0">

                        <div class="container p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="px-5 text-center text-secondary">
                                        <p class="fs-1">4</p>
                                        <p class="text-warning fs-3">
                                            <i class="fas fa-star-half-stroke fa-fw"></i>
                                            <i class="fas fa-star fa-fw"></i>
                                            <i class="fas fa-star fa-fw"></i>
                                            <i class="fas fa-star fa-fw"></i>
                                            <i class="fas fa-star fa-fw"></i>
                                        </p>
                                        <p class="fs-5">لا يوجد ملاحظات حتى الان</p>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="container text-secondary">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-3">
                                                Star 1
                                            </div>
                                            <div class="col-8">
                                                <div class="progress" dir="ltr">
                                                    <div
                                                        class="progress-bar progress-bar-striped progress-bar-animated primaryColor"
                                                        role="progressbar" aria-label="Animated striped example"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 20%"></div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                20%
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-3">
                                                Star 2
                                            </div>
                                            <div class="col-8">
                                                <div class="progress" dir="ltr">
                                                    <div
                                                        class="progress-bar progress-bar-striped progress-bar-animated primaryColor"
                                                        role="progressbar" aria-label="Animated striped example"
                                                        aria-valuenow="46" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 46%"></div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                46%
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-3">
                                                Star 3
                                            </div>
                                            <div class="col-8">
                                                <div class="progress" dir="ltr">
                                                    <div
                                                        class="progress-bar progress-bar-striped progress-bar-animated primaryColor"
                                                        role="progressbar" aria-label="Animated striped example"
                                                        aria-valuenow="59" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 59%"></div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                59%
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-3">
                                                Star 4
                                            </div>
                                            <div class="col-8">
                                                <div class="progress" dir="ltr">
                                                    <div
                                                        class="progress-bar progress-bar-striped progress-bar-animated primaryColor"
                                                        role="progressbar" aria-label="Animated striped example"
                                                        aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 72%"></div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                72%
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-3">
                                                Star 5
                                            </div>
                                            <div class="col-8">
                                                <div class="progress" dir="ltr">
                                                    <div
                                                        class="progress-bar progress-bar-striped progress-bar-animated primaryColor"
                                                        role="progressbar" aria-label="Animated striped example"
                                                        aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 34%"></div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                34%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- /navs -->

@endsection
