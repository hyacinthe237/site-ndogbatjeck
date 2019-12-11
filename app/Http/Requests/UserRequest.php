<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\FormRequest;

class UserRequest extends FormRequest
{

   /**
     * Force response json type when validation fails
     * @var bool
     */

     protected $forceJsonResponse = true;

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
     switch($this->method())
        {
            case 'POST':
            {
               return [
                   'firstname' => 'required|string|max:255',
                    'lastname' => 'nullable|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'photo' => 'nullable|string|max:255',
                    'dob' => 'nullable|date',
                    'gender' => [
                                Rule::in(['male', 'female']),
                            ],
                ];
            } break;
            case 'PUT':
            {
               return [
                   'firstname' => 'nullable|string|max:255',
                    'lastname' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'photo' => 'nullable|string|max:255',
                    'dob' => 'nullable|date',
                    'gender' => [
                                Rule::in(['male', 'female']),
                            ],
                ];
            } break;
            case 'GET': break;
            case 'PATCH': break;
            case 'DELETE': break;
            default:
            {
                return [];
            } break;
        }
    }

}
