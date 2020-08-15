@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pasien ID : {{$pasien->id}}
        </h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('flash::message')
                @include('adminlte-templates::common.errors')
            </div>
            <div class="col-md-12" style="margin-bottom: 10px">
                <a href="{{ route('pasiens.index') }}" class="btn btn-default">Back</a>
            </div>

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <form action="{{route('pasiens.update', $pasien->id)}}" method="POST">
                                @csrf
                                @method('put')

                                <div class="form-group col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control"
                                           value="{{$pasien->user->name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control"
                                           value="{{$pasien->user->email}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Phone</label>
                                    <input type="number" name="telepon" class="form-control"
                                           value="{{$pasien->user->telepon}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Phone</label>
                                    <input type="text" name="telepon" class="form-control"
                                           value="{{$pasien->user->telepon}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">NIK</label>
                                    <input type="number" name="nik" class="form-control"
                                           value="{{$pasien->user->nik}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">DOB</label>
                                    <input type="date" name="dob" class="form-control"
                                           value="{{$pasien->dob->format('Y-m-d')}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Address</label>
                                    <textarea name="alamat" rows="5" class="form-control">
                                    {{$pasien->user->alamat}}
                                </textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header">
                                    <h3>Resep</h3>
                                </div>
                                <ul class="list-inline">
                                    <li>
                                        <a href="{{route('reseps.create', $pasien->id)}}" class="btn btn-primary"><i
                                                class="fa
                                        fa-plus"></i>
                                            Create</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-inverse">
                                    <tr>
                                        <th>Tanggal resep</th>
                                        <th>Tanggal tebus</th>
                                        <th>Diagnosa</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($pasien->resep as $item)
                                        <tr>
                                            <td>{{$item->tanggal_resep->format('d-m-Y')}}</td>
                                            <td>{{empty($item->tanggal_tebus) ? "Belum ditebus" :
                                            $item->tanggal_tebus->format
                                            ('d-m-Y')}}</td>
                                            <td>{{$item->diagnosa}}</td>
                                            <td>
                                                <a class="btn btn-info btn-detail_resep" data-id_resep="{{$item->id}}"
                                                   data-toggle="modal"
                                                   href="#modal-id">Detail Resep</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">Belum ada resep</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
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
    <script>
        $('.btn-detail_resep').on('click', function () {
            $('#table_detail_resep').empty()
            let id_resep = $(this).data('id_resep')
            $.ajax({
                url: '/dokter/resep/' + id_resep,
                method: 'GET',
                success: function (data) {
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
