<nav class="navbar navbar-expand bg-primary navbar-light p-0 mt-3">
    <ul class="navbar-nav mx-auto">
        <li class="nav-item <?php if($active == 'users') echo "active"; ?>">
            <a class="nav-link text-success" href="/users">Users</a>
        </li>
        <li class="nav-item <?php if($active == 'user_reports') echo "active"; ?>">
            <a class="nav-link text-success" href="/reported_users">User reports</a>
        </li>
        <li class="nav-item <?php if($active == 'band_reports') echo "active"; ?>">
            <a class="nav-link text-success" href="/reported_bands">Band reports</a>
        </li>
        <li class="nav-item <?php if($active == 'genres') echo "active"; ?>">
            <a class="nav-link text-success" href="/genres">Genres</a>
        </li>
        <li class="nav-item <?php if($active == 'skills') echo "active"; ?>">
            <a class="nav-link text-success" href="/skills">Skills</a>
        </li>
    </ul>
</nav>

<hr>