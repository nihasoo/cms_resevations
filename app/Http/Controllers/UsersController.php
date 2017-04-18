<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Validator;

class UsersController extends Controller
{
    /**
     * Show the All users.
     *
     * @return Response
     */
    public function allUsers()
    {
        if (Auth::user()->is_admin) {
            return view('admin.allUsers');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the User Detail.
     *
     * @return Response
     */
    public function getUserDetail($id)
    {
        /*if(Auth::user()->is_admin)
        {*/
            $user = User::findOrFail($id);

            return view('admin.userDetail', compact('user'));
        /*}else{
            abort(403, 'Unauthorized action.');
        }*/
    }

    /**
     * Show the User Detail.
     *
     * @return Response
     */
    public function getEditUser($id)
    {
        /*if(Auth::user()->is_admin)
        {*/
            $user = User::findOrFail($id);

            return view('admin.editUser', compact('user'));
        /*}else{
            abort(403, 'Unauthorized action.');
        }*/
    }

    /**
     * return all Users as JSON.
     *
     * @return Response
     */
    public function allUsersJSON()
    {
        if (Auth::user()->is_admin) {
            $users = User::all();

            $response = array(
                'aaData' => $users,
                'iTotalRecords' => count($users),
                'iTotalDisplayRecords' => count($users)
            );

            return $response;
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Post Edit User Form
     *
     * @param Request $request
     */
    protected function postEditUser(Request $request)
    {
        if(Auth::user()->is_admin)
        {
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'mobile' => 'required',
            ]);

            $uid =  $request->input('user_id');
            $name =  $request->input('name');
            $phone =  $request->input('phone');
            $mobile =  $request->input('mobile');
            $isAdmin =  $request->input('is_admin');

            try{
                $user = User::find($uid);

                if($user != null){
                    $user->name = $name;
                    $user->phone = $phone;
                    $user->mobile = $mobile;
                    $user->is_admin = $isAdmin=='on'? true : false ;

                    $user->update();
                }

                return redirect('userdetail/'.$uid);
            } catch (Exception $ex){
                Flash::error('Error: '.$ex->getMessage());
            }
        }else{
            abort(403, 'Unauthorized action.');
        }
    }
}
