@extends('admin.layout')
@section('title')
    {{'كل الطلبات'}}
@endsection

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex flex-column align-items-start me-3">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-1">الطلبات</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin')}}" class="text-muted text-hover-primary">الرئيسية</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">الطلبات</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Tables Widget 11-->


                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">جميع الطلبات</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                <tr class="fw-bolder text-muted bg-light">
                                    <th class="ps-4 rounded-start"></th>
                                    <th class="ps-4 rounded-start">اسم صاحب الطلب</th>
                                    <th class="ps-4 rounded-start">الجوال</th>
                                    <th class="ps-4 rounded-start">تقسيط/دفعة كاملة</th>
                                    <th class="ps-4 rounded-start">التذاكر الطلوبة</th>
                                    <th class="ps-4 rounded-start">مجموع الطلب</th>
                                    <th class="ps-15">العمليات</th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($orders as $order)
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
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="text-dark fw-bolder  mb-1 fs-6">{{$order->number}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="text-white fw-bolder  mb-1 fs-6 badge badge-primary">{{$order->full_name}}</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="text-white fw-bolder  mb-1 fs-6 badge badge-success">{{$order->phone}}</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    @if($order->is_installment)
                                                        <span class="text-white fw-bolder  mb-1 fs-6 badge badge-primary">تقسيط</span>
                                                        <span class="text-white fw-bolder  mb-1 fs-6 badge badge-info">دفعة أولى : {{$order->first_installment}}</span>
                                                    @else
                                                        <span class="text-white fw-bolder  mb-1 fs-6 badge badge-warning">دفعة كاملة</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    @foreach($order->products as $key => $product)
                                                        <span class="text-white fw-bolder  mb-1 fs-6 badge badge-dark">
                                                         {{$product->name}}
                                                        {{$product->price}} ريال
                                                         | عدد : {{$product->pivot->count}}
                                                    </span>

                                                    @endforeach

                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                        <span class="text-white fw-bolder  mb-1 fs-6 badge badge-danger">
                                                        {{$grandTotal}} ريال
                                                        </span>
                                                </div>
                                            </div>
                                        </td>

                                        <td>

                                            <a href="{{ route('invoice' , $order->id)}}" class="badge badge-danger">فاتورة</a>
                                            @if($order->is_installment)
                                            <a href="{{ route('installment' , $order->id)}}" class="badge badge-primary">عقد تقسيط</a>

                                            @endif

                                            <a href="{{ route('receipt' , $order->id)}}" class="badge badge-warning">سند قبض</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    {{$orders->links()}}
                    <!--begin::Body-->
                </div>
                <!--end::Tables Widget 11-->
            </div>
            <!--end::Card body-->
        </div>


    </div>

    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف الطلب</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="" method="POST">.
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>هل أنت متأكد من عملية الحذف ؟</p>
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>

        $('#kt_modal_1').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })

    </script>

@endsection
