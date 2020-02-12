<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainRouteRequest extends FormRequest
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
            'train_id' => 'required|unique:train_routes,train_id,' . $this->segment(3),
            'route_id' => 'required|unique:train_routes,route_id,' . $this->segment(3),
            'arrival' => 'required',
            'departure' => 'required'
        ];
    }
}
