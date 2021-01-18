@php
use \App\Http\Controllers\User\LotteryController as LotteryC;
@endphp
@extends('admin.templates.layout')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        @include('admin.templates.top-nav')
        <div class="container-fluid">

            <!-- Page Heading -->
            {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">List Lottery Categories</h1>

            </div> --}}

            {{-- Content row --}}

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List Lottery Draws</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                        cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" width="20%"> Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" width="20%">Image</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" width="20%">Draw Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" width="20%">Estimate Prize Money</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (count($lists) )

                                            @foreach ($lists as $item)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1" style="vertical-align:middle">
                                                    <a href='{{ route("admin.dwr", ["draw_id"=> $item->id]) }}' title="See Winners">
                                                    {{ ucfirst($item->title) }}
                                                    </a>
                                                </td>
                                                <td class="sorting_1" style="vertical-align:middle">
                                                    <img src='{{ asset("storage/lottery_cat/$item->image") }}' alt='{{$item->title}}' style='width:100px'>
                                                </td>
                                                <td class="sorting_1" style="vertical-align:middle">
                                                    {{ date('Y-m-d H:i:s', $item->draw_date) }}
                                                </td>
                                                {{-- how many total lotteries submitted from users --}}
                                                <td class="sorting_1" style="vertical-align:middle">
                                                    @convert($item->estprize)
                                                </td>
                                            </tr>
                                            @endforeach @else
                                            <tr role="row" class="odd">
                                                <td rowspan="4" class="sorting_1">No data to fetch</td>
                                            </tr>
                                            @endif

                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Title</th>
                                                <th rowspan="1" colspan="1">Image</th>
                                                <th rowspan="1" colspan="1">Draw Date</th>
                                                <th rowspan="1" colspan="1">Total Lottery Numbers Choosen</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"
                                        role="status" aria-live="polite">
                                        Showing 1 to 10 of {{ count($lists) }} entries</div>

                                    {{ $lists->links() }}
                                </div>
                                {{-- <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="dataTable_previous"><a href="#" aria-controls="dataTable"
                                                    data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                    aria-controls="dataTable" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                    data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                    data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                    data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                    data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                    data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                            <li class="paginate_button page-item next" id="dataTable_next"><a href="#"
                                                    aria-controls="dataTable" data-dt-idx="7" tabindex="0"
                                                    class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

@endsection
