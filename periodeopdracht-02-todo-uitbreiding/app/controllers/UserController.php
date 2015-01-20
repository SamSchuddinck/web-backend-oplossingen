<?php 
	class UserController extends BaseController
	{
		public function getActivate($code)
		{
			$user = User::where('code', '=' , $code);

			if($user->count())
			{
				$user = $user->first();
				if($user->active == 1)
				{
					return Redirect::to('/')->with('fail','Dit account is al geactiveerd');
				}
				$user->active = 1;

				if($user->save())
				{
					return Redirect::to('/')->with('success','Account geactiveerd, je kan vanaf nu inloggen!');
				}
			}
			else
			{
				return Redirect::to('/')->with('fail','Dit is een ongeldige activatie link');
			}
		}
		public function login()
		{
			$input = Input::all();

			$rules = array(
				'username' => 'required',
				'password'  => 'required|min:8'
				);
			$messages = array(
				'username.required' => 'Je hebt geen gebruikersnaam ingevuld',
				'password.required' => 'Je hebt geen wachtwoord ingevuld',
				'password.min' => 'Wachtwoord moet min. 8 tekens bevatten'
				);
			$v = Validator::make($input,$rules,$messages);

			if($v->passes())
			{
				
				if(User::where('username',$input['username'])->count() != 0)
				{
					$user = User::where('username',$input['username'])->first();
					if($user->active == false)
					{
						return Redirect::intended('/Login')->with('fail','Dit account is nog niet geactiveerd')->withInput();
					}
					else
					{
						$password = $input['password'].$user->salt;
					}
				}
				else
				{
					
					return Redirect::to('/Login')->with('fail','Er bestaat geen gebruiker met deze username')->withInput();
				}

				$credentials = array(
					'username' => $input['username'],
					'password' => $password,
					'active' => true
					);

				$remember = (Input::has('remember')) ? true : false;
				if(Auth::attempt($credentials,$remember))
				{
					return Redirect::to('/')->with('success','Welkom, '.Auth::user()->fname .' '.Auth::user()->lname);
				}
				else
				{
					return Redirect::to('/Login')->with('fail','Wachtwoord is onjuist.')->withInput();		
				}
			}
			else
			{
				return Redirect::to('/Login')->withInput()->withErrors($v);
			}
			
		}
		public function logOut()
		{
			Auth::logout();
			return Redirect::to('/')->with('success','Je bent successvol uitgelogd.');;
			
		}
		public function register()
		{
			$input = Input::all();

			$rules = array(
				'username' => 'required|unique:users',
				'email' => 'required|unique:users|email',
				'password' => 'required|confirmed|min:8',
				'fname' => 'required',
				'lname' => 'required'

				);
			$messages = array(
				'email.required' => 'Gelieve een email adres in te vullen',
				'email.unique' => 'Dit email adres is al in gebruik!',
				'email.email' => 'Dit is geen geldig email adres',
				'username.required' => 'Gelieve een gebruikersnaam in te vullen',
				'username.unique' => 'De gebruikersnaam is al in gebruik',
				'password.required' => 'Gelieve een wachtwoord in te vullen',
				'password.confirmed' => 'De ingevulde wachtwoorden komen niet overeen',
				'password.min' => 'Het wachtwoord moet minimaal 8 tekens bevatten',
				'fname.required' => 'Gelieve een voornaam in te vullen',
				'lname.required' => 'Gelieve een achternaam in te vullen'
				);

			$v = Validator::make($input,$rules,$messages);

			if($v->passes())
			{
				$user = new User();
				$salt = str_random(15);
				$password = Hash::make($input["password"].$salt);
				$user->username = $input['username'];
				$user->fname = $input['fname'];
				$user->lname = $input['lname'];
				$user->email = $input['email'];
				$user->password = $password;
				$user->salt = $salt;
				$user->code = str_random(30);
				$user->active = false;
	
	            try
	            {
	            	Mail::queue('emails.auth.activate', 
					array(
						'link' => URL::action('UserController@getActivate',$user->code),
						'fname'=> $user->fname,
						'lname' => $user->lname),
					function($message) use ($user)
					{
						$message->to($user->email,$user->fname.' '.$user->lname);
						$message->subject('ToDoApp - Activeer Account');
					});
	            }
	            catch(Exception $e)
	            {
	            	return Redirect::to('/Registreer')->with('fail','Kon registratie mail niet verzenden!')->withInput();
	            }
	            $user->save();
	            return Redirect::to('/')
	                ->with('success','Je hebt met succes een account aangemaakt! 
	               	 Er werd een mail naar je verzonden met een activatie code voor je account te activeren.');  
	               

			}
			else
			{
				return Redirect::to('/Registreer')->withInput()->withErrors($v);
			}
		
		}
	}
 ?>