@php
    use \App\Http\Controllers\Admin\GameController;
    use \App\Http\Controllers\Admin\HistoryController;
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
                        <h6 class="m-0 font-weight-bold text-primary">{{ ucfirst(GameController::show($draw_id, 'title'))." Winners" }}</h6>
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
                                                    colspan="1" width="30%">Numbers
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" width="20%">Winning Position
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" width="10%">Winners
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" width="50%">Purchased At
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @if (count($results) )

                                                @foreach ($results as $result)
                                                    <tr role="row" class="odd">


                                                        <td class="sorting_1" style="vertical-align:middle">
                                                            {{ $result->first_number.' '.$result->second_number.' '.$result->third_number.' '.$result->fourth_number.' '.$result->fifth_number.' '.$result->sixth_number }}
                                                        </td>
                                                        <td class="sorting_1" style="vertical-align:middle">
                                                            {{ $result->winnerpos }}
                                                        </td>
                                                        <td class="sorting_1">{{$result->noswinners}} winners !!!</td>
                                                        <td class="sorting_1" style="vertical-align:middle">
                                                            {{ $result->created_at }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr role="row" class="odd">
                                                    <td rowspan="4" class="sorting_1">No data to fetch</td>
                                                </tr>
                                            @endif

                                            </tbody>

                                            <!-- <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Category</th>
                                                    <th rowspan="1" colspan="1">Generated Numbers</th>
                                                    <th rowspan="1" colspan="1">Purchased At</th>

                                                </tr>
                                            </tfoot> -->
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="dataTable_info" role="status"
                                             aria-live="polite">
                                            Showing 1 to 10 of {{ count($results) }} entries
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

@endsection
