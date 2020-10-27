
@extends('layouts.adminvertical', ['title' => 'Subject'])

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
                            <li class="breadcrumb-item active">Subject</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Subject</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('exsist'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('exsist') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        </h4>
                        
                        <!-- <a class="btn btn-primary btn-md waves-effect waves-light" href="{{ route('createPage') }}" role="button">Add</a> -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Assign modal content -->
                                        <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-body">

                                                        <form class="px-3" action="{{ route('create.subject') }}" enctype="multipart/form-data">

                                                        <div class="form-group">
                                                        <label for="simpleinput">Subject Name</label>
                                                            <input type="text" id="simpleinput" name="subject_name" autocomplete="off" class="form-control" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="username">Select Class</label>
                                                            <select name="class" class="form-control" required>
                                                                <option value="">-Choose-</option>
                                                                <option value="JSS1">JSS1</option>
                                                                <option value="JSS2">JSS2</option>
                                                                <option value="JSS3">JSS3</option>
                                                                <option value="SS1">SS1</option>
                                                                <option value="SS2">SS2</option>
                                                                <option value="SS3">SS3</option>
                                                            </select>
                                                        </div>

                                                        
                                                            

                                                            <div class="form-group text-center">
                                                                <button class="btn btn-primary" type="submit">Add</button>
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


                                        <div class="button-list">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal">Add</button>
                                        </div>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                       
                        
                        <div class="table-responsive">
           
                            <table class="table table-hover" id="basic-datatable">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Subject Name</th>
                                <th scope="col">Class</th>  
                                <th scope="col">Created At</th> 
                                <th scope="col">Delete</th>               
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $subjects as $subjects ) 
                                <tr>
                                <th scope="row">{{$subjects->id}}</th>
                                <td>{{$subjects->subject_name}}</td>
                                <td>{{$subjects->class}} </td>
                                <td>{{$subjects->created_at}} </td>
                                <th scope="row"><a role="button" class="btn btn-sm btn-danger" href="/admin/delete/subject/{{$subjects->id}}">Delete</a></th>                
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