<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('slug') }}
            {{ Form::text('slug', $product->slug, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => 'Slug']) }}
            {!! $errors->first('slug', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('quantity') }}
            {{ Form::text('quantity', $product->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('subcategory_id') }}
            {{ Form::text('subcategory_id', $product->subcategory_id, ['class' => 'form-control' . ($errors->has('subcategory_id') ? ' is-invalid' : ''), 'placeholder' => 'Subcategory Id']) }}
            {!! $errors->first('subcategory_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('brand_id') }}
            {{ Form::text('brand_id', $product->brand_id, ['class' => 'form-control' . ($errors->has('brand_id') ? ' is-invalid' : ''), 'placeholder' => 'Brand Id']) }}
            {!! $errors->first('brand_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>