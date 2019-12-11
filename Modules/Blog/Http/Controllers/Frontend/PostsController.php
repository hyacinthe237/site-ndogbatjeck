<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Blog\Http\Requests\PostRequest;
use Modules\Blog\Repositories\PostRepository;

class PostsController extends Controller
{

   /**
     * @var postRepository $postRepository
     */
    protected $postRepository;

    /**
     * PostController constructor.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $posts = $this->postRepository->all();
        return view('blog::posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('blog::posts.create');
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
                return response()->json($post);
            } else {
                return response()->json(['message'=>'error occurred while creating of a post'],self::HTTP_BADREQUEST);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), self::HTTP_ERROR);
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($code)
    {
        $post = $this->postRepository->findByField('code',$code);

        if(is_null($post) ) {
            return abort(HTTP_NOTFOUND);
        }

        return view('blog::posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('blog::posts.edit');
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

            $post = $this->postRepository->update($post->id, $request->all());

            return response()->json($post);

        } catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],HTTP_ERROR);
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
                return response()->json(['message'=>'the post has been deleted'],HTTP_SUCCESS);
            }
        }catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],HTTP_ERROR);
        }
    }
}
