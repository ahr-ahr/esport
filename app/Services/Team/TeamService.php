<?php

namespace App\Services\Team;

use App\Models\Team\Team;
use App\Models\Team\TeamInvite;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Team\TeamJoinRequest;

class TeamService
{

    public function getAllTeams()
    {
        return Team::with('captain')->get();
    }

    public function createTeam(array $data): Team
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->team_id) {
            throw new \Exception("Kamu sudah bergabung ke tim lain.");
        }

        $team = Team::create([
            'name' => $data['name'],
            'captain_id' => $user->id,
        ]);

        $user->update([
            'team_id' => $team->id,
            'role' => 'captain',
        ]);

        return $team;
    }

    public function invitePlayer($teamId, $userId)
    {
        $team = Team::findOrFail($teamId);
        $auth = Auth::user();

        if ($auth->id !== $team->captain_id) {
            throw new \Exception("Hanya kapten yang bisa mengundang");
        }

        return $team->invites()->create([
            'user_id' => $userId,
            'status' => 'pending',
        ]);
    }

    public function getUserPendingInvites(User $user)
    {
        return $user->teamInvites()->where('status', 'pending')->get();
    }

    public function respondToInvite(int $inviteId, string $status, User $user): void
    {
        $invite = TeamInvite::findOrFail($inviteId);

        if ($invite->user_id !== $user->id) {
            throw new \Exception('Unauthorized');
        }

        if ($status === 'accepted') {
            $user->update([
                'team_id' => $invite->team_id,
                'role' => 'player',
            ]);
        }

        $invite->update(['status' => $status]);
    }

    public function requestJoinTeam(int $teamId, User $user): TeamJoinRequest
    {
        if ($user->team_id) {
            throw new \Exception('Kamu sudah bergabung dengan tim lain.');
        }

        // Cek apakah sudah pernah mengirim request
        $existing = TeamJoinRequest::where('user_id', $user->id)
            ->where('team_id', $teamId)
            ->where('status', 'pending')
            ->first();

        if ($existing) {
            throw new \Exception('Kamu sudah mengirim permintaan ke tim ini.');
        }

        return TeamJoinRequest::create([
            'user_id' => $user->id,
            'team_id' => $teamId,
            'status' => 'pending',
        ]);
    }

}


?>
