<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UserRequest;
use App\Models\Pegawai;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with("getPegawai")->get();

        Log::info(" Berhasil mengambil data user", ["total data" => count($users)]);

        return view("admin.user.index", compact("users"));
    }

    public function create() 
    {
        $pegawais = Pegawai::doesntHave('user')->get();

        return view("admin.user.add", compact("pegawais"));
    }

    public function store(UserRequest $request)
    {
        try {
            $user = User::create($request->validated());

            Log::info("Berhasil menambahkan data user", ["user id"=> $user->user_id]);

            return redirect()->route("user")->with("success","Berhasil menambahkan data user");
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan data user", ["error_message"=> $e->getMessage()]);
            
            return redirect()->route("user.add")->with("error","Gagal menambahkan data user");
        }
    }

    public function show(string $id)
    {
        $user = User::with("getPegawai")->findOrFail($id);

        Log::info("Data user ditemukan", ["user id"=> $user->user_id]);

        return view("admin.user.detail", compact("user"));
    }

    public function edit(string $id) 
    {
        $user = User::with("getPegawai")->findOrFail($id);
        $pegawais = Pegawai::doesntHave('user')->get();

        Log::info("Data user ditemukan", ["user id"=> $user->user_id]);

        return view("admin.user.edit", compact("user", "pegawais"));
    }

    public function update(UserRequest $request, string $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->update($request->validated());

            Log::info("Berhasil mengupdate user", ["user id"=> $user->user_id]);

           return redirect()->route("user")->with("success","Berhasil mengupdate user");
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate user", ["error_message"=> $e->getMessage()]);
            
            return redirect()->route("user.edit")->with("error","Gagal mengupdate user");
        }
    }

    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->delete();

            Log::info("Berhasil menghapus data user", ["user id"=> $id]);

            return redirect()->route("user")->with("success","Berhasil menghapus data user");
        } catch (\Exception $e) {
            Log::error("Gagal menghapus data user", ["error_message"=> $e->getMessage()]);

            return redirect()->route("user")->with("error","Gagal menghapus data user");
        }
    }
}
