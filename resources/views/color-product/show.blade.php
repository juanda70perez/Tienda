@extends('layouts.app')

@section('template_title')
    {{ $colorProduct->name ?? 'Show Color Product' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Color Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('color-products.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Color Id:</strong>
                            {{ $colorProduct->color_id }}
                        </div>
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $colorProduct->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $colorProduct->quantity }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
