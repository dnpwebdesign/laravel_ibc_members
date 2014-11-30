<?php

class Location extends Eloquent {
	protected $guarded = array();
	//protected $table = 'businesses';

	public static $rules = array(
		'location_code' => 'required',
		'location' =>'required'

	);



}
