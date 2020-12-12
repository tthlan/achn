<?php

namespace App\Http\Controllers;

use App\Models\webhook_store_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatbotController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            //
        }
        else if ($request->isMethod('get')) {
            return view('chatbot', array('clientIP' => 'Taylor'));
        }
    }
}
