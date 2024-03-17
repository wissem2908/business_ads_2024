$(document).ready(function(){


function getData(){
  $.ajax({
		url:'assets/php/statistique.php',
		method:'post',
		async:false,
		success:function(response){
			console.log(response)
			var data = JSON.parse(response)
			$('#totalUser').text(data.totalUser)
			$('#activeUser').text(data.activeUser)
			$('#inactiveUser').text(data.inactiveUser)
      $('#totalAdsAdmin').text(data.totalAdsAdmin)
			$('#activeAdsAdmin').text(data.activeAdsAdmin)
      $('#totalAds').text(data.totalAds)
			$('#activeAds').text(data.activeAds)
			$('#inactiveAds').text(data.inactiveAds)

			var monthlyUser=data.monthlyUser[0]

			console.log(monthlyUser)
      var key=[]
      var value=[]
			 key = Object.keys(monthlyUser);
			 value = Object.values(monthlyUser);

			console.log(value)

			var ctx = document.getElementById('users')
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels:key,
     datasets: [{
      label: 'Monthly users created',
      borderColor: "blue",
      borderWidth: 2,
      fill: false,
      data: value
    }]
  },
  options: {
    responsive: true,
    title: {
      display: false,
      text: 'Monthly users created'
    },
    tooltips: {
      mode: 'index',
      intersect: true
    },
  }
});
			
		}
	})

}




getData()
const interval = 5000; // Set the desired interval in milliseconds
setInterval(getData, interval);



})