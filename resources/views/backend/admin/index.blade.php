@extends('layouts.backend_layout')

@section('content')

@php

$months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
$month_wise_income = array();

for ($i = 0; $i < 12; $i++) {
    $first_day_of_month = date("Y")."-".($i+1)."-"."1".' 00:00:00';
    $last_day_of_month = date("Y")."-".($i+1)."-".cal_days_in_month(CAL_GREGORIAN, $i+1, date("Y")).' 00:00:00';
    $total_amount = App\PackagePurchasedHistory::where([
        ['purchase_date','>=',$first_day_of_month],['purchase_date','<=',$last_day_of_month]])->sum('amount_paid');
    $total_amount > 0 ? array_push($month_wise_income, $total_amount) : array_push($month_wise_income, 0);
}
    
@endphp

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary " data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-calendar"></i>
                    Income Overview This Year{{ '('.currency_code_and_symbol('code').')' }}
                </div>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="calendar-env">
                    <div class="calendar-body">
                        <div id="chartdiv"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-primary " data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-calendar"></i>
                    Listing Overview
                </div>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="calendar-env">
                    <div class="calendar-body">
                        <div id="pieChartdiv"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Package Expiration {{' : '.date('F') }}</div>
			</div>

			<table class="table table-bordered table-responsive">
				<tbody>
                    @foreach ($chart_data['expiration_in_this_month'] as $key => $row)
                        @php
                        $user_details = App\User::where('id',$row->user_id)->first();
                        $package_details = App\Package::where('id',$row->package_id)->first();
                        @endphp
                        <tr>
                            <td>
                                <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;">{{ ucwords($package_details->name) }}</a></h5>
                                <span class="text-muted font-13">Package Name</span>
                            </td>
                            <td>
                                <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;">{{ ucwords($user_details->name) }}</a></h5>
                                <small>Email: <span class="text-muted font-13">{{ $user_details->email }}</span></small>
                            </td>
                            <td>
                                <span class="text-muted font-13">Expired On</span> <br/>
                                @if ($chart_data['current_date_time'] > $row->expired_date)
                                    <span class="badge badge-danger-lighten">{{ date('D, d-M-Y', strtotime($row->expired_date)) }}</span>
                                @else
                                    <span class="badge badge-warning-lighten">{{ date('D, d-M-Y', strtotime($row->expired_date)) }}</span>
                                @endif
                            </td>
                            <td>
                                <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;">{{ App\Listing::where([['user_id',$row->id],['status',1]])->count() }}</a></h5>
                                <small><span class="text-muted font-13">Total Number Of Listing</span></small>
                            </td>
                        </tr>
                    @endforeach
                    @if (sizeof($chart_data['expiration_in_this_month']) == 0)
                        <tr>
                            <td colspan="4">
                                <h5 class="font-14 my-1">No Package Found</h5>
                            </td>
                        </tr>
                    @endif
				</tbody>
			</table>
		</div>
    </div>
</div>

@php
    
    $months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
@endphp

<script>
am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    var chart = am4core.create("chartdiv", am4charts.XYChart);

    var data = [];

    chart.data = [
        @for ($i = 0; $i < 12; $i++)
        {
            "month" : "{{ ucfirst($months[$i]) }}",
            "income": "{{ $month_wise_income[$i] }}",
            "lineColor": chart.colors.next()
        },
        @endfor
    ];
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.ticks.template.disabled = true;
    categoryAxis.renderer.line.opacity = 0;
    categoryAxis.renderer.grid.template.disabled = true;
    categoryAxis.renderer.minGridDistance = 40;
    categoryAxis.dataFields.category = "month";
    categoryAxis.startLocation = 0.4;
    categoryAxis.endLocation = 0.6;


    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.tooltip.disabled = true;
    valueAxis.renderer.line.opacity = 0;
    valueAxis.renderer.ticks.template.disabled = true;
    valueAxis.min = 0;

    var lineSeries = chart.series.push(new am4charts.LineSeries());
    lineSeries.dataFields.categoryX = "month";
    lineSeries.dataFields.valueY = "income";
    lineSeries.tooltipText = "income: {valueY.value}";
    lineSeries.fillOpacity = 0.5;
    lineSeries.strokeWidth = 3;
    lineSeries.propertyFields.stroke = "lineColor";
    lineSeries.propertyFields.fill = "lineColor";

    var bullet = lineSeries.bullets.push(new am4charts.CircleBullet());
    bullet.circle.radius = 6;
    bullet.circle.fill = am4core.color("#fff");
    bullet.circle.strokeWidth = 3;

    chart.cursor = new am4charts.XYCursor();
    chart.cursor.behavior = "panX";
    chart.cursor.lineX.opacity = 0;
    chart.cursor.lineY.opacity = 0;

    //chart.scrollbarX = new am4core.Scrollbar();
    //chart.scrollbarX.parent = chart.bottomAxesContainer;

}); // end am4core.ready()
</script>

<!-- Pie Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("pieChartdiv", am4charts.PieChart);

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";

// Let's cut a hole in our Pie chart the size of 30% the radius
chart.innerRadius = am4core.percent(30);

// Put a thick white border around each Slice
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.slices.template
  // change the cursor on hover to make it apparent the object can be interacted with
  .cursorOverStyle = [
    {
      "property": "cursor",
      "value": "pointer"
    }
  ];

pieSeries.alignLabels = false;
pieSeries.labels.template.bent = true;
pieSeries.labels.template.radius = 3;
pieSeries.labels.template.padding(0,0,0,0);

pieSeries.ticks.template.disabled = true;

// Create a base filter effect (as if it's not there) for the hover to return to
var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
shadow.opacity = 0;

// Create hover state
var hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists

// Slightly shift the shadow and make it more prominent on hover
var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
hoverShadow.opacity = 0.7;
hoverShadow.blur = 5;

// Add a legend
chart.legend = new am4charts.Legend();

chart.data = [{
  "country": "{{ 'Active Listing' }}",
  "litres": "5"
},{
  "country": "{{ 'Pending Listing' }}",
  "litres": "5"
}];

}); // end am4core.ready()
</script>

@stop