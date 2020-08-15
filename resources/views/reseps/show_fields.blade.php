<!-- Id User Pasien Field -->
<div class="form-group">
    {!! Form::label('id_user_pasien', 'Id User Pasien:') !!}
    <p>{{ $resep->id_user_pasien }}</p>
</div>

<!-- Id User Dokter Field -->
<div class="form-group">
    {!! Form::label('id_user_dokter', 'Id User Dokter:') !!}
    <p>{{ $resep->id_user_dokter }}</p>
</div>

<!-- Id User Apoteker Field -->
<div class="form-group">
    {!! Form::label('id_user_apoteker', 'Id User Apoteker:') !!}
    <p>{{ $resep->id_user_apoteker }}</p>
</div>

<!-- Tanggal Resep Field -->
<div class="form-group">
    {!! Form::label('tanggal_resep', 'Tanggal Resep:') !!}
    <p>{{ $resep->tanggal_resep }}</p>
</div>

<!-- Tanggal Tebus Field -->
<div class="form-group">
    {!! Form::label('tanggal_tebus', 'Tanggal Tebus:') !!}
    <p>{{ $resep->tanggal_tebus }}</p>
</div>

<!-- Diagnosa Field -->
<div class="form-group">
    {!! Form::label('diagnosa', 'Diagnosa:') !!}
    <p>{{ $resep->diagnosa }}</p>
</div>

