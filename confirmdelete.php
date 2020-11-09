<?php 
    $title = 'Home';
    $page = "index";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
        //echo 'error';
        include 'includes/errormessage.php';
        //header("Location: viewrecords.php"); // prevent anyone from navigating directly to this page
    }else{ //Open else statment
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);    

?>

<div class="container" id="form" style="margin-bottom: 30px">        
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3 shadow p-3 mb-5 bg-white rounded" id="col-top" style="background-color: rgb(247,247,247);">
                <div class="row">
                    <div class="col" style="text-align:center">
                        <div class="alert alert-danger">Are sure you want to delete this Attendee?</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col font-weight-bold" style="text-align:center; padding-top: 30px">
                        <?php echo $attendee['firstname'] . ' ' . $attendee['lastname']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col font-weight-bold" style="text-align:center; padding-top: 30px">
                        <p>
                            <div class="col">
                                <a href="viewrecords.php?id=<?php echo $attendee['attendee_id'] ?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back to List</i></a>
                                <a href="delete.php?id=<?php echo $attendee['attendee_id'] ?>" class="btn btn-danger">Confirm</i></a>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php }?>

<?php 
    require_once "includes/footer.php";
?>