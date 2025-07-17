<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('ClientView.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'nullable|string|max:15',
        ]);

    $user = Auth::user();

      if ($user instanceof User) {

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->contact = $request->input('contact');

            $user->save();

            return redirect()->back();
        } else {

            return redirect()->route('profile.edit')->with('error', 'Failed to update profile. User not found or invalid.');
        }
    }

    public function progress()
    {
         $user = Auth::user();

         $results = Result::with('test')
        ->where('user_id', $user->id)
        ->where('created_at', '>=', Carbon::now()->subDays(30))
        ->orderBy('created_at', 'desc')
        ->get();

    $totalTests = $results->count();
    $totalPassed = $results->where('result', 'Pass')->count();
    $totalFailed = $results->where('result', 'Fail')->count();

    return view('ClientView.progressreport', compact('results', 'totalTests', 'totalPassed', 'totalFailed'));
    }
}
