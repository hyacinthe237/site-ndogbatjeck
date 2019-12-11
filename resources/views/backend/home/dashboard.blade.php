@extends('backend.layouts.master')


@section('head')
    <title>Dashboard</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Dashboard <i class="ion-speedometer"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="" class="btn btn-grey btn-md bold">
                            <i class="ion-edit"></i> Editer
                        </a>

                        <a href="" class="btn btn-primary btn-md">
                            <i class="ion-plus"></i> Ajouter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="dashboard">
        <div class="container-fluid">
            <div class="cards row">
                <div class="col-sm-3">
                    <div class="card blue">
                        <h3>{{$post}}</h3>
                        <h5>Articles</h5>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card purple">
                        <h3>{{$projectsubmission}}</h3>
                        <h5>Boukarians</h5>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card grey">
                        <h3>{{$project}}</h3>
                        <h5>Projets</h5>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card dark">
                        <h3>{{$activity}}</h3>
                        <h5>Activités</h5>
                    </div>
                </div>
            </div>



            <div class="mt-60">
                <canvas id="canvas"></canvas>
            </div>
        </div>
    </section>
@endsection





@section('js')
<script>
$(document).ready(function () {
    window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)'
    };

    var config = {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
				datasets: [{
					label: 'All',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [
						28,
						43,
						33,
						77,
						39,
						44,
						38
					],
					fill: true,
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Visits'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
})
</script>
@endsection
