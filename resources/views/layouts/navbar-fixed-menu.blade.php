<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Fixed navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/employee">Employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/division">Division</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user">User</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/customer">Customer</a>
                    </li>

                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">{{ Auth::user()->employee->name }}</a>
                </li>
            </ul>
            <form class="d-flex" method="POST" action="/auth/logout">
                @csrf
                <button class="btn btn-outline-success" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>
