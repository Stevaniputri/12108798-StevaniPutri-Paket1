@extends('layout')
@section('content')
<div class="content">
    <div class="row">
        {{-- foreach --}}
            <div class="col-lg-3 col-sm-6 d-flex">
                <div class="productset flex-fill" style="box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1); border: 1px solid rgba(236, 236, 236, 0.933); border-radius: 8px">
                    <div class="productsetimg" style="max-height: 300px;">
                        {{-- if else --}}
                        <img src="" alt="img"> 

                        <div class="text-center py-3">No Image</div>   
                    </div>
                    <div class="productsetcontent">
                        <h5></h5>
                        <h4></h4>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <a href="" class="btn btn-success btn-sm me-2"><i class="fas fa-info-circle"></i></a>
                        <form action="" method="POST">
                            <button type="submit" class="btn btn-primary btn-sm me-2"><i class="fas fa-book"></i> <span style="font-size: 12px">Borrow</span></button>
                        </form>
                        {{-- if else --}}
                            <button class="btn btn-secondary btn-sm" disabled><i class="far fa-heart"></i> <span style="font-size: 12px">Collection</span></button>

                            <form action="" method="POST">
                                
                                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-heart"></i> <span style="font-size: 12px">Collection</span></button>
                            </form>
                    </div>                    
                </div>
            </div>
    </div>
</div>
@endsection