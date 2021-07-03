<?php

namespace App\Domains\Notification\Requests;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Notification\Jobs\GetNotificationJob;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class DeleteNotification extends FormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $notification = $this->run(GetNotificationJob::class, [
            'notification_id' => $this->request->all()['notification_id'],
        ]);

        if ($notification != null && $notification->user_id === Auth::user()->id) {
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
            'notification_id' => 'required|integer'
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
