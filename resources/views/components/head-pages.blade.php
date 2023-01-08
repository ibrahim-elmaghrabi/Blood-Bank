<div class="path">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('clients.home') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $name }}</li>
            {{ $slot }}
        </ol>
    </nav>
</div>