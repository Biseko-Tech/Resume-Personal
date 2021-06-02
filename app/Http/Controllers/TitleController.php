<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TitleController extends Controller
{
    public function Index()
    {
        $titles = Title::latest()->paginate(5);
        return view('title.index', compact('titles'));
    }

    public function Create()
    {
        return view('title.create');
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate(
            [
                'title' => 'required',
            ],
            [
                'title.required' => 'The title field is required',
            ]
        );

        Title::insert([
            'title' => $request->title,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('title.index')->with('success', 'The title detail was inserted successfully');
    }

    public function Edit($id)
    {
        $title = Title::findOrFail($id);
        return view('title.edit', compact('title'));
    }

    public function Update(Request $request, $id)
    {
        $validateData = $request->validate([
            'title' => 'required',
        ]);

        Title::findOrFail($id)->update([
            'title' => $request->title,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('title.index')->with('success', 'The title detail was updated successfully');
    }

    public function Delete($id)
    {
        Title::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'The title detail was deleted successfully');
    }
}
