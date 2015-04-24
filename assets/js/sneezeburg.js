/* S N E E Z E B U R G .js | 06.15.12 | Casey A. Gollan */


// TURN COMMA SEPERATED PROJECT TAGS INTO LI'S

$(".project ul.tags").each(function(){
	var tagList = $(this);
	var tagOutput = $(this).text(); // get the tags
	var tags = new Array();
	var tags = $.map(tagOutput.split(','), $.trim);
	tagList.html("");
	$.each(
	tags,
	function( intIndex, objValue ){
		tagList.append("<li class='" + makeSlug(objValue) + "'>" + objValue + "</li>");
		tagList.parent().addClass(makeSlug(objValue));
	});
});

// CONCATENATE PROJECT TAGS & POPULATE TAG-SELECT DROPDOWN

var tagOutput = $("#tag-list").text();
$("#tag-list").remove();
var tags = new Array();
var tags = $.map(tagOutput.split(','), $.trim);

function eliminateDuplicates(arr) {
  var i,
      len=arr.length,
      out=[],
      obj={};

  for (i=0;i<len;i++) {
    obj[arr[i]]=0;
  }
  for (i in obj) {
    out.push(i);
  }
  return out;
}

function SortByName(a, b){
  var aName = a.toLowerCase();
  var bName = b.toLowerCase(); 
  return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
}

tags.sort(SortByName);

var tags = eliminateDuplicates(tags);

tags.splice(0,1);

$.each(
	tags,
	function( intIndex, objValue ){
	 
		// Create a new LI HTML element out of the
		// current value (in the iteration) and then
		// add this value to the list.
		$("body select").append(
			$( "<option value='" + makeSlug(objValue) + "'>" + objValue + "</option>" )
		);
	}
);

$("#tag-select").select2({
    placeholder: "Select a State"
});

// SET UP ISOTOPE

var $container = $('#projects>ul');

$($container).imagesLoaded( function( $images, $proper, $broken ) {
	$($container).isotope({
		// options
		itemSelector : '.project',
		animationEngine : 'best-available',
		getSortData : {
			name : function ( $elem ) {
				return $elem.find('h2 a').text();
			}
		},
		onLayout: function() {
			if($("*").hasClass("double-highlight")) {
				erase();
				$("#overlay").css({"width" : $(window).width(),"height" : $(window).height()}); // show overlay
				drawLines(content, true);
			}
		}
	});
});

// ISOTOPE FILTERING NAV

$("#options #layout-mode a[data-option-value=masonry]").click(function(){
	$("#projects>ul").addClass('grid').removeClass('list');
});
$("#options #layout-mode a[data-option-value=straightDown]").click(function(){
	$("#projects>ul").addClass('list').removeClass('grid');
});

var $optionSets = $('#options'),
$optionLinks = $optionSets.find('a');

$optionLinks.click(function(){ // when clicked
	var $this = $(this);
	// if already selected
	if ( $this.hasClass('selected') && $this.hasClass('toggle') ) { // if selected treat it like a toggle
		if ( $this.hasClass('sort-descending') ) {
			$($container).isotope({sortAscending : true});
			$this.removeClass('sort-descending').addClass('sort-ascending');
			return false;
		} else {
			$($container).isotope({sortAscending : false});
			$this.removeClass('sort-ascending').addClass('sort-descending');
			return false;
		}
		return false;
	}
	var $optionSet = $this.parents('.option-set');
	$optionSet.find('.selected').removeClass('selected'); // remove all selections
	$optionSet.find('.sort-descending').removeClass('sort-descending'); //
	$optionSet.find('.sort-ascending').removeClass('sort-ascending');
	$this.addClass('selected');
	if ( $this.hasClass('toggle') ) {
		$this.addClass('sort-ascending');
	}
	// make option object dynamically, i.e. { filter: '.my-filter-class' }
	var options = {"sortAscending" : "true", },
		key = $optionSet.attr('data-option-key'),
		value = $this.attr('data-option-value');
	// parse 'false' as false boolean
	value = value === 'false' ? false : value;
	options[ key ] = value;
	if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
		// changes in layout modes need extra logic
		changeLayoutMode( $this, options )
	} else {
		// otherwise, apply new options
		$container.isotope( options );
	}
	return false;
});

