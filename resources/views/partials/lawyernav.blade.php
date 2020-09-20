
<div class="p-0">
    <div class="p-0">
        <ul class="nav user-nav-tabs nav-fill ml-auto pt-0" style="flex-direction:column;">
          <li class="nav-item user-nav-item"><a class="nav-link user-nav-link active" href="{{route('attorney_dashboard')}}"><span class="fa fa-user"></span> Account</a></li>
          
          {{-- <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="#tab4" data-toggle="tab"><span class="fa fa-table"></span> Professional Information</a></li> --}}
          <li class="nav-item user-nav-item dropright">
              <a class="nav-link user-nav-link  dropdown-toggle" href="#"id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="fa fa-table"></span> Professional Information
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{route('dashboard.location')}}" ><span class="fa fa-map-marker"></span> Location</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('dashboard.education')}}" ><span class="fa fa-book"></span> Education </a>

              </div>
          </li>
          <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="/attorney_dashboard/messenger"><img src="/images/messenger.png" alt="" style="width:15px;height:15px"> Messenger
            <?php 
            use App\Attorney;
            $attorney_id=auth()->user()->id;
            $attorney=Attorney::find($attorney_id);
            ?>
            <span class="badge bg-color" style="margin-left:100px;">{{$attorney->countInbox()}}</span>
           
            </a>
            </li>

          <li class="nav-item user-nav-item dropright">
              <a class="nav-link user-nav-link  dropdown-toggle" href="#"id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="fa fa-thumbs-up"></span> Endorsments
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{route('dashboard.endorsmentReceived')}}"><span class="fa fa-users"></span> Endorsements received</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('dashboard.endorsmentDone')}}"><span class="fa fa-user"></span> Endorsements done </a>

              </div>
          </li>
          <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="{{route('dashboard.review')}}"><span class="fa fa-pencil"></span> Reviews</a></li>
          <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="{{route('dashboard.questionsAnswered')}}"><span > <img src="/images/questions.png"  style="height:22px;width:22px;" alt="" srcset=""></span> Questions Answered</a></li>

        </ul>
      </div><!-- /.card-header --> 
</div>

<style>
    a .nav-link.active{
         border-bottom: 3px solid #afa939;
         color:#000;
 
     }
     .trr{
         color:aqua;
     }
 </style>