<?php

namespace App\Policies;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobListingPolicy
{
    public function edit(User $user, JobListing $job): bool
    {
        return $job->employer->user->is($user);
    }

}
