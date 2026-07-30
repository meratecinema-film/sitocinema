<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventType extends Model
{
    use HasFactory;

    protected $table = 'eventtypes';

    protected $fillable = [
        'name',
        'description',
        'color',
    ];

    /**
     * Un EventType possiede molti Film.
     */
    public function films(): HasMany
    {
        return $this->hasMany(Film::class, 'eventtype_id');
    }
}