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
                            <h6 class="m-0 font-weight-bold text-primary">Add Lottery Category</h6>
                        </div>

                        <div class="card-body">
                            {{--
                                title
                                image
                                draw_date
                                lott_count
                            --}}
                            <form method="POST" action="{{route('admin.categories.store')}}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputTitle">Category Title</label>
                                    <input type="text" class="form-control" id="exampleInputTitle"
                                        aria-describedby="titleHelp" placeholder="Enter Title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDrawDate">Lottery Draw Date</label>
                                    <input type="datetime-local" class="form-control" id="exampleInputDrawDate"
                                        name="draw_date">
                                    <small id="draw_dateHelp" class="form-text text-muted">when will be the draw</small>
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
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
@endsection
