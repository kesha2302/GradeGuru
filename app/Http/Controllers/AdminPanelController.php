<?php

namespace App\Http\Controllers;

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


    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|max:150',
            'contact' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact = $request->input('contact');
        $user->save();

        return redirect('/Admin/Userdetail')->with('success', 'User added successfully!');
    }
}
