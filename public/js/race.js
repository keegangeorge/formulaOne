function setUpSeasonUI() {
    $("#seasonDropdown").html(`${new Date().getFullYear()}`);
    $.ajax({method: "GET", url: "./backend/GetRaceSeason.php"}).done(function(data){
        var result= $.parseJSON(data); 
        
        var y = result[0];
        var cur_year = $("#seasonDropdown").html();
        for (var i = 0; i < result.length; i++){
            y = result[i];
            if (y.year == cur_year){
                $("#seasonDropdownDiv").append(`<li class="dropdown-item selected" id="${y.year}" >${y.year}</li>`);
            }
            else {
                $("#seasonDropdownDiv").append(`<li class="dropdown-item" id="${y.year}" >${y.year}</li>`);
            }
        }

        // Set up listener
        $("#seasonDropdownDiv").on("click", ".dropdown-item", function(event){
            $("#seasonDropdownDiv .dropdown-item").removeClass('selected');
            $(event.target).addClass('selected');
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
    $("#countryDropdownSelect").prepend('<li class="dropdown-item selected" id="Display All" >Display All</li>');
    var year = $("#seasonDropdown").html();

    $.ajax({method: "GET", url: `./backend/GetRaceByYear.php?year=${year}`}).done(function(data){
        var result= $.parseJSON(data); 
        for (var i = 0; i < result.length; i++){
            var c = result[i];
            $("#countryDropdownSelect").append(`<li class="dropdown-item" id="${c.country}" >${c.country}</li>`);

        }
    // Set up listener
    $("#countryDropdownSelect").on("click", ".dropdown-item", function(event){
        $("#countryDropdownSelect .dropdown-item").removeClass('selected');
        $(event.target).addClass('selected');
        $("#dropdownCountryButton").html(event.target.id);
        setUpCardDataUI();
    });
})
}

function setUpCardDataUI(){
    
    // TODO: empty cardUI div
    $("#card_ui").empty();
    var search_val = $("#search_by_title").val();
    var year = $("#seasonDropdown").html();
    var country = $("#dropdownCountryButton").html();
    if (country == "Display All"){
        country = "";
    }
    if (search_val.length == 0 || search_val ==  "Enter"){
        search_val = "";
    } 
    $.ajax({method: "GET", url: `./backend/GetRaceCardByYearCountryTitle.php?year=${year}&country=${country}&title=${search_val}`}).done(function(data){
        var result = $.parseJSON(data);
        console.log(result);
        //TODO: add the card ui
    });
}

function setSearchBar(){
    $("#search_by_title").keyup(function(event){
        var key = event.originalEvent.key;
        if (key == "Enter") {
            setUpCardDataUI();
        } else {
            $("#suggestionSelect").empty();
            var search_val = $("#search_by_title").val();
            if (search_val.length != 0){
                console.log(search_val);
                $.ajax({method: "GET", url: `./backend/GetRaceTitleSearch.php?title=${search_val}`}).done(function(data){
                    console.log(data);
                    var result = $.parseJSON(data);
                    for (var i=0; i < result.length; i++){
                        var n = result[i];
                        var new_id = n.name.replace(/\s/g, "");
                        $("#suggestionSelect").append(`<li class="dropdown-item" id="${new_id}" >${n.name}</li>`);
                        $(`#${new_id}`).click(function(event){
                            $("#search_by_title").val(n.name);
                            setUpCardDataUI();
                        });
                        $("#search_by_title").trigger("click");
                    }
                })
            }
            $("#search_by_title").trigger("click");
        }

    });
}

// Wait for the page load render
$(document).ready(function(){
    setUpSeasonUI();
    setUpCountryUI();
    setSearchBar();
    setUpCardDataUI();
});
