<?php

namespace App\Http\Controllers\Api\Team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Team\TeamJoinRequestResource;
use App\Services\Team\TeamService;

class TeamJoinRequestController extends Controller
{
    protected TeamService $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    public function store($teamId)
    {
        try {
            $request = $this->teamService->requestJoinTeam($teamId, Auth::user());

            return response()->json([
                'message' => 'Permintaan bergabung telah dikirim.',
                'request' => new TeamJoinRequestResource($request),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 403);
        }
    }
}


?>
