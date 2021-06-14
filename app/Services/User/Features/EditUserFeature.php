<?php

namespace App\Services\User\Features;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\User\Jobs\EditUserJob;
use App\Domains\User\Requests\EditUser;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class EditUserFeature extends Feature
{
    public function handle(EditUser $request)
    {
        $result = $this->run(EditUserJob::class, [
            'user_id' => $request->input('user_id'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation')
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'User edited successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'user_id' => 'User could not be edited properly. Check user ID.'
        ]));
    }
}
