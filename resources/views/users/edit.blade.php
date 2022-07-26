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
					MongoDB can create and update fields (<b style="color: #ff0000;">Red Fields</b>) not exists in the database on the fly</br>
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
					Mysql can not store or update fields (<b style="color: #ff0000;">Red Fields</b>) not exists in the database</br>
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

								<h2>Edit user</h2>

							</div>

							<div class="pull-right">

								<a class="btn btn-primary" href="{{ Request::segment(1) == 'mongodb' ? route('usersmongo.index') : route('usersmysql.index')}}"> Back</a>

							</div>

						</div>

					</div>


					@if ($errors->any())

						<div class="alert alert-danger">

							<strong>Whoops!</strong> There were some problems with your input.<br><br>

							<ul>

								@foreach ($errors->all() as $error)

									<li>{{ $error }}</li>

								@endforeach

							</ul>

						</div>

					@endif


					<form action="{{ Request::segment(1) == 'mongodb' ? route('usersmongo.update',$User->id) : route('usersmysql.update',$User->id)}}" method="POST">

						@csrf

						@method('PUT')


						 <div class="row">

							<div class="col-xs-12 col-sm-12 col-md-12">

								<div class="form-group">

									<strong>Name:</strong>

									<input type="text" name="name" value="{{ $User->name }}" class="form-control" placeholder="Name">

								</div>

							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-12">

								<div class="form-group">

									<strong>Email:</strong>

									<input type="text" name="email" value="{{ $User->email }}" class="form-control" placeholder="Email">

								</div>

							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-12">

								<div class="form-group">

									<strong>Gender:</strong>

									<select style="border-color: #ff0000;" class="form-control" name="gender">
										<option value="Male" {{ $User->gender == 'Male' ? 'selected' : ''}} >Male</option>
										<option value="Female" {{ $User->gender == 'Female' ? 'selected' : ''}} >Female</option>
									</select>

								</div>

							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-12">

								<div class="form-group">

									<strong>Age:</strong>

									<input style="border-color: #ff0000;" type="text" name="age" value="{{ $User->age }}" class="form-control" placeholder="Age">

								</div>

							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-12">

								<div class="form-group">

									<strong>Mobile:</strong>

									<input style="border-color: #ff0000;" type="text" name="mobile" value="{{ $User->mobile }}" class="form-control" placeholder="Mobile">

								</div>

							</div>


							<div class="col-xs-12 col-sm-12 col-md-12 text-center">

							  <button type="submit" class="btn btn-primary active">Submit</button>

							</div>

						</div>


					</form>


				</div>
            </div>
        </div>
    </div>
</x-app-layout>