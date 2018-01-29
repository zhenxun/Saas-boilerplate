<?php

namespace App\Http\Controllers\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;

class SubscriptionController extends Controller
{
    public function index(){

        $plans = Plan::active()->get();
        return view('subscription.index', compact('plans'));
    }

    public function store(){

    }
}
