<?php

namespace App\Http\Controllers;

use App\Models\UsersMongo as Users;
use App\Models\PostsMongo as Posts;
use App\Models\CommentsMongo as Comments;
use App\Models\FriendsMongo as Friends;
use Auth;
use App\Models\UsersMysql;

use Illuminate\Http\Request;

class UsersMongoController extends Controller

{
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
		UsersMysql::create($requests);

        return redirect()->route('usersmongo.index')

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
            'gender' => 'required',
			'age' => 'required',
			'email' => 'required',
			'mobile' => 'required',

        ]);


        $User->update($request->all());


        return redirect()->route('usersmongo.index')

                        ->with('success','Users updated successfully');

    }

    public function destroy(Users $User)
    {

        $User->delete();


        return redirect()->route('usersmongo.index')

                        ->with('success','Users deleted successfully');

    }
	
	public function friend(Users $User)
    {
		if ($User->email != Auth::User()->email){
			
			$User->push('friends', [
				'user_id' => $User->email,
				'friend_id' => Auth::User()->email,
			], true);
			
			$friend = Users::where('email', Auth::User()->email)->get();
			
			$friend[0]->push('friends', [
				'user_id' => Auth::User()->email,
				'friend_id' => $User->email,
			], true);
			
			
			return redirect()->route('usersmongo.index')

							->with('success','User be friend successfully');
		}
		return redirect()->route('usersmongo.index');
    }
	
	public function unfriend(Users $User)
    {
		
		$User->pull('friends', ['user_id' => $User->email, 'friend_id' => Auth::User()->email]);
		
		$friend = Users::where('email', Auth::User()->email)->get();
		$friend[0]->pull('friends', ['user_id' => Auth::User()->email, 'friend_id' => $User->email]);
		
		return redirect()->route('usersmongo.index')

                        ->with('success','Delete friend successfully');
    }

}