<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateSalesRepresentativeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('sales-reps_update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:190',
            'email' => 'required|email|max:190',
            'telephone' => 'required|digits:10', // DB setup for 15 characters
            'joined_date' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'route_id' => 'required|exists:routes,id',
            'comments' => 'nullable|max:1000',
        ];
    }
}
