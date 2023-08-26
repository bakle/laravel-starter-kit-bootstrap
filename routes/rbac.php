<?php declare(strict_types=1);


use App\Modules\Rbac\Http\Controllers\RoleController;

Route::middleware('auth')->prefix('rbac')->group(function() {
    Route::resource('roles', RoleController::class)->except('show');
});
