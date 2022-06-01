<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_id'  => 'nullable',
            'client_name'  => 'required|string',
            'client_phone' => 'required|string',
            'reason'       => 'nullable|string',
            'format'       => 'nullable|string',
            'guest_count'  => 'nullable|integer',
            'event_date'   => 'required|date|after:today',
            'city'         => 'sometimes|required_if:user_city,other',
            'user_city'    => 'nullable',
            'street'       => 'required|string',
            'building'     => 'required|string',
            'payment_type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'client_name.required'  => 'Поле "Ваше имя" обязательное',
            'client_phone.required'  => 'Поле "Телефон" обязательное',
            'city.required_if'  => 'Поле "Город" обязательное',
            'street.required'  => 'Поле "Улица" обязательное',
            'event_date.required'  => 'Поле "Дата" обязательное',
            'event_date.date'  => '"Дата" неверного формата',
            'event_date.after'  => '"Дата" меньше либо равна текущей',
            'building.required'  => 'Поле "Дом" обязательное',
            'guest_count.integer'  => 'Кол-во гостей должно быть целым числом',
        ];
    }


}
