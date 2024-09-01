@extends('master')
@section('content')

        <section class="mt-5 py-3">
        </section>
        <section class="container-fluid">

            <nav aria-label="breadcrumb" style="margin-top: 15px;">
                <ol class="breadcrumb pt-md-0 pt-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class=" text-dark">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                </ol>
            </nav>
            <h5 class="text-start text-secondary container-fluid">
                {{$category->name}}</h5>
            <!-- itmes -->
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3 col-6 mb-2">
                            <a href="{{ route('view-product' , $product->id) }}" class="text-decoration-none">
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
            </div>
        </section>


@endsection
