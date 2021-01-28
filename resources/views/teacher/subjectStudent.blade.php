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

                 <form action="{{ route('yourStudent.check') }}">
                    @csrf
                    <div class="form-group col-4">
                        <select name="subject_name" id="" required class="form-control">
                            <option value="">-Choose-</option>
                            @foreach($info as $info)
                            <option value="{{ $info->subject_name }}">{{ $info->subject_name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <select class="form-control" name="class" required>
                            <option value="">-Choose-</option>
                            <option value="JSS1">JSS1</option>
                            <option value="JSS2">JSS2</option>
                            <option value="JSS3">JSS3</option>
                            <option value="SS1">SS1</option>
                            <option value="SS2">SS2</option>
                            <option value="SS3">SS3</option>
                        </select>
                    </div>
                    <div>
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