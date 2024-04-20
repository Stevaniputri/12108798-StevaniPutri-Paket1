@extends('layout')
@section('content')
<div class="content">
    <div class="card mb-0">
        <div class="card-body">
            <div class="table-top d-flex justify-content-between">
                <h4 class="card-title">Data Review</h4>
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
                            <th>Person</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataReview as $item)
                            <tr>
                                <td>
                                    <span style="font-size: 16px; font-weight: 600; color: rgba(96, 122, 204, 0.933)">{{ $item->user->fullname }}</span>
                                    <p>{{ $item->user->role }}</p>
                                </td>
                                <td>{{ $item->rating }}</td>
                                <td>{{ $item->review }}</td>
                                <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
</div>   
@endsection