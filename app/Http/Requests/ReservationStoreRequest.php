<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
            'name' => ['string'],
            'quantity' => ['string'],
            'total_price' => ['numeric', 'between:-99.99,99.99'],
            'date_order' => [''],
            'email' => ['email'],
            'phone' => ['string'],
            'seance_id' => ['required', 'integer', 'exists:seances,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
