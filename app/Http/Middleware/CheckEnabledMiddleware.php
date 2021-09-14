<?php namespace App\Http\Middleware;

use Closure;
use App\User;
use App\AccountStatus; 
use Auth;

class CheckEnabledMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(Auth::check()){
			$user = Auth::user();
			$as = AccountStatus::where('user_id', $user->id)->first();
			
			if($as->enabled == "no") return redirect()->intended('login');
			else return $next($request);
        }
        
		else return $next($request);
	}

}
