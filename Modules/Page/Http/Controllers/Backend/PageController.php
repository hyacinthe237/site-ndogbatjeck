<?php

namespace Modules\Page\Http\Controllers\Backend;

use Modules\Page\Entities\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Page\Http\Requests\PageRequest;
use Modules\Page\Repositories\PageRepository;

class PageController extends Controller
{

   /**
     * @var pageRepository $pageRepository
     */
    protected $pageRepository;

    /**
     * PageController constructor.
     *
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $pages = Page::when($request->status, function ($q)  use ($request){
            return $q->whereStatus($request->status);
        })
        ->when($request->q, function ($s)  use ($request){
            return $s->where('title', 'like', '%' . $request->q . '%');
        })->orderBy('id', 'desc')->paginate(self::BACKEND_PAGINATE);

        return view('page::backend.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('page::backend.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(PageRequest $request)
    {
       try {
            $input = $request->all();
            $page = $this->pageRepository->store($input);
            if ($page){
                return redirect()->route('admin.pages.edit', $page->id)
                    ->withSuccess('La page a bien été créée !');
            }

            return redirect()->back()
            ->withInputs($request->all())
            ->withErrors([
                'error' => "Erreur lors de la creation de la page"
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
        $page = $this->pageRepository->findByField('id',$id);

        if(is_null($page) ) {
            return abort(404);
        }

        return view('page::backend.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $page = $this->pageRepository->find($id);
        if (!$page) return redirect()->route('admin.pages');

        return view('page::backend.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        try
        {
            $page = $this->pageRepository->find($id);

            if (!$page) return redirect()->route('admin.pages');

            $page = $this->pageRepository->update($page->id, $request->all());

            return redirect()->route('admin.pages.edit', $page->id)
                ->withSuccess('La page a bien été mise à jour !');

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
            $page = $this->pageRepository->find($id);

            $delete = $this->pageRepository->delete($id);
            if ($delete) {
                return response()->json(['message'=>'the page has been deleted'],200);
            }
        }catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],500);
        }
    }
}
