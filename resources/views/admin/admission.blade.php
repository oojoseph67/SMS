
@extends('layouts.adminvertical', ['title' => 'Admission'])

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
                            <li class="breadcrumb-item active">Admission</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Admission</h4>
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
                        <h4 class="header-title"></h4>
                        <p class="text-muted font-13 mb-4">
                        </p>

                        <div class="table-responsive">
           
                            <table class="table table-hover" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Fullname')}}</th>
                                    <th scope="col">{{ __('Application Class')}}</th>
                                    <th scope="col">{{ __('Gender')}}</th>
                                    <th scope="col">{{ __('Date Of Birth')}}</th>                                    
                                    <th scope="col">{{ __('Guardian Name')}}</th>
                                    <th scope="col">{{ __('Guardian Email')}}</th>
                                    <th scope="col">{{ __('Guardian Phone Number')}}</th>
                                    <th scope="col">{{ __('Manuscript')}}</th>
                                    <th scope="col">{{ __('Action')}}</th>
                                </tr>
                            </thead>
                                <tbody>
                            @foreach( $details as $details ) 
                                    <tr>
                                        <th scope="row">00{{$details->id}}</th>
                                        <td>{{$details->fullname}}</td>
                                        <td>{{$details->entry_class}}</td>
                                        <td>{{$details->gender}}</td>
                                        <td>{{$details->dob}}</td>
                                        <td>{{$details->guardian_name}}</td>
                                        <td>{{$details->guardian_email}}</td>                                  
                                        <td>{{$details->guardian_phoneNumber}}</td>
                                        <td>{{$details->manuscript}}</td>
                                        <td>
                                            <div class="button-list">
                                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#multiple-one{{$details->id}}">Action</button>
                                            </div>
                                        </td> 
                                        <!-- Modal Begining -->
                                        <div id="multiple-one{{$details->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="multiple-oneModalLabel">Take Action</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5 class="mt-0">NB:: Make sure u have seen <b>{{$details->fullname}}</b> manuscript before making a descion</h5>
                                                        <p>.......</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-target="#multiple-two{{$details->id}}" data-toggle="modal" data-dismiss="modal">Accept</button>
                                                        <button type="button" class="btn btn-primary" data-target="#multiple-three{{$details->id}}" data-toggle="modal" data-dismiss="modal">Reject</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        <!-- Modal Two [Accept] -->
                                        <div id="multiple-two{{$details->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-twoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="multiple-twoModalLabel">Accept</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5 class="mt-0">You are going to accept <b>{{$details->fullname}}</b> into this system</h5>
                                                        <p>Are u sure u want to continue</p>
                                                    </div>
                                                    <form action="{{ route('admission.accept') }}">
                                                        <input type="hidden" name="id" value="{{$details->id}}">
                                                        <input type="hidden" name="student_id" value="{{$details->student_id}}">
                                                        <input type="hidden" name="fullname" value="{{$details->fullname}}">
                                                        <input type="hidden" name="section" value="{{auth()->user()->section}}">
                                                        <input type="hidden" name="term" value="{{auth()->user()->term}}">

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Accept</button>
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                        </div>                                
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


                                        <!-- Modal Three [Reject] -->
                                        <div id="multiple-three{{$details->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-twoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="multiple-twoModalLabel">Reject</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5 class="mt-0">You are going to reject <b>{{$details->fullname}}</b> admission into this system</h5>
                                                        <p>This by perfoming this action u will delete this candidate profile from our database.Are u sure u want to continue</p>
                                                    </div>
                                                    <form action="{{ route('admission.reject') }}">
                                                        <input type="hidden" name="id" value="{{$details->id}}">
                                                        <input type="hidden" name="fullname" value="{{$details->fullname}}">

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Accept</button>
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                        </div>                                
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
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