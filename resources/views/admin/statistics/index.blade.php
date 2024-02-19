@extends('admin.templates.layout')
@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('admin.templates.top-nav')
            <div class="container-fluid">

                <div class="card shadow mb-4">
                    <div class="card-header py-3 ">
                        <div class="row align-items-center">
                            <div class="col-6 ">
                                <h6 class="m-0 font-weight-bold text-primary">List {{$label ?? ''}}</h6>
                            </div>
                            <div class="col-6">
                                <p class="float-right">
                                    Gross Sale: {{$grossSale}}
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        @session('success')
                        <div class="text-white font-weight-bold p-2 bg-gradient-success mb-2">{{$value}}</div>
                        @endsession
                        @session('errors')
                        <div class="text-white font-weight-bold p-2 bg-gradient-danger mb-2">
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </div>
                        @endsession

                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                           cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                           style="width: 100%;">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Title
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Draw Date
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Tickets
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Lottery Numbers
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Gross Sales (NPR)
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <form id="filter" action="{{route("admin.statistics.listGames")}}">
                                            <div class="row my-2">
                                                <div class="col">
                                                    <input name="from" class="form-control" type="date" value="{{$from}}">
                                                </div>
                                                <div class="col">
                                                    <input name="to" class="form-control" type="date" value="{{$to}}">
                                                </div>
                                                <div class="col">
                                                    <select class="custom-select" name="orderByColumn" id="orderByColumn">
                                                        <option @selected($orderByColumn == 'title') value="title">Title</option>
                                                        <option @selected($orderByColumn == 'drawDate') value="drawDate">Draw Date</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <select class="custom-select" name="orderByDirection" id="orderByDirection">
                                                        <option @selected($orderByDirection == 'asc') value="asc">Ascending</option>
                                                        <option @selected($orderByDirection == 'desc') value="desc">Descending</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-info">Filter</button>
                                                </div>
                                            </div>
                                        </form>
                                        @if (count($games) )
                                            @foreach ($games as $item)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1" style="vertical-align:middle">
                                                        {{ ucfirst($item->title) }}
                                                    </td>
                                                    <td class="sorting_1" style="vertical-align:middle">
                                                        {{ $item->drawDate?->format('Y-m-d') }}
                                                    </td>
                                                    <td class="sorting_1" style="vertical-align:middle">
                                                        {{ $item->tickets_count }}
                                                    </td>
                                                    {{-- how many total lotteries submitted from users --}}
                                                    <td class="sorting_1" style="vertical-align:middle">
                                                        {{ $item->lottery_numbers_count }}
                                                    </td>
                                                    <td>
                                                        {{$item->lottery_numbers_count * config('lottery.ticketPrice', 100)}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr role="row" class="odd">
                                                <td rowspan="4" class="sorting_1">No data to fetch</td>
                                            </tr>
                                        @endif

                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Title</th>
                                            <th rowspan="1" colspan="1">Draw Date</th>
                                            <th rowspan="1" colspan="1">Tickets</th>
                                            <th rowspan="1" colspan="1">Lottery Numbers</th>
                                            <th rowspan="1" colspan="1">Gross Sale (NPR)</th>
                                            {{--                                            <th rowspan="1" colspan="1">Action</th>--}}
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    {{$games->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

@endsection
