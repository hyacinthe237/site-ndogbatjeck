<?php

namespace Modules\Page\Http\Controllers\Frontend;

use Modules\Page\Entities\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Page\Http\Requests\PageRequest;
use Modules\Page\Repositories\PageRepository;
use App\Models\Comment;
use Carbon\Carbon;

class PageController extends Controller
{
    /**
     * Show the specified resource.
     * @return Response
     */
    public function show ($slug)
    {
        $page = Page::whereSlug($slug)->whereStatus('published')->first();

        $pages = Page::where('id', '<>', $page->id)->whereStatus('published')->paginate(3);

        foreach ($pages as $page) {
          $page->tags_tab = explode(",", $page->tags);
        }

        if(is_null($page) ) {
            return abort(404);
        }

        return view('page::frontend.show', compact('page', 'pages'));
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
            $page = Page::find($id);

            $comment = Comment::create([
                'body' => $request->body,
                'commentable_id' => $page->id,
                'commentable_type' => get_class($page),
                'created_for_page' => $page->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]);

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
        $comments = Comment::where([ 'commentable_id' => $id, 'commentable_type' => 'Modules\Page\Entities\Page'])->get();

        return response()->json($comments);
    }
}
