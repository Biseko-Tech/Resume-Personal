<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ExperienceController extends Controller
{
    public function Index()
    {
        $experiences = Experience::latest()->paginate(5);
        return view('experience.index', compact('experiences'));
    }

    public function Create()
    {
        return view('experience.create');
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'start' => 'required|date',
            'end' => 'required|date',
            'company' => 'required',
            'address' => 'required',
            'title' => 'required',
            'description' => 'required',
        ], [
            'start.required' => 'The start date field is required.',
            'end.required' => 'The end date field is required.',
            'company.required' => 'The company name field is required.',
            'address.required' => 'The company address field is required.',
            'title.required' => 'The position title field is required.',
        ]);

        Experience::insert([
            'start' => $request->start,
            'end' => $request->end,
            'company' => $request->company,
            'address' => $request->address,
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('experience.index')->with('success', 'The education details were inserted successfully');
    }

    public function Edit($id)
    {
        $experience = Experience::findOrFail($id);
        return view('experience.edit', compact('experience'));
    }

    public function Update(Request $request, $id)
    {
        $validateData = $request->validate([
            'start' => 'required|date',
            'end' => 'required|date',
            'company' => 'required',
            'address' => 'required',
            'title' => 'required',
            'description' => 'required',
        ], [
            'start.required' => 'The start date field is required.',
            'end.required' => 'The end date field is required.',
            'company.required' => 'The company name field is required.',
            'address.required' => 'The company address field is required.',
            'title.required' => 'The position title field is required.',
        ]);

        Experience::findOrFail($id)->update([
            'start' => $request->start,
            'end' => $request->end,
            'company' => $request->company,
            'address' => $request->address,
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('experience.index')->with('success', 'The education details were updated successfully');
    }

    public function Delete($id)
    {
        Experience::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'The education details were deleted successfully');
    }
}
