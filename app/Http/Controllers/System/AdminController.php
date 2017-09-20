<?php

namespace App\Http\Controllers\System;

use App\Model\Admin;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $admin = Admin::find( Auth::user()->id);
       $title = 'Tecjr Pefil';
       return view('system/admin/admin',compact('title','admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        return view('system/admin/admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:6|confirmed',
       ]);

       // $password = $request->password;

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $role = Role::all()->where('name','=','administrator');
        $user->attachRole($role[0]);

            $admin = new Admin();
            $admin->id = $user->id;
            $admin->nome = "";
            $admin->cargo = "";
            $admin->face = "";
            $admin->twitter = "";
            $admin->gmail = "";
            $admin->whatsapp = "";
            $admin->img = "";

            if( $admin->save()){
                Session::flash('success','Registro efetuado!');
               // return redirect()->route('home.index');
                return back();
            }else{
                Session::flash('danger','Algum problema ocoreu!');
               // return redirect()->route('home.index');
                return back();
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $admin = Admin::find($id);
        $admin->nome  = $request->nome;
        $admin->cargo = $request->cargo;
        $admin->face = $request->face;
        $admin->twitter = $request->twitter;
        $admin->gmail = $request->gmail;
        $admin->whatsapp = $request->whatsapp;

        $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->nome)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));

        $img = $request->file('img');

        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

            if( $img->move(public_path().'/imagens/perfil/',$n_nome.'-'.$id.'.'.$extencao)){
                Session::flash('success','Atualizado');
                $admin->img = '/imagens/perfil/'.$n_nome.'-'.$id.'.'.$extencao;
                $admin->save();
                return redirect(route('admin.index'));
            }else{
                Session::flash('warning','Problema na atualização!');
                return back();
            }

        }else{
            Session::flash('info','Carregar uma imagem!');
            return back();
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
        //
    }
}
