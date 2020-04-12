@extends('layouts.app')
@section('content')
 <nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background:#f8fafc;">
      <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="/profile/{{$attorney->id}}" class="text-decoration-none">{{$attorney->firstname}} {{$attorney->lastname}}</a></li>
      <li class="breadcrumb-item"><a href="/profile/{{$attorney->id}}#endorsment" class="text-decoration-none">Peer Endorsments</a></li>
      <li class="breadcrumb-item active" aria-current="page">Write an Endorsment</li>
    </ol>
 </nav>
 <h4> <strong>Endorse {{$attorney->firstname}} {{$attorney->lastname}}</strong> </h4>
    <div class="row">
        <div class="col-12 col-md-3">
            <img src="{{$attorney->image}}" class="card-img " alt="{{$attorney->firstname}}" style="width:130px;height:148px;">
        </div>
        <div class="col-12 col-md-9">
            <form action="{{route('endorsment.store')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="relationship">How do you know this lawyer?</label>
                    <select  class="form-control" name="relationship" id="relationship" required>
                        <option value=""></option>
                        <option value="Worked for lawyer">Worked for lawyer</option>
                        <option value="Supervised lawyer">Supervised lawyer</option>
                        <option value="Worked together on a matter">Worked together on a matter</option>
                        <option value="Opposing counsel on a matte">Opposing counsel on a matter</option>
                        <option value="Co-woker">Co-woker</option>
                        <option value="Friend">Friend</option>
                        <option value="Family">Family</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="practicearea">For which practice are are you endorsing this lawyer?</label>
                    <select class="form-control" name="practicearea" id="practicearea">
                        <option value=""></option>
                        @foreach ($practiceareas as $practicearea)
                            <option value="{{$practicearea->area_practice}}">{{$practicearea->area_practice}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Message">Endorsment(Write a personal message)</label>
                    <textarea class="form-control" name="message" id="" cols="30" rows="8" placeholder="">I endorse this lawyer's work.</textarea>
                </div>
                <input type="hidden" id="endoser_id" name="endoser_id" value="{{Auth::id()}}">
                <input type="hidden" id="attorney_id" name="attorney_id" value="{{$attorney->id}}">
                <button type="submit" class="btn btn-primary">Submit Endorsment</button>
            </form> 
        </div>
    </div>
    
@endsection
