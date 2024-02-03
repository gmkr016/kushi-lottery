@php use Illuminate\Support\Arr; @endphp
@php
        @endphp
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
                                <h6 class="m-0 font-weight-bold text-primary">Tickets sales from {{$user['name']}}</h6>
                            </div>
                            <div class="col-6">
                                {{--                                <a href="#" class="btn btn-info mb-2  float-right">Register new agent</a>--}}
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
                                                colspan="1" width="20%"> Identification Type
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Identification Number
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Sold At
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" width="20%">Lottery Numbers
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @if (count($lists) )

                                            @foreach ($lists as $item)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1" style="vertical-align:middle">
                                                        {{ ucfirst($item['identificationType']->value) }}
                                                    </td>
                                                    <td class="sorting_1" style="vertical-align:middle">
                                                        {{ $item['identificationNumber'] }}
                                                    </td>
                                                    <td class="sorting_1" style="vertical-align:middle">
                                                        {{ $item['soldAt']->format('Y-m-d') }}
                                                    </td>
                                                    <td class="sorting_1" style="vertical-align:middle">
							@foreach($item['numbers'] as $number)
	                                                     {{\Illuminate\Support\Arr::join($number->only(['first', 'second','third', 'fourth', 'fifth', 'sixth']), ',')}}
							</br>
							@endforeach
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
                                            <th rowspan="1" colspan="1">Identification Type</th>
                                            <th rowspan="1" colspan="1">Identification Number</th>
                                            <th rowspan="1">Sold At</th>
                                            <th rowspan="1" colspan="1">Lottery Numbers</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12 col-md-7">--}}
{{--                                    {{$lists->links()}}--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

@endsection
