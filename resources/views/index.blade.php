@extends('master')


@section('content')

    <section class="mt-5">

        <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner pt-md-5 pt-3">
                <div class="carousel-item active">
                    <img src="{{asset('uploads/WhatsApp Image 2024-09-13 at 13.28.30.jpeg')}}" class="d-block w-100 d-block d-md-none" height="200" alt="..." >
                    <img src="{{asset('uploads/WhatsApp Image 2024-09-13 at 13.28.30.jpeg')}}" class="d-block w-100 d-none d-md-block" height="400" alt="..." style="object-fit: cover">
                </div>
                <div class="carousel-item ">
                    <img src="{{asset('uploads/WhatsApp Image 2024-09-13 at 13.28.30(1).jpeg')}}" class="d-block w-100 d-block d-md-none" height="200" alt="...">
                    <img src="{{asset('uploads/WhatsApp Image 2024-09-13 at 13.28.30(1).jpeg')}}" class="d-block w-100 d-none d-md-block" height="400" alt="..." style="object-fit: cover">
                </div>
                <div class="carousel-item ">
                    <img src="{{asset('uploads/1646985559_2.jpg')}}" class="d-block w-100 d-block d-md-none" height="200" alt="...">
                    <img src="{{asset('uploads/1646985559_2.jpg')}}" class="d-block w-100 d-none d-md-block" height="400" alt="..." style="object-fit: cover">
                </div>
                <div class="carousel-item ">
                    <img src="{{asset('uploads/1646985559_2.jpg')}}" class="d-block w-100 d-block d-md-none" height="200" alt="...">
                    <img src="{{asset('uploads/1646985559_2.jpg')}}" class="d-block w-100 d-none d-md-block" height="400" alt="..." style="object-fit: cover">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- /carousel -->
    <div class="container mt-5">
        <div class="slider" dir="ltr">
            @php
                $categories = \App\Models\Category::query()->latest()->get();
            @endphp
            @foreach($categories as $category)
                <div class="text-center">
                    <a href="{{ route('view-category' , $category->id) }}" class="text-decoration-none text-dark">
                        <img src="{{asset('categories-images/'.$category->image)}}" style="max-width: 80%;border-radius: 50%;overflow: hidden;" class="border border-2 ms-auto me-auto shadow" width="" alt="">
                        <p class="mt-2">{{$category->name}}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    @php
        $sections = \App\Models\Section::query()->latest()->get();
    @endphp

        <section class="container mt-2 mb-3">
            <img src="{{asset('banners-images/'.$sections[0]->banner)}}" class="w-100 rounded shadow" alt="">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-center my-md-5 my-4 mainColor" style=""><span class="me-2">|</span>{{$sections[0]->category->name}}</h5>
                    <a href="{{ route('view-category' , $sections[0]->category->id) }}" class="btn btn-outline-dark btn-sm rounded-4 ms-auto">عرض الكل</a>
                </div>
                <div class="row">
                    @foreach($sections[0]->category->products as $product)
                        <div class="col-md-3 col-6 mb-2">
                            <a href="{{ route('view-product',$product->id) }}" class="text-decoration-none">
                                <div class="product">
                                    <img src="{{asset('products-images/'.$product->image)}}" class="w-100 " alt="{{$product->name}}">
                                    <div class="container position-relative">
                                        <p class="productName my-0 mt-2 mb-1">{{$product->name}}</p>
                                        <p class="mb-2 text-secondary text-center">
                                            <span>{{$product->price}}</span>
                                            <span>ر.س</span>
                                        </p>
                                        <div>
                                            <form action="{{ route('cart.add' , $product->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="qnt" value="1" id="">
                                                <input type="hidden" name="product_id" value="{{$product->id}}" id="">
                                                <button type="submit"  class="btn btn-sm btn-dark w-100">
                                                    إضافة للسلة
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

        </section>
        <section class="container mt-2 mb-3">
            <img src="{{asset('banners-images/'.$sections[1]->banner)}}" class="w-100 rounded shadow" alt="">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-center my-md-5 my-4 mainColor" style=""><span class="me-2">|</span>{{$sections[1]->category->name}}</h5>
                    <a href="{{ route('view-category' , $sections[0]->category->id) }}" class="btn btn-outline-dark btn-sm rounded-4 ms-auto">عرض الكل</a>
                </div>
                <div class="row">
                    @foreach($sections[1]->category->products as $product)
                        <div class="col-md-3 col-6 mb-2">
                            <a href="{{ route('view-product',$product->id) }}" class="text-decoration-none">
                                <div class="product">
                                    <img src="{{asset('products-images/'.$product->image)}}" class="w-100 " alt="{{$product->name}}">
                                    <div class="container position-relative">
                                        <p class="productName my-0 mt-2 mb-1">{{$product->name}}</p>
                                        <p class="mb-2 text-secondary text-center">
                                            <span>{{$product->price}}</span>
                                            <span>ر.س</span>
                                        </p>
                                        <div>
                                            <form action="{{ route('cart.add' , $product->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="qnt" value="1" id="">
                                                <input type="hidden" name="product_id" value="{{$product->id}}" id="">
                                                <button type="submit"  class="btn btn-sm btn-dark w-100">
                                                    إضافة للسلة
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

        </section>
        <section class="container mt-2 mb-3">
            <img src="{{asset('banners-images/'.$sections[2]->banner)}}" class="w-100 rounded shadow" alt="">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-center my-md-5 my-4 mainColor" style=""><span class="me-2">|</span>{{$sections[2]->category->name}}</h5>
                    <a href="{{ route('view-category' , $sections[2]->category->id) }}" class="btn btn-outline-dark btn-sm rounded-4 ms-auto">عرض الكل</a>
                </div>
                <div class="row">
                    @foreach($sections[2]->category->products as $product)
                        <div class="col-md-3 col-6 mb-2">
                            <a href="{{ route('view-product',$product->id) }}" class="text-decoration-none">
                                <div class="product">
                                    <img src="{{asset('products-images/'.$product->image)}}" class="w-100 " alt="{{$product->name}}">
                                    <div class="container position-relative">
                                        <p class="productName my-0 mt-2 mb-1">{{$product->name}}</p>
                                        <p class="mb-2 text-secondary text-center">
                                            <span>{{$product->price}}</span>
                                            <span>ر.س</span>
                                        </p>
                                        <div>
                                            <form action="{{ route('cart.add' , $product->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="qnt" value="1" id="">
                                                <input type="hidden" name="product_id" value="{{$product->id}}" id="">
                                                <button type="submit" class="btn btn-sm btn-dark w-100">
                                                    إضافة للسلة
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

        </section>
        <section class="container mt-2 mb-3">
            <img src="{{asset('banners-images/'.$sections[3]->banner)}}" class="w-100 rounded shadow" alt="">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-center my-md-5 my-4 mainColor" style=""><span class="me-2">|</span>{{$sections[3]->category->name}}</h5>
                    <a href="{{ route('view-category' , $sections[3]->category->id) }}" class="btn btn-outline-dark btn-sm rounded-4 ms-auto">عرض الكل</a>
                </div>
                <div class="row">
                    @foreach($sections[3]->category->products as $product)
                        <div class="col-md-3 col-6 mb-2">
                            <a href="{{ route('view-product',$product->id) }}" class="text-decoration-none">
                                <div class="product">
                                    <img src="{{asset('products-images/'.$product->image)}}" class="w-100 " alt="{{$product->name}}">
                                    <div class="container position-relative">
                                        <p class="productName my-0 mt-2 mb-1">{{$product->name}}</p>
                                        <p class="mb-2 text-secondary text-center">
                                            <span>{{$product->price}}</span>
                                            <span>ر.س</span>
                                        </p>
                                        <div>
                                            <form action="{{ route('cart.add' , $product->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="qnt" value="1" id="">
                                                <input type="hidden" name="product_id" value="{{$product->id}}" id="">
                                                <button type="submit" class="btn btn-sm btn-dark w-100">
                                                    إضافة للسلة
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

        </section>

    <div class="container mt-4">
        <div class="container">
            <div class="d-flex align-items-center mb-3" style="border-bottom: 1px solid black;">
                <h5 class="text-center my-md-5 my-3 mainColor">عملائنا يثقون بنا</h5>
            </div>
        </div>
        <div class="my-4">
            <div class="comment">

                <div class="px-3">
                    <div class="p-5 border shadow rounded text-center">
                        <div class=" mb-3">
                                <span class="border border-5 rounded-circle px-3 py-2 fs-1 shadow">
                            <i class="fas fa-user text-dark "></i>
                        </span>
                            <h3 class="my-3">محمد الشمري</h3>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-stroke"></i>
                            </div>
                        </div>
                        <div class="">
                            اشكركم على المصداقيه تم وصول الطلب ونفس الطلب وجوده ممتازه واتمنالكم التوفيق
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="p-5 border shadow rounded text-center">
                        <div class=" mb-3">
                                <span class="border border-5 rounded-circle px-3 py-2 fs-1 shadow">
                            <i class="fas fa-user text-dark "></i>
                        </span>
                            <h3 class="my-3">عبدالله العنزي</h3>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-stroke"></i>
                            </div>
                        </div>
                        <div class="">
                            شغل متميز وجبار ♥️ استمروا ♥️
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="p-5 border shadow rounded text-center">
                        <div class=" mb-3">
                                <span class="border border-5 rounded-circle px-3 py-2 fs-1 shadow">
                            <i class="fas fa-user text-dark "></i>
                        </span>
                            <h3 class="my-3">يوسف محمد</h3>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-stroke"></i>
                            </div>
                        </div>
                        <div class="">
                            اهم شي الخدمه بعد البيع .. ابدعتوا بس لو تقللون هال١٤ يوم
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="p-5 border shadow rounded text-center">
                        <div class=" mb-3">
                                <span class="border border-5 rounded-circle px-3 py-2 fs-1 shadow">
                            <i class="fas fa-user text-dark "></i>
                        </span>
                            <h3 class="my-3">هنادي عبدالله</h3>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-stroke"></i>
                            </div>
                        </div>
                        <div class="">
                            من جد خيارات اصلية المنتج يفرض نفسه
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="p-5 border shadow rounded text-center">
                        <div class=" mb-3">
                                <span class="border border-5 rounded-circle px-3 py-2 fs-1 shadow">
                            <i class="fas fa-user text-dark "></i>
                        </span>
                            <h3 class="my-3">احمد العتيبي</h3>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="">
                            هذه ثالث تجربه .. خدمتهم صراحه تسسكت اهنيكم
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
