<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

/**
 * Class FollowUsersFormRequest
 * @package App\Http\Requests
 *
 * Handle the validation rules for following a user.
 */
class FollowUsersFormRequest extends FormRequest
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
        return [
            'follows' => [
                'required',
                'max:128',
                function($attribute, $value, $fail) {
                    if (!User::where('name', $value)->exists()) {
                        $fail('Cet utilisateur n\'est pas reconnu dans la base de donnée.');
                    }
                },
            ],
        ];
    }
}
