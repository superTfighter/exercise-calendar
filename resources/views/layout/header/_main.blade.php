<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home')}}">Home</a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('timetables')}}">Timetables</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('days')}}">Days</a>
        </li>

        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button class="nav-link" type="submit">
                Sing out
            </button>
        </form>
    </ul>
</div>