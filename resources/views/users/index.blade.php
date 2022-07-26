<x-app-layout>
	<x-slot name="header">
        
		@if(Request::segment(1) == 'mongodb')
			<div class="row">
				<div class="col-md-2">
					<h2 class="font-semibold text-xl text-gray-800 leading-tight">
						{{ __('MongoDB') }}
					</h2>
				</div>
				<div class="col-md-10">
					NoSQL non-relational, databases are document, key-value, graph, or wide-column stores, create fields on the fly</br>
					NoSQL databases have dynamic schemas for unstructured data, databases are horizontally scalable</br>
					NoSQL better for unstructured data like documents or JSON.
				</div>
			</div>
		@else
			<div class="row">
				<div class="col-md-2">
					<h2 class="font-semibold text-xl text-gray-800 leading-tight">
						{{ __('Mysql') }}
					</h2>
				</div>
				<div class="col-md-10">
					SQL databases are relational, table-based, vertically scalable</br>
					SQL use structured query language and have a predefined schema</br>
					SQL databases are better for multi-row transactions
					
					
				</div>
			</div>
		@endif
        
    </x-slot>
	
	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					
					

						<div class="row">

							<div class="col-lg-12 margin-tb">

								<div class="pull-left">

									<h2>Users</h2>

								</div>

								<div class="pull-right">

									<a class="btn btn-success" href="{{ Request::segment(1) == 'mongodb' ? route('usersmongo.create') : route('usersmysql.create')}}"> Create New user</a>
									<strong>Password =</strong> password
								</div>

							</div>

						</div>


						@if ($message = Session::get('success'))

							<div class="alert alert-success">

								<p>{{ $message }}</p>

							</div>

						@endif

						<table class="table table-bordered">

							<tr>

								<th>No</th>
								<th>Name</th>
								<th>Gender</th>
								<th>Age</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Friends</th>

								<th width="400px">Action</th>

							</tr>

							@foreach ($users as $user)

							<tr>

								<td>{{ ++$i }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->gender }}</td>
								<td>{{ $user->age }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->mobile }}</td>
								<td>{{ $user->friends->count() }}</td>
								
								<td>

									<form action="{{ Request::segment(1) == 'mongodb' ? route('usersmongo.destroy',$user->id) : route('usersmysql.destroy',$user->id)}}" method="POST">

										<a class="btn btn-info btn-sm" href="{{ Request::segment(1) == 'mongodb' ? route('usersmongo.show',$user->id) : route('usersmysql.show',$user->id)}}">Show</a>

										<a class="btn btn-primary btn-sm" href="{{ Request::segment(1) == 'mongodb' ? route('usersmongo.edit',$user->id) : route('usersmysql.edit',$user->id)}}">Edit</a>
										
										<a class="btn btn-primary btn-sm" href="{{ Request::segment(1) == 'mongodb' ? route('usersmongo.friend',$user->id) : route('usersmysql.friend',$user->id)}}">Friend</a>
										<a class="btn btn-primary btn-sm" href="{{ Request::segment(1) == 'mongodb' ? route('usersmongo.unfriend',$user->id) : route('usersmysql.unfriend',$user->id)}}">UnFriend</a>

										@csrf

										@method('DELETE')

										<button type="submit" class="btn btn-danger btn-sm active">Delete</button>

									</form>

								</td>

							</tr>

							@endforeach

						</table>


					
				</div>
            </div>
        </div>
    </div>
</x-app-layout>