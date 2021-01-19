<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Report\ReportController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\School\SchoolController;
use App\Http\Controllers\Backend\Student\StudentController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Backend\Role\RoleController;
use App\Http\Controllers\Backend\User\DeactivatedUserController;
use App\Http\Controllers\Backend\User\DeletedUserController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\User\UserPasswordController;
use App\Http\Controllers\Backend\User\UserSessionController;
use App\Http\Controllers\Backend\Activity\ActivityManagerController;
use App\Http\Controllers\Backend\Activity\ActivityFormManagerController;
use App\Http\Controllers\Backend\Issue\IssueManagerController;
use App\Http\Controllers\Backend\Settings\SettingsController;
use App\Http\Controllers\Backend\Tags\TagManagerController;
use App\Http\Controllers\Backend\Form\FormManagerController;
use App\Http\Controllers\Backend\MailManagerController;
use App\Http\Controllers\Backend\Comment\CommentManagerController;
use App\Models\City;
use App\Models\Role;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use App\Models\Activity;
use Tabuna\Breadcrumbs\Trail;


/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::redirect('/', '/admin/dashboard', 301);
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'));
        });
    
    Route::group([
        'prefix' => 'activities',
        'as' => 'activities.',
        'middleware' => 'permission:admin.access.activity.view' ,
    ], function(){
        Route::get('/', [ActivityManagerController::class, 'index'])
              ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('translator.actvities_title'), route('admin.activities.index'));
        });
        Route::get('show/{activity}', [ActivityManagerController::class, 'show'])
        ->name('show')
        ->middleware('permission:admin.access.activity.edit')
        ->breadcrumbs(function (Trail $trail, Activity $activity) {
            $trail->parent('admin.activities.index')
                ->push(__(':activity', ['activity' => $activity->title]), route('admin.activities.show', $activity));
        });
       
        Route::get('deleted', [ActivityManagerController::class, 'deleted'])
        ->name('deleted')
        ->middleware('permission:admin.access.activity.view-deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.activities.index')
                ->push(__('translator.deleted_actvities_title'), route('admin.activities.deleted'));
        });     
        Route::post('/', [ActivityManagerController::class, 'store'])
        ->middleware('permission:admin.access.activity.add')
        ->name('store'); 
        Route::post('/update', [ActivityManagerController::class, 'update'])
        ->middleware('permission:admin.access.activity.edit')
        ->name('update'); 
        Route::post('/destroy', [ActivityManagerController::class, 'destroy'])
        ->middleware('permission:admin.access.activity.delete')
        ->name('destroy');
        Route::post('/status', [ActivityManagerController::class, 'updatestatus'])
        ->middleware('permission:admin.access.activity.edit')
        ->name('updatestatus');  
        Route::post('/restore', [ActivityManagerController::class, 'restore'])
        ->middleware('permission:admin.access.activity.restore')
        ->name('restore');
        Route::post('/forcedelete', [ActivityManagerController::class, 'forcedelete'])
        ->middleware('permission:admin.access.activity.delete-permanently')
        ->name('forcedelete');
        Route::post('/responseactivity', [ActivityFormManagerController::class, 'response'])->name('responseactivity');
        Route::post('/activityapplication/destroy', [ActivityFormManagerController::class, 'destroy'])->name('activityapplicationdestroy');
    });
    Route::group([
        'prefix' => 'tags',
        'as' => 'tags.',
        'middleware' => 'permission:admin.access.tag.view' 
    ], function(){
        Route::get('/', [TagManagerController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('translator.tags_title'), route('admin.tags.index'));
        });
        Route::get('deleted', [TagManagerController::class, 'deleted'])
        ->name('deleted')
        ->middleware('permission:admin.access.tag.view-deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.tags.index')
                ->push(__('translator.deleted_tags_title'), route('admin.tags.deleted'));
        });
        Route::post('/', [TagManagerController::class, 'store'])
        ->middleware('permission:admin.access.tag.add')
        ->name('store'); 
        Route::post('/update', [TagManagerController::class, 'update'])
        ->middleware('permission:admin.access.tag.edit')
        ->name('update');  
        Route::post('/status', [TagManagerController::class, 'updatestatus'])
        ->middleware('permission:admin.access.tag.edit')
        ->name('updatestatus');  
        Route::post('/destroy', [TagManagerController::class, 'destroy'])
        ->middleware('permission:admin.access.tag.delete')
        ->name('destroy');  
        Route::post('/restore', [TagManagerController::class, 'restore'])
        ->middleware('permission:admin.access.tag.restore')
        ->name('restore');
        Route::post('/forcedelete', [TagManagerController::class, 'forcedelete'])
        ->middleware('permission:admin.access.tag.delete-permanently')
        ->name('forcedelete');
    });
    Route::group([
        'prefix' => 'forms',
        'as' => 'forms.',
        'middleware' => 'permission:admin.access.form.view' 
    ], function(){
        Route::get('/plenary', [FormManagerController::class, 'index'])

        ->name('plenaryindex')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('translator.plenary_form_manager'), route('admin.forms.plenaryindex'));
        });
        Route::get('/visit', [FormManagerController::class, 'index'])
        ->name('visitindex')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('translator.visit_form_manager'), route('admin.forms.visitindex'));
        });
        Route::post('/response', [FormManagerController::class, 'response'])
        ->middleware('permission:admin.access.form.status')
        ->name('responsestatus');  

        Route::post('/destroy', [FormManagerController::class, 'destroy'])
        ->middleware('permission:admin.access.form.delete')
        ->name('destroy');
    });
    Route::group([
        'prefix' => 'settings',
        'as' => 'settings.',
        'middleware' => 'permission:admin.access.setting.view' 
    ], function(){
        Route::get('/',
        [SettingsController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('translator.issues_title'), route('admin.settings.index'));
        });
        Route::post('/socials', [SettingsController::class, 'socials'])
        ->middleware('permission:admin.access.setting.edit')
        ->name('socials');
        Route::post('/content', [SettingsController::class, 'content'])
        ->middleware('permission:admin.access.setting.edit')
        ->name('content');
    });
    Route::group([
        'prefix' => 'issues',
        'as' => 'issues.',
        'middleware' => 'permission:admin.access.issue.view'
        ], function(){
        Route::get('/',
        [IssueManagerController::class, 'index'])
            ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('translator.issues_title'), route('admin.issues.index'));
        });

        Route::get('deleted',
        [IssueManagerController::class, 'deleted'])
        ->name('deleted')
        ->middleware('permission:admin.access.issue.view-deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.issues.index')
                ->push(__('translator.deleted_issues_title'), route('admin.issues.deleted'));
        });
        
        Route::get('/preview/{id}', [IssueManagerController::class, 'previewissue'])->name('previewissue')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('translator.issues_title'), route('admin.issues.previewissue'));
        });
   
        Route::post('/status', [IssueManagerController::class, 'updatestatus'])
        ->middleware('permission:admin.access.issue.status')
        ->name('updatestatus');
        Route::post('/destroy', [IssueManagerController::class, 'destroy'])
        ->middleware('permission:admin.access.issue.delete')
        ->name('destroy');  
        Route::post('/restore', [IssueManagerController::class, 'restore'])
        ->middleware('permission:admin.access.issue.restore')
        ->name('restore');
        Route::post('/forcedelete', [IssueManagerController::class, 'forcedelete'])
        ->middleware('permission:admin.access.issue.delete-permanently')
        ->name('forcedelete');
     });

    Route::group([
        'prefix' => 'comments',
        'as' => 'comments.',
        'middleware' => 'permission:admin.access.comment.view'
    ], function(){
        Route::get('/', [CommentManagerController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('translator.comments_title'), route('admin.comments.index'));
        });
        Route::post('/status', [CommentManagerController::class, 'updatestatus'])
        ->middleware('permission:admin.access.comment.status')
        ->name('updatestatus');  
        Route::post('/destroy', [CommentManagerController::class, 'destroy'])
        ->middleware('permission:admin.access.comment.delete')
        ->name('destroy');  
        Route::post('/reply/status', [CommentManagerController::class, 'replyupdatestatus'])
        ->middleware('permission:admin.access.comment.status')
        ->name('reply.updatestatus');  
        Route::post('/reply/destroy', [CommentManagerController::class, 'replydestroy'])
        ->middleware('permission:admin.access.comment.delete')
        ->name('reply.destroy');
    });
    Route::group([
        'prefix' => 'mails',
        'as' => 'mails.',
        'middleware' => 'permission:admin.access.mails.view'
    ], function(){
        Route::get('/', [MailManagerController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('translator.mails_title'), route('admin.mails.index'));
        });
        Route::post('/updatemailtemplate', [MailManagerController::class, 'updatemailtemplate'])
        ->middleware('permission:admin.access.mails.edit')
        ->name('updatemailtemplate');  
    });
 


    Route::group([
        'prefix' => 'city',
        'as' => 'city.',
        //'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [ReportController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('City Management'), route('admin.city.index'));
            });

        Route::get('create', [ReportController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.city.index')
                    ->push(__('Create City'), route('admin.city.create'));
            });

        Route::post('/', [ReportController::class, 'store'])->name('store');

        Route::group(['prefix' => '{city}'], function () {
            Route::get('edit', [ReportController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, City $city) {
                    $trail->parent('admin.city.index')
                        ->push(__('Editing :city', ['city' => $city->name]), route('admin.city.edit', $city));
                });

            Route::patch('/', [ReportController::class, 'update'])->name('update');
            Route::delete('/', [ReportController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group([
        'prefix' => 'school',
        'as' => 'school.',
        //'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [SchoolController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('School Management'), route('admin.school.index'));
            });

        Route::get('create', [SchoolController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.school.index')
                    ->push(__('Create School'), route('admin.school.create'));
            });

        Route::post('/', [SchoolController::class, 'store'])->name('store');

        Route::group(['prefix' => '{school}'], function () {
            Route::get('edit', [SchoolController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, School $school) {
                    $trail->parent('admin.school.index')
                        ->push(__('Editing :school', ['school' => $school->name]), route('admin.school.edit', $school));
                });

            Route::patch('/', [SchoolController::class, 'update'])->name('update');
            Route::delete('/', [SchoolController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group([
        'prefix' => 'student',
        'as' => 'student.',
        //'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [StudentController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Student Management'), route('admin.student.index'));
            });

        Route::get('create', [StudentController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.student.index')
                    ->push(__('Create Student'), route('admin.student.create'));
            });

        Route::post('/', [StudentController::class, 'store'])->name('store');

        Route::group(['prefix' => '{student}'], function () {
            Route::get('edit', [StudentController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, Student $student) {
                    $trail->parent('admin.student.index')
                        ->push(__('Editing :student', ['student' => $student->first_name . " " . $student->last_name]), route('admin.student.edit', $student));
                });

            Route::patch('/', [StudentController::class, 'update'])->name('update');
            Route::delete('/', [StudentController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group([
        'prefix' => 'auth',
        'as' => 'auth.',
    ], function () {
        Route::group([
            'prefix' => 'user',
            'as' => 'user.',
        ], function () {
            Route::group([
                'middleware' => 'role:'.config('boilerplate.access.role.admin'),
            ], function () {
                Route::get('deleted', [DeletedUserController::class, 'index'])
                    ->name('deleted')
                    ->breadcrumbs(function (Trail $trail) {
                        $trail->parent('admin.auth.user.index')
                            ->push(__('translator.deleted_user_title'), route('admin.auth.user.deleted'));
                    });

                Route::get('create', [UserController::class, 'create'])
                    ->name('create')
                    ->breadcrumbs(function (Trail $trail) {
                        $trail->parent('admin.auth.user.index')
                            ->push(__('translator.create_user_title'), route('admin.auth.user.create'));
                    });

                Route::post('/', [UserController::class, 'store'])->name('store');

                Route::group(['prefix' => '{user}'], function () {
                    Route::get('edit', [UserController::class, 'edit'])
                        ->name('edit')
                        ->breadcrumbs(function (Trail $trail, User $user) {
                            $trail->parent('admin.auth.user.show', $user)
                                ->push(__('translator.edit_user_title'), route('admin.auth.user.edit', $user));
                        });

                    Route::patch('/', [UserController::class, 'update'])->name('update');
                    Route::delete('/', [UserController::class, 'destroy'])->name('destroy');
                });

                Route::group(['prefix' => '{deletedUser}'], function () {
                    Route::patch('restore', [DeletedUserController::class, 'update'])->name('restore');
                    Route::delete('permanently-delete', [DeletedUserController::class, 'destroy'])->name('permanently-delete');
                });
            });

            Route::group([
                'middleware' => 'permission:admin.access.user.list|admin.access.user.deactivate|admin.access.user.reactivate|admin.access.user.clear-session|admin.access.user.impersonate|admin.access.user.change-password',
            ], function () {
                Route::get('deactivated', [DeactivatedUserController::class, 'index'])
                    ->name('deactivated')
                    ->middleware('permission:admin.access.user.reactivate')
                    ->breadcrumbs(function (Trail $trail) {
                        $trail->parent('admin.auth.user.index')
                            ->push(__('translator.deactivate_user_title'), route('admin.auth.user.deactivated'));
                    });

                Route::get('/', [UserController::class, 'index'])
                    ->name('index')
                    ->middleware('permission:admin.access.user.list|admin.access.user.deactivate|admin.access.user.clear-session|admin.access.user.impersonate|admin.access.user.change-password')
                    ->breadcrumbs(function (Trail $trail) {
                        $trail->parent('admin.dashboard')
                            ->push(__('translator.user_title'), route('admin.auth.user.index'));
                    });

                Route::group(['prefix' => '{user}'], function () {
                    Route::get('/', [UserController::class, 'show'])
                        ->name('show')
                        ->middleware('permission:admin.access.user.list')
                        ->breadcrumbs(function (Trail $trail, User $user) {
                            $trail->parent('admin.auth.user.index')
                                ->push($user->name, route('admin.auth.user.show', $user));
                        });

                    Route::patch('mark/{status}', [DeactivatedUserController::class, 'update'])
                        ->name('mark')
                        ->where(['status' => '[0,1]'])
                        ->middleware('permission:admin.access.user.deactivate|admin.access.user.reactivate');

                    Route::post('clear-session', [UserSessionController::class, 'update'])
                        ->name('clear-session')
                        ->middleware('permission:admin.access.user.clear-session');

                    Route::get('password/change', [UserPasswordController::class, 'edit'])
                        ->name('change-password')
                        ->middleware('permission:admin.access.user.change-password')
                        ->breadcrumbs(function (Trail $trail, User $user) {
                            $trail->parent('admin.auth.user.show', $user)
                                ->push(__('translator.change_password'), route('admin.auth.user.change-password', $user));
                        });

                    Route::patch('password/change', [UserPasswordController::class, 'update'])
                        ->name('change-password.update')
                        ->middleware('permission:admin.access.user.change-password');
                });
            });
        });

        Route::group([
            'prefix' => 'role',
            'as' => 'role.',
            'middleware' => 'role:'.config('boilerplate.access.role.admin'),
        ], function () {
            Route::get('/', [RoleController::class, 'index'])
                ->name('index')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.dashboard')
                        ->push(__('translator.role_title'), route('admin.auth.role.index'));
                });

            Route::get('create', [RoleController::class, 'create'])
                ->name('create')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.role.index')
                        ->push(__('translator.create_role_title'), route('admin.auth.role.create'));
                });

            Route::post('/', [RoleController::class, 'store'])->name('store');

            Route::group(['prefix' => '{role}'], function () {
                Route::get('edit', [RoleController::class, 'edit'])
                    ->name('edit')
                    ->breadcrumbs(function (Trail $trail, Role $role) {
                        $trail->parent('admin.auth.role.index')
                            ->push(__('translator.editing') .' '. $role->name, route('admin.auth.role.edit', $role));
                    });

                Route::patch('/', [RoleController::class, 'update'])->name('update');
                Route::delete('/', [RoleController::class, 'destroy'])->name('destroy');
            });
        });
    });
});


