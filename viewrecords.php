<?php 
    $page = 'View Attendees';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    // Get all Attendees
    $results = $crud->getAttendees();
?>

    <table class="table">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Actions</th>
        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>

            <tr>
                <td><?php echo $r['attendee_id'] ?></td>
                <td><?php echo $r['firstname'] ?></td>
                <td><?php echo $r['lastname'] ?></td>
                <td><?php echo $r['name'] ?></td>
                <td><a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a></td>
            </tr>

        <?php } ?>
    </table>

<?php 
    require_once 'includes/footer.php';
?>