<?php

namespace App\Services\Firebase;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FcmV1Service
{
    protected $messaging;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount(base_path(config('services.firebase.credentials')));
        $this->messaging = $factory->createMessaging();
    }

    public function sendToToken(string $token, string $title, string $body, array $data = []): void
    {
        $data = array_merge([
            'title' => $title,
            'body' => $body,
        ], $data);

        $message = CloudMessage::withTarget('token', $token)
            ->withData($data); // hanya data, tanpa .withNotification()

        $this->messaging->send($message);
    }
}

?>