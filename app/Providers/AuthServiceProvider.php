<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\JobPost;
use App\Policies\JobPostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        JobPost::class => JobPostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Tambahkan gate manual jika diperlukan
        // Contoh:
        // Gate::define('update-jobpost', function ($user, $jobPost) {
        //     return $user->id === $jobPost->user_id;
        // });
    }
}
