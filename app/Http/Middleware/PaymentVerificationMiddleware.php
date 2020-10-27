<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class PaymentVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->reg_payment == 'PAID'){
            if(Auth::check() && Auth::user()->admission_status == 'GIVEN'){
                if (Auth::check() && Auth::user()->school_fees_payment == 'PAID') {      
                    if(Auth::check() && Auth::user()->pta_fees_payment == 'PAID'){
                        return $next($request);
                    }      
                    else{
                        return redirect('/unpaid');
                    }       
                }
                else{
                    return redirect('/unpaid');
                }
            }
            else{
                return redirect('/admission');
            }
        }
        else {
            return redirect('/unpaid/reg');
        }
    }

}
