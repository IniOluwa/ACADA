<?php

namespace ACADA\Http\Controllers;

use ACADA\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ACADA\Video;
use ACADA\YoutubeEmbed;
use ACADA\User;
use Session;
use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{
    // Function to add video links
    public function addVideoLink(Request $request)
    {
      $newVideoLink = $request->input('newVideoLink');
      $newVideoLinkCategory = $request->input('videoCategory');
      $newVideoLinkPostedBy = $request->input('user_name');
      $newVideoLinkPostedById = $request->input('user_id');

      $video = new Video;
      $video->user_id = $newVideoLinkPostedById;
      $video->link = $newVideoLink;
      $video->category = $newVideoLinkCategory;
      $video->link_by = $newVideoLinkPostedBy;
      $video->save();

      Session::flash('video-flash', 'One New Video Link Added!');
      return back();
    }

    // Function to Embed Youtube Videos
    public function addYoutubeEmbed(Request $request)
    {
      $newYoutubeEmbed = $request->input('newYoutubeEmbed');
      $newYoutubeEmbedPostedBy = $request->input('user_name');
      $newYoutubeEmbedPostedById = $request->input('user_id');

      $newYoutubeEmbed = $newYoutubeEmbed;
      // print_r($newYoutubeEmbed);
      $newYoutubeEmbed = explode(" ", $newYoutubeEmbed);
      $newYoutubeEmbed = $newYoutubeEmbed{3};
      $newYoutubeEmbed = substr($newYoutubeEmbed, 5, strlen($newYoutubeEmbed)-6);

      // print_r($newYoutubeEmbed);

      $embed = new YoutubeEmbed;
      $embed->user_id = $newYoutubeEmbedPostedById;
      $embed->youtubeEmbedCode = $newYoutubeEmbed;
      $embed->youtubeEmbedCodeBy = $newYoutubeEmbedPostedBy;
      $embed->save();

      Session::flash('video-flash', 'One New Youtube Embed Link Added!');
      return back();
    }

    // Functions to filter categories
    public function programmingCategory()
    {
      $videos = DB::table('videos')->where('category', 'Programming')->get();
      $users = User::orderBy('id', 'desc')->with('videos')->get();
      $embeds = YoutubeEmbed::all();
      return view('home', compact('users', 'videos', 'embeds'));
    }
    public function educationCategory()
    {
      $videos = DB::table('videos')->where('category', 'Education')->get();
      $users = User::orderBy('id', 'desc')->with('videos')->get();
      $embeds = YoutubeEmbed::all();
      return view('home', compact('users', 'videos', 'embeds'));
    }

    public function socialCategory()
    {
      $videos = DB::table('videos')->where('category', 'Social')->get();
      $users = User::orderBy('id', 'desc')->with('videos')->get();
      $embeds = YoutubeEmbed::all();
      return view('home', compact('users', 'videos', 'embeds'));
    }

    public function entertainmentCategory()
    {
      $videos = DB::table('videos')->where('category', 'Entertainment')->get();
      $users = User::orderBy('id', 'desc')->with('videos')->get();
      $embeds = YoutubeEmbed::all();
      return view('home', compact('users', 'videos', 'embeds'));
    }

    public function gamingCategory()
    {
      $videos = DB::table('videos')->where('category', 'Gaming')->get();
      $users = User::orderBy('id', 'desc')->with('videos')->get();
      $embeds = YoutubeEmbed::all();
      return view('home', compact('users', 'videos', 'embeds'));
    }

    public function otherCategory()
    {
      $videos = DB::table('videos')->where('category', 'Other')->get();
      $users = User::orderBy('id', 'desc')->with('videos')->get();
      $embeds = YoutubeEmbed::all();
      return view('home', compact('users', 'videos', 'embeds'));
    }
}
