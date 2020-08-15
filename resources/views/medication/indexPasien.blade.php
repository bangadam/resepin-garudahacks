@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Medication details</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header">
                                <h4>Data Prescription</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover datatables">
                                    <thead>
                                    <tr>
                                        <th>Tanggal resep</th>
                                        <th>Tanggal tebus</th>
                                        <th>Diagnosa</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pasien->resep as $item)
                                        <tr>
                                            <td>{{$item->tanggal_resep->format('d-m-Y')}}</td>
                                            <td>
                                                @if(empty($item->tanggal_tebus))
                                                    <span class="btn btn-xs btn-danger">Belum ditebus</span>
                                                @else
                                                    {{$item->tanggal_tebus->format
                                            ('d-m-Y')}}
                                                @endif
                                            </td>
                                            <td>{{$item->diagnosa}}</td>
                                            <td>
                                                <a class="btn btn-info btn-xs btn-detail_resep"
                                                   data-id_resep="{{$item->id}}"
                                                   data-toggle="modal"
                                                   href="#modal-id"><i class="fa fa-eye"></i> Detail Resep</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="modal-id">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title">Detail resep</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                            <tr>
                                <th>Nama obat</th>
                                <th>Kuantitas</th>
                                <th>Satuan</th>
                                <th>Periode</th>
                                <th>Dalam sehari</th>
                                <th>Dalam sekali</th>
                                <th>Boleh berulang ?</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody id="table_detail_resep">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@push('scripts')
    @include('layouts.datatables_js')
    <script>
        $('.datatables').DataTable()

        $('.btn-detail_resep').on('click', function () {
            $('#table_detail_resep').empty()
            let id_resep = $(this).data('id_resep')
            $.ajax({
                url: '/pasien/resep/' + id_resep,
                method: 'GET',
                success: function (data) {
                    console.log(data)
                    let row = ''
                    for (let i = 0; i < data.length; i++) {
                        row += '<tr>' +
                            '<td>' +
                            data[i].obat.nama
                            + '</td>' +
                            '<td>' + data[i].kuantitas + '</td>' +
                            '<td>' + data[i].satuan + '</td>' +
                            '<td>' + data[i].periode + '</td>' +
                            '<td>' + data[i].dalam_sehari + '</td>' +
                            '<td>' + data[i].dalam_sekali + '</td>' +
                            '<td>' + (data[i].boleh_berulang == 1 ? "Iya" : "Tidak") + '</td>' +
                            '</tr>';
                    }

                    $('#table_detail_resep').append(row)
                }
            })
        })
    </script>
@endpush
