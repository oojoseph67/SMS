@extends('layouts.teachervertical', ['title' => 'Course Management'])

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

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
                            <li class="breadcrumb-item active">Management</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Course Management</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <h1> Here is a list of course you have been assigned to </h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"></h4>
                        <p class="text-muted font-13 mb-4">
                        </p>

                        <div class="table-responsive">
           
                            <table class="table table-hover" id="basic-datatable">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Subject')}}</th>
                                <th scope="col">{{ __('Class')}}</th>
                                <th scope="col">{{ __('Manage')}}</th>
                                </tr>
                            </thead>
                           
                                <tbody> 
                                @foreach( $details as $details ) 
                                    <tr>
                                    <th scope="row">00{{$details->id}}</th>
                                    <td>{{$details->subject_name}}</td>
                                    <td>{{$details->classes}} </td>                                    
                                    <th scope="row">
                                        <div class="col-xl-3">
                                            <!-- Assign modal content -->
                                            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="row">
                                                            <div class="modal-body col">
                                                                <div>
                                                                    <a type="button" class="btn btn-primary" href="/teacher/courselesson/{{$details->subject_name}}/{{$details->classes}}">Add Course Lesson</a>
                                                                    <a type="button" class="btn btn-primary" href="/teacher/coursematerial/{{$details->subject_name}}/{{$details->classes}}">Add Course Material</a>
                                                                </div>                        
                                                            </div>
                                                            
                                                        </div>                                                        
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            <div class="button-list">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#signup-modal">Manage</button>
                                            </div>
                                        </div> 
                                    </th>
                                    </tr>
                                    @endforeach                        
                                </tbody>
                            
                            </table>
                         </div>  

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>



    </div> <!-- container -->
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection