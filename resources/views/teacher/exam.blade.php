@extends('layouts.teachervertical', ['title' => 'Exam'])

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
                            <li class="breadcrumb-item active">Exam</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Exam</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Display the countdown timer in an element -->
        <p id="demo"></p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">List assigned subject</h4>
                        <p class="text-muted font-13 mb-4">
                        </p>

                        <div class="table-responsive">
           
                        <table class="table table-hover" id="basic-datatable">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Subject')}}</th>
                                <th scope="col">{{ __('Class')}}</th>
                                <th scope="col">{{ __('Exam Type')}}</th>
                                <th scope="col">{{ __('Set Exam')}}</th>
                                <th scope="col">{{ __('View')}}</th>
                                </tr>
                            </thead>
                           
                                <tbody> 
                                @foreach( $details as $details )
                                   
                                    <tr>
                                    <th scope="row">00{{$details->id}}</th>
                                    <td>{{$details->subject_name}}</td>
                                    <td>{{$details->classes}} </td>  
                                    @if($details->exam_type == '')
                                    <th>Not Yet Created</th>
                                    @else
                                    <td>{{$details->exam_type}}</td>   
                                    @endif                               

                                    
                                    @if($details->exam_status == 'NOT CREATED')
                                        <th scope="row"><a type="button" class="btn btn-primary" href="/teacher/examset/{{$details->subject_name}}">SET</a></th> 
                                        <th>You have not set an exam for this course</th>
                                        
                                                                      
                                    @else
                                        @if($details->exam_type == 'Obj')
                                            <th>Exam already exsist</th>
                                            <th scope="row"><a type="button" class="btn btn-primary" href="/teacher/examview/{{$details->subject_name}}">VIEW</a></th>
                                        @elseif($details->exam_type == 'Theory')
                                            <th>Exam already exsist</th>
                                            <th scope="row"><a type="button" class="btn btn-primary" href="/teacher/examview/theory/{{$details->subject_name}}">VIEW</a></th>
                                        @elseif($details->exam_type == 'Both')
                                            <th>Exam already exsist</th>
                                            <th scope="row"><a type="button" class="btn btn-primary" href="/teacher/examview/both/{{$details->subject_name}}">VIEW</a></th>
                                        @endif
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
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Sep 30, 2020 00:21:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
    }, 1000);
</script>

    <!-- Plugins js-->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

@endsection