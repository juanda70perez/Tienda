@extends('layouts.app')

@section('template_title')
    {{ $colorSize->name ?? 'Show Color Size' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Color Size</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('color-sizes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Color Id:</strong>
                            {{ $colorSize->color_id }}
                        </div>
                        <div class="form-group">
                            <strong>Size Id:</strong>
                            {{ $colorSize->size_id }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $colorSize->quantity }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
