@extends('layouts.app')

@section('content')

<div class="container text-center">
	<img src="{{ $partner->logo }}" alt="{{ $partner->partner_name }}" title="{{ $partner->partner_name }}">
	<h2><small><a href="{{ $partner->partner_website }}">Site web</a></small></h2>
	<div class="description">
		<p>{{ $partner->description }}</p>
	</div>
</div>

@endsection