@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Patient</span>
                        <span class="info-box-number">5</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-red"><i class="fa fa-medkit"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Drugs</span>
                        <span class="info-box-number">8</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Medication Prescribed</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="lineChart" style="height: 292px; width: 555px;" height="584"
                                    width="1110"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Drugs Prescribed</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="pieChart" style="height: 292px; width: 555px;" height="584"
                                    width="1110"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Patient and Drugs</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="lineChart2" style="height: 292px; width: 555px;" height="584"
                                    width="1110"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script>
        function lineChart() {

            data = [
                [5, 3, 4, 5],
                [5, 1, 4, 5],
            ];
            labels = [
                '2020-08-14',
                '2020-08-15',
                '2020-08-13',
                '2020-08-12',
            ];
            var ctx = document.getElementById("lineChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Number of patient',
                            data: data[0],
                            borderColor: 'rgba(182, 167, 193, 1)',
                            backgroundColor: 'rgba(182, 167, 193, 0.2)',
                        },
                        {
                            label: 'Number of drugs',
                            data: data[1],
                            borderColor: 'rgba(132, 241, 230, 1)',
                            backgroundColor: 'rgba(132, 241, 230, 0.2)',
                        },
                    ]
                },
            });
        }

        function pieChart() {
            var labels = [
                'Aknil',
                'Anafen',
                'Bufect',
                'Dofen',
                'Fenris',
                'Ibuprofen',
                'Tamaprofen',
                'Yariven',
                'Asimat',
                'Benostan'
            ];
            var data = [
                10,
                20,
                5,
                3,
                30,
                15,
                28,
                25,
                4,
                1,
            ];
            var pie = document.getElementById("pieChart").getContext('2d');
            var myChart = new Chart(pie, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            data: data,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.8)',
                                'rgba(192, 0, 0, 0.8)',
                                'rgba(18, 30, 196,0.8)',
                                'rgba(18, 196, 181, 0.8)',
                                'rgba(196, 184, 18, 0.8)',
                                'rgba(196, 27, 18, 0.8)',
                                'rgba(196, 18, 116, 0.8)',
                                'rgba(63, 18, 196, 0.8)',
                                'rgba(75, 214, 0, 0.8)',
                                'rgba(154, 214, 0, 0.8)'
                            ],
                        }
                    ]
                },
                options: {
                    title: {
                        display: true,
                        text: "Data Prescribed to Patient"
                    }
                }
            });
        }

        function lineChart2() {
            data = [
                [5, 3, 4, 5],
                [5, 1, 4, 5],
            ];
            labels = [
                '2020-08-14',
                '2020-08-15',
                '2020-08-13',
                '2020-08-12',
            ];
            var ctx = document.getElementById("lineChart2").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Number of patient',
                            data: data[0],
                            backgroundColor: 'rgba(0, 111, 214, 0.8)',
                        },
                        {
                            label: 'Number of drugs',
                            data: data[1],
                            backgroundColor: 'rgba(178, 0, 214, 0.8)',
                        },
                    ]
                },
            });
        }

        lineChart();
        lineChart2();
        pieChart();
    </script>
@endpush
