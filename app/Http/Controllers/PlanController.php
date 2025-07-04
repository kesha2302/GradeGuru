<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\ClassPrice;
use App\Models\Test;
use App\Models\ClassName;

class PlanController extends Controller
{

public function purchased()
{
 $userId = Auth::id();


    $bookings = Booking::where('user_id', $userId)->get();

    $classPrices = collect();

    foreach ($bookings as $booking) {

        $cpIds = array_filter(explode(',', $booking->cp_id));


        $prices = ClassPrice::whereIn('cp_id', $cpIds)
         ->with('classNames')
         ->get();


        $booking->class_prices = $prices;
    }

    return view('ClientView.profile.purchased', compact('plans'));
}
}
