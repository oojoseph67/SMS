@extends('layouts.fees', ['title' => 'Exam Finished Theory'])

@section('css')
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <!-- <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Starter</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Starter</h4>
                </div>
            </div>
        </div>      -->
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1 class="display-4">Congrats !!!!</h1>
                    <p class="lead">Well done on finishing your exam on {{$subject_name}}.</p>
                    <h4 class="lead">Here is your result.</h4>
                    <hr class="my-4">
                    <a class="btn btn-primary btn-lg waves-effect waves-light" href="{{ route('home') }}" target="_blank" role="button">Back To DashBoard</a>
                </div>
            </div>
        </div>


        <div class="d-flex" id="wrapper">
            <div class="container">
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Fullname</th>
                                    <td>{{auth()->user()->fullname}} </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{auth()->user()->email}}</td>
                                </tr>
                                <tr>
                                    <th>Student ID</th>
                                    <td>{{auth()->user()->student_id}}</td>
                                </tr>
                                <tr>
                                    <th>Subject</th>
                                    <td>{{$subject_name}}</td>
                                </tr>
                                <tr>
                                    <th>Class</th>
                                    <td>{{auth()->user()->current_class}}</td>
                                </tr>
                                <tr>
                                    <th>Score</th>
                                    <td>{{$result_score}}</td>
                                </tr>
                            </table>
                            <table class="table table-bordered table-striped">
                                <?php $n = 0 ?>
                                @foreach($data as $data)
                                    <?php $n++ ?>
                                    <thead>
                                        <tr class="test-option-false">
                                            <th>Question #{{$n}}</th>
                                            <th>Expexted Answer</th>
                                            <th>User Answer</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th>{{$data->question}}</th>                                       
                                            <th>{{$data->user_answer}}</th>  
                                            <th>{{$data->correct_answer}}</th>    
                                        </tr>                         
                                    </tbody>
                                    
                                        <!-- <em style="font-weight: bold;">(your answer)</em> -->                                
                                @endforeach
                            </table>
                        </div>
                    </div>
            </div>
        </div>

        
        
    </div> <!-- container -->
@endsection

@section('script')
@endsection