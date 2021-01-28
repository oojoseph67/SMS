@extends('layouts.adminvertical', ['title' => 'Result Check'])

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
                            <li class="breadcrumb-item active">Result Check</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Result Check</h4>
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
                        <h4 class="header-title">Result Checker</h4>
                        <p class="text-muted font-13 mb-4">
                        </p>

                      
                        <form action="{{ route('check.result') }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Class</label>
                                <select name="class" id="" required class="form-control">
                                    <option value="">-Choose-</option>
                                    @foreach($data3 as $data3)
                                    <option value="{{ $data3->class }}">{{ $data3->class }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Session</label>
                                <select name="section" id="" required class="form-control">
                                    <option value="">-Choose-</option>
                                    @foreach($data as $data)
                                    <option value="{{ $data->section }}">{{ $data->section }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Term</label>
                                <select name="term" id="" required class="form-control">    
                                    <option value="">-Choose-</option> 
                                    @foreach($data2 as $data2)                      
                                    <option value="{{$data2->term}}">{{$data2->term}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('View Result') }}</button>
                            </div>
                            
                        </form>
                           

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