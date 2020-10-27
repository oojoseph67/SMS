@extends('layouts.fees', ['title' => 'Term Update'])

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
                            <li class="breadcrumb-item active">Term Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Term Update</h4>
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
                        <h4 class="header-title">Calender Update</h4>
                        <p class="text-muted font-13 mb-4">
                        </p>

                        <!-- ALERT SECTION START -->

                            @if (session('term'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('term') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session('password'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('password') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                        <!-- ALERT SECTION END -->

                        <p>Current Section {{auth()->user()->section}}</p>
                        <p>Current Term {{auth()->user()->term}}</p>

                        
                        <form action="{{ route('calender.updateTermAction') }}">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Input new term</label>
                                    <div class="form-group">
                                        <label for="example-number-input" class="form-control-label">Select Term</label><br>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="term" required class="custom-control-input" value="1st">
                                            <label class="custom-control-label" for="customRadioInline1">1st</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="term" required class="custom-control-input" value="2nd">
                                            <label class="custom-control-label" for="customRadioInline2">2nd</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline3" name="term" required class="custom-control-input" value="3rd">
                                            <label class="custom-control-label" for="customRadioInline3">3rd</label>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="button-list">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#multiple-one">Update</button>
                                </div>
                                

                                <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="multiple-oneModalLabel">Calender Update</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="mt-0">By doing this u will start a new</h5>
                                                <p>.......</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-target="#multiple-two" data-toggle="modal" data-dismiss="modal">Continue</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                            
                                <div id="multiple-two" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-twoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="multiple-twoModalLabel">Calender Update</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="mt-0">Are u sure u want to procced with this</h5>
                                                <p>Are u sure u want to continue</p>
                                            </div>                                      

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-target="#multiple-three" data-toggle="modal" data-dismiss="modal">Accept</button>
                                            </div>                               
                                        
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <div id="multiple-three" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-twoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="multiple-twoModalLabel">Accept</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="mt-0">Please input your password to continue</h5>
                                                
                                                <div class="form-group">
                                                    <label for="">Password</label>
                                                    <input type="password" name="password" class="form-control">
                                                    <div class="input-group-append" data-password="false">
                                                        <div class="input-group-text">
                                                            <span class="password-eye"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                      

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Update Calender</button>
                                            </div>                               
                                        
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
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
    var countDownDate = new Date("Oct 30, 2020 00:21:25").getTime();

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
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/jquery-mask-plugin/jquery-mask-plugin.min.js')}}"></script>
        <script src="{{asset('assets/libs/autonumeric/autonumeric.min.js')}}"></script>

        <!-- Page js-->
        <script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

@endsection