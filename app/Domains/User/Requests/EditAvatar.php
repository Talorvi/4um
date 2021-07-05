<?php

namespace App\Domains\User\Requests;

use App\Domains\User\Jobs\GetUserJob;
use App\Foundation\Http\ApiFormRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class EditAvatar extends ApiFormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $user = $this->run(GetUserJob::class, [
            'user_id' => $this->request->all()['user_id']
        ]);

        if ($user != null && $user->id === Auth::user()->id) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id'   => 'required|integer',
            'avatar'    => 'required|image|mimes:jpg,png'
        ];
    }
}
