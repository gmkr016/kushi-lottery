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

        {{-- dynamic --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


        <script type="text/javascript">
            window.onload = function () {
                        var host = "{{$host}}" ;
                        var ctx = document.getElementById('myChart');
                        var barLabels=[];
                        var barData=[];
                        var color=[];
                        fetch("http://"+host+ "/api/provincewisesale") // Call the fetch function passing the url of the API as a parameter
                            .then( response => response.json() )
                            .then(json => {
                                var datas = json;
                                // pusing datas into label and data
                                for(var i=0;i<datas.length;i++){ 
                                    barLabels.push(datas[i].province); 
                                    barData.push(datas[i].ticketCount);
                                    color.push(getRandomColor()); 
                                } 
                                    function getRandomColor(){ 
                                        var letters='0123456789ABCDEF' .split(''); 
                                        var color='#'; 
                                        for(var i=0;i<6;i++){ 
                                            color+=letters[Math.floor(Math.random()*16)]; 
                                        } 
                                        return color; 
                                    } 
                                    // creating chart chart using labels and data 
                                    var chart=new Chart(ctx, { 
                                        // The type of chart we want to create 
                                        type: 'bar' , 
                                        // The data for our dataset 
                                    data: { 
                                        labels: barLabels, 
                                        datasets: [{ 
                                            label: 'Provincewise Ticket Sales ' ,
                                            backgroundColor: color, 
                                            borderColor: 'rgb(255, 150, 132)' , 
                                            fillColor:getRandomColor(), 
                                            data: barData
                                        }] 
                                    }, 
                                    //Configuration options go here 
                                    options: {} 
                                });
                                
                                })
                                .catch(function(error) {
                                // This is where you run code if the server returns any errors
                                console.log(error)
                                }
                                );
                                }   
        </script>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Province wise Ticket Sales</h6>
                </div>
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        {{-- dynamic --}}


    </div>
</div>
@endsection