<?php $sub_page = "timeline" ?>
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="h5 text-primary">@<?php echo $username; ?></div>
                <div class="h7 "><strong>Name : </strong><?php echo $user_firstname . " " . $user_lastname; ?></div>
                <div class="h7"><strong>About : </strong><?php echo $user_about; ?></div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="h6 text-muted">Posts</div>
                    <div class="h5"><?php echo $post_count; ?></div>
                </li>
                <li class="list-group-item">
                    <div class="h6 text-muted">Comments</div>
                    <div class="h5"><?php echo $comment_count; ?></div>
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
                <h3 class="card-title">Latest Posts</h3>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">

                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php include "includes/user-profile-post-slider.php" ?>
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
                    <?php include "includes/other-users.php"; ?>

                </ul>
            </div>
        </div>
    </div>
</div>