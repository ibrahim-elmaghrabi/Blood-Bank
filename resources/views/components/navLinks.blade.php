<ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('clients.home') }}">الرئيسية <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('about-app') }}">عن بنك الدم</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('articles') }}">المقالات</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('donationRequests.index') }}">طلبات التبرع</a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('about_us') }}">من نحن</a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('contact-us') }}">اتصل بنا</a>
    </li>
    {{ $slot }}
</ul>