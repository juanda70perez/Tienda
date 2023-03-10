<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('color_id') }}
            {{ Form::text('color_id', $colorSize->color_id, ['class' => 'form-control' . ($errors->has('color_id') ? ' is-invalid' : ''), 'placeholder' => 'Color Id']) }}
            {!! $errors->first('color_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('size_id') }}
            {{ Form::text('size_id', $colorSize->size_id, ['class' => 'form-control' . ($errors->has('size_id') ? ' is-invalid' : ''), 'placeholder' => 'Size Id']) }}
            {!! $errors->first('size_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('quantity') }}
            {{ Form::text('quantity', $colorSize->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>