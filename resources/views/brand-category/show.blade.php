@extends('layouts.app')

@section('template_title')
    {{ $brandCategory->name ?? 'Show Brand Category' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Brand Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('brand-categories.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Brand Id:</strong>
                            {{ $brandCategory->brand_id }}
                        </div>
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $brandCategory->category_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
