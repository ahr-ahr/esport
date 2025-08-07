<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Auth\User;
use App\Models\Team\TeamInvite;

class Team extends Model
{
    protected $fillable = [
        'name',
        'captain_id',
    ];

    public function captain(): BelongsTo
    {
        return $this->belongsTo(User::class, 'captain_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function invites(): HasMany
    {
        return $this->hasMany(TeamInvite::class);
    }
}
