<?php

namespace App\Services\User\Features;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\User\Jobs\EditAvatarJob;
use App\Domains\User\Requests\EditAvatar;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class EditAvatarFeature extends Feature
{
    public function handle(EditAvatar $request)
    {
        $result = $this->run(EditAvatarJob::class, [
            'user_id' => $request->input('user_id'),
            'avatar'  => $request->file('avatar'),
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'Avatar edited successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'thread_id' => 'Avatar could not be edited properly. Check user ID.'
        ]));
    }
}
