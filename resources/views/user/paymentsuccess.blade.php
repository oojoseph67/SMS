@extends('layouts.fees', ['title' => 'Celebration'])

@section('css')
@endsection

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Starter</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Starter</h4>
                </div>
            </div>
        </div>      -->
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1 class="display-4">Congrats !!!!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <a class="btn btn-primary btn-lg waves-effect waves-light" href="{{ route('home') }}" role="button">Back To DashBoard</a>
                </div>
            </div> <!-- end col -->
        </div>
        
    </div> <!-- container -->
@endsection

@section('script')
@endsection