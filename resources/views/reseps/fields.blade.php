<!-- Id User Pasien Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user_pasien', 'Id User Pasien:') !!}
    {!! Form::number('id_user_pasien', null, ['class' => 'form-control']) !!}
</div>

<!-- Id User Dokter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user_dokter', 'Id User Dokter:') !!}
    {!! Form::number('id_user_dokter', null, ['class' => 'form-control']) !!}
</div>

<!-- Id User Apoteker Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user_apoteker', 'Id User Apoteker:') !!}
    {!! Form::number('id_user_apoteker', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Resep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_resep', 'Tanggal Resep:') !!}
    {!! Form::text('tanggal_resep', null, ['class' => 'form-control','id'=>'tanggal_resep']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#tanggal_resep').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tanggal Tebus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_tebus', 'Tanggal Tebus:') !!}
    {!! Form::text('tanggal_tebus', null, ['class' => 'form-control','id'=>'tanggal_tebus']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#tanggal_tebus').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Diagnosa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diagnosa', 'Diagnosa:') !!}
    {!! Form::text('diagnosa', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('reseps.index') }}" class="btn btn-default">Cancel</a>
</div>
