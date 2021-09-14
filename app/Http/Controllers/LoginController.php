<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 
use App\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;            
    }
	
		/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getSignup(Request $request)
    {
		 $user = null;
		$cart = [];
		if(Auth::check())
		{
			return redirect()->intended('dashboard');
		}
		
		return redirect()->intended("/");
    }
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	 
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getHello(Request $request)
    {
        $user = null;
		$cart = [];
		if(Auth::check())
		{
			return redirect()->intended('dashboard');
		}
		
		return redirect()->intended("/");
    }

  
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postHello(Request $request)
    {
		$req = $request->all();
       #dd($req);
	   $ret = ['status' => "error",'message' => "Nothing happened"];
        
		$reqValidator = Validator::make($req,[
		                    'dt' => 'required'
		]);
		
		if($reqValidator->fails())
         {
             $ret['message'] = "validation";
         }
		 else
		 {
			 $dt = json_decode($req['dt'],true);
		    $validator = Validator::make($dt, [
                             'pass' => 'required|min:6',
                             'id' => 'required'                  
         ]);
         
         if($validator->fails())
         {
             $ret['message'] = "validation";
         }
         
         else
         {
			$remember = true; 
             
         	//authenticate this login
            if(Auth::attempt(['email' => $dt['id'],'password' => $dt['pass'],'status'=> "enabled"],$remember) || Auth::attempt(['phone' => $dt['id'],'password' => $dt['pass'],'status'=> "enabled"],$remember))
            {
            	//Login successful               
               $user = Auth::user();   
               $ret = ['status' => "ok",'message' => "Signup successful"];			   
            }
			
			else
			{
				 $ret['message'] = "auth";
			}			
          }	 
		 }
		
        return json_encode($ret);
    }


    
    
	
    public function postSignup(Request $request)
    {
        $req = $request->all();
       #dd($req);
	   $ret = ['status' => "error",'message' => "Nothing happened"];
        
		$reqValidator = Validator::make($req,[
		                    'dt' => 'required'
		]);
		
		if($reqValidator->fails())
         {
             $ret['message'] = "validation";
         }
		 else
		 {
			 $dt = json_decode($req['dt'],true);
		    $validator = Validator::make($dt, [
                             'pass' => 'required|min:7|confirmed',
                             'email' => 'required|email',                            
                             'phone' => 'required|numeric',
                             'fname' => 'required',
                             'lname' => 'required',                  
                             'mode' => 'required'                  
         ]);
         
         if($validator->fails())
         {
             $ret['message'] = "validation";
         }
         
         else
         {
			 $isNew = $this->helpers->isDuplicateUser(['email' => $dt['email'], 'phone' => $dt['phone']]);
			 
            $dt['role'] = "user";    
            $dt['status'] = "enabled";           
            $dt['currency'] = "ngn";           
            $dt['verified'] = "yes";
            $mu = "";
            if($dt['mode'] == "host" || $dt['mode'] == "both") $mu = "host";			
            else if($dt['mode'] == "guest") $mu = "guest";			
            $dt['mode_type'] = $dt['mode'];           
            $dt['mode'] = $mu;           
            
            # dd($isNew);            
            
			if($isNew[1])
			{
				$ret = ['status' => "error",'message' => "duplicate",'is_new' => $isNew];
			}
			else
			{
                $user =  $this->helpers->createUser($dt);
				Auth::login($user);
				$ret = ['status' => "ok",'message' => "Signup successful"];						
			}
            
            
          }	 
		 }
		
        return json_encode($ret);
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	 
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getOauth(Request $request)
    {
        $user = null;
		$cart = [];
		if(Auth::check())
		{
			return redirect()->intended('dashboard');
		}
		
		 $req = $request->all();
		 #dd($req);
		 if(isset($req['type']))
		 {
			 $type = $req['type'];
			 
			 return Socialite::driver($type)->redirect();
		 }
		 else
		 {
			return redirect()->intended("/"); 
		 }
		
    }
	
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getOAuthRedirect(Request $request,$type)
    {
        $user = null;
		$cart = [];
		$ru = "/";
		
		if(Auth::check())
		{
			return redirect()->intended('dashboard');
		}
		
		 $req = $request->all();
		  $socialUser = Socialite::driver($type)->user();
		 
		 if($socialUser != null)
		 {
			 $dt = [
			   'name' => $socialUser->name,
			   'type' => $type,
			   'email' => $socialUser->email,
			   'img' => $socialUser->avatar,
			   'token' => $socialUser->token,
			 ];
			$auth = $this->helpers->oauth($dt);
			
			if($auth['status'] == "ok")
			{
				$uu = $auth['user'];
				if(($auth['message'] == "new-user") || ($auth['message'] == "existing-user-no-pass"))
				{
					//set password for new user
					$ru = "oauth-sp?xf=".$uu->email;
				}
				else
                {
					$ru = "dashboard";
               }
			}
			else
			{
				session()->flash("oauth-status-error","ok");
			}
		 }
		 else
		 {
			session()->flash("oauth-status-error","ok");
		 }
		 
		 return redirect()->intended($ru); 
		
    }
	
	 /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getOAuthSP(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		
		$plugins = $this->helpers->getPlugins();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		$messages = [];
		
            $req = $request->all();
			#dd($req);
			if(isset($req['xf']) && $this->helpers->isOAuthSP($req['xf']))
            {
				$xf = $req['xf'];
				return view("oauth-sp",compact(['cart','user','xf','messages','signals','plugins','banner']));
            }
            
            else
            {
            	return redirect()->intended('/');
            }
    }
    
    
    /**
     * Send username to the given user.
     * @param  \Illuminate\Http\Request  $request
     */
    public function postOAuthSP(Request $request)
    {
    	$req = $request->all(); 
        $validator = Validator::make($req, [
                             'mode' => 'required|not_in:none',
                             'pass' => 'required|min:6|confirmed',
                             'acsrf' => 'required'
                  ]);
                  
        if($validator->fails())
         {
             $messages = $validator->messages();
             //dd($messages);
             
             return redirect()->back()->withInput()->with('errors',$messages);
         }
         
         else
		 {
         	$id = $req['acsrf'];
             $ret = $req['pass'];
			 $mu = "";
            if($req['mode'] == "host" || $req['mode'] == "both") $mu = "host";			
            else if($req['mode'] == "guest") $mu = "guest";			
            $req['mode_type'] = $req['mode'];           
            $req['mode'] = $mu;

            $user = User::where('email',$id)->first();
			if($user != null)
			{
				$user->update([
				'password' => bcrypt($ret),
				'mode' => $req['mode'],
				'mode_type' => $req['mode_type'],
				]);
                Auth::login($user);
                session()->flash("oauth-sp-status","ok");                  
			}
            
            return redirect()->intended('/');

         }
                  
    }    

    
    public function getForgotPassword()
    {
    	$user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
			return redirect()->intended('/');
		}
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		$plugins = $this->helpers->getPlugins();
		$cart = [];
         return view('forgot-password', compact(['cart','user','signals','plugins','banner']));
    }
    
    /**
     * Send username to the given user.
     * @param  \Illuminate\Http\Request  $request
     */
    public function postForgotPassword(Request $request)
    {
    	 $req = $request->all();
       #dd($req);
	   $ret = ['status' => "error",'message' => "Nothing happened"];
        
		$reqValidator = Validator::make($req,[
		                    'dt' => 'required'
		]);
		
		if($reqValidator->fails())
         {
             $ret['message'] = "dt-validation";
         }
		 else
		 {
			 $dt = json_decode($req['dt'],true);
			 $validator = Validator::make($dt, [
                             'email' => 'required|email'          
             ]);
         
            if($validator->fails())
            {
              $ret['message'] = "validation";
            }
         
            else
           {
         	  $id = $dt['email'];

                $user = User::where('email',$id)
                                  ->orWhere('phone',$id)->first();

                if(is_null($user))
                {
                         $ret['message'] = "auth";
                }
				else
				{
					//get the reset code 
                    $code = $this->helpers->getPasswordResetCode($user);
                    $user->update(['reset_code' => $code]);
                    $ret = $this->helpers->getCurrentSender();
				    $ret['code'] = $code;
				    $ret['name'] = $user->fname;
				    $ret['subject'] = "Reset your password";
		            $ret['em'] = $id;
		            $this->helpers->sendEmailSMTP($ret,"emails.forgot-password");
                    $ret = ['status' => "ok",'message' => "Link sent"];
				}
            }
	     }
	  
	  return json_encode($ret);               
    }    
    
  
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getPasswordReset(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
			return redirect()->intended('/');
		}
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		$plugins = $this->helpers->getPlugins();
		$cart = [];
            $req = $request->all();
			#dd($req);
			if(isset($req['code']))
            {
				$uu = $this->helpers->verifyPasswordResetCode($req['code']);
				#dd($user);
                if($uu == null)   
                { 
                	return redirect()->back()->withErrors("The code is invalid or has expired. ","errors"); 
                }
                $v = ($uu->role == "user") ? 'reset' : 'admin.reset';
				return view($v,compact(['cart','user','uu','plugins','banner']));
            }
            
            else
            {
            	return redirect()->intended('/');
            }
    }
    
    
    /**
     * Send username to the given user.
     * @param  \Illuminate\Http\Request  $request
     */
    public function postPasswordReset(Request $request)
    {
    	$req = $request->all(); 
        $ret = ['status' => "error",'message' => "Nothing happened"];
        
		$reqValidator = Validator::make($req,[
		                    'dt' => 'required'
		]);
		
		if($reqValidator->fails())
         {
             $ret['message'] = "dt-validation";
         }
		 else
		 {
			 $dt = json_decode($req['dt'],true);
			 $validator = Validator::make($dt, [
                             'id' => 'required',
                             'pass' => 'required|min:6'							 
             ]);
         
            if($validator->fails())
            {
              $ret['message'] = "validation";
            }
			else
			{
				$id = $dt['id'];
               $ret = $dt['pass'];

               $user = User::where('id',$id)->first();
               $user->update(['password' => bcrypt($ret)]);
                
               $ret = ['status' => "ok",'message' => "Password reset"];
			}
        }
         
         return json_encode($ret);         
    }    

   
    
    public function getBye()
    {
        if(Auth::check())
        {  
           Auth::logout();       	
        }
        
        return redirect()->intended('/');
    }

}