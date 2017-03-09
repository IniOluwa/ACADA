<?php

namespace ACADA\Http\Controllers;

use Illuminate\Http\Request;
use ACADA\User;
use ACADA\Video;
use ACADA\YoutubeEmbed;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        $users = User::orderBy('id', 'desc')->with('videos')->get();
        $embeds = YoutubeEmbed::all();
        return view('home', compact('users', 'videos', 'embeds'));
    }
}
