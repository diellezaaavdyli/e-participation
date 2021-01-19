<?php

use App\Http\Controllers\Backend\Role\RoleController;
use App\Http\Controllers\Backend\User\DeactivatedUserController;
use App\Http\Controllers\Backend\User\DeletedUserController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\User\UserPasswordController;
use App\Http\Controllers\Backend\User\UserSessionController;
use App\Models\Role;
use App\Models\User;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.auth'.

