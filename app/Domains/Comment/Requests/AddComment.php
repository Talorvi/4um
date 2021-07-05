<?php

namespace App\Domains\Comment\Requests;

use App\Domains\Post\Jobs\GetPostJob;
use App\Foundation\Http\ApiFormRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class AddComment extends ApiFormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $post = $this->run(GetPostJob::class, [
            'post_id' => $this->request->all()['post_id']
        ]);

        if ($post != null && Auth::user()->hasPermissionTo('add comment')) {
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
            'text'    => 'required|string|min:2',
            'post_id' => 'required|integer'
        ];
    }
}
