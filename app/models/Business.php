<?php

class Business extends Eloquent {
	protected $guarded = array();
	//protected $table = 'businesses';

	public static $rules = array(
		'name' => 'required',
		'description' => 'required',
		'email' => 'email',
		
		'website' => 'url',
		'state' => 'min:3',
		'postcode' => 'integer',

	);

    public function membersbusinesses(){
    	return $this->hasMany('MembersBusinesses','business_id');

    }

}
