<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fname'     => 'nullable|persian_alpha|max:100',
            'lname'     => 'nullable|persian_alpha|max:100',
            'username'  => 'required|string|max:250|unique:users',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8|confirmed',
        ]);

        $user=User::create($request->all());
        if($user)
        {
            alert()->success('کاربر با موفقیت اضافه شد');

        }
        else
        {
            alert()->error('خطا در اضافه کردن کاربر');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->permission=$this->get_userType($user->type) ;
        return view('admin.profile')
                    ->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->permission=$this->get_userType($user->type) ;
        return view('admin.profile')
            ->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $this->validate($request,[
            'fname'     =>'nullable|persian_alpha|max:100',
            'lname'     =>'nullable|persian_alpha|max:100',
            'username'  =>'nullable|string|max:250|unique:users',
            'tel'       =>'nullable|iran_mobile|max:11|unique:users',
            'email'     =>'nullable|email|max:250',
            'type'      =>'required|numeric',
        ]);


        $status=$user->update($request->all());
        if($status)
        {
            alert()->success('اطلاعات بروزرسانی شد');
        }
        else
        {
            alert()->error('خطا در بروزرسانی');
        }

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Auth::user()->id==$user->id)
        {
            alert()->error('کاربر مورد نظر قابل حذف نمی باشد');
        }
        else
        {
            $status=$user->delete();
            if($status)
            {
                alert()->success('کاربر مورد نظر حذف شد');
            }
            else
            {
                alert()->error('خطا در حذف کاربر');
            }
        }
        return back();

    }

    public function allUsers()
    {
        $users=User::orderby('id','desc')
                ->get();

        foreach ($users as $item)
        {
            $item->type=$this->get_userType($item->type);
        }

        return view('admin.users')
                    ->with('users',$users);
    }

    public function createPassword(User $user)
    {
        return view('admin.passwordReset')
                    ->with('user',$user);
    }

    public function updatePassword(User $user,Request $request)
    {
        $this->validate($request,[
            'password'  =>'required|string|min:8|confirmed'
        ]);
        $status=$user->update(
        [
            'password'  =>Hash::make($request->password),
        ]);

        if($status)
        {
            alert()->success('رمز با موفقیت تغییر کرد');
        }
        else
        {
            alert()->error('خطا در تغییر رمز عبور');
        }

        return back();
    }
}
