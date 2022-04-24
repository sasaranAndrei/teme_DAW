<!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'Bookings',
            data: [1, 2, 3, 4]
        }],
        xaxis: {
            categories: ['1', '2', '3', '4']
        }
    }

    try {
        var chart = new ApexCharts(document.querySelector('#chart'), options);
        chart.render();
    } catch(e) {
        console.log(e);
    }
    
</script> -->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    window.onload = function() {
        var userData = <?php echo json_encode($userData)?>;
        Highcharts.chart('chart-container', {
            title: {
                text: 'Bookings'
            },
            subtitle: {
                text: 'Source: sosysosa99.com'
            },
            xAxis: {
                categories: ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ]
            },
            yAxis: {
                title: {
                    text: 'Bookings'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Bookings',
                data: userData
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });    
    }
    
</script>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Real Estate') }}
            </h2>
        </x-slot>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('real_estates.index') }}"> Back</a>
        </div>
        <br/>
        <div>
            <h3>Property type</h3>
            <h4> {{ $real_estate->property_type }}
            <br/>
            <br/>
            <h3>Address</h3>
            <h4> {{ $real_estate->address }}
            <br/>
            <br/>
            <h3>Area</h3>
            <h4> {{ $real_estate->area }}
            <br/>
            <br/>
            <h3>Floor</h3>
            <h4> {{ $real_estate->floor }}
            <br/>
            <br/>
        </div>

        @if (auth()->user()->isAdmin())
            <div>
                Bookings
                <br>
                <br>
                <br>
                @foreach ($real_estate->bookings as $booking)
                    <div>
                        User: {{ $booking->user->name}}
                        <br>
                        Start date: {{ $booking->event_start }}
                        <br>
                        End date: {{ $booking->event_start }}
                        <br>
                        
                        <br>
                    </div>
                @endforeach

            </div>
            <div>
                <h1>Month Bookings</h1>
                <div id="chart-container"></div>

            </div>
        @endif
    </x-app-layout>
</body>
