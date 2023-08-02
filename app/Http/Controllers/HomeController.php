<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aranyasen\HL7; // HL7 factory class
use Aranyasen\HL7\Message; // If Message is used
use Aranyasen\HL7\Segment; // If Segment is used
use Aranyasen\HL7\Segments\MSH; // If MSH is used

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Create a Message object from a HL7 string
        $message = HL7::from("MSH|^~\\&|1|")->createMessage(); // Returns Message object
       
        // Or, using Message class...
        $message = new Message("MSH|^~\\&|1|\rPID|||abcd|\r"); // Either \n or \r can be used as segment endings
        // dd($message);
        // Get string form of the message
        // echo $message->toString(true);die;

        // Extracting segments and fields from a Message object...
        $message->getSegmentByIndex(1); // Get the first segment
        $message->getSegmentsByName('ABC'); // Get an array of all 'ABC' segments
        $message->getFirstSegmentInstance('ABC'); // Returns the first ABC segment. Same as $message->getSegmentsByName('ABC')[0];

        // Check if a segment is present in the message object
        $message->hasSegment('ABC'); // return true or false based on whether PID is present in the $message object

        // Check if a message is empty
        // $message = new Message();
        // $message->isempty(); // Returns true
    // $response = response()->json($message,200);
    // dd($response->original);
        return view('home',[
            'message'=>$message,
        ]);
    }
}
