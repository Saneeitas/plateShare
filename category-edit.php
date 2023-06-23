<?php
session_start();

//check if user is not logged in
if (!isset($_SESSION["user"])) {
    header("location: login.php");
}

//check if logged in as user
if ($_SESSION["user"]["role"] == "user") {
    header("location: index.php");
}

//header links
require "inc/header.php"; ?>

<div class="container">

    <?php
    //header content
    require './pages/header-home.php';
    include 'inc/process.php';
    //if user click edit
    if (isset($_GET["edit_id"]) && !empty($_GET["edit_id"])) {
        $edit_id = $_GET["edit_id"];
        //sql
        $sql = "SELECT * FROM category WHERE id = '$edit_id'";
        $query = mysqli_query($connection, $sql);
        $result = mysqli_fetch_assoc($query);
    } else {
        header("location: category.php");
    }
    ?>

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
                    <h6>Edit Category</h6>
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
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="name" value="<?php echo $result["name"]; ?> " placeholder="Enter new category" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="edit_category" style="background-color:#E57C23;" class="btn btn-sm text-white my-2">
                                Update</button>
                        </div>
                    </form>
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