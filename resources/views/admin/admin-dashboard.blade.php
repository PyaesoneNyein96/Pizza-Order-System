@extends('admin.admin-master')

@section('title', 'Main-Dashboard')


@section('content')


@section('content')


    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h4 class="title-1">Messages from Users</h4>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('admin@createProductPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add Product
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>



                    <div class="table-responsive table-responsive-data2 text-center">


                        <hr>


                        @if (!$message->isEmpty())
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th> image</th>
                                        <th> name</th>
                                        <th> email</th>
                                        <th> Phone</th>
                                        <th> subject</th>
                                        <th> message</th>
                                        <th> Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($message as $sms)
                                        <tr class="tr-shadow p-0" title="{{ $sms->name }}">

                                            <td>{{ $loop->index + 1 }}</td>

                                            <td class="ms-3 col-2 p-0">
                                                <div class="m-2" style="width:50px; height:50px">
                                                    @if ($sms->user_image == null && $sms->user_gender == 'male')
                                                        <img src="{{ asset('image/avators/images.jpg') }}" class="shadow"
                                                            style="width:50px; height:50px" />
                                                    @elseif ($sms->user_image == null && $sms->user_gender == 'female')
                                                        <img src="{{ asset('image/avators/female.jpg') }}" class="shadow"
                                                            style="width:50px; height:50px" />
                                                    @elseif($sms->user_image == null)
                                                        <img src="{{ asset('image/avators/genderless.jpg') }}"
                                                            class="shadow" style="width:50px: height:50px">
                                                    @endif
                                                    @if ($sms->user_image !== null)
                                                        <img src="{{ asset('storage/' . $sms->user_image) }}" class="shadow"
                                                            style="width:50px; height:50px">
                                                    @endif
                                                    {{-- ========== --}}
                                                </div>
                                            </td>
                                            <td>
                                                <span>{{ $sms->name }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $sms->email }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $sms->user_phone }}</span>
                                            </td>

                                            <td>
                                                <span> {{ $sms->subject }} days</span>
                                            </td>
                                            <td>
                                                <span> {{ $sms->message }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $sms->created_at }}</span>
                                            </td>

                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <div class="paginate">
                                {{-- {{ $message->links() }} --}}
                                {{ $message->appends(request()->query())->links() }}
                            </div>
                        @else
                            <div class="py-3 mt-5 d-flex justify-content-center">
                                <div class="wrap  shadow  w-50 bg-secondary  py-4 rounded d-flex justify-content-center">
                                    <h4 class="w-50 text-light">There is no Message yet !!</h4>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>

@endsection
@endsection
