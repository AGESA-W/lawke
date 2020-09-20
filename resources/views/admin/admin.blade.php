@extends('layouts.master')

@section('title')
    ADMIN | DASHBOARD
@endsection

@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{count($attorneys)}}</h3>
        
        <p>Lawyer Registrations</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="/admin/attorneys/account" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{count($users)}}</h3>

        <p>User Registrations</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="/admin/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{count($questions)}}</h3>

        <p>Question Asked</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{count($answers)}}</h3>

        <p>Answers</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<div class="container" >
  <div class="row mt-5">
    <div class="col-6 col-md-6">
        <div class="mission">

        </div>
    </div>
    <div class="col-6 col-md-6">
        <h5 class="text-color font-weight-bolder">WELCOME TO LEGALMEET</h5>
        <h2 class="mission-text">We always fight for your justice to win</h2>
        <p class="text-secondary">We believe that more information helps you make better decisions. At Legalmeet, we provide you with detailed information on lawyers  so that you can make the choices that are right for you.</p>
        <div class="card mission-nav">
            <div class="card-header p-0">
              <ul class="nav nav-tabs nav-fill ml-auto pt-0">
                <li class="nav-item"><a class="nav-link active" href="#tab7" data-toggle="tab">Our Mission</a></li>
                <li class="nav-item border"><a class="nav-link" href="#tab8" data-toggle="tab">Our Vision</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab9" data-toggle="tab">Our Values</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body text-secondary">
              <div class="tab-content">
                <div class="tab-pane active" id="tab7">
                    To provide legal services with quality member services and promote the rule of law, through advocacy and good governance.
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab8">
                    To be the leading legal services provider.
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab9">
                  <ul class="list-unstyled">
                      <li>Rule of law and administration of justice</li>
                      <li>Democracy and good governance.</li>
                  </ul>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
    </div>
  </div>
</div>
@endsection
