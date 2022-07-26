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
					As we see MongoDB cant do good relations between records to get names of friends users as mysql do</br>
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
					As we see Mysql is perfect in relations between records</br>
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

								<h2> Show User</h2>

							</div>

							<div class="pull-right">

								<a class="btn btn-primary" href="{{ Request::segment(1) == 'mongodb' ? route('usersmongo.index') : route('usersmysql.index')}}"> Back</a>

							</div>

						</div>

					</div>


					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-12">

							<div class="form-group">

								<strong>Name:</strong>

								{{ $User->name }}

							</div>

						</div>

						<div class="col-xs-12 col-sm-12 col-md-12">

							<div class="form-group">

								<strong>Gender:</strong>

								{{ $User->gender }}

							</div>

						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-12">

							<div class="form-group">

								<strong>Age:</strong>

								{{ $User->age }}

							</div>

						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-12">

							<div class="form-group">

								<strong>Email:</strong>

								{{ $User->email }}

							</div>

						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-12">

							<div class="form-group">

								<strong>Mobile:</strong>

								{{ $User->mobile }}

							</div>

						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-12">

							<div class="form-group">
								<div class="row">
									<div class="col-xs-1"><strong>Frinds:</strong></div>
									<div class="col-xs-11">
										@foreach ($User->friends as $friend)
											@if(Request::segment(1) == 'mongodb')
												<strong>{{ $friend->friend_id}}</strong></br>
											@else
												<strong>{{ $friend->user->name}} - {{ $friend->user->email}}</strong></br>
											@endif
										@endforeach
									</div>
								</div>
							</div>

						</div>

					</div>
					
					
				</div>
            </div>
        </div>
    </div>
</x-app-layout>