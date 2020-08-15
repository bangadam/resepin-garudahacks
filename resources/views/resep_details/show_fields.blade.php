<!-- Id Resep Field -->
<div class="form-group">
    {!! Form::label('id_resep', 'Id Resep:') !!}
    <p>{{ $resepDetail->id_resep }}</p>
</div>

<!-- Id Obat Field -->
<div class="form-group">
    {!! Form::label('id_obat', 'Id Obat:') !!}
    <p>{{ $resepDetail->id_obat }}</p>
</div>

<!-- Kuantitas Field -->
<div class="form-group">
    {!! Form::label('kuantitas', 'Kuantitas:') !!}
    <p>{{ $resepDetail->kuantitas }}</p>
</div>

<!-- Satuan Field -->
<div class="form-group">
    {!! Form::label('satuan', 'Satuan:') !!}
    <p>{{ $resepDetail->satuan }}</p>
</div>

<!-- Periode Field -->
<div class="form-group">
    {!! Form::label('periode', 'Periode:') !!}
    <p>{{ $resepDetail->periode }}</p>
</div>

<!-- Dalam Sehari Field -->
<div class="form-group">
    {!! Form::label('dalam_sehari', 'Dalam Sehari:') !!}
    <p>{{ $resepDetail->dalam_sehari }}</p>
</div>

<!-- Dalam Sekali Field -->
<div class="form-group">
    {!! Form::label('dalam_sekali', 'Dalam Sekali:') !!}
    <p>{{ $resepDetail->dalam_sekali }}</p>
</div>

<!-- Boleh Berulang Field -->
<div class="form-group">
    {!! Form::label('boleh_berulang', 'Boleh Berulang:') !!}
    <p>{{ $resepDetail->boleh_berulang }}</p>
</div>

