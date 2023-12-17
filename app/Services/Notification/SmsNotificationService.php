<?php

namespace App\Services\Notification;

use App\Interfaces\NotificationServiceInterface;
use App\Models\Notification;

class SmsNotificationService implements NotificationServiceInterface
{
    private Notification $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function send(): bool
    {
        return true;
    }
}
