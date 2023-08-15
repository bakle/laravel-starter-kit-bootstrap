<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        $this->setLoginView();
        $this->setRegisterView();
        $this->setForgotPasswordLinkView();
        $this->setResetPasswordView();


    }

    private function setLoginView(): void
    {
        Fortify::loginView(fn() => view('auth.login'));
    }

    private function setRegisterView(): void
    {
        Fortify::registerView(fn() => view('auth.register'));
    }

    private function setForgotPasswordLinkView(): void
    {
        Fortify::requestPasswordResetLinkView(fn() => view('auth.forgot-password')
        );
    }

    private function setResetPasswordView(): void
    {
        Fortify::resetPasswordView(fn(Request $request) => view('auth.reset-password', ['request' => $request])
        );
    }
}
