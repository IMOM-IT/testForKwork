<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function show($id)
    {
        $user = User::query()->where('id', $id)->firstOrFail();
        return $user;
    }

    public function update()
    {
        $data = ['name' => 1];
        //this is for test
        $user = User::query()->where('id', 1)->update($data);
        return "Изменен";
    }

    public function updateUsers(Request $request)
    {
        $data = ['name' => 1];
        //this is for test
        $user = User::query()->whereIn('id', [1, 2, 3, 4, 5])->update($data);
        return "Изменен";
    }

    public function delete()
    {
        User::query()->first()->delete();
        return 'ok';
    }

    public function deleteUsers()
    {
        User::query()->whereIn('id', [4, 5])->delete();
        return 'ok';
    }


}
