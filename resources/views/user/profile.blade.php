@extends('layouts.vertical', ['title' => 'Profile'])

@section('css')
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">BBIA</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card-box text-center">
                    <img src="{{asset('assets/images/users/user-1.jpg')}}" class="rounded-circle avatar-xl img-thumbnail"
                        alt="profile-image">

                    <h4 class="mb-0">{{auth()->user()->fullname}}</h4>
                    <p class="text-muted">{{auth()->user()->current_class}}</p>
                    <br><br>
                    <div class="text-left mt-3">
                        <h4 class="font-13 text-uppercase">About Me :</h4>
                        <p class="text-muted font-13 mb-3">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type.
                        </p>
                        <p class="text-muted mb-2 font-13"><strong>Fullname :</strong> <span class="ml-2">{{auth()->user()->fullname}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{auth()->user()->email}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Gender :</strong> <span class="ml-2 ">{{auth()->user()->gender}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Date Of Birth :</strong> <span class="ml-2 ">{{auth()->user()->dob}}</span></p>

                    </div>                   
                </div>
                <div class="card-box">
                    <h4 class="header-title mb-3">Notice</h4>

                    <div class="inbox-widget" data-simplebar style="max-height: 350px;">
                        <div class="inbox-item">
                            <p class="inbox-item-text"><strong>you u want to change your name or guardian name, please contact the admin</strong></p>
                        </div>
                    </div> <!-- end inbox-widget -->

                </div>
            </div>  

            
            <div class="col-lg-8 col-xl-8">
                <div class="card-box">
                @if (session('password_status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('password_status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('profile_status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('profile_status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($errors->has('password'))                                 
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('password') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif        
                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Profile
                            </a>
                            <li class="nav-item">
                                <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    Security
                                </a>
                            </li>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- PROFILE -->
                        <div class="tab-pane show active" id="settings">
                            <form action="{{ route('profile.detailsUpdate') }}">
                                <h3><strong>NB: PLEASE WHILE CHANGING THE DETAILS ALSO NOTE TO USE ACCESSABLE AND RELIABLE INFORMATION</strong></h3>
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fullname">Fullname</label>
                                            <input type="text" class="form-control" id="firstname" value="{{auth()->user()->fullname}}" disabled name="fullname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="lastname" name="email" value="{{auth()->user()->email}}">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> Student Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="student_id">Student ID</label>
                                            <input type="text" class="form-control" id="companyname" value="{{auth()->user()->student_id}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cwebsite">Class</label>
                                            <input type="text" class="form-control" id="cwebsite" value="{{auth()->user()->current_class}}" disabled>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->


                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> School Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="student_id">Current Section</label>
                                            <input type="text" class="form-control" id="companyname" value="{{auth()->user()->section}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cwebsite">Current Term</label>
                                            <input type="text" class="form-control" id="cwebsite" value="{{auth()->user()->term}}" disabled>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> Guardian Info</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="student_id">Guardian Name</label>
                                            <input type="text" class="form-control" id="companyname" name="guardian_name" value="{{auth()->user()->guardian_name}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cwebsite">Guardian Email</label>
                                            <input type="text" class="form-control" id="cwebsite" name="guardian_email" value="{{auth()->user()->guardian_email}}">
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cwebsite">Guardian PhoneNumber</label>
                                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="(000) 000-0000-000" name="guardian_phoneNumber" value="{{ auth()->user()->guardian_phoneNumber}}">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- SECURITY -->
                        <div class="tab-pane" id="aboutme">
                            <form action="{{ route('profile.passwordUpdate') }}">
                                <h5 class="mb-4 text-uppercase"> <i data-feather="key" class="icon-dual"></i> Security</h5>
                                <div class="row">                                   
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <label for="password">{{ __('New Password') }}</label>
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
                                    </div> 
                                   <div class="form-group col-md-5">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                   </div>
                                </div>
                            </form>
                        </div>

                    </div> <!-- end tab-content -->
                </div> <!-- end card-box-->

            </div>



        </div>
        
    </div> <!-- container -->
@endsection

@section('script')
            <script src="{{asset('assets/libs/jquery-mask-plugin/jquery-mask-plugin.min.js')}}"></script>
            <script src="{{asset('assets/libs/autonumeric/autonumeric.min.js')}}"></script>

            <!-- Page js-->
            <script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>

              <!-- Plugins js-->
            <script src="{{asset('assets/libs/dropzone/dropzone.min.js')}}"></script>
            <script src="{{asset('assets/libs/dropify/dropify.min.js')}}"></script>

            <!-- Page js-->
            <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>
@endsection