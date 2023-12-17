<?php

namespace App\Models;

use App\Interfaces\NotificationServiceInterface;
use App\Services\Notification\SmsNotificationService;
use App\Services\Notification\TelegramNotificationService;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notification';

    const TYPE_SMS      = 'sms';
    const TYPE_TELEGRAM = 'telegram';

    const STATUS_WAITING = 'waiting';
    const STATUS_SENT    = 'sent';
    const STATUS_ERROR   = 'error';

    public $typeLabel = [
        self::TYPE_SMS      => 'SMS',
        self::TYPE_TELEGRAM => 'Telegram'
    ];

    public $statusLabel = [
        self::STATUS_WAITING => 'Waiting',
        self::STATUS_SENT    => 'Sent',
        self::STATUS_ERROR   => 'Error'
    ];

    protected $fillable = [
        'to',
        'body',
        'type'
    ];

    /**
     * @return NotificationServiceInterface
     * @throws Exception
     */
    public function getNotificationService(): NotificationServiceInterface
    {
        switch ($this->type)
        {
            case self::TYPE_SMS:
                return new SmsNotificationService($this);

            case self::TYPE_TELEGRAM:
                return new TelegramNotificationService($this);
        }

        throw new Exception('The service has not been initialized');
    }
}
