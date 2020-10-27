<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class ChoosePageController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'ADMIN'){
            return redirect('/admin');
        }

        elseif(Auth::user()->role == 'STUDENT'){
            return redirect('/student');
        }

        elseif(Auth::user()->role == 'TEACHER'){
            return redirect('/teacher');
        }
        else{
            abort(403);
        }
    }
}
