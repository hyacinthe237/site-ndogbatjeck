<?php

namespace Modules\Project\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Project\Http\Requests\ThemeRequest;
use Modules\Project\Repositories\ThemeRepository;

class ThemesController extends Controller
{

   /**
     * @var themeRepository $themeRepository
     */
    protected $themeRepository;

    /**
     * ThemeController constructor.
     *
     * @param ThemeRepository $themeRepository
     */
    public function __construct(ThemeRepository $themeRepository)
    {
        $this->themeRepository = $themeRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $themes = $this->themeRepository->page(self::BACKEND_PAGINATE);
        return view('project::backend.themes.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $themes = $this->themeRepository->all();
        return view('project::backend.themes.create', compact('themes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ThemeRequest $request)
    {
        try {
             $input = $request->all();
             $theme = $this->themeRepository->store($input);
             if ($theme){
                 return redirect()->route('admin.themes.edit', $theme->id)
                 ->withSuccess('Le thème a bien été créé !');
             }

             return redirect()->back()
             ->withInputs($request->all())
             ->withErrors([
                 'error' => "Erreur lors de la creation du thème"
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
        $theme = $this->themeRepository->findByField('id',$id);

        if(is_null($theme) ) {
            return abort(404);
        }

        return view('project::backend.themes.show', compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $theme = $this->themeRepository
                    ->findByField('id',$id);
        $themes = $this->themeRepository
                    ->all();

        $index = 0;

        foreach ($themes as $item) {
            if ($theme->id == $item->id) {
                unset($themes[$index]);
            }
            $index++;
        }

        return view('project::backend.themes.edit', compact('theme', 'themes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThemeRequest $request, $id)
    {
        try
        {
            $theme = $this->themeRepository->find($id);

            if (!$theme) return redirect()->route('admin.themes');

            $theme = $this->themeRepository->update($theme->id, $request->all());

            return redirect()->route('admin.themes.edit', $theme->id)
            ->withSuccess('Le thème a bien été mis à jour !');

        } catch (\Exception $e) {
            return redirect()->back()
               ->withErrors($e->getMessage());
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
            $theme = $this->themeRepository->find($id);
            // Cannot delete a theme with projects
            if ($theme->projects()->count()) {
                return redirect()->back()
                  ->with('message', 'Un Thème avec des projets ne peut être Supprimé !');
            }
            $delete = $this->themeRepository->delete($id);
            if ($delete) {
                return redirect()->route('admin.themes')
                     ->with('message', "le thème a été supprimé !");
            }
        }catch (\Exception $e) {
            return redirect()->back()
               ->with('message', $e->getMessage());
        }
    }
}
