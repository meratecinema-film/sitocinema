<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShowSpec extends Model
{
    use HasFactory;

    protected $table = 'showspecs';

    protected $fillable = [
        'name',
        'description',
        'icon',
    ];

    /**
     * Una specifica di spettacolo ha molte proiezioni (Shows).
     */
    public function shows(): HasMany
    {
        return $this->hasMany(Show::class, 'showspec_id');
    }
}