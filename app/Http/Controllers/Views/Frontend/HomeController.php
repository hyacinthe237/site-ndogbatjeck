<?php

namespace App\Http\Controllers\Views\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Page\Entities\Page;
use Modules\Blog\Entities\Post;
use Modules\Project\Entities\Project;
use App\Mail\Contacted;
use App\Models\Contact;
use Mail;

class HomeController extends Controller
{
    public function home ()
    {
        $pages = Page::whereStatus('published')->orderBy('id', 'asc')->get();
        $posts = Post::whereStatus('published')->orderBy('id', 'desc')->paginate(3);
        foreach ($posts as $post) {
          $post->tags_tab = explode(",", $post->tags);
        }

        $projects = Project::wherePublished('published')->orderBy('id', 'asc')->paginate(2);
        foreach ($projects as $project) {
          $project->tags_tab = explode(",", $project->tags);
        }

        return view('frontend.home.index', compact('pages', 'posts', 'projects'));
    }

    public function landing ()
    {
        return view('frontend.home.landing');
    }

    public function qui ()
    {
        $page = Page::whereStatus('published')->whereType('apropos')->first();

        return view('frontend.home.association.apropos', compact('page'));
    }

    public function bienvenue ()
    {
        $page = Page::whereStatus('published')->whereType('bienvenue')->first();
        $page->tags_tab = explode(",", $page->tags);
        $pages = Page::where('id', '<>', $page->id)->whereStatus('published')->orderBy('id', 'asc')->paginate(3);

        return view('frontend.home.association.bienvenue', compact('pages', 'page'));
    }


    public function presentation ()
    {
        $page = Page::whereStatus('published')->whereType('presentation')->first();
        $page->tags_tab = explode(",", $page->tags);
        $pages = Page::where('id', '<>', $page->id)->whereStatus('published')->orderBy('id', 'asc')->paginate(3);

        return view('frontend.home.association.presentation', compact('pages', 'page'));
    }

    public function bureau ()
    {
      $page = Page::whereStatus('published')->whereType('bureau')->first();
      $page->tags_tab = explode(",", $page->tags);
      $pages = Page::where('id', '<>', $page->id)->whereStatus('published')->orderBy('id', 'asc')->paginate(3);

        return view('frontend.home.association.bureau', compact('pages', 'page'));
    }

    public function organisation ()
    {
      $page = Page::whereStatus('published')->whereType('organisation')->first();
      $page->tags_tab = explode(",", $page->tags);
      $pages = Page::where('id', '<>', $page->id)->whereStatus('published')->orderBy('id', 'asc')->paginate(3);

        return view('frontend.home.association.organisation', compact('pages', 'page'));
    }

    public function statuts ()
    {
      $pages = Page::whereStatus('published')->orderBy('id', 'desc')->paginate(3);
        return view('frontend.home.association.statuts', compact('pages'));
    }

    public function documentation ()
    {
      $pages = Page::whereStatus('published')->orderBy('id', 'desc')->paginate(3);
        return view('frontend.home.association.documentation', compact('pages'));
    }

    public function secteur ()
    {
      $pages = Page::whereStatus('published')->orderBy('id', 'desc')->paginate(3);
        return view('frontend.home.association.secteur', compact('pages'));
    }

    public function membre ()
    {
        return view('frontend.home.association.devenir-membre');
    }

    public function albums ()
    {
        return view('frontend.home.association.albums');
    }

    public function video ()
    {
        return view('frontend.home.association.video');
    }

    public function joinus ()
    {
        return view('frontend.home.joinus');
    }

    public function contact ()
    {
        return view('frontend.contacts.index');
    }

    public function saveContact (Request $request)
    {
        $contact = Contact::create([
            "firstname"  => $request->firstname,
            "lastname"   => $request->lastname,
            "objet"      => $request->objet,
            "email"      => $request->email,
            "phone"      => $request->phone,
            "message"    => $request->message
        ]);

        if ($contact) {
          // Send email to the client
          Mail::to($contact->email)->queue(new Contacted($contact));
          Mail::to(config('site.email'))->queue(new Contacted($contact));
        }

        return redirect()->back()->withSuccess('message', 'Votre message a été envoyé');
    }

}
