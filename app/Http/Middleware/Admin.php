<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use Illuminate\Support\Facades\Session;

class Admin
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
        //dd(Auth::user()->email);
        //Session::flash('email', Auth::user()->email);
        $request->is('admin/vendors/*') ? $req = explode('/',$request->path()) : '';
        //dd(is_numeric($req[2]));
        if($request->is('admin/vendors/*') && is_numeric($req[2])){

            $id = $req[2];
            $contact = Contact::findOrFail($id);
        //dd(Auth::user()->email);
            if(Auth::user()->email == $contact->email){
                return $next($request);
            }
            //dd($contact);

        }

        
        if(Auth::check() && Auth::user()->isAdmin()){
            
            return $next($request);
        }
        
        return redirect('/admin');
    }
}
