@extends('layouts.teachervertical', ['title' => 'Teacher'])

@section('css')
 
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
                    
                        <h4 class="header-title">This exam is an Theory</h4>
                        <p class="text-muted font-13 mb-4">
                        </p>
                    

                        <div class="table-responsive">
                            <div class="button-list">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal">Add</button>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(session('update'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('update')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
           
                            <table class="table table-hover" id="basic-datatable">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Subject')}}</th>
                                    <th scope="col">{{ __('Class')}}</th>                                    
                                    <th scope="col">{{ __('Start Time')}}</th>
                                    <th scope="col">{{ __('End Time')}}</th>
                                    <th scope="col">{{ __('Mark Per Right Question')}}</th>
                                    <th scope="col">{{ __('Mark Per Wrong Question')}}</th>
                                    <th scope="col">{{ __('Question')}}</th>
                                    <th scope="col">{{ __('Answer')}}</th>
                                    <th scope="col">{{ __('Edit')}}</th>
                                    <th scope="col">{{ __('Delete')}}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach ($data2 as $data2)
                                <tr>
                                    <th scope="row">{{$data2->id}}</th>
                                    <th>{{$data2->subject_name}}</th>
                                    <th>{{$data2->class}}</th>
                                    <th>{{$data2->start}}</th>
                                    <th>{{$data2->end}}</th>
                                    <th>{{$data2->question_right_mark}}</th>
                                    <th>{{$data2->question_wrong_mark}}</th>                                    
                                    <th>{{$data2->question}}</th>
                                    <th>{{$data2->answer}}</th> 
                                    <th>
                                        <button  type="button" class="btn btn-info" data-toggle="modal" data-target="#con-close-modal{{$data2->id}}">EDIT</button>
                                    </th>
                                    <th>
                                        <button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#danger-alert-modal{{$data2->id}}">DELETE</button>
                                    </th>
                                </tr>
                                @endforeach                              
                                </tbody>
                            </table>

                            <!--START OF ADD MODEL -->
                            @foreach ($data as $data)
                                
                                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">

                                                <form action="{{ route('exam.actionTheory') }}">

                                                    <input type="hidden" name="subject_name" value="{{$data->subject_name}}">
                                                    <input type="hidden" name="class" value="{{$data->class}}">
                                                    <input type="hidden" name="teacher" value="{{$data->teacher}}">
                                                    <input type="hidden" name="type" value="{{$data->exam_type}}">
                                                    <input type="hidden" name="date" value="{{$data->date}}">
                                                    <input type="hidden" name="time_of_exam" value="{{$data->start}}">
                                                    <input type="hidden" name="length_of_exam" value="{{$data->end}}">
                                                    <input type="hidden" name="mark_right" value="{{$data->question_right_mark}}">
                                                    <input type="hidden" name="mark_wrong" value="{{$data->question_wrong_mark}}">
                                                    <input type="hidden" name="section" value="{{$data->section}}">
                                                    <input type="hidden" name="term" value="{{$data->term}}">

                                                    <div class="form-group">
                                                        <label for="">Question</label>
                                                        <textarea class="form-control" name="question" id="example-textarea" rows="5" required value="{{ old('question') }}">

                                                        </textarea>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="example-textarea">Answer</label>
                                                        <textarea class="form-control" name="answer" id="example-textarea" rows="5" required value="{{ old('answer') }}">
                                                           
                                                        </textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Add</button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                            @endforeach
                            <!--END OF ADD MODEL -->


                            <!--START OF DELETE NODEL-->
                            @foreach ($data3 as $data3)
                           
                                <div id="danger-alert-modal{{$data3->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content modal-filled bg-danger">
                                            <div class="modal-body p-4">
                                                <div class="text-center">
                                                    <i class="dripicons-wrong h1 text-white"></i>
                                                    <h4 class="mt-2 text-white">Oh snap!</h4>
                                                    <p class="mt-3 text-white">are u sure u want to delete this exam question </p><br>
                                                    <p class="mt-3 text-white"><strong>{{$data3->question}}</strong></p>
                                                    <form action="{{ route('exam.deleteTheory') }}">
                                                        <input type="hidden" name="id" value="{{$data3->id}}">
                                                        <button type="submit" class="form-control btn btn-light m-2">Continue</button>
                                                        <button type="button" class="form-control btn btn-light m-2" data-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                            @endforeach     
                            <!--END OF DELETE NODEL-->   


                            <!--START OF EDIT MODEL-->
                            @foreach ($data4 as $data4)
                                <div id="con-close-modal{{$data4->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Question edit</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body p-4">
                                            <form action="{{ route('exam.updateTheory') }}">
                                                
                                                <input type="hidden" name="id" value="{{$data4->id}}">
                                                <input type="hidden" name="subject_name" value="{{$data4->subject_name}}">
                                                <input type="hidden" name="class" value="{{$data4->class}}">
                                                <input type="hidden" name="teacher" value="{{$data4->teacher}}">
                                                <input type="hidden" name="type" value="{{$data4->exam_type}}">
                                                <input type="hidden" name="date" value="{{$data4->date}}">
                                                <input type="hidden" name="time_of_exam" value="{{$data4->start}}">
                                                <input type="hidden" name="length_of_exam" value="{{$data4->end}}">
                                                <input type="hidden" name="mark_right" value="{{$data4->question_right_mark}}">
                                                <input type="hidden" name="mark_wrong" value="{{$data4->question_wrong_mark}}">
                                                <input type="hidden" name="section" value="{{$data4->section}}">
                                                <input type="hidden" name="term" value="{{$data4->term}}">

                                                <div class="form-group">
                                                    <label for="">Question</label>
                                                    <input type="text" name="question" class="form-control" required autocomplete="off" value="{{$data4->question}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Answer</label>
                                                    <textarea rows="8" class="form-control" name="answer" required >{{$data4->answer}}</textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                </div>

                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach     
                            <!--END OF EDIT MODEL-->
                        </div>
                    </div> 
                </div>
            </div>            

        </div>
        <br><br>
    </div> <!-- container -->
    
@endsection

@section('script')<!-- Plugins js-->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection