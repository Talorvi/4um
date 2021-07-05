<?php

namespace App\Domains\Comment\Requests;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Comment\Jobs\GetCommentJob;
use App\Foundation\Http\ApiFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class EditComment extends ApiFormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (Auth::user()->hasPermissionTo('edit comment')) {
            return true;
        }

        $comment = $this->run(GetCommentJob::class, [
            'comment_id' => $this->request->all()['comment_id']
        ]);

        if ($comment != null && $comment->user_id === Auth::user()->id && Auth::user()->hasPermissionTo('edit own comment')) {
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
            'comment_id' => 'required|integer',
            'text'       => 'required|string|min:2'
        ];
    }
}
