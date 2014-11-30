<?php

class Card extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'member_number' => 'required',
		'expiry_date' => 'required',
		'is_paid_for' => 'required',
		'user_id' => 'required',
	);


    public function users(){
    	return $this->belongsTo('User');
    }
}
