<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller{
    public function index()
    {
        $sections = Section::query()->latest()->paginate(15);
        return view('admin.sections.index',compact('sections'));
    }

    public function edit(Section $section)
    {
        $categories = Category::query()->latest()->get(['name','id']);
        return view('admin.sections.edit',compact('section','categories'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'category_id' => 'required'
        ]);

        $data = $request->only([
            'category_id'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $request->image->move(public_path('banners-images/'), $imageName);
            $data['banner'] = $imageName;
        }
        $section = $section->update($data);
        if ($section){
            return redirect()->route('sections.index')->with('section-updated','');
        }else{
            return redirect()->back();
        }
    }
}
