<?php

namespace App\Domains\Comment\Requests;

use App\Domains\Comment\Jobs\GetCommentJob;
use App\Foundation\Http\ApiFormRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class DeleteComment extends ApiFormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (Auth::user()->hasPermissionTo('delete comment')) {
            return true;
        }

        $comment = $this->run(GetCommentJob::class, [
            'comment_id' => $this->request->all()['comment_id']
        ]);

        if ($comment != null && $comment->user_id === Auth::user()->id && Auth::user()->hasPermissionTo('delete own comment')) {
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
            'comment_id' => 'required|integer'
        ];
    }
}
