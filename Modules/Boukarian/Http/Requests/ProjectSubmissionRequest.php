<?php

namespace Modules\Boukarian\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\FormRequest;

class ProjectSubmissionRequest extends FormRequest
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
                    'firstname' => 'required|string|max:255|min:3',
                    'lastname' => 'nullable|string|max:255',
                    'email' => 'required|string|max:255',
                    'phone' => 'required|string|max:255',
                    'country' => 'nullable|string|max:255',
                    'is_company' => 'nullable|boolean',
                    'project_name' => 'required|string|max:255',
                    'issue' => 'required|string|max:255',
                    'why_issue' => 'required|string|max:255',
                    'solution' => 'required|string|max:255',
                    'project_story' => 'required|string|max:255',
                    'existing_solution' => 'required|string|max:255',
                    'next_steps' => 'required|string|max:255',
                    'why_boukarou' => 'required|string|max:255',
                    'status' => [
                        'nullable',
                        Rule::in(['En attente','Approuve','Rejete']),
                    ],
                ];
            } break;
            case 'PUT':
            {
               return [
                    'firstname' => 'nullable|string|max:255|min:3',
                    'lastname' => 'nullable|string|max:255',
                    'email' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'country' => 'nullable|string|max:255',
                    'is_company' => 'nullable|boolean',
                    'project_name' => 'nullable|string|max:255',
                    'issue' => 'nullable|string|max:255',
                    'why_issue' => 'nullable|string|max:255',
                    'solution' => 'nullable|string|max:255',
                    'project_story' => 'nullable|string|max:255',
                    'existing_solution' => 'nullable|string|max:255',
                    'next_steps' => 'nullable|string|max:255',
                    'why_boukarou' => 'nullable|string|max:255',
                    'status' => [
                        'nullable',
                        Rule::in(['En attente','Approuve','Rejete']),
                    ],
                ];
            } break;
            case 'GET': break;
            case 'PATCH': {
                return [
                    'firstname' => 'nullable|string|max:255|min:3',
                    'lastname' => 'nullable|string|max:255',
                    'email' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'country' => 'nullable|string|max:255',
                    'is_company' => 'nullable|boolean',
                    'project_name' => 'nullable|string|max:255',
                    'issue' => 'nullable|string|max:255',
                    'why_issue' => 'nullable|string|max:255',
                    'solution' => 'nullable|string|max:255',
                    'project_story' => 'nullable|string|max:255',
                    'existing_solution' => 'nullable|string|max:255',
                    'next_steps' => 'nullable|string|max:255',
                    'why_boukarou' => 'nullable|string|max:255',
                    'status' => [
                        'nullable',
                        Rule::in(['En attente','Approuve','Rejete']),
                    ],
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
