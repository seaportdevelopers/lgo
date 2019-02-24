
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery-tablesort');
import swal from 'sweetalert';
const feather = require('feather-icons')
feather.replace();

window.Vue = require('vue');

function showSimpleAlert(){
	swal("Here's the title!", "...and here's the text!");
}

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});



$(document).ready(function(){
	//EXPANDABLE NAVIGATION SETTINGS
	//-------------------------------------------------//
	$(".sideNavigation").hover(function(){
		//alert("clicked!");
		if ($(".ExpandableItem").css("display") == "none"){ //checks if side navigation is extended
			$(".ExpandableItem").css("display", "inline"); //shows sidenavigation text
			$(".sideNavigation").css("width", "240px"); //makes sidenavigation width to 240px
			$(".content").css("left", "calc(240px + 3%)"); //moves all system content from 70px left to 240px + 3% to left
			$("#topNavigation").css("width", "calc(100% - 240px)"); //sets top navigation width from 100% - 70px to 100% - 240px
			$("#topNavigation").css("margin-left", "240px"); //moves top navigation 240px to left
			$(".viewHeader").css("margin-left", "240px"); //moves view header 240 px to left
		}else{ //settings when not extended
			$(".ExpandableItem").css("display", "none");
			$(".sideNavigation").css("width", "70px");
			$(".content").css("left", "calc(70px + 3%)");
			$("#topNavigation").css("width", "calc(100% - 70px)");
			$("#topNavigation").css("margin-left", "70px");
			$(".viewHeader").css("margin-left", "70px");
		}

	});
	//--------------------------------------------------//
	//END OF EXPANDABLE NAVIGATION SETTINGS

	//STATUS POPOVER
	//-------------------------------------------------//
	$(".StatusPopOver").popover({
		placement: 'top',
		html: true,
    content: function() {
      var id = $(this).attr('id');
      var cc = '<label class="bg-label bg-label-danger" onpress="checker('+id+', red)">SKUBU</label> <label class="bg-label bg-label-success">Sutvarkyta</label> <label class="bg-label bg-label-warning">Tvarkoma</label> <label class="bg-label bg-label-main">Pranešta</label>'
      return id;
    }
  });

  function checker() {

  }
	//--------------------------------------------------//
	//END OF STATUS POPOVER
	$('table').tablesort();
});
