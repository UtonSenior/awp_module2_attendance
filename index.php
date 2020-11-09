<?php 
    $title = 'Home';
    $page = "index";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
?>
    <!-- 
        - First name
        - Last name
        - Date of Birth (Use DatePicker)
        - Specialty (Database Admin, Software Developer, Web Administrator, Other)
        = Email Address
        - Contact Number
    -->
    <div class="container" id="form" style="margin-bottom: 30px">        
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3 shadow p-3 mb-5 bg-white rounded" id="col-top" style="background-color: rgb(247,247,247);">
                <form method="post" action="success.php" enctype="multipart/form-data">
                
                    <div class="form-group">
                                <h1 class="text-center" id="it-heading">Registration IT Conference</h1>
                    </div>
                    <div class="form-group">
                        <label for="firstname">First name</label>
                        <input required type="text" class="form-control" id="firstname" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last name</label>
                        <input required type="text" class="form-control" id="lastname" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input required type="text" class="form-control" id="dob" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="specialty">Area of Expertise</label>
                        <select class="form-control"  id="specialty" name="specialty">
                            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="phone">Contact Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
                        <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input form-group" id="avatar" name="avatar" accept="image/*">
                        <label class="custom-file-label" for="avatar">Choose File</label>
                        <small id="phoneHelp" class="form-text text-success bg-light">File Upload is Optional</small>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-block" style="margin-top:10px">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php 
    require_once "includes/footer.php";
?>