@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Section for My Created Post -->
    <h2 class="mt-5">My Lifes Event</h2>
    
    <div class="d-flex justify-content-end">
        <a href="/create-post" class="btn btn-success mb-3">Create New Post</a>
    </div>
    
    <!-- Section for displaying all posts -->
    <div class="text-center">
        <h3 class="mt-4">All Posts</h3>
    </div>
    

    <div class="row justify-content-center mt-5">
        <?php
        $i = 5; // Example number of posts
        for($j = 0; $j <= $i; $j++){ ?>
            <div class="col-md-3 d-flex justify-content-center align-items-center mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>


@endsection