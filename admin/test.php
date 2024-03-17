
<?php
include 'includes/header.php';

session_start();
$user_id=$_SESSION['user_id'];
      ?>
       
      
       <div class="content-body">
        <div class="container pt-5 pb-5">
  <div class="row justify-content-md-center">
    <input id="search" style="width: 350px;" type="text">
    <button type="button" class="ml-5 btn btn-primary" id="search-button">Search</button>
  </div>
  <div class="row mt-5">
    <ul id="result-list" class="col-4 list-group">
    </ul>
    <div class="col-8">
      <div id="map-container" style="height: 75vh;"></div>
    </div>
  </div>
</div>
       </div>
       <?php
include 'includes/footer.php';
      ?>


  <script src="vendor/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#ad_desc' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

<script type="text/javascript" src="assets/js/add_ads.js"></script>

<script src="./vendor/leafleft/leaflet.js"></script>
<link rel="stylesheet" href="./vendor/leafleft/leaflet.css" />

<script>
const searchInput = document.getElementById('search');
const resultList = document.getElementById('result-list');
const mapContainer = document.getElementById('map-container');
const currentMarkers = [];

const map = L.map(mapContainer).setView([20.13847, 1.40625], 2);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

document.getElementById('search-button').addEventListener('click', () => {
    const query = searchInput.value;
    fetch('https://nominatim.openstreetmap.org/search?format=json&polygon=1&addressdetails=1&q=' + query)
        .then(result => result.json())
        .then(parsedResult => {
            setResultList(parsedResult);
        });
});


// GET ADDRESS FROM LATITUDE AND LONGITUDE
function osmGetAddress( lat, lon) {
  if(lat != 0 && lon != 0) {
          $.ajax({
        type: 'GET',
        url: location.protocol + '//nominatim.openstreetmap.org/reverse.php?format=json&accept-language=en_US&lat='+lat+'&lon=' + lon,
        success: function(data) {
            console.log("data")
            console.log(data)
            console.log("data")
          //osmMarkerAddressBind(marker, data);
        }
      });
      }

  return false;
}

osmGetAddress(-12.7901106,-66.51980739285871,)

function setResultList(parsedResult) {
    resultList.innerHTML = "";
    for (const marker of currentMarkers) {
        map.removeLayer(marker);
    }
   // map.flyTo(new L.LatLng(20.13847, 1.40625), 2);
    for (const result of parsedResult) {
        const li = document.createElement('li');
        li.classList.add('list-group-item', 'list-group-item-action');
        li.innerHTML = JSON.stringify({
            displayName: result.display_name,
            lat: result.lat,
            lon: result.lon
        }, undefined, 2);
        li.addEventListener('click', (event) => {
            for(const child of resultList.children) {
                child.classList.remove('active');
            }
            event.target.classList.add('active');
            const clickedData = JSON.parse(event.target.innerHTML);
            const position = new L.LatLng(clickedData.lat, clickedData.lon);

            for (const marker of currentMarkers) {
        map.removeLayer(marker);
    }
        currentMarkers.push(new L.marker(position).addTo(map));
            map.flyTo(position, 10);
        })
      
        resultList.appendChild(li);
    }
}
</script>


