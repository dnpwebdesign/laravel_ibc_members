<?php

class MembersBusinessesController extends \BaseController {


	/**
	 * Business Repository
	 *
	 * @var Business
	 */
	protected $membersbusinesses;

	public function __construct(MembersBusinesses $membersbusiness)
	{
		$this->membersbusinesses = $membersbusiness;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

        
        public function link($user_id, $business_id){
            //echo "linking!";
            //echo "<br>user" . $user_id;
            //echo "<br>business" . $business_id;
            
            $mb = Business::where('id','=',$business_id)->first();
            $user = User::where('id','=',$user_id)->first();
            
            //$business = $this->business->find($business_id);

	    if (is_null($mb))
	    {
		return Redirect::route('businesses.index');
            }
            
            //var_dump($user->id);

            return View::make('members_businesses.link')
                ->with('user',$user)
                ->with('business',$mb);
	    
        }
        
        public function linked(){
 		$input = Input::all();
		$validation = Validator::make($input, MembersBusinesses::$rules);

                var_dump($input);
                $user_id = Input::get('member_id');
                
		if ($validation->passes())
		{
				
		    $this->membersbusinesses->create($input);
                    
                    return Redirect::route('users.show', array('id'=>$user_id))
                        ->with('message', 'You have successfully added and joinned the business!');
                }
                
		return Redirect::route('members_businesses.link')
		    ->withInput()
            ->withErrors($validation)
		    ->with('message', 'There were validation errors.');
	        
            
        }
        
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$r = $this->membersbusinesses->find($id);

        $mb = Business::where('id','=',$r->business_id)->first();
        $user = User::where('id','=',$r->member_id)->first();
  		
  		//var_dump($user);
            //$business = $this->business->find($business_id);

	    if (is_null($r))
	    {
		return Redirect::route('businesses.index');
            }
            
            //var_dump($user->id);

            return View::make('members_businesses.edit', compact('r'))
                ->with('user',$user)
                ->with('business',$mb);


    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		echo $id;
		$input = array_except(Input::all(), '_method');

		//var_dump($input);
		
		$validation = Validator::make($input, MembersBusinesses::$rules);

		if ($validation->passes())
		{
			$r = $this->membersbusinesses->find($id);
			$r->update($input);

			return Redirect::route('businesses.show', $r->business_id)
				->with('message', 'Record updated');
		}

		return Redirect::route('members_businesses.edit', $id)
			->withInput()
			
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	


	}

	public function unlink($member_id, $business_id){
		//echo $member_id;
		//echo $business_id;
/*
		$mb = Business::where('id','=',$business_id)->first();
        $user = User::where('id','=',$member_id)->first();
            
        $membersbusiness = MembersBusinesses::where('business_id','=',$business_id)
        	->where('member_id', '=',$member_id)->get();
		
		$id = $membersbusiness->first()->id;

            //$business = $this->business->find($business_id);

	    if (is_null($mb))
	    {
			return Redirect::route('businesses.index');
        }
            
            //var_dump($user->id);

            return View::make('members_businesses.unlink')
                ->with('user',$user)
                ->with('business',$mb)
                ->with('id',$id);
*/

		//$b = Business::where('id','=',Input::get('business_id'))//->first();
        //$member = User::where('id','=',Input::get('member_id'))->first();
         
         $b = Business::where('id','=',$business_id)->first();
        //$member = User::find($member_id)->get();
		$member = User::where('id','=',$member_id)->first();
        echo $member;
         

        $membersbusiness = MembersBusinesses::where('business_id','=',$business_id)
        	->where('member_id', '=',$member_id)->first();
		$id = $membersbusiness->id;
	

		if (is_null($membersbusiness))
        {   
            return Redirect::route('businesses.show', $business_id)
                ->with('message', 'Error');
        }

            MembersBusinesses::find($id)->delete();
            return Redirect::route('businesses.show', $business_id)
            	->with('message', $member->name . ' has resigned from ' . $b->name);




	}

	public function unlinked(){
		$id=Input::get('id');

		$b = Business::where('id','=',Input::get('business_id'))->first();
        $member = User::where('id','=',Input::get('member_id'))->first();
         


		$mb = MembersBusinesses::find($id);
		//this->membersbusinesses->destroy(Input::get('id'));
		     if (is_null($mb))
            {   
                return Redirect::route('businesses.show', $mb->member_id)
                    ->with('message', 'Error');
            }

            MembersBusinesses::find($id)->delete();
            return Redirect::route('businesses.show', Input::get('business_id'))
            	->with('message', $member->name . ' has resigned from ' . $b->name);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
            
                
            $mb = MembersBusinesses::find($id);
                
            if (is_null($mb))
            {   
                return Redirect::route('users.show', $mb->member_id)
                    ->with('message', 'Error');
            }
            
            var_dump($mb->member_id);
            
            //$member = User::where('id',$mb->member_id)->first();
            $member = User::find($mb->member_id);
            echo "<br>mid".$member->id;
            //$business = Business::where('id',$mb->business_id)->first();
            $business = Business::find($mb->business_id);
            echo "<br>bid".$business->id;
            MembersBusinesses::find($id)->delete();
            return Redirect::route('users.show', $mb->member_id)
            	->with('message', $member->name . ' has resigned from ' . $business->name);
	}

}