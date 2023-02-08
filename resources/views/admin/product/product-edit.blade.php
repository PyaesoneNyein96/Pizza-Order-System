@extends('admin.admin-master');


@section('title', 'Product-Edit')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid ">

                <form action="{{ route('admin@productUpdate', $item->id) }}" enctype="multipart/form-data"
                    class="card p-3 position-relative" method="post">
                    @csrf

                    <div class="row justify-content-between">
                        <div class="col-10 offset-1 d-flex justify-content-center">
                            <div class="col-md-6  text-start">
                                <h5 class="text-muted m-3">Current Image</h5>
                                <img src="{{ asset('storage/product/' . $item->image) }}" class="img-thumbnail"
                                    style="width:300px; height:200px; object-fit: cover;">
                            </div>
                            <div class="col-md-6
                                    text-end ">
                                <h5 class="text-muted m-3 text-start">Preview image</h5>
                                <div class="card-img">
                                    <img id="output" style="width:300px; height:200px; object-fit: cover;"
                                        class="img-tumbnail shadow">
                                    <input id="img" name="productImage" type="file" accept="image/*" class="d-none"
                                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>


                        </div>


                    </div>

                    {{-- text info  --}}
                    <div class="row mt-3">
                        <div class="col-md-10 offset-md-1">
                            <div class="wrap mb-4">
                                <label for="img" class="w-100 btn btn-outline-success rounded p-2 ">
                                    Select Image Here
                                </label>
                                @error('productImage')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>

                            {{-- id  --}}
                            <input type="hidden" name="id" value="{{ $item->id }}">

                            <div class="form-group mb-4">
                                <label class="control-label mb-1">Name</label>
                                <input name="productName" type="text" value="{{ $item->name ?? old('productName') }}"
                                    class="form-control @error('productName') is-invalid @enderror"
                                    placeholder="Name of Product...">
                                @error('productName')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="control-label mb-1">Description</label>
                                <textarea name="productDescription" class="form-control @error('productDescription') is-invalid @enderror"
                                    placeholder="Description" cols="30" rows="3">{{ $item->description ?? old('productDescription') }}</textarea>
                                @error('productDescription')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="control-label mb-1">Price</label>
                                <input name="productPrice" type="number" min="0"
                                    class="form-control @error('productPrice') is-invalid @enderror" placeholder="Price..."
                                    value="{{ $item->price ?? old('productPrice') }}">
                                @error('productPrice')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="control-label mb-1">Baking time</label>
                                <input name="productBakingTime" type="number" min="0"
                                    value="{{ $item->baking_time ?? old('productBakingTime') }}"
                                    class="form-control @error('productBakingTime') is-invalid @enderror"
                                    placeholder="Baking Time...">
                                @error('productBakingTime')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label>Categories</label>
                                <select name="productCategory"
                                    class="form-select @error('productCategory') is-invalid @enderror">
                                    <option value="#" selected hidden disabled>
                                        - Select Category for Product
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($item->category->name == $category->name) selected @endif>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('productCategory')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group mb-4">
                                <label class="control-label mb-1">Views</label>
                                <input name="productView_count" type="number" min="0"
                                    value="{{ $item->view_count }}" class="form-control "@disabled(true)>
                            </div>

                            <div class="form-group mb-4">
                                <label class="control-label mb-1">Cerated Date</label>
                                <input name="created_at" type="text" min="0"
                                    value="{{ $item->created_at->format('d-M-Y') }}"
                                    class="form-control "@disabled(true)>
                                @if ($item->created_at != $item->updated_at)
                                    <label class="control-label my-1">Updated Date</label>
                                    <input name="created_at" type="text" min="0"
                                        value="{{ $item->updated_at->diffForHumans() }}"
                                        class="form-control "@disabled(true)>
                                @endif
                            </div>


                            <div>
                                <button id="payment-button" type="submit"
                                    class="btn btn-lg btn-info btn-block mt-4 text-light rounded">
                                    <span id="payment-button-amount">Create
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                </form>



            </div>
        </div>

        <div class="row"></div>

        </form>

    </div>
    </div>
    </div>
@endsection
