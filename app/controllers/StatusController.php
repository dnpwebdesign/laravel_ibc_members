<?php


date_default_timezone_set('Australia/Melbourne');

class StatusController extends \BaseController {

	protected $status;

	public function __construct(Status $status)
	{
		$this->status = $status;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$statuss = $this->status->all();

		//var_dump($statuss);
		return View::make('status.index', compact('statuss'));
	
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		//
		//$users = $this->users->all();
		$statuss = $this->status->all();

		$t = DB::table('statuses as s')
	        ->leftJoin('users', 'users.id', '=', 's.member_id')
	        ->select('s.created_at AS when', 'username', 'status','photo','gender', 'member_id')
	        ->orderBy('when', 'DESC')
    	    ->get();
		//var_dump($t);
		return View::make('status.dashboard', compact('t'));
	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('status.create');
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
		$validation = Validator::make($input, Status::$rules);

		if ($validation->passes())
		{
			$this->status->create($input);

			return Redirect::route('status.dashboard');
		}

		return Redirect::route('status.create')
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
		//
		$status = $this->status->findOrFail($id);

		return View::make('status.show', compact('status'));
	
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
		$status = $this->status->find($id);

		if (is_null($status))
		{
			return Redirect::route('status.index');
		}

		return View::make('status.edit', compact('status'));
	
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
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Status::$rules);

		if ($validation->passes())
		{
			$status = $this->status->find($id);
			$status->update($input);

			return Redirect::route('status.show', $id);
		}

		return Redirect::route('status.edit', $id)
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
		//
	}

}