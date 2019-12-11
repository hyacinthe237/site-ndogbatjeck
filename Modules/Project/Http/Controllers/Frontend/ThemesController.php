<?php

namespace Modules\Project\Http\Controllers\Frontend;

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
        $themes = $this->themeRepository
            ->page(12);
        return view('project::frontend.themes.index', compact('themes'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($slug)
    {
        $theme = $this->themeRepository->findByField('slug',$slug);

        if(is_null($theme) ) {
            return abort(404);
        }

        return view('project::frontend.themes.show', compact('theme'));
    }

}
