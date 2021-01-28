<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.shared.title-meta', ['title' => "Register Teacher"])

        @include('layouts.shared.head-css')
        
    <link href="{{asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="22">
                                            </span>
                                        </a>
                    
                                        <a href="" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="22">
                                            </span>
                                        </a>
                                    </div>
                                    <p class="text-muted mb-4 mt-3">Don't have an account? Create your account, it takes less than a minute</p>
                                </div>

                        <form method="post" role="form" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group{{ $errors->has('fullname') ? ' has-danger' : '' }}">
                                <label for="fullname"> {{ __('Fullname')}} </label>
                                <input autocomplete="off" class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" placeholder="{{ __('Full Name') }}" type="text" name="fullname" value="{{ old('fullname') }}"  autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label for="email"> {{ __('Email')}} </label>
                                <input autocomplete="off" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" >
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
                                <label for="dob"> {{ __('Date Of Birth') }} </label>
                                <input autocomplete="off" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" placeholder="{{ __('Date Of Birth') }}" type="date" name="dob" value="{{ old('dob') }}" >
                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                            <label for="example-number-input" class="form-control-label">{{ __('Gender') }}</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="Male">
                                    <label class="custom-control-label" for="customRadioInline1">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="Female">
                                    <label class="custom-control-label" for="customRadioInline2">Female</label>
                                </div>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                            

                            <input type="hidden" name="role" value="TEACHER">
                            

                            <div class="form-group{{ $errors->has('passport') ? ' has-danger' : '' }}">
                                <label for="">Upload Passport</label>
                                <input type="file" data-plugins="dropify" name="passport"  value="{{ old('passport') }}"/>                           
                                @if ($errors->has('passport'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('passport') }}</strong>
                                    </span>
                                @endif
                            </div>

                                                        
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                               <label for="password">{{ __('Password') }}</label>
                                <div  class="input-group input-group-merge">
                                    <input autocomplete="off" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" >
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @if ($errors->has('password'))                                 
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif            
                                </div>                    
                            </div>

                            <div class="form-group">
                                <label for="confirm_password"> {{__('Confirm Password')}} </label>
                                <div  class="input-group input-group-merge">
                                    <input autocomplete="off" class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox" required>
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">{{ __('I agree with the') }} <a href="#!">{{ __('Privacy Policy') }}</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Register') }}</button>
                            </div>
                        </form>

                                

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-white-50">Already have account?  <a href="{{route('login')}}" class="text-white ml-1"><b>Sign In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
        </footer>

        @include('layouts.shared.footer-script')

      
            <!-- Plugins js-->
            <script src="{{asset('assets/libs/jquery-mask-plugin/jquery-mask-plugin.min.js')}}"></script>
            <script src="{{asset('assets/libs/autonumeric/autonumeric.min.js')}}"></script>

            <!-- Page js-->
            <script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>

              <!-- Plugins js-->
            <script src="{{asset('assets/libs/dropzone/dropzone.min.js')}}"></script>
            <script src="{{asset('assets/libs/dropify/dropify.min.js')}}"></script>

            <!-- Page js-->
            <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>
            
    </body>
</html>