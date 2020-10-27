@extends('layouts.vertical', ['title' => 'Pricing'])

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
                            <li class="breadcrumb-item active">Pricing</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pricing</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 


        <div class="row justify-content-center">
            <div class="col-xl-10">

                <!-- Pricing Title-->
                <div class="text-center">
                    <p class="text-muted w-50 m-auto">
                      To compelete your registration please pay your registration fee
                    </p>
                </div>


                <?php
                    $email = Auth::user()->email;
                    $price = Auth::user()->reg_fees_price;                        
                ?>

                                <!-- Plans -->
                <div class="row my-3">
                    <div class="col-md-4">
                        <div class="card card-pricing">
                            <div class="card-body text-center">
                                <p class="card-pricing-plan-name font-weight-bold text-uppercase">Registrtion Fee</p>
                                <span class="card-pricing-icon text-primary">
                                    <i class="fe-users"></i>
                                </span>
                                <h2 class="card-pricing-price">#<?php echo $price?><span>/ Once</span></h2>
                                <ul class="card-pricing-features">
                                    <li>10 GB Storage</li>
                                    <li>500 GB Bandwidth</li>
                                    <li>No Domain</li>
                                    <li>1 User</li>
                                    <li>Email Support</li>
                                    <li>24x7 Support</li>
                                </ul>
                                    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                        <div class="row" style="margin-bottom:40px;">
                                            <div class="col-md-8 col-md-offset-2">
                                            
                                                <input type="hidden" name="email" value="<?php echo $email ?>"> {{-- required --}}
                                                <input type="hidden" name="orderID" value="345">
                                                <input type="hidden" name="amount" value="<?php echo $price; ?>"> {{-- required in kobo --}}
                                                <input type="hidden" name="quantity" value="3">
                                                <input type="hidden" name="currency" value="NGN">                                
                                                <input type="hidden" name="callback_url" value="http://localhost:90/payment/callback/reg">
                                                <input type="hidden" name="metadata" value="{{ json_encode($array = [
                                                    'fullname' => Auth::user()->fullname,
                                                    'email' => Auth::user()->email,
                                                    'dob' => Auth::user()->dob,
                                                    'term' => Auth::user()->term,
                                                    'gender' => Auth::user()->gender,
                                                    'guardian_name' => Auth::user()->guardian_name,
                                                    'guardian_phoneNumber' => Auth::user()->guardian_phoneNumber,
                                                    'guardian_email' => Auth::user()->guardian_email,
                                                    'student_id' => Auth::user()->student_id,
                                                    'class' => Auth::user()->entry_class,
                                                    'reg_fees_price' => Auth::user()->reg_fees_price,                                    
                                                    'section' => Auth::user()->section,
                                                    ]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                                <p>
                                                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>


                            </div>
                        </div> <!-- end Pricing_card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col-->
        </div>
        <!-- end row -->
        
    </div> <!-- container -->
@endsection