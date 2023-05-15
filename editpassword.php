<?php include "includes/header.php"; ?>
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <?php include "includes/navabar.php"; ?>

    <!-- Navbar End -->


    
    <script>
$("#btnSubmit").click(function(event) {
    
    var form = $("#loginForm");
    
    if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    
    // if validation passed form
    // would post to the server here
    
    form.addClass('was-validated');
});
</script>


    <div class="container-xx1 bg-white p-1 d-flex align-items-center justify-content-center" >
    <!-- form card change password -->
    <div class="card card-outline-primary">
        <div class="card-header">
            <h3 class="mb-5">Change Password</h3>
        </div>
        <div class="card-body">
            <form class="form" role="form" autocomplete="off">
                <div class="form-group row">
                    <label for="inputPasswordOld" class="col-sm-3 col-form-label">Current Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="inputPasswordOld" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPasswordNew" class="col-sm-3 col-form-label">New Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="inputPasswordNew" required="">
                        <span class="form-text small text-muted">
                            The password must be 8-20 characters, and must <em>not</em> contain spaces.
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPasswordNewVerify" class="col-sm-3 col-form-label">Verify</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="inputPasswordNewVerify" required="">
                        <span class="form-text small text-muted">
                            To confirm, type the new password again.
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" id="btnSubmit" class="btn btn-primary btn-lg float-right">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /form card change password -->
</div>



<!-- Footer Start -->
<?php include "includes/footer.php"; ?>