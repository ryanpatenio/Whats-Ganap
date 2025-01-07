@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Section for My Created Post -->
    <h2 class="mt-5">My Lifes Event</h2>
    
    <div class="d-flex justify-content-end">
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Create New Post</button>
        
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
                        <a href="#" class="btn btn-primary "><i class="fa fa-eye"></i>view</a>
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>

@include('modal.addModal')

@section('scripts')
<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
        
        $('#addForm').submit(function(e){
            e.preventDefault();

            let Data = $(this).serialize();
           

            $.ajax({
                url: '/post',
                method:'post',
                data: Data,
                dataType:'json',

                success:function(response){
                    console.log(response);
                },

                error:function(xhr,status,error){
                var errors = xhr.responseJSON.errors;
                    if (errors) {
                        // Display validation errors
                        for (var field in errors) {
                            alert(errors[field][0]); // Display the first error message for each field
                        }
                    }
                }


            });

        });

    });
</script>
@endsection