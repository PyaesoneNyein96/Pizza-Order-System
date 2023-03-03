@extends('admin.admin-master')


@section('title', 'Product Detail')

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">

            <div class="container-fluid">

                <div class="row">
                    @if (session('success'))
                        <div class="col-md-5 float-end alert alert-success alert-dismissible fade show" role="alert">
                            <span class="text-success small">{{ session('success') }} <i class="fa fa-check"
                                    aria-hidden="true"></i>
                                </sp>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card shadow">
                            <div class="card-body p-3">

                                <div class="row mb-2">
                                    <div class=" col-md-6">
                                        <img src="{{ asset('storage/product/' . $data->image) }}"
                                            title="{{ $data->name }}" class="card-img w-100 img-thumbnail my-2 shadow">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="h4 mb-4  p-2 bg-success text-light rounded ps-3">
                                                    {{ $data->name }}
                                                </div>

                                                <div class="h6 card-text mb-2">
                                                    <span class="h6">Category: </span>
                                                    {{-- {{ $data->Category->name }} --}}
                                                    {{ $data->category_name }}
                                                </div>
                                                <div class="h6 cardard-text mb-2">
                                                    <span class="h6">Price: </span>
                                                    <i class="bi bi-tag"></i> {{ $data->price }} <span
                                                        class="text-success font-weight-bold">.00 $</span>
                                                </div>

                                                <div class="h6 cardard-text mb-2">
                                                    <span class="h6">Waiting Time: </span>
                                                    {{ $data->waiting_time }} <small>Days</small>
                                                </div>

                                                <div class="h6 cardard-text mb-2">
                                                    <span class="h6">View: </span>
                                                    {{ $data->view_count }}
                                                </div>

                                                <div class="h6 cardard-text mb-5">
                                                    <span class="h6">Since: </span>
                                                    {{ $data->created_at->format('d-M-Y') }}
                                                </div>

                                                <div class="description mb-2">
                                                    <h4 class="text-muted text-decoration-underline mb-3">
                                                        <i class="fa fa-tags" aria-hidden="true"></i> Description
                                                    </h4>
                                                    <p class="card-text text-muted"> {{ $data->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-wrap">
                                            <button class="btn btn-secondary btn-sm" onclick="history.back()">
                                                <i class="fa fa-backward" aria-hidden="true"></i>
                                                Back
                                            </button>
                                            <a href="{{ route('admin@productEdit', $data->id) }}">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fas fa-edit fa-sm fa-fw"></i>
                                                    Edit
                                                </button>
                                            </a>

                                        </div>

                                    </div>
                                </div>

                                {{-- <div class="row border rounded p-2">

                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
