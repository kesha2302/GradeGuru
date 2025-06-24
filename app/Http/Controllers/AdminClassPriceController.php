<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use App\Models\ClassPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminClassPriceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $query = ClassPrice::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%");
                $q->orWhereHas('classNames', function ($subQuery) use ($search) {
                    $subQuery->where('standard', 'LIKE', "%{$search}%");
                });
            });
        }

        $class_price = $query->paginate(5)->appends(['search' => $search]);

        return view('AdminPanel.classprice', compact('class_price', 'search'));
    }

    public function classpriceform()
    {
        $class_price = new ClassPrice();
        $class_names = ClassName::all();
        $url = url('/Admin/Classpriceform2');
        $title = "ClassPrice Detail Form";
        $data = compact('url', 'title', 'class_price','class_names');

        return view('AdminPanel.classpriceform')->with($data);
    }

    public function classpriceform2(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'class_names' => 'required|exists:class_names,class_id',
            'title' => 'required|string',
            'feature' => 'required|string|max:1500',
            'que_type' => 'required|string',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $class_price = new ClassPrice();
        $class_price->class_id = $request->input('class_names');
        $class_price->title = $request->input('title');
        $class_price->feature = $request->input('feature');
        $class_price->que_type = $request->input('que_type');
        $class_price->price = $request->input('price');
        $class_price->save();

        return redirect('/Admin/ClassPrice');
    }

    public function classpricetrash()
    {
        $class_price = ClassPrice::onlyTrashed()->paginate(5);
        $data = compact('class_price');

        return view("AdminPanel.classpricetrash")->with($data);
    }

    public function classpriceedit($id)
    {
        $class_price = ClassPrice::find($id);
        if (is_null($class_price)) {
            return redirect('/Admin/ClassPrice');
        } else {
            $url = url('/Admin/Classprice/update') . "/" . $id;
            $title = "Update ClassPrice Details";
            $data = compact('class_price', 'url', 'title');
            return view('AdminPanel.classpriceform')->with($data);
        }
    }

    public function classpriceupdate($id, Request $request)
    {
        $class_price = ClassPrice::find($id);
        $class_price->title = $request->input('title');
        $class_price->feature = $request->input('feature');
        $class_price->que_type = $request->input('que_type');
        $class_price->price = $request->input('price');
        $class_price->save();


        return redirect('/Admin/ClassPrice');
    }

    public function classpricedelete($id)
    {
        $class_price = ClassPrice::find($id);
        if (!is_null($class_price)) {
            $class_price->delete();
        }
        return redirect('/Admin/ClassPrice');
    }

    public function classpricerestore($id)
    {
        $class_price = ClassPrice::withTrashed()->find($id);
        if (!is_null($class_price)) {
            $class_price->restore();
        }
        return redirect('/Admin/ClassPrice');
    }

    public function classpriceforcedelete($id)
    {
        $class_price = ClassPrice::withTrashed()->find($id);
        if (!is_null($class_price)) {
            $class_price->forceDelete();
        }
        return redirect()->back();
    }
}
