<!DOCTYPE html>
<head lang="{{app()->getLocale()}}">
    <title>@yield('page-title')</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1,width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{url('/semantic-ui/semantic.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/main.css')}}">
    <script src="{{url('/assets/js/jquery.min.js')}}"></script>
    <script>
        $(document)
            .ready(function() {
                $('.masthead')
                    .visibility({
                        once: false,
                        onBottomPassed: function() {
                            $('.fixed.menu').transition('fade in');
                        },
                        onBottomPassedReverse: function() {
                            $('.fixed.menu').transition('fade out');
                        }
                    });
                $('.ui.sidebar').sidebar('attach events', '.toc.item');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
    </script>
</head>
<body>
<div class="ui vertical sidebar menu">
    <a class="@yield('home-active') item" href="/">Home</a>
    @auth
        <a class="@yield('messages-list-active') item" href="{{url('/messages')}}">View messages</a>
    @endauth
</div>
<div class="pusher">
    <div class="ui large secondary pointing menu">
        <a class="toc item">
            <i class="sidebar icon"></i>
        </a>
        <a class="@yield('home-active') item" href="/">Home</a>
        @auth
            <a class="@yield('messages-list-active') item" href="{{url('/messages')}}">View message</a>
        @endauth
        <div class="right item">
            @auth
                <a class="ui negative button" href="{{url('/logout')}}">Logout</a>
            @endauth

            @guest
                    <button class="ui positive button" onclick="showModal('modal-auth-form')">Log in</button>
            @endguest
        </div>
    </div>
    <div style="min-height: calc(100vh - 200px)">
        @yield('page-content')
    </div>
    <div class="ui inverted vertical footer segment">
        <div class="ui container">
            <div class="ui stackable inverted divided equal height stackable grid">
                <div class="three wide column">
                    <h4 class="ui inverted header">About</h4>
                    <div class="ui inverted link list">
                        <a href="https://t.me/shockbyte" class="item" target="_blank">Created by @shockbyte</a>
                    </div>
                </div>
                <div class="seven wide column">
                    <h4 class="ui inverted header">FEEDBACK DEMO</h4>
                    <p>shockbyte © 2021</p>
                </div>
            </div>
        </div>
    </div>

    @guest
        @include('modules.modals.auth-modals')
    @endguest
</div>
<script src="{{url('/assets/js/popper.min.js')}}"></script>
<script src="{{url('/semantic-ui/semantic.min.js')}}"></script>
<script src="{{url('/assets/js/actions.js')}}"></script>
<script src="{{url('/assets/js/ajax.js')}}"></script>
</body>
