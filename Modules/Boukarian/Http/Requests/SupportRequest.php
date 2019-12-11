<?php

namespace Modules\Boukarian\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\FormRequest;

class SupportRequest extends FormRequest
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
                    'person_type' => [
                        'required',
                        Rule::in(['morale', 'physique']),
                    ],
                    'name' => 'required|string|max:255|min:3',
                    'corporate_name' => 'nullable|string|max:255',
                    'field_of_activity' => 'nullable|string|max:255',
                    'email' => 'required|string|max:255',
                    'phone' => 'required|string|max:255',
                    'country' => 'required|string|max:255',
                    'support_type' => 'required|string|max:255',
                    'sector_cible' => 'nullable|string|max:255',
                    'experience' => 'nullable|string|max:255',
                    'attente' => 'nullable|string|max:255',
                ];
            } break;
            case 'PUT':
            {
               return [
                    'person_type' => [
                        'nullable',
                        Rule::in(['morale', 'physique']),
                    ],
                    'name' => 'nullable|string|max:255|min:3',
                    'corporate_name' => 'nullable|string|max:255',
                    'field_of_activity' => 'nullable|string|max:255',
                    'email' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'country' => 'nullable|string|max:255',
                    'support_type' => 'required|string|max:255',
                    'sector_cible' => 'nullable|string|max:255',
                    'experience' => 'nullable|string|max:255',
                    'attente' => 'nullable|string|max:255',
                ];
            } break;
            case 'GET': break;
            case 'PATCH': {
                [
                    'person_type' => [
                        'nullable',
                        Rule::in(['morale', 'physique']),
                    ],
                    'name' => 'nullable|string|max:255|min:3',
                    'corporate_name' => 'nullable|string|max:255',
                    'field_of_activity' => 'nullable|string|max:255',
                    'email' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'country' => 'nullable|string|max:255',
                    'support_type' => 'required|string|max:255',
                    'sector_cible' => 'nullable|string|max:255',
                    'experience' => 'nullable|string|max:255',
                    'attente' => 'nullable|string|max:255',
                ];
            } break;
            case 'DELETE': break;
            default:
            {
                return [];
            } break;
        }
    }

}
