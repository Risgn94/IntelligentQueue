/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
google.maps.event.addDomListener(window, 'load', function() {
    var canvas = document.getElementById("map-canvas");
    var mapOptions = {
      center: new google.maps.LatLng(55.6526719, 12.5207945),
      zoom:   14
    };

    var map = new google.maps.Map(canvas, mapOptions);
    });