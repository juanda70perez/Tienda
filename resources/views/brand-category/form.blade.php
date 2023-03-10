<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('brand_id') }}
            {{ Form::text('brand_id', $brandCategory->brand_id, ['class' => 'form-control' . ($errors->has('brand_id') ? ' is-invalid' : ''), 'placeholder' => 'Brand Id']) }}
            {!! $errors->first('brand_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('category_id') }}
            {{ Form::text('category_id', $brandCategory->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Category Id']) }}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>