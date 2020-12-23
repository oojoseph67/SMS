@extends('layouts.vertical', ['title' => 'Result Checker'])

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
                            <li class="breadcrumb-item active">Result Checker</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Result Checker</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

       
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"></h4>
                        <p class="text-muted font-13 mb-4">
                        </p>

                            <form action="{{ route('result.checkerProcess') }}">
                                {{ csrf_field() }}

                                <h1>Current Class {{auth()->user()->current_class}}</h1>

                                <div class="form-group">
                                    <label for="">Select Section</label>
                                    <select name="section" id="" class="form-control" required>
                                        <option value="">-Choose-</option>
                                        @foreach($section as $section)
                                            <option value="{{$section->section}}">{{$section->section}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Select Term</label>
                                    <select name="term" id="" class="form-control" required>
                                        <option value="">-Choose-</option>
                                        @foreach($term as $term)
                                            <option value="{{$term->term}}">{{$term->term}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" target="_blank">Check</button>
                                </div>

                            </form>     


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