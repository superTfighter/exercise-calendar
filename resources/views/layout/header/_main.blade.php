<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('timetables') }}">Timetables</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('days') }}">Days</a>
        </li>
    </ul>


    <div class="pull-right">
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button class="btn btn-secondary" style="height: 100%" type="submit">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>
        </form>

    </div>
</div>
