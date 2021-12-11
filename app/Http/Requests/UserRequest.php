<?php

namespace App\Http\Requests;

use App\Enum\UserRoleEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = User::new()->getTable();
        return [
            'name' => ['required', Rule::unique( $user, 'name')],
            'email' => ['required', 'email', Rule::unique( $user, 'email')],
            'password' => ['required', 'between:8,16'],
            'role' => ['required', Rule::in([
                UserRoleEnum::USER->value,
                UserRoleEnum::ADMIN->value
            ])],
        ];
    }
}
