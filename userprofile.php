<?php include "includes/header.php"; ?>
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link href="css/userprofile.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Navbar Start -->
    <?php include "includes/navabar.php"; ?>

    <!-- Navbar End -->


    <main>
        <div class="container">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete your account?</p>
                            <p>This action cannot be undone and all your data will be permanently removed.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Delete Account</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="img" style="    background-image: linear-gradient(150deg, rgba(63, 174, 255, .3)15%, rgba(63, 174, 255, .3)70%, rgba(63, 174, 255, .3)94%), url(https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg);height: 350px;background-size: cover;"></div>
            <div class="card social-prof">
                <div class="card-body">
                    <div class="wrapper">
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" class="user-profile">
                        <h3>Jane Smith</h3>
                        <p>Web Developer</p>
                    </div>
                    <div class="row ">
                        <div class="col-lg-12">
                            <ul class=" nav nav-tabs justify-content-center s-nav">
                                <li><a style="background-color:#00B074;" class="active" href="#">Timeline</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Friends</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="h5 text-primary">@JaneSmith</div>
                            <div class="h7 "><strong>Name :</strong> Jane Smith</div>
                            <div class="h7"><strong>About :</strong> Developer of web applications, JavaScript, PHP, Java, Python, Ruby, Java, Node.js, etc.
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="h6 text-muted">Followers</div>
                                <div class="h5">5.2342</div>
                            </li>
                            <li class="list-group-item">
                                <div class="h6 text-muted">Following</div>
                                <div class="h5">6758</div>
                            </li>
                            <li class="list-group-item">
                                <div class="h6 text-muted">Themes</div>
                                <div class="h5">6758</div>
                            </li>
                            <li class="mt-4">
                                <div class="button-container">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-pencil"></i>
                                        <span>Edit profile</span>
                                    </button>
                                    <button class="btn btn-block btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa fa-sign-out"></i>
                                        <span>Delete my account</span>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Latest Photos</h3>
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item active">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 gedf-main">
                    <!--- \\\\\\\Post-->
                    <div class="container-xxl bg-white p-1">
                        <a class="btn btn-primary" href="./postsform.php" role="button" target="_blank">Add a post</a>
                    </div>
                    <!-- Post /////-->

                    <div class="card social-timeline-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img class="rounded-circle" width="45" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div class="h5 m-0 text-primary">@JaneSmith</div>
                                        <div class="h7 text-muted">Miracles Lee Cross</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop11" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop11">
                                            <div class="h6 dropdown-header">Configuration</div>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Hide</a>
                                            <a class="dropdown-item" href="#">Report</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>10 min ago</div>
                            <a class="card-link" href="#">
                                <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adip.</h5>
                            </a>
                            <img src="img/gallery/1a.jpg" alt="" class="img-fluid">

                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                            <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                            <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                        </div>
                    </div>
                    <!-- Post /////-->
                    <!--- \\\\\\\Post-->
                    <div class="card social-timeline-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img class="rounded-circle" width="45" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div class="h5 m-0 text-primary">@JaneSmith</div>
                                        <div class="h7 text-muted">Miracles Lee Cross</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                            <div class="h6 dropdown-header">Configuration</div>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Hide</a>
                                            <a class="dropdown-item" href="#">Report</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> 10 min ago</div>
                            <a class="card-link" href="#">
                                <h5 class="card-title"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit consectetur
                                    deserunt illo esse distinctio.</h5>
                            </a>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam omnis nihil, aliquam est, voluptates officiis iure soluta alias vel odit, placeat reiciendis ut libero! Quas aliquid natus cumque quae repellendus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, excepturi. Doloremque, reprehenderit! Quos in maiores, soluta doloremque molestiae reiciendis libero expedita assumenda fuga quae. Consectetur id molestias itaque facere? Hic!
                            </p>
                            <div>
                                <span class="badge badge-primary">JavaScript</span>
                                <span class="badge badge-primary">Android</span>
                                <span class="badge badge-primary">PHP</span>
                                <span class="badge badge-primary">Node.js</span>
                                <span class="badge badge-primary">Ruby</span>
                                <span class="badge badge-primary">Paython</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                            <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                            <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                        </div>
                    </div>
                    <!-- Post /////-->
                    <!--- \\\\\\\Post-->
                    <div class="card social-timeline-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img class="rounded-circle" width="45" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div class="h5 m-0 text-primary">@JaneSmith</div>
                                        <div class="h7 text-muted">Miracles Lee Cross</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop2">
                                            <div class="h6 dropdown-header">Configuration</div>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Hide</a>
                                            <a class="dropdown-item" href="#">Report</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> Hace 40 min</div>
                            <a class="card-link" href="#">
                                <h5 class="card-title">Totam non adipisci hic! Possimus ducimus amet, dolores illo ipsum quos
                                    cum.</h5>
                            </a>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sunt fugit reprehenderit consectetur exercitationem odio, quam nobis? Officiis, similique, harum voluptate, facilis voluptas pariatur dolorum tempora sapiente eius maxime quaerat.
                                <a href="https://mega.nz/#!1J01nRIb!lMZ4B_DR2UWi9SRQK5TTzU1PmQpDtbZkMZjAIbv97hU" target="_blank">https://mega.nz/#!1J01nRIb!lMZ4B_DR2UWi9SRQK5TTzU1PmQpDtbZkMZjAIbv97hU</a>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                            <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                            <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                        </div>
                    </div>
                    <!-- Post /////-->
                </div>
                <div class="col-lg-3">
                    <div class="card social-timeline-card">
                        <div class="card-body">
                            <h5 class="card-title">People you may know</h5>
                            <ul class="friend-list">
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer Start -->
    <?php include "includes/footer.php"; ?>