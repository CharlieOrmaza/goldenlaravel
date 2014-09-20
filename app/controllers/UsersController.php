<?php

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		if( Auth::check()){
    		return Redirect::to('index');
    	}else{
    		return View::make('login');
    	}

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}
      
	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function login($username="",$password="")
	{
		$userdata="";
	 	$userdata = array(
        	'name' => Input::get('username'),
        	'password' => Input::get('password')
        );

        if( Auth::attempt($userdata))
        {
<<<<<<< HEAD
            return Redirect::to('index');
=======
            return Redirect::to('/');
>>>>>>> origin/master
        }else{
			return Redirect::to('/')->with('flash_error','El Usuario o Contraseña son incorrectos');
        }
    }

	public function store()
	{

	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::to('/')->with('flash_error','El Usuario se desconecto correctamente');
	}


}