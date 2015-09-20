<?php


class AdminController extends BaseController
{
    /**
     * Authenticate with github
     */
    public function login()
    {
        return View::make('admin.login');
    }

    public function userLogin()
    {
        $email = Input::get('email');  
        $password = Input::get('password');
        
        if (Auth::attempt(array('email' => $email, 'password' => $password)))
        {
            return Redirect::intended('/');     
        }else{
            Flash::warning(lang('Wrong password'));
            return Redirect::route('login'); 
        }
    }


    public function logout()
    {
        Auth::logout();
        Flash::success(lang('Operation succeeded.'));
        return Redirect::route('home');
    }


    public function adminRequired()
    {
        return View::make('auth.adminrequired');
    }

}
