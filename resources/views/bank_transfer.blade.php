@extends('master')

@section('content')



    <main>
        <section class="mt-5 py-3">
        </section>
        <section class="container-fluid mt-3">
            <div class="row">
                <div class="rounded-4 shadow col-md-4 col-11 ms-auto me-auto px-4 py-3 my-md-5 my-3 border">
                    <div class="text-center my-3">
                        <i class="fas fa-check  p-5" style="font-size: 100px;border-radius: 50%;background-color: #0f5d0f;color: white"></i>
                    </div>
                    <div class="text-center my-5">
                        <h2 class="text-success">
                            تمت العملية بنجاح
                        </h2>
                    </div>
                    <div class="text-center mt-2 mb-4">
                        <p class="fs-6 text-secondary"> يرجى تسديد المبلغ المطلوب على الحساب البكي الخاص بنا
                        </p>
                    </div>
                    <div class="text-center mt-2 mb-4">
                        <p class="fs-6 text-secondary">{{settings()->bank_account}}</p>
                    </div>
                    <div class="text-center my-4">
                        <p class="fs-6 text-secondary" style="    color: #f00 !important;">
                            وارسال رسالة الخصم والتفاصيل المالية الى خدمة العملاء
                        </p>
                    </div>
                    <div class="text-center mt-2 mb-4">
                        <p class="fs-6 text-secondary">شكرا لك ولثقتك. وإنه لمن دواعي سرورنا العمل معكم.
                            نشكرك على كونك من عملائنا الكرام. نحن ممتنون للغاية لخدمتك ونأمل أن نكون قد حققنا توقعاتك.
                        </p>
                    </div>
                    <div class="text-center my-4">
                        <p class="fs-6 text-secondary">
                            يرجى التواصل مع موظف خدمة العملاء لإستكمال إجراءات شحن الطلب <i class="fas fa-heart fa-fw"></i>
                        </p>
                    </div>
                    <div class="text-center my-3">
                        <a href="https://wa.me/{{settings()->whatsapp}}" class="btn btn-outline-success w-100">
                            <i class="fas fa-headset fa-fw"></i>
                            خدمة العملاء
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>



@endsection
