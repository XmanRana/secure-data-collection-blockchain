<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DataSubmission;

class DataSubmissionPolicy
{
    /**
     * Determine if the user can view the submission
     */
    public function view(User $user, DataSubmission $submission): bool
    {
        return $user->id === $submission->user_id;
    }

    /**
     * Determine if the user can create a submission
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine if the user can update the submission
     */
    public function update(User $user, DataSubmission $submission): bool
    {
        return $user->id === $submission->user_id;
    }

    /**
     * Determine if the user can delete the submission
     */
    public function delete(User $user, DataSubmission $submission): bool
    {
        return $user->id === $submission->user_id;
    }
}
