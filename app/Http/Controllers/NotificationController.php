<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;// Assuming your User model is in the App\Models namespace

class NotificationController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return
            [
                new Middleware('permission:view notification', only: ['show'])  // Granting permission to view notifications
            ];
    }
    public function show($id)
    {
        $notification = User::find(auth()->id())->notifications()->findOrFail($id);
        $notification->markAsRead();

        return redirect($notification->data['job_id']);
    }
}
