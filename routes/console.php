<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Notification;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

//Artisan::command('inspire', function () {
//    $this->comment(Inspiring::quote());
//})->purpose('Display an inspiring quote');

Artisan::command('notification:send {id}', function (int $id)
{
    if ($this->confirm('Do you really want to send a notification?', true))
        try
        {
            $notification = Notification::query()->whereNull('deleted_at')->findOrFail($id);

            if ($notification->send())
                $this->info('Notification sent');
            else
                $this->error('Notification not sent');
        }
        catch (Exception $e)
        {
            $this->error('Notification not sent: ' . $e->getMessage());
        }
})->purpose('Command to send notification');
