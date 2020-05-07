@extends('layouts.app')

@section('page_title')
	Pengaturan {{ $setting->name }}
@endsection

@section('content')
	<x-breadcrumb :links="$breadcrumb" size="lg"/>
	<x-card-large>
		<x-title>Pengaturan {{ $setting->name }}</x-title>

		<form action="{{ route('settings.edit', ['setting' => $setting]) }}" method="POST">
			@csrf
			@method('PUT')
			@foreach ($setting->setting_values()->orderBy('position', 'asc')->get() as $setting_value)
				@php
					$extra = json_decode($setting_value->extra);
					if (old('_token')) {
						$val = old($setting_value->form_name);
					}
					else {
						$val = $setting_value->value;
					}
				@endphp

				@switch($extra->type)
					@case('text')
						<x-form-group-text :label="$setting_value->name" :name="$setting_value->form_name" :id="'setting' . $setting_value->id" :value="$val" :message="$errors->first($setting_value->form_name)"/>
						@break

					@default
						<p class="text-danger">Kesalahan</p>
				@endswitch
			@endforeach
			<button type="submit" class="btn btn-primary btn-block">Simpan</button>
		</form>
	</x-card-large>
@endsection
