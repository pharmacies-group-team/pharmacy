<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
          return (new MailMessage)
            ->greeting('مرحباً بك في صيدلية أونلاين!')
            ->subject('التحقق من عنوان البريد الإلكتروني')
            ->line('انقر فوق الزر أدناه للتحقق من عنوان بريدك الإلكتروني.')
            ->action('التحقق من عنوان البريد الإلكتروني', $url)
            ->line('شكرا لك على استخدام صيدلية أونلاين.');
        });
    }
}
