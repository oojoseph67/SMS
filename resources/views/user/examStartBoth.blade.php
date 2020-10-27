@extends('layouts.exam', ['title' => 'Exam Start Theory'])

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
                            <li class="breadcrumb-item active">Exam Start</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Exam Start</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title">{{$subject_name}} Exam For {{ auth()->user()->term }} term {{ auth()->user()->section }} section</h4>
                    <p class="sub-header">

                    </p>

                    
                    <form action="{{ route('exam.submitBoth') }}">
                        {{ csrf_field() }}
                        <?php 
                            $count=1;
                        ;?>
                        <input type="hidden" name="subject_name" value="{{$subject_name}}">

                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Questions</h4>

                                <ul class="nav nav-pills navtab-bg nav-justified">
                                    <li class="nav-item">
                                        <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                            Objective Questions
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Theory Questions
                                        </a>
                                    </li>
                                </ul>    
                                  
                                    <div class="tab-content">
                                    @foreach($details as $details) 
                                        <div class="tab-pane show active" id="home1">
                                            @if($details->type_both == 'Obj')
                                                    <input type="hidden" name="correct_answer[{{$count}}]" value="{{$details->answer}}">
                                                    <input type="hidden" name="mark_correct" value="{{$details->question_right_mark_obj}}">
                                                    <input type="hidden" name="option1[{{$count}}]" value="{{$details->option1}}">
                                                    <input type="hidden" name="option2[{{$count}}]" value="{{$details->option2}}">
                                                    <input type="hidden" name="option3[{{$count}}]" value="{{$details->option3}}">
                                                    <input type="hidden" name="option4[{{$count}}]" value="{{$details->option4}}">


                                                    <div class="form-group">
                                                        <label for="">Question</label>
                                                        <textarea name="question" id="" cols="10" rows="5" class="form-control" disabled>{{$details->question}}</textarea>
                                                        <input type="hidden" name="question[{{$count}}]" value="{{$details->question}}">
                                                    </div>
                                                
                                                    
                                                    <div class="form-group">
                                                        <label for="example-number-input" class="form-control-label">Options</label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline1{{$details->id}}" name="user_answer[{{$count}}]" class="custom-control-input" value="{{$details->option1}}" required>
                                                            <label class="custom-control-label" for="customRadioInline1{{$details->id}}">{{$details->option1}}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline2{{$details->id}}" name="user_answer[{{$count}}]" class="custom-control-input" value="{{$details->option2}}" required>
                                                            <label class="custom-control-label" for="customRadioInline2{{$details->id}}">{{$details->option2}}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline3{{$details->id}}" name="user_answer[{{$count}}]" class="custom-control-input" value="{{$details->option3}}" required>
                                                            <label class="custom-control-label" for="customRadioInline3{{$details->id}}">{{$details->option3}}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline4{{$details->id}}" name="user_answer[{{$count}}]" class="custom-control-input" value="{{$details->option4}}" required>
                                                            <label class="custom-control-label" for="customRadioInline4{{$details->id}}">{{$details->option4}}</label>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                            @endif
                                        </div>
                                    

                                        <div class="tab-pane" id="profile1">  
                                            @if($details->type_both == 'Theory')
                                                <input type="hidden" name="correct_answer_theory[{{$count}}]" value="{{$details->answer}}">
                                                    <input type="hidden" name="mark_correct_theory" value="{{$details->question_right_mark_theory}}">
                                                    <div class="form-group">
                                                        <label for="">Question</label>
                                                        <textarea name="question" id="" cols="10" rows="5" class="form-control" disabled>{{$details->question}}</textarea>
                                                        <input type="hidden" name="question_theory[{{$count}}]" value="{{$details->question}}">
                                                    </div>
                                                
                                                    
                                                    <div class="form-group">
                                                    <label for="">Answer</label>
                                                    <textarea required name="user_answer_theory[{{$count}}]" id="user_answer{{$details->id}}" cols="30" rows="10" class="form-control"></textarea>
                                                    </div>

                                                    <br><br><br>
                                            @endif                                  
                                        </div>                                
                                    <?php $count++; ?>
                                    @endforeach
                                    </div>
                                
                            </div> 
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" target="_blank" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

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