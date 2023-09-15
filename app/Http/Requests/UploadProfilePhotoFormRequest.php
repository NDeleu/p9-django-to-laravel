<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UploadProfilePhotoFormRequest
 * @package App\Http\Requests
 * 
 * Handle the validation rules for uploading profile photo.
 */
class UploadProfilePhotoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Change this according to your needs
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'profile_photo' => 'required|image|max:2048',
        ];
    }
}
