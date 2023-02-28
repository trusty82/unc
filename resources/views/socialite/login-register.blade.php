@extends('layouts.app')
@section('content')
    <div role="main" class="main">
        <section
            class="section section-concept section-no-border section-dark section-angled section-angled-reverse pt-5 m-0"
            style="background-image: url({{asset('img/landing/header_bg.jpg')}}); background-size: cover; background-position: center; min-height: 645px;">
            <div class="section-angled-layer-bottom section-angled-layer-increase-angle bg-light"
                 style="padding: 8rem 0;"></div>
            <div class="container pt-lg-5 mt-5">
                <div class="row pt-3 pb-lg-0 pb-xl-0">
                    <div class="col-lg-6 pt-4 mb-5 mb-lg-0">
                        <h1 class="font-weight-bold text-10 text-xl-12 line-height-2 mb-3">Création d'une association
                            U.N.C</h1>
                        <p class="opacity-7 text-4 negative-ls-05 pb-2 mb-4">Un simple formulaire pour la création de
                            votre association U.N.C.</p>
                    </div>
                </div>
            </div>
        </section>
        <h1>Se connecter / S'enregistrer avec un compte social</h1>
        <p>
{{--
            <!-- Lien de redirection vers Google -->
            <a href="{{ route('socialite.redirect', 'google') }}" title="Connexion/Inscription avec Google" class="btn btn-link"  >Continuer avec Google</a>

            <!-- Lien de redirection vers Facebook -->
            <a href="{{ route('socialite.redirect', 'facebook') }}" title="Connexion/Inscription avec Facebook" class="btn btn-link"  >Continuer avec Facebook</a>
--}}

            <!-- Lien de redirection vers Github -->
            <a href="{{ route('github.auth', 'github') }}" title="Connexion/Inscription avec Github" class="btn btn-link"  >Continuer avec Github</a>
        </p>
    </div>
@endsection
