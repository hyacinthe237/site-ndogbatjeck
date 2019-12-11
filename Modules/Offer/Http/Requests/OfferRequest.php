<?php

namespace Modules\Offer\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\FormRequest;

class OfferRequest extends FormRequest
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
                    'name' => 'required|string|max:255',
                    'image' => 'nullable|string|max:255',
                    'description' => 'nullable|string'
                ];
            } break;
            case 'PUT':
            {
               return [
                    'name' => 'nullable|string|max:255',
                    'image' => 'nullable|string|max:255',
                    'description' => 'nullable|string'
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
