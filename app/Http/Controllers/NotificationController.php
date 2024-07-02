<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assuming your User model is in the App\Models namespace

class NotificationController extends Controller
{
    public function show($id)
    {
        $notification = User::find(auth()->id())->notifications()->findOrFail($id);
        $notification->markAsRead();

        return redirect($notification->data['job_id']);
    }
}
