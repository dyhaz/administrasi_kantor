<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Role;
use App\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    const MODEL = User::class;

    protected $validation = [
        'email' => 'bail|required|max:255|unique:users',
        'id_pegawai' => 'required|numeric',
        'password' => 'required|max:50|min:8',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['su', 'staf_subbag_tu']);

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $user = User::where('email', 'LIKE', "%$keyword%")
                ->join('pegawai', 'pegawai.id_user', '=', 'users.id')
				->orWhere('pegawai.nama', 'LIKE', "%$keyword%")
                ->orWhere('users.name', 'LIKE', "%$keyword%")
                ->select('users.*')
				->paginate($perPage);
        } else {
            $user = User::paginate($perPage);
        }

        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::get(['id', 'name']);
        $roles = $roles->pluck('name', 'id');
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validation);
        $requestData = $request->all();
        $pegawai = Pegawai::find($requestData['id_pegawai']);
        $requestData['name'] = $pegawai->nama;
        $requestData['password'] = bcrypt($requestData['password']);

        $user = User::create($requestData);
        $user->roles()->attach($requestData['id_role']);

        $pegawai->id_user = $user->id;
        $pegawai->update();

        Session::flash('flash_message', 'User added!');

        return redirect('admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'))->with('slug', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $user_role = $user->roles()->first();
        $pegawai = Pegawai::where(['id_user' => $user->id])->first();
        $roles = Role::get();
        $roles = $roles->pluck('name', 'id');
        return view('admin.user.edit', compact('user'))->with('pegawai', $pegawai)->with('slug', $id)
            ->with('roles', $roles)->with('user_role', $user_role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validation['email'] = '';

        $this->validate($request, $this->validation);
        $requestData = $request->all();
        
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->roles()->attach($requestData['id_role']);
        $pegawai = Pegawai::find($requestData['id_pegawai']);
        $requestData['name'] = $pegawai->nama;
        $requestData['password'] = bcrypt($requestData['password']);

        $user->update($requestData);

        $pegawai->id_user = $user->id;
        $pegawai->update();

        Session::flash('flash_message', 'User updated!');

        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id, Request $request)
    {
        $request->user()->authorizeRoles(['su', 'staf_subbag_tu']);
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('admin/user');
    }
}
