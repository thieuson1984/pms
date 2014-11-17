<?php

class Userrole extends Eloquent {
	protected $guarded = array();
	protected $table = 'userroles';
	protected $fillable = array('parent','name','level', 'descr');
	public static $rules = array(
		'name' => 'required|unique:userroles'
	);
	public function Parent()
    {
        return $this->hasOne('Userrole');
    }

	public function Children()
    {
        return $this->hasMany('Userrole','parent');
    }
}
