<!-- Id Resep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_resep', 'Id Resep:') !!}
    {!! Form::number('id_resep', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Obat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_obat', 'Id Obat:') !!}
    {!! Form::number('id_obat', null, ['class' => 'form-control']) !!}
</div>

<!-- Kuantitas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kuantitas', 'Kuantitas:') !!}
    {!! Form::number('kuantitas', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('satuan', 'Satuan:') !!}
    {!! Form::text('satuan', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Periode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periode', 'Periode:') !!}
    {!! Form::number('periode', null, ['class' => 'form-control']) !!}
</div>

<!-- Dalam Sehari Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dalam_sehari', 'Dalam Sehari:') !!}
    {!! Form::number('dalam_sehari', null, ['class' => 'form-control']) !!}
</div>

<!-- Dalam Sekali Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dalam_sekali', 'Dalam Sekali:') !!}
    {!! Form::number('dalam_sekali', null, ['class' => 'form-control']) !!}
</div>

<!-- Boleh Berulang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('boleh_berulang', 'Boleh Berulang:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('boleh_berulang', 0) !!}
        {!! Form::checkbox('boleh_berulang', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('resepDetails.index') }}" class="btn btn-default">Cancel</a>
</div>
