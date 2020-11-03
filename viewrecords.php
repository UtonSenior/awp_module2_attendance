<?php 
    $title = 'View Records';
    $page = "viewrecords";
    require_once 'includes/header.php';    
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    // Get all Attendees
    $results = $crud->getAttendees();
?>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr style="background-color:grey; color:white">
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th class="d-none  d-sm-block d-sm-none d-md-block">Specialty</th>
                <th style="text-align:center">Actions</th>
            </tr>
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>

                <tr>
                    <td><?php echo $r['attendee_id'] ?></td>
                    <td><?php echo $r['firstname'] ?></td>
                    <td><?php echo $r['lastname'] ?></td>
                    <td class="d-none d-sm-block d-sm-none d-md-block"><?php echo $r['name'] ?></td>
                    <td style="text-align:center">
                        <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
                        <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                        <a onclick="return confirm('Are you sure you want to delete <?php echo ' '. $r['firstname'] . ' ' . $r['lastname'] . ' '; ?> from this record?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

            <?php } ?>
        </table>
    </div>

<?php 
    require_once 'includes/footer.php';
?>