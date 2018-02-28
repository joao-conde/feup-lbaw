<?php  include_once('templates/header.php'); ?>
<link rel="stylesheet" href="styles/feed.css">
<script src="scripts/feed.js"></script>

<body>

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Username
                    </a>
                </li>
                <li>
                    <a href="#">Bands</a>
                </li>
                <li>
                    <a href="#">Musicians</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>News feed</h1>

                <div class="jumbotron">
                    
                    <img src="images/system/dummy_profile.svg"/ width = 10%>
                    <h3> <a href="#">Post1</a> </h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis turpis mauris. 
                        Etiam venenatis tincidunt sapien, quis ullamcorper enim luctus et. In porttitor justo accumsan, 
                        placerat nisi nec, molestie neque. Proin ut fringilla metus, ac tincidunt nulla. Sed non tristique 
                        nibh. Fusce ornare ligula et varius blandit. Aenean risus neque, hendrerit sit amet consectetur a, 
                        sodales auctor tellus. Curabitur justo turpis, placerat in velit non, sollicitudin posuere diam. Ut 
                        sit amet aliquet orci. Nunc at consequat ante.
                    </p>
                   
                </div>

                <div class="jumbotron">
                    
                        <img src="images/system/dummy_profile.svg"/ width = 10%>
                        <h3> <a href="#">Post2</a> </h3>
    
                        <p>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis 
                            lacus venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. 
                            Fusce bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis 
                            risus sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. 
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                        </p>
                       
                    </div>
    



                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </div>
    <!-- /#wrapper -->

</body>

</html>