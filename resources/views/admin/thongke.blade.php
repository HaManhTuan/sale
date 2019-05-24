@extends('admin-layout')
@section('content')
<div class="container">
		<div class="row">
				<div class="col-md-12">
					<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
						<div class="d-flex">
							<div class="breadcrumb">
								<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
								<span class="breadcrumb-item active">Đơn hàng</span>
							</div>
							<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
						</div>
				  </div>
				</div>
   </div>
   <div class="col-md-12">
	 	 <div id="container" data-order="{{ $tk_tien_1thang }}"></div>
	<script>
$(document).ready(function(){
    var order = $('#container').data('order');
    var listOfValue = [];
    var listOfYear = [];
    order.forEach(function(element){
        listOfYear.push(element.getYear);
        listOfValue.push(element.value);
    });
    console.log(listOfValue);
    var chart = Highcharts.chart('container', {

        title: {
            text: 'Thống kê tiền tháng này'
        },

        subtitle: {
            text: ''
        },

        xAxis: {
            categories: listOfYear,
        },

        series: [{
            type: 'column',
            colorByPoint: true,
            data: listOfValue,
            showInLegend: false
        }]
    });
    
    $('#plain').click(function () {
        chart.update({
            chart: {
                inverted: true,
                polar: true
            },
            subtitle: {
                text: 'Plain'
            }
        });
    });

    $('#inverted').click(function () {
        chart.update({
            chart: {
                inverted: true,
                polar: false
            },
            subtitle: {
                text: 'Inverted'
            }
        });
    });

    $('#polar').click(function () {
        chart.update({
            chart: {
                inverted: false,
                polar: true
            },
            subtitle: {
                text: 'Polar'
            }
        });
    });
});
	</script>
</div>

</div>
@endsection