<?php

namespace App\Domains\Thread\Requests;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Lucid\Bus\UnitDispatcher;

class FollowThread extends FormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'thread_id' => 'required|integer',
            'follow'    => 'required|boolean'
        ];
    }

    /**
     * Responds with an json array containing errors
     *
     * @param Validator $validator
     * @throw HttpResponseException
     */
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            $this->run(RespondWithJsonResponseErrorJob::class, [
                'errors' => $validator->errors()->toArray()
            ])
        );
    }

    /**
     * Responds with a json array when the authentication fails
     *
     * @throw HttpResponseException
     */
    protected function failedAuthorization() {
        throw new HttpResponseException(
            $this->run(RespondWithJsonResponseErrorJob::class, [
                'errors' => [
                    'authorization' => 'Could not authorize. You don\'t have permission to do that.'
                ]
            ])
        );
    }
}
