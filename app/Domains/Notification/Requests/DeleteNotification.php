<?php

namespace App\Domains\Notification\Requests;

use App\Domains\Notification\Jobs\GetNotificationJob;
use App\Foundation\Http\ApiFormRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class DeleteNotification extends ApiFormRequest
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
}
