
<div class="p-0">
    <ul class="nav user-nav-tabs nav-fill ml-auto pt-0" style="flex-direction:column;">
        <li class="nav-item user-nav-item"><a class="nav-link user-nav-link active" href="/home"><span class="fa fa-user"></span> Account</a></li>
        {{-- <li class="nav-item user-nav-item dropright">
            <a class="nav-link user-nav-link  dropdown-toggle" href="#"id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="/images/messenger.png" alt="" style="width:15px;height:15px"> Messenger
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#tab2" data-toggle="tab"><span class="fa fa-envelope"></span> Inbox <span class="badge badge-primary" style="margin-left:120px;">{{$user->countUserInbox()}}</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#tab4" data-toggle="tab"><span class="fa fa-chevron-right"></span> Sent </a>

            </div>
        </li> --}}
        <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="/home/messenger"><img src="/images/messenger.png" alt="" style="width:15px;height:15px"> Messenger</a></li>
        <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="/home/reviews"><span class="fa fa-pencil"></span> Reviews</a></li>
        <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="/home/questions"><span > <img src="/images/questions.png"  style="height:22px;width:22px;" alt="" srcset=""></span> Questions Asked</a></li>

    </ul>
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