<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
  public function purchased()
{
    $user = Auth::user();
$plans = collect([
    (object) ['name' => 'Starter Plan', 'price' => 10],
    (object) ['name' => 'Pro Plan', 'price' => 25],
]);

    // This assumes you have a `plans()` relationship set up in User model


    // Make sure the user has a "plans" relationship defined
    $plans = $user->plans ?? collect(); // fallback to empty collection


    return view('ClientView.profile.purchased', compact('plans'));
}
}
