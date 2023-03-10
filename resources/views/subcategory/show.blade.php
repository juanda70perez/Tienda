@extends('layouts.app')

@section('template_title')
    {{ $subcategory->name ?? 'Show Subcategory' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Subcategory</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('subcategories.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $subcategory->name }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $subcategory->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $subcategory->image }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $subcategory->color }}
                        </div>
                        <div class="form-group">
                            <strong>Size:</strong>
                            {{ $subcategory->size }}
                        </div>
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $subcategory->category_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
