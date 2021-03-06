<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Frontend\IssueController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\ActivityController;
use App\Http\Controllers\Frontend\FormController;
use App\Http\Controllers\Frontend\ReplyController;
use App\Http\Controllers\Frontend\ActivityFormController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use Tabuna\Breadcrumbs\Trail;


/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });
Route::get('issues', [IssueController::class, 'index'])->name('issues.index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Issues'), route('frontend.issues.index'));
    });
Route::get('issues/{slug}', [IssueController::class, 'getSingleIssue'])->name('issues.getSingleIssue')
->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')
        ->push(__('Single Issues'), route('frontend.issues.getSingleIssue'));
});
Route::get('about', [AboutController::class, 'index'])->name('about.index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('About'), route('frontend.about.index'));
    });
Route::get('contact', [ContactController::class, 'index'])->name('contact.index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Contact'), route('frontend.contact.index'));
    });

Route::get('calendaractivities', [ActivityController::class, 'indexcalendar'])->name('activities.indexcalendar')
->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')
        ->push(__('Activities'), route('frontend.activities.indexcalendar'));
});

Route::get('activities', [ActivityController::class, 'index'])->name('activities.index')
->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')
        ->push(__('Activities'), route('frontend.activities.index'));
});

Route::get('form', [FormController::class, 'index'])->name('forms.index')
->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')
        ->push(__('Forms'), route('frontend.forms.index'));
});

Route::post('form/plenary', [FormController::class, 'storeplenary'])->name('forms.storeplenary');
Route::post('form/visit', [FormController::class, 'storevisit'])->name('forms.storevisit');
Route::post('form/activityform', [ActivityFormController::class, 'store'])->name('forms.activityform');
Route::group([ 'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {   


Route::post('addissues', [IssueController::class, 'store'])->name('issues.store');
Route::post('addcomment', [CommentController::class, 'store'])->name('comment.store');
Route::post('addreply', [ReplyController::class, 'store'])->name('reply.store');



});

