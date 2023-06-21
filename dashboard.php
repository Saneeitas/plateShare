<?php
session_start();

//check if user is not logged in
// if(!isset($_SESSION["user"])){
//     header("location: login.php");
// }//check if logged in as user
// if($_SESSION["user"]["role"] == "user"){
//     header("location: index.php");
// }
//header links
require "inc/header.php"; ?>

<div class="container">

    <?php
    //header content
    require './pages/header-home.php';
    include 'inc/process.php'; ?>

    <div class="container p-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h4><?php echo $_SESSION["user"]["name"]; ?> Dashboard</h4>
                    </div>
                    <!-- <div class="col-6">
                        <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
                    </div> -->
                </div>
            </div>
            <div class="col-3">
                <h5>Navigations</h5>
                <ul>
                    <li>
                        <a href="post.php">Posts</a>
                    </li>
                    <li>
                        <a href="comments.php">Comments</a>
                    </li>
                    <li>
                        <a href="new-post.php">Add New Post</a>
                    </li>
                    <li>
                        <a href="category.php">Categories</a>
                    </li>
                    <li>
                        <a href="users.php">Users</a>
                    </li>
                    <li>
                        <a href="new-user.php">Add New User</a>
                    </li>
                </ul>
            </div>
            <div class="col-9">
                <div class="container">
                    <h6>All Posts</h6>
                    <?php
                    if (isset($error)) {
                    ?>
                        <div class="alert alert-danger">
                            <strong><?php echo $error ?></strong>
                        </div>
                    <?php
                    } elseif (isset($success)) {
                    ?>
                        <div class="alert alert-success">
                            <strong><?php echo $success ?></strong>
                        </div>
                    <?php
                    }
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM posts";
                            $query = mysqli_query($connection, $sql);
                            $count = 1;
                            while ($result = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr class="table-active">
                                    <td scope="row"><?php echo $count; ?></td>
                                    <td scope="row">
                                        <img height="50" src=<?php echo $result["thumbnail"]; ?> alt="">
                                    </td>
                                    <td><?php echo $result["title"]; ?></td>
                                    <td><?php
                                        if ($result["status"]) {
                                        ?>
                                            Active
                                        <?php
                                        } else {
                                        ?>
                                            Not Active

                                        <?php
                                        }
                                        ?></td>
                                    <td><?php echo $result["timestamp"]; ?></td>
                                    <td>
                                        <a href="edit-post.php? edit_post_id=<?php echo $result["id"] ?>">Edit</a>
                                        |
                                        <a href="?delete_post=<?php echo $result["id"]; ?>">
                                            Delete</a>
                                    </td>
                                </tr>
                            <?php
                                $count++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <?php
    //footer content
    require './pages/footer-home.php'; ?>

</div>


<?php
//footer script
require "inc/footer.php";  ?>