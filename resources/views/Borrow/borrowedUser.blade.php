@extends('layout')
@section('content')
<div class="content">
    <div class="card mb-0">
        <div class="card-body">
            <div class="table-top d-flex justify-content-between">
                <h4 class="card-title">Book List</h4>
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
                            <th>Peminjam</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>
                                    <span style="font-size: 16px; font-weight: 600; color: rgba(96, 122, 204, 0.933)"></span>
                                    <p></p>
                                </td>
                                <td><a href=""><span style="font-size: 16px; font-weight: 600; color: rgba(96, 122, 204, 0.933)"></span></a></td>
                                <td></td>
                                <td></td>
                                <td>
                                    {{-- if else status buku --}}
                                        <span class="badge bg-danger text-dark">Borrowed</span>
                                    
                                        <span class="badge bg-success">Available</span>
                                    
                                </td>
                                <td>
                                    {{-- if else status buku --}}
                                    <form action="" method="POST">

                                        <button type="submit" class="btn btn-sm btn-primary" style="font-size: 12px">
                                            <i class="fa fa-share"></i> Return
                                        </button>
                                    </form>  
                                    {{-- else --}}
                                        <span class="badge bg-success">Returned</span>
                                    
                                </td>
                            </tr>
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
</div>   
@endsection