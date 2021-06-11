<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    protected $table = "articles";
	public function user()
	{
		return $this->belongsTo('App\user','user_id','id');
	}
	public function product()
	{
		return $this->belongsTo('App\product','product_id','id');
	}
	public function seo()
	{
		return $this->belongsTo('App\seo','seo_id','id');
	}
	public function category()
	{
		return $this->belongsTo('App\category','category_id','id');
	}
	public function images()
    {
        return $this->hasMany('App\images','articles_id','id');
    }
    public function quanlykho()
    {
        return $this->hasMany('App\quanlykho','articles_id','id');
    }
}
