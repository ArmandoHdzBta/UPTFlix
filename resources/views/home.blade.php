@extends('layout')

{{-- TITLE --}}
@section('Home')


@section('content')

    <p class="footer-country">UPTFLIX</p>
    <div class="our-story-card-text">
        <h1 id=""  class="our-story-card-title" data-uia="hero-title" color="blanco" align="center">Películas, programas de TV y más ilimitados..</h1>
        <h2 id="" class="our-story-card-subtitle" data-uia="our-story-card-subtitle" align="center">Mira en cualquier lugar.</h2>
        <form class="cta-form email-form" data-uia="email-form" method="GET">
            <h3 class="email-form-title" align="center">Ingrese su correo electrónico para crear o empezar su membresía..</h3>
            <div class="email-form-lockup"><ul class="simpleForm structural ui-grid">
                <li data-uia="field-email+wrapper" class="nfFormSpace field-email">
                    <div data-uia="field-email+container" class="nfInput nfInputResponsive">
                        <div class="nfInputPlacement"><label class="input_id" placeholder="email" align="center">
                            <input type="email" data-uia="field-email" name="email" class="nfTextField" id="id_email_hero_fuji" value="" tabindex="0" autocomplete="email" maxlength="50" minlength="5" dir="">
                            <label for="id_email_hero_fuji" class="placeLabel">

                                <button name="button" align="center">Correo electronico</button>

                            </label>
                        </label>
                    </div>
                </div>
            </li>
        </ul>


        <div class="our-story-cards" data-uia-our-story="our-story-cards">
            <div class="our-story-card hero-card hero_fuji vlv" data-uia-our-story="hero_fuji" data-uia="our-story-card">
                <div class="our-story-card-background">
                    <div class="concord-img-wrapper" data-uia="concord-img-wrapper" style="height: 733px;">
                        <img  class="concord-img vlv-creative" style="background-size: cover;"  srcset="https://www.futuro.cl/wp-content/uploads/2021/05/netflix-1024x576.jpg" alt="">
                        <div class="concord-img-gradient">
                        </div>
                    </div>
                </div>
            </form>
            <h3 id="" class="our-story-card-disclaimer" data-uia="our-story-card-disclaimer"></h3>
        </div>
    <div class="center-pixel" style="position:absolute"></div>
    </div><div class="our-story-card animation-card watchOnTv" data-uia-our-story="watchOnTv" data-uia="our-story-card"><div class="animation-card-container">
            <div class="our-story-card-img-container"
            ><div class="our-story-card-animation-container">
                <div class="our-story-card-animation">
                    <video class="our-story-card-video" autoplay="" playsinline="" muted="" loop=""  align="center">
                        <img class="concord-img vlv-creative" src="https://d500.epimg.net/cincodias/imagenes/2020/12/31/lifestyle/1609408585_467254_1609408795_noticia_normal.jpg" srcset="https://www.futuro.cl/wp-content/uploads/2021/05/netflix-1024x576.jpgp" alt="">
                        <source align="center" src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/video-tv-0819.m4v" type="video/mp4">
                        </video>
                    <div class="our-story-card-animation-text"></div></div></div></div><div class="center-pixel" style="position:absolute">
                        </div>
                    </div></div><div class="our-story-card animation-card downloadAndWatch flipped" data-uia-our-story="downloadAndWatch" data-uia="our-story-card"><div class="animation-card-container">
                        <div class="our-story-card-text"><h1 id="" class="our-story-card-title" data-uia="animation-card-title" align="center">Descarga tus programas para verlos sin conexión.</h1>
                            <h2 id="" class="our-story-card-subtitle" data-uia="our-story-card-subtitle"  align="center">Guarde y disfrute</h2>
                        </div>
            <br>
            <br>
            <div class="our-story-card-img-container">
                            <div class="our-story-card-animation-container">
                                <img alt="" class="our-story-card-img"   src="https://occ-0-987-990.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABR6J2_0OUNGGzGV9ZUpAf6PgbPkLcwVRwlWDWZB-P09IOg68lQSpYOjsunQHJ-gvYobpgg9MRtbZfnP6FG4PD8vs9Mthy54XQXqatWf7wUS05KLOQeO4WhlL2j32.jpg?r=8b0" data-uia="our-story-card-img">
                                <div class="our-story-card-animation">
                                    <div class="our-story-card-animation-image">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="center-pixel" style="position:absolute"></div>
                </div>
            </div>
             <br>
                <br>
            <div class="our-story-card animation-card watchOnDevice" data-uia-our-story="watchOnDevice" data-uia="our-story-card"><div class="animation-card-container"><div class="our-story-card-text"><h1 id="" class="our-story-card-title" data-uia="animation-card-title"  align="center">Puedes observarlos en diferentes dipositivos</h1>

                <h2 id="" class="our-story-card-subtitle"
                data-uia="our-story-card-subtitle"  align="center">Dispositivos disponibles:tablet, laptop, y TV</h2>
            </div>
            <div class="our-story-card-img-container">
                <div class="our-story-card-animation-container"><img alt="" class="our-story-card-img" src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/device-pile.png" data-uia="our-story-card-img">
                    <div class="our-story-card-animation">
                        <div class="our-story-card-animation-text"></div>
                    </div>
                    </div>
                </div>
                <div class="center-pixel" style="position:absolute">
                </div>
            </div>
        </div>
    <br>
    <br>

        <div class="our-story-card animation-card kidsValueProp flipped" data-uia-our-story="kidsValueProp" data-uia="our-story-card">
            <div class="animation-card-container">
                <div class="our-story-card-text">
            <h1 id="" class="our-story-card-title" data-uia="animation-card-title" align="center">Puedes crear perfiles para niños</h1>
            <h2 id="" class="our-story-card-subtitle" data-uia="our-story-card-subtitle" align="center">Seccion para niños totalmente segura.</h2>
        </div>
        <div class="our-story-card-img-container">
            <div class="our-story-card-animation-container">
                <img alt="" class="our-story-card-img"
                src="https://www.mundoprimaria.com/wp-content/uploads/2020/02/15-ESP%C3%8DAS-CON-DISFRAZ-2019.jpg"
                data-uia="our-story-card-img">
                <div class="our-story-card-animation">
                    <div class="our-story-card-animation-text"></div>
                </div>
            </div>
        </div>
        <div class="center-pixel" style="position:absolute">
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
@endsection
