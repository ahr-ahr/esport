<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamJoinRequest extends Model
{
    protected $fillable = ['user_id', 'team_id', 'status'];

    public function user()
    {
        return $this->belongsTo(\App\Models\Auth\User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

?>
