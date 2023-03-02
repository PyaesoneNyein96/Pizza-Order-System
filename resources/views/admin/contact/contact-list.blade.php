@extends('admin.admin-master')

@section('title', 'Contact List')

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
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>





                    <div class="row">
                        @foreach ($message as $sms)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="row mt-3">
                                        <div class="col-4 text-center">
                                            @if ($sms->user_image == null && $sms->user_gender == 'male')
                                                <img src="{{ asset('image/avators/images.jpg') }}"
                                                    class=" shadow img-thumbnail" style="width:120px; height:120px" />
                                            @elseif ($sms->user_image == null && $sms->user_gender == 'female')
                                                <img src="{{ asset('image/avators/female.jpg') }}"
                                                    class=" shadow img-thumbnail" style="width:120px; height:120px" />
                                            @elseif($sms->user_image == null)
                                                <img src="{{ asset('image/avators/genderless.jpg') }}"
                                                    class=" shadow img-thumbnail" style="width:120px; height:120px">
                                            @endif
                                            @if ($sms->user_image !== null)
                                                <img src="{{ asset('storage/' . $sms->user_image) }}"
                                                    class=" shadow img-thumbnail" style="width:120px; height:120px">
                                            @endif
                                        </div>
                                        <div class="col-8">
                                            <div class="row mt-3">
                                                <div class="col-3">
                                                    <h5 class="text-muted my-2">Name </h5>
                                                    <h5 class="text-muted my-2">Email </h5>
                                                    <h5 class="text-muted my-2">Phone </h5>
                                                </div>
                                                <div class="col-8 ">
                                                    <h5 class="text-muted my-2">: {{ $sms->name }}</h5>
                                                    <h5 class="text-muted my-2">: {{ $sms->email }}</h5>
                                                    <h5 class="text-muted my-2">: {{ $sms->user_phone }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h4 class="my-2 text-muted">Subject Name</h4>
                                            <h4 class="mx-5 py-2 text-light bg-info rounded">{{ $sms->subject }}</h4>
                                            <hr class="mx-3">
                                        </div>
                                    </div>

                                    <div class="bg-light rounded-3 mx-4 card-body">
                                        <ul class="m-0 p-0">
                                            <p class="text-justify text" style="max-height:150px; overflow:hidden">
                                                {{ $sms->message }}
                                            <div class="text-end my-2">
                                                <a href="#" class="read-btn">Read more</a>
                                            </div>
                                            </p>
                                        </ul>
                                    </div>



                                </div>
                            </div>
                        @endforeach

                    </div>



                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(() => {
            $('.read-btn').click(function() {
                $parents = $(this).parents('ul');
                $p = $parents.find('.text');
                $p.toggleClass('text-show');
            });
        })
    </script>
@endsection
