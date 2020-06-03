document.querySelector("#loadBtn").addEventListener("click", loadData);

// Load global data on window load
document.addEventListener("DOMContentLoaded", loadGlobalData, false );

$(document).ready(function () {
  let url = "https://newsapi.org/v2/top-headlines?q=corona&language=en&apiKey=a19bdd750a624da99448f64f79bbecb3";
  
  $.ajax({
    url: url,
    method: "GET",
    dataType: "JSON",

    beforeSend: function () {
      $(".progress").show();
    },

    complete: function () {
      $(".progress").hide();
    },

    success: function (newsdata) {
      let output = "";
      let newsArticle = newsdata.articles;
      for (var i in newsArticle) {

      	var date = new Date(newsArticle[i].publishedAt);
      	var articleSource = (newsArticle[i].source.name).toUpperCase();
        output += `
         <article class="media article">
				  <figure class="media-left">
				    <p class="image is-128x128">
				      <img src="${newsArticle[i].urlToImage}">
				    </p>
				  </figure>
				  <div class="media-content">
				    <div class="content">
				      <p>
				        <strong><a href="${newsArticle[i].url}" target="_blank">${newsArticle[i].title}</a></strong>
				        <br>
				        	${articleSource}: ${newsArticle[i].description}
				      </p>
				      <small class="is-pulled-right">${timeSince(date)} ago</small>
				    </div>
				  </div>
				</article>
        `;
      }

      if (output !== "") {
        $("#corona-news").html(output);
      }

    },

    error: function () {
      let errorMsg = `<div class="errorMsg center">Some error occured</div>`;
      $("#newsResults").html(errorMsg);
    }
  });
});

function loadData()
{
	// Show table
	var x = document.getElementById("country_table");
	x.style.display = "";

	// Get user input for country name
	const countryName = document.getElementById('country_input').value;

	let urlAPI = "https://covid-19-coronavirus-statistics.p.rapidapi.com/v1/total?country=" + countryName;
	console.log(urlAPI);

	var data = null;

	var xhr = new XMLHttpRequest();
	xhr.withCredentials = true;

	xhr.addEventListener("readystatechange", function () {
		if (this.readyState === this.DONE) {
			console.log(this.responseText);
		}
	});

	xhr.open("GET", urlAPI, true);
	xhr.setRequestHeader("x-rapidapi-host", "covid-19-coronavirus-statistics.p.rapidapi.com");
	xhr.setRequestHeader("x-rapidapi-key", "7bf6074f36mshab3355628fa6a7ep1215b3jsn5e1bf94684b0");

	xhr.onload  = function(){
		// OK Status
		if (this.status === 200) {
			const response = JSON.parse(this.responseText);

			const list = response.data;

			let output = "";

			let location = list.location;
			let confirmed = list.confirmed;
			let recovered = list.recovered;
			let deaths = list.deaths;

				output += `
					<td>${numberWithCommas(location)}</td>
					<td>${numberWithCommas(confirmed)}</td>
					<td>${numberWithCommas(recovered)}</td>
					<td>${numberWithCommas(deaths) }</td>
				`

			document.querySelector("#table-row").innerHTML = output;
		}
	}

	xhr.send(data);

	// Preevent refresh on browser
	event.preventDefault();
}

function loadGlobalData()
{
	let urlAPI = "https://covid-19-coronavirus-statistics.p.rapidapi.com/v1/total?country=Global`";

	var data = null;

	var xhr = new XMLHttpRequest();
	xhr.withCredentials = true;

	xhr.addEventListener("readystatechange", function () {
		if (this.readyState === this.DONE) {
			console.log(this.responseText);
		}
	});

	xhr.open("GET", urlAPI, true);
	xhr.setRequestHeader("x-rapidapi-host", "covid-19-coronavirus-statistics.p.rapidapi.com");
	xhr.setRequestHeader("x-rapidapi-key", "7bf6074f36mshab3355628fa6a7ep1215b3jsn5e1bf94684b0");

	xhr.onload  = function(){
		// OK Status
		if (this.status === 200) {
			const response = JSON.parse(this.responseText);

			const list = response.data;

			console.log(list);

			let location = list.location;
			let confirmed = list.confirmed;
			let recovered = list.recovered;
			let deaths = list.deaths;

			console.log(confirmed + ", " + recovered + ", " + deaths);

			document.querySelector("#global-confirmed").innerHTML = numberWithCommas(confirmed);
			document.querySelector("#global-recovered").innerHTML = numberWithCommas(recovered);
			document.querySelector("#global-deaths").innerHTML = numberWithCommas(deaths);
		}
	}

	xhr.send(data);

	// Preevent refresh on browser
	event.preventDefault();
}



function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function toggleMenu(){
		var x = document.getElementById("country_table");
	  if (x.style.display === "none") {
	    x.style.display = "block";
	  } else {
	    x.style.display = "none";
	  }
}

function timeSince(date) {

  var seconds = Math.floor((new Date() - date) / 1000);

  var interval = Math.floor(seconds / 31536000);

  if (interval > 1) {
    return interval + " years";
  }
  interval = Math.floor(seconds / 2592000);
  if (interval > 1) {
    return interval + " months";
  }
  interval = Math.floor(seconds / 86400);
  if (interval > 1) {
    return interval + " days";
  }
  interval = Math.floor(seconds / 3600);
  if (interval > 1) {
    return interval + " hours";
  }
  interval = Math.floor(seconds / 60);
  if (interval > 1) {
    return interval + " minutes";
  }
  return Math.floor(seconds) + " seconds";
}
