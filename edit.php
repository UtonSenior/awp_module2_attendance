<?php 
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
        //echo 'error';
        include 'includes/errormessage.php';
        header("Location: viewrecords.php"); // prevent anyone from navigating directly to this page
    }else{ //Open else statment
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);

?>
        <div   div class="container" id="form" style="margin-bottom: 30px"> 
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3 shadow p-3 mb-5 bg-white rounded" id="col-top" style="background-color: rgb(247,247,247);">
                    
                    <form method="post" action="editpost.php">
                        <div class="form-group">
                                    <h1 class="text-center" id="it-heading">Edit Record</h1>
                        </div>
                        <input required type="hidden" name="id" value="<?php echo $attendee['attendee_id']; ?>" />
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" value="<?php echo $attendee['firstname']; ?>" id="firstname" name="firstname">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last name</label>
                            <input required type="text" class="form-control" value="<?php echo $attendee['lastname']; ?>" id="lastname" name="lastname">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth']; ?>" id="dob" name="dob">
                        </div>
                        <div class="form-group">
                            <label for="specialty">Area of Expertise</label>
                            <select class="form-control"  id="specialty" name="specialty">
                                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>                            
                                        <?php echo $r['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input required type="email" class="form-control" value="<?php echo $attendee['emailaddress']; ?>" id="email" name="email" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Contact Number</label>
                            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber']; ?>" id="phone" name="phone" aria-describedby="phoneHelp">
                            <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
                        </div>

                        <a href="viewrecords.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back to List</a>
                        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?> <!-- close else statment -->
<?php 
    require_once "includes/footer.php";
?>