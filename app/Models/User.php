<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * User model
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int $age
 * @property string $gender
 * @property string $api_token
 * @property-read int $beer_limit
 * @property-read int $new_beer_limit
 * @property-read Carbon $new_beer_limit_activate
 * @property-read string $last_beer_tap
 * @property-read Carbon $last_beer_tap_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'age',
        'gender',
        'api_token',
        'last_beer_tap',
        'last_beer_tap_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'api_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'last_beer_tap_at' => 'datetime',
    ];

    public function setNewBeerLimit(int $limit, int $minutes = 60 * 24): void
    {
        if($this->beer_limit === $limit) return;

        $this->new_beer_limit = $limit;
        $this->new_beer_limit_activate = now()->addMinutes($minutes);
        $this->save();
    }

    public function activateNewBeerLimit(): void
    {
        $this->beer_limit = $this->new_beer_limit;
        $this->new_beer_limit = null;
        $this->new_beer_limit_activate = null;
        $this->save();
    }

    public function setLastBeerTap(string $tap): void
    {
        $this->last_beer_tap = $tap;
        $this->last_beer_tap_at = now();
        $this->save();
    }

    public function beerConsumptions(): HasMany
    {
        return $this->hasMany(UserBeerConsumption::class);
    }

}
