@extends('layouts.vertical', ['title' => 'Subjects'])

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
                            <li class="breadcrumb-item active">Subject </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Subject for {{auth()->user()->current_class}} </h4>
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
                                <th scope="col">{{ __('Subject')}}</th>
                                <th scope="col">{{ __('Section')}}</th>
                                <th scope="col">{{ __('Term')}}</th>
                                <th scope="col">{{ __('Teacher')}}</th>
                                </tr>
                            </thead>
                                <tbody>
                            @foreach( $data as $data ) 
                                    <tr>
                                    <th scope="row">00{{$data->id}}</th>
                                    <td>{{$data->subject_name}}</td>
                                    <td>{{$data->section}} </td>
                                    <td>{{$data->term}} </td>
                                    <td>{{$data2}}</td>
                            @endforeach
                                    </tr>  
                                                 
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