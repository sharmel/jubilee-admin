<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\User;
use Illuminate\Http\Request;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        

        
        view()->composer('layouts.admin', function($view)
        {
            $contact = new Contact;
            $email= request()->user()->email;

            $id = $contact->get_vendor_id($email);
            //dd($id);

            $view->with('vendor_id', $id);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
