/*
Authors:Callum Jones, Connor MacKintosh, Dikshyanta Uprety, Jeno Labodi  - 2022
    googlemaps.js - This displays maps of our twincities to the main page including markers. 
*/

// set variables for each type of poi marker
var Cin = "http://maps.google.com/mapfiles/kml/pal2/icon22.png";
var air = "http://maps.google.com/mapfiles/ms/icons/plane.png";
var mues = "http://maps.google.com/mapfiles/kml/pal2/icon2.png";
var stad = "http://maps.google.com/mapfiles/kml/pal2/icon49.png";

// set a blank var then using ajax add JSON array to the var to be extratced
var POIarr = null;
$.ajax({
    'async': false,
    'global': false,
    'url': "./maps/poi.json",
    'dataType': "json",
    'success': function (data) {
        POIarr = data;
    }
});

// pulling lat and long from JSON database file and setting to var 
var ttLat = parseFloat((POIarr[0].poi_geo_lat));
var ttLng = parseFloat((POIarr[0].poi_geo_long));
var bmLat = parseFloat((POIarr[1].poi_geo_lat));
var bmLng = parseFloat((POIarr[1].poi_geo_long));
var baLat = parseFloat((POIarr[2].poi_geo_lat));
var baLng = parseFloat((POIarr[2].poi_geo_long));
var chmLat = parseFloat((POIarr[3].poi_geo_lat));
var chmLng = parseFloat((POIarr[3].poi_geo_long));
var cfmLat = parseFloat((POIarr[4].poi_geo_lat));
var cfmLng = parseFloat((POIarr[4].poi_geo_long));
var ciaLat = parseFloat((POIarr[5].poi_geo_lat));
var ciaLng = parseFloat((POIarr[5].poi_geo_long));
var cmiaLat = parseFloat((POIarr[6].poi_geo_lat));
var cmiaLng = parseFloat((POIarr[6].poi_geo_long));
var bvpLat = parseFloat((POIarr[7].poi_geo_lat));
var bvpLng = parseFloat((POIarr[7].poi_geo_long));
var bapLat = parseFloat((POIarr[8].poi_geo_lat));
var cucLng = parseFloat((POIarr[9].poi_geo_long));
var cucLat = parseFloat((POIarr[9].poi_geo_lat));
var bapLng = parseFloat((POIarr[8].poi_geo_long));
var becLat = parseFloat((POIarr[11].poi_geo_lat));
var becLng = parseFloat((POIarr[11].poi_geo_long));
var bccLat = parseFloat((POIarr[12].poi_geo_lat));
var bccLng = parseFloat((POIarr[12].poi_geo_long));
var bocLat = parseFloat((POIarr[13].poi_geo_lat));
var bocLng = parseFloat((POIarr[13].poi_geo_long));
var amcLat = parseFloat((POIarr[14].poi_geo_lat));
var amcLng = parseFloat((POIarr[14].poi_geo_long));
var rwpLat = parseFloat((POIarr[15].poi_geo_lat));
var rwpLng = parseFloat((POIarr[15].poi_geo_long));
var ltLat = parseFloat((POIarr[16].poi_geo_lat));
var ltLng = parseFloat((POIarr[16].poi_geo_long));

// calling both maps to avoid API collision 
function loapMapV3() {
    loadBirmingham();
    loadChicago();
}

function loadBirmingham() {
    // map options 
    var options = {
        zoom: 12.6,
        center: { lat: 52.494390486546166, lng: -1.889832036964235 },
        disableDefaultUI: true,
        draggable: true,
        gestureHandling: 'greedy',
        scrollwheel: false
    }
    // new map
    var map1 = new google.maps.Map(document.getElementById("map1"), options)

    // array of marker 
    var Bmarkers = [
        {   // Birmingham airport marker
            coords: { lat: baLat, lng: baLng },
            iconImage: air,
            content: "<p> <b>" + POIarr[2].name + " </b></p>" + "<p> Established: " + POIarr[2].established + "</p>" + "<p>" + POIarr[2].poi_description + "</p>",
            click: "maps-redirect/birmingham-airport.html"

        },
        // Birmingham Electric Cinema marker
        {
            coords: { lat: becLat, lng: becLng },
            iconImage: Cin,
            content: "<p> <b>" + POIarr[11].name + " </b></p>" + "<p> Established: " + POIarr[11].established + "</p>" + "<p>" + POIarr[11].poi_description + "</p>",
            click: "maps-redirect/electric-cinema.html"
        },
        // Birmingham ODEON Broadway Plaza marker
        {
            coords: { lat: bocLat, lng: bocLng },
            iconImage: Cin,
            content: "<p> <b>" + POIarr[13].name + " </b></p>" + "<p> Established: " + POIarr[13].established + "</p>" + "<p>" + POIarr[13].poi_description + "</p>",
            click: "maps-redirect/odeon-broadway-plaza.html"
        },
        // Birmingham Cineworld Cinema marker
        {
            coords: {lat: bccLat, lng: bccLng },
            iconImage: Cin,
            content: "<p> <b>" + POIarr[12].name + " </b></p>" + "<p> Established: " + POIarr[12].established + "</p>" + "<p>" + POIarr[12].poi_description + "</p>",
            click: "maps-redirect/birmingham-cineworld.html"
        },
        {
        // Thinktank marker
            coords: { lat: ttLat, lng: ttLng },
            iconImage: mues,
            content: "<p> <b>" + POIarr[0].name + " </b></p>" + "<p> Established: " + POIarr[0].established + "</p>" + "<p>" + POIarr[0].poi_description + "</p>",
            click: "maps-redirect/thinktank-museum.html"
        },
        //Birmingham Museum & Art Gallery marker
        {
            coords: { lat: bmLat, lng: bmLng },
            iconImage: mues,
            content: "<p> <b>" + POIarr[1].name + " </b></p>" + "<p> Established: " + POIarr[1].established + "</p>" + "<p>" + POIarr[1].poi_description + "</p>",
            click: "maps-redirect/birmingham-museum-art-gallery.html"
        },
        // Birmingham Villa Park marker
        {
            coords: { lat: bvpLat, lng: bvpLng },
            iconImage: stad,
            content: "<p> <b>" + POIarr[7].name + " </b></p>" + "<p> Established: " + POIarr[7].established + "</p>" + "<p>" + POIarr[7].poi_description + "</p>",
            click: "maps-redirect/villa-park-stadium.html"
        },
        // Birmingham St Andrews stadium marker
        {
            coords: { lat: bapLat, lng: bapLng },
            iconImage: stad,
            content: "<p> <b>" + POIarr[8].name + " </b></p>" + "<p> Established: " + POIarr[8].established + "</p>" + "<p>" + POIarr[8].poi_description + "</p>",
            click: "maps-redirect/standrews-stadium.html"
        }
    ];

    // loop through markers
    for (var i = 0; i < Bmarkers.length; i++) {
        // adds marker
        addBMarker(Bmarkers[i]);
    }
    // add marker function 
    function addBMarker(props) {
        var marker = new google.maps.Marker({
            position: props.coords,
            map: map1,
            icon: props.iconImage,
            click: props.click
        });
        // check for custom icon
        if (props.iconImage) {
            // set icon image
            marker.setIcon(props.iconImage);
        }
        // check for content
        if (props.content) {
            var infoWindow = new google.maps.InfoWindow({
                content: props.content
            });

            // add listening event for mouse hover to show info window 
            marker.addListener('mouseover', function () {
                infoWindow.open(map1, marker);
            });

            marker.addListener('mouseout', function() {
                infoWindow.close();
            });

             // add click listener to redirect to info page 
            marker.addListener('click', function () {
                window.location.href = props.click;
            });
        }
    }
}
// load Chicago map and set center 
function loadChicago() {
    // map options 
    var options = {
        zoom: 12,
        center: { lat: 41.90310512945445, lng: -87.66742344964771},
        disableDefaultUI: true,
        draggable: true,
        gestureHandling: 'greedy',
        scrollwheel: false,
    }
    // new map
    var map2 = new google.maps.Map(document.getElementById("map2"), options)

    // array of marker 
    var Cmarkers = [
        {   //  MidChicagoway International Airport marker
            coords: { lat: cmiaLat, lng: cmiaLng },
            iconImage: air,
            content: "<p> <b>" + POIarr[6].name + " </b></p>" + "<p> Established: " + POIarr[6].established + "</p>" + "<p>" + POIarr[6].poi_description + "</p>",
            click: "maps-redirect/midway-international-airport.html"
        },
        {   // O'Hare International Airport marker
            coords: { lat: ciaLat, lng: ciaLng },
            iconImage: air,
            content: "<p> <b>" + POIarr[5].name + " </b></p>" + "<p> Established: " + POIarr[5].established + "</p>" + "<p>" + POIarr[5].poi_description + "</p>",
            click: "maps-redirect/ohare-international-airport.html"
        },
        {   // Regal Webster Place marker
            coords: { lat: rwpLat, lng: rwpLng},
            iconImage: Cin,
            content: "<p> <b>" + POIarr[15].name + " </b></p>" + "<p> Established: " + POIarr[15].established + "</p>" + "<p>" + POIarr[15].poi_description + "</p>",
            click: "maps-redirect/regal-webster-place.html"
        },
        {   // AMC River East 21 marker marker
            coords: { lat: amcLat, lng: amcLng },
            iconImage: Cin,
            content: "<p> <b>" + POIarr[14].name + " </b></p>" + "<p> Established: " + POIarr[14].established + "</p>" + "<p>" + POIarr[14].poi_description + "</p>",
            click: "maps-redirect/amc-river-east-21.html"
        },
        {   // The Logan Theatre marker
            coords: { lat: ltLat, lng: ltLng },
            iconImage: Cin,
            content: "<p> <b>" + POIarr[16].name + " </b></p>" + "<p> Established: " + POIarr[16].established + "</p>" + "<p>" + POIarr[16].poi_description + "</p>",
            click: "maps-redirect/logan-theatre.html"
        },
        {   // Chicago History Museum marker
            coords: { lat: chmLat, lng: chmLng },
            iconImage: mues,
            content: "<p> <b>" + POIarr[3].name + " </b></p>" + "<p> Established: " + POIarr[3].established + "</p>" + "<p>" + POIarr[3].poi_description + "</p>",
            click: "maps-redirect/chicago-history-museum.html"
        },
        {   // Field Museum marker
            coords: { lat: cfmLat, lng: cfmLng },
            iconImage: mues,
            content: "<p> <b>" + POIarr[4].name + " </b></p>" + "<p> Established: " + POIarr[4].established + "</p>" + "<p>" + POIarr[4].poi_description + "</p>",
            click: "maps-redirect/field-museum.html"
        },
            // United center marker
        {   
            coords: { lat: cucLat, lng: cucLng },
            iconImage: stad,
            content: "<p> <b>" + POIarr[9].name + " </b></p>" + "<p> Established: " + POIarr[9].established + "</p>" + "<p>" + POIarr[9].poi_description + "</p>",
            click: "https://www.unitedcenter.com/"
        }

    ];

    // loop through markers
    for (var i = 0; i < Cmarkers.length; i++) {
        // adds marker
        addCMarker(Cmarkers[i]);
    }

    // add marker function 
    function addCMarker(props) {
        var marker = new google.maps.Marker({
            position: props.coords,
            map: map2,
            icon: props.iconImage,
            click: props.click
        });

        // check for custom icon
        if (props.iconImage) {
            // set icon image
            marker.setIcon(props.iconImage);
        }

        // check for content
        if (props.content) {
            var infoWindow = new google.maps.InfoWindow({
                content: props.content
            });
            // add listening event for mouse hover to show info window 
            marker.addListener('mouseover', function () {
                infoWindow.open(map2, marker);
            });

            marker.addListener('mouseout', function() {
                infoWindow.close();
            });

            // add click listener to redirect to info page 
            marker.addListener('click', function () {
                window.location.href = props.click;
            });
        }
    }
}