<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'poster',
        'eventtype_id',
        'trailer',
        'year',
        'visible_from',
        'visible_until',
        'duration',
    ];

    protected $casts = [
        'visible_from' => 'date',
        'visible_until' => 'date',
        'duration' => 'integer',
    ];

    /**
     * Il Film appartiene a un EventType.
     */
    public function eventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class, 'eventtype_id');
    }

    /**
     * Un Film ha molte Proiezioni (Shows).
     */
    public function shows(): HasMany
    {
        return $this->hasMany(Show::class);
    }
}