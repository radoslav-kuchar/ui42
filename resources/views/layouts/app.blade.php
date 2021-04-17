<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | KMK</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?cache=0" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}?cache=0" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-white shadow-sm d-flex flex-column" style="background:#000000;">
            <div class="container">
                <ul class="navbar-nav ms-auto">
                    <a class="navbar-brand" style="color:white" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" class="w-100 h-100" alt="">
                    </a>
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto d-flex flex-row" style="align-items: center;">
                        <a href="#" class="navbar-a">Kontakty a čísla na oddelenie</a>
                        <div class="dropdown">
                            <button class="btn navbar-language-toggler dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                EN
                            </button>
                        </div>
                        <input type="text" class="form-control placeholder-right" placeholder="&#xF002;" style="font-family:Arial, FontAwesome" />
                        <button class="btn btn-login">Prihlásenie</button>
                    </ul>
                </div>
            </div>
            <div class="container">
            <div class="d-flex w-100">
                <ul class="navbar-bottom ps-0 pt-4 pb-0 mb-0">
                    <a href="#">O nás</a>
                    <a href="#">Zoznam miest</a>
                    <a href="#">Inšpekcia</a>
                    <a href="#">Kontakt</a>
                </ul>
            </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
<footer class="p-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sd-12">
                <div class="footer-section">
                    <p class="heading"><strong>ADRESA A KONTAKT</strong></p>
                    <p>ŠÚKL</p>
                    <p>Kvetná 11</p>
                    <p>825 08 Bratislava 26</p>
                    <p>Ústredňa:</p>
                    <p>+421-2-50701 111</p>
                </div>
                <div class="footer-section">
                    <p class="heading"><strong>KONTAKTY</strong></p>
                    <a href="#">telefónne čísla</a>
                    <a href="#">adresa</a>
                    <a href="#">úradné hodiny</a>
                    <a href="#">bankové spustenie</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sd-12">
                <div class="footer-section">
                    <p class="heading"><strong>O NÁS</strong></p>
                    <a href="#">Dotazníky</a>
                    <a href="#">Hlavní predstavitelia</a>
                    <a href="#">Základné dokumenty</a>
                    <a href="#">Zmluvy za ŠÚKL</a>
                    <a href="#">História a súčasnosť</a>
                    <a href="#">Národná spolupráca</a>
                    <a href="#">Poradné orgány</a>
                    <a href="#">Legislatíva</a>
                    <a href="#">Priestupky a správne delikty</a>
                    <a href="#">Zoznam dĺžníkov</a>
                    <a href="#">Sadzobník ŠÚKL</a>
                    <a href="#">Verejné obstarávanie</a>
                    <a href="#">Vzdelávacie akcie a prezentácie</a>
                    <a href="#">Konzultácie</a>
                    <a href="#">Voľné pracovné miesta (0)</a>
                    <a href="#">Poskytovanie informácií</a>
                    <a href="#">Sťažnosti a petície</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sd-12">
                <div class="footer-section">
                    <p class="heading"><strong>MÉDIÁ</strong></p>
                    <a href="#">Tlačové správy</a>
                    <a href="#">Lieky v médiách</a>
                    <a href="#">Kontakt pre médiá</a>
                </div>
                <div class="footer-section">
                    <p class="heading"><strong>DATABÁZY A SERVIS</strong></p>
                    <a href="#">Databáza liekov a zdravotníckych pomôcok</a>
                    <a href="#">Iné zoznamy</a>
                    <a href="#">Kontaktný formulár</a>
                    <a href="#">Mapa stránok</a>
                    <a href="#">A - Z index</a>
                    <a href="#">Linky</a>
                    <a href="#">RSS</a>
                    <a href="#">Doplnok pre internetový prehliadač</a>
                    <a href="#">Prehliadače formátov</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sd-12">
                <div class="footer-section">
                    <p class="heading"><strong>DROGOVÉ PREKURZORY</strong></p>
                    <a href="#">Aktuality</a>
                    <a href="#">Legislatíva</a>
                    <a href="#">Pokyny</a>
                    <a href="#">Ústredňa:</a>
                    <a href="#">+421-2-50701 111</a>
                </div>
                <div class="footer-section">
                    <p class="heading"><strong>INÉ</strong></p>
                    <a href="#">Linky</a>
                    <a href="#">Mapa stránok</a>
                    <a href="#">FAQ</a>
                    <a href="#">Podmienky používania</a>
                </div>
                <div class="footer-section">
                    <p class="heading rapid_alert"><strong>RAPID ALERT SYSTEM</strong></p>
                    <a href="#" class="rapid_alert">Rýchla výstraha vyplývajúca z nedostatkov v kvalite liekov</a>
                </div>
            </div>
        </div>
    </div>
</footer>

</html>