<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    protected $view = 'akun.';
    protected $route = 'akun/';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = (object)[
            'index' => $this->route,
            'add' => $this->route . 'create',
        ];

        $users = User::all();

        $data = (object)[
            "title" => "Akun",
            'page' => 'Akun Account',
        ];
        $title = $data->title;
        return view($this->view . 'data', compact('users', 'routes', 'data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = (object)[
            'index' => $this->route,
            'save' => $this->route,
            // 'is_update' => false,
        ];
        $data = (object)[
            "title" => "Akun",
            'page' => 'Akun Account',
        ];
        $title = $data->title;
        return view($this->view . 'form', compact('routes', 'data', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';

        for ($i = 0; $i < 13; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        $data = $request->all();
        $data['email_verified_at'] = date("Y-m-d h:i:s");
        $data['remember_token'] = $code;
        $data['created_at'] = date("Y-m-d h:i:s");
        $data['updated_at'] = date("Y-m-d h:i:s");

        user::create($data);
        $mess = [
            "type" => "success",
            "text" => "Berhasil Dibuat."
        ];
        return redirect($this->route)->with('notification', $mess);
    }

    /**
     * Display the specified resource.
     */
    public function show(user $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $akun)
    {
        // dd($akun);
        $routes = (object)[
            'index' => $this->route,
            'save' => $this->route . $akun->id,
            'is_update' => true,
        ];
        $data = (object)[
            "title" => "Akun",
            'page' => 'Akun Account',
        ];
        $title = $data->title;
        return view($this->view . 'form', compact('akun', 'routes', 'data', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $akun)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';

        for ($i = 0; $i < 13; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        $data = $request->all();
        $data['updated_at'] = date("Y-m-d h:i:s");

        $akun->fill($data);
        $akun->save();
        $mess = [
            "type" => "success",
            "text" => "Berhasil Diperbarui."
        ];
        return redirect($this->route)->with('notification', $mess);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $akun)
    {
        $akun->delete();
        $mess = [
            "type" => "success",
            "text" => "Berhasil Dihapus."
        ];
        return redirect($this->route)->with('notification', $mess);
    }
}
