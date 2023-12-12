<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $fillable = ['menu_title', 'parent_id', 'sort_order', 'slug'];

    public function parent ()
    {
        return $this->hasOne('App\Menu', 'id', 'parent_id')->orderBy('sort_order');
    }

    public function children ()
    {
        return $this->hasMany('App\Menu', 'parent_id', 'id')->orderBy('sort_order');
    }

    public function tree ()
    {
        return static::with(implode('.', array_fill(0,100, 'children')))->where('parent_id', 0)->orderBy('sort_order')->get();
    }
}
