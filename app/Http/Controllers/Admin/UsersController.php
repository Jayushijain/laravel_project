<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $page_info['page_title'] = 'Users';
        $page_info['page_name']  = 'users';

        return view('backend.admin.users.index', compact('users', 'page_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_info['page_title'] = 'Create User';
        $page_info['page_name']  = 'add_user';

        return view('backend.admin.users.create', compact('page_info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['email'] = sanitizer($request->email);
        $input['password'] = Hash::make($request->password);
        $input['name'] = sanitizer($request->name);
        $input['address'] = sanitizer($request->address);
        $input['phone'] = sanitizer($request->phone);
        $input['website'] = sanitizer($request->website);
        $input['about'] = sanitizer($request->about);
        $social_links = array(
            'facebook' => sanitizer($request->facebook),
            'twitter' => sanitizer($request->twitter),
            'linkedin' => sanitizer($request->linkedin),
        );
        $input['social'] = json_encode($social_links);
        $input['role_id'] = 2;
        $input['wishlists'] = '[]';
        $verification_code =  md5(rand(100000000, 200000000));
        $input['verification_code'] = $verification_code;
        $input['is_verified'] = 1;

        $user = User::create($input);
        $id = $user->id;

        if ($file = $request->file('user_image'))
        {
            $filename = $id.'.jpg';
            $file->move('uploads/user_image', $filename);
        }        

        if($user)
        {
            Session::flash('success_message', 'User Created');
        }
        else
        {
            Session::flash('error_message', 'User not Created');
        }

        return redirect('/admin/users');
    }

     /**
     * To get email ids of all users.
     *
     * @param  string  $email_id
     * @return \Illuminate\Http\Response
     */
    public function get_emails(Request $request)
    {
        return $request->all();
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
        $user = User::findOrFail($id);
        $page_info['page_title'] = 'Update Users';
        $page_info['page_name']  = 'edit_users';

        return view('backend.admin.users.edit', compact('user', 'page_info'));
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
        $user = User::findOrFail($id);
        $input = $request->all();
        $input['email'] = sanitizer($request->email);
        $input['name'] = sanitizer($request->name);
        $input['address'] = sanitizer($request->address);
        $input['phone'] = sanitizer($request->phone);
        $input['website'] = sanitizer($request->website);
        $input['about'] = sanitizer($request->about);
        $social_links = array(
            'facebook' => sanitizer($request->facebook),
            'twitter' => sanitizer($request->twitter),
            'linkedin' => sanitizer($request->linkedin),
        );
        $input['social'] = json_encode($social_links);

        if ($file = $request->file('user_image'))
        {
            $filename = $id.'.jpg';
            $file->move('uploads/user_image', $filename);
        } 

        if($user->update($input))
        {
            Session::flash('success_message', 'User Updated');
        }
        else
        {
            Session::flash('error_message', 'User not Updated');
        }

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->delete())
        {
            Session::flash('success_message', 'User Deleted');
        }
        else
        {
            Session::flash('error_message', 'User not Deleted');
        }

        return redirect('/admin/users');
    }
}
