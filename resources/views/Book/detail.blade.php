@extends('layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Book Detail
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Display book image -->
                            <img src="images/." alt="Book Image" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <!-- Display book details -->
                            <h5 class="card-title"></h5>
                            <p class="card-text">Category: </p>
                            <p class="card-text">Author: </p>
                            <p class="card-text">Publisher: </p>
                            <p class="card-text">Publication Year: </p>

                            <!-- Check if the user has borrowed the book relasi to borrows and count>0 -->

                                <!-- if else Check if the user has given a review relasi to reviews and count>0 -->

                                    <p>Your Review: </p>
                                
                                    <p class="text-danger">You have not reviewed this book yet.</p>

                                <!-- Form for review -->
                                <form action="" method="post">
                                    
                                    <input type="hidden" name="book_id" value="booksId">
                                    <div class="mb-3">
                                        <label for="rating" class="form-label">Rating:</label>
                                        <div class="rating">
                                            {{-- fungsi FOR star --}}
                                                <i class="fas fa-star star" data-value="i"></i>
                                            
                                        </div>
                                        <input type="hidden" name="rating" id="rating-input" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="review" class="form-label">Review:</label>
                                        <textarea class="form-control" id="review" name="review" rows="3" required> </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            {{-- else --}}
                                <p class="text-danger">You must borrow this book before you can review and rate it.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating-input'); // Mengambil elemen dengan id 'rating-input'

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const value = star.getAttribute('data-value');
                ratingInput.value = value;

                // Mengatur warna bintang menjadi kuning untuk bintang yang lebih kecil atau sama dengan yang diklik
                stars.forEach(s => {
                    if (s.getAttribute('data-value') <= value) {
                        s.classList.add('text-warning');
                    } else {
                        s.classList.remove('text-warning');
                    }
                });
            });

            // Menambahkan gaya kursor pointer
            star.style.cursor = 'pointer';
        });
    });
</script>
@endsection
