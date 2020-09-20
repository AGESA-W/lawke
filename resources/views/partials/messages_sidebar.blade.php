
<ul class="nav user-nav-tabs nav-fill ml-auto pt-0" style="flex-direction:column;">
    <li class="nav-item"><a class="nav-link btn btn-primary mb-3" href="{{route('user.message.form')}}"> <span class="fa fa-envelope"></span> New Message</a></li>
    <li class="nav-item user-nav-item"><a class="nav-link user-nav-link" href="{{route('message.index')}}">All Messages</a></li>
    <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="{{route('message.inbox')}}">Inbox 
        <?php 
        use App\Attorney;
        $attorney_id=auth()->user()->id;
        $attorney=Attorney::find($attorney_id);
        ?>
        <span class="badge badge-primary">{{$attorney->countInbox()}}</span>
       
    </a></li>
    <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="{{route('message.outbox')}}">Outbox</a></li>

</ul>
<div class="mt-3">
    <a href="/attorney_dashboard" class="btn btn-primary"> <span class="fa fa-angle-left"></span> Dashboard</a>
</div>
