@extends('layouts.app')

@section('site-name')
  ACADA!
@stop

@section('site-name')
  ACADA! - A Video Link Sharing Platform
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Dashboard
                  <button class="btn btn-link" data-toggle="modal" data-target="#newVideoLinkModal">Post A Video Link!</button>
                  <button class="btn btn-link" data-toggle="modal" data-target="#newYoutubeVideoEmbedModal">Embed A Youtube Video!</button>
                  <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pick A Category
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li name="programming"><a href="{{ route('programmingCategory') }}">Programming</a></li>
                      <li name="education"><a href="{{ route('educationCategory') }}">Education</a></li>
                      <li name="social"><a href="{{ route('socialCategory') }}">Social</a></li>
                      <li name="entertainment"><a href="{{ route('entertainmentCategory') }}">Entertainment</a></li>
                      <li name="gaming"><a href="{{ route('gamingCategory') }}">Gaming</a></li>
                      <li name="other"><a href="{{ route('otherCategory') }}">Other</a></li>
                    </ul>
                  </div>
                  @if(Session::has('video-flash'))
                    <span> {{ Session::get('video-flash') }} </span>
                  @endif
                </div>

                <div class="panel-body">
                  <!-- Videos Modal -->
                  <div class="modal fade" id="newVideoLinkModal" role="dialog">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Post a video link!</h4>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">

                          <!-- Add New Video Link Form -->
                          <form class="form-horizontal" action="{{ route('addVideoLink') }}" method="post">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                              <fieldset>
                              <div class="form-group">
                                  <label for="Video" class="col-lg-4 control-label">New Video Link</label>
                                  <div class="col-lg-6">
                                    <input class="form-control" type="text" name="newVideoLink" value="" placeholder="Link goes here.">
                                  </div>
                              </div>

                              <div class="form-group">
                                <label for="select" class="col-lg-4 control-label">Categories</label>
                                <div class="col-lg-6">
                                  <select class="form-control" id="select" name="videoCategory">
                                    <option>Programming</option>
                                    <option>Education</option>
                                    <option>Social</option>
                                    <option>Entertainment</option>
                                    <option>Gaming</option>
                                    <option>Other</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-4">
                                      <button type="submit" class="btn btn-primary">Post Link!</button>
                                  </div>
                              </div>
                            </fieldset>
                          </form>

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                      </div>

                    </div>

                  </div>

                  <!-- Youtube Embed Modal -->
                  <div class="modal fade" id="newYoutubeVideoEmbedModal" role="dialog">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Post Youtube Embed Link!</h4>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">

                          <!-- Add New Video Link Form -->
                          <form class="form-horizontal" action="{{ route('addYoutubeEmbed') }}" method="post">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                              <fieldset>
                              <div class="form-group">
                                  <label for="Video" class="col-lg-4 control-label">New Youtube Embed Link</label>
                                  <div class="col-lg-6">
                                    <input class="form-control" type="text" name="newYoutubeEmbed" value="" placeholder="Link goes here.">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-4">
                                      <button type="submit" class="btn btn-primary">Post Youtube Embed Link!</button>
                                  </div>
                              </div>
                            </fieldset>
                          </form>

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="container-fluid">

                      <!-- Video Links -->
                      @foreach($videos as $video)
                          <video id="" width="640" height="360" src="{{$video->link}}" controls="controls"></video>
                          <blockquote>
                            <small>Video category: {{$video->category}}</small>
                            <small>Link by: {{$video->link_by}}</small>
                          </blockquote>
                      @endforeach

                      <!-- Youtube Embeds -->
                      @foreach($embeds as $embed)
                            <div class="" width="640" height="360">
                                  <?php echo "{$embed->youtubeEmbedCode}"; ?>
                                  <blockquote>
                                    <small>Video Embedding by: {{ $embed->youtubeEmbedCodeBy }}</small>
                                  </blockquote>
                            </div>
                      @endforeach

                    </div>

                  </div>

                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
