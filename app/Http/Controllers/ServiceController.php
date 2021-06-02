<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function Index()
    {
        $services = Service::latest()->paginate(5);
        return view('service.index', compact('services'));
    }

    public function Create()
    {
        return view('service.create');
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'service_icon' => 'required|mimes:png,jpg,jpeg',
            'service_title' => 'required',
            'service_body' => 'required',
        ], [
            'service_body.required' => 'The service description field is required.',
        ]);

        $service_icon = $request->file('service_icon');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($service_icon->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $img_location = 'images/service_icon/';
        $last_name = $img_location . $img_name;
        // $person_photo->move($img_location, $img_name);
        Image::make($service_icon)->resize(60, 60)->save($img_location . $img_name);

        Service::insert([
            'service_icon' => $last_name,
            'service_title' => $request->service_title,
            'service_body' => $request->service_body,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('service.index')->with('success', 'The service details were inserted successfully');
    }

    public function Edit($id)
    {
        $service = Service::findOrFail($id);
        return view('service.edit', compact('service'));
    }

    public function Update(Request $request, $id)
    {
        $validateData = $request->validate([
            'service_icon' => 'sometimes',
            'service_title' => 'required',
            'service_body' => 'required',
        ], [
            'service_body.required' => 'The service description field is required.',
        ]);

        $old_icon = $request->old_icon;
        $service_icon = $request->file('service_icon');

        if ($service_icon) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($service_icon->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $img_location = 'images/service_icon/';
            $last_name = $img_location . $img_name;
            // $person_photo->move($img_location, $img_name);
            Image::make($service_icon)->resize(60, 60)->save($img_location . $img_name);

            unlink($old_icon);
            Service::findOrFail($id)->update([
                'service_icon' => $last_name,
                'service_title' => $request->service_title,
                'service_body' => $request->service_body,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            Service::findOrFail($id)->update([
                'service_title' => $request->service_title,
                'service_body' => $request->service_body,
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('service.index')->with('success', 'The service details were updated successfully');
    }

    public function Delete($id)
    {
        $data = Service::findOrFail($id);
        $old_icon = $data->service_icon;
        unlink($old_icon);
        $data->delete();

        return redirect()->back()->with('success', 'The service details were deleted successfully');
    }
}
