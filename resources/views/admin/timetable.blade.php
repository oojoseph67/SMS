
@extends('layouts.adminvertical', ['title' => 'TimeTable'])

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
                            <li class="breadcrumb-item active">TimeTable</li>
                        </ol>
                    </div>
                    <h4 class="page-title">TimeTable</h4>
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
        
        @foreach($data as $data)
            <h1 align="center">{{$data->class}}</h1>
            <table border="5" cellspacing="0" align="center"> 

                <!--<caption>Timetable</caption>-->

                <tr> 

                    <td align="center" height="50" 

                        width="100"><br> 

                        <b>Day/Period</b></br> 

                    </td>  

                    <td align="center" height="50" 

                        width="100"> 

                        <b>I<br>8:00-8:40</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>II<br>8:40-9:20</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>III<br>9:20-10:00</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>10:00-10:20</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>IV<br>10:20-11:00</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>V<br>11:00-11:40</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>VI<br>11:40-12:20</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>VII<br>12:20-12:30</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>VIII<br>12:30-1:10</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>IV<br>1:10-1:50</b> 

                    </td> 

                </tr> 

                <tr> 

                    <td align="center" height="50"> 

                        <b>Monday</b>
                    
                    </td> 

                    <td align="center" height="50">{{$data->first_period}}</td> 

                    <td align="center" height="50">{{$data->second_period}}</td> 
                    
                    <td align="center" height="50">{{$data->third_period}}</td>
                    
                    <td rowspan="6" align="center" height="50"> 

                        <h2>L<br>U<br>N<br>C<br>H</h2> 

                    </td> 

                    

                    <td align="center" height="50">{{$data->fourth_period}}</td> 

                    <td align="center" height="50">{{$data->fifth_period}}</td>
                    
                    <td align="center" height="50">{{$data->sixth_period}}</td>

                    <td rowspan="6" align="center" height="50"> 

                        <h2>L<br>U<br>N<br>C<br>H</h2> 

                    </td> 
                    
                   

                    <td align="center" height="50">{{$data->seventh_period}}</td>

                    <td align="center" height="50">{{$data->eight_period}}</td>

                </tr> 

                <tr> 

                    <td align="center" height="50"> 

                        <b>Tuesday</b> 

                    </td> 

                    <td align="center" height="50">{{$data->first_period}}</td> 

                    <td align="center" height="50">{{$data->second_period}}</td> 

                    <td align="center" height="50">{{$data->third_period}}</td> 

                    <td align="center" height="50">{{$data->fourth_period}}</td> 

                    <td align="center" height="50">{{$data->fifth_period}}</td>

                    <td align="center" height="50">{{$data->sixth_period}}</td>

                    <td align="center" height="50">{{$data->seventh_period}}</td>

                    <td align="center" height="50">{{$data->eight_period}}</td>

                </tr> 

                <tr> 

                    <td align="center" height="50"> 

                        <b>Wednesday</b> 

                    </td> 

                    <td align="center" height="50">{{$data->first_period}}</td> 

                    <td align="center" height="50">{{$data->second_period}}</td> 

                    <td align="center" height="50">{{$data->third_period}}</td> 

                    <td align="center" height="50">{{$data->fourth_period}}</td> 

                    <td align="center" height="50">{{$data->fifth_period}}</td>

                    <td align="center" height="50">{{$data->sixth_period}}</td>

                    <td align="center" height="50">{{$data->seventh_period}}</td>

                    <td align="center" height="50">{{$data->eight_period}}</td>
                    

                </tr> 

                <tr> 

                    <td align="center" height="50"> 

                        <b>Thursday</b> 

                    </td> 

                    <td align="center" height="50">{{$data->first_period}}</td> 

                    <td align="center" height="50">{{$data->second_period}}</td> 

                    <td align="center" height="50">{{$data->third_period}}</td> 

                    <td align="center" height="50">{{$data->fourth_period}}</td>

                    <td align="center" height="50">{{$data->fifth_period}}</td> 

                    <td align="center" height="50">{{$data->sixth_period}}</td>

                    <td align="center" height="50">{{$data->seventh_period}}</td>

                    <td align="center" height="50">{{$data->eight_period}}</td>
                    

                </tr> 

                <tr> 

                    <td align="center" height="50"> 

                        <b>Friday</b> 

                    </td> 

                    <td align="center" height="50">{{$data->first_period}}</td>
                    <td align="center" height="50">{{$data->second_period}}</td> 

                    <td align="center" height="50">{{$data->third_period}}</td> 

                    <td align="center" height="50">{{$data->fourth_period}}</td> 

                    <td align="center" height="50">{{$data->fifth_period}}</td> 

                    <td align="center" height="50">{{$data->sixth_period}}</td>

                    <td align="center" height="50">{{$data->seventh_period}}</td>

                    <td align="center" height="50">{{$data->eight_period}}</td>
                    

                </tr> 

                <tr> 

                    <td align="center" height="50"> 

                        <b>Saturday</b> 

                    </td> 

                    <td align="center" height="50">{{$data->first_period}}</td> 

                    <td align="center" height="50">{{$data->second_period}}</td> 

                    <td align="center" height="50">{{$data->third_period}}</td> 

                    <td align="center" height="50">{{$data->fourth_period}}</td>

                    <td align="center" height="50">{{$data->fifth_period}}</td> 

                    <td align="center" height="50">{{$data->sixth_period}}</td>

                    <td align="center" height="50">{{$data->seventh_period}}</td>

                    <td align="center" height="50">{{$data->eight_period}}</td>
                    

                </tr> 

            </table> 

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                                                
                        <div id="signup-modal{{$data->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <div class="text-center mt-2 mb-4">
                                            <a href="{{route('index')}}" class="text-success">
                                                <span><img src="{{asset('assets/images/logo-dark.png')}}"alt="" height="24"></span>
                                            </a>
                                        </div>

                                        <form class="px-3" action="{{ route('timetable.edit') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <label for="username">First Period</label>
                                                <!-- <input class="form-control" name="first_period" type="text" required="" placeholder=""> -->
                                                <select name="first" class="form-control" required>
                                                    <option value="">-Choose-</option>
                                                   @if( count($info) > 0)
                                                        @foreach($info->all() as $details)
                                                            @if($data->class == $details->classes)
                                                                <option value="{{ $details->subject_name }}">{{ $details->subject_name }}</option>
                                                            @endif
                                                        @endforeach
                                                   @endif
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="username">Second Period</label>
                                                <!-- <input class="form-control" name="first_period" type="text" required="" placeholder=""> -->
                                                <select name="second" class="form-control" required>
                                                    <option value="">-Choose-</option>
                                                   @if( count($info) > 0)
                                                        @foreach($info->all() as $details)
                                                            @if($data->class == $details->classes)
                                                                <option value="{{ $details->subject_name }}">{{ $details->subject_name }}</option>
                                                            @endif
                                                        @endforeach
                                                   @endif
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="username">Third Period</label>
                                                <!-- <input class="form-control" name="first_period" type="text" required="" placeholder=""> -->
                                                <select name="third" class="form-control" required>
                                                    <option value="">-Choose-</option>
                                                   @if( count($info) > 0)
                                                        @foreach($info->all() as $details)
                                                            @if($data->class == $details->classes)
                                                                <option value="{{ $details->subject_name }}">{{ $details->subject_name }}</option>
                                                            @endif
                                                        @endforeach
                                                   @endif
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="username">Fourth Period</label>
                                                <!-- <input class="form-control" name="first_period" type="text" required="" placeholder=""> -->
                                                <select name="four" class="form-control" required>
                                                    <option value="">-Choose-</option>
                                                   @if( count($info) > 0)
                                                        @foreach($info->all() as $details)
                                                            @if($data->class == $details->classes)
                                                                <option value="{{ $details->subject_name }}">{{ $details->subject_name }}</option>
                                                            @endif
                                                        @endforeach
                                                   @endif
                                                </select>
                                            </div>



                                            <div class="form-group">
                                                <label for="username">Fifth Period</label>
                                                <!-- <input class="form-control" name="first_period" type="text" required="" placeholder=""> -->
                                                <select name="five" class="form-control" required>
                                                    <option value="">-Choose-</option>
                                                   @if( count($info) > 0)
                                                        @foreach($info->all() as $details)
                                                            @if($data->class == $details->classes)
                                                                <option value="{{ $details->subject_name }}">{{ $details->subject_name }}</option>
                                                            @endif
                                                        @endforeach
                                                   @endif
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="username">Sixth Period</label>
                                                <!-- <input class="form-control" name="first_period" type="text" required="" placeholder=""> -->
                                                <select name="six" class="form-control" required>
                                                    <option value="">-Choose-</option>
                                                   @if( count($info) > 0)
                                                        @foreach($info->all() as $details)
                                                            @if($data->class == $details->classes)
                                                                <option value="{{ $details->subject_name }}">{{ $details->subject_name }}</option>
                                                            @endif
                                                        @endforeach
                                                   @endif
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="username">Seventh Period</label>
                                                <!-- <input class="form-control" name="first_period" type="text" required="" placeholder=""> -->
                                                <select name="seven" class="form-control" required>
                                                    <option value="">-Choose-</option>
                                                   @if( count($info) > 0)
                                                        @foreach($info->all() as $details)
                                                            @if($data->class == $details->classes)
                                                                <option value="{{ $details->subject_name }}">{{ $details->subject_name }}</option>
                                                            @endif
                                                        @endforeach
                                                   @endif
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="username">Eighth Period</label>
                                                <!-- <input class="form-control" name="first_period" type="text" required="" placeholder=""> -->
                                                <select name="eight" class="form-control" required>
                                                    <option value="">-Choose-</option>
                                                   @if( count($info) > 0)
                                                        @foreach($info->all() as $details)
                                                            @if($data->class == $details->classes)
                                                                <option value="{{ $details->subject_name }}">{{ $details->subject_name }}</option>
                                                            @endif
                                                        @endforeach
                                                   @endif
                                                </select>
                                            </div>


                                           <div class="form-group">
                                                <input type="text" class="form-control" value="{{$data->class}}" disabled>
                                                <input type="hidden" name="class" value="{{$data->class}}">
                                           </div>                                          

                                        <div class="form-group text-center">
                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="button-list">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal{{$data->id}}">Edit</button>
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <br><br><hr>
        @endforeach

        
        
    </div> <!-- container -->
@endsection

@section('script')
@endsection