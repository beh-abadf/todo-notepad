{{-- Left navigation part of pages --}}
<div id="side_nav" class="text-bg-primary">
    <nav>
        <div class=" mb-4 mt-4" style="text-align: center;">
            <div>
                @auth
                    <img src="../icons/person-fill-check.svg" alt="" width="100px" height="100px"><br>
                    {{$user->name}}
                @else
                    <img src="../icons/person-circle.svg" alt="" width="100px" height="100px">
                @endauth
            </div>

        </div>
        <ul style="margin-top: 100px;
        list-style-type: none">
            <li>
                <button onclick="window.location.href='/'" style="text-decoration: none;">
                    {{ __('head_side.main_page') }}
                </button>
            </li>
            <li>
                <button onclick="window.location.href='/register'" style="text-decoration: none;">
                    {{ __('head_side.register') }}
                </button>
            </li>
            <li>
                <button onclick="window.location.href='/login'" style="text-decoration: none;">
                    {{ __('head_side.login') }}
                </button>
            </li>
            <li>
                <button onclick="window.location.href='/logout'" style="text-decoration: none;">
                    {{ __('head_side.logout') }}
                </button>
            </li>
        </ul>
    </nav>
</div>