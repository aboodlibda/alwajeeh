@extends('admin.layout')
@section('title')
    {{'تعديل الإعدادات'}}
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-1">تعديل الإعدادات</h1>
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
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('settings.index')}}" class="text-muted text-hover-primary">الإعدادات</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">تعديل الإعدادات</li>
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

                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body p-10">
                        <!--begin::Heading-->
                        <!--begin::Modal content-->
                        <!--begin::Modal header-->
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <!--begin::Close-->

                            <!--end::Close-->
                        </div>
                        <!--begin::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                            <!--begin:Form-->
                            <form id="kt_modal_new_target_form" class="form" method="POST" action="{{route('settings.update',$setting)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!--begin::Heading-->
                                <div class="mb-13 text-center">
                                    <!--begin::Title-->
                                    <h1 class="mb-3">التعديل على الإعدادات</h1>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="text-gray-400 fw-bold fs-5">يمكنك تصفح جميع الإعدادات  من
                                        <a href="{{route('settings.index')}}" class="fw-bolder link-primary">هنا</a>.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row">
                                <div class="col-md-3 d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">واتس اب</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid border-dark"  name="whatsapp" value="{{$setting->whatsapp}}"/>
                                    <span class="text-danger">
                                        @error('whatsapp')
                                        {{$message}}
                                        @enderror
                                            </span>
                                </div>

                                <div class="col-md-3 d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">البريد الإلكتروني</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="email" class="form-control form-control-solid"  name="email" value="{{$setting->email}}"/>
                                    <span class="text-danger">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                            </span>
                                </div>

                                <div class="col-md-3 d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">رابط معروف</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid"  name="ma3roof" value="{{$setting->ma3roof}}"/>
                                    <span class="text-danger">
                                        @error('ma3roof')
                                        {{$message}}
                                        @enderror
                                            </span>
                                </div>

                                <div class="col-md-3 d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">الحساب البنكي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid"  name="bank_account" value="{{$setting->bank_account}}"/>
                                    <span class="text-danger">
                                        @error('bank_account')
                                        {{$message}}
                                        @enderror
                                            </span>
                                </div>

                                <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">ملف الضريبة</span>
                                    </label>
                                    <input type="file" class="form-control form-control-solid"  name="vat"/>
                                    <span class="text-danger">
                                                @error('vat')
                                        {{$message}}
                                        @enderror
                                            </span>
                                </div>

                                <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">السجل التجاري</span>
                                    </label>
                                    <!--end::Label-->

                                    <input type="file" class="form-control form-control-solid"  name="trader_record" value="{{$setting->trader_record}}"/>
                                    <span class="text-danger">
                                                @error('trader_record')
                                        {{$message}}
                                        @enderror
                                            </span>
                                </div>

                                </div>
                                <!--end::Input group-->

                                <!--begin::Actions-->
                                <div class="text-center">
                                    <a href="{{route('settings.index')}}"  class="btn btn-white me-3">إلغاء</a>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">حفظ التعديلات</span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end:Form-->
                        </div>
                        <!--end::Modal body-->

                        <!--end::Modal content-->

                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Heading-->
                <!--begin::Illustration-->

                <!--end::Illustration-->
            </div>
            <!--end::Card body-->
        </div>


    </div>


@endsection
