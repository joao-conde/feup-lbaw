<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width = device-width, initial-scale = 1 shrink-to-fit=no">
        <title>Music Box</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" defer>
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-+lmTKXkS+c9d34U9obDdGOZT7zqFicJDkhckYYsW7oenXR37T2OEV4uqfUO45M87" crossorigin="anonymous">
        <link href="styles/header.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    </head>
    <body>  
        <div id="header" class="container-fluid bg-primary text-white">
            
            <div class="row justify-content-between p-2">

                <div id="logo" class="col-5 col-md-4 col-lg-3 p-0 pl-1 align-self-center mr-1 order-md-1">

                    <div class="row justify-content-start">

                        <div class="col-auto pr-0 align-self-center">

                            <img src="images/system/logo_white.svg" class="logo">

                        </div>

                        <div class="col-8 align-self-center pl-2 pr-0">

                            <h1 class="h4">Music Box</h1>
                            <p class="m-0 display-6">For musicians</p>

                        </div>

                    </div>

                </div>

                 <div id="mobileToggle2" class="col-auto align-self-center d-md-none p-0" data-toggle="collapse" data-target="#searchbar">

                    <img class="search" src="images/system/search_icon.svg">

                </div>      

                <div id="fixedNavBar" class="col-5 col-md-3 col-lg-3 align-self-center order-md-3">

                    <div class="row justify-content-end">

                        <?php if(true) include('templates/fixednavbar.html'); ?>
                        
                    </div>

                </div>

                <div id="searchbarHeader" class="col-12 col-md-4  order-last align-self-center order-md-2">

                    <div class="row">

                        <?php if(true) include('templates/searchbar.html'); ?>
                        
                    </div>

                </div>


                <div id="navBar" class="col-12 col-md-2 order-last align-self-center order-md-4 d-md-none">

                    <div class="row">

                        <?php if(true) include('templates/navbar.html'); ?>
                        
                    </div>

                </div>

            </div>
        </div>