<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit(): \Illuminate\View\View
    {
        $user = Auth::user();
        return view('ClientView.profile.edit', compact('user'));
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'nullable|string|max:15',
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email', 'contact'));

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
