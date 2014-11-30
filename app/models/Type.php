<?php

class Type extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'type' => 'required',
		'fees' => 'required',
		'notes' => 'required'
	);


	 public function users(){
    	return $this->hasMany('User','type_id');
    }
}
