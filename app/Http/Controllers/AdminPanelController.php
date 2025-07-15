<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ClassPrice;
use App\Models\Inquiry;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AdminPanelController extends Controller
{

    public function index()
    {
        return view('AdminPanel.index');
    }


    public function userdetail(Request $request)
    {
        $search = $request->input('search');

        $userdetail = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->get();

        return view('AdminPanel.userdetail', compact('userdetail', 'search'));
    }

    public function resultdetail(Request $request)
    {
        $search = $request->input('search');

        $resultdetail = Result::with(['users', 'classPrice'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('users', function ($subQuery) use ($search) {
                    $subQuery->where('name', 'LIKE', "%{$search}%");
                });
            })
            ->get();

        return view('AdminPanel.resultdetail', compact('resultdetail', 'search'));
    }

    public function bookingdetail(Request $request)
    {
        $search = $request->input('search');

        $bookingdetail = Booking::with(['users'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('users', function ($subQuery) use ($search) {
                    $subQuery->where('name', 'LIKE', "%{$search}%");
                });
            })
            ->get();

        foreach ($bookingdetail as $booking) {
            $cpIds = explode(',', $booking->cp_id);
            $booking->class_prices = ClassPrice::whereIn('cp_id', $cpIds)->get();
        }

        return view('AdminPanel.bookingdetail', compact('bookingdetail', 'search'));
    }

    public function inquirydetail(Request $request)
    {
        $search = $request->input('search');

        $inquirydetail = Inquiry::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->get();

        return view('AdminPanel.inquirydetail', compact('inquirydetail', 'search'));
    }
}
