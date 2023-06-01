<?php

namespace App\Http\Controllers;

use App\Http\Requests\userResquest;
use App\Models\phoneModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //
    public function userPosst(userResquest $resquest)
    {
        $user = new User();
        $user->name = $resquest->username;
        $user->email = $resquest->email;
        $user->password = $resquest->password;
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'Đăng ký thành công');
        } else {
            return back()->with('fail', 'Đăng ký không thành công');
        }
    }
    public function home()
    {
        //  return  user::find(1)->phone;
        //    $users =  user::all();
        //   return  $users->modelKeys();
        // $user=user::with('phone')->get();
        // return $user;
        // phoneModel::find(1)->user;
     //   $users = User::get();

        //  $users = $users->diff(User::whereIn('id', [ 1,3])->get());
        // $users = $users->except([2,  3]);
        // $users = $users->find([1, 2, 3]);
        // $users = $users->intersect(phoneModel::whereIn('id', [2,1 ])->get());
        // $users->load([ 'phone']);
        // $users->makeVisible(['passsword']);
        $user = Auth::check();
        return $user;
    }
}
