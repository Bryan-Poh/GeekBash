@extends('layouts.app')

@section('content')
<div class="container">
	
	<div class="contact-form columns m-t-50">
		<div class="column">
		<h1 class="title">Drop us a message.</h1>
			<form action="mailto:contact@geekbash.com" method="POST" enctype="text/plain">
				<div class="field">
				  <div class="control">
				    <input class="input" type="text" placeholder="Full Name" name="Full Name">
				  </div>
				</div>

				<div class="field">
				  <div class="control">
				    <input class="input" type="email" placeholder="Email Address">
				  </div>
				</div>

				<div class="field">
				  <div class="control">
				    <textarea class="textarea" placeholder="Message" name="Message"></textarea>
				  </div>
				</div>

				<div class="field is-grouped">
				  <div class="control">
				    <input type="submit" class="button is-link"></input>
				  </div>
				</div>	
			</form>
		</div>

		<div class="column">
			<img src="{{ asset('images/newsletter.svg') }}" alt="">
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/coronatracker.js') }}"></script>
<script>
	$(".article").click(function() {
    $('.article').css('cursor', 'pointer'); // 'default' to revert
    var link = $(this).find("a");

    link.attr("target", "_blank");
    window.open(link.attr("href"));

    return false;
  });
</script>
@endsection