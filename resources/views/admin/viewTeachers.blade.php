
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
                                <th scope="col">{{ __('FullName')}}</th>
                                <th scope="col">{{ __('Email')}}</th>
                                <th scope="col">{{ __('Gender')}}</th>
                                <th scope="col">{{ __('Dob')}}</th>
                                <th scope="col">{{ __('Staff PhoneNumber')}}</th>
                                <th scope="col">{{ __('Guardian Name')}}</th>
                                <th scope="col">{{ __('Guardian Email')}}</th>
                                <th scope="col">{{ __('Guardian PhoneNumber')}}</th>
                                <th scope="col">{{ __('Staff ID')}}</th>
                                <th scope="col">{{ __('Registed At')}}</th>
                                <th scope="col">{{ __('View')}}</th>
                                <th scope="col">{{ __('Delete')}}</th>
                                </tr>
                            </thead>
                           
                            <tbody> 
                            @foreach( $teachers as $teachers ) 
                                <tr>
                                <th scope="row">00{{$teachers->id}}</th><!-- target="_blank"  -->
                                <td>{{$teachers->fullname}}</td>
                                <td>{{$teachers->email}} </td>
                                <td>{{$teachers->gender}} </td>
                                <td>{{$teachers->dob}} </td>
                                <td>{{$teachers->staff_phoneNumber}}</td>
                                <td>{{$teachers->guardian_name}}</td>
                                <td>{{$teachers->guardian_email}}</td>
                                <td>{{$teachers->guardian_phoneNumber}}</td>
                                <td>{{$teachers->staff_id}}</td>
                                <td>{{$teachers->created_at}}</td>
                                <th scope="row"><a role="button" class="btn btn-sm btn-primary" href="/admin/single/teacher/{{$teachers->id}}">View</a></th>
                                <th scope="row"><a role="button" class="btn btn-sm btn-primary" href="/admin/delete/{{$teachers->id}}">Delete</a></th>
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