<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewProssimiFilm extends Model
{
    protected $table = 'view_prossimifilm';

    public $timestamps = false;

    // La vista ha una colonna id, quindi possiamo usarla come PK
    protected $primaryKey = 'id';

    // La vista è read-only
    public $incrementing = false;
    protected $guarded = [];
}
