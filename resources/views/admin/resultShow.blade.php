@extends('layouts.fees', ['title' => 'Result View'])

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
                            <li class="breadcrumb-item active">Result Checker View</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Result Checker View</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"></h4>
                        <p class="text-muted font-13 mb-4">
                        </p>

                        <div class="table-responsive">

                        {{$fullname}}
           
                            <table class="table table-hover" id="basic-datatable">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Subject Name')}}</th>
                                <th scope="col">{{ __('Attendance Score')}}</th>
                                <th scope="col">{{ __('Assignment Score')}}</th>
                                <th scope="col">{{ __('Test Score')}}</th>
                                <th scope="col">{{ __('Exam Score')}}</th>
                                <th scope="col">{{ __('Total Score')}}</th>
                                </tr>
                            </thead>
                                <tbody> <!-- <th scope="row"><a role="button" class="btn btn-sm btn-primary" href="">Delete</a></th> -->
                                    @foreach($details as $details)  
                                    <tr>
                                    <th scope="row">#</th>
                                    <th>{{$details->subject_name}}</th>
                                    @if($details->attendance_score)
                                    <td>
                                        {{$details->attendance_score}}                                                       
                                    </td>
                                    @else
                                    <td>...</td>
                                    @endif

                                    
                                    @if($details->assignment_score)
                                    <td>
                                        {{$details->assignment_score}}
                                    </td>
                                    @else
                                    <td>...</td>
                                    @endif


                                    @if($details->test_score)
                                    <td>
                                        {{$details->test_score}}                                                  
                                    </td>
                                    @else
                                    <td>....</td>
                                    @endif
                                    
                                    @if($details->exam_score)
                                    <td>
                                        {{$details->exam_score}}                                                  
                                    </td>
                                    @else
                                    <td>....</td>
                                    @endif

                                    @if($details->total_score)
                                    <td>
                                        {{$details->total_score}}                                                  
                                    </td>
                                    @else
                                    <td>....</td>
                                    @endif


                            
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
    
    <script>
        $(document).ready(function(){
            
        });
    </script>

@endsection