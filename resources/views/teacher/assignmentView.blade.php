@extends('layouts.teachervertical', ['title' => 'Assignment Page'])

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
                            <li class="breadcrumb-item"><a href="{{ route('assignment') }}">Assignment</a></li>
                            <li class="breadcrumb-item active">Assignment for {{$subject_name}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Assignment for {{$subject_name}}</h4>
                </div>
            </div>
        </div>     
        <!-- <a class="btn btn-primary btn-lg waves-effect waves-light" href="{{ route('course.management') }}" role="button">Back</a> -->
 
        <!-- end page title --> 
        <div class="row">
            <div class="col-xl-12">
                <div class="card-box">
                    <h4 class="header-title mb-4"></h4>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="nav flex-column nav-pills nav-pills-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active show mb-1" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">
                                    Create Assignment</a>
                                <a class="nav-link mb-1" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                    aria-selected="false">
                                    View Assignment</a>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-md-10">
                            <div class="tab-content pt-0">
                            <!-- CREATE LESSON SECTION START -->
                                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">            
                                    @if (session('update'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('update') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if (session('assignment'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('assignment') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="card">
                                        <div class="card-body">
                                        @foreach( $info as $info )
                                            <form method="POST" action="{{ route('create.assignment') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="teacher" value="{{$info->teacher}}">
                                                <div class="form-group">
                                                    <label for="subject-name">Subject</label>
                                                    <input class="form-control" type="text" placeholder="{{$info->subject_name}}" disabled>
                                                    <input type="hidden" value="{{$info->subject_name}}" name="subject_name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="class">Class</label>
                                                    <input type="text" class="form-control" placeholder="{{$info->classes}}" disabled>
                                                    <input type="hidden" value="{{$info->classes}}" name="class">
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <label for="lesson-note">Question</label>
                                                    <textarea rows="8" class="form-control" name="question" required placeholder="Write something...."></textarea>
                                                    <div class="p-2 bg-light d-flex justify-content-between align-items-center"></div>
                                                </div>  

                                                <div class="form-group">
                                                    <label for="lesson-note">Answer</label>
                                                    <textarea rows="8" class="form-control" name="answer" required placeholder="Write something...."></textarea>
                                                    <div class="p-2 bg-light d-flex justify-content-between align-items-center"></div>
                                                </div>  

                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary" type="submit">Give Assignment</button>
                                                </div>                                       
                                            </form>
                                        @endforeach
                                        </div> 
                                    </div> 

                                </div>

                            <!-- CREATE LESSON SECTION END -->
        

                            <!-- VIEW LESSON SECTION START -->  
                            
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <div class="table-responsive">                    
                                        <table class="table table-hover" id="basic-datatable">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{{ __('Subject')}}</th>
                                                <th scope="col">{{ __('Class')}}</th>                                                
                                                <th scope="col">{{ __('Question')}}</th>
                                                <th scope="col">{{ __('Answer')}}</th>
                                                <th scope="col">{{ __('Edit')}}</th>
                                                <th scope="col">{{ __('Delete')}}</th>
                                                </tr>
                                            </thead>   
                                            <tbody>              
                                                @foreach ($details as $details)
                                                <tr>
                                                <th scope="row">00{{$details->id}}</th><!-- target="_blank"  -->
                                                <td>{{$details->subject_name}}</td>
                                                <td>{{$details->class}}</td>
                                                <td>{{$details->question}}</td>
                                                <td>{{$details->answer}}</td>
                                                
                                                <td>

                                                    <!-- START OF EDIT MODAL -->

                                                    <div id="signup-modal{{$details->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-body">
                                                                    <div class="text-center mt-2 mb-4">
                                                                        <a href="{{route('index')}}" class="text-success">
                                                                            <span><img src="{{asset('assets/images/logo-dark.png')}}"alt="" height="24"></span>
                                                                        </a>
                                                                    </div>
                                                                    
                                                                    <form action="{{ route('update') }}" enctype="multipart/form-data">

                                                                        <input type="hidden" name="id" value="{{$details->id}}">                                                                
                                                                        <div class="form-group">
                                                                            <label for="subject-name">Subject</label>
                                                                            <input class="form-control" type="text" placeholder="{{$details->subject_name}}" disabled>
                                                                            <input type="hidden" value="{{$details->subject_name}}" name="subject_name">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="class">Class</label>
                                                                            <input type="text" class="form-control" placeholder="{{$details->class}}" disabled>
                                                                            <input type="hidden" value="{{$details->class}}" name="class">
                                                                        </div>     

                                                                        <div class="form-group">
                                                                            <label for="lesson-note">Question</label>
                                                                            <textarea rows="8" class="form-control" name="question" required placeholder="Write something....">{{$details->question}}</textarea>
                                                                            <div class="p-2 bg-light d-flex justify-content-between align-items-center"></div>
                                                                        </div>  

                                                                        <div class="form-group">
                                                                            <label for="lesson-note">Answer</label>
                                                                            <textarea rows="8" class="form-control" name="answer" required placeholder="Write something....">{{$details->answer}}</textarea>
                                                                            <div class="p-2 bg-light d-flex justify-content-between align-items-center"></div>
                                                                        </div>  

                                                                        <div class="form-group text-center">
                                                                            <button class="btn btn-primary" type="submit">Update</button>
                                                                        </div>

                                                                    </form>
                                                                
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                    
                                                    <!-- START OF EDIT MODAL -->


                                                    <div class="button-list">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal{{$details->id}}">Edit</button>
                                                    </div>
                                                </td>

                                                
                                                <th>
                                                    <button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#danger-alert-modal{{$details->id}}">DELETE</button>
                                                </th>
                                                 
                                                 <!-- DELETE MODAL -->
                                                          
                                                    <div id="danger-alert-modal{{$details->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content modal-filled bg-danger">
                                                                <div class="modal-body p-4">
                                                                    <div class="text-center">
                                                                        <i class="dripicons-wrong h1 text-white"></i>
                                                                        <h4 class="mt-2 text-white">Oh snap!</h4>
                                                                        <p class="mt-3 text-white">are u sure u want to delete this assignment </p><br>
                                                                        <p class="mt-3 text-white"><strong>{{$details->question}}</strong></p>
                                                                        <form action="{{ route('assignment.delete') }}">
                                                                            <input type="hidden" name="subject_name" value="{{$details->subject_name}}">
                                                                            <input type="hidden" name="id" value="{{$details->id}}">
                                                                            <button type="submit" class="form-control btn btn-light m-2">Continue</button>
                                                                            <button type="button" class="form-control btn btn-light m-2" data-dismiss="modal">Close</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                 

                                                 <!-- DELETE MODAL -->
                                                </tr> 
                                                @endforeach                      
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                             <!-- VIEW LESSON SECTION END -->  

                             


                             


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
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
    
    <script>
        $(document).ready(function(){
            
        });
    </script>

@endsection

