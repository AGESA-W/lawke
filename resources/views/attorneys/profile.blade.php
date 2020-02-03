@extends('layouts.app')
@section('content')
   <div class="row ">
       <div class="col-12 col-md-3 lawyer-overview">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/images/profile.jpg" class="card-img" alt="..." style="width:100px;height:120px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ml-2">
                            <h5 class="card-title">{{$attorneys->firstname}} {{$attorneys->lastname}}</h5>
                            <p class="card-text">Reviews.</p>
                            <p class="card-text"><span class="fa fa-map-pin"></span>{{$attorneys->location}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <button class="btn element-background"style="width:100%;">Message</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <h5 class="text-color font-weight-bolder">MEET THE ATTORNEY</h5>
            <h2 class="mission-text">We always fight for your justice to win</h2>
            <div class="card mission-nav">
                <div class="card-header p-0">
                  <ul class="nav nav-tabs nav-fill ml-auto pt-0">
                    <li class="nav-item"><a class="nav-link active" href="#about">About</a></li>
                    <li class="nav-item border"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"style="border-right:2px solid #f4f4f4"><a class="nav-link" href="#resume">Resume</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cost">Cost</a></li>
                  </ul>
                </div><!-- /.card-header -->
            </div>
            <div class="profile-content mt-3">
            <section id="about">
            <h5>About <span class="text-uppercase"></span></h5>
                <p class="text-secondary">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, amet. Ad iusto fuga iure nobis dolore earum qui esse omnis, modi accusantium natus cumque aperiam in repellendus magnam culpa, unde illo nemo quia, magni quidem at! Veniam, explicabo repellendus a consectetur minima possimus deserunt voluptate amet obcaecati optio eligendi sunt, libero necessitatibus quae expedita exercitationem sit qui deleniti facilis. Delectus explicabo pariatur adipisci, quod quisquam excepturi libero totam aut, soluta ratione hic perferendis beatae officia facilis ut veritatis iusto laudantium incidunt odio? Sit doloremque itaque tempore ad accusantium error cum reprehenderit blanditiis, est autem laboriosam. Itaque, fugiat non. Tempore, suscipit.
                </p>
            </section>
            <hr>
            <section id="contact">
                <h5>Contact</h5>
                <div class="row">
                    <div class="col-md-7 col-12">
                        <div class="contact-image">
                            <img src="/{{$attorneys->location_image}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="contact-details">
                            <p>{{$attorneys->company_name}}</p>
                            <p>{{$attorneys->location}} </p>
                            <p>PO.BOX:{{$attorneys->address}}-00200</p>
                            <p class="text-secondary">Office: <span class="text-primary">{{$attorneys->mobile}}</span> </p>
                        </div>
                    </div>
                </div>
            </section>
            <hr>
            <section id="resume">
                <h5>Resume</h5>
                <h6 class="text-muted">LICENSE</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <td>County</td>
                            <td>Status</td>
                            <td>Certificate No.</td>
                            <td>Updated</td>
                        </tr>
                    </thead>
                    <tbody>
                        <td>{{$attorneys->county}}</td>
                        <td>Active</td>
                        <td>{{$attorneys->license_no}}</td>
                        <td>1/2/2015</td>
                    </tbody>
                </table>
                <img src="/images/verified.png" alt="" style="width:20px;height:20px">
                We have not found any instances of professional misconduct for this lawyer.
                <hr>
                <h6 class="text-muted mt-4">WORK EXPERIENCE</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Title</td>
                            <td>Company Name</td>
                            <td>Duration</td>
                        </tr>
                    </thead>
                    <tbody>
                        <td>{{$attorneys->title}}</td>
                        <td>{{$attorneys->company_name}}</td>
                        <td>{{$attorneys->duration}}</td>
                    </tbody>
                </table>
                <hr>
                <h6 class="text-muted mt-4">EDUCATION</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <td>School Name</td>
                            <td>Degree</td>
                            <td>Graduated</td>
                        </tr>
                    </thead>
                    <tbody>
                        <td>{{$attorneys->school_name}}</td>
                        <td>{{$attorneys->degree}}</td>
                        <td>{{$attorneys->graduation}}</td>
                    </tbody>
                </table>

            </section>
            <section id="cost">
            </section>
            </div>
           
            {{-- <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta tempora recusandae voluptatem
                numquam in nobis quisquam laborum. Consectetur, nesciunt illo.
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab2">
                hhhh Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta tempora recusandae voluptatem
                numquam in nobis quisquam laborum. Consectetur, nesciunt illo.
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta tempora recusandae voluptatem
                numquam in nobis quisquam laborum. Consectetur, nesciunt illo.
            </div>
            <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content --> --}}
        </div>
   </div>
@endsection