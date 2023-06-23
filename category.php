<?php
session_start();

//check if user is not logged in
if (!isset($_SESSION["user"])) {
    header("location: login.php");
} //check if logged in as user
if ($_SESSION["user"]["role"] == "user") {
    header("location: index.php");
}
//header links
require "inc/header.php"; ?>

<div class="container">

    <?php
    //header content
    require './pages/header-home.php';
    include 'inc/process.php'; ?>

    <div class="container p-3">
        <div class="row">
            
            <div class="col-2">
                <nav id="sidebarMenu" class="d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3 sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active text-dark" aria-current="page" href="#">
                                    <span data-feather="home" class="align-text-bottom"></span>
                                    <?php echo $_SESSION["user"]["name"]; ?> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="recipe.php" style="color:#E57C23;">
                                    <span data-feather="file" class="align-text-bottom"></span>
                                    Recipes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="new-recipe.php" style="color:#E57C23;">
                                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                    New Recipe
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="comments.php" style="color:#E57C23;">
                                    <span data-feather="users" class="align-text-bottom"></span>
                                    Comments
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="category.php" style="color:#E57C23;">
                                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                                    Categories
                                </a>
                            </li>

                            </li>
                        </ul>
                    </div>
            </div>
            <div class="col-9">
                <div class="container">
                    <h6>All Categories</h6>
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">New Category</a>
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
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM category";
                            $query = mysqli_query($connection, $sql);
                            $count = 1;
                            while ($result = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr class="table-active">
                                    <th scope="row"><?php echo $count ?></th>
                                    <td><?php echo $result["name"]; ?></td>
                                    <td>
                                        <a href="category-edit.php? edit_id=<?php echo $result["id"] ?>">Edit</a>
                                        |
                                        <a href="category.php? delete_category=<?php echo $result["id"]; ?>">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <label for="">Title</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Enter title" id="" required>
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary" name="category">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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