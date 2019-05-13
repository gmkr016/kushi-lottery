@extends('user.templates.layout')
@section('content')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            @include('user.templates.topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">@lang('lottery.head.title')</h1>

                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-12 col-md-12 mb-4">

                        <hr class="clearfix">

                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">@lang('lottery.instruction', [ 'min' =>
                                    $numbers['min'], 'max' => $numbers['max'] ])</h6>
                                <div class="dropdown no-arrow">
                                    {{-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                <form>
                                    <button id="generateBtn" type="button" class="btn btn-primary"
                                        title="@lang('lottery.form.button.generate.title')">
                                        @lang('lottery.form.button.generate.name')</button>

                                    <div id="randomNumbers" class="d-none">
                                        <hr class="clearfix">
                                        <div class="row">
                                            <h3>@lang('lottery.form.title.generated')</h3>
                                        </div>
                                        <div class="d-flex flex-row">
                                            <div class="form-group">
                                                <label
                                                    for="lottery1">@lang('lottery.form.input.firstNumber.label')</label>
                                                <input type="text" class="form-control" id="lottery1" placeholder="@lang('lottery.form.input.firstNumber.placeholder', [
                                          'min' => $numbers['min'],
                                          'max' => $numbers['max']
                                        ])">


                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="lottery2">@lang('lottery.form.input.secondNumber.label')</label>
                                                <input type="text" class="form-control" id="lottery2" placeholder="@lang('lottery.form.input.secondNumber.placeholder', [
                                          'min' => $numbers['min'],
                                          'max' => $numbers['max']
                                        ])">
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="lottery3">@lang('lottery.form.input.thirdNumber.label')</label>
                                                <input type="text" class="form-control" id="lottery3" placeholder="@lang('lottery.form.input.thirdNumber.placeholder', [
                                          'min' => $numbers['min'],
                                          'max' => $numbers['max']
                                        ])">
                                            </div>
                                        </div>
                                        <button id="confirmBtn" type="button" class="btn btn-success"
                                            title="@lang('lottery.form.button.confirm.title')">
                                            @lang('lottery.form.button.confirm.name')</button>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>




            </div>
            <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2019</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
@endsection
