<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
            'name'        => 'required|max:200',
            'type'        => ['required', Rule::in(Event::EVENT_TYPES)],
            'location'    => 'required',
            'date'        => 'required',
            'status'      => Rule::in(Event::STATUSES),
            'customer_id' => 'required'
        ];
    }
}
