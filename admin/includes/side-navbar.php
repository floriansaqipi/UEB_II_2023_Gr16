<aside class="main-sidebar hidden-print ">
    <section class="sidebar" id="sidebar-scroll">
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
            <li class="nav-level">--- Navigation</li>
            <li class="<?php echo $page == "index" ? "active" : " " ?> treeview">

                <a class="waves-effect waves-dark" href="index.php">
                    <i class="icon-speedometer"></i><span> Dashboard</span>
                </a>
            </li>
            <li class="nav-level">--- Components</li>
            <li class="<?php echo $page == "categories" ? "active" : " " ?> treeview">
                <a class="waves-effect waves-dark" href="categories.php">
                    <i class="icon-list"></i><span> Categories</span>
                </a>
            </li>
            <li class="treeview <?php echo $page == "posts" ? "active" : " " ?>"><a class="waves-effect waves-dark" href="posts.php?"><i class="icon-docs"></i><span>Posts</span><i class="icon-arrow-down"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php echo !isset($_GET["source"]) ? "active" : "" ?>"><a class="waves-effect waves-dark" href="posts.php"><i class="icon-arrow-right"></i> View All Posts</a></li>
                    <li class="<?php echo isset($_GET["source"]) ? ($_GET["source"] == "add_post" ? "active" : "" )  : "" ?>"><a class="waves-effect waves-dark" href="posts.php?source=add_post"><i class="icon-arrow-right"></i> Add Post</a></li>

                </ul>
            </li>
            <li class="<?php echo $page == "comments" ? "active" : " " ?> treeview">
                <a class="waves-effect waves-dark" href="comments.php">
                    <i class="icon-book-open"></i><span> Comments</span>
                </a>
            </li>
            <li class="treeview <?php echo $page == "users" ? "active" : " " ?>"><a class="waves-effect waves-dark" href="users.php?"><i class="icon-user"></i><span>Users</span><i class="icon-arrow-down"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php echo !isset($_GET["source"]) ? "active" : "" ?>"><a class="waves-effect waves-dark" href="users.php"><i class="icon-arrow-right"></i> View All Users</a></li>
                    

                </ul>
            </li>
            
           
        </ul>
    </section>
</aside>