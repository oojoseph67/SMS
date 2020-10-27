
@extends('layouts.adminvertical', ['title' => 'Single Teacher'])

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="{{ route('view.students') }}">View Teacher</a></li>
                            <li class="breadcrumb-item active">Teacher</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Single Teacher</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

    <div class="row justify-content-center">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    
            </div>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="text-center">
                            <a role="button" class="btn btn-lg btn-primary" href="{{ route('view.students') }}">{{ __('Back') }}</a>
                        </div>
                        
                        <br><br><br>


                    <form method="post" role="form" action="{{ route('update.teacher') }}" enctype="multipart/form-data" class="col-7">
                            @csrf
                        <input type="hidden" name="id" value="{{$info->id}}">

                        <div class="form-group{{ $errors->has('fullname') ? ' has-danger' : '' }}">      
                            <input autocomplete="off" class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" placeholder="{{ __('Full Name') }}" type="text" name="fullname" value="{{ $info->fullname }}"  autofocus>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <input autocomplete="off" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ $info->email }}" >                       
                        </div>


                        <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
                            <input autocomplete="off" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" placeholder="{{ __('Date Of Birth') }}" type="date" name="dob" value="{{ $info->dob }}" >     
                        </div>
                        
                        <div class="form-group">
                            <label for="">{{ __('Gender') }}</label>            
                            <input autocomplete="off" class="form-control" placeholder="{{ __('gender') }}" type="text" name="gender" value="{{ $info->gender }}"  autofocus>
                        </div>


                        <div class="form-group{{ $errors->has('guardian_name') ? ' has-danger' : '' }}">            
                            <input autocomplete="off" class="form-control{{ $errors->has('guardian_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Guardian Name') }}" type="text" name="guardian_name" value="{{ $info->guardian_name }}"  autofocus>     
                        </div>


                        <div class="form-group{{ $errors->has('guardian_email') ? ' has-danger' : '' }}">
                            <input autocomplete="off" class="form-control{{ $errors->has('guardian_email') ? ' is-invalid' : '' }}" placeholder="{{ __('Guardian Email') }}" type="email" name="guardian_email" value="{{ $info->guardian_email }}" >          
                        </div>


                        <div class="form-group{{ $errors->has('guardian_phoneNumber') ? ' has-danger' : '' }}">
                            <label>{{ __('Guardian Phone Number') }}</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="(000) 000-0000-000" placeholder="(234) 123-4567-890" name="guardian_phoneNumber" value="{{ $info->guardian_phoneNumber }}">
                        </div>


                        <h4 class="header-title">Upload Password</h4>
                            <p class="sub-header">
                                Passport
                            </p>


                            <div class="col-lg-6">
                                <div class="mt-3">
                                    <input name="passport" type="file" data-plugins="dropify" data-default-file="{{asset('assets/images/small/img-2.jpg')}}"  />
                                    <p class="text-muted text-center mt-2 mb-0">Current Image</p>
                                </div>
                            </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">{{ __('Update') }}</button>
                        </div>

                    
                    </form>

                </div>
            </div>
        </div> 
    </div>     
        

        
</div> <!-- container -->
@endsection

@section('script')
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
@endsection