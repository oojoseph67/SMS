@extends('layouts.fees', ['title' => 'Section Update'])

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
                            <li class="breadcrumb-item active">Section Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Section Update</h4>
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

                            @if (session('section'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('section') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif


                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
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

                            @if (session('jssone'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('jssone') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session('jsstwo'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('jsstwo') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session('jssthree'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('jssthree') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session('ssone'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('ssone') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session('sstwo'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('sstwo') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session('ssthree'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('ssthree') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                        <!-- ALERT SECTION END -->

                        <p>Current Section {{auth()->user()->section}}</p>
                        <p>Current Term {{auth()->user()->term}}</p>

                        
                        <form action="{{ route('update.calender') }}">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Input new section name</label>
                                    <input type="text" data-toggle="input-mask" data-mask-format="0000/0000" placeholder="1234/5678" name="section" class="form-control" required>
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

                        @foreach($jss1 as $jss1)
                            @if($jss1->promotion_status == 'NOTYET')
                                <form action="{{ route('promote.jss1') }}">
                                    <div class="form-group">
                                        <input type="hidden" name="jss1" value="JSS1">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">Promote All JSS1 Student to JSS2</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach

                        @foreach($jss2 as $jss2)
                            @if($jss2->promotion_status == 'NOTYET')
                                <form action="{{ route('promote.jss2') }}">
                                    <div class="form-group">
                                        <input type="hidden" name="jss2" value="JSS2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">Promote All JSS2 Student to JSS3</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach


                        @foreach($jss3 as $jss3)
                            @if($jss3->promotion_status == 'NOTYET')
                                <form action="{{ route('promote.jss3') }}">
                                    <div class="form-group">
                                        <input type="hidden" name="jss3" value="JSS3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">Promote All JSS3 Student to SS1</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach


                        @foreach($ss1 as $ss1)
                            @if($ss1->promotion_status == 'NOTYET')
                                <form action="{{ route('promote.ss1') }}">
                                    <div class="form-group">
                                        <input type="hidden" name="ss1" value="SS1">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">Promote All SS1 Student to SS2</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach

                        @foreach($ss2 as $ss2)
                            @if($ss2->promotion_status == 'NOTYET')
                                <form action="{{ route('promote.ss2') }}">
                                    <div class="form-group">
                                        <input type="hidden" name="ss2" value="SS2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">Promote All SS2 Student to SS3</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach

                        @foreach($ss3 as $ss3)
                            @if($ss3->promotion_status == 'NOTYET')
                                <form action="{{ route('promote.ss3') }}">
                                    <div class="form-group">
                                        <input type="hidden" name="ss3" value="SS3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">Graduted all SS3 student</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach

                        @foreach($done as $done)
                            <h1>Promotion for this section has been compeleted</h1>
                        @endforeach

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