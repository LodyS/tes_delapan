<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Txt extends Model
{
    protected $table = 'txt';
    protected $fillable = ['name', 'email'];

    public function storeTxt($request)
    {
        $this->name = $request->name;
        $this->email = $request->email;

        $saved = $this->save();

        return $saved;
    }
}
