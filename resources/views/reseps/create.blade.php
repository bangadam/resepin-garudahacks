@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Resep
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <form action="{{route('reseps.store', Route::current()->parameter('id_pasien'))}}" method="POST">
            @csrf
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="page-header">
                                <h4>Isi resep</h4>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal resep</label>
                                <input type="date" name="tanggal_resep" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Diagnosa</label>
                                <textarea name="diagnosa" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header">
                                <h4>Detail Resep</h4>
                                <a class="btn btn-primary" data-toggle="modal" href="#modal-id"><i class="fa
                            fa-plus"></i> Add detail resep</a>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nama obat</th>
                                        <th>Kuantitas</th>
                                        <th>Satuan</th>
                                        <th>Periode</th>
                                        <th>Dalam sehari</th>
                                        <th>Dalam sekali</th>
                                        <th>Boleh berulang ?</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table_detail_resep">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">Save All</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">Add new detail resep</h4>
                </div>
                <div class="modal-body">
                    <form id="modalDetailResep">
                        <div class="form-group">
                            <label for="">Pilih obat</label>
                            <select name="id_obat" id="id_obat" class="form-control select2"
                                    style="width:100% !important">
                                @foreach($obat as $item)
                                    <option value="{{$item->id}}"
                                            data-nama_obat="{{$item->nama}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kuantitas</label>
                            <input type="number" name="kuantitas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Satuan</label>
                            <input type="text" name="satuan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Periode</label>
                            <input type="number" name="periode" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Dalam sehari</label>
                            <input type="number" name="dalam_sehari" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Dalam sekali</label>
                            <input type="number" name="dalam_sekali" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Boleh berulang</label>
                            <select name="boleh_berulang" class="form-control">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@push('scripts')
    <script>
        $('#id_obat').select2();
        $('#modalDetailResep').on('submit', function (e) {
            e.preventDefault()
            let data = $(this).serializeArray()
            let nama_obat = $("#id_obat").find(':selected').text()
            // console.log(data, nama_obat)
            let row = '<tr>' +
                '<td>' +
                nama_obat
                + '<input type="hidden" name="id_obat[]" value="' + data[0].value + '"></td>' +
                '<td>' + data[1].value + '<input type="hidden" name="kuantitas[]" value="' + data[1]
                    .value + '"></td>' +
                '<td>' + data[2].value + '<input type="hidden" name="satuan[]" value="' + data[2].value + '"</td>' +
                '<td>' + data[3].value + '<input type="hidden" name="periode[]" value="' + data[3].value + '"</td>' +
                '<td>' + data[4].value + '<input type="hidden" name="dalam_sehari[]" value="' + data[4]
                    .value + '"</td>' +
                '<td>' + data[5].value + '<input type="hidden" name="dalam_sekali[]" value="' + data[5]
                    .value + '"</td>' +
                '<td>' + (data[6].value == 1 ? "Iya" : "Tidak") + '<input type="hidden" name="boleh_berulang[]" ' +
                'value="' +
                data[6]
                    .value + '"</td>' +
                '</tr>';

            $('#table_detail_resep').append(row)
            $('#modal-id').modal('hide')
            $(this)[0].reset()
        })
    </script>
@endpush
