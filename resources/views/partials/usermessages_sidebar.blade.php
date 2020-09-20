
<ul class="nav user-nav-tabs nav-fill ml-auto pt-0" style="flex-direction:column;">
    <li class="nav-item"><a class="nav-link btn btn-primary mb-3" href="{{route('attorney.message.form')}}"><span class="fa fa-envelope"></span> New Message</a></li>
    <li class="nav-item user-nav-item"><a class="nav-link user-nav-link" href="{{route('usermessage.index')}}">All Messages</a></li>
    <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="{{route('usermessage.inbox')}}">Inbox 
        <?php 
        use App\User;
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        ?>
        <span class="badge badge-primary">{{$user->countUserInbox()}}</span>
       
    </a></li>
    <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="{{route('usermessage.outbox')}}">Outbox</a></li>

</ul>
<div class="mt-3">
    <a href="/home" class="btn btn-primary"><span class="fa fa-angle-left"></span> Dashboard</a>

</div>


