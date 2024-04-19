@extends('layout')
@section('content')
<div class="content">
    <div class="card mb-0">
        <div class="card-body">
            <div class="table-top d-flex justify-content-between">
                <h4 class="card-title">Collection List</h4>
                <div class="search-set">
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src={{asset("assets/img/icons/search-white.svg")}}
                                alt="img"></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table datanew ">
                    <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Writer</th>
                            <th>Publisher</th>
                            <th>Publication Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="">
                                    <span style="font-weight: 600; color: rgb(89, 128, 211)">
                                        {{-- if else --}}
                                        Book not Available
                                    </span>
                                    <p>
                                        {{-- if dalam if category --}}
                                    </p>
                                </div>
                            </td>
                            <td>
                                {{-- if relasi ke book --}}
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="d-flex justify-content-start">
                                    <form action="" method="POST">
                                        <button type="submit" class="btn btn-danger btn-sm me-2"><i class="fas fa-trash"></i></button>
                                    </form>
                                    {{-- if relasi ke borrow ambil user id dan status buku --}}
                                    <span class="badge bg-danger d-flex align-center">Borrowed</span>

                                        <form action="" method="POST">
                                            <button type="submit" class="btn btn-success btn-sm me-2"><i class="fas fa-book"></i> Borrow</button>
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
