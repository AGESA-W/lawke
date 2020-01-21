@extends('layouts.app')
@section('content')
   <div class="row ">
       <div class="col-6 col-md-3 lawyer-overview">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="./images/profile.jpg" class="card-img" alt="..." style="width:100px;height:120px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body ml-2">
                        <h5 class="card-title">Agesa Austin</h5>
                        <p class="card-text">Reviews.</p>
                        <p class="card-text">Location</p>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <button class="btn element-background"style="width:100%;">Message</button>
            </div>
        </div>
    </div>
       </div>
   </div>  
@endsection