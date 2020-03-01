@extends('layouts.manage')

@section('content')
	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Mange Users</h1>
			</div>
			<div class="column">
				<a href="{{ route('manage.users.create') }}" class="button is-primary is-pulled-right">Create New Users</a>
			</div>
		</div>

		<hr>

		<div class="card">
			<div class="card-content">
				<table class="table is-narrow is-hoverable is-fullwidth">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Date Created</th>
							<th>Actions</th>
						</tr>
					</thead>
				
					<tbody>
						@foreach($users as $user)
						<tr>
							<th>{{ $user->id }}</th>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->created_at->toFormattedDateString() }}</td>
							<td><a href="{{ route('manage.users.edit', $user->id) }}" class="button is-outlined">Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		{{ $users->links() }}
	</div>
@endsection