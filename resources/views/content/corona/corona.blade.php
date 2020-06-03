@extends('layouts.app')

@section('content')
<div class="container" onload="loadGlobalData()">
  <section class="hero m-b-50 m-t-50">
  <h1 class="title">
        Corona Tracker
      </h1>
      <h2 class="subtitle">
        Unofficial corona tracker by GeekBash. 
        <p>Data is gathered from <a href="https://rapidapi.com/KishCom/api/covid-19-coronavirus-statistics?endpoint=apiendpoint_177563f5-bb6d-4f4f-86ae-456f919afbc2" target="_blank"> rapidapi.com </a></p>
      </h2>
</section>
	<div class="notification">

		<!-- Global data -->
    <nav class="level is-mobile">
      <div class="level-item has-text-centered">
        <div class="global-corona global-confirmed">
          <p class="heading">Confirmed</p>
          <p class="title value" id="global-confirmed">0</p>
        </div>
      </div>

      <div class="level-item has-text-centered">
        <div class="global-corona global-recovered">
          <p class="heading">Recovered</p>
          <p class="title value" id="global-recovered">0</p>
        </div>
      </div>

      <div class="level-item has-text-centered">
        <div class="global-corona global-deaths">
          <p class="heading">Deaths</p>
          <p class="title value" id="global-deaths">0</p>
        </div>
      </div>
    </nav>
	</div> 
	
	<div class="columns">
		<div class="column is-two-thirds">
			<div class="container">
				<div >
					<form class="form">
						<input type="text" class="form__field" placeholder="Search country.." id="country_input" style="text-transform: capitalize;"/>
						<button type="button" class="btn btn--primary btn--inside uppercase" id="loadBtn">Search</button>
					</form>
				</div>
			</div>

		  <table class="table is-fullwidth" id="country_table" style="display: none;">
			  <thead>
			    <tr>
			      <th>Country</th>
			      <th>Confirmed</th>
			      <th>Recovered</th>
			      <th>Deaths</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr id="table-row">
			      
			    </tr>
			  </tbody>
			</table>
			
			<div class="corona-news m-t-50">
				<h1 class="title">Latest News On CoronaVirus</h1>
				<div id="corona-news">
					<article class="media article">
					  <figure class="media-left">
					    <p class="image is-64x64">
					      <img src="https://bulma.io/images/placeholders/128x128.png">
					    </p>
					  </figure>
					  <div class="media-content">
					    <div class="content">
					      <p>
					        <strong>Loading..</strong> <small class="is-pulled-right">..</small>
					        <br>
					        .....
					      </p>
					    </div>
					  </div>
					</article>
				</div>
			</div>
		</div>

		<div class="column">
			<a class="twitter-timeline" href="https://twitter.com/WHO?ref_src=twsrc%5Etfw" data-height="850">Tweets by WHO</a> 
			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	</div>
	

	
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/coronatracker.js') }}"></script>
<script>
	$(".article").click(function() {
    var link = $(this).find("a");

    link.attr("target", "_blank");
    window.open(link.attr("href"));

    return false;
  });
</script>
@endsection