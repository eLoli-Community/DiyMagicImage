<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MagicImage extends Pivot
{
    public $incrementing = true;
    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function purge()
    {
        $this->delete();
    }
}
