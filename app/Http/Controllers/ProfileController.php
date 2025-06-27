<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // ✅ Correct

use Illuminate\Http\Request;

class ProfileController extends Controller
{
     public function edit()
{
    $user = Auth::user();
   return view('ClientView.profile.edit', compact('user'));
}


    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'contact' => 'nullable|string|max:15', // optional but good
    ]);

    $user = Auth::user();
    $user->update($request->only('name', 'email', 'contact'));

    return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
}

}
