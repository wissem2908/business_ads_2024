<?php
include ('includes/header_1.php');
?>

<style>

#map{
    width: 100%;
    height: 85vh;
}
</style>


        <div id="map"></div>
    
    

  



<?php
include ('includes/footer_1.php');
?>

<link rel="stylesheet" href="./js/leaflet/leaflet.css" />
<script src="./js/leaflet/leaflet.js"></script>
<link rel="stylesheet" href="./js/Leaflet.markercluster-1.4.1/dist/MarkerCluster.css"/>
<link rel="stylesheet" href="./js/Leaflet.markercluster-1.4.1/dist/MarkerCluster.Default.css"/>
<script src="./js/Leaflet.markercluster-1.4.1/dist/leaflet.markercluster.js"></script>

<script>
    var map = L.map('map').setView([-26.23273801876204, 132.58161590959386], 5);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);



 function loadAdvertisers(){

    $.ajax({
        url:'assets/php/users_marker.php',
        method:'post',
        async:false,
 
        success:function(response){
            console.log(response)

            var markerCluster = L.markerClusterGroup();
            markerCluster.addTo(map);

var data=JSON.parse(response)
originalData  = data.list
const newJson = {
  type: "FeatureCollection",
  features: []
};

// Loop through the original data and extract lat and lon values
originalData.forEach((item) => {
  const lat = item.lat;
  const lon = item.lon;
  
  // Check if both lat and lon are available
  if (lat && lon) {
    // Create a new feature object with extracted lat and lon values
    const feature = {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: [lon, lat]
      },
      properties: {
        user_id: item.user_id,
        business_name: item.business_name,
        username:item.username,
        logo:item.logo

      }
    };
    // Add the new feature object to the features array in the new JSON format
    newJson.features.push(feature);
  }
});
console.log(newJson);
  /******************/

      L.geoJSON(newJson, {
        pointToLayer: function (feature, latlng) {
            const marker = L.marker(latlng);
            var logo=feature.properties.logo
           // logo = logo.replace(/'/g, "\\'");
         
            logo="admin/logo_images/"+logo
            console.log(logo)
            var url      =""; 
            var host= window.location.hostname
    marker.bindPopup('<div  class="users col-lg-12 col-md-12"><div class="service" style="padding:0 !important; text-align:center"><a href="'+url+''+feature.properties.username+'"><img src="'+logo+'" class="rounded-circle" alt=""></a><p style="font-size:20px;" >'+feature.properties.business_name+'</p><a href="'+url+''+feature.properties.username+'" class="btn btn-sm btn-brand"><h3><b style="font-size:20px; font-weight:700;">'+host+'/'+feature.properties.username+'</b></h3></a> </div>  </div>');
    return markerCluster.addLayer(marker);
          // return markers.addLayer(L.marker(latlng, {icon: redMarker})).addTo(map);
        },
      }).addTo(map);
      map.addLayer(markerCluster);
        }
    })
}
loadAdvertisers()
</script>
