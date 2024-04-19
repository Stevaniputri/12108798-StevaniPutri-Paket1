@extends('layout')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h2>User List</h2>
            <h6>Manage your Users</h6>
        </div>
        <div class="page-btn">
            <a href="" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img">Add User</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                alt="img"></a>
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                    src="assets/img/icons/pdf.svg" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                    src="assets/img/icons/excel.svg" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                    src="assets/img/icons/printer.svg" alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{-- php badgeColor --}}
                                <span class="badge bg-badgeColor"></span>
                            </td>
                            <td class="d-flex align-items-center">
                                <a href="">
                                    <i class="fas fa-edit fa-lg" style="color: orange;"></i>
                                </a>
                                <form id="deleteForm_itemId" method="POST" action="">
                                    <button type="button" class="btn" onclick="confirmDelete(itemId)">
                                        <i class="fas fa-trash-alt fa-lg" style="color: red;"></i>
                                    </button>
                                </form>                                
                            </td>
                        </tr>   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>   
<script>
    // Fungsi untuk menampilkan alert sebelum menghapus data
    function confirmDelete(id) {
        // Tampilkan pesan konfirmasi
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            // Jika user menekan tombol OK, submit form penghapusan
            document.getElementById('deleteForm_' + id).submit();
        }
    }
</script>
@endsection