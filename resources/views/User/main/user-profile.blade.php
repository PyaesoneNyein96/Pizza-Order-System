@extends('User.layout.user-master')


@section('title', 'User Profile')

@section('content')

    <div class="container-fluid">
        <div class="col-md-8 offset-2">
            <!-- PROFILE -->

            <div class="card text-left bg-transparent shadow">
                <form action="{{ route('user@profileEdit', Auth::id()) }}" method="post" class=" m-3 p-3"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="wrap text-center">


                                <div class="img-wrap shadow  m-3 ">
                                    @if (Auth::user()->image == null && Auth::user()->gender == 'male')
                                        <img src="{{ asset('image/avators/images.jpg') }}" id="profile" />
                                    @elseif (Auth::user()->image == null && Auth::user()->gender == 'female')
                                        <img src="{{ asset('image/avators/female.jpg') }}" id="profile" />
                                    @elseif(Auth::user()->image == null)
                                        <img src="{{ asset('image/avators/genderless.jpg') }}" id="profile">
                                    @endif
                                    @if (Auth::user()->image !== null)
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}" id='profile'>
                                    @endif
                                    {{-- ========== --}}
                                </div>
                                <div class="upload-img-wrap p-1 mx-3">
                                    @if ($switch == 'true')
                                        <input type="file" id="img" name="image"
                                            onchange="document.getElementById('profile').src=window.URL.createObjectURL(this.files[0])"
                                            class="d-none form-control form-control-sm my-2">
                                        <label for="img" style="cursor: pointer"
                                            class="text-success border border-success p-2 small shadow rounded
                                                @error('image')
                                                    border border-danger
                                                @enderror">
                                            Select Profile Image
                                        </label>
                                        @error('image')
                                            <small class="text-danger text-center">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="col-md-8  shadow py-2">

                            @if ($switch == 'false')
                                <div class="h6 bg-light p-2 rounded w-25 mt-1 shadow-sm text-danger text-center">
                                    Profile Locked <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                            @else
                                <div class="h6 bg-light p-2 rounded w-25 mt-1 shadow-sm text-success text-center">
                                    Profile Unlocked <i class="fa fa-unlock" aria-hidden="true"></i>
                                </div>
                            @endif
                            {{-- <div class="h6 bg-light p-2 rounded w-25 mt-1 shadow-sm text-success text-center"></div> --}}

                            <div class="form-group m-b-10">
                                <i class="fas fa-user-circle fa-lg me-3"></i>
                                <input class="form-control d-inline w-90" type="text" name="name"
                                    value="{{ old('name') ?? auth::user()->name }}" @disabled($switch == 'false')>
                                @error('name')
                                    <small class="text-danger mx-5">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group m-b-10">
                                <i class="fas fa-envelope fa-lg me-3"></i>
                                <input class="form-control d-inline w-90" type="text" name="email"
                                    value="{{ old('email') ?? auth::user()->email }}" @disabled($switch == 'false')>
                                @error('email')
                                    <small class="text-danger mx-5">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group m-b-10">

                                <i class="fas fa-venus-double  me-3"></i>
                                <select name="gender" class="form-select w-90 d-inline" @disabled($switch == 'false')>
                                    <option value="male" @if (Auth::user()->gender == 'male') selected @endif>
                                        Male
                                    </option>
                                    <option value="female" @if (Auth::user()->gender == 'female') selected @endif>
                                        Female
                                    </option>
                                    <option value="null" @if (Auth::user()->gender == 'null') selected @endif>
                                        Unknown
                                    </option>
                                </select>
                                @error('gender')
                                    <small class="text-danger mx-5">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group m-b-10">
                                <i class="fas fa-phone fa-lg me-3"></i>
                                <input class="form-control w-90 d-inline" type="text" name="phone"
                                    value="{{ auth::user()->phone, old('phone') }}" @disabled($switch == 'false')>
                                @error('phone')
                                    <small class="text-danger mx-5">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group m-b-10 ">
                                <div class="d-flex m-0 p-0">
                                    <i class="fas fa-location-arrow fa-lg me-3  mt-2"></i>
                                    <textarea name="address" class="form-control  w-90 d-inline ms-1" rows="3" @disabled($switch == 'false')>{{ Auth::user()->address, old('address') }}
                                            </textarea>

                                </div>

                                @error('address')
                                    <small class="text-danger mx-5">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group m-b-10">
                                <i class="fas fa-tag fa-lg me-3"></i>
                                <input class="form-control w-90 d-inline" type="text" name="role"
                                    value="{{ auth::user()->role }}" @disabled($switch)>
                                @error('role')
                                    <small class="text-danger mx-5">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group m-b-10">
                                <i class="fa-solid fa-check fa-lg me-3"></i>
                                <input class="form-control w-90 d-inline" type="text" name="role"
                                    value="{{ auth::user()->status }}" @disabled($switch)>
                                @error('role')
                                    <small class="text-danger mx-5">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group m-b-10">

                                @if (Auth::user()->created_at == Auth::user()->updated_at)
                                    <i class="far fa-clock fa-lg me-3 text-success"></i>
                                    <input class="form-control  d-inline" type="text"
                                        value="{{ auth::user()->created_at->format('j - M - Y') }}Created time "
                                        @disabled($switch)>
                                @else
                                    <i class="far fa-clock fa-lg me-3 text-danger"></i>
                                    <input class="form-control w-90 d-inline text-muted" type="text"
                                        value="{{ auth::user()->updated_at->format('j - M - Y, (h:i:s A) ') }} updated!!!"
                                        @disabled($switch)>
                                @endif

                            </div>

                            <div class="btn-wrap text-center">
                                @if ($switch == 'false')
                                    <a href="{{ route('user@unlockProfile') }}" class="w-100">
                                        <button class="btn  text-light w-50  bg-success m-t-20" type="button">
                                            Want to Change !!
                                        </button>
                                    </a>
                                @else
                                    <a href="{{ route('user@profile') }}" class="text-decoration-none">
                                        <span class="btn btn-danger m-t-20">
                                            Lock profile
                                        </span>
                                    </a>
                                    <button class="btn text-light w-50  bg-success m-t-20" type="submit">
                                        Update Profile
                                    </button>
                                @endif
                            </div>

                        </div>

                    </div>
                </form>
                {{-- // --}}
            </div>



            <!-- END PROFILE -->
        </div>
    </div>

@endsection
