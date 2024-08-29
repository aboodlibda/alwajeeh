@extends('admin.layout')
@section('title')
    {{'تعديل المنتج'}}
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-1">تعديل المنتج</h1>
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
                            <a href="{{route('products.index')}}" class="text-muted text-hover-primary">المنتجات</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">تعديل بيانات المنتج</li>
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
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <!--begin::Close-->

                            <!--end::Close-->
                        </div>
                        <!--begin::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body col-md-12 scroll-y px-10 px-lg-15 pt-0 pb-15">
                            <!--begin:Form-->

                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <!--begin::Title-->
                                <h1 class="mb-3">قم بتعديل بيانات المنتج</h1>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="text-gray-400 fw-bold fs-5">يمكنك تصفح جميع المنتجات من
                                    <a href="{{route('products.index')}}" class="fw-bolder link-primary">هنا</a>.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->

                            <form method="POST" action="{{route('products.update',$product)}}" class="w-100 position-relative mb-3" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3 mb-10" style="border:1px ">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                             style="background-image: url({{asset('products-images/'.$product->image)}})">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-225px h-225px"
                                                 style="background-image: url({{asset('products-images/'.$product->image)}})"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="تغيير الصورة">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="image" accept="image/*" multiple/>
                                                <input type="hidden" name="avatar_remove"/>
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="حذف الصورة">
                                                                    <i class="bi bi-x fs-2"></i>
                                                                </span>

                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text mb-10 ">
                                            <span>الصيغة المسموح بها : jpg , jpeg , png</span><br>
                                            <span>
                                                        @error('image')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                    @enderror
                                                    </span>
                                        </div>

                                        <!--end::Hint-->
                                    </div>
                                    <div class="col-md-9 mb-10" style="border:1px ">
                                        <div class="row">
                                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">العنوان</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                       data-bs-toggle="tooltip"
                                                       title="قم بإدخال العنوان الذي سيظهر للمستخدم"></i>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control border-dark" name="name" value="{{$product->name}}"/>
                                                @error('name')
                                                <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">السعر</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                       data-bs-toggle="tooltip"
                                                       title="قم بإدخال السعر الذي سيظهر للمستخدم"></i>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control border-dark"
                                                       placeholder="السعر" name="price" value="{{$product->price}}"/>
                                                @error('price')
                                                <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">التصنيف</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                       data-bs-toggle="tooltip"
                                                       title="قم بإختيار التصنيف الذي ستظهر للمستخدم"></i>
                                                </label>
                                                <!--end::Label-->
                                                <select class="form-control border-dark" name="category_id">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}"{{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">الحالة</span>

                                                </label>
                                                <!--end::Label-->
                                                <div class="form-check form-check-solid form-switch fv-row">
                                                    <input class="form-check-input w-45px h-30px" name="status" type="checkbox" {{$product->status == 'active' ? 'checked' : ''}}/>
                                                </div>
                                                @error('status')
                                                <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">وصف المنتج</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                       data-bs-toggle="tooltip"
                                                       title="قم بإدخال وصف المنتج الذي سيظهر للمستخدم"></i>
                                                </label>
                                                <!--end::Label-->
                                                <textarea id="editor" style="min-height: 100px" class="form-control border-dark"
                                                          placeholder="وصف المنتج" name="about">{{$product->description}}</textarea>
                                                <script>
                                                    ClassicEditor
                                                        .create( document.querySelector( '#editor' ) )
                                                        .then( editor => {
                                                            console.log( editor );
                                                        } )
                                                        .catch( error => {
                                                            console.error( error );
                                                        } );
                                                </script>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <button type="reset" class="btn btn-white me-3">مسح البيانات</button>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">حفط التعديلات</span>
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
