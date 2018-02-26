
<?php  include_once('templates/header.php'); ?>

    <link rel="stylesheet" href="styles/profile.css">
    <div class="profile-page row">
        <div class="background-image"></div>
        <div class="card float-right profile-card col-4" style="width:300px">
            <img class="card-img-top" src="images/users/example-user.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
                <div class="row">
                    <h4 class="card-title col-sm-10">Leonardo Teixeira</h4>
                    <img class="px-2 pb-2 edit-icon" src="images/system/edit-icon.svg" alt="Edit" width="36" height="36">
                </div>
                <!-- <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p> -->
                <!-- <a href="#" class="btn btn-primary">See Profile</a> -->

                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title btn btn-primary">
                                <a id="skills" data-toggle="collapse" href="#collapse1">Skills and Instruments</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <ul class="list-group">
                            <li class="list-group-item">Guitar</li>
                            <li class="list-group-item">Drums</li>
                            <li class="list-group-item">Bass</li>
                            <li class="list-group-item">Vocals</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container">
            <div class="jumbotron col-4">
                <h3>Some post text</h3>
            </div>
        </div> -->
    </div>

</body>

</html>