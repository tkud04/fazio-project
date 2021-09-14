<?php namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
use Request;
use App\Helpers\Contracts\HelperContract; 

class CheckGuest {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;            
    }

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = null;
		
		if(Auth::check()){
			$user = Auth::user();
		}
		
		else
		{
			$ip = Request::ip();
			$guestData = ['phone' => $ip,
			              'email' => $ip."@aceluxurystore.com",
						  'fname' => "Guest",
						  'lname' => "",
						  'role' => "user",
						  'verified' => "yes",
						  'status' => "enabled",
						  'pass' => $ip
						  ];
						  
			//$user = $this->helpers->signInAsGuest($guestData);
		}
		
		dd($user);
		
		return $next($request);
	}

}
