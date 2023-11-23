<?php

namespace App\Models;

use App\enums\Beer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * UserBeerConsumption model
 *
 * @property int $id
 * @property int $user_id
 * @property Beer $type
 * @property string $location
 */
class UserBeerConsumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'location',
    ];

    protected $casts = [
        'type' => Beer::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
