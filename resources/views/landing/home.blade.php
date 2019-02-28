@extends("landing.default")
@section('main')
    <div class="position-relative">
        <!-- shape Hero -->
        <section class="section section-lg section-shaped pb-250">
            <div class="shape shape-style-1 shape-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="container py-lg-md d-flex">
                <div class="col px-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="display-3  text-white">SOOCHOOL
                                <span>Vie Scolaire</span>
                            </h1>
                            <p class="lead  text-white">Mettre le numérique au service de la pédagogie grace la plateforme de gestion de vie scolaire primaire-collège-lycée la plus complète.</p>
                            <div class="btn-wrapper">
                                <a href="#!" class="btn btn-info btn-icon mb-3 mb-sm-0">
                                    <span class="btn-inner--icon"><i class="fa fa-code"></i></span>
                                    <span class="btn-inner--text">S'inscrire</span>
                                </a>
                                <a href="#!" class="btn btn-white btn-icon mb-3 mb-sm-0">
                                    <span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
                                    <span class="btn-inner--text">Tester</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SVG separator -->
            <div class="separator separator-bottom separator-skew">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <!-- 1st Hero Variation -->
    </div>

    {{--Espace Cards Section--}}
    <section class="section section-lg pt-lg-0 mt--200">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row row-grid">
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                                        <i class="ni ni-check-bold"></i>
                                    </div>
                                    <h6 class="text-primary text-uppercase">Espace Administration</h6>
                                    <p class="description mt-3">
                                        Tenez vous sur tout ce qui ce passe dans l'établissemet dès votre connexion. Gérer les entités, les activités
                                        et les interactions des intervenants en quelques clics: cahier de texte, scolarité, cours non assurés, etc.
                                    </p>
                                    <div>
                                        <span class="badge badge-pill badge-primary">Administrateur</span>
                                        <span class="badge badge-pill badge-primary">Directeur</span>
                                        <span class="badge badge-pill badge-primary">Chef d'établissement</span>
                                    </div>
                                    <a href="#" class="btn btn-primary mt-4">En savoir plus</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                                        <i class="ni ni-planet"></i>
                                    </div>
                                    <h6 class="text-warning text-uppercase">Espace Enseignant</h6>
                                    <p class="description mt-3">
                                        Vous avez accès à votre planning des votre connexion. Gérer vos évaluations et les notes de vos élèves
                                        et ayez un suivi sur leurs performances. Cahier de texte, liste de présence inclus.
                                    </p>
                                    <div>
                                        <span class="badge badge-pill badge-warning">Enseignants</span>
                                        <br>
                                        <span class="badge badge-pill badge-warning">Professeurs</span>
                                    </div>
                                    <a href="#" class="btn btn-warning mt-4">En savoir plus</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                                        <i class="ni ni-istanbul"></i>
                                    </div>
                                    <h6 class="text-success text-uppercase">Espace Parent</h6>
                                    <p class="description mt-3">
                                        Le suivi des performances scolaire des vos enfants n'aura jamais été aussi simple qu'avec Soochool.
                                        Notes,bulletins,retards,absences,historique des payements de scolarité, communiqués de la Direction scolaire, etc.
                                    </p>
                                    <div>
                                        <span class="badge badge-pill badge-success">Parents</span>
                                        {{--<br>--}}
                                        <span class="badge badge-pill badge-success">Tuteurs</span>
                                    </div>
                                    <a href="#" class="btn btn-success mt-4">En savoir plus</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--Description section --}}
    <section class="section section-lg">
        <div class="container">
            {{--Proviseur--}}
            <div class="row row-grid align-items-center">
                <div class="col-md-6 order-md-2">
                    <div class="rounded shadow-lg overflow-hidden transform-perspective-right">
                        <div id="carousel_example" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel_example" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel_example" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="img-fluid" src="{{ asset('assets/argon/img/theme/img-1-1200x1000.jpg') }}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-fluid" src="{{ asset('assets/argon/img/theme/img-2-1200x1000.jpg') }}" alt="Second slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel_example" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel_example" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="pr-md-5">
                        <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle mb-5">
                            <i class="ni ni-settings-gear-65"></i>
                        </div>
                        <h3>Proviseurs et Chef d'établissement scolaire</h3>
                        <p>SOOCHOOL vous permet d'avoir une vue d’ensemble sur le fonctionnement votre établissement et
                            vous tient informé en temps réel de ce qui s'y passe.
                        </p>
                        <ul class="list-unstyled mt-5">
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-settings-gear-65"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Gestion de la vie scolaire</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-html5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">
                                            Planification des l'année scolaire et des évènements académiques
                                        </h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Envoi d'informations (communiqués) par sms et par mail aux parents d'élèves et au personnel pédagogique</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Suivi des versments de scolarité</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Statistiques academiques et graphes</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0"><b>...</b></h6>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            {{--Profs--}}
            <div class="row row-grid align-items-center">
                <div class="col-md-6 order-md-2">
                    <div class="pr-md-5">
                        <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle mb-5">
                            <i class="ni ni-settings-gear-65"></i>
                        </div>
                        <h3>Pour les enseignants</h3>
                        <p>SOOCHOOL libèrent les enseignants des activités chronophages,
                            et leur permet de réinvestir ce temps dans la différenciation pédagogique grâce à
                            une connaissance renforcée des besoins spécifiques de chacun de ses élèves.
                        </p>
                        <ul class="list-unstyled mt-5">
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-settings-gear-65"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Calcul automatique des moynnes, classement par ordre de mérite, etc.</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-html5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Génération de relevés de notes.</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Emplois du temps professeur</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Cahier de texte</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0"><b>...</b></h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=" col-md-6 order-md-1">
                    <img src="{{ asset('assets/argon/img/theme/promo-1.png') }}" class="img-fluid floating">
                </div>
            </div>
            {{--Surveillants--}}
            <div class="row row-grid align-items-center">

                <div class="col-md-6 order-md-2">
                    <img src="{{ asset('showcases/hero-image-1.png') }}" class="img-fluid floating">

                </div>
                <div class=" col-md-6 order-md-1">
                    <div class="pr-md-5">
                        <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle mb-5">
                            <i class="ni ni-settings-gear-65"></i>
                        </div>
                        <h3>Surveillants, Senseurs, Conseillés </h3>
                        <p>SOOCHOOL vous permet de gérer la vie scolaire de l'établissement d'une main de maître.
                        </p>
                        <ul class="list-unstyled mt-5">
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-settings-gear-65"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Gestion des absences, retards, incidents, etc</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-html5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Emplois du temps des classes</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Planification du calendrier des devoirs, compostions des examens,
                                            emplois du temps, cours et interventions des professurs par classe, etc
                                        </h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Promotion des élèves en classe supérieure.</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0"><b>...</b></h6>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            {{--Famille--}}
            <div class="row row-grid align-items-center">
                <div class="col-md-6 order-md-2">
                    <div class="pr-md-5">
                        <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle mb-5">
                            <i class="ni ni-settings-gear-65"></i>
                        </div>
                        <h3>Pour la famille</h3>
                        <p>Avec SOOCHOOL suivez les activités et les performances scolaires de vos enfants (Absences, retards, incidents, notes, etc).
                            Recevez des notifications de l'administration scolaire par SMS et par mail.
                        </p>
                        <ul class="list-unstyled mt-5">
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-settings-gear-65"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Absences, retards, incidents, etc</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-html5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Evaluations, notes</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Emplois du temps élèves</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Calendrier des évènements scolaire</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Historique des paiement de scolarité</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-success mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0"><b>...</b></h6>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <img src="{{ asset('showcases/mac.png') }}" class="img-fluid floating">
                </div>
                {{--<div class="col-md-6 order-md-1 section-images section">
                    <div class="col-md-12">
                        <div class="hero-images-container">
                            <img src="{{ asset('showcases/hero-image-1.png') }}" class="img-fluid floating" alt="">
                        </div>
                        <div class="hero-images-container-1">
                            <img src="{{ asset('showcases/hero-image-2.png') }}" class="img-fluid floating" alt="">
                        </div>
                        <div class="hero-images-container-2">
                            <img src="{{ asset('showcases/hero-image-3.png') }}" class="img-fluid floating" alt="">
                        </div>
                    </div>
                </div>--}}

            </div>
        </div>
    </section>
    {{--Caractéristiques slider--}}
    <section class="section bg-secondary">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-md-6">
                    <div class="card bg-default shadow border-0">
                        <img src="{{ asset('assets/argon/img/theme/img-1-1200x1000.jpg') }}" class="card-img-top">
                        <blockquote class="card-blockquote">
                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="svg-bg">
                                <polygon points="0,52 583,95 0,95" class="fill-default" />
                                <polygon points="0,42 583,95 683,0 0,95" opacity=".2" class="fill-default" />
                            </svg>
                            <h4 class="display-3 font-weight-bold text-white">Hébergement gratuit</h4>
                            <p class="lead text-italic text-white">
                                Votre SOOCHOOL est hébergé sans frais sur un serveur qui vous garantie sécurité des données,
                                souplesse et vitesse de navigation, de traitement et de charagement de votre travail.
                            </p>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pl-md-5">
                        <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle mb-5">
                            <i class="ni ni-settings"></i>
                        </div>
                        <h3>Service client</h3>
                        <p class="lead">
                            Recevez une formation pour l'utilisation de SOOCHOOL et assure la maintenance de votre application. Aucun serveur
                            n'est déployé dans votre enceinte.
                        </p>
                        {{--<a href="#" class="font-weight-bold text-warning mt-5">A beautiful UI Kit for impactful websites</a>--}}
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a href="#" class="font-weight-bold text-warning mt-5">Aucune contrainte matérielle</a>
                                    <ul class="list-unstyled mt-5">
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Pas de machine serveur dans l’établissement.</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Personne n’est mobilisé pour sa maintenance.</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Installation et mises à jour réalisées par l'équipe de SOOCHOOL</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Sauvegardes/archivages automatisés et sécurisés.</h6>
                                                </div>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                                <div class="carousel-item">
                                    <a href="#" class="font-weight-bold text-warning mt-5">Environnement de travail</a>
                                    <ul class="list-unstyled mt-5">
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Un sous-domaine paramétré par établissement.</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Un sous-domaine unique par établissement.</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Page web offerte par établissement.</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Un serveur accessible de partout.</h6>
                                                </div>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                                <div class="carousel-item">
                                    <a href="#" class="font-weight-bold text-warning mt-5">Fonctionnalités modernes</a>
                                    <ul class="list-unstyled mt-5">
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Envoi automatique de SMS aux parents et au personnel pédagogique.</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Envoi automatique de mail aux parents et au personnel pédagogique.</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Réglage des scolarités par paiement mobile et bancaire.</h6>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            {{--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>--}}
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <a href="#" class="font-weight-bold text-warning mt-5">Voir toutes les fonctionnalités</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section pb-0 bg-gradient-warning">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-md-6 order-lg-2 ml-lg-auto">
                    <div class="position-relative pl-md-5">
                        <img src="{{ asset('assets/argon/img/ill/ill-2.svg') }}" class="img-center img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="d-flex px-3">
                        <div>
                            <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                                <i class="ni ni-building text-primary"></i>
                            </div>
                        </div>
                        <div class="pl-4">
                            <h4 class="display-3 text-white">Simple et facile d'utilisation</h4>
                            <p class="text-white">
                                L'interface utilisteur est très intuitive et fourni à l'équipe pédagogique aisance,
                                RICHESSE FONCTIONNELLE • FACILITÉ D’UTILISATION • CONFORT ET SÉCURITÉ • ÉTATS STATISTIQUES PERSONNALISÉS • NUMÉRISATION DES PROGRAMMES OFFICIELS • ACCES MULTIPLATEFORME • FIABILITÉ • ASSISTANCE POUR L’UTILISATION
                            </p>
                        </div>
                    </div>
                    <div class="card shadow shadow-lg--hover mt-5">
                        <div class="card-body">
                            <div class="d-flex px-3">
                                <div>
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-satisfied"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h5 class="title text-success">Gardez le contact avec les parents</h5>
                                    <p>
                                        Envoyez de communiqué personnalisé aux parents, ou des notifications
                                        pour les des activités ou évenement scolaire: Rassemblement des parent d'élèves •
                                        Délais de paiement de scolarité • Dates de compos, d'examen, congés, reprise de cours, etc
                                    </p>
                                    {{--<a href="#" class="text-success">Learn more</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow shadow-lg--hover mt-5">
                        <div class="card-body">
                            <div class="d-flex px-3">
                                <div>
                                    <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                                        <i class="ni ni-active-40"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h5 class="title text-warning">Outils statistique</h5>
                                    <p>
                                        Vous avez accès à des statisques dynamiques vous permettant de suivre l'évolution académique
                                        de chaque classe, élèves par matières ou par trimestre.
                                    </p>
                                    {{--<a href="#" class="text-warning">Learn more</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
    {{--Tarifs/Pricing--}}
    <section class="section section-lg">
        <div class="container">
            <div class="row justify-content-center text-center mb-4">
                <div class="col-lg-8">
                    <h2 class="display-3">Tarifs</h2>
                    <p class="lead text-muted">
                        SOOCHOOL Vie Scolaire est accessible pour tout type et toute taille de d'établissement scolaire, avec
                        des fonctionnalités variant selon les tarifs.
                    </p>
                </div>
            </div>

            <div class="row row-grid">
                <div class="col-lg-4 text-center">
                    <div class="card card-lift--hover shadow border-0">
                        <div class="card-body py-5">
                            <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                                <i class="ni ni-check-bold"></i>
                            </div>
                            <div>
                                <span class="badge badge-pill badge-primary">Basic</span>
                            </div>
                            <h6 class="text-primary text-uppercase"><b>300 000 FCFA</b></h6>
                            <p><i class="ni ni-check-bold text-success"></i> Gestion des resources académiques</p>
                            <p><i class="ni ni-check-bold text-success"></i> Espace Administration</p>
                            <p><i class="ni ni-check-bold text-success"></i> Espace Professeur</p>
                            <p><i class="ni ni-check-bold text-success"></i> Gestion des évaluations</p>
                            {{--<p><i class="ni ni-check-bold text-success"></i> Impression relevés de notes</p>--}}
                            <p><i class="ni ni-check-bold text-success"></i> Impression bulletin trimestriel</p>
                            {{--<p><i class="ni ni-check-bold text-success"></i> Conseil de classe</p>--}}
                            <p><i class="ni ni-check-bold text-success"></i> Plannification des cours</p>
                            <p><i class="ni ni-check-bold text-success"></i> Emplois du temps</p>
                            <p><i class="ni ni-check-bold text-success"></i> Promotion scolaire des élèves</p>
                            <p><i class="ni ni-check-bold text-success"></i> Modèle de bulletin standard</p>

                            <a href="#" class="btn btn-primary mt-4">Détails</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="card card-lift--hover shadow border-0 ">
                        <div class="card-body py-5">
                            <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                                <i class="ni ni-istanbul"></i>
                            </div>
                            <div>
                                <span class="badge badge-pill badge-success">PREMIUM</span>
                            </div>
                            <h6 class="text-success text-uppercase"><b>500 000 FCFA</b></h6>
                            <p><i class="ni ni-check-bold text-success"></i> <span class="badge badge-pill badge-primary">Option Basic inclue</span></p>
                            <p><i class="ni ni-check-bold text-success"></i> Gestion des absences/retards</p>
                            <p><i class="ni ni-check-bold text-success"></i> Communiqués personnisés</p>
                            <p><i class="ni ni-check-bold text-success"></i> Envoi de mail personnalisé</p>
                            <p><i class="ni ni-check-bold text-success"></i> Envoi automatique de mail</p>
                            <p><i class="ni ni-check-bold text-success"></i> Gestion des Scolarités</p>
                            <p><i class="ni ni-check-bold text-success"></i> Modèle bulletin au choix</p>
                            <p><i class="ni ni-check-bold text-success"></i> Création de compte Gmail</p>
                            <a href="#" class="btn btn-success mt-4">Détails</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="card card-lift--hover shadow border-0">
                        <div class="card-body py-5">
                            <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                                <i class="ni ni-planet"></i>
                            </div>
                            <div>
                                <span class="badge badge-pill badge-warning">DELUXE</span>
                            </div>
                            <h6 class="text-warning text-uppercase"><b>800 000 FCFA</b></h6>
                            <p><i class="ni ni-check-bold text-success"></i> <span class="badge badge-pill badge-success">Option Premium inclue</span></p>
                            <p><i class="ni ni-check-bold text-success"></i> Page web publicitaire offerte</p>
                            <p><i class="ni ni-check-bold text-success"></i> Appli mobile Parents</p>
                            <p><i class="ni ni-check-bold text-success"></i> Appli mobile Elève</p>
                            <p><i class="ni ni-check-bold text-success"></i> Appli mobile Professeur</p>
                            <p><i class="ni ni-check-bold text-success"></i> Modèle bulletin personnalisé</p>
                            <p><i class="ni ni-check-bold text-success"></i> Licence de vente offerte</p>
                            <a href="#" class="btn btn-warning mt-4">Détails</a>
                        </div>
                    </div>
                </div>
                {{--<div class="col-lg-3 text-center">
                    <div class="card card-lift--hover shadow border-0">
                        <div class="card-body py-5">
                            <div class="icon icon-shape icon-shape-info rounded-circle mb-4">
                                <i class="ni ni-planet"></i>
                            </div>
                            <div>
                                <span class="badge badge-pill badge-info">DELUXE</span>
                            </div>
                            <h6 class="text-info text-uppercase"><b>500 000 FCFA</b></h6>
                            <p><i class="ni ni-check-bold text-success"></i> <span class="badge badge-pill badge-warning">Option Gold inclue</span></p>
                            <p><i class="ni ni-check-bold text-success"></i> Un PC offert</p>
                            <a href="#" class="btn btn-info mt-4">Détails</a>
                        </div>
                    </div>
                </div>--}}

            </div>

        </div>
    </section>

    <section class="section section-lg pt-0">
        <div class="container">
            <div class="card bg-gradient-warning shadow-lg border-0">
                <div class="p-5">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h3 class="text-white">Réduction</h3>
                            <p class="lead text-white mt-3">
                                Inscrivez vous dès maintenant via le site et bénéficiez d'ne réduction de <b class="display-3">20%</b> pour votre première année d'utilisation
                                sur tous les packs Soochool.
                            </p>
                        </div>
                        <div class="col-lg-3 ml-lg-auto">
                            <a href="https://www.creative-tim.com/product/argon-design-system" class="btn btn-lg btn-block btn-white">S'inscrire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--Get it--}}
    <section class="section section-lg bg-gradient-default">
        <div class="container pt-lg pb-300">
            <div class="row text-center justify-content-center">
                <div class="col-lg-10">
                    <h2 class="display-3 text-white">Comment avoir SOOCHOOL ?</h2>
                    <p class="lead text-white">
                        C'est très simple. Obtenez Soochool Vie Scolaire pour votre établissement en 3 étapes.
                    </p>
                </div>
            </div>
            <div class="row row-grid mt-5">
                <div class="col-lg-4">
                    <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                        <i class="ni ni-settings text-primary"></i>
                    </div>
                    <h5 class="text-white mt-3">Préinscription</h5>
                    <p class="text-white mt-3">
                        Inscrivez vous! ou plutôt inscrivez votre établissement via le formulaire simple proposé ci-dessous.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                        <i class="ni ni-ruler-pencil text-primary"></i>
                    </div>
                    <h5 class="text-white mt-3">Rendez-vous</h5>
                    <p class="text-white mt-3">
                        Proposez une date de rencontre. Une équipe du group Soochool se déplacera vers vous
                        afin de mieux vous expliquer les avantages et les fonctionnalités,les modalité d'obtentions de l'outils Soochool.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                        <i class="ni ni-atom text-primary"></i>
                    </div>
                    <h5 class="text-white mt-3">Inscription</h5>
                    <p class="text-white mt-3">
                        Une fois que vous etes pret à faire passer votre établissement scolaire dans un monde nouveau, vous aurez à remplir
                        un formulaire qui nous permettra de paramètrer Soochool avec les informations de votre
                        prestigieux établissement.
                    </p>
                </div>
            </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
    {{--Subscription form--}}
    <section class="section section-lg pt-lg-0 section-contact-us">
        <div class="container">
            <div class="row justify-content-center mt--300">
                <div class="col-lg-8">
                    <div class="card bg-gradient-secondary shadow">
                        <div class="card-body p-lg-5">
                            <h4 class="mb-1">Inscrivez vous gratuitement en replissant ce formulaire</h4>
                            <p class="mt-0">Nous vous contacterons dans les plus bref délais.</p>
                            <form action="">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Nom" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Prénoms" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Profession" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Contact" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Nom de l'établissement" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Contact" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Type d'établissement" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Adresse (Ville, quartier, en face de...)" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <textarea class="form-control form-control-alternative" name="name" rows="4" cols="80" placeholder="Une suggestion !"></textarea>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-default btn-round btn-block btn-lg">Préinsciption</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--Testimony--}}
    <section class="section bg-gradient-secondary  section-lg">
        <div class="container">
            <div class="row row-grid justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="display-3">Votre meilleur outils pour la gestion de votre vie scolaire
                        <span class="text-success">Témoignages</span>
                    </h2>
                    <div id="carouselTestimony" class="carousel slide" data-ride="carousel">
                        {{--<ol class="carousel-indicators">
                            <li data-target="#carouselTestimony" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselTestimony" data-slide-to="1"></li>
                            <li data-target="#carouselTestimony" data-slide-to="2"></li>
                            <li data-target="#carouselTestimony" data-slide-to="3"></li>
                            <li data-target="#carouselTestimony" data-slide-to="4"></li>
                        </ol>--}}
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="">
                                    <div class="px-4">
                                        <img src="{{ asset('assets/argon/img/theme/team-1-800x800.jpg') }}" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;">
                                        <div class="pt-4 text-center">
                                            <h5 class="title">
                                                <span class="d-block mb-1">Elisabeth Vaughn</span>
                                                <small class="h6 text-muted">Directrice du Collège Espoir de Kakavéli</small>
                                            </h5>
                                        </div>
                                    </div>
                                    <p class="lead">
                                        L'application Soochool nous a permis à moi et à mon équipe pédagogique de facilement repérer les élèves en échec
                                        scolaire notamment grace à ses outils de statistiques. Celà nous permis d'agir en amont en mettant en place
                                        des solutions de redressement (Cours de soutient obligatoire,etc). Grace à cet outils il sous ai possible de
                                        prévoir les échecs et d'augmenter nos taux de réussite.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="">
                                    <div class="px-4">
                                        <img src="{{ asset('assets/argon/img/theme/team-2-800x800.jpg') }}" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;">
                                        <div class="pt-4 text-center">
                                            <h5 class="title">
                                                <span class="d-block mb-1">Jean Tompson</span>
                                                <small class="h6 text-muted">Professeur de Mathématiques au Collège-Lycée Anonaï</small>
                                            </h5>
                                        </div>
                                    </div>
                                    <p class="lead">
                                        Soochool me permet d'avoir un suivi en temps réel sur les performance de mes élèves et me permet
                                        de comparer les élèves entre eux afin de détecter leur problèmes afin d'agir rapidement pour compenser leur faiblesse.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="">
                                    <div class="px-4">
                                        <img src="{{ asset('assets/argon/img/theme/team-3-800x800.jpg') }}" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;">
                                        <div class="pt-4 text-center">
                                            <h5 class="title">
                                                <span class="d-block mb-1">Ryan Soukouya</span>
                                                <small class="h6 text-muted">Senseur au Collège Combridge d'Agoe</small>
                                            </h5>
                                        </div>
                                    </div>
                                    <p class="lead">
                                        L'application Soochool m'a permis de connaître les performances de notre établissement et de les comparer aux objectifs
                                        qu’on s'était fixés tant au niveau des résultats académiques que de la discipline.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="">
                                    <div class="px-4">
                                        <img src="{{ asset('assets/argon/img/theme/team-4-800x800.jpg') }}" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;">
                                        <div class="pt-4 text-center">
                                            <h5 class="title">
                                                <span class="d-block mb-1">Billy Bones</span>
                                                <small class="h6 text-muted">Parent d'élève</small>
                                            </h5>
                                        </div>
                                    </div>
                                    <p class="lead">
                                        Cette application me permet de suivre les performance de mes enfants meme lorsque je suis en voyage. Je
                                        reçois aussi les communiqués de l'établissement sous forme de notifications. Cela me permet d'être
                                        connecté à l'école de mes enfants.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="">
                                    <div class="px-4">
                                        <img src="{{ asset('assets/argon/img/theme/team-4-800x800.jpg') }}" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;">
                                        <div class="pt-4 text-center">
                                            <h5 class="title">
                                                <span class="d-block mb-1">Jane Doe</span>
                                                <small class="h6 text-muted">Parent d'élève</small>
                                            </h5>
                                        </div>
                                    </div>
                                    <p class="lead">
                                        Soochool à permis à ma fille de comparer ses perfomances (notes) à celles de ses camarades de classes. Cela
                                        lui a permis de prendre conscience de son manque d'application au travail. Elle s'est mise à redoubler d'éffort
                                        et a améliorer ses notes. Cette application peut permettre aux élèves de connaitre leur force et leur faiblesse.
                                    </p>
                                </div>
                            </div>

                        </div>
                        <a class="carousel-control-prev" href="#carouselTestimony" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselTestimony" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <div class="container container-lg">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <div class="card card-lift--hover shadow border-0">
                    <a href="../examples/landing.html" title="Landing Page">
                        <img src="{{ asset('assets/argon/img/theme/landing.jpg') }}" class="card-img">
                    </a>
                </div>
            </div>
            <div class="col-md-6 mb-5 mb-lg-0">
                <div class="card card-lift--hover shadow border-0">
                    <a href="../examples/profile.html" title="Profile Page">
                        <img src="{{ asset('assets/argon/img/theme/profile.jpg') }}" class="card-img">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection