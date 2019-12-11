<?php

namespace Modules\Blog\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Blog\Entities\Post;
use Modules\Blog\Http\Requests\PostRequest;
use Modules\Blog\Repositories\PostRepository;
use Modules\Blog\Repositories\PostCategoryRepository;

class BlogController extends Controller
{
    /**
      * @var postRepository $postRepository
      * @var postCategoryRepository $postCategoryRepository
      */
     protected $postRepository;
     protected $postCategoryRepository;

     /**
      * PostController constructor.
      *
      * @param PostRepository $postRepository
      */
     public function __construct(PostRepository $postRepository, PostCategoryRepository $postCategoryRepository)
     {
         $this->postRepository = $postRepository;
         $this->postCategoryRepository = $postCategoryRepository;
     }

     /**
      * Display a listing of the resource.
      * @return Response
      */
     public function index(Request $request)
     {
         $status = $request->status;

         $posts = Post::when($status, function($query) use ($status) {
             return $query->where('status', $status);
         })
         ->paginate(self::BACKEND_PAGINATE);

         return view('blog::backend.index', compact('posts'));
     }

     /**
      * Show the form for creating a new resource.
      * @return Response
      */
     public function create()
     {

         $postscategories = $this->postCategoryRepository->all();

         return view('blog::backend.create', compact('postscategories'));
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
              $post = $this->postRepository->store($input);
              if ($post){
                  return redirect()->route('admin.blog.edit', $post->id)
                    ->withSuccess('L\'article a bien été créé !');
              }

              return redirect()->back()
              ->withInputs($request->all())
              ->withErrors([
                  'error' => "Erreur lors de la creation de l'article"
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
         $post = $this->postRepository->findByField('id',$id);

         if(is_null($post) ) {
             return abort(404);
         }

         return view('blog::backend.show', compact('post'));
     }

     /**
      * Show the form for editing the specified resource.
      * @return Response
      */
     public function edit($id)
     {
        $postscategories = $this->postCategoryRepository->all();

        $postscategories = $postscategories->mapWithKeys(function ($item, $key) {
              return [$item['id'] => $item['name']];
        });

        $postscategories=$postscategories->all();

         $post = $this->postRepository->findByField('id', $id);

         if (!$post) return redirect()->route('admin.blog');

         return view('blog::backend.edit', compact('post', 'postscategories'));
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
             $post = $this->postRepository->find($id);

             if (!$post) return redirect()->route('admin.blog');

             $post = $this->postRepository->update($post->id, $request->all());

             return redirect()->route('admin.blog.edit', $post->id)
                ->withSuccess('L\'article a bien été mis à jour !');

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
             $post = $this->postRepository->find($id);

             $delete = $this->postRepository->delete($id);
             if ($delete) {
                 return response()->json(['message'=>'the post has been deleted'],200);
             }
         }catch (\Exception $e) {
             return response()->json(['message'=>'internal server error'],500);
         }
     }

}
