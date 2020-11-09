<?php 
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        // extract values from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'includes/uploads/';
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file, $destination);

        //For image uploaded by Attendee
        // $image = $_FILES['profile']['name'];
        // $tmp_dir = $_FILES['profile']['tmp_name'];
        // $image_size = $_FILES['profile']['size'];

        // $upload_dir='images/uploads/';
		// $imgExt=strtolower(pathinfo($image,PATHINFO_EXTENSION));
		// $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
		// $pic_profile=rand(1000, 1000000).".".$imgExt;
		// move_uploaded_file($tmp_dir, $upload_dir.$pic_profile);

        // call function to insert and track if success or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $destination); 
        $specialtyName = $crud->getSpecialtyById($specialty);

        if ($isSuccess) {
            //echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
            SendEmail::SendMail($email, 'Welcome to IT Conference 2020', 'Dear ' . $fname . ',<br><br>You have successfully registered for this year\'s IT Conference. <br><br>Regards. <br><br>');
            include 'includes/successmessage.php';
        }
        else{
            //echo '<h1 class="text-center text-danger">There was an error in processing!</h1>';
            include 'includes/errormessage.php';
        }
    }
?>

    
    
    <!-- This prints out values that were passed to the action page using method="get" -->
    <!--
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php //echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php //echo $_GET['specialty']?>
            </h6>
            <p class="card-text">
                Date Of Birth: <?php //echo $_GET['dob']?>
            </p>
            <p class="card-text">
                Email Address: <?php //echo $_GET['email']?>
            </p>
            <p class="card-text">
                Contact Number: <?php //echo $_GET['phone']?>
            </p>
        </div>
    </div>
    -->
        <div class="container" style="margin-bottom: 80px">
            <div class="login-card shadow p-3 mb-5 bg-white rounded">
                <div>
                    <h2 class="text-center">New Attendee</h2>
                </div> 
                <div class="row">
                    <div class="col text-center">
                        <img class="img-fluid" src="<?php echo $destination ?>" onerror="this.src='images/avatar_2x.png'" style="height:300px; width:350px" >
                    </div>
                </div>               
                <div class="row" style="margin-top:10px">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?>
                                </h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <?php echo $specialtyName['name']?>
                                </h6>
                                <p class="card-text">
                                    Date Of Birth: <?php echo $_POST['dob']?>
                                </p>
                                <p class="card-text">
                                    Email Address: <?php echo $_POST['email']?>
                                </p>
                                <p class="card-text">
                                    Contact Number: <?php echo $_POST['phone']?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>                
                </div>
            </div>
        </div>

<?php 
    require_once 'includes/footer.php';
?>