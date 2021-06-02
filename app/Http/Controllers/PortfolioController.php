<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function Index()
    {
        $portfolios = Portfolio::latest()->paginate(5);
        return view('portfolio.index', compact('portfolios'));
    }

    public function Create()
    {
        return view('portfolio.create');
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'project_name' => 'required',
            'project_type' => 'required',
            'url_address' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ], [
            'url_address.required' => 'The project address field is required.',
            'image.mimes' => 'Supported image formats are jpeg, jpg and png.',
        ]);

        $image = $request->file('image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $img_location = 'images/portfolio/';
        $last_name = $img_location . $img_name;
        Image::make($image)->resize(500, 300)->save($img_location . $img_name);

        Portfolio::insert([
            'project_name' => $request->project_name,
            'project_type' => $request->project_type,
            'url_address' => $request->url_address,
            'image' => $last_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('portfolio.index')->with('success', 'The portfolio details were inserted successfully');
    }

    public function Edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio.edit', compact('portfolio'));
    }

    public function Update(Request $request, $id)
    {
        $validateData = $request->validate([
            'project_name' => 'required',
            'project_type' => 'required',
            'url_address' => 'required',
            'image' => 'sometimes|mimes:jpg,jpeg,png',
        ], [
            'url_address.required' => 'The project address field is required.',
            'image.mimes' => 'Supported image formats are jpeg, jpg and png.',
        ]);

        $image = $request->file('image');
        $old_image = $request->old_image;

        if ($image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $img_location = 'images/portfolio/';
            $last_name = $img_location . $img_name;
            Image::make($image)->resize(500, 300)->save($img_location . $img_name);

            unlink($old_image);
            Portfolio::findOrFail($id)->update([
                'project_name' => $request->project_name,
                'project_type' => $request->project_type,
                'url_address' => $request->url_address,
                'image' => $last_name,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            Portfolio::findOrFail($id)->update([
                'project_name' => $request->project_name,
                'project_type' => $request->project_type,
                'url_address' => $request->url_address,
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('portfolio.index')->with('success', 'The portfolio details has been updated successfully');
    }

    public function Delete($id)
    {
        $data = Portfolio::findOrFail($id);
        $old_image = $data->image;
        unlink($old_image);
        $data->delete();

        return redirect()->back()->with('success', 'The portfolio details has been deleted successfully');
    }
}
