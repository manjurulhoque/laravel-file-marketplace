<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
