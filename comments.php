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
                                <a class="nav-link text-danger" href="comments.php" style="color:#E57C23;">
                                    <span data-feather="users" class="align-text-bottom"></span>
                                    Comments
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php" style="color:#E57C23;">
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
                    <h6>All Comments</h6>
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
                                <th scope="col">User</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM comments ORDER BY id DESC";
                            $query = mysqli_query($connection, $sql);
                            $counter = 1;
                            while ($result = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr class="table-active">
                                    <td scope="row"><?php echo $counter; ?></td>
                                    <td scope="row">
                                        <?php
                                        $user_id = $result["user_id"];
                                        $sql2 = "SELECT * FROM users WHERE id ='$user_id'";
                                        $query2 = mysqli_query($connection, $sql2);
                                        $result2 = mysqli_fetch_assoc($query2);
                                        echo $result2["name"];
                                        ?>
                                    </td>
                                    <td><?php echo $result["message"]; ?></td>
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
                                        ?>
                                    </td>
                                    <td><?php echo $result["timestamp"]; ?></td>
                                    <td>
                                        <?php
                                        if (!$result["status"]) {
                                        ?>
                                            <a href="?approve_comment=<?php echo $result["id"] ?>">Approve</a>
                                            |

                                        <?php
                                        } ?>
                                        <a href="?delete_comment=<?php echo $result["id"]; ?>">
                                            Delete</a>
                                    </td>
                                </tr>
                            <?php
                                $counter++;
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