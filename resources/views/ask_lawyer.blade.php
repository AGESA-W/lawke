@extends('layouts.app')
@section('content')


<div class="row">
    <div class="mx-auto col-sm-8 col-sm-offset-3 col-md-8 col-lg-offset-4 text-center u-vertical-margin-1 img img-responsive">
      <h2 class="mt-2"> <strong>Free Q&A with Lawyers</strong></h2>
      <p class="lead text-secondary" style="margin-left:-20px;">Every minute someone gets free legal advice.</p>
      <div class="card accent-border-top u-vertical-margin-1"><a class="block-link block-link-proxy text-decoration-none" href="#!" data-toggle="collapse" data-target="#ask_briefing" aria-expanded="true" aria-controls="ask_briefing" data-gtm="{&quot;target_url&quot;:&quot;https://www.avvo.com/ask_question/preview_redirect#!&quot;,&quot;target_domain&quot;:&quot;www.avvo.com&quot;,&quot;target_path&quot;:&quot;/ask_question/preview_redirect&quot;,&quot;target_querystring&quot;:&quot;&quot;,&quot;link_text&quot;:&quot;How it works&quot;,&quot;link_pagesection&quot;:&quot;body&quot;,&quot;link_context&quot;:&quot;&quot;,&quot;link_subcontext&quot;:&quot;&quot;}">How it works&nbsp;<div class="pull-right"><svg aria-hidden="true" class="svg-inline--fa fa-angle-down fa-w-10 icon" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg><!-- <span aria-hidden="true" class="icon fas fa-angle-down"></span> --></div></a>
            <div id="ask_briefing" class="collapse in" aria-expanded="true" style="">
                <ul class="list-unstyled">
                    <li>Ask your question—it’s free.</li>
                    <li>Ask follow-up questions—make sure you understand your options.</li>
                </ul>
                <h6> <b>Tips for asking questions</b> </h6>
                <ul class="list-unstyled">
                    <li>Provide key details, but don’t feel like you have to tell the whole story.</li>
                    <li>Ask a concise question—be brief and to the point.</li>
                </ul>
            </div>
      </div>
        <form action="{{route('client.question')}}" method="post">
            @csrf
           <div class="form-group">
            <label for="category" style="margin-left:-650px;"><span class="asterick" >*</span> Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="">
                    ------select-------
                 </option>
                @foreach ($practiceareas as $practicearea)
                    <option value="{{$practicearea->area_practice}}" class="mb-0">
                        {{$practicearea->area_practice}}
                    </option>
                @endforeach
                <option value="other" class="mt-0">
                    other
                </option>
               
            </select>   
          </div>
          <div class="form-group">
              <label for="question" style="margin-left:-580px;"><span class="asterick" >*</span> Ask your question</label>
              <textarea class="form-control text required"  rows="2" required="required" minlength="10" maxlength="128" placeholder="Start your question with &quot;how,&quot; &quot;what,&quot; &quot;why,&quot; &quot;when,&quot; &quot;can I...&quot; &quot;do I...&quot; or &quot;will I...&quot;" name="question"></textarea>
          </div>
          <div class="form-group">
            <label for="situation" style="margin-left:-580px;"><span class="asterick" >*</span> Explain your situation</label>
            <textarea class="form-control text required" rows="8" required="required" minlength="40" maxlength="1200" aria-required="true" placeholder="Provide key details. No need to get it perfect–you can always make clarifications or ask follow-up questions later." name="situation"></textarea>
          </div>
          <div class="form-group">
            <label for="county" style="margin-left:-650px;"><span class="asterick" >*</span> County</label>
            <select name="county" id="county" class="form-control" required>
                <option value="">
                    ------select-------
                 </option>
                @foreach ($locations as $location)
                    <option value="{{$location->county}}">
                        {{$location->county}}
                    </option>
                @endforeach
               
            </select>   
          </div>
          <div class="form-group">
              <label for="anonymous" style="margin-left:-480px;"><span class="asterick" >*</span>Post your question anonymously?</label>
              <div class="d-flex form-check">
                <input class="form-check-input" type="radio"  name="anonymous" id="yes" value="yes"  required autocomplete="anonymous" >
                <label class="form-check-label" for="yes">Yes</label>

                <div class="option2 pl-5">
                    <input class="form-check-input " type="radio" name="anonymous" id="no" value="no" required autocomplete="anonymous">
                    <label class="form-check-label" for="no">No, use my firstname</label>
                </div>
                </div>
                @error('anonymous')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
          <div class="form-group">
              <input type="text" name="user_id" value="{{Auth::id()}}">
          </div>
          <button type="submit" class="btn btn-sm px-4 py-2 bg-color">Submit Question</button>
      </form>
  </div>
@endsection