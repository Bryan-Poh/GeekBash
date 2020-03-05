@extends('layouts.manage')

@section('content')
<div class="flex-container">
	<section class="hero is-secondary welcome is-small">
		<div class="hero-body">
			<div class="container">
				<h1 class="title">
					Hey there, {{ Auth::user()->name }}
				</h1>
				<h2 class="subtitle">
					These are your statistics so far!
				</h2>
			</div>
		</div>
	</section>
	<br>
	<section class="info-tiles">
		<div class="tile is-ancestor has-text-centered">
			<div class="tile is-parent">
				<article class="tile is-child box">
					<p class="title">{{ $users->count() }}</p>
					<p class="subtitle">Total Registered Users</p>
				</article>
			</div>
			<div class="tile is-parent">
				<article class="tile is-child box">
					<p class="title">{{ $posts->count() }}</p>
					<p class="subtitle">Total Blog Posts</p>
				</article>
			</div>
			<div class="tile is-parent">
				<article class="tile is-child box">
					@foreach($posts as $post)
						@if($post->author_id == Auth::user()->id)
							<p class="title">{{ $posts->count()}}</p>
							@break
						@endif
					@endforeach
					<p class="subtitle">Your Blog Posts</p>
				</article>
			</div>
			<div class="tile is-parent">
				<article class="tile is-child box">
					<p class="title">19</p>
					<p class="subtitle">Your Total Views</p>
				</article>
			</div>
		</div>
	</section>

	<div class="columns is-multiline">
		<div class="column is-half">
			<div class="card events-card">
				<header class="card-header">
					<p class="card-header-title">
						Notifications
					</p>
					<a href="#" class="card-header-icon" aria-label="more options">
						<span class="icon">
							<i class="fas fa-chevron-down"></i>
						</span>
					</a>
				</header>
				<div class="card-table">
					<div class="content">
						<table class="table is-fullwidth is-striped">
							<tbody>
								<tr>
									<td width="5%"><i class="far fa-bell"></i></td>
									<td>Lorum ipsum dolem aire</td>
									<td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
				<footer class="card-footer">
					<a href="#" class="card-footer-item">View All</a>
				</footer>
			</div>
		</div>
		<div class="column is-half">
			<div class="card events-card">
				<header class="card-header">
					<p class="card-header-title">
						Featured Posts
					</p>
					<a href="#" class="card-header-icon" aria-label="more options">
						<span class="icon">
							<i class="fas fa-chevron-down"></i>
						</span>
					</a>
				</header>
				<div class="card-table">
					<div class="content">
						<table class="table is-fullwidth is-striped">
							<tbody>
								<tr>
									<td width="5%"><i class="far fa-bell"></i></td>
									<td>Lorum ipsum dolem aire</td>
									<td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
				<footer class="card-footer">
					<a href="#" class="card-footer-item">View All</a>
				</footer>
			</div>
		</div>

		<div class="column is-half">
			<div class="card events-card">
				<header class="card-header">
					<p class="card-header-title">
						Most Popular Posts
					</p>
					<a href="#" class="card-header-icon" aria-label="more options">
						<span class="icon">
							<i class="fas fa-chevron-down"></i>
						</span>
					</a>
				</header>
				<div class="card-table">
					<div class="content">
						<table class="table is-fullwidth is-striped">
							<tbody>
								<tr>
									<td width="5%"><i class="far fa-bell"></i></td>
									<td>Lorum ipsum dolem aire</td>
									<td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
				<footer class="card-footer">
					<a href="#" class="card-footer-item">View All</a>
				</footer>
			</div>
		</div>

		<div class="column is-half">
			<div class="card events-card">
				<header class="card-header">
					<p class="card-header-title">
						Top 10 Active Authors
					</p>
					<a href="#" class="card-header-icon" aria-label="more options">
						<span class="icon">
							<i class="fas fa-chevron-down"></i>
						</span>
					</a>
				</header>
				<div class="card-table">
					<div class="content">
						<table class="table is-fullwidth is-striped">
							<tbody>
								<tr>
									<td width="5%"><i class="far fa-bell"></i></td>
									<td>Lorum ipsum dolem aire</td>
									<td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
				<footer class="card-footer">
					<a href="#" class="card-footer-item">View All</a>
				</footer>
			</div>
		</div>

	</div>

	@endsection
