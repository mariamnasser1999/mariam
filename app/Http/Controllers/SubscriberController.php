<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $Request)
    {
        $date = $Request->validate([
            'email' => 'required|email|unique:Subscribers,email'
        ]);
        Subscriber::create($date);
        return back()->with('status', 'subscribed successfuly');
    }
}
