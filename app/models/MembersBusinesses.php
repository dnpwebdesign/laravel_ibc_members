<?php

class MembersBusinesses extends Eloquent {
	//protected $table ='members_businesses';
	protected $guarded = array('id');
  	protected $fillable = array('member_id','business_id','is_owner','role');

  	public static $rules = array(

  	);

    public function members(){
    	return $this->belongsTo('User');
    }
	public function businesses(){
    	return $this->belongsTo('Business');
    }

}

