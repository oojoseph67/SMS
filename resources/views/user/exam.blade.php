@extends('layouts.vertical', ['title' => 'Exam'])

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
                            <li class="breadcrumb-item active">Exam</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Exam</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title">List Of Exam For this {{ auth()->user()->term }} term {{ auth()->user()->section }} section</h4>
                    <p class="sub-header">

                    </p>

                    <div class="table-responsive">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>                                
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Action</th>
                                    <th>Test</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $details)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$details->subject_name}}</td>
                                        <td>{{$details->exam_type}}</td>
                                        <td>{{$details->date}}</td>
                                        <td>{{$details->start}}</td>
                                        <td>{{$details->end}}</td>                                        
                                        <td>
                                            @if(\Carbon\Carbon::now(new \DateTimeZone('Africa/Lagos'))->lt(\Carbon\Carbon::parse($details->end))) 
                                                <a class="btn btn-primary invaild" href="javascript: void(0);">Exam Has Expired</a>
                                            @else
                                                @if(\Carbon\Carbon::now(new \DateTimeZone('Africa/Lagos'))->gt(\Carbon\Carbon::parse($details->date)) && \Carbon\Carbon::now(new \DateTimeZone('Africa/Lagos'))->gt(\Carbon\Carbon::parse($details->start)) )  
                                                    @if($details->exam_type == 'Obj')
                                                        <th scope="row"><a type="button" class="btn btn-primary" target="_blank" href="{{ route('exam.startObj', ['subject_name' => $details->subject_name] ) }}">START</a></th>
                                                    @elseif($details->exam_type == 'Theory')
                                                        <th scope="row"><a type="button" class="btn btn-primary" target="_blank" href="{{ route('exam.startTheory', ['subject_name' => $details->subject_name] ) }}">START</a></th>
                                                    @elseif($details->exam_type == 'Both')
                                                        <th scope="row"><a type="button" class="btn btn-primary" target="_blank" href="{{ route('exam.startBoth', ['subject_name' => $details->subject_name] ) }}">START</a></th>
                                                    @endif                                                     
                                                    <!-- <a class="btn btn-primary" href="{{ route('exam.startObj', ['subject_name' => $details->subject_name] ) }}">Start</a>                                                -->
                                                @else
                                                    <a class="btn btn-primary invaild" href="javascript: void(0);">Not Now</a>
                                                @endif
                                            @endif
                                        </td>
                                        <td> 
                                            @if($details->exam_type == 'Obj')
                                                <th scope="row"><a type="button" class="btn btn-primary" target="_blank" href="{{ route('exam.startObj', ['subject_name' => $details->subject_name] ) }}">START</a></th>
                                            @elseif($details->exam_type == 'Theory')
                                                <th scope="row"><a type="button" class="btn btn-primary" target="_blank" href="{{ route('exam.startTheory', ['subject_name' => $details->subject_name] ) }}">START</a></th>
                                            @elseif($details->exam_type == 'Both')
                                                <th scope="row"><a type="button" class="btn btn-primary" target="_blank" href="{{ route('exam.startBoth', ['subject_name' => $details->subject_name] ) }}">START</a></th>
                                            @endif         
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        
    </div> <!-- container -->
                                                
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection