<?php

namespace App\Http\Controllers;

use App\Models\UsersMysql as Users;
use App\Models\PostsMysql as Posts;
use App\Models\CommentsMysql as Comments;
use App\Models\FriendsMysql as Friends;
use Auth;
use App\Models\UsersMongo;

use Illuminate\Http\Request;

class UsersMysqlController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $users = Users::all();

        return view('users.index',compact('users'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()

    {

        return view('users.create');

    }

    public function store(Request $request)

    {

        request()->validate([

            'name' => 'required',
            'gender' => 'required',
			'age' => 'required',
			'email' => 'required',
			'mobile' => 'required',

        ]);

		$requests = $request->all();
		$requests['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
		
        Users::create($requests);
		UsersMongo::create($requests);

        return redirect()->route('usersmysql.index')

                        ->with('success','Users created successfully.');

    }

    public function show(Users $User)

    {

        return view('users.show',compact('User'));

    }

    public function edit(Users $User)

    {

        return view('users.edit',compact('User'));

    }

    public function update(Request $request, Users $User)

    {

         request()->validate([

            'name' => 'required',
            //'gender' => 'required',
			//'age' => 'required',
			'email' => 'required',
			//'mobile' => 'required',

        ]);


        $User->update($request->all());


        return redirect()->route('usersmysql.index')

                        ->with('success','Users updated successfully');

    }

    public function destroy(Users $User)

    {

        $User->delete();


        return redirect()->route('usersmysql.index')

                        ->with('success','Users deleted successfully');

    }
	
	public function friend(Users $User)
    {
		if ($User->id != Auth::User()->id){
			
			$from = new Friends();
			$from->user_id = Auth::User()->id;
			$from->friend_id = $User->id;
			$from->save();
			
			$to = new Friends();
			$to->user_id = $User->id;
			$to->friend_id = Auth::User()->id;
			$to->save();
			
			return redirect()->route('usersmysql.index')

							->with('success','User be friend successfully');
		}
		return redirect()->route('usersmysql.index');
    }
	
	public function unfriend(Users $User)
    {
		Friends::where('friend_id', Auth::User()->id)->where('user_id', $User->id)->delete();
		Friends::where('friend_id', $User->id)->where('user_id', Auth::User()->id)->delete();
		
		
		return redirect()->route('usersmysql.index')

                        ->with('success','Delete friend successfully');
    }

}