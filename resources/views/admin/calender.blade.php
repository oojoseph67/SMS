
@extends('layouts.adminvertical', ['title' => 'Calender'])

@section('css')
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
                            <li class="breadcrumb-item active">Calender</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Calender</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Result Calculator</h4>
                        <p class="text-muted font-13 mb-4">
                        </p>

                        <h3>for termly update click the link below</h3>
                        <a href="{{ route('calender.updateTerm') }}" target="_blank" class="btn btn-primary">Click Me!!!</a>

                    
                        <h3>for section update click the link below</h3>
                        <a href="{{ route('calender.updateSection') }}" target="_blank" class="btn btn-primary">Click Me!!!</a>
                       
                        

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

        

        
    </div> <!-- container -->
@endsection

@section('script')
@endsection