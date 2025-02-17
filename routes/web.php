<?php

use App\Http\Controllers\BFI2XSController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Questionnaire;
use App\Http\Controllers\QuestionnairesController;
use App\Http\Controllers\StPIIBController;
use App\Http\Controllers\TEIQueSFController;
use App\Http\Controllers\TrainingReactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\Livewire\TermsOfServiceController;
use Illuminate\Http\Request;

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

Route::get('/information-sheet', [\App\Http\Controllers\Controller::class, 'download_info_sheet'])
    ->name('download_information_sheet');


Route::get('/', function () {
    //return redirect()->route('login');
    return redirect()->route('welcome');
});

Route::get('/no-consent', function () {
    return view("informed_consent_declined");
})->name('no_consent');

Route::get('/consent-grant', function (){
    session(['consent' => '1']);
    session(['startStudy' => '1']);
    //return redirect(route('questionnaires'));
    return redirect(route('show', ['folder' => 'inbox']));
})->name('consent');

Route::middleware([
    //'auth:sanctum',
    config('jetstream.auth_session'),
    //'verified'
])->group(function (){
    Route::get('/warning_log', [MailController::class, 'warningLog'])->name('warning_log');
});

Route::middleware([
    //'auth:sanctum',
    config('jetstream.auth_session'),
    //'verified',
    \App\Http\Middleware\StudyAuth::class,
    'log'
])->group(function () {

    Route::get('/welcome', function () {
        if (Auth::user()->followUpQuestionnaire != null) {  // study already completed
            return redirect(route('thankyou'));
        } else {
            if (session()->has('consent')) {
                return redirect(route('show', ['folder' => 'inbox']));
                //return redirect(route('questionnaires'));
            }
            else {
                return view('welcome');
            }
        }
    })->name('welcome');

    Route::get('/nextstep/{id?}', function ($id = null){
        if($id === null) {
            return redirect(route('show', ['folder' => 'inbox']));
        }
        return view("emailquestionnaire")->with('warning_type', Auth::user()->warning_type);
    })->name('next_step');

    Route::post('/nextstep/{mail?}', [Questionnaire::class, 'storeEmailQuestionnaire']); //->name('next_step');

    Route::get('/finish', function (){
        return view("thank_you_page");
    })->name('thankyou');

    Route::get('/debriefing', function() {
        return view('debriefing');
    })->name('debriefing');

    Route::get('/training', function() {
        return view('training');
    })->name('training');

    Route::get('/set-post-phase', function () {
        session(['post_phase' => true]);
        session(['startStudy' => '1']); //show again the popup message for the post classification
        return redirect()->route('show', ['folder' => 'inbox']);
    })->name('setPostPhase');    

    Route::get('/end', [Questionnaire::class, 'showFollowUp'])->name('post_test');
    Route::post('/end', [Questionnaire::class, 'storeFollowUp']);

    Route::get('/warning_browser', [MailController::class, 'warning_browser'])->name('warning_browser');

    Route::get('/{folder?}/{id?}', [MailController::class, 'show'])->name('show');

    Route::get('/questionnaires', [QuestionnairesController::class, 'index'])->name('questionnaires');

    Route::post('/big-five-inventory', [BFI2XSController::class, 'create'])->name('big-five-inventory.create');
    Route::post('/susceptibility-to-persuasion-ii', [StPIIBController::class, 'create'])->name('susceptibility-to-persuasion-ii.create');
    Route::post('/trait-emotional-intelligence', [TEIQueSFController::class, 'create'])->name('trait-emotional-intelligence.create');
    Route::post('/training-reaction-questionnaire', [TrainingReactionController::class, 'create'])->name('training-reaction-questionnaire.create');

    Route::post('/questionnaire1', [QuestionnairesController::class, 'showQuestionnaire1'])->name('questionnaire1');
    Route::get('/questionnaire2', [QuestionnairesController::class, 'showQuestionnaire2'])->name('questionnaire2');
    Route::get('/questionnaire3', [QuestionnairesController::class, 'showQuestionnaire3'])->name('questionnaire3');
    Route::get('/questionnaire4', [QuestionnairesController::class, 'showQuestionnaire4'])->name('questionnaire4');

    Route::post('/save-email-classification', [QuestionnairesController::class, 'saveEmailClassification'])->name('save-email-classification');
    Route::get('/final-data', [QuestionnairesController::class, 'finalData'])->name('final-data');
    Route::post('/save-final-data', [QuestionnairesController::class, 'saveFinalData'])->name('save-final-data');


    Route::post('/set-session', function (Request $request) {
        $questionnaire = $request->input('questionnaire');
        session([$questionnaire => true]);

        if ($questionnaire === 'questionnaires_done') {
            return redirect(route('show', ['folder' => 'inbox']));
        }

        return redirect()->route(str_replace('_view', '', $questionnaire));
    })->name('set.session');
    
});
