<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Cookie;
use Validator; 
use Carbon\Carbon; 
//use Codedge\Fpdf\Fpdf\Fpdf;
use PDF;
use Paystack; 

class MainController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;                      
    }

	/**
	 * Show the application home page.
	 *
	 * @return Response
	 */
	public function getIndex(Request $request)
    {
		$hasUnpaidOrders = null;
		$user = null;
		$messages = [];
		$apf = [];
		$def = $this->helpers->def;
       
	    if(Auth::check())
		{
			$user = Auth::user();
			$apf = $this->helpers->getPreference($user);
			if(count($apf) > 0) $def = $apf;
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		$req = $request->all();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		
		$c = $this->helpers->getCategories();
		$signals = $this->helpers->signals;
		
		$ads = $this->helpers->getAds("wide-ad");
		$banner = $this->helpers->getBanner("landing");
		$plugins = $this->helpers->getPlugins();
		#$this->helpers->populateTips();

		#dd($messages);
		
		$popularApartments = $this->helpers->getPopularApartments();
		$rett = $this->helpers->getAutoCompleteData(['type' => 'country']);
		$countries = json_encode(['status' => "ok",'data' => $rett]);
		$ssf = [
		  'apartment_types' => [
		    'unfurnished' => "Unfurnished apartment",
			'Furnished' => "Furnished apartment",
			'serviced' => "Serviced apartment",
		  ],
		  'locations' => $this->helpers->getCities()
		];
		$priceRange = $this->helpers->getPriceRange();
		#dd($countries);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];

    	return view("index",compact(['user','cart','messages','c','def','ssf','priceRange','hasUnpaidOrders','popularApartments','countries','ad','signals','plugins','banner']));
    }
	
	/**
	 * Show the test page.
	 *
	 * @return Response
	 */
	public function getTemp(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		$req = $request->all();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		
		$ads = $this->helpers->getAds("wide-ad");
		$banner = $this->helpers->getBanner("landing");
		$plugins = $this->helpers->getPlugins();
		
		#dd($hasUnpaidOrders);
		
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];

    	return view("temp",compact(['user','cart','messages','c','banner','ad','signals','plugins','banner']));
    }

	/**
	 * Show the about page.
	 *
	 * @return Response
	 */
	public function getAbout(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		$req = $request->all();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		$c = $this->helpers->getCategories();
		$banner = $this->helpers->getBanner();
		//dd($bs);
		$signals = $this->helpers->signals;
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		#dd($hasUnpaidOrders);
		
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];

    	return view("about",compact(['user','cart','messages','c','ad','banner','signals','plugins','banner']));
    }

	/**
	 * Show the plans page.
	 *
	 * @return Response
	 */
	public function getPlans(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		$req = $request->all();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		$c = $this->helpers->getCategories();
		$banner = $this->helpers->getBanner();
		//dd($bs);
		$signals = $this->helpers->signals;
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		$plans = $this->helpers->getPlans();
		
		#dd($plans);
		
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];

    	return view("plans",compact(['user','cart','messages','plans','c','ad','banner','signals','plugins','banner']));
    }
	
	/**
	 * Show the Contact page.
	 *
	 * @return Response
	 */
	public function getFAQ(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		$req = $request->all();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		$c = $this->helpers->getCategories();
		$banner = $this->helpers->getBanner();
		//dd($bs);
		$signals = $this->helpers->signals;
		$contacts = $this->helpers->contacts;
		
		$questions = $this->helpers->getFAQs();
		$tags = $this->helpers->getFAQTags();
		$faqs = [];
		
		foreach($tags as $t)
        {
        	$tt = $t['tag'];
        	$faqs[$tt] = [];
        }
        
        foreach($questions as $q)
        {
        	$qt = $q['tag'];
        	if(isset($faqs[$qt])) array_push($faqs[$qt], $q);
        }
        
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		#dd($hasUnpaidOrders);
		
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];

    	return view("faq",compact(['user','cart','messages','c','ad','contacts','faqs','tags','signals','plugins','banner']));
    }
    
    /**
	 * Show the Contact page.
	 *
	 * @return Response
	 */
	public function getContact(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		$req = $request->all();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		$c = $this->helpers->getCategories();
		$banner = $this->helpers->getBanner();
		//dd($bs);
		$signals = $this->helpers->signals;
		$contacts = $this->helpers->contacts;
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		#dd($hasUnpaidOrders);
		
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];

    	return view("contact",compact(['user','cart','messages','c','ad','contacts','signals','plugins','banner']));
    }
	
	/**
	 * Handle add new apartment.
	 *
	 * @return Response
	 */
	public function postContact(Request $request)
        {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}

		$req = $request->all();
                #dd($req);
		
		$validator = Validator::make($req,[
		                    'name' => 'required',
		                    'dept' => 'required',
		                    'email' => 'required|email',
		                    'subject' => 'required',
		                    'msg' => 'required'
		]);
		
		if($validator->fails())
                 {
                  session()->flash("validation-status-error","ok");
			 return redirect()->back()->withInput();
                 }
		 else
		 {					
					#$req['user_id'] = $user->id;
				 
			$ret = $this->helpers->contact($req);
			$flashMessage = "contact-status";
			if($ret != "ok") $flashMessage .= "-error";
			session()->flash($flashMessage,"ok");
			return redirect()->back();
		 }
		
    }
	
	/**
	 * Show the terms & conditions page.
	 *
	 * @return Response
	 */
	public function getTerms(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		$req = $request->all();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		#dd($hasUnpaidOrders);
		
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];

    	return view("terms",compact(['user','cart','messages','c','ad','signals','plugins','banner']));
    }
	
	/**
	 * Show the about page.
	 *
	 * @return Response
	 */
	public function getPrivacy(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		$req = $request->all();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		#dd($hasUnpaidOrders);
		
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];

    	return view("privacy",compact(['user','cart','messages','c','ad','signals','plugins','banner']));
    }
	
	/**
	 * Show the dashboard.
	 *
	 * @return Response
	 */
	public function getDashboard(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		#dd($user);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
		$cpt = []; $v = "errors.404";
		
		$activities = $this->helpers->getActivities($user);
		$stats = $this->helpers->getDashboardStats($user);
		#dd($stats);
			
		if($user->mode == "host")
		{
			$transactions = $this->helpers->getTransactions($user);
			$bookings = $this->helpers->getActiveBookings($user);
			$revenueData = $this->helpers->getTransactionData($user);
			$bsa = $this->helpers->getBestSellingApartments($user);
			$cpt = ['user','cart','messages','activities','transactions','bookings','revenueData','stats','bsa','c','ad','signals','plugins','banner'];
			$v = "host-dashboard";
		}
		else if($user->mode == "guest")
		{
			$sps = $this->helpers->getSavedPayments($user);
			$sapts = $this->helpers->getSavedApartments($user);
			$orders = $this->helpers->getOrders($user);
			#dd($sapts);
			$cpt = ['user','cart','messages','activities','sps','sapts','stats','orders','c','ad','signals','plugins','banner'];
			$v = "guest-dashboard";
		}
		
    	return view($v,compact($cpt));
    }
	
	/**
	 * Show saved apartments.
	 *
	 * @return Response
	 */
	public function getSavedApartments(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		else
		{
			session()->flash("save-apartment-auth-status-error","ok");
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		#dd($user);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		$sapts = $this->helpers->getSavedApartments($user);
		#dd($sapts);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	return view("saved-apartments",compact(['user','cart','messages','c','ad','sapts','signals','plugins','banner']));
    }
	
	/**
	 * Handle remove saved payment.
	 *
	 * @return Response
	 */
	public function getRemoveSavedApartment(Request $request)
        {
		$user = null;
		 
		if(Auth::check())
		{
			$user = Auth::user();
			
			$req = $request->all();
        
		    $validator = Validator::make($req,[
		                    'xf' => 'required'
		    ]);
		
		 if($validator->fails())
                 {
			 session()->flash("validation-status-error","ok");
			 return redirect()->back()->withInput();
                 }
		 else
		 {  
	                $req['user_id'] = $user->id;	 
			$r = $this->helpers->removeSavedApartment($req);
			$flashMessage = "remove-saved-apartment-status";
			if($r != "ok") $flashMessage .= "-error";
			session()->flash($flashMessage,"ok");
			return redirect()->back();
		 }
		}
		else
		{
			session()->flash("cart-auth-status-error","ok");
			return redirect()->back();
		}
		 
    }
	
	/**
	 * Show user's apartment preferences.
	 *
	 * @return Response
	 */
	public function getApartmentPreferences(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		else
		{
			session()->flash("save-apartment-auth-status-error","ok");
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		#dd($user);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$states = $this->helpers->states;
		$services = $this->helpers->getServices();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		$def = $this->helpers->def;
		$apf = $this->helpers->getPreference($user);
		if(count($apf) > 0) $def = $apf;
		#dd($apf);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	return view("apartment-preferences",compact(['user','cart','messages','c','states','services','ad','def','signals','plugins','banner']));
    }
	
	/**
	 * Handle add new apartment.
	 *
	 * @return Response
	 */
	public function postApartmentPreferences(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			return redirect()->intended('/');
		}

		$req = $request->all();
        #dd($req);
		$ret = ['status' => "error",'message' => "nothing happened"];
	    
		$validator = Validator::make($req,[
		                    'avb' => 'required',
		                    'state' => 'required',
		                    'facilities' => 'required'
		]);
		
		if($validator->fails())
         {
             $ret['message'] = "validation";
         }
		 else
		 {					
					$req['payment_type'] = "card";
					$req['user_id'] = $user->id;
				 
				 
			$this->helpers->createPreference($req);
			$ret = ['status' => "ok"];
		 }
		 
		 return json_encode($ret);
    }
	
	/**
	 * Handle transaction analytics for host.
	 *
	 * @return Response
	 */
	public function getAnalytics(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
		   $user = Auth::user();
		   if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
	    else
		{
			return redirect()->intended('/');
		}

		$req = $request->all();
        #dd($req);
		$ret = ['status' => "error",'message' => "nothing happened"];
	    
		$validator = Validator::make($req,[
		                    'type' => 'required',
		                    'month' => 'required',
		                    'year' => 'required|numeric'
		]);
		
		if($validator->fails())
         {
             $ret['message'] = "validation";
         }
		 else
		 {					
			$req['user_id'] = $user->id;
			$rett = [];
			
			switch($req['type'])
			{
				case "total-revenue":
				  $revenueData = $this->helpers->getTransactionData($user,['month' => $req['month'], 'year' => $req['year']]);
				  for($i = 0; $i < count($revenueData); $i++)
					{ 
						$t = $revenueData[$i];
						$item = $t['item'];
						$date = new \DateTime($t['date']);
						$temp = ['x' => $date->format("d M"),'y' => $item['amount']];
						array_push($rett,$temp);
				    }
				
				break;
				
				case "best-selling-apartments":
				$bsaData = $this->helpers->getBestSellingApartments($user,['month' => $req['month'], 'year' => $req['year']]);
				  for($i = 0; $i < count($bsaData); $i++)
					{  
						$temp = $bsaData[$i];
						array_push($rett,$temp);
				    }
				break;
			}
			$ret = ['status' => "ok",'data' => $rett];
		 }
		 
		 return json_encode($ret);
    }
	
	/**
	 * Show the dashboard.
	 *
	 * @return Response
	 */
	public function getHostAnalytics(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
		   $user = Auth::user();
		   $messages = $this->helpers->getMessages(['user_id' => $user->id]);
		   if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
	    else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		#dd($user);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
		$cpt = []; $v = "errors.404";
		
			$transactions = $this->helpers->getTransactions($user);
			$revenueData = $this->helpers->getTransactionData($user);
			$bsa = $this->helpers->getBestSellingApartments($user);
			$cpt = ['user','cart','messages','transactions','revenueData','bsa','c','ad','signals','plugins','banner'];
			$v = "analytics";
		
    	return view($v,compact($cpt));
    }
	
	/**
	 * Show the profile.
	 *
	 * @return Response
	 */
	public function getProfile(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		#dd($user);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		$u = $this->helpers->getUser($user->id);
		#dd($u);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	return view("profile",compact(['user','cart','messages','c','ad','u','signals','plugins','banner']));
    }
	
	/**
	 * Handle profile update.
	 *
	 * @return Response
	 */
	public function postProfile(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			return redirect()->intended('/');
		}

		$req = $request->all();
       #dd($req);
	    
		$validator = Validator::make($req,[
		                    'fname' => 'required',
		                    'lname' => 'required',
		                    'email' => 'required',
		                    'phone' => 'required',
		]);
		
		if($validator->fails())
         {
			 $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
         }
		 else
		 {
			  $img = $request->file("profile-avatar");
             	      $imgg = $this->helpers->uploadCloudImage($img->getRealPath());
					  $req['avatar'] = $imgg['public_id'];
					  $req['xf'] = $user->id;
					  
			$this->helpers->updateProfile($req);
			session()->flash("update-profile-status","ok");
			return redirect()->intended('profile');
		 }
    }
	
	/**
	 * Delete a profile avatar.
	 *
	 * @return Response
	 */
	public function getDeleteAvatar(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();		
		}
		else
		{
			return redirect()->intended('/');
		}
		
		
		    $user->update(['avatar' => "", 'avatar_type' => ""]);
			session()->flash("delete-avatar-status","ok");
		
		return redirect()->intended('profile');
		
    }
	
	 /* Get messages.
	 *
	 * @return Response
	 */
	public function getMessages(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id,'type' => "all"]);
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		#dd($user);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		$u = $this->helpers->getUser($user->id);
		#dd($messages);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	return view("messages",compact(['user','cart','messages','c','ad','u','signals','plugins','banner']));
    }
	
	
	/**
	 * Show the apartment.
	 *
	 * @return Response
	 */
	public function getApartment(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		$req = $request->all();
		
		if(isset($req['xf']))
		{
			$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		    $cart = $this->helpers->getCart($user,$gid);
		    #dd($user);
		    $c = $this->helpers->getCategories();
		    //dd($bs);
		    $signals = $this->helpers->signals;
			$banner = $this->helpers->getBanner();
			
		    $states = $this->helpers->states;
		    $countries = $this->helpers->countries;
	    	
			$ads = $this->helpers->getAds("wide-ad");
		    $plugins = $this->helpers->getPlugins();
		    $services = $this->helpers->getServices();
		    $tips = $this->helpers->getApartmentTips();
		
		    $apartment = $this->helpers->getApartment($req['xf'],['host' => true,'imgId' => true]);
			
			if(count($apartment) > 0)
			{
				$isSaved = $user == null ? false : $this->helpers->isApartmentSaved($user->id,$apartment['id']);
			   shuffle($ads);
		       $ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
    	       return view("apartment",compact(['user','cart','messages','c','isSaved','ad','apartment','services','tips','states','countries','signals','plugins','banner']));
			}
			else
			{
				session()->flash("invalid-apartment-id-status-error","ok");
				return redirect()->intended('/');
			}
			
		}
		else
		{
			session()->flash("invalid-apartment-id-status-error","ok");
				return redirect()->intended('/');
		}
		
    }

	/**
	 * Show a list of apartments.
	 *
	 * @return Response
	 */
	public function getApartments(Request $request)
    {
		$user = null;
		$messages = [];
		$apf = [];
		$def = $this->helpers->def;
		
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			$apf = $this->helpers->getPreference($user);
			if(count($apf) > 0) $def = $apf;
		}
		#dd($apf);
		$req = $request->all();
		
			$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		    $cart = $this->helpers->getCart($user,$gid);

		    $c = $this->helpers->getCategories();
		    
		    $signals = $this->helpers->signals;
		    $banner = $this->helpers->getBanner();
			
	    	$ads = $this->helpers->getAds("wide-ad");
		    $plugins = $this->helpers->getPlugins();
		
		    $apartments = $this->helpers->getApartments(null);
			$services = $this->helpers->getServices();
			$states = $this->helpers->states;
			#dd($services);
		       shuffle($ads);
		       $ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	       return view("apartments",compact(['user','cart','messages','c','ad','def','apartments','services','states','signals','plugins','banner']));		
    }

	/**
	 * Handle apartment search.
	 *
	 * @return Response
	 */
	public function getSearch(Request $request)
    {
		$user = null;
		$messages = [];
		$apf = [];
		$def = $this->helpers->def;
		$cart = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			$apf = $this->helpers->getPreference($user);
			if(count($apf) > 0) $def = $apf;
			$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
			
		}
		
		$req = $request->all();
		
		$validator = Validator::make($req, [
                             'dt' => 'required'
         ]);
         
         if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
             return redirect()->back();
         }
		 else
		 {
			 $cart = $this->helpers->getCart($user,$gid);
		    $c = $this->helpers->getCategories();	    
		    $signals = $this->helpers->signals;	
			$banner = $this->helpers->getBanner();
			
	    	$ads = $this->helpers->getAds("wide-ad");
			shuffle($ads);
		    $ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
		    $plugins = $this->helpers->getPlugins();

			$services = $this->helpers->getServices();
			$states = $this->helpers->states;
   
			$results = $this->helpers->search($req['dt']);
			#dd($results);
			if(count($results) > 0)
			{
				return view("search-results",compact(['user','cart','messages','def','c','ad','results','services','states','signals','plugins','banner']));
			}
			else
			{
			  session()->flash("no-results-status-error","ok");
              return redirect()->back();
			}
			 		
		 }
    }
/**
	 * Handle apartment search from landing page.
	 *
	 * @return Response
	 */
	public function getLandingSearch(Request $request)
    {
		$user = null;
		$messages = [];
		$apf = [];
		$def = $this->helpers->def;
		$cart = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			$apf = $this->helpers->getPreference($user);
			if(count($apf) > 0) $def = $apf;
			$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
			
		}
		
		$req = $request->all();
		dd($req);
		$validator = Validator::make($req, [
                             'dt' => 'required'
         ]);
         
         if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
             return redirect()->back();
         }
		 else
		 {
			 $cart = $this->helpers->getCart($user,$gid);
		    $c = $this->helpers->getCategories();	    
		    $signals = $this->helpers->signals;	
			$banner = $this->helpers->getBanner();
			
			$dt = new class{
				//properties here
			};
			
	    	$ads = $this->helpers->getAds("wide-ad");
			shuffle($ads);
		    $ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
		    $plugins = $this->helpers->getPlugins();

			$services = $this->helpers->getServices();
			$states = $this->helpers->states;
   
			$results = $this->helpers->search($req['dt']);
			#dd($results);
			if(count($results) > 0)
			{
				return view("search-results",compact(['user','cart','messages','def','c','ad','results','services','states','signals','plugins','banner']));
			}
			else
			{
			  session()->flash("no-results-status-error","ok");
              return redirect()->back();
			}
			 		
		 }
    }

		
	/**
	 * Handle apartment search from landing page
	 *
	 * @return Response
	 */
	public function postSearch(Request $request)
    {
		$user = null;
		$messages = [];
		$apf = [];
		$def = $this->helpers->def;

		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			$apf = $this->helpers->getPreference($user);
			if(count($apf) > 0) $def = $apf;
		}
		
		$req = $request->all();
		#dd($req);
		$validator = Validator::make($req, [
                             'dt' => 'required'
         ]);
         
         if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
             return redirect()->back();
         }
		 else
		 {
			 $gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
			$cart = $this->helpers->getCart($user,$gid);
			 #dd($cart);
		    $c = $this->helpers->getCategories();	    
		    $signals = $this->helpers->signals;	
			$banner = $this->helpers->getBanner();
			
	    	$ads = $this->helpers->getAds("wide-ad");
			shuffle($ads);
		    $ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
		    $plugins = $this->helpers->getPlugins();

			$services = $this->helpers->getServices();
			$states = $this->helpers->states;
   
			$results = $this->helpers->search($req['dt']);
			#dd($results);
			if(count($results) > 0)
			{
				return view("search-results",compact(['user','cart','messages','def','c','ad','results','services','states','signals','plugins','banner']));
			}
			else
			{
			  session()->flash("no-results-status-error","ok");
              return redirect()->back();
			}
			 		
		 }
    }
	
	/**
	 * Handle apartment search from special search on landing page
	 *
	 * @return Response
	 */
	public function postSSF(Request $request)
    {
		$user = null;
		$messages = [];
		$apf = [];
		$def = $this->helpers->def;

		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			$apf = $this->helpers->getPreference($user);
			if(count($apf) > 0) $def = $apf;
		}
		
		$req = $request->all();
		
		$validator = Validator::make($req, [
                             'apt-type' => 'required|not_in:none',
                             'beds' => 'required|numeric',
                             'location' => 'required|not_in:none',
                             'amount' => 'required|numeric',
							 
         ]);
         
         if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
             return redirect()->back();
         }
		 else
		 {
			 $gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
			$cart = $this->helpers->getCart($user,$gid);
			 #dd($cart);
		    $c = $this->helpers->getCategories();	    
		    $signals = $this->helpers->signals;	
			$banner = $this->helpers->getBanner();
			
	    	$ads = $this->helpers->getAds("wide-ad");
			shuffle($ads);
		    $ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
		    $plugins = $this->helpers->getPlugins();

			$services = $this->helpers->getServices();
			$states = $this->helpers->states;
   
			$results = $this->helpers->searchSSF($req);
			#dd($results);
			if(count($results) > 0)
			{
				return view("search-results",compact(['user','cart','messages','def','c','ad','results','services','states','signals','plugins','banner']));
			}
			else
			{
			  session()->flash("no-results-status-error","ok");
              return redirect()->back();
			}
			 		
		 }
    }
	
	/**
	 * Get chat history with host.
	 *
	 * @return Response
	 */
	public function getChat(Request $request)
    {
		$user = null;
		$ret = ['status' => "error",'message' => "Nothing happened"];
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			$ret['message'] = "auth";
		}
		
		$req = $request->all();
		
		$validator = Validator::make($req, [
                             'apt' => 'required'
         ]);
         
         if($validator->fails())
         {
             $ret['message'] = "validation";
         }
		 else
		 {
			$history = $this->helpers->getChatHistory($req['apt']);
			$ret = ['status' => "ok",'data' => $history];
		 }
		 
		 return json_encode($ret);
    }
	
	/**
	 * Handle chat.
	 *
	 * @return Response
	 */
	public function postChat(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			return redirect()->intended('/');
		}

		$req = $request->all();
       #dd($req);
	   $ret = ['status' => "error",'message' => "nothing happened"];
	    
		$validator = Validator::make($req,[
		                    'msg' => 'required',
		                    'apartment_id' => 'required',
		                    'gxf' => 'required',
		                    'gsb' => 'required',
		]);
		
		if($validator->fails())
         {
			 $ret['message'] = "validation";
         }
		 else
		 {  
            $req['user_id'] = $req['gxf'];	 
            $req['sent_by'] = $req['gsb'];	 
			$this->helpers->chat($req);
			$ret = ['status' => "ok",'message' => "sent"];
		 }
		 
		 return json_encode($ret);
    }
	
	/**
	 * Handle reserve apartment.
	 *
	 * @return Response
	 */
	public function getReserveApartment(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			session()->flash("reserve-apartment-status-error","ok");
			return redirect()->back();
		}

		$req = $request->all();
       #dd($req);
	    
		$validator = Validator::make($req,[
		                    'gxf' => 'required',
		                    'axf' => 'required'
		]);
		
		if($validator->fails())
         {
			 $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
         }
		 else
		 {
			 $dt = [
			   'apartment_id' => $req['axf'],
			   'user_id' => $req['gxf'],
			   'status' => "pending",
			 ];
			 
			if($this->helpers->hasReservation($dt))
			{
				session()->flash("duplicate-reservation-status-error","ok");
			    return redirect()->back();
			}
			else
			{
			   $l = $this->helpers->createReservationLog($dt);
			   /**
			    send email to host and admin here
			   **/
			   $ret = $this->helpers->getCurrentSender();
		       
			   try
		       {
				 $apt = $this->helpers->getApartment($req['axf'],['host' => true,'imgId' => true]);
				 $h = $apt['host'];
			     $ret['subject'] = $user->fname." ".$user->lname.": is ".$apt['name']." available for booking?";	
				 $ret['em'] = $h['email'];
			     $ret['a'] = $apt;
			     $ret['u'] = $user;
			     $ret['l'] = $l;
				 #dd($ret);
		         $this->helpers->sendEmailSMTP($ret,"emails.reserve-apartment");
		         $ret['em'] = $this->helpers->suEmail;
		         $ret['admin'] = true;
		         $this->helpers->sendEmailSMTP($ret,"emails.reserve-apartment");
			     $s = "ok";
		       }
		
		       catch(Throwable $e)
		       {
			     #dd($e);
			     $s = "error";
		       }
			   
			   //Add activities
			   //guest
			   $this->helpers->createActivity([
			         'type' => "reservation",
			         'mode' => "guest",
			         'user_id' => $user->id,
			         'data' => $req['axf'],
			   ]);
			   
			   //host
			   $this->helpers->createActivity([
			         'type' => "reservation",
			         'mode' => "host",
			         'user_id' => $h['id'],
			         'data' => $req['axf'].",".$user->id,
			   ]);


			   session()->flash("add-reservation-status","ok");
			   $uu = "apartment?xf=".$req['axf'];
			   return redirect()->intended($uu);	
			}
			
		 }
    }
	
	/**
	 * Handle cancel apartment reservation.
	 *
	 * @return Response
	 */
	public function getCancelReservation(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			session()->flash("reserve-apartment-status-error","ok");
			return redirect()->back();
		}

		$req = $request->all();
        
		$validator = Validator::make($req,[
		                    'xf' => 'required|numeric',
							'axf' => 'required',
							'gxf' => 'required|numeric'
		]);
		
		if($validator->fails())
         {
			 $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
         }
		 else
		 {
			 $dt = [
			   'id' => $req['xf'],
			   'apartment_id' => $req['axf'],
			   'user_id' => $req['gxf'],
			   'status' => "pending",
			 ];
			 
			if($this->helpers->hasReservation($dt))
			{
				$dt['status'] = "cancelled";
			   $this->helpers->updateReservationLog($dt);
			   session()->flash("update-reservation-status","ok");
			   return redirect()->back();
			}
			else
			{
			   	session()->flash("duplicate-reservation-status-error","ok");
			    return redirect()->back();
			}
			
		 }
    }
	/**
	 * Handle remove apartment reservation.
	 *
	 * @return Response
	 */
	public function getRemoveReservation(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			session()->flash("reserve-apartment-status-error","ok");
			return redirect()->back();
		}

		$req = $request->all();
        
		$validator = Validator::make($req,[
		                    'xf' => 'required|numeric',
							'axf' => 'required',
							'gxf' => 'required|numeric'
		]);
		
		if($validator->fails())
         {
			 $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
         }
		 else
		 {
			 $dt = [
			   'id' => $req['xf'],
			   'apartment_id' => $req['axf'],
			   'user_id' => $req['gxf']
			 ];
			 
			if($this->helpers->hasReservation($dt))
			{
			   $this->helpers->removeReservationLog($dt['id']);
			   session()->flash("remove-reservation-status","ok");
			   return redirect()->back();
			}
			else
			{
			   	session()->flash("duplicate-reservation-status-error","ok");
			    return redirect()->back();
			}
			
		 }
    }
	
	/**
	 * Handle respond to apartment reservation.
	 *
	 * @return Response
	 */
	public function getRespondToReservation(Request $request)
    {
		$user = null;
		$req = $request->all();
		
		if(Auth::check())
		{
			$user = Auth::user();
			
		}
		else
		{
			return redirect()->intended('apartments');
		}

		
        
		$validator = Validator::make($req,[
		                    'xf' => 'required|numeric',
							'axf' => 'required',
							'gxf' => 'required|numeric'
		]);
		
		if($validator->fails())
         {
			 $messages = $validator->messages();
             return redirect()->intended('/');
         }
		 else
		 {
			 $dt = [
			   'id' => $req['xf'],
			   'apartment_id' => $req['axf'],
			   'user_id' => $req['gxf']
			 ];
			 
			if($this->helpers->hasReservation($dt))
			{
				$dt['type'] = $req['type'];
				$dt['auth'] = $user->id;
				
			   $this->helpers->respondToReservation($dt);
			   session()->flash("respond-to-reservation-status","ok");
			   return redirect()->intended('/');
			}
			else
			{
			   	session()->flash("duplicate-reservation-status-error","ok");
			    return redirect()->intended('/');
			}
			
		 }
    }
	
	/**
	 * Show reservation log for user.
	 *
	 * @return Response
	 */
	public function getReservations(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		$reservations = $this->helpers->getReservationLogs($user);
		#dd($reservations);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	return view("my-reservations",compact(['user','cart','messages','c','ad','reservations','signals','plugins','banner']));
    }
	
	/**
	 * Handle profile update.
	 *
	 * @return Response
	 */
	public function getTestChat(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			return redirect()->intended('/');
		}

		$req = $request->all();
       #dd($req);
	   $ret = ['status' => "error",'message' => "nothing happened"];
	    
		$validator = Validator::make($req,[
		                    'name' => 'required',
		                    'email' => 'required|email',
		                    'msg' => 'required',
		                    'apartment_id' => 'required',
		]);
		
		if($validator->fails())
         {
			 $ret['message'] = "validation";
         }
		 else
		 {  
            $req['user_id'] = $user->id;	 
			$this->helpers->chat($req);
			$ret = ['status' => "ok",'message' => "sent"];
		 }
		 
		 return json_encode($ret);
    }
	
	/**
	 * Handle add review.
	 *
	 * @return Response
	 */
	public function postAddReview(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			session()->flash("add-review-status-error","ok");
			return redirect()->back();
		}

		$req = $request->all();
       #dd($req);
	    
		$validator = Validator::make($req,[
		                    'apt-id' => 'required',
		                    'axf' => 'required',
		                    'service' => 'required',
		                    'security' => 'required',
		                    'location' => 'required',
		                    'cleanliness' => 'required',
		                    'comfort' => 'required',
		                    'msg' => 'required'
		]);
		
		if($validator->fails())
         {
			 $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
         }
		 else
		 {
			if($this->helpers->hasReview(['user_id' => $user->id,'apartment_id' => $req['apt-id']]))
			{
				session()->flash("duplicate-review-status-error","ok");
			    return redirect()->back();
			}
			else
			{
			   $req['user_id'] = $user->id;	  
			   $req['apartment_id'] = $req['apt-id'];	  
			   $req['comment'] = $req['msg'];	  
		       $r = $this->helpers->createReview($req);
			   
			   
			   session()->flash("add-review-status","ok");
			   $uu = "apartment?xf=".$req['axf'];
			   return redirect()->intended($uu);	
			}
			
		 }
    }
	
	/**
	 * Handle vote review.
	 *
	 * @return Response
	 */
	public function getVoteReview(Request $request)
    {
		$user = null;
		 $ret = ['status' => "error",'message' => "nothing happened"];
	  
	  
		if(Auth::check())
		{
			$user = Auth::user();
			
			$req = $request->all();
       #dd($req);
	    
		$validator = Validator::make($req,[
		                    'rxf' => 'required|numeric',
		                    'type' => 'required',
		                    'xf' => 'required|numeric|min:1'
		]);
		
		if($validator->fails())
         {
			 $ret['message'] = "validation";
         }
		 else
		 {  
	        if($this->helpers->hasVotedReview(['user_id' => $user->id,'review_id' => $req['rxf']]))
			{
				$ret['message'] = "duplicate";
			}
			else
			{
			   $req['user_id'] = $user->id;	 
			   $r = $this->helpers->voteReview($req);
			   $ret = ['status' => "ok",'data' => $r];
			}
            
		 }
		}
		else
		{
			$ret['message'] = "auth";
		}
		 
		 return json_encode($ret);
    }
	
	
	/**
	 * Show shopping cart.
	 *
	 * @return Response
	 */
	public function getCart(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		else
		{
			session()->flash("cart-auth-status-error","ok");
			return redirect()->intended('/');
		}
		/**
		$req = $request->all();
		
			$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		    $cart = $this->helpers->getCart($user,$gid);

		    $c = $this->helpers->getCategories();
		    
		    $signals = $this->helpers->signals;
		
	    	$ads = $this->helpers->getAds("wide-ad");
		    $plugins = $this->helpers->getPlugins();
		
		       shuffle($ads);
		       $ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
              # dd($cart);
    	       return view("cart",compact(['user','cart','messages','c','ad','signals','plugins','banner']));		
		**/
		return redirect()->intended('/');
    }
	
	
	/**
	 * Handle add to cart.
	 *
	 * @return Response
	 */
	public function getAddToCart(Request $request)
    {
		$user = null;
		 
		if(Auth::check())
		{
			$user = Auth::user();
			
			if($user->mode == "guest")
			{
			  $req = $request->all();
              #dd($req);
		      $validator = Validator::make($req,[
		                    'axf' => 'required|numeric',
		                    'guests' => 'required|numeric',
		                    'checkin' => 'required',
		                    'checkout' => 'required'
		       ]);
		
		      if($validator->fails())
              {
			    session()->flash("validation-status-error","ok");
			    return redirect()->back()->withInput();
              }
		      else
		      {  
	             $req['user_id'] = $user->id;	 
			     $r = $this->helpers->addToCart($req);
			
			     if($r == "host")
			     {
				   session()->flash("add-to-cart-host-status-error","ok");
				   return redirect()->back()->withInput();
			     }
		   	     else
			     {
				   session()->flash("add-to-cart-status","ok");
			       return redirect()->intended('/');
			     }
			
		       }
			}
			else
			{
				session()->flash("cart-user-mode-status-error","ok");
			    return redirect()->back();
			}	
		}
		else
		{
			session()->flash("cart-auth-status-error","ok");
			return redirect()->back();
		}
		 
    }
	
	/**
	 * Handle update cart.
	 *
	 * @return Response
	 */
	public function getUpdateCart(Request $request)
    {
		$user = null;
		 
		if(Auth::check())
		{
			$user = Auth::user();
			
			$req = $request->all();
             #dd($req);
		    $validator = Validator::make($req,[
		                    'axf' => 'required',
		                    'guests' => 'required|numeric',
		                    'checkin' => 'required',
		                    'checkout' => 'required'
		    ]);
		
		if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
			 return redirect()->back()->withInput();
         }
		 else
		 {  
	        $req['user_id'] = $user->id;	 
			$r = $this->helpers->updateCart($req);
			
			if($r == "host")
			{
				session()->flash("update-cart-host-status-error","ok");
				return redirect()->back()->withInput();
			}
			else
			{
				session()->flash("update-cart-status","ok");
			    return redirect()->intended('checkout');
			}
			
		 }
		}
		else
		{
			session()->flash("cart-auth-status-error","ok");
			return redirect()->back();
		}
		 
    }
	
	/**
	 * Handle remove from cart.
	 *
	 * @return Response
	 */
	public function getRemoveFromCart(Request $request)
    {
		$user = null;
		 
		if(Auth::check())
		{
			$user = Auth::user();
			
			$req = $request->all();
        
		    $validator = Validator::make($req,[
		                    'axf' => 'required',
		    ]);
		
		if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
			 return redirect()->back()->withInput();
         }
		 else
		 {  
	        $req['user_id'] = $user->id;	 
			$r = $this->helpers->removeFromCart($req);
			$ret = ['status' => "ok",'data' => $r];
			session()->flash("remove-from-cart-status","ok");
			return redirect()->back();
		 }
		}
		else
		{
			session()->flash("cart-auth-status-error","ok");
			return redirect()->back();
		}
		 
    }
	
	/**
	 * Show the checkout page.
	 *
	 * @return Response
	 */
	public function getCheckout(Request $request)
    {
		$user = null;
		$messages = [];
		$sps = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			$sps = $this->helpers->getSavedPayments($user);
		}
		else
		{
			return redirect()->intended('/');
		}
		$req = $request->all();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid,['subaccounts' => true]);
		
	    $spl = $this->helpers->getSplitObect($user,['text' => true]);
		
		$c = $this->helpers->getCategories();
		#dd($spl);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		#dd($hasUnpaidOrders);
		$secure = (isset($req['ss']) && $req['ss'] == "1") ? false : true;
		shuffle($ads);
		$ref = "ETUK_".$this->helpers->getRandomString(6);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];

    	return view("checkout",compact(['user','cart','sps','spl','messages','secure','ref','c','ad','signals','plugins','banner']));
    }
	
	/**
	 * Handle book apartment.
	 *
	 * @return Response
	 */
	public function postBookApartment(Request $request)
    {
		$user = null;
		 
		if(Auth::check())
		{
			$user = Auth::user();
			
			$req = $request->all();
            #dd($req);
		    $validator = Validator::make($req,[
		                    'ref' => 'required',
		                    'amount' => 'required|numeric',
		    ]);
		
		if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
			 return redirect()->back()->withInput();
         }
		 else
		 {  
	        $r = $this->helpers->bookApartment($user,$req);
			$ret = "book-status";
			if($r == "error") $ret .= "-error";
			session()->flash($ret,"ok");
			return redirect()->intended('bookings');
		 }
		}
		else
		{
			session()->flash("cart-auth-status-error","ok");
			return redirect()->back();
		}
		 
    }
	
	/**
	 * Handle redirect.
	 *
	 * @return Response
	 */
	public function getMessageHost(Request $request)
    {
	    return redirect()->intended('bookings');
    }
	
	/**
	 * Handle message host.
	 *
	 * @return Response
	 */
	public function postMessageHost(Request $request)
    {
		$user = null;
		 
		if(Auth::check())
		{
			$user = Auth::user();
			
			$req = $request->all();
            #dd($req);
		    $validator = Validator::make($req,[
		                    'xf' => 'required|numeric',
		                    'type' => 'required',
		                    'message' => 'required',
		    ]);
		
		if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
			 return redirect()->back()->withInput();
         }
		 else
		 {  
	        $r = $this->helpers->sendMessage($user,$req);
			$ret = "send-message-status";
			if($r == "error") $ret .= "-error";
			session()->flash($ret,"ok");
			return redirect()->intended('bookings');
		 }
		}
		else
		{
			session()->flash("auth-status-error","ok");
			return redirect()->back();
		}
		 
    }
	
	/**
	 * Handle checkout apartment.
	 *
	 * @return Response
	 */
	public function getCheckoutApartment(Request $request)
    {
		$user = null;
		 
		if(Auth::check())
		{
			$user = Auth::user();
			
			$req = $request->all();
            #dd($req);
		    $validator = Validator::make($req,[
		                    'xf' => 'required|numeric'
		    ]);
		
		if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
			 return redirect()->back()->withInput();
         }
		 else
		 {  
	        $r = $this->helpers->checkoutGuest($req['xf']);
			$ret = "checkout-apartment-status";
			if($r == "error") $ret .= "-error";
			session()->flash($ret,"ok");
			return redirect()->intended('bookings');
		 }
		}
		else
		{
			session()->flash("auth-status-error","ok");
			return redirect()->back();
		}
		 
    }
	
	/**
	 * Handle cancel booking.
	 *
	 * @return Response
	 */
	public function getCancelBooking(Request $request)
    {
		$user = null;
		 
		if(Auth::check())
		{
			$user = Auth::user();
			
			$req = $request->all();
            #dd($req);
		    $validator = Validator::make($req,[
		                    'xf' => 'required|numeric'
		    ]);
		
		if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
			 return redirect()->back()->withInput();
         }
		 else
		 {  
	        $r = $this->helpers->cancelBooking($req['xf']);
			$ret = "cancel-booking-status";
			if($r == "error") $ret .= "-error";
			session()->flash($ret,"ok");
			return redirect()->intended('bookings');
		 }
		}
		else
		{
			session()->flash("auth-status-error","ok");
			return redirect()->back();
		}
		 
    }
	
	
	/**
	 * Show the orders page.
	 *
	 * @return Response
	 */
	public function getOrders(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		else
		{
			return redirect()->intended('/');
		}
		$req = $request->all();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		$orders = $this->helpers->getOrders($user);
		$sps = $this->helpers->getSavedPayments($user);
		
		#dd($orders);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];

    	return view("orders",compact(['user','cart','messages','orders','sps','c','ad','signals','plugins','banner']));
    }
	
	/**
	 * Show the saved payments page.
	 *
	 * @return Response
	 */
	public function getSavedPayments(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		else
		{
			return redirect()->intended('/');
		}
		$req = $request->all();
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		$sps = $this->helpers->getSavedPayments($user);
		
		#dd($sps);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];

    	return view("sps",compact(['user','cart','messages','sps','c','ad','signals','plugins','banner']));
    }
	
	/**
	 * Handle save apartment.
	 *
	 * @return Response
	 */
	public function getSaveApartment(Request $request)
    {
		$user = null;
		 
		if(Auth::check())
		{
			$user = Auth::user();
			
			$req = $request->all();
        
		    $validator = Validator::make($req,[
		                    'xf' => 'required'
		    ]);
		
		if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
			 return redirect()->back()->withInput();
         }
		 else
		 {
			if($user != null)
			{
              if($this->helpers->isApartmentSaved($user->id,$req['xf']))
			  {
				  session()->flash("save-duplicate-apartment-status","ok");
			  }
              else
			  {
				  $r = $this->helpers->createSavedApartment(['user_id' => $user->id, 'apartment_id' => $req['xf']]);
			      session()->flash("save-apartment-status","ok");
			  }
			}
            else
			{
				session()->flash("save-apartment-auth-status-error","ok");
			}			
			
			return redirect()->back();
		 }
		}
		else
		{
			session()->flash("save-apartment-status-error","ok");
			return redirect()->back();
		}
		 
    }
	
	/**
	 * Handle remove saved payment.
	 *
	 * @return Response
	 */
	public function getRemoveSavedPayment(Request $request)
    {
		$user = null;
		 
		if(Auth::check())
		{
			$user = Auth::user();
			
			$req = $request->all();
        
		    $validator = Validator::make($req,[
		                    'xf' => 'required'
		    ]);
		
		if($validator->fails())
         {
			 session()->flash("validation-status-error","ok");
			 return redirect()->back()->withInput();
         }
		 else
		 {  
	        $req['user_id'] = $user->id;	 
			$r = $this->helpers->removeSavedPayment($req);
			$flashMessage = "remove-saved-payment-status";
			if($r != "ok") $flashMessage .= "-error";
			session()->flash($flashMessage,"ok");
			return redirect()->back();
		 }
		}
		else
		{
			session()->flash("saved-payment-auth-status-error","ok");
			return redirect()->back();
		}
		 
    }
	
	
	/**
	 * Switch user mode (host/guest).
	 *
	 * @return Response
	 */
	public function getSwitchMode(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$validator = Validator::make($req, [
                             'm' => 'required'
         ]);
         
         if($validator->fails())
         {
             return redirect()->back();
         }
		 else
		 {
			 $m = $req['m'];
			 switch($m)
			 {
				 case 'guest':
				   $user->update(['mode' => 'host']);
				 break;
				 
				 case 'host':
				   $user->update(['mode' => 'guest']);
				 break;
			 }
			 session()->flash("switch-mode-status","ok");
			 return redirect()->intended('dashboard');
		 }
    }
	
	/**
	 * Show host subscriptions.
	 *
	 * @return Response
	 */
	public function getMySubscriptions(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		$subscriptions = $this->helpers->getUserPlans($user,['all' => true]);
		#dd($subscriptions);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	return view("my-subscriptions",compact(['user','cart','messages','c','ad','subscriptions','signals','plugins','banner']));
    }
	
	/**
	 * Show host subscriptions.
	 *
	 * @return Response
	 */
	public function getTransactions(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		$transactions = $this->helpers->getTransactions($user);
		#dd($transactions);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	return view("transactions",compact(['user','cart','messages','c','ad','transactions','signals','plugins','banner']));
    }
	
    /**
	 * Handle cancel subscription.
	 *
	 * @return Response
	 */
	public function getCancelSubscription(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		
		$req = $request->all();
		$ss = "cancel-subscription-status";
		
		if(isset($req['xf']))
		{
			$s = $this->helpers->cancelSubscription($req['xf']);
			if($s == "error") $ss .= "-error";	
		}
		else
		{
			$ss .= "-error";
		}
		
		session()->flash($ss,"ok");
		return redirect()->intended('my-subscriptions');
    }

	/**
	 * Handle checkout guest.
	 *
	 * @return Response
	 */
	public function getCheckoutGuest(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		
		$req = $request->all();
		$ss = "checkout-guest-status";
		
		if(isset($req['xf']))
		{
			$s = $this->helpers->checkoutGuest($req['xf']);
			if($s == "error") $ss .= "-error";	
		}
		else
		{
			$ss .= "-error";
		}
		
		session()->flash($ss,"ok");
		return redirect()->intended('my-bookings');
    }
	
	/**
	 * Show host active bookings.
	 *
	 * @return Response
	 */
	public function getMyBookings(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		$bookings = $this->helpers->getActiveBookings($user);
		#dd($bookings);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	return view("my-bookings",compact(['user','cart','messages','c','ad','bookings','signals','plugins','banner']));
    }
	
	
	/**
	 * Show host apartments.
	 *
	 * @return Response
	 */
	public function getMyApartments(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		$apartments = $this->helpers->getApartments($user,['all' => true]);
		#dd($apartments);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	return view("my-apartments",compact(['user','cart','messages','c','ad','apartments','signals','plugins','banner']));
    }
	
	/**
	 * Show the add apartment view.
	 *
	 * @return Response
	 */
	public function getAddApartment(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		#dd($user);
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$states = $this->helpers->states;
		$countries = $this->helpers->countries;
		$services = $this->helpers->getServices();
		$plans = $this->helpers->getPlans();
		#dd($plans);
		$secure = (isset($req['ss']) && $req['ss'] == "1") ? false : true;
		$sps = $this->helpers->getSavedPayments($user);
		$subs = $this->helpers->getUserPlans($user,['active' => true]);
		$banks = $this->helpers->banks2;
		$bankAccounts = $this->helpers->getBankDetails($user);
		$stats = $this->helpers->getUserPlanStats([
            'user' => $this->helpers->getUser($user->id),		
            'plan' => count($subs) == 0 ? [] : $subs[0]['plan']	
		]);
		#dd($stats);
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	return view("add-apartment",compact(['user','cart','messages','c','ad','services','plans','subs','stats','banks','bankAccounts','secure','sps','states','countries','signals','plugins','banner']));
    }
	
	/**
	 * Handle add new apartment.
	 *
	 * @return Response
	 */
	public function postAddApartment(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
			
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		else
		{
			return redirect()->intended('/');
		}

		$req = $request->all();
        #dd($req);
		$ret = ['status' => "error",'message' => "nothing happened"];
	    
		$validator = Validator::make($req,[
		                    'name' => 'required',
		                    'url' => 'required',
		                    'description' => 'required',
		                    'category' => 'required|not_in:none',
		                    'property_type' => 'required|not_in:none',
		                    'rooms' => 'required|numeric',
		                    'units' => 'required|numeric',
		                    'bathrooms' => 'required|numeric',
		                    'bedrooms' => 'required|numeric',
		                    'max_adults' => 'required|numeric',
		                    'amount' => 'required|numeric',
		                    'address' => 'required',
		                    'city' => 'required',
		                    'lga' => 'required',
		                    'state' => 'required',
		                    'country' => 'required',
		                    'facilities' => 'required',
		                    'img_count' => 'required|numeric',
		                    'cover' => 'required',
		                    'bank' => 'required|not_in:none'
							
		]);
		
		if($validator->fails())
         {
             $ret['message'] = "validation";
         }
		 else
		 {
			    $ird = [];
                $networkError = false;
				
                    for($i = 0; $i < $req['img_count']; $i++)
                    {
            		  $img = $request->file("add-apartment-image-".$i);
					  $imgg = $this->helpers->uploadCloudImage($img->getRealPath());
						
					  if(isset($imgg['status']) && $imgg['status'] == "error")
					  {
						  $networkError = true;
						  break;
					  }
					  else
					  {
						$ci = ($req['cover'] != null && $req['cover'] == $i) ? "yes": "no";
					    $temp = [
					       'public_id' => $imgg['public_id'],
					       'delete_token' => $imgg['delete_token'],
					       'deleted' => "no",
					       'ci' => $ci,
						   'type' => "image"
						  ];
			             array_push($ird, $temp);  
					  }
             	        
                      										
					}
					
					if($networkError)
					{
						$ret['message'] = "network";
					}
					else
					{
						$req['avb'] = "available";
					    $req['payment_type'] = "card";
					    $req['user_id'] = $user->id;
					    $req['ird'] = $ird;
					    $req['checkin'] = "12pm";
					    $req['checkout'] = "1pm";
					    $req['id_required'] = "yes";
					    $req['children'] = "none";
					    $req['pets'] = "no";
				        $bank_id = $req['bank'];
						
						if($bank_id == "new" && isset($req['bname']) && isset($req['acname']) && isset($req['acnum']))
						{
							$b = $this->helpers->createBankDetails($req);
							$bank_id = $b->id;
						}
						$req['bank_id'] = $bank_id;
						
			            $a = $this->helpers->createApartment($req);
						
						if($bank_id != null)
			            {
						//create subaccount on paystack
				        $data = [
							 'apartment' => $a,
				             'bank_details' => $this->helpers->getBankDetail($req['bank_id']),
							 'description' => "PayStack subaccount for ".$user->fname." ".$user->lname,
							 'percentage_charge' => "20"
					    ];
                         $sa = $this->helpers->createSubAccount($data);
						 
						 //create split group on paystack
						 //$sg = $this->helpers->createSplitGroup($sa->id);
						 
					   }
						 $ret = ['status' => "ok"];
					}
					
		 }
		 
		 return json_encode($ret);
    }
	
	/**
	 * Show the apartment.
	 *
	 * @return Response
	 */
	public function getMyApartment(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		if(isset($req['xf']))
		{
			$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		    $cart = $this->helpers->getCart($user,$gid);
		    #dd($user);
		    $c = $this->helpers->getCategories();
		    //dd($bs);
		    $signals = $this->helpers->signals;
			$banner = $this->helpers->getBanner();
			
		    $states = $this->helpers->states;
			$countries = $this->helpers->countries;
		
	    	$ads = $this->helpers->getAds("wide-ad");
			$services = $this->helpers->getServices();
		    $plugins = $this->helpers->getPlugins();
		
		    $apartment = $this->helpers->getApartment($req['xf'],['imgId' => true]);
			$plans = $this->helpers->getPlans();
			$banks = $this->helpers->banks2;
		    $bankAccounts = $this->helpers->getBankDetails($user);
			#dd($banks);
		    shuffle($ads);
		    $ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	    return view("my-apartment",compact(['user','cart','messages','c','ad','services','plans','banks','bankAccounts','apartment','states','countries','signals','plugins','banner']));
		}
		else
		{
			return redirect()->intended('my-apartments');
		}
		
    }
	
	/**
	 * Handle apartment update.
	 *
	 * @return Response
	 */
	public function postMyApartment(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
			
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		else
		{
			return redirect()->intended('/');
		}

		$req = $request->all();
        #dd($req);
		$ret = ['status' => "error",'message' => "nothing happened"];
	    
		$validator = Validator::make($req,[
		                    'name' => 'required',
		                    'url' => 'required',
		                    'avb' => 'required',
		                    'description' => 'required',
		                    'category' => 'required|not_in:none',
		                    'property_type' => 'required|not_in:none',
		                    'rooms' => 'required',
		                    'units' => 'required',
		                    'bathrooms' => 'required',
		                    'bedrooms' => 'required',
		                    'max_adults' => 'required|numeric',
		                    'amount' => 'required|numeric',
		                    'address' => 'required',
		                    'city' => 'required',
		                    'lga' => 'required',
		                    'state' => 'required',
		                    'facilities' => 'required',
		                    'img_count' => 'required|numeric',
							'bank' => 'required|not_in:none'
		]);
		
		if($validator->fails())
         {
             $ret['message'] = "validation";
             $ret['dt'] = $req;
         }
		 else
		 {
			    $ird = [];
                    
					if($req['img_count'] > 0)
					{
						for($i = 0; $i < $req['img_count']; $i++)
                        {
            		      $img = $request->file("my-apartment-image-".$i);
             	          $imgg = $this->helpers->uploadCloudImage($img->getRealPath());
					      $ci = "no";
					     $temp = [
					       'public_id' => $imgg['public_id'],
					       'delete_token' => $imgg['delete_token'],
					       'deleted' => "no",
					       'ci' => $ci,
						   'type' => "image"
						 ];
			              array_push($ird, $temp);
                        }
					}
                     
					
					$req['user_id'] = $user->id;
					$req['ird'] = $ird;
				    
				     $bank_id = $req['bank'];
						
						if($bank_id == "new" && isset($req['bname']) && isset($req['acname']) && isset($req['acnum']))
						{
							$b = $this->helpers->createBankDetails($req);
							$bank_id = $b->id;
						}
						$req['bank_id'] = $bank_id;
				 
			$a = $this->helpers->updateApartment($req);
			
			if($bank_id != null)
			{
				$sa = $this->helpers->getSubAccount($bank_id);
				
				if(count($sa) < 1)
				{
					//create subaccount on paystack
				        $data = [
							 'apartment' => $a,
				             'bank_details' => $this->helpers->getBankDetail($req['bank_id']),
							 'description' => "PayStack subaccount for ".$user->fname." ".$user->lname,
							 'percentage_charge' => "20"
					    ];
                         $sa = $this->helpers->createSubAccount($data);
				}       
				$ret = ['status' => "ok"];
			}
			
		 }
		 
		 return json_encode($ret);
    }
	
	/**
	 * Delete an apartment.
	 *
	 * @return Response
	 */
	public function getDeleteApartment(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
			
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		if(isset($req['xf']))
		{
		    $this->helpers->deleteApartment($req['xf']);
			session()->flash("delete-apartment-status","ok");
		}
		
		return redirect()->intended('my-apartments');
		
    }
	
	
	
	/**
	 * Set apartment's current image.
	 *
	 * @return Response
	 */
	public function getSetCoverImage(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
			
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		if(isset($req['xf']) && isset($req['apartment_id']))
		{
		    $this->helpers->setCoverImage($req);
			session()->flash("sci-status","ok");
		}
		
		return redirect()->back();
		
    }
	
	/**
	 * Delete an apartment image.
	 *
	 * @return Response
	 */
	public function getRemoveImage(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
			
			if($user->mode != "host")
			{
				session()->flash("valid-mode-status-error","ok");
			    return redirect()->intended('/');
			}
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		if(isset($req['xf']) && isset($req['apartment_id']))
		{
		    $ret = $this->helpers->deleteApartmentImage($req);
			if($ret == "isCover") session()->flash("cover-image-status-error","ok");
			else if($ret == "ok") session()->flash("ri-status","ok");
		}
		
		return redirect()->back();
		
    }
	
	/**
	 * Show the receipt for a booking.
	 *
	 * @return Response
	 */
	public function getReceipt(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}

		
		$req = $request->all();
		
		if(isset($req['xf']))
		{
			$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		    $cart = $this->helpers->getCart($user,$gid);
		    #dd($user);
		    $c = $this->helpers->getCategories();
		    //dd($bs);
		    $signals = $this->helpers->signals;
			$banner = $this->helpers->getBanner();
			
		    $states = $this->helpers->states;
		
	    	$ads = $this->helpers->getAds("wide-ad");
			$services = $this->helpers->getServices();
		    $plugins = $this->helpers->getPlugins();
		
		    $order = $this->helpers->getOrder($req['xf']);
			#dd($order);
		    shuffle($ads);
		    $ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	    return view("receipt",compact(['user','cart','messages','c','ad','services','order','states','signals','plugins','banner']));
		}
		else
		{
			return redirect()->intended('my-apartments');
		}
		
    }
	
	/**
	 * Delete an apartment image.
	 *
	 * @return Response
	 */
	public function getTCDI(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			return redirect()->intended('/');
		}
		
		$req = $request->all();
		
		if(isset($req['xf']))
		{
		    $ret = $this->helpers->deleteCloudImage($req['xf']);
			return $ret;
		}
		else
		{
			return ['status' => "error",'message' => "validation"];
		}
		
		
    }
    
    /**
	 * Show blog posts.
	 *
	 * @return Response
	 */
	public function getPosts(Request $request)
    {
		$user = null;
		$messages = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		
		$req = $request->all();
		
		$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		$cart = $this->helpers->getCart($user,$gid);
		
		$c = $this->helpers->getCategories();
		//dd($bs);
		$signals = $this->helpers->signals;
		$banner = $this->helpers->getBanner();
		
		$ads = $this->helpers->getAds("wide-ad");
		$plugins = $this->helpers->getPlugins();
		
		//$posts = $this->helpers->getPosts();
		$posts = [];
		#dd($posts);
		shuffle($ads);
		$ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	return view("posts",compact(['user','cart','messages','c','ad','posts','signals','plugins','banner']));
    }
    
    /**
	 * Show the post.
	 *
	 * @return Response
	 */
	public function getPost(Request $request)
    {
		$user = null;
		$messages = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		
		$req = $request->all();
		
		if(isset($req['xf']))
		{
			$gid = isset($_COOKIE['gid']) ? $_COOKIE['gid'] : "";
		    $cart = $this->helpers->getCart($user,$gid);
		    #dd($user);
		    $c = $this->helpers->getCategories();
		    //dd($bs);
		    $signals = $this->helpers->signals;
			$banner = $this->helpers->getBanner();
		
	    	$ads = $this->helpers->getAds("wide-ad");
		    $plugins = $this->helpers->getPlugins();
		
		    $post = $this->helpers->getPost($req['xf']);
			#dd($post);
		    shuffle($ads);
		    $ad = count($ads) < 1 ? "images/inner-ad-2.png" : $ads[0]['img'];
        
    	    return view("post",compact(['user','cart','messages','c','ad','post','signals','plugins','banner']));
		}
		else
		{
			return redirect()->intended('blog');
		}
		
    }
	
	/**
	 * Handle autocomplete suggestions for apartment search
	 *
	 * @return Response
	 */
	public function getAutoComplete(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
		   $user = Auth::user();
		}
		
		$req = $request->all();
        #dd($req);
		$ret = ['status' => "error",'message' => "nothing happened"];
	    
		$validator = Validator::make($req,[
		                    'type' => 'required',
		    		]);
		
		if($validator->fails())
         {
             $ret['message'] = "validation";
         }
		 else
		 {					
			$req['user_id'] = $user == null ? "" : $user->id;
			$rett = $this->helpers->getAutoCompleteData($req);
			#$rett = array_unique($rett);
			$ret = ['status' => "ok",'data' => $rett];
		 }
		 
		 return json_encode($ret);
    }
	
    
    
/**
	 * Switch user mode (host/guest).
	 *
	 * @return Response
	 */
	public function getTestBomb(Request $request)
    {
		$user = null;
		$messages = [];
		$ret = ['status' => "error", 'message' => "nothing happened"];
		
		if(Auth::check())
		{
			$user = Auth::user();
			$messages = $this->helpers->getMessages(['user_id' => $user->id]);
		}
		else
		{
			$ret['message'] = "auth";
		}
		
		$req = $request->all();
		
		$validator = Validator::make($req, [
                             'type' => 'required',
                             'method' => 'required',
                             'url' => 'required'
         ]);
         
         if($validator->fails())
         {
             $ret['message'] = "validation";
         }
		 else
		 {
       $rr = [
          'data' => [],
          'headers' => [],
          'url' => $req['url'],
          'method' => $req['method']
         ];
      
      $dt = [];
      
		   switch($req['type'])
		   {
		     case "bvn":
		       /**
			   $rr['data'] = [
		         'bvn' => $req['bvn'],
		         'account_number' => $req['account_number'],
		        'bank_code' => $req['bank_code'],
		         ];
		       **/  
			   //localhost:8000/tb?url=https://api.paystack.co/bank/resolve_bvn/:22181211888&method=get&type=bvn
		         $rr['headers'] = [
		           'Authorization' => "Bearer ".env("PAYSTACK_SECRET_KEY")
		           ];
		     break;
		   }
		   
			$ret = $this->helpers->bomb($rr);
			 
		 }
		 
		 dd($ret);
    }
	
	
	/**
	 * Test new message.
	 *
	 * @return Response
	 */
	public function getText(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}

		$req = $request->all();
        #dd($req);
		$ret = ['status' => "error",'message' => "nothing happened"];
	    
		$validator = Validator::make($req,[
		                    'to' => 'required',
		                    'msg' => 'required'                    
		]);
		
		if($validator->fails())
         {
             $ret['message'] = "validation";
         }
		 else
		 {					
					
				 
			$ret = $this->helpers->text($req);
		 }
		 
		 return json_encode($ret);
    }
	
	
	/**
	 * Handle add review.
	 *
	 * @return Response
	 */
	public function postSubscribe(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			session()->flash("add-review-status-error","ok");
			return redirect()->back();
		}

		$req = $request->all();
       #dd($req);
	    
		$validator = Validator::make($req,[
		                    'em' => 'required'
		        
		]);
		
		if($validator->fails())
         {
			 $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
         }
		 else
		 {
			if($this->helpers->isSubscribed(['email' => $req['em']]))
			{
				session()->flash("duplicate-subscribe-status-error","ok");
			    return redirect()->back();
			}
			else
			{  
			   $req['email'] = $req['em'];	  
			   $req['status'] = "enabled";	  
		       $r = $this->helpers->createLead($req);
			   
			   
			   session()->flash("subscribe-status","ok");
			   $uu = "/";
			   return redirect()->intended($uu);	
			}		
		 }
    }
	
	
	/**
	 * Retrieve Bank settlement codes from PayStack.
	 *
	 * @return Response
	 */
	public function getBankSettlementCodes(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}

		$req = $request->all();
        #dd($req);
		$rett = ['status' => "error",'message' => "nothing happened"];
		$ret = "";
	    
		$validator = Validator::make($req,[
		                    'ss' => 'required'                
		]);
		
		if($validator->fails())
         {
             $rett['message'] = "validation";
			 $ret = json_encode($rett);
         }
		 else
		 {					
					
		  $rr = [
			     'data' => [
                 
		         ],
                 'headers' => [
	              'Authorization' => "Bearer ".env("PAYSTACK_SECRET_KEY")
	             ],
                 'url' => "https://api.paystack.co/bank?country=nigeria&perPage=".$req['ss'],
                 'method' => "get"
                ];
			  
	           $ret = $this->helpers->bomb($rr);
		 }
		 
		 return $ret;
    }
	
	

	/**
	 * Debugging route
	 *
	 * @return Response
	 */
	public function getDebug()
    {
        //create split group on paystack
      // $ret = $this->helpers->createSplitGroup("1");
		dd($ret);
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getZoho()
    {
        $ret = "97916613";
    	return $ret;
    }
	
	

	
}
