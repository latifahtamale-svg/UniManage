<header class="site-header">
    <div class="site-header__brand">{{ 'UniManage SMS' }}</div>
    @auth
        <div class="site-header__user">
            {{ auth()->user()->getRoleNames()->first() }}: {{ auth()->user()->name }}
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit" class="link-button">Logout</button>
            </form>
        </div>
    @endauth
</header>
