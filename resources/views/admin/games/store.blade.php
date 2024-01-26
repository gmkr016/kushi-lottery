@extends('admin.templates.layout')
@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('admin.templates.top-nav')

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Add Lottery Category</h1>

                </div> --}}

                {{-- content row --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Add Game</h6>
                            </div>
                            @if(session()->has('success'))
                                <div>{{session()->get('success')}}</div>
                            @endif
                            <div class="card-body">
                                <form method="POST"
                                      action="{{route('admin.games.store')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            @include('common-form-group',
                                                 [
                                                   'id' => 'title',
                                                   'type' => 'text',
                                                 ]
                                            )
                                        </div>
                                        <div class="col-6">
                                            @include('common-form-group',
                                                  [
                                                    'id' => 'prizeMoney',
                                                    'type' => 'number',
                                                  ]
                                            )
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            @include('common-form-group',
                                                 [
                                                     'id' => 'startDate',
                                                     'type' => 'datetime-local',
                                                     'helpText' => 'when will game start'
                                                 ]
                                            )
                                        </div>
                                        <div class="col-4">
                                            @include('common-form-group',
                                                [
                                                    'id' => 'endDate',
                                                    'type' => 'datetime-local',
                                                    'helpText' => 'when will game end'
                                                ]
                                            )
                                        </div>
                                        <div class="col-4">
                                            @include('common-form-group',
                                                [
                                                    'id' => 'drawDate',
                                                    'type' => 'datetime-local',
                                                    'helpText' => 'when will be the draw'
                                                ]
                                            )
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.querySelectorAll("input[type=datetime-local]").forEach(el => {
            el.min = (new Date()).toLocaleString("EN-CA").slice(0, 10) + "T00:00"
        })
    </script>
@endpush
