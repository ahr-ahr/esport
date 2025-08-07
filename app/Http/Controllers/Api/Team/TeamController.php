<?php

namespace App\Http\Controllers\Api\Team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Team\TeamService;
use App\Http\Resources\Team\TeamResource;
use App\Http\Resources\Team\TeamInviteResource;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    protected TeamService $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    public function index()
    {
        $teams = $this->teamService->getAllTeams();
        return TeamResource::collection($teams);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:teams,name',
        ]);

        try {
            $team = $this->teamService->createTeam($request->all());

            return response()->json([
                'message' => 'Tim berhasil dibuat!',
                'team' => new TeamResource($team),
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 403);
        }
    }

    public function invitePlayers($id, Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        try {
            $invite = $this->teamService->invitePlayer($id, $request->user_id);

            return response()->json([
                'message' => 'Undangan berhasil dikirim',
                'invite' => new TeamInviteResource($invite),
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 403);
        }
    }

    public function getInvite()
    {
        $invites = $this->teamService->getUserPendingInvites(Auth::user());
        return TeamInviteResource::collection($invites);
    }

    public function respondinvite($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        try {
            $this->teamService->respondToInvite($id, $request->status, Auth::user());
            return response()->json(['message' => 'Respon berhasil']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 403);
        }
    }

}
