<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeanceUpdateRequest extends FormRequest
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
            'date' => [''],
            'price' => ['required', 'numeric', 'between:-9.99,9.99'],
            'salle_id' => ['required', 'integer', 'exists:salles,id'],
            'film_id' => ['required', 'integer', 'exists:films,id'],
        ];
    }
}
