<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $apotek->nama }}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $apotek->alamat }}</p>
</div>

<!-- Nomor Izin Field -->
<div class="form-group">
    {!! Form::label('nomor_izin', 'Nomor Izin:') !!}
    <p>{{ $apotek->nomor_izin }}</p>
</div>

