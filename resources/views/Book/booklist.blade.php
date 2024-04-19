@extends('layout')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h2>Book List</h2>
            <h6>Manage your Books</h6>
        </div>
        <div class="page-btn">
            <a href="" class="btn btn-added"><img src={{asset("assets/img/icons/plus.svg")}} alt="img">Add Book</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src={{asset("assets/img/icons/search-white.svg")}}
                                alt="img"></a>
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                    src={{asset("assets/img/icons/pdf.svg")}} alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                    src={{asset("assets/img/icons/excel.svg")}} alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                    src={{asset("assets/img/icons/printer.svg")}} alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Writer</th>
                            <th>Category</th>
                            <th>Publisher</th>
                            <th>Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>                         
                            <td></td>
                            <td>
                                {{-- if else --}}
                                <img src="images/." alt="Cover" style="max-width: 100px;"> <!-- Tambahkan tag img untuk menampilkan cover -->
                                
                                No Image <!-- Tampilkan pesan jika cover tidak tersedia -->
                                
                            </td>   
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!-- Icon untuk mengedit buku (Ukuran: 2x, Warna: Kuning) -->
                                    <a href="">
                                        <i class="fas fa-edit fa-lg" style="color: orange;"></i>
                                    </a>
                                    
                                    <!-- Form untuk menghapus buku (Ukuran: lg, Warna: Merah) -->
                                    <form id="deleteForm_itemId" method="POST" action="">
                                        <button type="submit" class="btn btn-delete">
                                            <i class="fas fa-trash-alt fa-lg" style="color: red;"></i>
                                        </button>
                                    </form>                  
                                </div>                        
                            </td>                                                                 
                        </tr>   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  
@endsection
