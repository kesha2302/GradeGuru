<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminClassNameController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $query = ClassName::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('standard', 'LIKE', "%$search%")
                    ->orWhere('title', 'LIKE', "%$search%");
            });
        }

        $class_names = $query->paginate(5)->appends(['search' => $search]);

        return view('AdminPanel.classname', compact('class_names', 'search'));
    }

    public function classnameform()
    {
        $class_names = new ClassName();
        $url = url('/Admin/Classnameform2');
        $title = "ClassNames Detail Form";
        $data = compact('url', 'title', 'class_names');

        return view('AdminPanel.classnameform')->with($data);
    }

    public function classnameform2(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'standard' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string|max:1500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $class_names = new ClassName();
        $class_names->standard = $request->input('standard');
        $class_names->title = $request->input('title');
        $class_names->description = $request->input('description');
        $class_names->save();

        return redirect('/Admin/ClassNameData');
    }

    public function classnametrash()
    {
        $class_names = ClassName::onlyTrashed()->paginate(5);
        $data = compact('class_names');

        return view("AdminPanel.classnametrash")->with($data);
    }

    public function classnameedit($id)
    {
        $class_names = ClassName::find($id);
        if (is_null($class_names)) {
            return redirect('/Admin/ClassNameData');
        } else {
            $url = url('/Admin/Classname/update') . "/" . $id;
            $title = "Update ClassName Details";
            $data = compact('class_names', 'url', 'title');
            return view('AdminPanel.classnameform')->with($data);
        }
    }

    public function classnameupdate($id, Request $request)
    {
        $class_names = ClassName::find($id);
        $class_names->standard = $request->input('standard');
        $class_names->title = $request->input('title');
        $class_names->description = $request->input('description');
        $class_names->save();


        return redirect('/Admin/ClassNameData');
    }

    public function classnamedelete($id)
    {
        $class_names = ClassName::find($id);
        if (!is_null($class_names)) {
            $class_names->delete();
        }
        return redirect('/Admin/ClassNameData');
    }

    public function classnamerestore($id)
    {
        $class_names = ClassName::withTrashed()->find($id);
        if (!is_null($class_names)) {
            $class_names->restore();
        }
        return redirect('/Admin/ClassNameData');
    }

    public function classnameforcedelete($id)
    {
        $class_names = ClassName::withTrashed()->find($id);
        if (!is_null($class_names)) {
            $class_names->forceDelete();
        }
        return redirect()->back();
    }
}
