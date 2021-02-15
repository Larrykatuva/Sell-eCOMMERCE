<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function getNotifications(){
        $user = auth()->user();
        $note = Notification::where('user_id',$user->id)
                    ->where('read', 'False')->get();
        return $note;
    }

    public function allNotifications(){
        $user = auth()->user();
        $notes =  Notification::where('user_id', $user->id)
                    ->orderBy('id', 'desc')
                    ->paginate(10);

        return view('note.index')->with('notes', $notes);
    }
}
