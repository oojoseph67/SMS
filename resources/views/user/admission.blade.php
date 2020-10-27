@extends('layouts.vertical', ['title' => 'Admission'])

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
                            <li class="breadcrumb-item active">Admission</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Admission</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row justify-content-center">
            <div class="col-xl-10">

                
                <div class="text-center">
                    <h3 class="mb-2"><strong>Admission Status</strong></h3>
                    <p class="text-muted w-50 m-auto">
                        YOU ARE YET TO BE GIVEN ADDMISSION. PATIENTLY WAIT WHILE THE MANAGEMENT REVIEW YOUR PROFILE
                    </p><br>
                    <p><strong> This is your Student ID. Note It down cause that is your identification and username to be able to login: {{auth()->user()->student_id}}  </strong></p>
                </div>
                

                </div>
            </div>
            
        
    </div> <!-- container -->
@endsection
@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/form-wizard.init.js')}}"></script>

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