<?php  
session_start();

//check if user is not logged in
if(!isset($_SESSION["user"])){
    header("location: login.php");
}

//check if logged in as user
if($_SESSION["user"]["role"] == "user"){
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
if(isset($_GET["edit_id"]) && !empty($_GET["edit_id"])){
    $edit_id = $_GET["edit_id"];
    //sql
    $sql = "SELECT * FROM category WHERE id = '$edit_id'";
    $query = mysqli_query($connection,$sql);
    $result = mysqli_fetch_assoc($query);
}else{
    header("location: category.php");

}
 ?>

    <div class="container p-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h4>Welcome <?php  echo $_SESSION["user"]["name"]; ?></h4>
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
                        <a href="category.php" class="text-danger">Categories</a>
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
                    <h6>Edit Category</h6>
                    <?php 
                    if(isset($error)) {
                    ?>
                    <div class="alert alert-danger">
                        <strong><?php echo $error ?></strong>
                    </div>
                    <?php
                         }elseif (isset($success)) {
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
                            <input type="text" name="name" value="<?php echo $result["name"];?> "
                                placeholder="Enter new category" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="edit_category" style="background-color:#10597d;"
                                class="btn btn-sm text-white my-2">
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