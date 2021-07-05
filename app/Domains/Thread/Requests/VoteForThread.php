<?php

namespace App\Domains\Thread\Requests;

use App\Foundation\Http\ApiFormRequest;
use Lucid\Bus\UnitDispatcher;

class VoteForThread extends ApiFormRequest
{
    use UnitDispatcher;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
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
            'score'     => 'required|integer|between:-1,1'
        ];
    }
}
