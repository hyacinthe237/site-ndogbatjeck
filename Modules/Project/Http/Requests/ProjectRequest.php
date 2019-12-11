<?php

namespace Modules\Project\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\FormRequest;

class ProjectRequest extends FormRequest
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
                    'title' => 'required|string|max:255|min:3',
                    'tags' => 'nullable|string|max:255',
                    'logo' => 'nullable|string|max:255',
                    'excerpt' => 'nullable|string',
                    'idea' => 'nullable|string',
                    'description' => 'nullable|string',
                    'published' => [
                        'nullable',
                        Rule::in(['published', 'unpublished']),
                    ],
                    'status' => [
                        'nullable',
                        Rule::in(['en_cours', 'terminé','annulé']),
                    ],
                    'owner' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'location' => 'nullable|string|max:255',
                    'email' => 'nullable|string|max:255',
                    'published_at' => 'nullable|date',
                    'last_updated_by' => 'nullable|integer|exists:users,id',
                    'theme_id' => 'nullable|integer|exists:themes,id',
                ];
            } break;
            case 'PUT':
            {
               return [
                    'title' => 'required|string|max:255|min:3',
                    'tags' => 'nullable|string|max:255',
                    'logo' => 'nullable|string|max:255',
                    'excerpt' => 'nullable|string',
                    'idea' => 'nullable|string',
                    'description' => 'nullable|string',
                    'published' => [
                        'nullable',
                        Rule::in(['published', 'unpublished']),
                    ],
                    'status' => [
                        'nullable',
                        Rule::in(['en_cours', 'terminé','annulé']),
                    ],
                    'owner' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'location' => 'nullable|string|max:255',
                    'email' => 'nullable|string|max:255',
                    'published_at' => 'nullable|date',
                    'last_updated_by' => 'nullable|integer|exists:users,id',
                    'theme_id' => 'nullable|integer|exists:themes,id',
                ];
            } break;
            case 'GET': break;
            case 'PATCH': {
                return [
                    'title' => 'required|string|max:255|min:3',
                    'tags' => 'nullable|string|max:255',
                    'logo' => 'nullable|string|max:255',
                    'excerpt' => 'nullable|string',
                    'idea' => 'nullable|string',
                    'description' => 'nullable|string',
                    'published' => [
                        'nullable',
                        Rule::in(['published', 'unpublished']),
                    ],
                    'status' => [
                        'nullable',
                        Rule::in(['en_cours', 'terminé','annulé']),
                    ],
                    'owner' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'location' => 'nullable|string|max:255',
                    'email' => 'nullable|string|max:255',
                    'published_at' => 'nullable|date',
                    'last_updated_by' => 'nullable|integer|exists:users,id',
                    'theme_id' => 'nullable|integer|exists:themes,id',
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
