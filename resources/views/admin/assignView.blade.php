
@extends('layouts.adminvertical', ['title' => 'Admin'])

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
                            <li class="breadcrumb-item active">View Teacher</li>
                        </ol>
                    </div>
                    <h4 class="page-title">View Teacher</h4>
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
                                <th scope="col">{{ __('Teacher')}}</th>
                                <th scope="col">{{ __('Class')}}</th>
                                <th scope="col">{{ __('Delete')}}</th>
                                </tr>
                            </thead>
                                <tbody>
                            @foreach( $assign as $assign ) 
                                    <tr>
                                    <th scope="row">00{{$assign->id}}</th>
                                    <td>{{$assign->subject_name}}</td>
                                    <td>{{$assign->teacher}} </td>
                                    <td>{{$assign->classes}} </td>                                    
                                    <th scope="row"><a role="button" class="btn btn-sm btn-primary" href="/admin/delete/assign/{{$assign->id}}">Delete</a></th>
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
@endsection