<?php

namespace App\Http\Controllers\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;

class PlanTeamController extends Controller
{
    public function index(){

        $plans = Plan::active()->forTeams()->get();
        return view('subscription.teams.index', compact('plans'));
    }
}
