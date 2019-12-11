<?php

namespace App\Http\Controllers\Views\Backend;

use Auth;
use Mail;
use Validator;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\Mail\PasswordMail;

class UserController extends Controller
{
    /**
      * @var userRepository $userRepository
      * @var roleRepository $roleRepository
      */
     protected $userRepository;
     protected $roleRepository;

     /**
      * userController constructor.
      *
      * @param userRepository $userRepository
      * @param userRepository $userRepository
      */
     public function __construct(userRepository $userRepository, roleRepository $roleRepository)
     {
         $this->userRepository = $userRepository;
         $this->roleRepository = $roleRepository;
     }

     /**
      * Display a listing of the resource.
      * @return Response
      */
     public function index(Request $request)
     {
         $status = $request->status;
         $role = $request->role;

         $users = User::when($status, function($query) use ($status) {
             return $query->where('status', $status);
         })
         ->when($role, function($query) use ($role) {
             return $query->where('role_id', $role);
         })
         ->paginate(self::BACKEND_PAGINATE);

         $roles = Role::all();

         return view('backend.users.index', compact('users', 'roles'));
     }

     /**
      * Show the form for creating a new resource.
      * @return Response
      */
     public function create()
     {
         $roles = $this->roleRepository->all();
         return view('backend.users.create', compact('roles'));
     }

     /**
      * Store a newly created resource in storage.
      * @param  Request $request
      * @return Response
      */
     public function store(userRequest $request)
     {
        try {
             $input = $request->all();
             $input['password']= Hash::make('pass'); // default password: Boukarou
             $input['status']= 'active';
             $input['api_token']= str_random(60);

             $user = $this->userRepository->store($input);
             if ($user){
                $this->sendPassword($user);
                 return redirect()->route('admin.users.edit', $user->id)
                     ->withSuccess('L\'utilisateur a bien été créé !');
             }

             return redirect()->back()
             ->withInputs($request->all())
             ->withErrors([
                 'error' => "Erreur lors de la creation de l'utilisateur"
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
         $user = $this->userRepository->findByField('id',$id);

         if(is_null($user) ) {
             return abort(404);
         }

         return view('backend.users.show', compact('user'));
     }

     /**
      * Show the form for editing the specified resource.
      * @return Response
      */
     public function edit($id)
     {
         $user = $this->userRepository->find($id);
         $roles = $this->roleRepository->all();
         if (!$user) return redirect()->route('admin.users');

         return view('backend.users.edit', compact('user', 'roles'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(userRequest $request, $id)
     {
         try
         {
             $user = $this->userRepository->find($id);

             if (!$user) return redirect()->route('admin.users');

             $user = $this->userRepository->update($user->id, $request->all());

             return redirect()->route('admin.users.edit', $user->id)
                 ->withSuccess('L\'utilisateur a bien été mis à jour !');

         } catch (\Exception $e) {
             return response()->json(['message'=>'internal server error'],500);
         }
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function blocked($id)
     {
         try
         {
             $user = $this->userRepository->find($id);

             if (!$user)
                return redirect()->route('admin.users');

             if($user->status == 'blocked'){
                 $user->status = 'active';
                 $user->update();
                 return redirect()->route('admin.users.edit', $user->id)
                     ->withSuccess('L\'utilisateur a bien été débloqué !');
             }

             if($user->status == 'active'){
                 $user->status = 'blocked';

                 $user->update();
                 return redirect()->route('admin.users.edit', $user->id)
                     ->withSuccess('L\'utilisateur a bien été bloqué !');
             }


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
             $user = $this->userRepository->find($id);

             $delete = $this->userRepository->delete($id);
             if ($delete) {
                 return response()->json(['message'=>'the user has been deleted'],200);
             }
         }catch (\Exception $e) {
             return response()->json(['message'=>'internal server error'],500);
         }
     }

     /**
      * Send pass confirm to email
      * @param  [type] $passwordMail [description]
      * @return [type]             [description]
      */
     private function sendPassword ($user)
     {
         Mail::to($user->email)->queue(new PasswordMail($user));
     }

}
