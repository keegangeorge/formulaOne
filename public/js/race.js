function setUpSeasonUI() {
  $("#seasonDropdown").html(`${new Date().getFullYear()}`);
  $.ajax({ method: "GET", url: "./backend/GetRaceSeason.php" }).done(function(
    data
  ) {
    var result = $.parseJSON(data);
    var y = result[0];
    var cur_year = $("#seasonDropdown").html();
    for (var i = 0; i < result.length; i++) {
      y = result[i];
      if (y.year == cur_year) {
        $("#seasonDropdownDiv").append(
          `<li class="dropdown-item selected" id="${y.year}" >${y.year}</li>`
        );
      } else {
        $("#seasonDropdownDiv").append(
          `<li class="dropdown-item" id="${y.year}" >${y.year}</li>`
        );
      }
    }

    // Set up listener
    $("#seasonDropdownDiv").on("click", ".dropdown-item", function(event) {
      $("#seasonDropdownDiv .dropdown-item").removeClass("selected");
      $(event.target).addClass("selected");
      $("#seasonDropdown").html(event.target.id);
      $("#dropdownCountryButton").trigger("click");
      setUpCardDataUI();
      setUpCountryUI();
    });
  });
}


function setUpCountryUI() {
  $("#dropdownCountryButton").html("Display All");
  $("#countryDropdownSelect").empty();
  $("#countryDropdownSelect").prepend(
    '<li class="dropdown-item selected" id="Display All" >Display All</li>'
  );
  var year = $("#seasonDropdown").html();

  $.ajax({
    method: "GET",
    url: `./backend/GetRaceByYear.php?year=${year}`
  }).done(function(data) {
    var result = $.parseJSON(data);
    for (var i = 0; i < result.length; i++) {
      var c = result[i];
      $("#countryDropdownSelect").append(
        `<li class="dropdown-item" id="${c.country}" >${c.country}</li>`
      );
    }
    // Set up listener
    $("#countryDropdownSelect").on("click", ".dropdown-item", function(event) {
      $("#countryDropdownSelect .dropdown-item").removeClass("selected");
      $(event.target).addClass("selected");
      $("#dropdownCountryButton").html(event.target.id);
      setUpCardDataUI();
    });
  });
}

// * Globals * //
var result_limit = 5;
var cardImage = "";
var btnBlock = "";
var columnSize = 4;
var cardWidth = "";

function setUpShowMore() {
    $("#btnShowMore").on("click", function() {
        result_limit = result_limit + 4;
        setUpCardDataUI();
    })
}

function setUpViewStyle() {
    $("#galleryView").on("click", function() {
        btnBlock = "";
        columnSize = 4;
        cardWidth = "";
        setUpCardDataUI();
    })

    $("#listView").on("click", function() {
        cardImage = "";
        btnBlock = "btn-block";
        columnSize = 12;
        cardWidth = "w-75";
        setUpCardDataUI();
    })
}

function displayCount() {
    $("#display_5_races").on("click", function() {
        result_limit = 5;
        setUpCardDataUI();
    })

    $("#display_10_races").on("click", function() {
        result_limit = 10;
        setUpCardDataUI();
    })

    $("#display_15_races").on("click", function() {
        result_limit = 15;
        setUpCardDataUI();
    })

    $("#display_all_races").on("click", function() {
        console.log("clicked all");
        result_limit = 100;
        setUpCardDataUI();
    })

}

function setUpCardDataUI() {
  $("#card_ui").empty();

  var search_val = $("#search_by_title").val();
  var year = $("#seasonDropdown").html();
  var country = $("#dropdownCountryButton").html();

  if (country == "Display All") {
    country = "";
  }
  // console.log(country);

  if (search_val.length == 0 || search_val == "Enter") {
    search_val = "";
  }



  $.ajax({
    method: "GET",
    dataType: "json",
    url: `./backend/GetRaceCardByYearCountryTitle.php?year=${year}&country=${country}&title=${search_val}&result_limit=${result_limit}`
  }).done(function(result) {
    $("#card_ui").empty();

    // var result = $.parseJSON(data);
    console.log(result);
    // TODO: add the card ui
    var y = result[0];

    // // For races without a recorded time
    // if (y.time == null) {
    //     // display this text instead of null
    //     y.time = "Time not recorded"
    // }



    for (var i = 0; i < result.length; i++) {
      y = result[i];
      console.log("RESULT LENGTH: " + result.length);

      console.log("RESULT LIMIT: " + result_limit);


      if (result_limit > result.length) {
          $('#btnShowMore').hide();
      }


      // show cards with image when gallery view selected
      if ($("#galleryView").hasClass("active")) {
        cardImage =
          '<img class="card-img-top" src="../public/assets/img/recent-race-img/' + y.country + '.jpg" alt="">';
        // btnBlock = "";
        // columnSize = 4;
        // cardWidth = "";
        // don't show image when listView selected
      } else if ($("#listView").hasClass("active")) {
        // cardImage = "";
        // btnBlock = "btn-block";
        // columnSize = 6;
        // cardWidth = "w-75";
      }


        $("#card_ui").append(`

            <div class="col-md-${columnSize}" data-aos="fade-up">
            
            <div class="${cardWidth} mt-5 card shadow-sm border-0">

            ${cardImage}

                <div class="card-body">

                    <h5 class="card-title text-secondary">
                    ${y.name}
                    </h5>

                    <div class="row ml-0">
                        <i class="fas fa-calendar-day mr-2 text-primary"></i>
                        <h6>${y.date}</h6>
                    </div>

                    <div class="row ml-0">
                        <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                        <h6>
                            <a class="text-dark" data-toggle="tooltip" data-placement="right" data-original-title="Insert crd" class="text-dark" target="_blank" href="http://google.com/maps/place/">${y.location}, ${y.country}</a>
                        </h6>
                    </div>
                
                    <div class=" row ml-0">
                        <i class="fas fa-clock mr-2 text-primary"></i>
                        <h6>${y.time}</h6>
                    </div>

                    <a href="race-details.php?raceId=${y.raceId}" class='btn mt-2 btn-sm btn-primary ${btnBlock} text-white'>View Details</a>


                </div> 
                </div>
            </div>
        `);
    }
  });
}

function setSearchBar() {
  $("#search_by_title").keyup(function(event) {
    var key = event.originalEvent.key;
    if (key == "Enter") {
      setUpCardDataUI();
    } else {
      $("#suggestionSelect").empty();

      var search_val = $("#search_by_title").val();

      if (search_val.length != 0) {
        // console.log(search_val);
        $.ajax({
          method: "GET",
          url: `./backend/GetRaceTitleSearch.php?title=${search_val}`
        }).done(function(data) {
          // console.log(data);
          var result = $.parseJSON(data);
          for (var i = 0; i < result.length; i++) {
            var n = result[i];
            var new_id = n.name.replace(/\s/g, "");
            $("#suggestionSelect").append(
              `<li class="dropdown-item" id="${new_id}" >${n.name}</li>`
            );
            $(`#${new_id}`).click(function(event) {
              $("#search_by_title").val(n.name);
              setUpCardDataUI();
            });
            $("#search_by_title").trigger("click");
          }
        });
      }
      $("#search_by_title").trigger("click");
    }
  });
}

// Wait for the page load render


$(document).ready(function() {
  setUpShowMore();
  setUpViewStyle();
  displayCount();
  setUpSeasonUI();
  setUpCountryUI();
  setSearchBar();
  setUpCardDataUI();
});

