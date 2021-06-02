<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\About;
use App\Models\Title;
use App\Models\Review;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Education;
use App\Models\Portfolio;
use App\Models\Experience;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FrontendController extends Controller
{
    public function Home()
    {
        $home = Home::first();
        $title = Title::first();
        $about = About::first();
        $educations = Education::latest()->get();
        $experiences = Experience::latest()->get();
        $services = Service::latest()->get();
        $portfolios = Portfolio::latest()->get();
        $reviews = Review::latest()->get();
        $contact = Contact::first();
        return view('welcome', compact('home', 'title', 'about', 'educations', 'experiences', 'services', 'portfolios', 'reviews', 'contact'));
    }

    public function Download($pdf)
    {
        return response()->download(public_path('documents/home/' . $pdf));
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'client_name' => 'required|regex:/^[a-zA-Z]/|max:255',
            'client_email' => 'required|email',
            'client_subject' => 'required|regex:/^[a-zA-Z]/|max:255',
            'phone' => 'required|regex:/(0)[0-9]{9}/',
            'client_message' => 'required',
        ], [
            'client_name.required' => 'The field is required',
            'client_name.regex' => 'Only letters are required',
            'client_name.max' => 'Only 255 maximum character',
            'client_email.required' => 'The field is required',
            'client_email.email' => 'Enter correct email',
            'client_subject.required' => 'The field is required',
            'client_subject.regex' => 'Only letters are required',
            'phone.required' => 'The field is required',
            'phone.regex' => 'Enter the correct number',
            'client_message.required' => 'The field is required',
        ]);

        Message::insert([
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_subject' => $request->client_subject,
            'client_mobile' => $request->phone,
            'client_message' => $request->client_message,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Thanks, message sent.');
    }
}
