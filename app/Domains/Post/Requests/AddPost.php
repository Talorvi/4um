<?php

namespace App\Domains\Post\Requests;

use App\Domains\Thread\Jobs\GetThreadJob;
use App\Foundation\Http\ApiFormRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class AddPost extends ApiFormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $thread = $this->run(GetThreadJob::class, [
            'thread_id' => $this->request->all()['thread_id']
        ]);

        if ($thread != null && Auth::user()->hasPermissionTo('add post')) {
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
            'text'      => 'required|string|min:2',
            'thread_id' => 'required|integer'
        ];
    }
}
