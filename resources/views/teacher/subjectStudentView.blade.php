@extends('layouts.teachervertical', ['title' => 'Registered Student'])

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
                            <li class="breadcrumb-item active">Registered Student </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Registered Student</h4>
                </div>

                <h4>This is a list of student that have registered for all the subject will be taking this term</h4>

                 <form action="{{ route('checkReg.student') }}">
                    @csrf
                    <div class="form-group">
                        <label for="">Class</label>
                        <select name="class" id="" required class="form-control">
                            <option value="">-Choose-</option>
                            @foreach($data3 as $data3)
                            <option value="{{ $data3->class }}">{{ $data3->class }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Session</label>
                        <select name="section" id="" required class="form-control">
                            <option value="">-Choose-</option>
                            @foreach($data as $data)
                            <option value="{{ $data->section }}">{{ $data->section }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Term</label>
                        <select name="term" id="" required class="form-control">    
                            <option value="">-Choose-</option> 
                            @foreach($data2 as $data2)                      
                            <option value="{{$data2->term}}">{{$data2->term}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4">{{ __('View Students') }}</button>
                    </div>
                    
                </form>

            </div>
        </div>     
        <!-- end page title --> 
        
    </div> <!-- container -->
@endsection

@section('script')
@endsection