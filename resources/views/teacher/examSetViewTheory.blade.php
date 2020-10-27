@extends('layouts.teachervertical', ['title' => 'Teacher'])

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/clockpicker/clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="{{ route('exam') }}">Exam</a></li>
                            <li class="breadcrumb-item active">Set Exam For {{$subject_name}} </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Set Exam For {{$subject_name}}</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

            <div class="row">
                <div class="col-md-8">

                    <form action="{{ route('exam.create') }}">
                    
                        <input type="hidden" name="type" value="{{$type}}">
                        <input type="hidden" name="subject_name" value="{{$subject_name}}">
                        <input type="hidden" name="teacher" value="{{Auth()->user()->fullname}}">
                        @foreach($info as $info)
                            <input type="hidden" name="class" value="{{$info->classes}}">
                        @endforeach

                        <div class="form-group mb-3">
                            <label>Date Of Exam</label>
                            <input type="text" id="basic-datepicker" name="date" class="form-control" placeholder="Basic datepicker">
                        </div>

                        <div class="form-group mb-3">
                            <label>Start Of Exam</label>
                            <div class="input-group clockpicker">
                                <input type="text" name="time_of_exam" class="form-control" value="00:00">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>End Of Exam</label>
                            <div class="input-group clockpicker">
                                <input type="text" name="length_of_exam" class="form-control" value="00:00">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Mark Per Right Question</label>
                            <select name="mark_right" id="" required class="form-control">
                                <option value="">-Choose-</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                 <option value="17.5">17.5</option>
                            </select>
                        </div>

                        <!-- <div class="form-group">
                            <label for="">Mark Per Wrong Question</label>
                            <select name="mark_wrong" id="" required class="form-control">
                                <option value="">-Choose-</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                 <option value="17.5">17.5</option>
                            </select>
                        </div> -->

                        <div class="form-group col-md-5">
                            <button type="submit" class="form-control btn btn-primary">Create Exam</button>
                        </div>
                    </form>
                    
                </div>
            </div> 
            </div>
            </div>            

        </div>
      </div>

        
    </div> <!-- container -->
    
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('assets/libs/clockpicker/clockpicker.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/form-pickers.init.js')}}"></script>
@endsection