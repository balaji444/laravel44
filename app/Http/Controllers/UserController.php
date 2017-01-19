<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
        /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke($id)
    {
//        $pdf = \App::make('dompdf.wrapper');
//        $pdf->loadHTML('<h1>Test</h1>');
//        return $pdf->setPaper('letter', 'portrait')
//                ->stream();
        $users = DB::table('users')->where('id', $id)->first();
        var_dump($users);
        return 'User Id:'.$id;//return view('user.profile', ['user' => User::findOrFail($id)]);
	//exit;
    }
}
