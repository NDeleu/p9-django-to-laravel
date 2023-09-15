<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ReviewFormRequest
 * @package App\Http\Requests
 *
 * Handle the validation rules for creating a review.
 */
class ReviewFormRequest extends FormRequest
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
            'headline' => 'required|max:128',
            'rating' => 'required|integer|min:0|max:5',
            'body' => 'required|max:8192',
        ];
    }
}
