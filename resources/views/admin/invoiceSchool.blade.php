@extends('layouts.fees', ['title' => 'School Fees'])


@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

    @foreach( $invoice as $invoice ) 
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
                                <p><b>Hello, {{ $invoice->fullname }}</b></p>
                                <p class="text-muted">Congragulations on paying your schools. Hope you have a blast term </p>
                            </div>

                        </div><!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-3 float-right">
                                <p class="m-b-10"><strong>Order Date : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; {{$invoice->order_date}}</span></p>
                                <p class="m-b-10"><strong>Order Status : </strong> <span class="float-right"><span class="badge badge-danger">{{$invoice->status}}</span></span></p>
                                <p class="m-b-10"><strong>Order Number : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; {{$invoice->order_number}}</span></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <h6>Billing Address</h6>
                            <address>
                                {{$invoice->fullname}}<br>
                                {{$invoice->email}}<br>
                                {{$invoice->student_id}}<br>
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
                                        <th style="width: 10%">Term</th>
                                        <th style="width: 10%">Section</th>
                                        <th style="width: 10%">Class</th>
                                        <th style="width: 10%" class="text-right">Total</th>
                                    </tr></thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <b>School Fees</b>
                                        </td>
                                        <td>{{$invoice->term}}</td>
                                        <td>{{$invoice->section}}</td>
                                        <td>{{$invoice->class}}</td>
                                        <td class="text-right">{{$invoice->school_fees_price}}</td>
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
                                <h3>#{{$invoice->school_fees_price}}</h3>   
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mt-4 mb-1">
                        <div class="text-right d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                        </div>
                    </div>
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>
    @endforeach  
    </div> <!-- container -->
@endsection

@section('script')
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>
@endsection