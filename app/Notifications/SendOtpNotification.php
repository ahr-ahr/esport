<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * @method array toFcm(object $notifiable)
 */
class SendOtpNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected string $otpCode;

    public function __construct(string $otpCode)
    {
        $this->otpCode = $otpCode;
    }

    /**
     * Tentukan channel notifikasi.
     */
    public function via(object $notifiable): array
    {
        $channels = ['mail'];

        // Tambahkan FCM jika user punya token
        if (!empty($notifiable->fcm_token)) {
            $channels[] = 'fcm';
        }

        return $channels;
    }

    /**
     * Notifikasi email.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Kode OTP Anda')
            ->greeting('Halo!')
            ->line('Berikut adalah kode OTP untuk verifikasi akun Anda:')
            ->line('Kode OTP Anda: ' . $this->otpCode)
            ->line('Kode ini hanya berlaku selama 10 menit.')
            ->line('Jangan berikan kode ini kepada siapa pun.')
            ->salutation('Terima kasih.');
    }

    /**
     * Notifikasi ke Firebase Cloud Messaging (FCM).
     */
    public function toFcm(object $notifiable): array
    {
        return [
            'data' => [
                'title' => 'Kode OTP Anda',
                'body' => 'Kode OTP Anda: ' . $this->otpCode,
                'otp_code' => $this->otpCode,
                'type' => 'otp_verification',
            ],
        ];
    }


    /**
     * Untuk database log (opsional).
     */
    public function toArray(object $notifiable): array
    {
        return [
            'otp_code' => $this->otpCode,
        ];
    }
}
