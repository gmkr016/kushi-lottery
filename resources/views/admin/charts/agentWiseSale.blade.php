@extends('admin.templates.layout')
@section('content')
<?php 
$host = $_SERVER['HTTP_HOST'] ;
$devHost = $_SERVER['HTTP_HOST']."/dev/public";
?>
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        @include('admin.templates.top-nav')
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lottery ticket sales of agents of last draw</h6>
                </div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                <script type="text/javascript">
                    window.onload = function () {
                var host = "{{$host}}" ;
                var fdata;
                fetch("http://"+host + "/api/agentwisesale") // Call the fetch function passing the url of the API as a parameter
                    .then( response => response.json() )
                    .then(json => {
                        var datas = {
                            "data": json
                        };
                    var dataPoints=[];

                    for(var i=0;i<datas.data.length;i++){ 
                        dataPoints.push({label:datas.data[i].agent,y:datas.data[i].ticketCount}); } 
                        var chart=new CanvasJS.Chart("chartContainer", 
                        { 
                            animationEnabled: true, 
                            theme: "light2" , 
                            zoomEnabled: true,
                           
                                    data: [ 
                                            { 
                                                type: "column" , 
                                                dataPoints:dataPoints,
                                                indexLabel:"Ticket Sold: {y}",
                                            } 
                                            ] 
                        });
                        chart.render();
                        })
                        .catch(function(error) {
                        // This is where you run code if the server returns any errors
                        console.log(error)
                        }
                        );
                        }   
                </script>
                <div class="card-body">
                    <div id="chartContainer" style="height: 100%; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection