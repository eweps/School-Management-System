<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        return view('notifications.index', [
            'notifications' => auth()->user()->unreadNotifications()->orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }

    public function show(string $id)
    {
       $notification = Auth::user()->notifications()->findOrFail($id);

        if (!$notification->read()) {
            $notification->markAsRead();
        }
        return redirect()->to($notification->data['link'] ?? route('notifications'));
    }
}
