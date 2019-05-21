@extends('user.templates.layout')
@section('content')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">


        <!-- Topbar Navbar -->
        @include('user.templates.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">@lang('lottery.head.title_list')</h1>

            </div>

            <!-- Content Row -->
            <div class="card-body">
                <a href="#" class="btn btn-info mb-2">Add+</a>
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="10%">Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="70%">Generated Numbers</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (count($lists) )

                                        @foreach ($lists as $item)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1" style="vertical-align:middle">{{ $item->cat_id }}
                                            </td>

                                            <td class="sorting_1" style="vertical-align:middle">
                                                {{ $item->first_number.' '.$item->second_number.' '.$item->third_number.' '.$item->fourth_number.' '.$item->fifth_number.' '.$item->sixth_number }}
                                            </td>
                                            <td class="sorting_1" style="vertical-align:middle">
                                                <a href="javascript:void()" class="btn btn-danger"
                                                    onclick="event.preventDefault();document.querySelector('#item-delete').submit();">Delete</a>
                                                <form method='POST' id="item-delete"
                                                    action='{{ url("admin/categories/$item->id") }}'>
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>

                                            </td>
                                        </tr> @endforeach @else <tr role="row" class="odd">
                                            <td rowspan="4" class="sorting_1">No data to fetch</td>
                                        </tr>
                                        @endif

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Category</th>
                                            <th rowspan="1" colspan="1">Generated Numbers</th>
                                            <th rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                    Showing 1 to 10 of {{ count($lists) }} entries</div>

                                {{ $lists->links() }}
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                                class="page-link">Previous</a></li>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- content end --}}



        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    @include('user.templates.footer')
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
@endsection
