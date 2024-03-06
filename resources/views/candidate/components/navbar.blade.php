<div class="col-md-4">
    <div class="account-information">
        <div class="profile-thumb">
            <img src="{{asset(Auth::user()->image)}}" style="width:30%" alt="account holder image">
            <h3>{{Auth::user()->name}}</h3>
            <p>{{Auth::user()->designation}}</p>
        </div>

        <ul>
            <li>
                <a href="{{route('candidateProfile')}}" class="active">
                    <i class='bx bx-user'></i>
                    My Profile
                </a>
            </li>
            <li>
                <a href="resume.html">
                    <i class='bx bxs-file-doc'></i>
                    My Resume
                </a>
            </li>
            <li>
                <a href="{{route('applyedJob')}}">
                    <i class='bx bx-briefcase'></i>
                    Applied Job
                </a>

            <li>
                <a href="{{route('saveJobList')}}">
                    <i class='bx bx-heart'></i>
                    Saved Jobs
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();" ><i class='bx bx-log-out'></i>
                        Logout</a>
                </form>
            </li>
        </ul>
    </div>
</div>
