<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'showspec_id',
        'film_id',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Lo Show appartiene a un Film.
     */
    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }

    /**
     * Lo Show appartiene a una specifica (ShowSpec).
     */
    public function showSpec(): BelongsTo
    {
        return $this->belongsTo(ShowSpec::class, 'showspec_id');
    }
}