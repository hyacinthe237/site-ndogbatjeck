<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Page\Entities\Page;
use Modules\Blog\Http\Requests\PostRequest;
use Modules\Blog\Repositories\PostRepository;
use Modules\Blog\Repositories\PostCategoryRepository;
use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository;

class BlogController extends Controller
{
    /**
      * @var postRepository $postRepository
      * @var postCategoryRepository $postCategoryRepository
      */
     protected $postRepository;
     protected $postCategoryRepository;

     /**
      * @var CommentRepository $commentRepository
      */
     protected $commentRepository;

     /**
      * PostController constructor.
      *
      * @param PostRepository $postRepository
      */
     public function __construct(PostRepository $postRepository, PostCategoryRepository $postCategoryRepository, CommentRepository $commentRepository)
     {
         $this->postRepository = $postRepository;
         $this->postCategoryRepository = $postCategoryRepository;
         $this->commentRepository = $commentRepository;
     }

     /**
      * Display a listing of the resource.
      * @return Response
      */
     public function index()
     {
         $posts = $this->postRepository
                    ->page(12,'desc','is_anchor');

         return view('blog::frontend.index', compact('posts'));
     }

     /**
      * Show the specified resource.
      * @return Response
      */
     public function show($slug)
     {
        $pages = Page::whereStatus('published')->orderBy('id', 'asc')->get();
         $post = $this->postRepository
                ->with('category')
                ->findByField('slug',$slug);

         if(is_null($post) ) {
             return abort(404);
         }

         $posts = $this->postRepository->otherPosts($slug, 3);

         return view('blog::frontend.show', compact('post', 'posts', 'pages'));
     }

     /**
      * add comment on the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function addComment(Request $request, $id)
     {
         try
         {
             $input = $request->all();
             $post = $this->postRepository->getById($id);
             $input['commentable_id'] = $post->id;
             $input['commentable_type'] = get_class($post);
             $input['created_for_article'] = $post->id;
             $comment = $this->commentRepository->store($input);

             if ($comment) return response()->json($comment);

         }catch (\Exception $e) {
             return response()->json(['message'=>'internal server error'],500);
         }
     }

     /**
      * list comment on the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function listComments($id)
     {
         $comments = $this->commentRepository->getByPostId($id);

         return response()->json($comments);
     }

}
