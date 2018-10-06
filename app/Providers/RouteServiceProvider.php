<?php

namespace App\Providers;

use App\Chatroom;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function boot(){
      
      parent::boot();
      
      Route::bind('chatroom', function($value){
        $user = User::findOrFail($value);
        $uid = Auth::id();
        
        return Chatroom::where([
          'user_1' => $uid,
          'user_2' => $user->id
        ])->orWhere([
          'user_2' => $uid,
          'user_1' => $user->id
        ])->first();
        
      });
    }

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
