{{-- Head navigation part of pages --}}
<div id="head_nav" class="center text-bg-primary">
    <nav>
        <ul class="center">
            <li>
                <button onclick="window.location.href='/'">
                    {{ __('head_side.main_page') }}
                </button>
            </li>
            <li>
                <button onclick="window.location.href='/register'">
                    {{ __('head_side.register') }}
                </button>
            </li>
            <li>
                <button onclick="window.location.href='/login'">
                    {{ __('head_side.login') }}
                </button>
            </li>
            <li>
                <button onclick="window.location.href='/logout'">
                    {{ __('head_side.logout') }}
                </button>
            </li>
        </ul>
    </nav>
</div>
