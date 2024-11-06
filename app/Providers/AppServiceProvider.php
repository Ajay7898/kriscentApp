<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('auth.register',function($view)
        {
            $role_data = DB::table('roles')->where('id','!=','1')->get();
            $prfession_data = DB::table('professions')->get();
            $view->with('roleDatas', $role_data)->with('professionsDatas',$prfession_data);

        });
    }
}
