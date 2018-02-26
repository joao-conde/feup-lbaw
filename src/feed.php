<?php  include_once('templates/header.php'); ?>
<link rel="stylesheet" href="styles/feed.css">
<script src="scripts/feed.js"></script>

<body>
    <div class="wrapper">

        <nav id="sidebar">
            <!-- Close Sidebar Button -->
            <div id="dismiss">
                <i class="glyphicon glyphicon-arrow-left"></i>
            </div>

            <!-- Sidebar Header -->
            <div class="sidebar-header">
                <h3>Collapsible Sidebar</h3>
            </div>


            <!-- Sidebar Links -->
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <!-- Link with dropdown items -->
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Page</a>
                        </li>
                        <li>
                            <a href="#">Page</a>
                        </li>
                        <li>
                            <a href="#">Page</a>
                        </li>
                    </ul>
                    <li>
                        <a href="#">Portfolio</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </li>
            </ul>
        </nav>

        <div id="content">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                <i class="glyphicon glyphicon-align-left"></i>
                Toggle Sidebar
            </button>
        </div>


        <div class="overlay"></div>

</body>

</html>