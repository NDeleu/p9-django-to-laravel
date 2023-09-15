<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TicketFormRequest
 * @package App\Http\Requests
 *
 * Handle the validation rules for creating a ticket.
 */
class TicketFormRequest extends FormRequest
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
            'title' => 'required|max:128',
            'author' => 'required|max:128',
            'description' => 'required|max:2048',
            'image' => 'nullable|image|max:2048',
        ];
    }
}
