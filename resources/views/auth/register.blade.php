@extends('layouts.app')
@section('content')
<div class="row g-0">
    <div class="col-xxl-8 col-lg-8 col-md-7">
        <div class="auth-bg pt-md-5 p-4 d-flex">
            <div class="bg-overlay bg-success"></div>
            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <!-- end bubble effect -->
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-7">
                    <div class="p-0 p-sm-4 px-xl-0">
                        <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <!-- end carouselIndicators -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="testi-contain text-white">
                                        <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                        <h4 class="mt-4 fw-medium lh-base text-white">“I feel confident
                                            imposing change
                                            on myself. It's a lot more progressing fun than looking back.
                                            That's why
                                            I ultricies enim
                                            at malesuada nibh diam on tortor neaded to throw curve balls.”
                                        </h4>
                                        <div class="mt-4 pt-3 pb-5">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-1.jpg" class="avatar-md img-fluid rounded-circle" alt="...">
                                                </div>
                                                <div class="flex-grow-1 ms-3 mb-4">
                                                    <h5 class="font-size-18 text-white">Richard Drews
                                                    </h5>
                                                    <p class="mb-0 text-white-50">Web Designer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="testi-contain text-white">
                                        <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                        <h4 class="mt-4 fw-medium lh-base text-white">“Our task must be to
                                            free ourselves by widening our circle of compassion to embrace
                                            all living
                                            creatures and
                                            the whole of quis consectetur nunc sit amet semper justo. nature
                                            and its beauty.”</h4>
                                        <div class="mt-4 pt-3 pb-5">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-2.jpg" class="avatar-md img-fluid rounded-circle" alt="...">
                                                </div>
                                                <div class="flex-grow-1 ms-3 mb-4">
                                                    <h5 class="font-size-18 text-white">Rosanna French
                                                    </h5>
                                                    <p class="mb-0 text-white-50">Web Developer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="testi-contain text-white">
                                        <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                        <h4 class="mt-4 fw-medium lh-base text-white">“I've learned that
                                            people will forget what you said, people will forget what you
                                            did,
                                            but people will never forget
                                            how donec in efficitur lectus, nec lobortis metus you made them
                                            feel.”</h4>
                                        <div class="mt-4 pt-3 pb-5">
                                            <div class="d-flex align-items-start">
                                                <img src="assets/images/users/avatar-3.jpg"
                                                    class="avatar-md img-fluid rounded-circle" alt="...">
                                                <div class="flex-1 ms-3 mb-4">
                                                    <h5 class="font-size-18 text-white">Ilse R. Eaton</h5>
                                                    <p class="mb-0 text-white-50">Manager
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end carousel-inner -->
                        </div>
                        <!-- end review carousel -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-xxl-4 col-lg-4 col-md-5">
        <div class="auth-full-page-content d-flex p-sm-5 p-4">
            <div class="w-100">
                <div class="d-flex flex-column h-100">
                    <div class="mb-4 mb-md-5 text-center">
                        <a href="{{ url('/') }}" class="d-block auth-logo">
                            <img src="{{  asset('assets/images/invoice-bd-logo.png') }}" alt="" width="200">
                        </a>
                    </div>
                    <div class="auth-content my-auto">

                        @if(session('message'))
                            <div class="alert alert-info" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">আপনার নাম </label>
                                <input id="name" name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autocomplete="name" autofocus placeholder="{{ trans('global.name') }}" value="{{ old('name', null) }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">আপনার ই-মেইল</label>
                                <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">আপনার ফোন </label>
                                <input id="phone" name="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" required autocomplete="phone" autofocus placeholder="Phone Number" value="{{ old('phone', null) }}">
                                @if($errors->has('phone'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">শপ নাম</label>
                                <input id="shop_name" name="shop_name" type="text" class="form-control{{ $errors->has('shop_name') ? ' is-invalid' : '' }}" required autocomplete="shop" autofocus placeholder="Shop Name" value="{{ old('shop_name', null) }}">
                                @if($errors->has('shop_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('shop_name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">শপ ঠিকানা</label>
                                <input id="shop_address" name="shop_address" type="text" class="form-control{{ $errors->has('shop_address') ? ' is-invalid' : '' }}" required autocomplete="address" autofocus placeholder="Shop Address" value="{{ old('shop_address', null) }}">
                                @if($errors->has('shop_address'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('shop_address') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">শপ ফোন নাম্বার</label>
                                <input id="shop_phone_number" name="shop_phone_number" type="text" class="form-control{{ $errors->has('shop_phone_number') ? ' is-invalid' : '' }}" required autocomplete="phone" autofocus placeholder="Shop Phone Number" value="{{ old('shop_phone_number', null) }}">
                                @if($errors->has('shop_phone_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('shop_phone_number') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <label class="form-label">পাসওয়ার্ড</label>
                                    </div>
                                </div>

                                <div class="input-group auth-pass-inputgroup">
                                    <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}" aria-label="Password" aria-describedby="password-addon">
                                    <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <label class="form-label">কনফার্ম পাসওয়ার্ড</label>
                                    </div>
                                </div>

                                <div class="input-group auth-pass-inputgroup">
                                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}" aria-label="Password" aria-describedby="password-addon">
                                    <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    @if($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-danger w-100 waves-effect waves-light" type="submit"> {{ __('Register') }}</button>
                            </div>
                        </form>

                        <div class="mt-5 text-center">
                            <p class="text-muted mb-0">You have an account ? <a href="{{ url('/login') }}"
                                    class="text-primary fw-semibold"> Login Now </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end auth full page content -->
    </div>
    <!-- end col -->

</div>
@endsection
