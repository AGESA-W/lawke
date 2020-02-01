@extends('layouts.app')
@section('content')
   <div class="row ">
       <div class="col-12 col-md-3 lawyer-overview">
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
        <div class="col-12 col-md-9">
            <h5 class="text-color font-weight-bolder">WELCOME TO LAWKE</h5>
            <h2 class="mission-text">We always fight for your justice to win</h2>
            <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique error quasi debitis voluptates vel perspiciatis possimus laborum! Enim, neque dolores?</p>
            <div class="card mission-nav">
                <div class="card-header p-0">
                  <ul class="nav nav-tabs nav-fill ml-auto pt-0">
                    <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Our Mission</a></li>
                    <li class="nav-item border"><a class="nav-link" href="#tab2" data-toggle="tab">Our Vision</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Our Values</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body text-secondary">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta tempora recusandae voluptatem
                        numquam in nobis quisquam laborum. Consectetur, nesciunt illo.
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta tempora recusandae voluptatem
                        numquam in nobis quisquam laborum. Consectetur, nesciunt illo.
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab3">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta tempora recusandae voluptatem
                       numquam in nobis quisquam laborum. Consectetur, nesciunt illo.
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
        </div>
   </div>
@endsection