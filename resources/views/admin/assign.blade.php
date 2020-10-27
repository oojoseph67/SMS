@extends('layouts.adminvertical', ['title' => 'Assign'])

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
                            <li class="breadcrumb-item active">Assign</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Assign</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 


            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h1 class="header-title">Assign Page</h1>
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Teacher</th>
                                        <th>Assign</th>
                                    </tr>
                                </thead>
                            
                                <tbody>  
                                    @foreach( $teachers as $teachers ) 
                                        <tr>
                                            <td>{{$teachers->id}}</td>
                                            <td>{{$teachers->fullname}}</td>
                                            <td>
                                                <div class="col-xl-6">
                                                            <!-- Assign modal content -->
                                                            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <div class="modal-body">

                                                                            <form class="px-3" action="{{ route('assignteacher') }}" enctype="multipart/form-data">

                                                                            <div class="form-group">
                                                                                <label for="username">Teacher</label>
                                                                                <input class="form-control" type="text" name="teacher" required="" placeholder="{{$teachers->fullname}}" value="{{$teachers->fullname}}"> 
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="username">Select Class</label>
                                                                                <select name="class" class="form-control">
                                                                                    <option value="">-Choose-</option>
                                                                                    <option value="JSS1">JSS1</option>
                                                                                    <option value="JSS2">JSS2</option>
                                                                                    <option value="JSS3">JSS3</option>
                                                                                    <option value="SS1">SS1</option>
                                                                                    <option value="SS2">SS2</option>
                                                                                    <option value="SS3">SS3</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group"> 
                                                                                <label for="username">Select Subject</label>
                                                                                <select name="subject" class="form-control">
                                                                                    <option value="">-Choose-</option>
                                                                                    @if( count($subjects)>0 ) 
                                                                                        @foreach($subjects->all() as $subjectsView)
                                                                                            <option value="{{$subjectsView->subject_name}}">{{$subjectsView->subject_name}}</option>
                                                                                        @endforeach
                                                                                    @endif 
                                                                                </select>
                                                                            </div>

                                                                                

                                                                                <div class="form-group text-center">
                                                                                    <button class="btn btn-primary" type="submit">Assign</button>
                                                                                </div>

                                                                            </form>

                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->


                                                            <div class="button-list">
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal">Assign</button>
                                                            </div>

                                                </div> <!-- end col -->
                                            </td>
                                        </tr>  
                                    @endforeach 
                                </tbody>
                            </table>
                        </div> <!-- end .table-responsive-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->





    </div> <!-- container -->
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection



