@extends('app')

@section('content')
<h1>About Me!</h1>
<h3>People I Like:</h3>
@if (count($people))
	<ul>
		@foreach ($people as $person)
			<li>{{ $person }}</li>
		@endforeach
	</ul>
@endif

	<h1>about me:{{ $first}} {{$last }}</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
