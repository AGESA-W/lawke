@extends('layouts.app')
@section('content')
    <div class="row profile">
       <div class="col-12 col-md-4 lawyer-overview">
            <div class="card mb-3 sticky-top">
                <div class="row no-gutters">
                    <div class="col-12  col-md-4">
                        <img src="{{$attorney->image}}" class="card-img " alt="{{$attorney->firstname}}" style="width:130px;height:148px;">
                    </div>
                    <div class="col-12  col-md-8"> 
                        <div class="card-body ml-4 p-0">
                            <h5 class="card-title" style="color:#333333;font-size:28px;">{{$attorney->firstname}} {{$attorney->lastname}}</h5>
                            <p class="card-text"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$attorney->getStarRating()}}"></star-rating> <a href="#review" class="text-decoration-none">{{$attorney->reviewCount()}} review(s)</a></p>
                            <ul class="list-unstyled">
                                <li ><span class="fa fa-map-marker text-secondary"style="font-size:16px;"> </span> @foreach ($locations as $location){{$location->location}} @endforeach</li>
                                <li class=" pt-1"> <img src="/images/verified.png" alt="" style="width:14px;height:14px">Free Consultation </li>
                            </ul>      
                        </div>
                    </div>
                </div>
                <div class="card-body mt-2 p-0">
                <a href="/attorney-message/{{$attorney->id}}">
                        <button class="btn bg-color"style="width:100%;"><span class="fa fa-envelope"></span> Message</button>
                    </a>
                </div>
                <div class="text-center">
                    <p class="text-primary"><span class="fa fa-phone fa-1x" style="padding-top:20px;font-size:16px;"></span> {{$attorney->mobile}}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <h5 class="text-color font-weight-bolder">MEET THE ATTORNEY</h5>
            <h2 class="mission-text">Fighting for your justice to win</h2>
            <div class="profile-nav sticky-top">
                <div class="tabs p-0 ">
                    <ul class="nav nav-tabs nav-fill ">
                        <li class="nav-item"><a class="nav-link active" href="#about">About</a></li>
                        <li class="nav-item nav-item-1"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item nav-item-1"><a class="nav-link" href="#resume">Resume</a></li>
                        <li class="nav-item nav-item-1"><a class="nav-link" href="#review">Reviews</a></li>
                        <li class="nav-item nav-item-1"><a class="nav-link" href="#cost">Cost</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-3">
                <section class="profile-content" id="about">
                    <h5>About <span class="text-uppercase text-primary"> {{$attorney->firstname}} </span></h5>
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet consectetur Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi illum omnis iste repellendus. Consectetur, quod et? Veritatis consequatur maiores sit. adipisicing elit. Eveniet, amet. Ad iusto fuga iure nobis dolore earum qui esse omnis, modi accusantium natus cumque aperiam in repellendus magnam culpa. <span id="dots"><b>.......</b></span> <span id="more">illo nemo quia, magni quidem at! Veniam, explicabo repellendus a consectetur minima possimus deserunt voluptate amet obcaecati optio eligendi sunt, libero necessitatibus quae expedita exercitationem sit qui deleniti facilis. Delectus explicabo pariatur adipisci, quod quisquam excepturi libero totam aut, soluta ratione hic perferendis beatae officia facilis ut veritatis iusto laudantium incidunt odio? Sit doloremque itaque tempore ad accusantium error cum reprehenderit blanditiis, est autem laboriosam. Itaque, fugiat non. Tempore, suscipit.</span>
                    </p>
                    <button class="text-color" type="button" id="read"onclick="read()">Read More</span></button>
                    <hr>
                    <h6 class="text-muted">PRACTICE AREAS</h6>
                    @foreach ($areas as $area)
                        <p>{{$area->area_practice}}</p>
                    @endforeach
                </section>
               
                <section class="profile-content" id="contact">
                    <h5>Contact</h5>
                    <div class="row">
                        @foreach ($locations as $location)
                            <div class="col-md-7 col-12">
                                <div class="contact-image">
                                    <a href="https://www.google.com/maps/place/107+North+Side+Square,+Huntsville,+AL+35801,+USA/@34.7307565,-86.5879195,17z/data=!3m1!4b1!4m5!3m4!1s0x88626b56a165e753:0x84a14f2a2277fd86!8m2!3d34.7307521!4d-86.5857308" target="_blank"><img src="/{{$location->location_image}}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-5 col-12">
                                <div class="contact-details pl-5">
                                    <p>{{$location->company_name}}</p>
                                    <p>{{$location->location}}</p>
                                    <p>PO.BOX:{{$location->address}}-00200</p>
                                    <p class="text-secondary">Office: <span class="text-primary">{{$attorney->mobile}}</span> </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>  
                <section class="profile-content" id="resume">
                    <h5>Resume</h5>
                    <h6 class="text-muted">LICENSE</h6>
                    <table class="table table-bordered">
                        <thead class="bg-color text-white">
                            <tr>
                                <td><b>County</b></td>
                                <td><b>Status</b></td>
                                <td><b>Certificate No.</b></td>
                                <td><b>Updated</b></td>
                            </tr>
                        </thead>
                        <tbody>

                            <td>{{$attorney->county}}</td>
                            <td>Active</td>
                            <td>{{$attorney->license_no}}</td>
                            <td>1/2/2015</td>
                        </tbody>
                    </table>
                    <img src="/images/verified.png" alt="" style="width:20px;height:20px">
                    We have not found any instances of professional misconduct for this lawyer.
                    <hr>
                    <h6 class="text-muted mt-4">WORK EXPERIENCE</h6>
                    <table class="table table-bordered">
                        <thead class="bg-color text-white">
                            <tr>
                                <td><b>Title</b></td>
                                <td><b>Company Name</b></td>
                                <td><b>Duration</b></td>
                            </tr>
                        </thead>
                        @foreach ($works as $work)
                            <tbody>
                                <td>{{$work->title}}</td>
                                <td>{{$work->company_name}}</td>
                                <td>{{$work->duration}}</td>
                            </tbody>
                        @endforeach
                    </table>
                    <hr>
                    <h6 class="text-muted mt-4">EDUCATION</h6>
                    <table class="table table-bordered">
                        <thead class="bg-color text-white ">
                            <tr>
                                <td><b>School Name</b></td>
                                <td><b>Degree</b></td>
                                <td><b>Graduated</b></td>
                            </tr>
                        </thead>
                        @foreach ($educations as $education)
                            <tbody>
                                <td>{{$education->school_name}}</td>
                                <td>{{$education->degree}}</td>
                                <td>{{$education->graduation}}</td>
                            </tbody>
                        @endforeach
                    </table>
                </section>

                <section class="profile-content" id="review">
                    <h5 class="d-flex float-left">Reviews <span class="text-muted">({{$attorney->reviewCount()}})</span> <span class="pl-2" style="margin-top:-7px;"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$attorney->getStarRating()}}"></star-rating></span></h5>
                    <button class="btn btn-primary float-right">
                    <a class="text-white text-decoration-none" href="/review/{{$attorney->id}}/write-review"> Review {{$attorney->firstname}} {{$attorney->lastname}}</a>
                    </button>
                    <div class="clearfix"></div>
                    <div class="wrapper mt-3">
                        <ul class="list-unstyled">
                            @if(count($reviews)>0)
                                @foreach ($reviews as $review)
                                        <li> 
                                            <div class="row">
                                                <div class="float-left col-md-3">
                                                    <p class="mb-0"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$review->rating}}"></star-rating></p>
                                                    <small><span class="text-secondary">Posted by</span> {{$review->user->name}}</small>
                                                    <br>
                                                    <small class="text-secondary">{{ date('d M, h:i a', strtotime($review->created_at)) }}</small>
                                                </div>
                                                <div class="float-right col-md-9">
                                                    <b>{{$review->headline}}</b>
                                                    <p>{{$review->description}}</p>
                                                </div>
                                            </div>
                                        <div class="clearfix"></div>
                                        </li>
                                @endforeach
                                @else
                                <p>No Reviews found</p>
                            @endif
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </section>
                <section class="profile-content " id="cost">
                    <h5 class="text-muted">COST</h5>
                    <p>Hourly Rates ---------------------- <b>ksh3000-ksh4000/hour</b> </p>
                    <p>Free Consultation ----------------- <b>45 minutes</b> </p>
                    <h6 class="text-muted">OTHER BILLING TYPES</h6>
                    <p>Contigency ------------------------ <b>30%-40%</b> </p>
                    
                </section>
            </div>
        </div> 
   </div> 
   <script>
       var i=0
       function read(){
            if(!i){
                document.getElementById("more").style.
                 display="inline";
                document.getElementById("dots").style.
                 display="none";
                document.getElementById("read").innerHTML
                 ="Read Less";
                 i=1;
            }else{
                document.getElementById("more").style.
                 display="none";
                document.getElementById("dots").style.
                 display="inline";
                document.getElementById("read").innerHTML
                 ="Read More";
                 i=0;
            }
       }
      
   </script>
@endsection