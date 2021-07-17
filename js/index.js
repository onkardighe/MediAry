$(document).ready(function () {
  fetchData();
  getDate();

  function fetchData() {
    // var url = "https://api.covid19api.com/summary";
    var url = "https://api.rootnet.in/covid19-in/stats/latest";

    var data = "";

    $.get(url, function(data) {
      var india = data['data']['summary'];
      console.log(data['data']['summary']);


      document.getElementById("number1").innerHTML = india.total;
      document.getElementById("number2").innerHTML = india.confirmedCasesIndian;
      document.getElementById("number3").innerHTML = india.discharged;
      document.getElementById("number4").innerHTML = india.deaths;

      //   data = `
      //         <td>${india.TotalConfirmed}</td>
      //         <td>${india.TotalDeaths}</td>
      //         <td>${india.TotalRecovered}</td>
      //         `;

      $("#dataset").html(data);
    });
  }

  //Function to Fetch the date
  function getDate() {
    let today = new Date().toLocaleDateString();
    document.getElementById("statisticsDate").innerHTML = today;
  }
});

$(document).ready(function () {
  fetchData();

  function fetchData() {
    var url = "https://cdn-api.co-vin.in/api/v2/admin/location/states";

    var data = "";

    $.get(url, function (data) {
      var india = data;


      //   document.getElementById("number1").innerHTML = india.TotalConfirmed
      //   document.getElementById("number2").innerHTML = india.TotalConfirmed
      //   document.getElementById("number3").innerHTML = india.TotalRecovered
      //   document.getElementById("number4").innerHTML = india.TotalDeaths

      //   data = `
      //         <td>${india.TotalConfirmed}</td>
      //         <td>${india.TotalDeaths}</td>
      //         <td>${india.TotalRecovered}</td>
      //         `;

      $("#dataset").html(data);
    });
  }
});
