@extends('layouts.app')

@section('template_title')
    {{ $category->name ?? 'Show Category' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $category->name }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $category->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $category->image }}
                        </div>
                        <div class="form-group">
                            <strong>Icon:</strong>
                            {{ $category->icon }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
