@extends('frontend.layouts.master',[
    'bodyClass' => 'donation-requests'
])
@section('content')
<div class="all-requests">
    <div class="container">
        <x-head-pages name=" طلبات التبرع" />
        <!--requests-->
        <div class="requests">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
            <div class="content">
                <form class="row filter">
                    <x-blood-types :bloodTypes="$bloodTypes" />
                    <x-cities :cities="$cities" />
                    <div class="col-md-1 search">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="patients">
                    @foreach ($donations as $donation )
                        <x-donation :donation="$donation" />
                    @endforeach
                </div>
                <div class="pages">
                    <nav aria-label="Page navigation example" dir="ltr">
                        <ul class="pagination">
                                {{ $donations->onEachSide(5)->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous">
    </script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"
        integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k"
            crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
@endpush