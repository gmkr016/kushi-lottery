@extends('admin.templates.layout')
@section('content')
<script src="https://unpkg.com/browse/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
    window.onload = function () {
                var fdata;
                fetch("http://192.168.11.181:8000/api/provincewisesale") // Call the fetch function passing the url of the API as a parameter
                    .then( response => response.json() )
                    .then(json => {
                        var datas = {
                            "data": json
                        };
                    var dataPoints=[];

                    for(var i=0;i<datas.data.length;i++){ 
                        dataPoints.push({label:datas.data[i].province,y:datas.data[i].ticketCount}); } 
                        var chart=new CanvasJS.Chart("chartContainer", 
                        { 
                            animationEnabled: true, 
                            theme: "light2" , 
                            zoomEnabled: true, 
                            title:{
                                    text: "Lottery ticket sales of Province of last draw" }, 
                                    data: [ 
                                            { 
                                                type: "column" , 
                                                dataPoints:dataPoints ,
                                                indexLabel:"Ticket Sold: {y}",
                                            } 
                                            ] 
                        });
                        chart.render();
                        })
                        .catch(function(error) {
                        // This is where you run code if the server returns any errors
                        console.log(error)
                        });
	
}
</script>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
@endsection