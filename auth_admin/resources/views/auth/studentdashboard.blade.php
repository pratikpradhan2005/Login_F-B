<h1>Welcome, Student!</h1>
<a href="{{ route('student-logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
<form id="logout-form" action="{{ route('student-logout') }}" method="POST" style="display: none;">
    @csrf
</form>