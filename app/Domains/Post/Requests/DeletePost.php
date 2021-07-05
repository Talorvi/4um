<?php

namespace App\Domains\Post\Requests;

use App\Domains\Post\Jobs\GetPostJob;
use App\Foundation\Http\ApiFormRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class DeletePost extends ApiFormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (Auth::user()->hasPermissionTo('delete post')) {
            return true;
        }

        $post = $this->run(GetPostJob::class, [
            'post_id' => $this->request->all()['post_id']
        ]);

        if ($post != null && $post->user_id === Auth::user()->id && Auth::user()->hasPermissionTo('delete own post')) {
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
            'post_id' => 'required|integer'
        ];
    }
}
