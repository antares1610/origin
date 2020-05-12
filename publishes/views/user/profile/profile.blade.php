@extends('layouts.app')

@section('page_title')
	Profil {{ $user->name }}
@endsection

@section('content')
	<x-breadcrumb :links="$breadcrumb" size="md"/>
	<x-card-medium>
		<x-title>Profil {{ $user->name }}</x-title>
		<div class="form-row">
			<div class="col-12 col-md-3">
				<x-avatar :url="$user->avatar()"/>
			</div>
			<div class="col-12 col-md-9">
				<hr class="d-md-none">
				<h3 class="h5">{{ $user->name }}</h3>
			</div>
		</div>

		@auth
			@if ($user->id == Auth::user()->id)
				<hr>

				<div>
					<a href="{{ route('avatar.edit') }}" class="btn btn-outline-primary btn-sm">Ganti Avatar</a>
					<a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">Edit Profil</a>
				</div>
			@endif
		@endauth
	</x-card-medium>
@endsection
