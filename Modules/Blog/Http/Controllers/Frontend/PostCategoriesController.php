<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Blog\Http\Requests\PostCategoryRequest;
use Modules\Blog\Repositories\PostCategoryRepository;

class PostCategoriesController extends Controller
{

   /**
     * @var postCategoryRepository $postCategoryRepository
     */
    protected $postCategoryRepository;

    /**
     * PostCatgoryController constructor.
     *
     * @param PostCategoryRepository $postCategoryRepository
     */
    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = $this->postCategoryRepository
            ->all();
        return view('blog::categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = $this->postCategoryRepository->all();
        return view('blog::categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        try {
             $input = $request->all();
             $category = $this->postCategoryRepository->store($input);
             if ($category){
                 return redirect()->route('admin.categories.edit', $category->id)
                        ->withSuccess('La catégorie a bien été mise à jour !');
             }

             return redirect()->back()
             ->withInputs($request->all())
             ->withErrors([
                 'error' => "Erreur lors de la creation de la categorie"
             ]);

         } catch (\Exception $e) {
             return redirect()->back()
             ->withInputs($request->all())
             ->withErrors($e->getMessage());
         }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $category = $this->postCategoryRepository->findByField('id',$id);

        if(is_null($category) ) {
            return abort(404);
        }

        return view('blog::categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->postCategoryRepository->findByField('id',$id);
        $categories = $this->postCategoryRepository->all();

        $index = 0;

        foreach ($categories as $item) {
            if ($category->id == $item->id) {
                unset($categories[$index]);
            }
            $index++;
        }

        return view('blog::categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $category = $this->postCategoryRepository->find($id);

            if (!$category) return redirect()->route('admin.categories');

            $category = $this->postCategoryRepository->update($category->id, $request->all());

            return redirect()->route('admin.categories.edit', $category->id)
                    ->withSuccess('La catégorie a bien été mise à jour !');

        } catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = $this->postCategoryRepository->find($id);

            // Cannot delete a category with posts
            if ($category->posts()->count()) {
                return response()->json([
                    'message' => 'A category with posts cannot be deleted'
                ], 400);
            }

            $delete = $this->postCategoryRepository->delete($id);
            if ($delete) {
                return response()->json(['message'=>'the post category has been deleted'],200);
            }
        }catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],404);
        }
    }
}
