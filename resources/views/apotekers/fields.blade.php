<!-- Id User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user', 'Id User:') !!}
    {!! Form::number('id_user', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Apotek Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_apotek', 'Id Apotek:') !!}
    {!! Form::number('id_apotek', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('apotekers.index') }}" class="btn btn-default">Cancel</a>
</div>
