@extends('layouts.vertical', ['title' => 'Payment'])

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
                            <li class="breadcrumb-item active">Payment</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Payment</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"></h4>
                        <p class="text-muted font-13 mb-4">
                        </p>

                        <div class="table-responsive">
           
                            <table class="table table-hover" id="basic-datatable">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Registration Fee')}}</th>
                                <th scope="col">{{ __('School Fees')}}</th>
                                <th scope="col">{{ __('PTA Fees')}}</th>
                                <th scope="col">{{ __('Lesson Fee')}}</th>
                                <th scope="col">{{ __('Section')}}</th>
                                <th scope="col">{{ __('Term')}}</th>
                                </tr>
                            </thead>
                                <tbody> <!-- <th scope="row"><a role="button" class="btn btn-sm btn-primary" href="">Delete</a></th> -->
                                    @foreach($details as $details)  
                                    <tr>
                                    <th scope="row">#</th>
                                    @if($details->reg_fees_price)
                                    <td>
                                        <div class="card mb-0 shadow-none border">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-secondary rounded">
                                                        PDF
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col pl-5">
                                                <a href="javascript:void(0);" class="text-muted font-weight-bold"></a>
                                                <p class="mb-0"></p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="{{  route('invoice.reg', ['id' => $details->id])  }}" target="_blank" class="btn btn-link btn-lg text-muted">
                                                    <i class="dripicons-download"></i>
                                                </a>
                                            </div>
                                        </div>                                                        
                                    </td>
                                    @else
                                    <td>...</td>
                                    @endif

                                    
                                    @if($details->school_fees_price)
                                    <td>
                                        <div class="card mb-0 shadow-none border">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-secondary rounded">
                                                        PDF
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col pl-5">
                                               
                                                <a href="javascript:void(0);" class="text-muted font-weight-bold"></a>
                                                <p class="mb-0"></p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="{{  route('invoice.school', ['id' => $details->id])  }}" target="_blank" class="btn btn-link btn-lg text-muted">
                                                    <i class="dripicons-download"></i>
                                                </a>
                                            </div>
                                        </div>                                                        
                                    </td>
                                    @else
                                    <td>...</td>
                                    @endif


                                    @if($details->pta_fees_price)
                                    <td>
                                        <div class="card mb-0 shadow-none border">
                                        
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-secondary rounded">
                                                        PDF
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col pl-5">
                                               
                                                <a href="javascript:void(0);" class="text-muted font-weight-bold"></a>
                                                <p class="mb-0"></p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="{{  route('invoice.pta', ['id' => $details->id])  }}" target="_blank" class="btn btn-link btn-lg text-muted">
                                                    <i class="dripicons-download"></i>
                                                </a>
                                            </div>
                                        </div>                                                        
                                    </td>
                                    @else
                                    <td>....</td>
                                    @endif
                                    
                                    <td>Lesson Fee Payment</td>                                    
                                    <td>{{$details->section}}</td>
                                    <td>{{$details->term}}</td>
                            
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