@extends('master')
@section('content')

    <section class="mt-5 py-3">
    </section>
    <section class="container-fluid mt-3">
        <div class="d-flex align-items-center justify-content-center">
            <h6 class="text-start text-secondary">
                مراجعة الطلب
            </h6>
            <h6 class="text-start text-secondary mx-2">
                .......
            </h6>
            <h6 class="text-start text-secondary">
                عنوان
            </h6>
            <h6 class="text-start text-secondary mx-2">
                .......
            </h6>
            <h6 class="text-start text-secondary">
                الدفع
            </h6>
        </div>

        @if(count($cartItems) > 0)

            <section class="container-fluid mt-3">

                <div class="">

                    <div class="row my-2">

                        <div class="col-md-6 my-2">
                            @php
                                $items = [];
                            @endphp
                            @foreach($cartItems as $key => $item)
                                @php
                                    $items[$key] = $item['product_id'];
                                @endphp
                                <div class="container rounded border bg-white shadow" style="margin-bottom: 20px;">
                                    <div class="row align-items-center py-2">
                                        <div class="col-2">
                                            <div class="rounded shadow">
                                                <img class="ms-auto me-auto d-md-block d-none w-60 img-thumbnail"
                                                     src="{{asset('products-images/'.$item['image'])}}" alt="{{$item['name']}}">
                                                <div class="row">
                                                    <img class="ms-auto me-auto d-md-none w-60 img-thumbnail"
                                                         src="{{asset('products-images/'.$item['image'])}}" alt="{{$item['name']}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-md-0 mt-3 px-0 mx-0">
                                            <a href=""
                                               class="px-1 text-decoration-none h6 d-block text-dark text-center">
                                                {{$item['name']}}
                                            </a>
                                        </div>
                                        <div class="col-3 my-3 px-0">
                                            <div class="container">
                                                <div class="row align-items-center">
                                                    <div class="col-3">
                                                        <form action="{{ route('cart.update', $item['product_id']) }}" method="POST" >
                                                            @csrf
                                                            <input style="width: 50px" type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                                            <button style="width: 50px" type="submit" class="btn btn-sm btn-primary">تحديث</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="col-2  fs-6 text-danger" style="width: 100%">
                                                {{ number_format($item['price'] * $item['quantity'], 2) }} ر.س
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center text-danger align-center" style="width: 100%" >
                                            <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST">
                                                @csrf
                                                <div>
                                                    <button name="deleteItem"  type="submit"  class="btn btn-danger"
                                                            style="margin-top: 20px;height: 35px;width: 150px"><i
                                                            class="fas fa-trash-can"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-4 text-secondary">
                            <div class="container rounded bg-white shadow border my-2 px-3 py-2">
                                <h5 class="border-bottom py-3 mb-3 fw-normal">تفاصيل الفاتورة</h5>
                                <div class="row my-2">
                                    <div class="col-6">قيمة المنتجات :</div>
                                    <div class="col-6 text-end">{{number_format($cartTotal, 2)}} ر.س </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-6">التوصيل:</div>
                                    <div class="col-6 text-end">15.00 ر.س</div>
                                </div>
                                <div class="row my-2 border-top pt-2 text-dark fw-semibold">
                                    <div class="col-6">المجموع الكلي :</div>
                                    <span style="display: none" id="total">{{$cartTotal+15}}</span>
                                    <div class="col-6 text-end text-success">{{number_format($cartTotal+15 ,2)}} ر.س </div>
                                </div>
                                <div class="row mt-5 mb-3">
                                    <div class="col-6">
                                        <a href="{{ route('home') }}" class="btn w-100 btn-outline-dark">
                                            <i class="fas fa-angle-right fa-fw"></i>
                                            العودة للتسوق
                                        </a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <form action="{{ route('view-order') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="cartItems" value="{{serialize($cartItems)}}" id="">
                                            <input type="hidden" name="totalPrice" value="" id="totalPrice">
                                            <button name="order" id="order" class="btn  w-100 btn-warning primaryColor border">
                                                متابعة الشراء
                                                <i class="fas fa-angle-left fa-fw"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section

        @else
            <div class="">

                <div class="row my-2">
                    <!-- itmes -->
                    <div class="col-md-8 my-2">

                        <div class="container rounded border bg-white shadow p-5 text-center " style="color: #121f41;">
                            <div class="mt-3">
                                <i class="fas fa-cart-plus fa-5x"></i>
                            </div>
                            <div class="my-4 fs-5">
                                يبدو أنك لم تشتري شئ !!
                            </div>
                            <div class="">
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary w-75">تسوق الأن</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-secondary">
                        <div class="container rounded bg-white shadow border my-2 px-3 py-2">
                            <h5 class="border-bottom py-3 mb-3 fw-normal">تفاصيل الفاتورة</h5>
                            <div class="row my-2">
                                <div class="col-6">قيمة المنتجات :</div>
                                <div class="col-6 text-end">0 ر.س</div>
                            </div>
                            <div class="row my-2">
                                <div class="col-6">التوصيل:</div>
                                <div class="col-6 text-end">00.00 ر.س</div>
                            </div>
                            <div class="row my-2 border-top pt-2 text-dark fw-semibold">
                                <div class="col-6">المجموع الكلي :</div>
                                <div class="col-6 text-end text-success">0 ر.س</div>
                            </div>
                            <div class="row mt-5 mb-3">
                                <div class="col-12">
                                    <a href="{{ route('home') }}" class="btn w-100 btn-outline-dark">
                                        <i class="fas fa-angle-right fa-fw"></i>
                                        متابعة التسوق
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endif

    </section>
    <script>
        $("#order").click(function(event) {

            var total = $("#total").text()
            $("#totalPrice").val(total)

        });
    </script>

@endsection
