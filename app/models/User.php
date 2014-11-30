<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;


class User extends Eloquent implements UserInterface, RemindableInterface {
    
	  protected $guarded = array('id');
    protected $fillable = array('username','password','name','email','phone','type_id');
  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */


/**
         * The database table used by the model.
         *
         * @var string
         */
    protected $table = 'users';

    protected $hidden = array('password');

  	public static $rules = array(
   
   'first_name'=>'required|min:2',
   'last_name'=>'required|min:2',
   'username'=>'required|alpha|min:2',
   'email'=>'required|email',
   'password'=>'required|alpha_num|between:4,10|confirmed',
   'password_confirmation'=>'required|alpha_num|between:4,10',
   'type_id'=>'required'

  	);



    public function types(){
    	return $this->belongsTo('Type', 'type_id');
    }

    public function membersbusinesses(){
        return $this->hasMany('MembersBusinesses');
    }


  /**
   * Get the unique identifier for the user.
   *
   * @return mixed
   */
  public function getAuthIdentifier()
  {
    return $this->getKey();
  }

/*
public function setPasswordAttribute($value)
{
    $this->attributes['password'] = Hash::make($value);
}*/

  /**
   * Get the password for the user.
   * return the decrypted password 16/11/14
   * @return string
   */
/*  public function getAuthPassword()
  {
    return $this->password; //obsolete function 16/11/14, lihat dibawah
  }
*/



public function getAuthPassword()
{
  # First decrypt the encrypted password in database
  # Then Hash return the normal hashed password 
  return Hash::make(Crypt::decrypt($this->password));
}

  /**
   * Get the e-mail address where password reminders are sent.
   *
   * @return string
   */
  public function getReminderEmail()
  {
    return $this->email;
  }	
}

