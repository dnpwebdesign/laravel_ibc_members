<?php

class UserController extends \BaseController {

	//$type = User::find(1)->type;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//        
		//$users = User::all();
		$users = User::paginate(5);
 		//$users->toarray();
 		//print_r($users);
        return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$types = Type::all();
		$type_options = array();

		foreach($types as $type){
			$type_options[$type->id] = $type->type;
		}
		//create a user

		return View::make('users.create', array('type_options'=>$type_options));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function register()
	{

		$types = Type::all();
		$type_options = array();

		foreach($types as $type){
			$type_options[$type->id] = $type->type;
		}
		//create a user

		return View::make('users.register', array('type_options'=>$type_options));
	}

	public function postCreate() {
		echo "here!";
	   $validator = Validator::make(Input::all(), User::$rules);
	 
	   if ($validator->passes()) {
	      // validation has passed, save user in DB
	   } else {
	      // validation has failed, display error messages   
	   }
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	

		
		//
	    $input = Input::all();
        $validation = Validator::make($input, User::$rules);


        $result = $validation->passes();
		echo $result; // True or false

        if ($validation->passes())
        {
		            //User::create($input);
		   $user = new User;
		   $user->username = Input::get('username');
		   $user->name = Input::get('name');
		   $user->email = Input::get('email');
		   $user->phone = Input::get('phone');

		   $user->type_id = Input::get('type_id');
		   //$user->password = Hash::make(Input::get('password'));
		   $user->password = Crypt::encrypt(Input::get('password'));

		   $user->save();

            return Redirect::to('login')->with('message', 'Thanks for registering!');
            //return Redirect::route('users.index');
        }

        return Redirect::route('register')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	
	}

	public function getLogin() {
	   return View::make('users.login');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$user = User::find($id);
		if (is_null($user))
		{
		    return Redirect::route('users.index');
		}

		$mb = MembersBusinesses::where('member_id','=',$id)->get();



		//$business_array=Business::where('business_id','=',$mb->business_id);;
		//$b_id =$mb->first()->business_id;

		$business_array=array();
		$show_password = Crypt::decrypt(User::find($id)->password);

	//return "User's password is: {$show_password}";

		//var_dump($show_password);
		foreach ($mb as $b) {
			# code...
			if(!is_null(Business::find($b->business_id))){
				
				$business_array[$b->business_id]=Business::find($b->business_id);
				$business_array[$b->business_id]->mb_id =$b->id;
			}
			
		}


		$occupation_array = Type::where('id','=',$user->type_id)->first();

		/*
		* Retrieve location
		*/
		$location = Location::where('code','=',$user->location_code)->first()->location;


		if (is_null($occupation_array))
		{
			$occupation="";
		}else
			$occupation=$occupation_array->type;

		return View::make('users.show', compact('user'))
			->with('business_array',$business_array)
			->with('occupation_array',$occupation)
			->with('show_password',$show_password)
			->with('location',$location);
	}

	public function postSignin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')

			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				 #return Redirect::to('http://members.ibcm.org.au/status/dashboard')
				 return Redirect::to('http://localhost/www/laravel_ibc_members/ibc_members_2014/public/status/dashboard')
					->with('message', 'Welcome to IBC! You are now logged in as '.Auth::user()->username .".");
				// for now we'll just echo success (even though echoing in a controller is bad)
				//echo 'SUCCESS!';

			} else {	 	
				echo($userdata["email"]);
				echo($userdata["password"]);
				// validation not successful, send back to form	
				return Redirect::to('login')
					->with('message', 'Email address & password do not match.');

			}

		}
	}
public function getDashboard() {
   $this->layout->content = View::make('users.dashboard');
}


public function getLogout() {
   Auth::logout();
   return Redirect::to('login')->with('message', 'Your are now logged out!');
}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function edit($id)
    {
        $user = User::find($id);
        if (is_null($user))
        {
            return Redirect::route('users.index');
        }

    	$type_options = Type::lists('type','id');


		$location_options = Location::lists('location','code');

    	return View::make('users.edit', compact('user'),array('type_options'=>$type_options,'location_options'=>$location_options));


    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {
        $input = Input::all();
        $validation = Validator::make($input, User::$rules);

        var_dump($input);

        
        if ($validation->passes())
        {
            $user = User::find($id);

		   $user->username = Input::get('username');
		   $user->first_name = Input::get('first_name');
		   $user->last_name = Input::get('last_name');
		   $user->email = Input::get('email');
		   $user->phone = Input::get('phone');
		   $user->gender = Input::get('gender');
		   $user->location_code = Input::get('location_code');
		   $user->bio = Input::get('bio');
		   $user->type_id = Input::get('type_id');
		   //$user->password = Hash::make(Input::get('password'));
		   //$user->password = Crypt::encrypt(Input::get('password'));
		   $user->save();

			




 			$file = Input::file('photo');
 			if($file){
 				echo "has file";
				$destinationPath = 'uploads/members';
				$filename = $file->getClientOriginalName();

				$extension =$file->getClientOriginalExtension();

				//echo $extension;

				if($extension=="jpg"||$extension=="gif"||$extension=="png"){
					$filename = $user->username .".".$extension;

					if(file_exists($destinationPath . "/".$filename))
						unlink($destinationPath . "/".$filename);
					$upload_success = Input::file('photo')->move($destinationPath, $filename);
					if( $upload_success ) {
	   					//return Response::json('success', 200);
	   					$user->photo = $user->username .".".$extension;
					} else {
	   					return Redirect::route('users.edit', $id)
						->with('message',"Error uploading!");	
					}
				}else{
					return Redirect::route('users.edit', $id)
						->with('message',"Please upload image files only!");	
				}
				

				$upload_success = Input::file('photo')->move($destinationPath, $user->username .".jpg");
 
				


			} else{
 				echo "no file";
			 }

			 $user->save();
			 return Redirect::route('users.show', $id)
						->with('message',"Your profile is updated!");	

		}
            //$user->update($input);
          //  return Redirect::route('users.show', $id);

            
        


		return Redirect::route('users.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
  
}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy($id)
    {
    	$fileSystem = new File;
    	$nerd = User::find($id);
    	if($fileSystem::isFile('uploads/members/'.$nerd->photo)){
    		$fileSystem::delete('uploads/members/'.$nerd->photo);

    	}
        User::find($id)->delete();

        return Redirect::route('users.index');
    }



}