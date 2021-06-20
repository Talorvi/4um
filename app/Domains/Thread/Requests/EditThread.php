<?php

namespace App\Domains\Thread\Requests;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Thread\Jobs\GetThreadJob;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class EditThread extends FormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (Auth::user()->hasPermissionTo('edit thread')) {
            return true;
        }

        $thread = $this->run(GetThreadJob::class, [
            'thread_id' => $this->request->all()['thread_id']
        ]);

        if ($thread != null && $thread->user_id === Auth::user()->id && Auth::user()->hasPermissionTo('edit own thread')) {
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
            'thread_id' => 'required|integer',
            'title'     => 'required|string|min:3|max:32',
            'text'      => 'required|string|min:3',
            'tags'      => 'array',
            'tags.*'    => 'string'
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
