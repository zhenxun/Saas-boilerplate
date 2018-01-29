<?php

namespace App\Http\Controllers\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Http\Requests\Subscription\SubscriptionStoreRequest;

class SubscriptionController extends Controller
{
    public function index(){

        $plans = Plan::active()->get();
        return view('subscription.index', compact('plans'));
    }

    public function store(SubscriptionStoreRequest $request){
       
        $request->user()->newSubscription('main', $request->plan)->create($request->token);

        return redirect('/')->withSuccess('Thanks for becoming a subscriber');
    }
}
