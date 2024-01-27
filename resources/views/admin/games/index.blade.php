@php
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
                    <div class="card-header py-3 ">
                        <div class="row align-items-center">
                            <div class="col-6 ">
                                <h6 class="m-0 font-weight-bold text-primary">List Games</h6>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('admin.games.create') }}" class="btn btn-info mb-2  float-right">Create
                                    Game</a>
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
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                           cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                           style="width: 100%;">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%"> Title
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Draw Date
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Total Lottery Numbers Choosen
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Action
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @if (count($lists) )

                                            @foreach ($lists as $item)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1" style="vertical-align:middle">
                                                        {{ ucfirst($item->title) }}
                                                    </td>
                                                    <td class="sorting_1" style="vertical-align:middle">
                                                        {{ date('Y-m-d H:i:s', $item->draw_date) }}
                                                    </td>
                                                    {{-- how many total lotteries submitted from users --}}
                                                    <td class="sorting_1" style="vertical-align:middle">
                                                        {{ $item->lottery_numbers_count }}
                                                    </td>
                                                    <td class="sorting_1" style="vertical-align:middle">
                                                        <a class="btn btn-primary"
                                                           href="{{ route("admin.games.edit",$item->id) }}">Edit</a>
                                                        <a href="javascript:void()" class="btn btn-danger"
                                                           onclick="event.preventDefault();document.querySelector('#item{{$item->id}}-delete').submit();">Delete</a>
                                                        <form method='POST' id="item{{$item->id}}-delete"
                                                              action='{{ route("admin.games.destroy",$item->id) }}'>
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                        </form>

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
                                            <th rowspan="1" colspan="1">Total Lottery Numbers Choosen</th>
                                            <th rowspan="1" colspan="1">Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    {{$lists->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

@endsection
