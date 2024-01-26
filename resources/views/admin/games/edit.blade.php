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
                                <h6 class="m-0 font-weight-bold text-primary">Edit Game</h6>
                            </div>

                            <div class="card-body">
                                {{--
                                    title
                                    image
                                    draw_date
                                    lott_count
                                --}}
                                <form method="POST" action="{{route('admin.games.update',$game->id)}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-6">
                                            @include('common-form-group',
                                                 [
                                                   'id' => 'title',
                                                   'type' => 'text',
                                                   'value' => $game->title
                                                 ]
                                            )
                                        </div>
                                        <div class="col-6">
                                            @include('common-form-group',
                                                  [
                                                    'id' => 'prizeMoney',
                                                    'type' => 'number',
                                                    'value' => $game->prizeMoney
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
                                                     'helpText' => 'when will game start',
                                                    'value' => $game->startDate
                                                 ]
                                            )
                                        </div>
                                        <div class="col-4">
                                            @include('common-form-group',
                                                [
                                                    'id' => 'endDate',
                                                    'type' => 'datetime-local',
                                                    'helpText' => 'when will game end',
                                                    'value' => $game->endDate
                                                ]
                                            )
                                        </div>
                                        <div class="col-4">
                                            @include('common-form-group',
                                                [
                                                    'id' => 'drawDate',
                                                    'type' => 'datetime-local',
                                                    'helpText' => 'when will be the draw',
                                                    'value' => $game->drawDate
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
