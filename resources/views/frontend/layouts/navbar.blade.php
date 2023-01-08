  <div class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                    <x-navLinks>
                    @auth('client-web')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.profile' , auth('client-web')->user()->id ) }}">الحساب</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('client-logout') }}" method="POST" >
                            @csrf
                            <input type="submit" value="الخروج">
                        </form>
                    </li>
                    @endauth
                    </x-navLinks>
                <!--not a member-->
                <div class="accounts">
                        @auth('client-web')
                        <a href="{{ route('donationRequests.add') }}" class="donate ml-3">
                            <img src="{{ asset('images/transfusion.svg') }}">
                                <p>طلب تبرع</p>
                        </a>     
                        @else
                        <a href="{{ route('account.create') }}" class="create">إنشاء حساب جديد</a>
                        <a href="{{ route('clients-web.login-page') }}" class="signin">الدخول</a>
                    @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
