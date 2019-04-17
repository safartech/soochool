<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('shuffle','AppController@noteShuffle');

//Route::get('get_books','Admin\BulletinController@getBooks');

Route::get('/', function () {
    return view('welcome');
});

Route::get('default',function (){
    return view('default');
});


//Landing pages
Route::get('argon',function (){
    return view('landing.home');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::resource('eleves','EleveController');
Route::resource('responsables','ResponsableController');
Route::resource('personnels','PersonnelController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Cette route sert à réinitialisez la BDD en vidant les tables
//Route::get('initialize','ProjectController@initializeProject');
Route::group(['prefix'=>'test'],function(){
    Route::get('aloha','TestController@aloha');
});


Route::get('beautymail', function()
{
    $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
    $beautymail->send('emails.test.beautymail.sunny', [], function($message)
    {
        $message
            ->from('bar@example.com')
            ->to('samfarid.dev@gmail.com', 'John Smith')
            ->subject('Welcome!');
    });

});


/*
 * Pour toutes les requetes ajax,
 * avev Vue.js et Axios
 *
 */

Route::get('test',function(){
   return view('test');
});

Route::group(['prefix'=>'ajax'],function(){

    Route::group(['prefix'=>'bulletins'],function (){
        Route::get('load_datas_for_bloc_moy','Admin\BulletinController@loadDatasForBlocMoy');
        Route::post('process_bloc_moyennes','Admin\BulletinController@processBlocMoyennes');
        Route::post('process_bloc_moyennes_for_classes','Admin\BulletinController@processBlocMoyennesForClasses');
        Route::post('process_bloc_moyennes_gen_for_classes','Admin\BulletinController@processBlocMoyennesGenForClasses');
        Route::post('determine_ranks_in_classes','Admin\BulletinController@determineRanksInClasses');
        Route::post('generate_appreciations_for_classes','Admin\BulletinController@generateAppreciationsForClasses');
        Route::get('process_bloc_moyennes_for_eleve/{eleve_id}/{session_id}','Admin\BulletinController@processBlocMoyennesForEleve');
        Route::get('process_bloc_moyennes_gen_for_eleve/{eleve_id}/{session_id}','Admin\BulletinController@processBlocMoyennesGenForEleve');
        Route::put('update_appreciation_generale/{id}','Admin\BulletinController@updateAppreciationGenerale');

        Route::get('print_bulletin_of_eleve/{eleve_id}/{session_id}','Admin\BulletinController@printBulletinOfEleve');
        Route::post('generate_multiple_bulletin','Admin\BulletinController@generateMultipleBulletin');
        Route::get('print_multiple_bulletin/{classe_id}/{session_id}','Admin\BulletinController@printMultipleBulletin');

    });

    Route::get('load_dashboard','Admin\DashboardController@loadDashboard');

    /**
     *
     * PROTECTED MODULES
     */
    //ASSIDUITES
    Route::get('load_conseil_datas','Ajax\ConseilController@loadConseilDatas');
    Route::post('set_conseil_for_eleve','Ajax\ConseilController@setConseil');

    //INTERVENTIONS
    Route::get('load_interventions','Ajax\InterventionController@loadInterventions');
    Route::post('set_intervention','Ajax\InterventionController@setIntervention');
    Route::post('create_multiple_interventions','Ajax\InterventionController@createMultiple');

    /*
     * Retard
     */
    Route::get('load_classes_eleves_from_retard','Retard\RetardController@showEleves');
    Route::post('store/retard','Retard\RetardController@storeRetard');

    /*
     * HOME PAGE
     */
    Route::get('load_prof_home','HomeController@loadProfHome');
    Route::get('load_admin_home','HomeController@loadAdminHome');
    Route::get('load_parent_home','HomeController@loadParentHome');

    /*
     * Admin Ajax routes
     *
     */

    //Messages
    //Email
    Route::get('load_emails_from_admin','Admin\MessageController@loadEmailsFromAdmin');
    Route::post('send_mail_from_admin','Admin\MessageController@sendMailFromAdmin');
    Route::get('load_sms_from_admin','Admin\MessageController@loadSMSFromAdmin');
    Route::post('send_sms_from_admin','Admin\MessageController@sendSMSFromAdmin');



    //Eleve
    Route::get('load_eleves','Admin\EleveController@loadEleves');
    Route::post('add_eleve','Admin\EleveController@store');

    //Paiement
    Route::get('Payements','Admin\EleveController@Payement')->name('elevePayement');////////////////////////////////////////////////////////////////
    Route::get('Payement','Admin\EleveController@index2')->name('indexEleve');
    Route::get('PayementParent','Parent\ParentController@Payement')->name('ParentPayement');


    //Annexe eleve
    Route::get('delete_eleve/{id}','Admin\EleveController@destroy');
    Route::put('update_Eleve/{id}','Admin\EleveController@updateEleves');

    //Responsables
    Route::get('load_responsables','Admin\ResponsableController@loadResponsables');
    Route::post('add_responsable','Admin\ResponsableController@store');
    Route::get('delete_responsable/{id}','Admin\ResponsableController@destroy');
    Route::put('update_Responsable/{id}','Admin\ResponsableController@updateResponsables');



    //Parent
    Route::get('Parent','Parent\ParentController@index')->name('indexParent');


    //PERSONNEL
    Route::get('load_personnels','Admin\PersonnelController@loadPersonnels');
    Route::post('add_personnel','Admin\PersonnelController@store');
    Route::get('delete_personnel/{id}','Admin\PersonnelController@destroy');
    Route::put('update_personnel/{id}','Admin\PersonnelController@updatePersonnels');

    //Matiere
    Route::get('load_matieres_datas','Admin\MatiereController@loadMatieresDatas');

    Route::put('update_matiere/{id}','Admin\MatiereController@updateMatieres');
    Route::post('add_matiere','Admin\MatiereController@store');


    //Blog
    Route::get('load_poste','Admin\BlogController@loadPost');
    Route::post('add_poste','Admin\BlogController@store');
    Route::post('add_comment','Admin\BlogController@storecomment');
    Route::put('update_poste/{id}','Admin\BlogController@updateposte');
    Route::put('loadposte_User/{id}','Admin\BlogController@loaduser');
    Route::get('delete_post/{id}','Admin\BlogController@destroy');
    Route::get('delete_comment/{id}','Admin\BlogController@destroyComment');

    Route::put('update_settingUser','Admin\AccountController@update');
    Route::get('load_mail','Admin\AccountController@load_mail');

    Route::get('delete_matiere/{id}','Admin\MatiereController@destroy');
    Route::post('add_payement','Admin\PayementController@store');
    Route::post('add_newPayement','Admin\PayementController@addpaye');
    Route::get('load_payement','Admin\PayementController@loadPayement');
    Route::put('update_payement/{id}','Admin\PayementController@update');

    /**
     * Scolarite Espace
     */
    Route::get('load_scolarite','Admin\ScolariteController@loadScolarite');
    Route::put('update_scolarite/{id}','Admin\ScolariteController@update');
    Route::post('add_scolarite','Admin\ScolariteController@store');

    /**
     * EVALUATIONS
     */
    // NOTES
    //Admin
    Route::get('load_notes_datas_from_admin','Admin\EvaluationController@loadNotesDatasFromAdmin');
    //Prof
    Route::get('load_notes_datas_from_prof','Prof\EvaluationController@loadNotesDatasFromProf');

    //All
    Route::get('load_evaluations/{classe_id}/{matiere_id}/{session_id}','EvaluationController@loadEvaluations');
    Route::get('delete_evaluation/{evaluation_id}','EvaluationController@deleteEvaluation');
    Route::put('update_evaluation/{evaluation_id}','EvaluationController@updateEvaluation');
    Route::post('create_evaluation','EvaluationController@createEvaluation');
    Route::post('update_note','EvaluationController@updateNote');

    /*
     * BULLETIN
     */
    //Admin
    Route::get('load_bulletins_datas_from_admin','Admin\EvaluationController@loadBulletinsDatasFromAdmin');
    //Prof
    Route::get('load_bulletins_datas_from_prof','Prof\EvaluationController@loadBulletinsDatasFromProf');
    Route::get('load_bulletin_of_eleve_from_admin/{eleve_id}/{session_id}','Admin\EvaluationController@loadBulletinOfEleveFromAdmin');
    Route::post('set_appreciation','Admin\EvaluationController@setAppreciation');


    /*
     * PLANNING
     */
    // CLASSES
    Route::get('load_planning_for_classes_from_admin','PlanningController@loadPlanningForClassesFromAdmin');
    Route::get('load_classe_horaire/{classe_id}','PlanningController@loadClasseHoraire');
    Route::post('create_cours','PlanningController@createCours');
    Route::post('store_cdt','PlanningController@storeCdt');

    // PROFS (ken)
    Route::get('load_planning_for_profs_from_admin','PlanningController@loadPlanningForProfsFromAdmin');
    Route::get('load_prof_horaire/{prof_id}','PlanningController@loadProfHoraire');

    /*
     * CLASSES
     */
    Route::get('liste_classes','Admin\ClasseController@liste_classes');


    /*
     * IMPRESSION
     */
    Route::get('print_bulletin_of_eleve/{eleve_id}/{sessionId}/{see}','AppController@printBulettinOfEleve');
//    Route::get('see_bulletin_of_eleve/{eleve_id}/{sessionId}','AppController@seeBulettinOfEleve');


    /**
     *  AJAX ESPACE PARENT
     */
    //Planning elèves
    Route::get('load_planning_for_students_from_parent','Parent\PlanningController@loadPlanningForParents');
    Route::get('load_classe_horaire/{classe_id}','Parent\PlanningController@loadClasseHoraire');
    Route::post('create_cours','Parent\PlanningController@createCours');
    Route::post('store_cdt','Parent\PlanningController@storeCdt');

    //Evaluations élèves
    Route::get('load_notes_datas_from_parent','Parent\EvaluationController@loadNotesDatasFromParent');
    Route::get('load_bulletins_datas_from_parent','Parent\EvaluationController@loadBulletinsDatasFromParent');
    Route::get('load_evaluations_parent/{eleve_id}/{matiere_id}/{session_id}','Parent\EvaluationController@loadEvaluations');


    //ABSENCES
    Route::get('load_planning_for_classes_with_absences','Ajax\AbsenceController@loadPlanningWithAbsences');
    Route::post('set_absents','Ajax\AbsenceController@setAbsents');

    //RETARD
    Route::get('load_retards_datas','Ajax\RetardController@loadDatas');
    Route::post('set_eleve_as_late','Ajax\RetardController@setEleveAsLate');

});

/*
 * Tout les liens auth
 *
 */

Route::group(['middleware'=>'auth'],function(){

    Route::get('conseil','BasicController@showConseilPage')->name('conseil');
    Route::get('retards','BasicController@showRetardsPages')->name('retards');
    Route::get('absences','BasicController@showAbsencesPages')->name('absences');

    Route::get('interventions','BasicController@showInterventionsPage')->name('interventions');
    Route::get('coef','BasicController@showCoefPage')->name('coef');
    Route::get('conseil','BasicController@showConseilPage')->name('conseil');

    /*
    * Retards
    */
    Route::group(['prefix'=>"retards",'as'=>'retards.'],function(){
        //  Route::get('eleves','Retard\RetardController@showEleves')->name('eleves');
        Route::get('retard','Retard\RetardController@showRetardPage')->name('retard');
    });


    Route::group(['prefix'=>'bulletins','as'=>'bulletins.'],function (){
        Route::get('moyennes','Admin\BulletinController@showMoyennesPage')->name('moyennes');
        Route::get('appreciations','Admin\BulletinController@showAppreciationsPage')->name('appreciations');
        Route::get('ag','Admin\BulletinController@showgeneralAGPage')->name('ag');
        Route::get('mg','Admin\BulletinController@showgeneralMGPage')->name('mg');
        Route::get('settings','Admin\BulletinController@showSettingsPage')->name('settings');
        Route::get('impression','Admin\BulletinController@showPrintPage')->name('print');
    });

    /*
     * Tous les lien relatif à l'Espace Admin
     *
     * prefix=>admin = page bloqued // already use by voyager
     */
    Route::group(['as'=>'admin.'],function (){

        Route::group(['prefix'=>"evaluations",'as'=>'evaluations.'],function(){
            Route::get('notes','Admin\EvaluationController@showNotesPage')->name('notes');
            Route::get('compos','Admin\EvaluationController@showComposPage')->name('compos');
            Route::get('releves','Admin\EvaluationController@showRelevesPage')->name('releves');
            Route::get('bulletins','Admin\EvaluationController@showBulletinsPage')->name('bulletins');
        });

        Route::group(['prefix'=>'planning','as'=>'planning.'],function(){
            Route::get('classes',"Admin\PlanningController@showClassePage")->name('classes');
            Route::get('profs',"Admin\PlanningController@showProfPage")->name('profs');
            Route::get('salles',"Admin\PlanningController@showSallePage")->name('salles');
        });

        Route::group(['prefix'=>'messages','as'=>'msg.'],function(){
            Route::get('email','Admin\MessageController@showEmailPage')->name('email');
            Route::get('sms','Admin\MessageController@showSMSPage')->name('sms');
        });

        Route::get('classes','Admin\ClasseController@liste')->name('classes');
        Route::get('matieres','Admin\MatiereController@index')->name('matieres.index');

        Route::get('eleves','Admin\EleveController@index')->name('eleves.index');
        Route::get('responsables','Admin\ResponsableController@index')->name('responsables.index');
        Route::get('Personnels','Admin\PersonnelController@index')->name('personnels.index');

        Route::get('Blog','Admin\BlogController@index')->name('blog');
        Route::get('Payements','Admin\PayementController@index')->name('payement.index');
        Route::get('Scolarite','Admin\ScolariteController@index')->name('scolarite.index');
        Route::get('eleves','Admin\EleveController@index')->name('eleves.index');
        Route::get('responsables','Admin\ResponsableController@index')->name('responsables.index');
        Route::get('Personnels','Admin\PersonnelController@index')->name('personnels.index');
        Route::get('account','Admin\AccountController@index')->name('accountsetting');

    });
    /*
     * Tous les lien relatif à l'Espace Prof
     */
    Route::group(['prefix'=>'prof', 'as'=>'prof.'],function (){
        Route::group(['prefix'=>"evaluations",'as'=>'evaluations.'],function(){
            Route::get('notes','Prof\EvaluationController@showNotesPage')->name('notes');
            Route::get('compos','Prof\EvaluationController@showComposPage')->name('compos');
            Route::get('releves','Prof\EvaluationController@showRelevesPage')->name('releves');
            Route::get('bulletins','Prof\EvaluationController@showBulletinsPage')->name('bulletins');
        });

    });

    /*
     * Tous les lien relatif à l'Espace Parent
     */
    Route::group(['prefix'=>'parent', 'as'=>'parent.'],function (){
        Route::get('planning','Parent\PlanningController@showPlanningPage')->name('planning');
        Route::get('evaluations','Parent\EvaluationController@showEvaluationPage')->name('evaluations');

        //Evaluations
        Route::group(['prefix'=>"evaluations",'as'=>'evaluations.'],function(){
            Route::get('notes','Parent\EvaluationController@showNotesPage')->name('notes');
//            Route::get('compos','Parent\EvaluationController@showComposPage')->name('compos');
            Route::get('releves','Parent\EvaluationController@showRelevesPage')->name('releves');
            Route::get('bulletins','Parent\EvaluationController@showBulletinsPage')->name('bulletins');
        });

        //Evaluations
        Route::group(['prefix'=>"evaluations",'as'=>'evaluations.'],function(){
            Route::get('notes','Parent\EvaluationController@showNotesPage')->name('notes');
            Route::get('compos','Parent\EvaluationController@showComposPage')->name('compos');
            Route::get('releves','Parent\EvaluationController@showRelevesPage')->name('releves');
            Route::get('bulletins','Parent\EvaluationController@showBulletinsPage')->name('bulletins');
        });
    });


    /*
     * Impressions
     */

    Route::get('print_bulletin_of_eleve/{eleve_id}/{sessionId}','AppController@printBulettinOfEleve');
});


