<?php

namespace Modules\Page\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\FormRequest;

class PageRequest extends FormRequest
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
                    'title'  => 'required|string|max:255|min:3',
                    'status' => 'required'
                ];
            } break;
            case 'PUT':
            {
               return [
                    'title' => 'required|string|max:255|min:3',
                    'status' => 'required'
                ];
            } break;
            case 'GET': break;
            case 'PATCH': {
                return [
                     'title' => 'required|string|max:255|min:3',
                     'status' => 'required'
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
