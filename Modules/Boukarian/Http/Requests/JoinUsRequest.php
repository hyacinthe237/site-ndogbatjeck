<?php

namespace Modules\Boukarian\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\FormRequest;

class JoinUsRequest extends FormRequest
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
                    'first_name' => 'required|string|max:255|min:3',
                    'last_name' => 'required|string|max:255|min:3',
                    'email' => 'required|string|max:255',
                    'phone' => 'required|string|max:255',
                    'social_network' => 'required|string|max:255',
                    'country' => 'required|string|max:255',
                    'search_type' => [
                        Rule::in(['Rejoindre le staff ?', 'Un stage chez nous', 'Un stage dans une des entités chez nous', 'Travailler en freelance']),
                    ],
                    'more_details' => 'required|string|max:255',
                    'why_boukarou' => 'required|string|max:255',
                ];
            } break;
            case 'PUT':
            {
               return [
                    'first_name' => 'nullable|string|max:255|min:3',
                    'last_name' => 'nullable|string|max:255|min:3',
                    'email' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'social_network' => 'nullable|string|max:255',
                    'country' => 'nullable|string|max:255',
                    'search_type' => [
                        Rule::in(['Rejoindre le staff ?', 'Un stage chez nous', 'Un stage dans une des entités chez nous', 'Travailler en freelance']),
                    ],
                    'more_details' => 'nullable|string|max:255',
                    'why_boukarou' => 'nullable|string|max:255',
                ];
            } break;
            case 'GET': break;
            case 'DELETE': break;
            default:
            {
                return [];
            } break;
        }
    }

}
