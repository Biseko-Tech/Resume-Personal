<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class ReviewController extends Controller
{
    public function Index()
    {
        $reviews = Review::latest()->paginate(5);
        return view('review.index', compact('reviews'));
    }

    public function Create()
    {
        return view('review.create');
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'client_name' => 'required',
            'client_title' => 'required',
            'client_description' => 'required',
            'client_photo' => 'required|mimes:jpg,jpeg,png',
        ]);

        $client_photo = $request->file('client_photo');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($client_photo->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $img_location = 'images/review/';
        $last_name = $img_location . $img_name;
        Image::make($client_photo)->resize(100, 100)->save($img_location . $img_name);

        Review::insert([
            'client_name' => $request->client_name,
            'client_title' => $request->client_title,
            'client_description' => $request->client_description,
            'client_photo' => $last_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('review.index')->with('success', 'The review details were inserted successfully');
    }

    public function Edit($id)
    {
        $review = Review::findOrFail($id);
        return view('review.edit', compact('review'));
    }

    public function Update(Request $request, $id)
    {
        $validateData = $request->validate([
            'client_name' => 'required',
            'client_title' => 'required',
            'client_description' => 'required',
            'client_photo' => 'sometimes|mimes:jpg,jpeg,png',
        ]);

        $client_photo = $request->file('client_photo');
        $old_photo = $request->old_photo;

        if ($client_photo) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($client_photo->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $img_location = 'images/review/';
            $last_name = $img_location . $img_name;
            Image::make($client_photo)->resize(100, 100)->save($img_location . $img_name);

            unlink($old_photo);
            Review::findOrFail($id)->update([
                'client_name' => $request->client_name,
                'client_title' => $request->client_title,
                'client_description' => $request->client_description,
                'client_photo' => $last_name,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            Review::findOrFail($id)->update([
                'client_name' => $request->client_name,
                'client_title' => $request->client_title,
                'client_description' => $request->client_description,
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('review.index')->with('success', 'The review details has been updated successfully');
    }

    public function Delete($id)
    {
        $data = Review::findOrFail($id);
        $old_photo = $data->client_photo;
        unlink($old_photo);
        $data->delete();

        return redirect()->back()->with('success', 'The review details has been deleted successfully');
    }
}
