<?php

namespace App\Domains\Authentication\Requests;

use App\Foundation\Http\ApiFormRequest;
use Lucid\Bus\UnitDispatcher;

class Register extends ApiFormRequest
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
            'name'     => 'required|unique:users,name|max:32',
            'email'    => 'required|unique:users,email|email',
            'password' => 'required|min:6|confirmed'
        ];
    }
}
