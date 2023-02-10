<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PlatFormRequest extends FormRequest
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
        switch ($this->method()){
            case 'POST' : {
                return [
                    'title' => 'required|string|max:255',
                    'description' => 'required|string',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
            }
            case 'PATCH':
            case 'PUT' : {
                return [
                    'title' => 'required|string|max:255',
                    'description' => 'required|string',
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
            }
            default: break;
        }
        return [
            //
        ];
    }
}
