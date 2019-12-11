<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\FormRequest;

class PostCategoryRequest extends FormRequest
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
                ];
            } break;
            case 'PUT':
            {
               return [
                    'name' => 'required|string|max:255',
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
