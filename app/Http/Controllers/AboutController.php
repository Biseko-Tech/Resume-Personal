<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function Index()
    {
        $abouts = About::latest()->paginate(5);
        return view('about.index', compact('abouts'));
    }

    public function Create()
    {
        return view('about.create');
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'photo' => 'required|mimes:jpg,jpeg,png',
            'description' => 'required',
        ], [
            'photo.required' => 'The about photo field is required.',
            'photo.mimes' => 'The file format required are jpeg, jpg and png.'
        ]);

        $photo = $request->file('photo');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($photo->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $img_location = 'images/about/';
        $last_name = $img_location . $img_name;
        Image::make($photo)->resize(400, 400)->save($img_location . $img_name);

        About::insert([
            'photo' => $last_name,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('about.index')->with('success', 'The about details were inserted successfully');
    }

    public function Edit($id)
    {
        $about = About::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    public function Update(Request $request, $id)
    {
        $validateData = $request->validate([
            'photo' => 'sometimes|mimes:jpg,jpeg,png',
            'description' => 'sometimes',
        ], [
            'photo.sometimes' => 'The about photo field is required.',
            'photo.mimes' => 'The file format required are jpeg, jpg and png.'
        ]);

        $old_photo = $request->old_photo;
        $photo = $request->file('photo');

        if ($photo) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($photo->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $img_location = 'images/about/';
            $last_name = $img_location . $img_name;
            Image::make($photo)->resize(400, 400)->save($img_location . $img_name);

            unlink($old_photo);
            About::findOrFail($id)->update([
                'photo' => $last_name,
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            About::findOrFail($id)->update([
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]);
        }
        return redirect()->route('about.index')->with('success', 'The about details were updated successfully');
    }

    public function Delete($id)
    {
        $data = About::findOrFail($id);

        $old_photo = $data->photo;
        unlink($old_photo);
        $data->delete();

        return redirect()->route('about.index')->with('success', 'The about detail was deleted successfully');
    }
}
