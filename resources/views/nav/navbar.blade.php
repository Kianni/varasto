<nav class="navbar navbar-expand-sm bg-dark">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="/">Kotiin</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('knowAboutUs')}}">Meistä</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="/service">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="/x">Secrets</a></li> -->
            <li class="nav-item"><a class="nav-link" href="/posts">Varasto</a></li>

        </ul>
    </div>
</nav>