<?php

namespace App\Channels;

use App\Services\Firebase\FcmV1Service;
use Illuminate\Notifications\Notification;

class FcmChannel
{
    protected FcmV1Service $fcm;

    public function __construct(FcmV1Service $fcm)
    {
        $this->fcm = $fcm;
    }

    public function send($notifiable, Notification $notification)
    {

        /**
         * @var \Illuminate\Notifications\Notification|object{toFcm: callable} $notification
         */

        if (!method_exists($notification, 'toFcm')) {
            return;
        }

        $message = $notification->toFcm($notifiable);

        if (!empty($notifiable->fcm_token)) {
            $this->fcm->sendToToken(
                $notifiable->fcm_token,
                $message['data']['title'],
                $message['data']['body'],
                $message['data']
            );
        }
    }
}
