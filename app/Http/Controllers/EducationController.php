<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EducationController extends Controller
{
    public function Index()
    {
        $educations = Education::latest()->paginate(5);
        return view('Education.index', compact('educations'));
    }

    public function Create()
    {
        return view('education.create');
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'start' => 'required|date',
            'end' => 'required|date',
            'level' => 'required',
            'description' => 'required',
        ], [
            'start.required' => 'The start date field is required.',
            'end.required' => 'The end date field is required.',
            'level.required' => 'The education level field is required.'
        ]);

        Education::insert([
            'start' => $request->start,
            'end' => $request->end,
            'level' => $request->level,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('education.index')->with('success', 'The education details were inserted successfully');
    }

    public function Edit($id)
    {
        $education = Education::findOrFail($id);
        return view('education.edit', compact('education'));
    }

    public function Update(Request $request, $id)
    {
        $validateData = $request->validate([
            'start' => 'required|date',
            'end' => 'required|date',
            'level' => 'required',
            'description' => 'required',
        ], [
            'start.required' => 'The start date field is required.',
            'end.required' => 'The end date field is required.',
            'level.required' => 'The education level field is required.'
        ]);

        Education::findOrFail($id)->update([
            'start' => $request->start,
            'end' => $request->end,
            'level' => $request->level,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('education.index')->with('success', 'The education detail has been updated successfully');
    }

    public function Delete($id)
    {
        Education::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'The education detail has been deleted successfully');
    }
}
