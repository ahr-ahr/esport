<?php

namespace App\Http\Resources\Team;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamJoinRequestResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'team_id' => $this->team_id,
            'team_name' => $this->team->name ?? null,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}

?>
