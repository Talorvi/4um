<?php

namespace App\Domains\User\Jobs;

use App\Models\User;
use Exception;
use Illuminate\Http\UploadedFile;
use Lucid\Units\Job;

class EditAvatarJob extends Job
{
    private int $user_id;
    private UploadedFile $avatar;

    /**
     * Create a new job instance.
     *
     * @param int $user_id
     * @param $avatar
     */
    public function __construct(int $user_id, UploadedFile $avatar)
    {
        $this->user_id = $user_id;
        $this->avatar = $avatar;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $user = User::findOrFail($this->user_id);

      try {
            $user = User::findOrFail($this->user_id);
            $oldAvatars = $user->getMedia('avatars');
            foreach ($oldAvatars as $oldAvatar) {
                $oldAvatar->delete();
            }
            $user->addMedia($this->avatar->path())->toMediaCollection('avatars');

            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
