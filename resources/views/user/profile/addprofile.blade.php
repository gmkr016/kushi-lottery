@php
use \App\Http\Controllers\Admin\LotteryCategoryController;
@endphp
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
            {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">@lang('lottery.head.title_list')</h1>

            </div> --}}

            <!-- Content Row -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">@lang('lottery.profilepage.addtitle')</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data"
                        class="mt-3">
                        @csrf
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control" placeholder="Enter your Address"
                                name="address">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control" placeholder="Enter your Phone number"
                                name="phone">
                        </div>
                        <div class="form-group">
                            <label for="dob">DOB</label>
                            <input type="date" id="dob" class="form-control" placeholder="Enter your Date of birth"
                                name="dob">
                        </div>
                        <div class="custom-file mb-4 mt-4">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-info" name="submit">
                        </div>
                    </form>

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
