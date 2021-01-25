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
                <h1 class="h3 mb-0 text-gray-800">Declare Winning Numbers</h1>

            </div> --}}

            {{-- content row --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Declare Winning Numbers</h6>
                        </div>

                        <div class="card-body">
                            {{--
                                title
                                image
                                draw_date
                                lott_count
                            --}}
                            @if($allFutureDraw)
                            <form method="POST" action="{{route('admin.results.store')}}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputTitle">Category Title</label>
                                    <select class="form-control" name="category">
                                    @foreach($allFutureDraw as $fd)
                                        <option value="{{$fd->id}}">{{$fd->title}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="row">

                                <div class="form-group col-2" id="first">
                                    <label for="exampleInputDrawDate">First Numbers</label>
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="1_first">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="1_second">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="1_third">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="1_fourth">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="1_fifth">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="1_sixth">
                                </div>
                                <div class="form-group col-2" id="second">
                                    <label for="exampleInputDrawDate">Second Numbers</label>
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="2_first">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="2_second">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="2_third">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="2_fourth">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="2_fifth">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="2_sixth">
                                </div>
                                <div class="form-group col-2" id="third">
                                    <label for="exampleInputDrawDate">Third Numbers</label>
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="3_first">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="3_second">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="3_third">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="3_fourth">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="3_fifth">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="3_sixth">
                                </div>
                                <div class="form-group col-2" id="fourth">
                                    <label for="exampleInputDrawDate">Fourth Numbers</label>
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="4_first">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="4_second">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="4_third">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="4_fourth">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="4_fifth">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="4_sixth">
                                </div>
                                <div class="form-group col-2" id="fifth">
                                    <label for="exampleInputDrawDate">Fifth Numbers</label>
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="5_first">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="5_second">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="5_third">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="5_fourth">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="5_fifth">
                                    <input type="text" class="form-control col-6" id="exampleInputDrawDate"
                                        name="5_sixth">

                                </div>

                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                aria-describedby="inputGroupFileAddon01" name="image">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose category
                                                image</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info" name="submit" value="Submit" />
                            </form>

                            @else
                                <h2>First Create Draws</h2>
                            @endif
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
@endsection
