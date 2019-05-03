<div class="container-fluid">
    <div class='navbar navbar-dark'>
        <a class='nav-item nav-link' href='/'>Customers</a>
        <a class='nav-item nav-link' href='/orders'>Orders</a>
        @if (Auth::check())
        <a href="/logout" class="nav-link">Logout</a>
        @else
        <a href="/login" class="nav-link">Login</a>
        <a href="/signup">Sign Up</a>
        @endif
    </div>
</div>