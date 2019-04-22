<div class="main-menu menu-fixed menu-border menu-bordered menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span data-i18n="nav.category.admin-panels">Administration</span><i class="ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i></li>

            <li class=" nav-item"><a href="{{ route('home') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Admin Home</span></a>

            <li class=" nav-item"><a href="{{ route('voyager.dashboard') }}"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>

            <li class=" navigation-header"><span data-i18n="nav.category.admin-panels">Ressources</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i>
            </li>
            {{--Ressources--}}
            <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title" data-i18n="nav.project.main">Ressources</span></a>
                <ul class="menu-content">
                    <li class=" menu-item"><a href="#!"><i class="la la-bank"></i><span class="menu-title" data-i18n="">Parcours</span></a>
                    <li class=" menu-item"><a href="{{ route('admin.classes') }}"><i class="la la-bank"></i><span class="menu-title" data-i18n="">Classes</span></a>
                    <li class=" menu-item"><a href="{{ route('admin.matieres.index') }}"><i class="la la-bank"></i><span class="menu-title" data-i18n="">Matières</span></a>
                </ul>
            </li>

            {{--Academic--}}
            <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title" data-i18n="nav.project.main">Académiques</span></a>
                <ul class="menu-content">
                    <li class=" menu-item"><a href="{{ route('interventions') }}"><i class="la la-plane"></i><span class="menu-title" data-i18n="">Interventions</span></a></li>
                </ul>
            </li>

            {{--RH--}}
            <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title" data-i18n="nav.project.main">Ressources Humaines</span></a>
                <ul class="menu-content">
                    <li class=" menu-item"><a href="{{ route('admin.eleves.index') }}"><i class="la la-bank"></i><span class="menu-title" data-i18n="">Elèves</span></a>
                    <li class=" menu-item"><a href="{{ route('admin.responsables.index') }}"><i class="la la-bank"></i><span class="menu-title" data-i18n="">Responsables</span></a>
                    <li class=" menu-item"><a href="{{ route('admin.personnels.index') }}"><i class="la la-bank"></i><span class="menu-title" data-i18n="">Personnels</span></a></li>
                </ul>
            </li>

            {{--Emploi du temps--}}
            <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title" data-i18n="nav.project.main">Emploi du temps</span></a>
                <ul class="menu-content">
                    <li class=" menu-item"><a href="{{ route('admin.planning.classes') }}"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.dash.main">Classes</span></a>
                    <li class=" menu-item"><a href="{{ route('admin.planning.profs') }}"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.dash.main">Enseignants</span></a>
{{--                    <li class=" menu-item"><a href="{{ route('admin.planning.salles') }}"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.dash.main">Salles</span></a>--}}

                </ul>
            </li>

            {{--Vie scolaire--}}
            <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title" data-i18n="nav.project.main">Vie Scolaire</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('admin.view.vs.retards') }}" data-i18n="nav.project.project_summary">Retards</a></li>
                    <li><a class="menu-item" href="{{ route('admin.view.vs.absences') }}" data-i18n="nav.project.project_tasks">Absences</a></li>
                    <li><a class="menu-item" href="{{ route('admin.view.vs.cdt') }}" data-i18n="nav.project.project_tasks">Cahiers de texte</a></li>
                    <li><a class="menu-item" href="{{ route('admin.view.vs.dm') }}" data-i18n="nav.project.project_tasks">Devoirs de maison</a></li>
                </ul>
            </li>

            {{--Evaluations--}}
            <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title" data-i18n="nav.project.main">Evaluations</span></a>
                <ul class="menu-content">
                    <li class=" menu-item"><a href="{{ route('admin.evaluations.notes') }}"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.dash.main">Notes</span></a>
                    <li class=" menu-item"><a href="{{ route('admin.evaluations.releves') }}"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.dash.main">Releves de notes</span></a>
                    <li class=" menu-item"><a href="{{ route('admin.evaluations.bulletins') }}"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.dash.main">Bulletins</span></a>

                </ul>
            </li>

            {{--Communication--}}
            <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title" data-i18n="nav.project.main">Communication</span></a>
                <ul class="menu-content">
                    <li class=" menu-item"><a href="#!"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.dash.main">Communiqués</span></a>
                    <li class=" menu-item"><a href="{{ route('admin.msg.email') }}"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.dash.main">Emails</span></a>
                    <li class=" menu-item"><a href="{{ route('admin.msg.sms') }}"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.dash.main">SMS</span></a>

                </ul>
            </li>


            {{--Scolarité--}}
            <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title" data-i18n="nav.project.main">Scolarité</span></a>
                <ul class="menu-content">
                    <li class=" menu-item"><a href="{{ route('admin.payement.index') }}"><i class="la la-bitcoin"></i><span class="menu-title" data-i18n="">Paiement</span></a></li>
                    <li class=" menu-item"><a href="{{ route('admin.scolarite.index') }}"><i class="la la-tag"></i><span class="menu-title" data-i18n="">Scolarite</span></a></li>

                </ul>
            </li>


            <li class=" nav-item"><a href="{{ route('bulletins.moyennes') }}"><i class="la la-bank"></i><span class="menu-title" data-i18n="">Bulletins</span></a></li>





            {{--<li class=" nav-item"><a href="{{ route('conseil') }}"><i class="la la-shopping-cart"></i><span class="menu-title" data-i18n="">Conseil</span></a></li>--}}
            {{--<li class=" nav-item"><a href="{{ route('admin.blog') }}"><i class="la la-stethoscope"></i><span class="menu-title" data-i18n="">Blog</span></a></li>--}}


            <li class=" navigation-header"><span data-i18n="nav.category.apps">Paramètres</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i></li>

            <li class=" nav-item">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon mdi mdi-power"></i>
                        <span>Déconnexion</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
            </li>


            <li class=" navigation-header"><span data-i18n="nav.category.support">Support</span><i class="ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Support"></i>
            </li>
            <li class=" nav-item"><a href="http://support.pixinvent.com/"><i class="la la-support"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Raise Support</span></a>
            </li>
            <li class=" nav-item"><a href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/documentation"><i class="la la-text-height"></i><span class="menu-title" data-i18n="nav.support_documentation.main">Documentation</span></a>
            </li>
        </ul>
    </div>
</div>