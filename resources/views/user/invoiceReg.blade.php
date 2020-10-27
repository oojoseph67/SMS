@extends('layouts.fees', ['title' => 'Registration Fees'])

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Extras</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Invoice</h4>
                </div>
            </div>
        </div>      -->
        <!-- end page title --> 
        @foreach($details as $details)
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <!-- Logo & title -->
                    <div class="clearfix">
                        <div class="float-left">
                            <div class="auth-logo">
                                <div class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="{{asset('assets/images/logo-dark.png')}}"alt="" height="22">
                                    </span>
                                </div>
            
                                <div class="logo logo-light">
                                    <span class="logo-lg">
                                        <img src="{{asset('assets/images/logo-light.png')}}"alt="" height="22">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <h4 class="m-0 d-print-none">Invoice</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <p><b>Hello, {{auth()->user()->fullname}}</b></p>
                                <h4 class="text-muted"><b>Congragulations on being a member of BBIA</b></h4>
                            </div>

                        </div><!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-3 float-right">
                                <p class="m-b-10"><strong>Order Date : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; {{$details->created_at}}</span></p>
                                <p class="m-b-10"><strong>Order Status : </strong> <span class="float-right"><span class="badge badge-danger">Paid</span></span></p>
                                <p class="m-b-10"><strong>Order No. : </strong> <span class="float-right">{{$details->order_number}}</span></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <h6>Billing Address</h6>
                            <address>
                                {{$details->fullname}}<br>
                                {{$details->email}}<br>
                                {{$details->student_id}}<br>
                            </address>
                        </div> <!-- end col -->

                        <div class="col-sm-6">
                            <h6>Shipping Address</h6>
                            <address>
                                BBIA<br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div> <!-- end col -->
                    </div> 
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4 table-centered" id="datatable-buttons">
                                    <thead>
                                    <tr><th>#</th>
                                        <th>Item</th>
                                        <th style="width: 10%">Duration</th>
                                        <th style="width: 10%">Entry Class</th>
                                        <th style="width: 10%" class="text-right">Total</th>
                                    </tr></thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <b>Registration Fees</b>
                                        </td>
                                        <td><b>For Life</b></td>
                                        <td>{{$details->class}}</td>
                                        <td class="text-right">{{$details->reg_fees_price}}</td>
                                    </tr>
                                  
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix pt-5">
                                <h4 class="text-muted">Notes:</h4>

                                <small class="text-muted">
                                   After Payment Take A Copy Of The Invoice To The Admin For Confirmation
                                </small>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-right">
                                <h3>#{{$details->reg_fees_price}}</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mt-4 mb-1">
                        <div class="text-right d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                            <!-- <a href="#" class="btn btn-info waves-effect waves-light">Submit</a> -->
                        </div>
                    </div>
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>
        <!-- end row --> 
        @endforeach
        
    </div> <!-- container -->
@endsection