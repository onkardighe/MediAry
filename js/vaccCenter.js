$(document).ready(function () {
  fetchData();
  bedsinfo();

  function fetchData() {
    var url = "https://cdn-api.co-vin.in/api/v2/admin/location/states";

    var data = "";

    $.get(url, function (data) {
      var state = data.states;

      var stateSel = document.getElementById("states");
      var distsel = document.getElementById("district");
      var centsel = document.getElementById("centers");
      $("#centers").hide();
      $("#availcent").hide();
      $("#searchBtn").hide();
      $("#popup").hide();

      for (var x in state) {
        var sname = state[x].state_name;
        stateSel.options[stateSel.options.length] = new Option(sname, x);
      }

      stateSel.onchange = function () {
        centsel.length = 1;
        distsel.length = 1;

        var urldistrict =
          "https://cdn-api.co-vin.in/api/v2/admin/location/districts/" +
          this.value;

        $.get(urldistrict, function (dataDistrict) {
          var district = dataDistrict.districts;

          for (var y in district) {
            var dname = district[y].district_name;
            distsel.options[distsel.options.length] = new Option(dname, y);
          }
          distsel.onchange = function () {
            $("#centers").show();
            $("#availcent").show();
            $("#searchBtn").show();

            var distId = district[this.value].district_id;

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, "0");
            var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
            var yyyy = today.getFullYear();
            today = dd + "-" + mm + "-" + yyyy;

            var urlcenters =
              "https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/findByDistrict?district_id=" +distId +"&date=" +today;

            $.get(urlcenters, function (dataCenters) {
              var center = dataCenters.sessions;

              for (var z in center) {
                var centName = center[z].name;
                centsel.options[centsel.options.length] = new Option(
                  centName,
                  z
                );
              }

              centsel.onchange = function () {
                var centName = center[this.value].name;

                document.getElementById("centName").innerHTML = centName;
                document.getElementById("availVaccine").innerHTML =
                  center[this.value].vaccine;
                document.getElementById("availDoses").innerHTML =
                  center[this.value].available_capacity;
                document.getElementById("ageLimit").innerHTML =
                  center[this.value].min_age_limit;
                document.getElementById("fees").innerHTML =
                  center[this.value].fee;
              };
            });
          };
        });
      };

      $("#dataset").html(data);
    });
  }
  function bedsinfo() {
    var url =
      "https://api.covidbedsindia.in/v1/storages/608efad8423e2153ac2fd383/Nashik";
    var data = "";

    $.get(url, function (data) {
      var hospitalsel = document.getElementById("hospital");
      for (var x in data) {
        var HosptalName = data[x].HOSPITAL_NAME;
        // console.log(HosptalName);
        hospitalsel.options[hospitalsel.options.length] = new Option(
          HosptalName,
          x
        );
      }

      hospitalsel.onchange = function () {
        console.log(data[this.value]);
        document.getElementById("hospdoctname").innerHTML =
          data[this.value].DOCTOR_NAME;
        document.getElementById("popuphospital").style.display = "block";
        document.getElementById("hospitalName").innerHTML =
          data[this.value].HOSPITAL_NAME;
        document.getElementById("hospaddress").innerHTML =
          data[this.value].HOSPITAL_ADDRESS;
        document.getElementById("hospcontact").innerHTML =
          data[this.value].HOSPITAL_NUMBER;
        document.getElementById("hospavailgenbeds").innerHTML =
          data[this.value].BEDS_WITHOUT_OXYGEN_AVAILABLE;
        document.getElementById("hospavailoxybeds").innerHTML =
          data[this.value].BEDS_WITH_OXYGEN_AVAILABLE;
        document.getElementById("hospavailicubeds").innerHTML =
          data[this.value].ICU_BEDS_AVAILABLE;
        document.getElementById("hospavailventbeds").innerHTML =
          data[this.value].VENTILATOR_AVAILABLE;
      };

      $("#dataset").html(data);
    });
  }
});

// //////////////////////
//NAKED FUNCTIONS
////////////////////////

function toggle() {
  var popup = document.getElementById("popup");
  if (popup.style.display === "none") {
    popup.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function openVaccCent() {
  var plasmaResources = document.getElementById("plasmaResources");
  var bedform = document.getElementById("bedform");
  var vaccform = document.getElementById("vaccform");

  if (vaccform.style.display === "none") {
    vaccform.style.display = "block";
    bedform.style.display = "none";
    plasmaResources.style.display = "none";
  }
}

function openbeds() {
  var plasmaResources = document.getElementById("plasmaResources");
  var bedform = document.getElementById("bedform");
  var vaccform = document.getElementById("vaccform");

  if (bedform.style.display === "none") {
    bedform.style.display = "block";
    plasmaResources.style.display = "none";
    vaccform.style.display = "none";
  }
}

function openPlasmaResources() {
  var plasmaResources = document.getElementById("plasmaResources");
  var bedform = document.getElementById("bedform");
  var vaccform = document.getElementById("vaccform");

  if (plasmaResources.style.display === "none") {
    plasmaResources.style.display = "block";
    vaccform.style.display = "none";
    bedform.style.display = "none";
  }
}

