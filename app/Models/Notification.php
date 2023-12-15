<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notification';

    public $typeLabel = [
        'sms'      => 'SMS',
        'telegram' => 'Telegram'
    ];

    public $statusLabel = [
        'waiting' => 'Waiting',
        'sent'    => 'Sent',
        'error'   => 'Error'
    ];

    protected $fillable = [
        'to',
        'body',
        'type'
    ];
    public function send()
    {
        return true;
    }
}
