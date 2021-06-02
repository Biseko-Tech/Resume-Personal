<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MassageController extends Controller
{
    public function Index()
    {
        $messages = Message::latest()->paginate();
        return view('message.index', compact('messages'));
    }

    public function Show($id)
    {
        $message = Message::findOrFail($id);
        return view('message.show', compact('message'));
    }

    public function Delete($id)
    {
        Message::findOrFail($id)->delete();
        return redirect()->route('message.index')->with('success', 'The message has been deleted successfully.');
    }
}
