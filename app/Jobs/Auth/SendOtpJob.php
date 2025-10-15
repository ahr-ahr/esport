<?php

namespace App\Jobs\Auth;

use App\Models\Auth\User;
use App\Notifications\SendOtpNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected User $user;
    protected int $otpCode;

    public function __construct(User $user, int $otpCode)
    {
        $this->user = $user;
        $this->otpCode = $otpCode;
    }

    public function handle(): void
    {
        $this->user->notify(new SendOtpNotification($this->otpCode));
    }
}
