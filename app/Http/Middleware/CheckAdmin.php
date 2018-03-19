<?php

namespace App\Http\Middleware;

use Closure;

use Session;

use App\Models\Admin;

class CheckAdmin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $id = Session::get('admin_id');

        if ($id == NULL || $id == 0) {
            
            Session::put('message', array(
                'title' => 'You Are Logged Out',
                'body' => 'Username or Password invalid',
                'type' => 'warning'
            ));
              
            return redirect('/administrator');
        }else{
            $currentAdmin = Admin::find($id);
            $currentAdmin->last_active = date('Y-m-d H:i:s');
            $currentAdmin->save();
        }

        return $next($request);
    }

}
