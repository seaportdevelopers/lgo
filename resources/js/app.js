
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// var GoogleMapsLoader = require('google-maps');
// GoogleMapsLoader.KEY = 'AIzaSyASn0Aq5_3lrH-dDZCWZjObFbkNnaoIi_M';
// GoogleMapsLoader.VERSION = '3.34';

// GoogleMapsLoader.load(function(google) {
// 	var uluru = {lat: -25.344, lng: 131.036};
// 	new google.maps.Map(document.querySelector('#routeChooseMap', {zoom: 4, center: uluru}))
// });

require('./bootstrap');
require('jquery-tablesort');
import swal from 'sweetalert';
const feather = require('feather-icons')
feather.replace();

window.Vue = require('vue');




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


// Vue.component('verify-route-destination', require('./components/VerifyRouteDestination.vue').default);





$(document).ready(function(){
	$("#btnForward1").click(function(){
		$("#firstStep").fadeOut();
		$("#secondStep").fadeIn();
	});
	//EXPANDABLE NAVIGATION SETTINGS
	//-------------------------------------------------//
	$(".sideNavigation")
		.mouseenter(function(){
			$(".ExpandableItem").css("display", "inline"); //shows sidenavigation text
			$(".sideNavigation").css("width", "240px"); //makes sidenavigation width to 240px
			// $(".content").css("left", "calc(240px + 3%)"); //moves all system content from 70px left to 240px + 3% to left
			$("#topNavigation").css("width", "calc(100% - 240px)"); //sets top navigation width from 100% - 70px to 100% - 240px
			$("#topNavigation").css("margin-left", "240px"); //moves top navigation 240px to left
			// $(".viewHeader").css("margin-left", "240px"); //moves view header 240 px to left
		}).delay(500)
		.mouseleave(function() {
			$(".ExpandableItem").css("display", "none");
			$(".sideNavigation").css("width", "70px");
			// $(".content").css("left", "calc(70px + 3%)");
			$("#topNavigation").css("width", "calc(100% - 70px)");
			$("#topNavigation").css("margin-left", "70px");
			// $(".viewHeader").css("margin-left", "70px");
		}).delay(500);
	$(".items a")
		.mouseenter(function(){
			$("#navIcon").css("color", "#fff");
		})
		.mouseleave(function() {
			$("#navIcon").css("color", "#8898aa");
		});


	//--------------------------------------------------//
	//END OF EXPANDABLE NAVIGATION SETTINGS

	//STATUS POPOVER
	//-------------------------------------------------//


	$(".StatusPopOver").popover({
		placement: 'top',
		html: true,
    content: function() {
      var id = $(this).attr('id')
      var cc = '<label class="bg-label bg-label-danger" onclick="checker('+id+', `SKUBU`)">SKUBU</label> <label class="bg-label bg-label-success" onclick="checker('+id+', `Sutvarkyta`)">Sutvarkyta</label> <label class="bg-label bg-label-warning" onclick="checker('+id+', `Tvarkoma`)">Tvarkoma</label> <label class="bg-label bg-label-main" onclick="checker('+id+', `Pranešta`)">Pranešta</label>'
      return cc;
    }
  });

	//--------------------------------------------------//
	//END OF STATUS POPOVER
	$('table').tablesort();
});


window.onload = () => {
	RouteConfiguratorApp.createMap();
}
// // Initialize and add the map
// function initMap() {
//   // The location of Uluru
//   var uluru = {lat: -25.344, lng: 131.036};
//   // The map, centered at Uluru
//   var map = new google.maps.Map(document.getElementById('map'), {zoom: 4, center: {lat: -25.344, lng: 131.036}});
//   // The marker, positioned at Uluru
//   var marker = new google.maps.Marker({position: uluru, map: map});
// }
var map;
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();
var DistanceBetweenPoints;
var MatrixResponse;
const RouteConfiguratorApp = new Vue({
	el: '#RouteConfiguratorApp',
	data: {
		POINT_A_address : '',
		POINT_A_coords : '',
		POINT_B_address : '',
		POINT_B_coords: '',
		P_A_confirmed: 'nera duomenu',
		P_B_confirmed: 'nera duomenu',
		POINT_last : '',
		DisplayDistanceValue: '',
		Route_btn_TEXT: 'Sudaryti maršrutą',
		btnClassRouteSuccess: 'hidden',
		btnClassRouteCheck: 'btn-error',
		btnDisabledRouteCheck: false,

		selectedType: '',
		selectedTruck: '',
		selectedCargo: '',
		selectedDriver: '',
		selectedTruckError: false,
		selectedCargoError: false,
		selectedDriverError: false,
		errorsDetected: false,
		CurrentTransportChoice: '',
		DATE_START: '',
		DATE_END: '',
		TYPE: '',
	},
	methods: {
		createMap: function() {
			map = new google.maps.Map(document.querySelector("#map"), {
				center: {lat: 35, lng: -85},
				zoom: 12
			});
		},
		makeRoute: function() {
			if (this.selectedTruck === '' || this.selectedCargo === '' || this.selectedDriver === '' || this.TYPE === '' || this.DATE_END === '' | this.DATE_START === ''){
				this.selectedTruckError = true;
				this.selectedCargoError = true;
				this.selectedDriverError = true;
				this.errorsDetected = true;
			}else{
				this.selectedTruckError = false;
				this.selectedCargoError = false;
				this.selectedDriverError = false;
				this.errorsDetected = false;
			}
			if (this.errorsDetected === false){
				var geocoder = new google.maps.Geocoder();
				var vm = this;
				geocoder.geocode({ address: this.POINT_A_address }, function(results, status){
					if (status === google.maps.GeocoderStatus.OK){
						map.setCenter(results[0].geometry.location);
						this.POINT_A_coords = results[0].geometry.location;
						map.zoom = 12;
						var marker = new google.maps.Marker({position: results[0].geometry.location, map: map});
					}
				});
				geocoder.geocode({ address: this.POINT_B_address }, function(results, status){
					if (status === google.maps.GeocoderStatus.OK){
						map.setCenter(results[0].geometry.location);
						this.POINT_B_coords = results[0].geometry.location;
						map.zoom = 12;
						var marker = new google.maps.Marker({position: results[0].geometry.location, map: map});
					}
				});

				this.POINT_last = this.POINT_A_address;
				var point_FROM = this.POINT_A_address;
				var point_TO = this.POINT_B_address;

				this.P_A_confirmed = this.POINT_A_address;
				this.P_B_confirmed = this.POINT_B_address;


				var service = new google.maps.DistanceMatrixService();
				service.getDistanceMatrix(
				{
					origins: [point_FROM],
					destinations: [point_TO],
					travelMode: 'DRIVING',
					// drivingOptions: DrivingOptions,
					unitSystem: google.maps.UnitSystem.METRIC,
					avoidHighways: false,
					avoidTolls: false,
				}, function(response, status){
					if (status === "OK"){
						MatrixResponse = response;
						// this.DisplayDistanceValue = response.rows[0].elements[0].distance.text;
						// console.log(response);
					}
				});

				console.log(MatrixResponse);
				var distance = MatrixResponse.rows[0].elements[0].distance.value;
				this.DisplayDistanceValue = distance/1000;
				this.Route_btn_TEXT = 'Sudaryti maršrutą';
				this.RouteBtnActive = false;
				this.btnClassRouteSuccess = 'btn-success',
				this.btnClassRouteCheck = 'btn-muted',
				this.btnDisabledRouteCheck = true,

				directionsService.route({
		          origin: point_FROM,
		          destination: point_TO,
		          travelMode: 'DRIVING'
	       		 }, function(response, status) {
			          if (status === 'OK') {
			            directionsDisplay.setDirections(response);
			            directionsDisplay.setMap(map);
			            var onChangeHandler = function() {
	          				calculateAndDisplayRoute(directionsService, directionsDisplay);
	        			};
			          } else {
			            window.alert('Directions request failed due to ' + status);
			          }
	        	});
			}
		},
		makeTransportChoice: function() {

		},
	}
});
//EXAMPLES of using google maps services
var origin1 = new google.maps.LatLng(55.930385, -3.118425);
var origin2 = 'Greenwich, England';
var destinationA = 'Stockholm, Sweden';
var destinationB = new google.maps.LatLng(50.087692, 14.421150);

var service = new google.maps.DistanceMatrixService();
service.getDistanceMatrix(
  {
    origins: [origin1, origin2],
    destinations: [destinationA, destinationB],
    travelMode: 'DRIVING',
    transitOptions: TransitOptions,
    drivingOptions: DrivingOptions,
    unitSystem: UnitSystem,
    avoidHighways: Boolean,
    avoidTolls: Boolean,
  }, callback);

function callback(response, status) {
	console.log(status, response);
  // See Parsing the Results for
  // the basics of a callback function.
}