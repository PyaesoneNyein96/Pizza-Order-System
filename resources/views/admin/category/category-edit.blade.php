@extends('admin.admin-master')


@section('title', 'dashboard-category')

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('admin@categoryList') }}"><button
                                class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Categories</h3>
                            </div>
                            <hr>

                            <form action="{{ route('admin@UpdateCategory', $editData->id) }}" method="post"
                                novalidate="novalidate">
                                @csrf
                                {{-- <input type="hidden" name="categoryId" value="{{ $editData->id }}"> --}}
                                <div class="form-group">
                                    <label class="control-label mb-1">Update Name</label>
                                    <input id="cc-pament" name="categoryName" type="text"
                                        value="{{ $editData->name ?? old('categoryName') }}"
                                        class="form-control @error('categoryName') is-invalid @enderror"
                                        placeholder="Categories...">

                                    @error('categoryName')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div>
                                    <button id="payment-button" type="submit"
                                        class="btn btn-lg btn-primary btn-block mt-4 text-light rounded">
                                        <span id="payment-button-amount">Update
                                            <i class="fa fa-upload" aria-hidden="true"></i>
                                        </span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        <i class="fa-solid fa-circle-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
