<?php

namespace App\Domains\Tag\Requests;

use App\Foundation\Http\ApiFormRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class DeleteTag extends ApiFormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (Auth::user()->hasPermissionTo('delete tag')) {
            return true;
        }

        $thread = $this->run(GetTagJob::class, [
            'tag_id' => $this->request->all()['tag_id']
        ]);

        if ($thread != null) {
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
            'tag_id' => 'required|integer'
        ];
    }
}
