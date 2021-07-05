<?php

namespace App\Domains\Thread\Requests;

use App\Foundation\Http\ApiFormRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Bus\UnitDispatcher;

class AddThread extends ApiFormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (Auth::user()->hasPermissionTo('add thread')) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'  => 'required|string|min:3|max:32',
            'text'   => 'string|min:3',
            'tags'   => 'array',
            'tags.*' => 'string'
        ];
    }
}
