<?php

namespace App\Domains\Thread\Requests;

use App\Domains\Thread\Jobs\GetThreadJob;
use App\Foundation\Http\ApiFormRequest;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class EditThread extends ApiFormRequest
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

        if ($thread != null && $thread['user_id'] === Auth::user()->id && Auth::user()->hasPermissionTo('edit own thread')) {
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
}
