$(document).ready(function () {
  fetchData();
  getDate();

  function fetchData() {
    // var url = "https://api.covid19api.com/summary";
    var url = "https://api.rootnet.in/covid19-in/stats/latest";

    var data = "";

    $.get(url, function (data) {
      var indiaSummary = data["data"]["summary"];
      var states = data["data"]["regional"];
    //   console.log(states);

      document.getElementById("number1").innerHTML = indiaSummary.total;
      document.getElementById("number2").innerHTML = indiaSummary.confirmedCasesIndian;
      document.getElementById("number3").innerHTML = indiaSummary.discharged;
      document.getElementById("number4").innerHTML = indiaSummary.deaths;


	  for(var x in states)
	  {
		  if(states[x]["loc"] == ("Maharashtra"))
		  {
			  console.log(states[x]);
			  break;
		  }
		// console.log(states[x]);
	
	
	}

      $("#dataset").html(data);
    });
  }






  //Function to Fetch the date
  function getDate() {
    let today = new Date().toLocaleDateString();
    document.getElementById("statisticsDate").innerHTML = today;
  }
});
