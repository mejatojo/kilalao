<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Jouet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
class JouetController extends Controller
{
    public function store(Request $req)
    {
        $validation = ['name', 'contact', 'nom_jouet', 'photo', 'echange'];
        $error = '';
        foreach($validation as $val)
        {
            if(!isset($req[$val]))
            {
                $error = $error. $val . ' is required, ';
            }
        }
        if($error) return $error;
        $user = User::where('name', $req->name)->where('contact', $req->contact)->first();
        if(!$user)
        {
            $user = User::create([
                'name' => $req->name,
                'contact' => $req->contact
            ]);
        }
        $storage_path = Storage::disk('local')->put('Jouets', $req->photo);
        $user->jouets()->create([
            "nom_jouet" => $req->nom_jouet,
            "photo" => '/storage/' . $storage_path,
            "echange" => $req->echange
        ]);
        return response()->json([
            'message' => 'Toy added successfully'
        ], 200);
    }
    public function index()
    {
        $toys = DB::table('users')
        ->join('jouets', 'jouets.user_id', 'users.id')
        ->where('status', 'Enabled')
        ->paginate(10);

        return response()->json([
            'Toys' => $toys
        ], 200);
    }
    public function desactive(Jouet $jouet)
    {
        $jouet->update([
            'status' => 'Disabled'
        ]);
        return response()->json([
            'message' => 'Toy disabled successfully'
        ], 200);
    }
}
