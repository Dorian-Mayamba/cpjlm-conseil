<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('logo/Cropped-CPJLM-CONSEIL.png') }}" type="image/x-icon" sizes="32x32">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/slick/slick.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('js/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/slick/slick-theme.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" aria-label="headerNavbar">
            <div class="img-link">
                <a href="{{ route('Page.index') }}" class="navbar-brand" href="{{ route('Page.index') }}">
                    <img class="brand-img" src="{{ asset('logo/Cropped-CPJLM-CONSEIL.png') }}"
                        alt="CPJLM-CONSEIL">
                </a>
            </div>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="collapse_target">
                <ul style="font-size:20px; font-weight:bold;" class="navbar-nav nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ route('Page.index') }}" class="nav-item">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Page.about') }}"
                            class="nav-link {{ request()->is('A-propos') ? 'active' : '' }}">Qui sommes nous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('partenaires') ? 'active' : '' }}"
                            href="{{ route('Page.partners') }}">Partenaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('formations') ? 'active' : '' }}"
                            href="{{ route('Page.formation') }}">Formations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('missions') ? 'active' : '' }}"
                            href="{{ route('Page.mission') }}">Missions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}" data-toggle="modal"
                            data-target="#contactModal">Contact</a>
                    </li>
                    @if (Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                                href="#" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a href="{{ route('admin.dashboard') }}">Tableau de
                                        Bord</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item"><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Se déconnecter') }}</a>
                                </li>
                            </ul>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                style="display:none;">
                                @csrf
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        <div class="modal fade " id="contactModal">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-success">Contactez-nous</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="numbers">
                            <p>
                                <strong>Corentin.P : <span style="letter-spacing:3px;">+33660703895</span></strong>
                            </p>
                            <p>
                                <strong>Jean-Louis.M : <span style="letter-spacing:3px;">+33647669211</span></strong>
                            </p>
                        </div>
                        <form action="{{ route('contact') }}" method="POST" id="contactForm"
                            data-attr="{{ route('contact') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Votre nom</label>
                                <input type="text" name="name" id="name" placeholder="Votre nom">
                            </div>
                            <div class="form-group">
                                <label for="email">Votre email</label>
                                <input type="email" name="email" id="email" placeholder="Votre email">
                            </div>
                            <div class="form-group">
                                <label for="subject">Objet</label>
                                <input type="text" name="subject" id="subject" placeholder="Objet">
                            </div>
                            <div class="form-group">
                                <label for="comment">Votre commentaire</label>
                                <textarea name="comment" class="form-control" rows="5" id="comment"
                                    placeholder="Votre commentaire"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-info btn-lg" type="submit" name="envoyer" value="Envoyer"
                                    id="envoyer">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <h2><small>{{ session('success') }}</small></h2>
            </div>
        @endif
    <main class="py-5">
        @yield('content')
        @yield('extra-js')
        @yield('extra-css')
    </main>
    <footer>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-center"
            aria-label="footerNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <span class="navbar-text">Released By</span>
                    <a class="nav-link" href="https://www.fiverr.com/dorianmayamba?up_rollout=true">Dorian Mayamba</a><span
                        class="navbar-text">Copyright &copy 2021</span>
                </li>
            </ul>
        </nav>
    </footer>
</div>
<script>
    var links = $('.nav-link');
    $.each(links, (i, link) => {
        $(link).hover((e) => {
            if (!$(link).hasClass('active')) {
                $(link).toggleClass('active');
            }
        }, function(e) {
            check1: if ($(link).hasClass('active') && $(link).attr('href') !== $(location)[0].href) {
                if ($(link).attr('href') == "#" && $(location).attr('href').includes(
                        '/admin/dashboard')) {
                    break check1;
                }
                var text = $(link).text();
                if ($(location).attr('pathname') == '/' && text == "Accueil") break check1;
                $(link).toggleClass('active');
            }
        })
    })
    var formGroups = $('.form-group');
    $.each(formGroups, (i, formGroup)=>{
        $(formGroup).addClass('text-center');
    });
    var inputs = $('input');
    $.each(inputs, function(i, input) {
        if ($(input).attr('type') != "submit") {
            $(input).addClass("form-control");
        }
    });
    $.each($('.nav-link'), (i, link) => {
        $(link).addClass('py-4');
        $(link).addClass('px-4');
        $(link).addClass('mx-3');
    });

    $('#contactForm').submit((e) => {
        e.preventDefault();
        var fd = new FormData();
        var inputName = $('#name').val();
        var inputEmail = $('#email').val();
        var inputSubject = $('#subject').val();
        var inputComment = $('#comment').val();

        fd.append('name', inputName);
        fd.append('email', inputEmail);
        fd.append('subject', inputSubject);
        fd.append('comment', inputComment);

        let formValues = {
            name: fd.get('name'),
            email: fd.get('email'),
            subject: fd.get('subject'),
            comment: fd.get('comment')
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                method: 'POST',
                url: $(e.target).attr('action'),
                data: formValues,
            })
            .done(function(data) {
                if(data=="success"){
                    location.reload(true);
                }
            })
            .fail(function(err) {
                console.log(err.responseText);
                var error = err.responseText;
                var obj = JSON.parse(error).errors;
                var values = Object.values(obj).map((val, i) => {
                    return val + '\n';
                });
                alert(values);
            })
    })
</script>
</body>

</html>
