<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Attendance - <?php echo $page; ?></title>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <!-- Brand/logo -->
                <a class="navbar-brand mylogo" href="index.php">IT Conference</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <!-- Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item <?php if($page == 'array'){ echo 'active'; }?>">
                        <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <li class="nav-item <?php if($page == 'function'){ echo 'active'; }?>">
                        <a class="nav-link" href="viewrecords.php">View Attendees</a>
                        </li>
                        
                    </ul>
                </div>
            </nav> 