<?php

namespace Modules\Offer\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\FormRequest;

class OfferSubmissionRequest extends FormRequest
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
                    'email' => 'required|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'country' => 'nullable|string|max:255',
                    'is_company' => 'required|integer',
                    'background' => 'nullable|string',
                    'why_boukarou' => 'nullable|string|max:255'
                ];
            } break;
            case 'PUT':
            {
               return [
                    'firstname' => 'nullable|string|max:255',
                    'lastname' => 'nullable|string|max:255',
                    'email' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'country' => 'nullable|string|max:255',
                    'is_company' => 'nullable|integer',
                    'background' => 'nullable|string',
                    'why_boukarou' => 'nullable|string|max:255'
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
