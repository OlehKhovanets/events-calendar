<?php

namespace App\Http\Controllers;

use App\Models\Fcm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function saveFcmToken(Request $request)
    {
        Fcm::query()->firstOrCreate([
            'user_id' => Auth::user()->id,
            'fcm' => $request['token']
        ]);
    }
}