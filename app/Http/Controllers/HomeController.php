<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function Index()
    {
        $details = Home::latest()->paginate(5);
        return view('home.index', compact('details'));
    }

    public function Create()
    {
        return view('home.create');
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'person_name' => 'required',
            'person_photo' => 'required|mimes:jpg,jpeg,png',
            'person_file' => 'required|mimes:pdf',
        ], [
            'person_name.required' => 'The person name field is required',
            'person_photo.mimes' => 'The required file formats are jpg, jpeg and png',
            'person_file.required' => 'The person file field is required',
            'person_file.mimes' => 'The required file format is pdf',
        ]);

        $person_photo = $request->file('person_photo');
        $person_file = $request->file('person_file');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($person_photo->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $img_location = 'images/home/';
        $last_name = $img_location . $img_name;
        // $person_photo->move($img_location, $img_name);
        Image::make($person_photo)->resize(400, 300)->save($img_location . $img_name);

        $file_ext = strtolower($person_file->getClientOriginalExtension());
        $file_name = $name_gen . '.' . $file_ext;
        $file_location = 'documents/home/';
        $person_file->move($file_location, $file_name);

        Home::insert([
            'person_name' => $request->person_name,
            'person_photo' => $last_name,
            'person_file' => $file_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'The details were inserted successfully');
    }

    public function Edit($id)
    {
        $detail = Home::findOrFail($id);
        return view('home.edit', compact('detail'));
    }

    public function Update(Request $request, $id)
    {
        $validateData = $request->validate([
            'person_name' => 'sometimes|nullable',
            'person_photo' => 'sometimes|mimes:jpg,jpeg,png',
            'person_file' => 'sometimes|mimes:pdf',
        ], [
            'person_photo.mimes' => 'The required file formats are jpg, jpeg and png',
            'person_file.mimes' => 'The required file format is pdf',
        ]);

        $old_photo = $request->old_photo;
        $old_file = $request->old_file;

        $person_photo = $request->file('person_photo');
        $person_file = $request->file('person_file');

        if ($person_photo) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($person_photo->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $img_location = 'images/home/';
            $last_name = $img_location . $img_name;
            // $person_photo->move($img_location, $img_name);
            Image::make($person_photo)->resize(400, 300)->save($img_location . $img_name);

            unlink($old_photo);
            Home::findOrFail($id)->update([
                'person_name' => $request->person_name,
                'person_photo' => $last_name,
                'updated_at' => Carbon::now(),
            ]);
        } elseif ($person_file) {
            $name_gen = hexdec(uniqid());
            $file_ext = strtolower($person_file->getClientOriginalExtension());
            $file_name = $name_gen . '.' . $file_ext;
            $file_location = 'documents/home/';
            $person_file->move($file_location, $file_name);

            unlink($file_location . $old_file);
            Home::findOrFail($id)->update([
                'person_name' => $request->person_name,
                'person_file' => $file_name,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            Home::findOrFail($id)->update([
                'person_name' => $request->person_name,
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->back()->with('success', 'The details were updated successfully');
    }

    public function Delete($id)
    {
        $detail = Home::findOrFail($id);

        $old_photo = $detail->person_photo;
        $file_location = 'documents/home/';
        $old_file = $file_location . $detail->person_file;

        unlink($old_photo);
        unlink($old_file);

        $detail->delete();

        return redirect()->back()->with('success', 'The home detail was deleted successfully');
    }

    public function Pdf($id)
    {
        $pdf = Home::findOrFail($id);
        return view('home.pdf', compact('pdf'));
    }
}
