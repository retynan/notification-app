<?php

namespace App\Http\Controllers;

use App\Jobs\ProccesNotification;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::all()
            ->whereNull('deleted_at')
            ->sortByDesc('id');

        return view('notification.index', compact('notifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'to' => 'required|max:255',
            'body' => 'required',
            'type' => 'required',
        ]);

        $input = $request->only(['to', 'body', 'type']);

        $notification = Notification::query()->create([
            'to'   => $input['to'],
            'body' => $input['body'],
            'type' => $input['type']
        ]);

        $service = $notification->getNotificationService();

        ProccesNotification::dispatch($service);

        return redirect()->route('notification.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $notification = Notification::query()->findOrFail($id);
        return view('notification.show', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'to' => 'required|max:255',
            'body' => 'required',
            'type' => 'required',
        ]);

        $input = $request->only(['to', 'body', 'type']);

        $notification = Notification::query()
            ->whereNull('deleted_at')
            ->findOrFail($id);

        $notification->fill([
            'to'   => $input['to'],
            'body' => $input['body'],
            'type' => $input['type']
        ])->save();

        $service = $notification->getNotificationService();

        ProccesNotification::dispatch($service);

        return redirect()->route('notification.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $notification = Notification::query()->findOrFail($id);

        $notification->deleted_at = date('Y-m-d H:i:s');

        $notification->save();
    }

    public function create()
    {
        return view('notification.create');
    }

    public function edit($id)
    {
        $notification = Notification::query()->findOrFail($id);
        return view('notification.edit', compact('notification'));
    }
}
