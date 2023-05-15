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





    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2 active" href="#"><i
                                        class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2"
                                    href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i
                                        class="fa fa-fw fa-th mr-1"></i><span>CRUD</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2"
                                    href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page"
                                    target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span>Settings</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <body>
                <div class="col">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="e-profile">
                                        <div class="row">
                                            <div class="col-12 col-sm-auto mb-3">
                                                <div class="mx-auto" style="width: 140px;">
                                                    <div class="d-flex justify-content-center align-items-center rounded"
                                                        style="height: 140px; background-color: rgb(233, 236, 239);">
                                                        <span
                                                            style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">John Smith</h4>
                                                    <p class="mb-0">@johnny.s</p>
                                                    <div class="text-muted"><small>Last seen 2 hours ago</small></div>
                                                    <div class="mt-2">
                                                        <a href=""  class="btn btn-primary" >
                                                            <i class="fa fa-fw fa-camera"></i>
                                                            <span>Change Photo</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="text-center text-sm-right">
                                                    <span class="badge badge-primary">administrator</span>
                                                    <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active">
                                                <form class="row g-3 needs-validation" novalidate>

                                                    <div class="col-md-4">
                                                        <label for="validationServer01" class="form-label">First
                                                            name</label>
                                                        <input type="text" class="form-control is-valid"
                                                            id="validationServer01" value="Mark" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="validationServer02" class="form-label">Last
                                                            name</label>
                                                        <input type="text" class="form-control is-valid"
                                                            id="validationServer02" value="Otto" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="validationServerUsername"
                                                            class="form-label">Username</label>
                                                        <div class="input-group has-validation">
                                                            <span class="input-group-text"
                                                                id="inputGroupPrepend3">@</span>
                                                            <input type="text" class="form-control is-invalid"
                                                                id="validationServerUsername"
                                                                aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback"
                                                                required>
                                                            <div id="validationServerUsernameFeedback"
                                                                class="invalid-feedback">
                                                                Please choose a username.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationServer03" class="form-label">City</label>
                                                        <input type="text" class="form-control is-invalid"
                                                            id="validationServer03"
                                                            aria-describedby="validationServer03Feedback" required>
                                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="validationServer04" class="form-label">State</label>
                                                        <select class="form-select is-invalid" id="validationServer04"
                                                            aria-describedby="validationServer04Feedback" required>
                                                            <option selected disabled value="">Choose...</option>
                                                            <option>...</option>
                                                        </select>
                                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                                            Please select a valid state.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="validationServer05" class="form-label">Zip</label>
                                                        <input type="text" class="form-control is-invalid"
                                                            id="validationServer05"
                                                            aria-describedby="validationServer05Feedback" required>
                                                        <div id="validationServer05Feedback" class="invalid-feedback">
                                                            Please provide a valid zip.
                                                        </div>
                                                    </div>
                                                    <div class=" mb-3">
                                                        <label for="inputEmail2"
                                                            class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-12">
                                                            <input type="email" class="form-control" id="inputEmail2">
                                                        </div>
                                                    </div>
                                                    <div class=" mb-3">
                                                        <label for="inputPassword2"
                                                            class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-12">
                                                            <input type="password" class="form-control"
                                                                id="inputPassword2">
                                                        </div>
                                                    </div>




                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label">About</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            rows="3"></textarea>
                                                    </div>


                                          
                                                    <div class="mb-3">
                                                        <input type="file" class="form-control"
                                                            aria-label="file example" required>
                                                        <div class="invalid-feedback">Example invalid form file feedback
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-primary" type="submit">Save
                                                                Changes</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 mb-3">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="px-xl-3">
                                        <button class="btn btn-block btn-primary">
                                            <i class="fa fa-sign-out"></i>
                                            <span>Logout</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title font-weight-bold">Support</h6>
                                    <p class="card-text">Get fast, free help from our friendly assistants.</p>
                                    <button type="button" class="btn btn-primary">Contact Us</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    </body>



    <!-- Footer Start -->
    <?php include "includes/footer.php"; ?>