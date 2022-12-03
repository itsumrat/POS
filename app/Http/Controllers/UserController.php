<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first(['name', 'email', 'id', 'role_id']);
        return response()->json($user);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allUser()
    {
        $user = User::with('role')->orderBy('id', "desc")->paginate(env("DATA_PER_PAGE"));
        return response()->json($user);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $profilePath = public_path('assets/img/users/');

        if ($request->Hasfile('profile_pic')) {
            $imageName = Str::slug($request->name, '_') . '_' . rand(1000000, 9999999);
            $extenstion = $request->file('profile_pic')->getClientOriginalExtension();

            $request->profile_pic->move($profilePath, $imageName . '.' . $extenstion);

            $data['profile_pic'] = $imageName . '.' . $extenstion;
        }


        $data['role_id'] = $request->role_id;
        $data['name'] = $request->name;
        $data['contact'] = $request->contact;
        $data['joining_date'] = date('Y-m-d', strtotime($request->joining_date));
        $data['salary'] = $request->salary;
        $data['staff_id'] = $request->staff_id;

        $data['password'] = bcrypt($request->password);
        $data['email'] = Str::slug($request->name, '_') . '_' . rand(1000000, 9999999) . '@mail.com';
        $data['unique_id'] = UniqueController::uniqueId('unique_id', 'users');

        User::create($data);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uniqueId)
    {
        $profilePath = public_path('assets/img/users/');

        $user = User::where('unique_id', $uniqueId)->first();

        $request->validate([
            'staff_id' => 'required|unique:users,staff_id,' . $user->id,
        ]);


        if ($request->Hasfile('profile_pic')) {
            $imageName = Str::slug($request->name, '_') . '_' . rand(1000000, 9999999);
            $extenstion = $request->file('profile_pic')->getClientOriginalExtension();

            $request->profile_pic->move($profilePath, $imageName . '.' . $extenstion);

            $user->profile_pic = $imageName . '.' . $extenstion;
        }


        if ($request->password != "") {
            $user->password = bcrypt($request->password);
        }

        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->contact = $request->contact;
        $user->joining_date = date('Y-m-d', strtotime($request->joining_date));
        $user->salary = $request->salary;
        $user->staff_id = $request->staff_id;

        // $data = User::where('unique_id', $uniqueId)->update($userUpdate);
        $user->save();

        return $this->allUser();
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