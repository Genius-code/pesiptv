<?php
session_start();
include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'boot.php';
include_once INCLUDES_PATH . 'backend/header.php';
include_once '../../database/connect.php';
include_once INCLUDES_PATH.'validation.php';
//check if Not found session login redirect to login page
if (!isset($_SESSION['login'])) {
    header('location:'.SITE_URL .'admin/login');
}
?>


<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto my-5">

            <div class="card mt-5 text-center">
                <div class="card-header">
                    Add New Post
                </div>
                <div class="card-body">
                    <h5 class="card-title">All Post</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="index" class="btn btn-primary">View All Posts</a>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form class="p-4 m-3 border bg-gradient-info">
                    <div class="form-group">
                        <label for="cat">Title</label>
                        <input type="text" class="form-control" id="cat">
                    </div>
                    <div class="form-group">
                        <label for="cat">Image</label>
                        <input type="text" class="form-control" id="cat">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success my-2">
                        <i class="bi bi-reply-all-fill"></i> Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once INCLUDES_PATH .'backend/footer.php';?>