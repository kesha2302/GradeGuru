<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class AdminBannerController extends Controller
{
public function banner(Request $request)
{
   $search = $request->input('search');

    $bannerdetail = Banner::when($search, function ($query, $search) {
        return $query->where('title', 'like', "%{$search}%")
                     ->orWhere('description', 'like', "%{$search}%");
    })->get();

    return view('AdminPanel.banner', compact('bannerdetail', 'search'));
}


public function addBannerForm()
{
    $bannerdetail = new \stdClass();
    $bannerdetail->title = '';
    $bannerdetail->description = '';
    $bannerdetail->image = '';
    $title = 'Add Banner';
    $url = url('/Admin/banner/store');

    return view('AdminPanel.addbanner', compact('bannerdetail', 'title','url'));
}


public function storeBanner(Request $request)
{
    $request->validate([
        'title' => 'nullable|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);


    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('BannerImage'), $imageName);


    Banner::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    return redirect()->route('admin.banner')->with('success', 'Banner added successfully.');
}

public function index()
{
    $bannerdetail = Banner::all();
    return view('AdminPanel.banner', compact('bannerdetail'));
}



    public function trash()
    {
        $bannerdetail = Banner::onlyTrashed()->get();
        return view('AdminPanel.bannerTrash', compact('bannerdetail'));
    }

    public function trashSoft($id)
{
    $banner = Banner::findOrFail($id);
    $banner->delete();
    return redirect()->back()->with('success', 'Banner moved to trash.');
}


    public function restore($id)
    {
        $banner = Banner::withTrashed()->findOrFail($id);
        $banner->restore();
        return redirect()->back()->with('success', 'Banner restored successfully.');
    }


    public function delete($id)
    {
        $banner = Banner::withTrashed()->findOrFail($id);


        $imagePath = public_path('BannerImage/' . $banner->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $banner->forceDelete();
        return redirect()->back()->with('success', 'Banner permanently deleted.');
    }


    public function edit($id)
    {
        $bannerdetail = Banner::findOrFail($id);
        $title = "Update Banner";
        $url = url('/admin/banner/update') . "/". $id;
        return view('AdminPanel.addBanner', compact('bannerdetail', 'title','url'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('BannerImage'), $imageName);

            $oldPath = public_path('BannerImage/' . $banner->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $banner->image = $imageName;
        }

        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->save();

        return redirect()->route('admin.banner')->with('success', 'Banner updated successfully.');
    }


}
