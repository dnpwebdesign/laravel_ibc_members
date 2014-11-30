<?php

class BusinessesController extends BaseController {

	/**
	 * Business Repository
	 *
	 * @var Business
	 */
	protected $business;

	public function __construct(Business $business)
	{
		$this->business = $business;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$businesses = $this->business->all();




		return View::make('businesses.index', compact('businesses'));
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function b_list($id)
	{
		$businesses_taken = $this->business->all();


		$businesses_minus = DB::table('businesses')
        ->join('members_businesses', function($join) use($id)
        {
            $join->on('businesses.id', '=', 'members_businesses.business_id')
            ->where('members_businesses.member_id', '=', $id);
        })
        ->get();

        $businesses = array();

     	echo "<br>";
             	
        foreach ($businesses_taken as $b) {
			$found = false;



        	foreach($businesses_minus as $bm){
        		//echo "Compare " . $b->id  . " with ";
        		//echo $bm->business_id;
        		//found duplicate?
        		if($b->id==$bm->business_id)
        			$found=true;

        	}
        	//echo "<br>";
        	if($found==false)
        		$businesses[$b->id]=$b;
        	//$businesses[$b->id]->id=$b->id;
        };

        
		return View::make('businesses.list', compact('businesses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('businesses.create');
	}
	
	
		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add($id)
	{
		
		
		$users = User::find($id);
		//var_dump($users->first()->username);
		$user_name=$users->first()->username;
		return View::make('businesses.add')
			->with('username',$user_name)
			->with('user_id',$id);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Business::$rules);

		if ($validation->passes())
		{
			

			
			$this->business->create($input);

			return Redirect::route('businesses.index');
		}

		return Redirect::route('businesses.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}
	
	
		/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store_user()
	{
		//echo "gaga";
		
		$user_id = Input::get('user_id');
		
		
		$input = Input::except('user_id');
		//echo $user_id;
		$validation = Validator::make($input, Business::$rules);
//var_dump($input);
		if ($validation->passes())
		{
			
		
		   
			$b = $this->business->create($input);
			$business_id=$b->id;
			
			//echo "user id".$user_id;
			//echo "<br>";
			//echo "b id".$business_id;
			return Redirect::route('members_businesses.link', array('user_id'=>$user_id, 'business_id'=>$business_id));
		}

		return Redirect::route('businesses.add', $user_id)
			->withInput()

			->withErrors($validation)
			->with('message', 'There were validation errors.');

	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$business = $this->business->findOrFail($id);

        if (is_null($business))
        {
            return Redirect::route('businesses.index');
        }

		$mb = MembersBusinesses::where('business_id','=',$id)->get();

		//define temp storage for member data and prepare it for View
		$users_array = array();

		foreach ($mb as $m){
			//echo $m->user_id;
			
			$user_id = $m->member_id;

			$users = User::find($user_id);

			$users_array[$user_id]["id"] = $users["id"];
			$users_array[$user_id]["name"] = $users["name"];
			$users_array[$user_id]["username"] = $users["username"];
			$users_array[$user_id]["role"] = $m->role;
			if($m->is_owner==1)
				$status = "Owner";
			else
				$status = "Staff";
			$users_array[$user_id]["is_owner"] = $status;
			$users_array[$user_id]["mb_id"] = $m->id;


		}

		return View::make('businesses.show', compact('business'))
			->with('mb',$mb)
			->with('users_array',$users_array);


		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$business = $this->business->find($id);

		if (is_null($business))
		{
			return Redirect::route('businesses.index');
		}

		return View::make('businesses.edit', compact('business'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Business::$rules);

		if ($validation->passes())
		{
			$business = $this->business->find($id);
			$business->update($input);

			return Redirect::route('businesses.show', $id);
		}

		return Redirect::route('businesses.edit', $id)
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
		$this->business->find($id)->delete();

		return Redirect::route('businesses.index');
	}

}
