@extends('layouts.app')

@section('template_title')
    Create Color Size
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Color Size</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('color-sizes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('color-size.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
