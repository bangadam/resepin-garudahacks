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
                    <div class="col-md-6">
                        <form action="{{route('medication.searchNik')}}" method="GET">
                            <div class="form-group">
                                <label for="">NIK</label>
                                <input type="number" name="nik" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(!empty($_GET['nik']))
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header">
                                <h4>Data Patient</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>:</td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td>:</td>
                                        <td>{{$user->nik}}</td>
                                    </tr>
                                    </tbody>
                                </table>
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
                                    @foreach($user->resep as $item)
                                        <tr>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    @include('layouts.datatables_js')
    <script>
        $('.datatables').DataTable()
    </script>
@endpush
