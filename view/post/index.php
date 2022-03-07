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
                    Manage Posts
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="add" class="btn btn-primary">Add New Post</a>
                </div>
            </div>

        </div>


    <div class="row">
        <div class="col offset-2">
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Details</th>
                        <th scope="col">Setting</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <button type="button" class="btn btn-danger mx-2">Delete</button>
                            <button type="button" class="btn btn-warning">Edit</button>
                        </td>

                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>
                            <button type="button" class="btn btn-danger mx-2">Delete</button>
                            <button type="button" class="btn btn-warning">Edit</button>
                        </td>

                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry the Bird</td>
                        <td>@twitter</td>
                        <td>@mdo</td>
                        <td>
                            <button type="button" class="btn btn-danger mx-2">Delete</button>
                            <button type="button" class="btn btn-warning">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>





















<?php include_once INCLUDES_PATH .'backend/footer.php';?>