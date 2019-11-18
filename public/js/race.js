function setUpSeasonUI() {
    $("#seasonDropdown").html(`${new Date().getFullYear()}`);
    $.ajax({method: "GET", url: "./backend/GetRaceSeason.php"}).done(function(data){
        var result= $.parseJSON(data); 
        
        var y = result[0];
        var cur_year = $("#seasonDropdown").html();
        for (var i = 0; i < result.length; i++){
            y = result[i];
            if (y.year == cur_year){
                $("#seasonDropdownDiv").append(`<li class="dropdown-item selected" id="${y.year}" >${y.year}</a>`);
            }
            else {
                $("#seasonDropdownDiv").append(`<li class="dropdown-item" id="${y.year}" >${y.year}</a>`);
            }
        }

        // Set up listener
        $("#seasonDropdownDiv").on("click", ".dropdown-item", function(event){
            $("#seasonDropdownDiv .dropdown-item").removeClass('selected');
            $(event.target).addClass('selected');
            $("#seasonDropdown").html(event.target.id);
            setUpCountryUI();
        });
    });
}

function setUpCountryUI() {
    $("#dropdownCountryButton").html("Display All");
    $("#countryDropdownSelect").empty();
    $("#countryDropdownSelect").prepend('<li class="dropdown-item selected" id="Display All" >Display All</a>');
    var year = $("#seasonDropdown").html();

    $.ajax({method: "GET", url: `./backend/GetRaceByYear.php?year=${year}`}).done(function(data){
        var result= $.parseJSON(data); 
        for (var i = 0; i < result.length; i++){
            var c = result[i];
            $("#countryDropdownSelect").append(`<li class="dropdown-item" id="${c.country}" >${c.country}</a>`);

        }
    // Set up listener
    $("#countryDropdownSelect").on("click", ".dropdown-item", function(event){
        $("#countryDropdownSelect .dropdown-item").removeClass('selected');
        $(event.target).addClass('selected');
        $("#dropdownCountryButton").html(event.target.id);
    });
})
}


// Wait for the page load render
$(document).ready(function(){
    $.ajax({method: "GET", url: "./backend/GetRaceTitleSearch.php?title=Aus"}).done(function(data){
    })
    setUpSeasonUI();
    setUpCountryUI();
});