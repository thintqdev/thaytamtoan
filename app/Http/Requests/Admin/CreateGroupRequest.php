<?php

namespace App\Http\Requests\Admin;

use App\Rules\Admin\CreateDayOfWeekRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateGroupRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|min:10|max:50',
            'day_of_week' => new CreateDayOfWeekRule(),
        ];
    }
}
