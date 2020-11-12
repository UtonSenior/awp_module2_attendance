<?php 
    $title = 'View Records';
    $page = "viewrecords";
    require_once 'includes/header.php';    
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    // Get all Attendees
    $results = $crud->getAttendees();
?>
    <div class="container" id="form" style="margin-bottom: 80px;">
        <div class="row">
            <div class="col" style="background-color: rgb(247,247,247);">
                <div class="table-responsive">
                    <table id="attendees-list"  class="table table-striped">
                        <thead>
                            <tr >
                                <th>#</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th class="d-none  d-sm-block">Specialty</th>
                                <th style="text-align:center">Actions</th>
                            </tr>
                        </thead>
                        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>

                            <tr>
                                <td><?php echo $r['attendee_id'] ?></td>
                                <td><?php echo $r['firstname'] ?></td>
                                <td><?php echo $r['lastname'] ?></td>
                                <td class="d-none d-sm-block"><?php echo $r['name'] ?></td>
                                <td style="text-align:center">
                                    <div class="btn-group" role="group">
                                        <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="confirmdelete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php 
    require_once 'includes/footer.php';
?>