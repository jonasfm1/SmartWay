<?php 
include ('session.php');
include ('conecta.php');
ini_set('max_execution_time',12000);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>
<link href="multiselect/jquery.multiselect.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css/menu.css">

<link rel="stylesheet" type="text/css" href="css/dragtable.css" />

<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script src="js/logger.js"></script>



<script src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="js/jquery.dragtable.js"></script>


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="js/highlight.js"></script>
	
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnCp4LFE-63TwLNXxE_mrYJXRpA3LLKvg&callback=initMap" async defer></script>
<script src="js/jquery.geocomplete.js"></script>
  
<script src="js/jquery-latest.min.js"></script>
<script src="js/jquery-ui.min.js"></script>

<!-- Demo stuff -->



<link href="css/prettify.css" rel="stylesheet">
<script src="js/prettify.js"></script>
<script src="js/docs.js"></script>
<style>
/* override jQuery UI overriding Bootstrap */
.accordion .ui-widget-content a {
color: #337ab7;
}
</style>

<!-- Tablesorter: theme -->
<link class="theme" rel="stylesheet" href="css/theme.blue.css">
<link rel="stylesheet" href="css/dragtable.mod.css">

<!-- Tablesorter script: required -->
<script src="js/jquery.tablesorter.js"></script>
<script src="js/jquery.tablesorter.widgets.js"></script>

<script src="js/extras/jquery.dragtable.mod.js"></script>

<style>
caption {
/* override bootstrap adding 8px to the top & bottom of the caption */
padding: 0;
}
.ui-sortable-placeholder {
/* change placeholder (seen while dragging) background color */
background: #ddd;
}
div.table-handle-disabled {
/* optional red background color indicating a disabled drag handle */
background-color: rgba(255,128,128,0.5);
/* opacity set to zero for disabled handles in the dragtable.mod.css file */
opacity: 0.7;
}
/* fix cursor */
.tablesorter-blue .tablesorter-header {
cursor: default;
}
.sorter {
cursor: pointer;
}
</style>

	<?php
        ///// LOCALIZACAO DA EMPRESA///
$query_cli = "select * from usuario where login='$logado'";
$rs_cli = mysql_query($query_cli);

$dados = mysql_fetch_array($rs_cli);

$lat = $dados['lat'];
$lgn = $dados['lgn'];
//echo $lat;

///ICONE CASA
?>


<script id="js">$(function () {
$('table')
// initialize dragtable FIRST!
.dragtable({
// *** new dragtable mod options ***
// this option MUST match the tablesorter selectorSort option!
sortClass: '.sorter',
// this function is called after everything has been updated
tablesorterComplete: function(table) {},

// *** original dragtable settings (non-default) ***
dragaccept: '.drag-enable',  // class name of draggable cols -> default null = all columns draggable

// *** original dragtable settings (default values) ***
revert: false,               // smooth revert
dragHandle: '.table-handle', // handle for moving cols, if not exists the whole 'th' is the handle
maxMovingRows: 40,           // 1 -> only header. 40 row should be enough, the rest is usually not in the viewport
excludeFooter: false,        // excludes the footer row(s) while moving other columns. Make sense if there is a footer with a colspan. */
onlyHeaderThreshold: 100,    // TODO:  not implemented yet, switch automatically between entire col moving / only header moving
persistState: null,          // url or function -> plug in your custom persistState function right here. function call is persistState(originalTable)
restoreState: null,          // JSON-Object or function:  some kind of experimental aka Quick-Hack TODO: do it better
exact: true,                 // removes pixels, so that the overlay table width fits exactly the original table width
clickDelay: 10,              // ms to wait before rendering sortable list and delegating click event
containment: null,           // @see http://api.jqueryui.com/sortable/#option-containment, use it if you want to move in 2 dimesnions (together with axis: null)
cursor: 'move',              // @see http://api.jqueryui.com/sortable/#option-cursor
cursorAt: false,             // @see http://api.jqueryui.com/sortable/#option-cursorAt
distance: 0,                 // @see http://api.jqueryui.com/sortable/#option-distance, for immediate feedback use "0"
tolerance: 'pointer',        // @see http://api.jqueryui.com/sortable/#option-tolerance
axis: 'x',                   // @see http://api.jqueryui.com/sortable/#option-axis, Only vertical moving is allowed. Use 'x' or null. Use this in conjunction with the 'containment' setting
beforeStart: $.noop,         // returning FALSE will stop the execution chain.
beforeMoving: $.noop,
beforeReorganize: $.noop,
beforeStop: $.noop
})
// initialize tablesorter
.tablesorter({
theme: 'blue',
// this option MUST match the dragtable sortClass option!
selectorSort: '.sorter',
widgets: ['zebra', 'filter', 'columns']
});
});
</script>


<script language="javascript">
 
/*
$(document).ready(function(){
setInterval(function(){

      $("#total").load(window.location.href + " #total");
    


}, 20000);
});
*/



function sortTable(qual) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("tabela");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/

  while (switching) {  
      //alert(qual);
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 2; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;

      //alert(qual);
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[qual];
      y = rows[i + 1].getElementsByTagName("TD")[qual];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      
      switching = true;
    }
  }
}





function sortTable_volta(qual) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("tabela");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/

  while (switching) {  
      //alert(qual);
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 2; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;

      //alert(qual);
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[qual];
      y = rows[i + 1].getElementsByTagName("TD")[qual];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      
      switching = true;
    }
  }
}



var intervalo = setInterval(function() {

    document.location.reload(); 
     }, 500000);



     function acao_volta_filtro() {
	
    document.getElementById("Pagina2").style.display = "block";
  //  document.getElementById("pag2x_filtro").style.display = "block";
    
  // var teste = "step2_gallery.php";
   // alert(valor);
    
    
  //  document.getElementById("pag2x_filtro").src = teste; 
    }
    
	
     function acao_volta(valor) {
	
    document.getElementById("Pagina1").style.display = "block";
    
    var teste = "step2_gallery.php" + valor;
   // alert(valor);
    
    
    document.getElementById("pag2x").src = teste; 
    }
    
  
    
    


	function submitform()
{
    document.forms["myform"].submit();
}
	

  function abrirPdf(){

    document.getElementById("Pagina").style.display = "block";

   var teste = "step2_sm_t.php?";

   var form = document.getElementById("frm");

var radios = document.getElementsByName ("check_list[]");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
    if (radios[i].checked) {
        engine = "check_list%5B%5D=" + radios[i].value + "&";
        array_check.push(engine);
       teste = teste + engine;
        //break;
    }

}

document.getElementById("pag2").src = teste; 

  //
  }

	
function acao1() {
	
document.getElementById("Pagina").style.display = "block";

var teste = "step2_sm_t.php?";

var form = document.getElementById("frm");

var radios = document.getElementsByName ("check_list[]");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
 if (radios[i].checked) {
     engine = "check_list%5B%5D=" + radios[i].value + "&";
     array_check.push(engine);
    teste = teste + engine;
     //break;
 }

}

document.getElementById("pag2").src = teste; 


}

		function acao2() 
		{ 
		
		
document.getElementById("Pagina").style.display = "block";

var teste = "step2_sm_l.php?";

var form = document.getElementById("frm");

var radios = document.getElementsByName ("check_list[]");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
 if (radios[i].checked) {
     engine = "check_list%5B%5D=" + radios[i].value + "&";
     array_check.push(engine);
    teste = teste + engine;
     //break;
 }
}
 document.getElementById("pag2").src = teste; 


}



function acao4() 
		{ 
		
		
document.getElementById("Pagina").style.display = "block";

var teste = "step2_sm_li.php?";

var form = document.getElementById("frm");

var radios = document.getElementsByName ("check_list[]");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
 if (radios[i].checked) {
     engine = "check_list%5B%5D=" + radios[i].value + "&";
     array_check.push(engine);
    teste = teste + engine;
     //break;
 }
}
 document.getElementById("pag2").src = teste; 


}

function acao5() 
		{ 
		
		
document.getElementById("Pagina").style.display = "block";

var teste = "step2_sm_ro.php?";

var form = document.getElementById("frm");

var radios = document.getElementsByName ("check_list[]");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
 if (radios[i].checked) {
     engine = "check_list%5B%5D=" + radios[i].value + "&";
     array_check.push(engine);
    teste = teste + engine;
     //break;
 }
}
 document.getElementById("pag2").src = teste; 


}


function acao6() 
		{ 
		
		
document.getElementById("Pagina").style.display = "block";

var teste = "step2_sm_ct.php?";

var form = document.getElementById("frm");

var radios = document.getElementsByName ("check_list[]");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
 if (radios[i].checked) {
     engine = "check_list%5B%5D=" + radios[i].value + "&";
     array_check.push(engine);
    teste = teste + engine;
     //break;
 }
}
 document.getElementById("pag2").src = teste; 


}




function GetHeaders() {
            var table = document.getElementById ("tabela");       
            var lista_ordem = [];
            for (var i = 0; i < table.rows[0].cells.length; i++) {
              //  alert (table.rows[0].cells[i].headers);
                lista_ordem.push(table.rows[0].cells[i].headers);
            }

           // var userName = document.getElementById("userName").value;

// to print the input here
document.getElementById("table_ordem").value = lista_ordem;

          //  alert(lista_ordem);
        }


function acao7() 
		{ 
		
            var table = document.getElementById ("tabela");       
            var lista_ordem = [];
            for (var i = 0; i < table.rows[0].cells.length; i++) {
              //  alert (table.rows[0].cells[i].headers);
                lista_ordem.push(table.rows[0].cells[i].headers);
              //  alert(table.rows[0].cells[i].value);
            }

           // var userName = document.getElementById("userName").value;

// to print the input here
document.getElementById("table_ordem").value = lista_ordem;

          //  alert(lista_ordem);
		
document.getElementById("Pagina").style.display = "block";

var teste = "step2_sm_salva.php?table_ordem=";

//var form = document.getElementById("salva_table");


//alert(lista_ordem);

    engine = lista_ordem;
   
    teste = teste + engine;


 document.getElementById("pag2").src = teste; 


}


		function acao3() 
		{ 
			document.getElementById("Pagina").style.display = "block";
			//document.frm.action = "testexlsx.php";
		//document.forms["frm"].submit();

        var teste = "testexlsx.php";


 document.getElementById("pag2").src = teste; 

		}
		

function marcardesmarcar(){
	
	
   if ($('#todos').attr('checked')){
      $('.marcar').each(
         function(){
            $(this).attr('checked', true);
          
         }
      );
   }else{
      $('.marcar').each(
         function(){
            $(this).attr('checked', false);
         }
      );
   }
}

	
	function toggle(source) {
  checkboxes = document.getElementsByName('check_list[]');
 // alert(document.getElementById('check_list[]').style.zIndex);
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
    
  }
}
	

    
	
function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir este cliente?')) {

location.href = aURL;

//target=ver;

}
}


	function mostraDIV(){
		document.getElementById("Pagina").style.display = "block";
	}
       
	  
(function($) {
$.fn.waiting = function(options) {
options = $.extend({modo: 'normal'}, options);
this.fadeOut(options.modo);
return this;
};
})(jQuery);;

	
$(document).ready(function(){
$(".jquery-waiting-base-container").waiting({modo:"slow"});
});

function autoSubmit() {
    var formObject = document.forms['theForm'];
    formObject.submit();
}

function autoSubmit2() {
    var formObject = document.forms['xls'];
    formObject.submit();
}

function autoSubmit_lista(quem) {
	
	document.getElementById("quallista").value = quem;
    var formObject = document.forms['theForm'];
    formObject.submit();
}

function formSubmit()
{
   //  document.getElementById("login").submit();
	  var formObject = document.forms['login'];
    formObject.submit();
} 
		
		/*
 *  Project: Multiselect
 *  Description: An alternative and responsive multiselect widget
 *  URL:
 *  Author: Danier Rivas
 *  License: MIT
 */
;
(function ($, window, document, undefined) {

    // undefined is used here as the undefined global variable in ECMAScript 3 is
    // mutable (ie. it can be changed by someone else). undefined isn't really being
    // passed in so we can ensure the value of it is truly undefined. In ES5, undefined
    // can no longer be modified.

    // window and document are passed through as local variable rather than global
    // as this (slightly) quickens the resolution process and can be more efficiently
    // minified (especially when both are regularly referenced in your plugin).

    // Create the defaults once
    var pluginName = "multiselect",
        defaults = {
            addScrollBar: true,
            addSearchBox: true,
            addActionBox: true,
            animateSearch: false, // Can be 'normal', 'slow', 'fast', or int number
            searchBoxText: 'PROCURAR...',
            checkAllText: 'SELECIONAR TODOS',
            uncheckAllText: 'DESELECIONAR TODOS',
            invertSelectText: 'INVERTER SELEÇÃO',
            showCheckboxes: true,
            showSelectedItems: false,
            overwriteName: false, // Use false when you need to use original name attribute, or use
                                  // true if you want to overwrite original name attribute with id; Very
                                  // important for Ruby on Rails support to use original name attribute!
            submitDataAsArray: true, // This one allows compatibility with languages that use arrays
                                     // to process the form data, such as PHP. Set to false if using
                                     // ColdFusion or anything else with a list-based approach.
            preferIdOverName: true,  // When this is true (default) the ID of the select box is
                                     // submitted to the server as the variable containing the checked
                                     // items. Set to false to use the "name" attribute instead (this makes
                                     // it compatible with Drupal's Views module and Ruby on Rails.)
            maxNumOfSelections: -1,  // If you want to limit the number of items a user can select in a
                                     // checklist, set this to a positive integer.

            // This function gets executed whenever you go over the max number of allowable selections.
            onMaxNumExceeded: function () {
                alert('You cannot select more than ' + this.maxNumOfSelections + ' items in this list.');
            },

            initSelection: $.noop(),

            // In case of name conflicts, you can change the class names to whatever you want to use.
            cssContainer: 'checklistContainer',
            cssChecklist: 'checklist',
            cssChecklistHighlighted: 'checklistHighlighted',
            cssLeaveRoomForCheckbox: 'leaveRoomForCheckbox', // For label elements
            cssEven: 'even',
            cssOdd: 'odd',
            cssChecked: 'checked',
            cssDisabled: 'disabled',
            cssShowSelectedItems: 'showSelectedItems',
            cssFocused: 'focused', // This cssFocused is for the li's in the checklist
            cssFindInList: 'findInList',
            cssBlurred: 'blurred', // This cssBlurred is for the findInList divs.
            cssContainsPlaceholder: 'contains-placeholder', // This cssBlurred is for the findInList divs.
            cssOptgroup: 'optgroup',

            listWidth: 0,    // force the list width, if 0 the original SELECT width is used
            itemWidth: 0     // 0   : each item will be large as the list (single column)
                             // > 0 : each item will have a fixed size, so we could split
                             //       list into more than one column
                             // WARNING: vertical scroll bar width must be taken into account
                             // listWidth=200, itemWidth=50 DOES NOT GIVE a 4 columns list
                             // if list scroll bar is visible
        };

    // The actual plugin constructor
    function Plugin(element, options) {
        this.element = element;
        // jQuery has an extend method which merges the contents of two or
        // more objects, storing the result in the first object. The first object
        // is generally empty as we don't want to alter the default options for
        // future instances of the plugin
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    // Avoid Plugin.prototype conflicts
    $.extend(Plugin.prototype, {
        init: function () {
            // Place initialization logic here
            // You already have access to the DOM element and
            // the options via the instance, e.g. this.element
            // and this.settings
            // you can add more functions like the one below and
            // call them like so: this.updateChecklist(this.element, this.settings).

            var self = this,
                o = this.settings,
                el = $(this.element);

            var overflowProperty = ( o.addScrollBar ) ? 'overflow-y: auto; overflow-x: hidden;' : '',
                leaveRoomForCheckbox = ( o.showCheckboxes ) ? 'padding-left: 25px' : 'padding-left: 3px';

            // Here, THIS refers to the jQuery stack object that contains all the target elements that
            // are going to be converted to checklists. Let's loop over them and do the conversion.
            $.each(el, function () {

                var numOfCheckedBoxesSoFar = 0;

                // Hang on to the important information about this <select> element.
                var jSelectElem = $(this);
                var jSelectElemId = jSelectElem.attr('id');
                var jSelectElemName = jSelectElem.attr('name');
                if (jSelectElemId == '' || !o.preferIdOverName) {
                    // Regardless of whether this is a PHP environment, we need an id
                    // for the element, and it shouldn't have brackets [] in it.
                    jSelectElemId = jSelectElemName.replace(/\[|\]/g, '');
                    if (jSelectElemId == '') {
                        self.error('Can\'t convert element to checklist.\nYour SELECT element must'
                            + ' have a "name" attribute and/or an "id" attribute specified.');
                        return $;
                    }
                }

                var h = jSelectElem.outerHeight();
                /* : '100%'; */
                var w = o.listWidth ? o.listWidth : jSelectElem.outerWidth();
                // We have to account for the extra thick left border.
                w -= 2;

                // Make sure it's a SELECT element, and that it's a multiple one.
                if (this.type != 'select-multiple' && this.type != 'select-one') {
                    self.error("Can't convert element to checklist.\n"
                        + "Expecting SELECT element with \"multiple\" attribute.");
                    return $;
                } else if (this.type == 'select-one') {
                    return $;
                }

                var convertListItemsToCheckboxes = function () {
                    var checkboxValue = $(this).val();
                    // The option tag may not have had a "value" attribute set. In this case,
                    // Firefox automatically uses the innerHTML instead, but we need to set it
                    // manually for IE.
                    if (checkboxValue == '') {
                        checkboxValue = $(this).html();
                    }
                    checkboxValue = checkboxValue.replace(/ /g, ' ');

                    var checkboxId = jSelectElemId + '_' + checkboxValue;
                    // escape bad values for checkboxId
                    checkboxId = checkboxId.replace(/[^A-Z0-9]+/ig, "_"); //.replace(/(\.|\/|\,|\%|\<|\>|\=)/g, '\\$1');

                    var labelText = $(this).html();
                    var selected = '';
                    if ($(this).attr('disabled')) {
                        var disabled = ' disabled="disabled"';
                        var disabledClass = ' class="disabled"';
                    } else {
                        var disabled = '';
                        var disabledClass = '';
                        var selected = '';
                        if ($(this).attr('selected')) {
                            if (o.maxNumOfSelections != -1 && numOfCheckedBoxesSoFar <= o.maxNumOfSelections) {
                                selected += 'checked="checked"';
                                numOfCheckedBoxesSoFar++;
                            } else if (o.maxNumOfSelections == -1) {
                                selected += 'checked="checked"';
                            }
                        }
                    }

                    var arrayBrackets = (o.submitDataAsArray) ? '[]' : '';
                    var checkboxName = (o.preferIdOverName) ? jSelectElemId + arrayBrackets : jSelectElemName + arrayBrackets;
                    // avoid trailing double [][]
                    checkboxName = checkboxName.replace(/\[\]\[\]$/, '[]');

                    $(this).replaceWith('<li tabindex="0"><input type="checkbox" value="' + checkboxValue
                        + '" name="' + checkboxName + '" id="' + checkboxId + '" ' + selected + disabled
                        + ' /><label for="' + checkboxId + '"' + disabledClass + '>' + labelText + '</label></li>');
                    // Hide the checkboxes.
                    if (o.showCheckboxes === false) {
                        // We could use display:none here, but IE can't handle it. Better
                        // to hide the checkboxes off screen to the left.
                        $('#' + checkboxId).css('position', 'absolute').css('left', '-50000px');
                    } else {
                        $('label[for=' + checkboxId + ']').addClass(o.cssLeaveRoomForCheckbox);
                    }
                };

                // Loop through optgroup elements (if any) and turn them into headings
                $('optgroup', jSelectElem).each(function (i) {
                    $('option', this).each(convertListItemsToCheckboxes);
                    $(this).replaceWith(
                        '<li class="' + o.cssOptgroup + '">'
                        + '<input type="checkbox" class="' + o.cssOptgroup + '" id="' + jSelectElemId + '_' + o.cssOptgroup + '_' + i + '">'
                        + '<label for="' + jSelectElemId + '_' + o.cssOptgroup + '_' + i + '" class="leaveRoomForCheckbox">' + $(this).attr('label') + '</label>'
                        + '</li>' + $(this).html()
                    );
                });

                // Loop through all remaining options (not in optgroups) and convert them to li's
                // with checkboxes and labels.
                $('option', jSelectElem).each(convertListItemsToCheckboxes);

                // If the first list item in the checklist is an optgroup label, we want
                // to remove the top border so it doesn't look ugly.
                $('li:first', jSelectElem).each(function () {
                    if ($(this).hasClass(o.cssOptgroup)) {
                        $(this).css('border-top', 'none');
                    }
                });


                var checklistId = jSelectElemId + '_' + 'checklist';

                // Convert the outer SELECT elem to a <div>
                // Also, enclose it inside another div that has the original id, so developers
                // can access it as before. Also, this allows the search box to be inside
                // the div as well.
                jSelectElem.replaceWith('<div id="' + jSelectElemId + '" class="' + o.cssContainer + '"><div id="' + checklistId + '">'
                    + '<ul>' + jSelectElem.html() + '</ul></div></div>');
                var checklistDivId = '#' + checklistId;

                // We're going to create a custom HTML attribute in the main div box (the one
                // that contains the checklist) to store our value for the showSelectedItems
                // setting. This is necessary because we may need to change this value dynamically
                // after the initial conversion in order to make it faster to check/uncheck every
                // item in the list.
                $('#' + jSelectElemId).attr('showSelectedItems', o.showSelectedItems.toString());

                $('#' + jSelectElemId).css('width', w + 2);

                // We MUST set the checklist div's position to either 'relative' or 'absolute'
                // (default is 'static'), or else Firefox will think the offsetParent of the inner
                // elements is BODY instead of DIV.
                $(checklistDivId).css('position', 'relative');

                // Add the findInList div, if settings call for it.
                var findInListDivHeight = 0;
                if (o.addSearchBox) {
                    self.addSearchBox(jSelectElem, checklistDivId, w, o);
                }

                if (o.addActionBox) {
                    self.addActionBox(jSelectElem, checklistDivId, w, o);
                }

                // Bind optgroup inputs
                $('li.' + o.cssOptgroup, checklistDivId).on('click', 'input', function (e) {
                    var index = parseInt(this.id.replace(jSelectElemId + '_' + o.cssOptgroup + '_', '')),
                        nextElement = $('li.' + o.cssOptgroup + ':eq(' + (index + 1) + ')', checklistDivId),
                        selector = $('li.' + o.cssOptgroup + ':eq(' + index + ')', checklistDivId).nextUntil(nextElement);

                    self.updateChecklist((this.checked ? 'checkAllGroup' : 'clearAllGroup'), checklistDivId, selector);
                });

                // Add styles
                var items = $('li', checklistDivId);

                $(checklistDivId).addClass(o.cssChecklist);
                if (o.addScrollBar) {
                    $(checklistDivId).height(h - findInListDivHeight).width(w);
                } else {
                    $(checklistDivId).height('100%').width(w);
                }
                $('ul', checklistDivId).addClass(o.cssChecklist);

                // Stripe the li's
                $('li:even', checklistDivId).addClass(o.cssEven);
                $('li:odd', checklistDivId).addClass(o.cssOdd);

                // Emulate the :hover effect for keyboard navigation.
                items.focus(function () {
                    $(this).addClass(o.cssFocused);
                }).blur(function (event) {
                    $(this).removeClass(o.cssFocused);
                });

                // Multicolumn items
                // make items float:left if itemWidth option is set
                if (o.itemWidth > 0) {
                    var colW = o.itemWidth + 'px';
                    items.each(function () {
                        $(this).css({
                            'float': 'left',
                            'width': colW
                        });
                    });
                }

                // Highlight preselected ones.
                items.each(function () {
                    if ($('input', this).attr('checked')) {
                        $(this).addClass(o.cssChecked);
                    }
                });

                // EVENT HANDLERS

                var toggleDivGlow = function () {
                    // Make sure the div is glowing if something is checked in it.
                    if (items.hasClass(o.cssChecked)) {
                        $(checklistDivId).addClass(o.cssChecklistHighlighted);
                    } else {
                        $(checklistDivId).removeClass(o.cssChecklistHighlighted);
                    }
                };

                var moveToNextLi = function () {
                    // Make sure that the next LI has a checkbox (some LIs don't, because
                    // they came from <optgroup> tags.
                    if ($(this).prop('tagName').toLowerCase() != 'li') {
                        return;
                    }
                    if ($(this).is('li:has(input)')) {
                        $(this).focus();
                    }
                    else {
                        $(this).next().each(moveToNextLi);
                    }
                };

                // Check/uncheck boxes
                var check = function (event) {

                    // This needs to be keyboard accessible too. Only check the box if the user
                    // presses space (enter typically submits a form, so is not safe).
                    if (event.type == 'keydown') {
                        // Pressing spacebar in IE and Opera triggers a Page Down. We don't want that
                        // to happen in this case. Opera doesn't respond to this, unfortunately...
                        // We also want to prevent form submission with enter key.
                        if (event.keyCode == 32 || event.keyCode == 13) {
                            event.preventDefault();
                        }
                        // Tab keys need to move to the next item in IE, Opera, Safari, Chrome, etc.
                        if (event.keyCode == 9 && !event.shiftKey) {
                            event.preventDefault();
                            // Move to the next LI
                            $(this).off('keydown.tabBack').blur().next().each(moveToNextLi);
                        } else if (event.keyCode == 9 && event.shiftKey) {
                            // Move to the previous LI
                            //$(this).prev(':has(input)').focus();
                        }

                        if (event.keyCode != 32) {
                            return;
                        }
                    }


                    // If we go over the maxNumOfSelections limit, trigger our custom
                    // event onMaxNumExceeded.
                    var numOfItemsChecked = $('input:checked', checklistDivId).length;
                    if (o.maxNumOfSelections != -1 && numOfItemsChecked > o.maxNumOfSelections
                        && !$('input', this).attr('checked')) {

                        o.onMaxNumExceeded();

                        event.preventDefault();
                        return;
                    }

                    // Not sure if unbind() here removes default action, but that's what I want.
                    $('label', this).off();
                    // Make sure that the event handler isn't triggered twice (thus preventing the user
                    // from actually checking the box) if clicking directly on checkbox or label.
                    // Note: the && is not a mistake here. It should not be ||
                    if (event.target.tagName.toLowerCase() != 'input' && event.target.tagName.toLowerCase() != 'label') {
                        $('input', this).trigger('click');
                    }

                    // Change the styling of the row to be checked or unchecked.
                    var checkbox = $('input', this).get(0);
                    updateLIStyleToMatchCheckedStatus(checkbox);

                    // The showSelectedItems setting can change after the initial conversion to
                    // a checklist, so rather than checking o.showSelectedItems, we check the
                    // value of the custom HTML attribute on the main containing div.
                    if ($('#' + jSelectElemId).attr('showSelectedItems') === 'true') {
                        showSelectedItems();
                    }
                };

                var updateLIStyleToMatchCheckedStatus = function (checkbox) {
                    if (checkbox.checked) {
                        $(checkbox).parent().addClass(o.cssChecked);
                    } else {
                        $(checkbox).parent().removeClass(o.cssChecked);
                    }
                    toggleDivGlow();
                };

                // Accessibility, primarily for IE
                var handFocusToLI = function () {
                    // Make sure that labels and checkboxes that receive
                    // focus divert the focus to the LI itself.
                    $(this).parent().focus();
                };

                $('li:has(input)', checklistDivId).click(check).keydown(check);
                $('label', checklistDivId).focus(handFocusToLI);
                $('input', checklistDivId).focus(handFocusToLI);
                toggleDivGlow();

                // Make sure that resetting the form doesn't leave highlighted divs where
                // they shouldn't be and vice versa.
                var fixFormElems = function (event) {
                    $('input', this).each(function () {
                        this.checked = this.defaultChecked;
                        updateLIStyleToMatchCheckedStatus(this);
                        if (o.showSelectedItems) {
                            showSelectedItems();
                        }
                    }).parent();
                };

                $('form:has(div.' + o.cssChecklist + ')').on('reset.fixFormElems', fixFormElems);

                // List the selected items in a UL
                var selectedItemsListId = '#' + jSelectElemId + '_selectedItems';
                if (o.showSelectedItems) {
                    $(selectedItemsListId).addClass(o.cssShowSelectedItems);
                }

                var showSelectedItems = function () {
                    // Clear the innerHTML of the list and then add every item to it
                    // that is highlighted in the checklist.
                    $(selectedItemsListId).html('');
                    $('label', checklistDivId).each(function () {
                        var vcontext = $(this).parent();
                        if ($(this).parent().hasClass(o.cssChecked)) {
                            var labelText = jQuery.trim($(this).html());
                            $('<li class="">' + labelText + '</li>')
                                .on('click.remove', function () {
                                    vcontext.trigger('click');
                                }).appendTo(selectedItemsListId);
                        }
                    });
                };

                // We have to run showSelectedItems() once here too, upon initial conversion.
                if (o.showSelectedItems) {
                    showSelectedItems();
                }
            });

        },

        // Since o can be a string instead of an object, we need a function that
        // will handle the action requested when o is a string (e.g. 'clearAll')
        updateChecklist: function (action, checklistElem, selector) {

            // Before we operate on all checkboxes, we need to make sure that
            // showSelectedItems is disabled, at least temporarily. Otherwise,
            // this process will be REALLY slow because it tries to update the
            // DOM a thousand times unnecessarily.
            // (We will only do this if the list is greater than 3 items.)

            var showSelectedItemsSetting;

            var disableDynamicList = function (checklistLength) {
                if (checklistLength > 3) {
                    showSelectedItemsSetting = $(checklistElem).attr('showSelectedItems');
                    $(checklistElem).attr('showSelectedItems', 'false');
                }
            };

            var enableDynamicList = function () {
                $(checklistElem).attr('showSelectedItems', showSelectedItemsSetting);
            };


            switch (action) {

                case 'clearAll' :
                    var selector = 'li:has(input:checked:not(:hidden))';
                    break;

                case 'checkAll' :
                    var selector = 'li:has(input:not(:checked,:disabled,:hidden))';
                    break;

                case 'invert' :
                    var selector = 'li:has(input:not(:hidden))';
                    break;

                case 'checkAllGroup' :
                    var selector = selector.find(':input:not(:checked,:disabled,:hidden)');
                    break;

                case 'clearAllGroup' :
                    var selector = selector.find(':input:checked:not(:hidden)');
                    break;

                default :
                    alert("multiselect Plugin says:\n\nWarning - Invalid action requested on checklist.\nThe action requested was: " + action);
                    break;
            }

            var checklistLength = $(selector, checklistElem).length;
            disableDynamicList(checklistLength);
            // If it's checked, force the click event handler to run.
            $(selector, checklistElem).each(function (i) {
                // Before we check/uncheck the penultimate item in the list, we need to restore
                // the showSelectedItems setting to its original setting, so that we update the
                // list of selected items appropriately on the last item we check/uncheck.
                if (i == checklistLength - 2 && checklistLength > 3) {
                    enableDynamicList();
                }

                if (!$(this).hasClass('optgroup')) {
                    $(this).trigger('click');
                } else {
                    var input = $(this).find(':input');
                    input.prop('checked', !input[0].checked);
                }
            });
        },

        error: function (msg) {
            alert("jQuery Plugin Error (Plugin: multiselect)\n\n" + msg);
        },

        addSearchBox: function (jSelectElem, checklistDivId, w, o) {

            // Poorly named function... It's really onFocusSearchBox.
            var focusSearchBox = function () {
                // Remove placeholder text when focusing search box if it contains placeholder.
                if ($(this).hasClass(o.cssContainsPlaceholder)) {
                    $(this).val('');
                }

                $(this).removeClass(o.cssBlurred);
            };

            var showAllSelectOptions = function () {
                $('label', checklistDivId).each(function () {
                    if (o.animateSearch !== false)
                        $(this).parent('li').slideDown(o.animateSearch);
                    else
                        $(this).parent('li').show();
                });
            };

            var blurSearchBox = function () {
                // Restore default text on blur.
                if ($(this).val() === '') {
                    $(this).val(o.searchBoxText);
                    $(this).addClass(o.cssContainsPlaceholder);
                    var t = setTimeout(showAllSelectOptions, 250);
                }

                $(this).addClass(o.cssBlurred);
            };

            var initSearchBox = function () {

                $(checklistDivId).before('<div class="findInList" id="' + jSelectElem.attr('id') + '_findInListDiv">'
                    + '<input type="text" value="' + o.searchBoxText + '" id="'
                    + jSelectElem.attr('id') + '_findInList" class="' + o.cssBlurred + ' ' + o.cssContainsPlaceholder + '" /></div>');

                // Set width of searchbox input to same as original SELECT element.
                w -= 4;
                $('#' + jSelectElem.attr('id') + '_findInList').css('width', w);

                var searchBoxId = '#' + jSelectElem.attr('id') + '_findInList';

                // We want to be able to simply press tab to move the focus from the
                // search text box to the item in the list that we found with it.
                $(searchBoxId)
                    .on('keydown.tabToFocus', function (event) {
                        if (event.keyCode == 9) {
                            // event.preventDefault(); // No double tabs, please...
                            $('label:first:visible', checklistDivId).parent().on('keydown.tabBack', function (event) {
                                // This function lets you shift-tab to get back to the search box easily.
                                if (event.keyCode == 9 && event.shiftKey) {
                                    event.preventDefault(); // No double tabs, please...
                                    $(searchBoxId)
                                        //.off('focus.focusSearchBox')
                                        //.removeClass(o.cssBlurred)
                                        //.on('focus.focusSearchBox',focusSearchBox)
                                        //  .on('blur.blurSearchBox',blurSearchBox)
                                        .focus();
                                    $(this).off('keydown.tabBack');
                                }
                            }).focus(); // Focuses the actual list item found by the search box
                            // $(this).off('keydown.tabToFocus');

                        } else {
                            //$(this).off('blur.blurSearchBox');
                        }
                    })
                    .on('focus.focusSearchBox', focusSearchBox) // Set up keydown and keyup event handlers, etc. on searchbox
                    .on('blur.blurSearchBox', blurSearchBox)
                    .on('keyup', function (event) {
                        // Search for the actual text.
                        var textbox = this; // holder
                        if ($(this).val() === '') {
                            showAllSelectOptions();
                            //$(this).off('keydown.tabToFocus');
                            return false;
                        }
                        else {
                            // Remove placeholder on user input.
                            $(this).removeClass(o.cssContainsPlaceholder);
                        }

                        $('label', checklistDivId).each(function () {
                            var $curLabel = $(this);
                            if (!$curLabel.is(':disabled')) {
                                var curItem = $curLabel.text().toLowerCase();
                                var typedText = textbox.value.toLowerCase();

                                if (curItem.indexOf(typedText) == -1) {
                                    if (o.animateSearch !== false)
                                        $curLabel.parent('li').slideUp(o.animateSearch);
                                    else
                                        $curLabel.parent('li').hide();
                                } else {
                                    if (o.animateSearch !== false)
                                        $curLabel.parent('li').slideDown(o.animateSearch);
                                    else
                                        $curLabel.parent('li').show();
                                }
                            }


                        });

                        return;

                    });

                // Compensate for the extra space the search box takes up by shortening the
                // height of the checklist div. Also account for margin below the search box.
                findInListDivHeight = $('#' + jSelectElem.attr('id') + '_findInListDiv').height() + 3;
            };

            initSearchBox();
        },

        addActionBox: function (jSelectElem, checklistDivId, w, o) {
            var self = this;

            var initActionBox = function () {

                $(checklistDivId).after('<div class="actionButtons" id="' + jSelectElem.attr('id') + '_actionButtons">'
                    + '<span data-action="checkAll" >' + o.checkAllText + '</span> | '
                    + '<span data-action="clearAll" >' + o.uncheckAllText + '</span> | '
                    + '<span data-action="invert" >' + o.invertSelectText + '</span></div>'
                );

                var actionBoxId = '#' + jSelectElem.attr('id') + '_actionButtons';

                $(actionBoxId).on('click', 'span', function () {
                    var action = $(this).data("action");
                    self.updateChecklist(action, checklistDivId);
                });
            };

            initActionBox();
        }
    });

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function (options) {
        this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });

        // chain jQuery functions
        return this;
    };

})(jQuery, window, document);


function toggleFullScreen() {
    if (!document.fullscreenElement && !document.msFullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {
        if (document.body.requestFullscreen) {
            document.body.requestFullscreen();
        } else if (document.body.msRequestFullscreen) {
            document.body.msRequestFullscreen();
        }else if (document.body.mozRequestFullScreen) {
            document.body.mozRequestFullScreen();
        }else if (document.body.webkitRequestFullscreen) {
            document.body.webkitRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        }else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}





this.fullScreenMode = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen; // This will return true or false depending on if it's full screen or not.

$(document).on ('mozfullscreenchange webkitfullscreenchange fullscreenchange',function(){
       this.fullScreenMode = !this.fullScreenMode;

      //-Check for full screen mode and do something..
      simulateFullScreen();
 });





var simulateFullScreen = function() {
     if(this.fullScreenMode) {
            docElm = document.documentElement
            if (docElm.requestFullscreen) 
                docElm.requestFullscreen()
            else{
                if (docElm.mozRequestFullScreen) 
                   docElm.mozRequestFullScreen()
                else{
                   if (docElm.webkitRequestFullScreen)
                     docElm.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT)
                }
            }
     
     }

     this.fullScreenMode= !this.fullScreenMode

}
	

function rollover(my_image, qual)
    {
     my_image.src = qual;
    }
	
function AbreFechaDiv(qualdiv) {

var objeto = document.getElementById(qualdiv);


if(objeto.style.display == 'none') {
objeto.style.display = 'block';

} else {
objeto.style.display = 'none';
}
}


		
		function openNav() {
  document.getElementById("mySidenav").style.width = "370px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

      function valida() {
      //  var comboNome = document.getElementById("lang0pt").value;
     
      var flag = "";
   //var primi;
 var primi = document.getElementsByName('lang0pt[]');
	   
	
    for (i = 0; i < primi.length; i++){
		//alert(primi[i]);
			if (primi[i].checked){
      		  flag="liberado";
			}
		
  		//alert(flag);
	
	}
	
			if (flag == "liberado"){
        		//alert('yes');
   		 		} else {
        	//	alert('Escolha pelo menos um Login para filtrar!!!');
			//	return false;
				
			}

 var flag1 = "";
   //var primi;
 var primi1 = document.getElementsByName('lang0pt1[]');
	   
	
    for (i = 0; i < primi1.length; i++){
		//alert(primi[i]);
			if (primi1[i].checked){
      		  flag1="liberado";
			}
		
  		//alert(flag);
	
	}
	
			if (flag1 == "liberado"){
        		//alert('yes');
   		 		} else {
      //  		alert('Escolha pelo menos uma Lista para filtrar!!!');
		//		return false;
				
			}



    


            var flag3 = "";
   //var primi;
 var primi3 = document.getElementsByName('lang0pt3[]');
	   
	
    for (i = 0; i < primi3.length; i++){
		//alert(primi[i]);
			if (primi3[i].checked){
      		  flag3="liberado";
			}
		
  		//alert(flag);
	
	}
	
			if (flag3 == "liberado"){
        		//alert('yes');
   		 		} else {
        	//	alert('Escolha pelo menos uma Ocorrência para filtrar!!!');
		//		return false;
				
			}

	

    }    



var styles = [
	{
		"featureType": "landscape",
		"stylers": [
			{
				"hue": "#767676"
			},
			{
				"saturation": -100
			},
			{
				"lightness": 0
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "road.highway",
		 
		"stylers": [
			{
				"hue": "#4a2702"
			},
			
			
			
		]
	},
	{
		"featureType": "road.arterial",
		"stylers": [
			{
				"hue": "#5f3b02"
			},
		
		]
	},
	{
		"featureType": "road.local",
		"stylers": [
			{
				"hue": "#004f8a"
			},
			
		]
	},
	{
		"featureType": "water",
		"stylers": [
			{
				"hue": "#004f8a"
			},
			
		]
	},
	{
		"featureType": "poi",
		"stylers": [
			{
				"hue": "#001EFF"
			},
			{
				"saturation": -100
			},
			{
				"lightness": 52
			},
			{
				"gamma": 1
			}
		]
	}
];	


  $(document).ready(function() {
    $('.defaultTable').dragtable();
  });

  
function infobox(lat,lgn, nome){

var ponto = new google.maps.LatLng(lat, lgn);


var contentString = 
			'<div id="legenda_zoom">'+
            '<strong>' + nome + '</strong>'+
            '</div>';
 
        var var_infowindow = new google.maps.InfoWindow({
            content: contentString,
			position: ponto,
			pixelOffset: new google.maps.Size(0, -42)
          });
		  
	
		var_infowindow.open(map);	
	
	
}
	
function tempofora(){
	
 //Dispatch a click event.
 setTimeout(var_infowindow.close(map),100); 
}


</script>

</head>
	
<style type="text/css">
	
@charset "UTF-8";



::-webkit-scrollbar-track {
    background-color: #F4F4F4;
}
::-webkit-scrollbar {
    width: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb {
    background: #d3d5d6;
}


::-webkit-scrollbar-track:horizontal {
    background-color: #F4F4F4;
 }

 ::-webkit-scrollbar:horizontal {
  
    height: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb:horizontal {
    background: #d3d5d6;
}



#cat_text {
	position: absolute;
	width: 200px;
	height: 38px;
	left: 20px;
	top: 15px;
	text-align: left;
	font-size:12px;
	}
	#cat_text1 {
	position: absolute;
	width: 200px;
	height: 38px;
	left:20px;
	top: 15px;
	text-align: left;
	font-size: 12px;
	}
	
	
	
	#neg_text {
	position: absolute;
	width: 200px;
	height: 38px;
	left: 20px;
	top: 15px;
	text-align: left;
	font-size:12px;
	color:#FFFFFF;
	}
	#pos_text {
	position: absolute;
	width: 200px;
	height: 38px;
	left: 20px;
	top: 15px;
	text-align: left;
	font-size:12px;
	color:#FFFFFF;
	}
	
	#ale_text {
	position: absolute;
	width: 200px;
	height: 38px;
	left: 20px;
	top: 15px;
	text-align: left;
	font-size:12px;
	color:#FFFFFF;
	}
	
	


#cat1 {
	position: absolute;
	width: auto;
	height: 38px;
	right: 19px;
	top: 0px;
	text-align: right;
	font-size: 30px;
	}

#cat2 {
	position: absolute;
	width: auto;
	height: 38px;
	right: 19px;
	top: 0px;
	text-align: right;
	font-size: 30px;
	}	
	
	#neg1 {
	position: absolute;
	width: 200px;
	height: 38px;
	right: 20px;
	top: 0px;
	text-align: right;
	color:#FFFFFF;
	font-size:30px;
	}
	#neg_icon {
	position: absolute;
	width: auto;
	height: 38px;
	left:5%;
	top: 54px;
	text-align: left;
	color:#FFFFFF;
	font-size:12px;
	}
	#pos1 {
	position: absolute;
	width: auto;
	height: 38px;
	right: 20px;
	top: 0px;
	text-align: right;
	color:#FFFFFF;
	font-size:30px;
	}
	#pos_icon {
	position: absolute;
	width: auto;
	height: 38px;
	left:5%;
	top: 54px;
	text-align: left;
	color: #FFFFFF;
	font-size: 12px;
	}
	
	#ale1 {
	position: absolute;
	width: auto;
	height: 38px;
	right: 20px;
	top: 0px;
	text-align: right;
	color:#FFFFFF;
	font-size:30px;
	}
	#ale_icon {
	position: relative;
	width: auto;
	height: 38px;
	left:5%;
	top: 54px;
	text-align: left;
	color:#FFFFFF;
	font-size:12px;
	}
	

    #categoria{
	position:relative;
	height:200px;
	width:100%;
	top:0px;	
	background-color:#FFFFFF;
	border:1px solid #d3d5d6;
    }


#categoria1{
	position: relative;
	height: 40px;
	width: 100%;
	top: 0px;
	background-color: #589bd4;
	border: 1px solid #d3d5d6;
	color: #FFFFFF;
}
#categoria2{
	position: relative;
	height: 40px;
	width: 100%%;
	top: 0px;
	
	background-color: #ff9900;
	border: 1px solid #d3d5d6;
	color: #FFFFFF;	
}

#negativados1{
	position:relative;
	top:0px;
	
	height:40px;
	width:100%;
	background-color:#F80004;
	
border:1px solid #d3d5d6;
	
}

#positivados1{
	position:relative;
	height:40px;
	width:100%;
	background-color:#409900;
	top:0;

border:1px solid #d3d5d6;
	
}

#alertas1{
	position:relative;
	height:40px;
	width:100%;
	background-color:#000000;
	top:0px;

border:1px solid #d3d5d6;	
}



/* Reset CSS */


.highlight {
    background-color: #589bd4;
    -moz-border-radius: 5px; /* FF1+ */
    -webkit-border-radius: 5px; /* Saf3-4 */
    border-radius: 5px; /* Opera 10.5, IE 9, Saf5, Chrome */
    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* FF3.5+ */
    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* Saf3.0+, Chrome */
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* Opera 10.5+, IE 9.0 */
}

.highlight {
    padding:1px 4px;
    margin:0 -4px;
}
	
body {
    background-color:#ffffff;
	overflow-x:hidden;
    overflow-y: auto;
    min-height:100%;
    
}

* {
	
	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	
	
}

*, *:after, *:before{
  margin: 0;
  padding: 0;
 
 
  }
	html
{
 
  width:100%;
  height:100%;
}



#apDiv9x {
	position: absolute;
	width: 50px;
	height: 47px;
	z-index: 4;
	left: 21px;
	top: 93%;
	visibility:hidden;
	
}

.apDiv9x{
	cursor:pointer;
}
/* unvisited link */

	.jquery-waiting-base-container {
		position: absolute;
	left: -2px;
	top: -2px;
	margin: 0px;
	width: 100%;
	height: 100%;
	display: block;
	z-index: 999999;
	opacity: 1;
	-moz-opacity: 1;
	filter: alpha(opacity = 900);
	background-color:#ebf5ff;
	
	background-image: url("imgs/loading.gif");
	background-repeat: no-repeat;
	background-position: 50% 35%;
	padding-top: 250px;
}


#div_titulo {
position: absolute;
	width: 350px;
	height: 31px;
	z-index: 9999;
	top: 8px;
	color: #FFFFFF;
	left: 90px;
	
	
}

table.bordasimples {
	border-collapse: collapse;
	border-color: #ECECEC;
	}

  table.bordasimples tr {
	  border-color: #CCC;

	}

table.bordasimples td {

font-size: 11px;


}

.linque {
   color:#000;
	cursor:pointer;
	background: #FFF;

 }
	
.linque:hover {
   color:#000;
	cursor:pointer;
	background: #ECECEC;

 }
	
	

 #total{
	position: relative;
	width: 100%;
	height: 100%;
    border-color: gray;
    
   
	
  }

 
#apDiv12 {
	position: relative;
	z-index: 0;
	width: 98%;
	height: 435px;
    left: 0px;
    top: 0px;
	overflow: auto;
   
    margin-left: 20px;
    margin-right: 20px;

    background-color: #ffffff;
	
	
}

#mapa {
	position: relative;
	z-index: 0;
	width: 98%;
	height: 635px;
    left: 0px;
    top: 0px;
	overflow: auto;
  
    background-color: #ffffff;
	
    margin-left: 20px;
    margin-right: 20px;
	border: 1px solid #AAAAAA;
}

#total_mapa{

	width: 100%;
	height: 100%;
    border-color: gray;
    background-color: #FFFFFF;
    
    
	
  }

#tudo{
    position: relative;
   
    width: 98%;
    height: 98%;
    vertical-align: center;
    background-color: #FFFFFF;
    margin-top: 20px;
    margin-left: 20px;
    margin-right: 20px;
   

}

#interna{

    width: 94%;
    height: 94%;
    margin-left: 54px;
    margin-right: 54px;
}



#interna a:link {
  text-decoration: none;
}

#interna a:visited {
  text-decoration: none;
}

#interna a:hover {
  text-decoration: underline;
}

#interna a:active {
  text-decoration: underline;
}

	
   input[type=submit] {  
	color: #000000;
	border: 1px solid #ECECEC;
	background: #ECECEC;


	
	height: 36px;
	width:330px;


    }  
	
	 input[type=submit]:hover{
		 color: #FFF;
	background: #2867b2;
	border: 1px solid #2867b2;
	cursor:pointer;
    }  


.img {
    opacity: 0.2;
    filter: alpha(opacity=20); /* For IE8 and earlier */
}
ul, li{
    padding:0;
    list-style:none;
    width: auto;
}
h2{
    width: auto;
}

select{
    width:320px;
    height: 80px;
	


}


.tabela a {

text-decoration: none;
font-size: 25px;
color: #CCCCCC;
display: block;
transition: 0.3s;
  text-align: left;

}

.tabela a:hover {

text-decoration: none;
font-size: 25px;
color: blue;
display: block;
transition: 0.3s;
  text-align: left;

}


.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 9999999999;
  top: 0;
  left: 0;
  background-color: #FFFFFF;
  border: 1px solid grey;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 0px;
  box-shadow: 1px 0px 50px rgba(0, 0, 0, 0.5);
}


.sidenav a {

  text-decoration: none;
  font-size: 25px;
  color: #CCCCCC;
  display: block;
  transition: 0.3s;

	padding-right: 10px;
}

.sidenav a:hover {
  color: #CC0000;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 0px;
  font-size: 30px;
  margin-left: 50px;
	background-color: #2867b2;
	width: 100%;
	height: 44px;
    color: #FFF;
    text-align: right;
}


#div{
		
		padding-left: 10px;
		margin-top: -5px;

font-size: 12px;
	
}
	
#apDiv12 a:link 
{ 
text-decoration:none; 
	color: #000000;
} 
	
	/* visited link */
#apDiv12 a:visited {
  color: #000000;
	text-decoration:none; 
}

/* mouse over link */
#apDiv12 a:hover {
  color: grey;
	text-decoration:none; 
}

/* selected link */
#apDiv12 a:active {
  color: grey;
	text-decoration:none; 
}
	

table {
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
}

.jsdragtable-contents {
    background: #fff;
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    box-shadow: 2px 2px 5px #aaa;
    padding: 0;
}

.jsdragtable-contents table {
    margin-bottom: 0;
}



div.checklistdiv {padding: 4px; background: #F7F7F7; border: 1px solid #AAAAAA; margin-bottom: 10px;}
div.checklist, div.checklistHighlighted { overflow-y: auto; overflow-x: hidden; /* If you don't want scrollbars, leave this one blank. */ }

div.checklist { border: 1px solid #AAAAAA; color: #555555; background: #FFFFFF; font-size: 12px; line-height: 1.6em;}
div.checklistHighlighted { border: 1px solid #ECECEC; }

ul.checklist { list-style-type: none; margin: 0; padding: 0; }
div.checklist li { padding: 3px; margin-left: 0;}
div.checklist li.even { background-color: #FFFFFF; }
div.checklist li.odd { background-color: #F7F7F7; }
div.checklist li.even:hover, div.checklist li.odd:hover, div.checklist li.focused, div.checklist li:hover label { background-color: #ECECEC; color: #000000; }
div.checklist li.checked { background: #ECECEC; color: #000000; }
div.checklist li.optgroup.checked { background: #CCCCCC; color: #CCC; }
div.checklist li.checked:hover, div.checklist li.checked:hover label { background: #CCC; }

div.checklist label.disabled { color: #DDDDDD; }

/* div.checklist li { position: relative; } */
div.checklist li input { display: block; float: left; }
div.checklist label { display: block; margin: 0; padding: 0; }
div.checklist label.leaveRoomForCheckbox { display: block; padding-left: 20px;/* If hiding checkboxes, set padding-left to 3px */ } 

ul.showSelectedItems { font-size: 12px; line-height: 1.6em; }
ul.showSelectedItems li:hover { cursor: pointer; color: red; text-decoration: line-through; }

/* Search box */
div.findInList { margin-bottom: 5px; }
div.findInList input {font-size: 12px; line-height: 1.6em; width: 100%;padding: 3px 2px !important;margin: 0;outline: 0; border: 1px solid #aaa; min-height: 17px; background: #fff url(../img/bags.png) no-repeat 100% -22px;background: url(../img/bags.png) no-repeat 100% -22px, -webkit-gradient(linear, left bottom, left top, color-stop(0.85, #fff), color-stop(0.99, #eee));background: url(../img/bags.png) no-repeat 100% -22px, -webkit-linear-gradient(center bottom, #fff 85%, #eee 99%);background: url(../img/bags.png) no-repeat 100% -22px, -moz-linear-gradient(center bottom, #fff 85%, #eee 99%);background: url(../img/bags.png) no-repeat 100% -22px, linear-gradient(top, #fff 85%, #eee 99%); }
div.findInList input.blurred { color: gray; }
	
/* borda de fora */
div.actionButtons {font-size: 9px; line-height: 1.6em; margin-top: 3px; }
div.actionButtons span { text-decoration: none; color: #555555; }
div.actionButtons span:hover { text-decoration: underline; cursor: pointer; color:#555555; }

div.checklist li.optgroup { font-size:9px; font-weight: bold; font-style: italic; background-color: #CCCCCC; padding-left: 3px; }
div.checklist li.optgroup:hover { background-color: #CCCCCC; color: #555555; }
span.checklist_min_transform {font-size: 12px; color:#888888; font-style: italic; }
div.checklist li.checked span.checklist_min_transform {color: #FFFFFF}


hr {
		
	
		height: 10px;
	
        }


.casa {
    width: auto;
    top: 0px;
    height: 300px;
  
	right:0px;
    background-color: #fff;
    box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
    border: 1px solid #000000;
   
	
}


.casa2 {
    width: 30px;
    top: 0px;
    height: 50px;
  
	right:0px;
    background-color: #fff;
    box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
    border: 1px solid #000000;
   
	
}


.checkin {

overflow: hidden;
width: 20px;
height: 30px;
}



#iw_container {
 	width:510px;
	height:100%;
    overflow: hidden;
 
	
}
#iw_container .iw_title {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
	font-weight:bold;
	padding:10px;
   
   
    color: white;

}
#iw_container .iw_content {
    font-size: 12px;
    line-height: 20px;  
    margin-right: 1px;
 	padding:10px;
overflow: hidden;
}



#iw_container2 {
 	width:100%;
	height:100%;
	overflow:hidden;
	
	
}
#iw_container2 .iw_title2 {
 
    font-size: 13px;
	font-weight:bold;
	padding:15px;
    color: white;
    margin: 0;
	background-color:#2867b1;

}


#legenda_zoom{

	font-size:13px;
	line-height:15px;
	padding-top:10px;
	padding-left:10px;
	padding-bottom:10px;
    color: #000;
    text-align: center;
	}
	
#checkcount{
font-weight: bold;
padding-left: 4px;

}
</style>

<div class="jquery-waiting-base-container"></div>
	
<body onload="initMap()">


<?php 


require_once(__DIR__ . "/gchart/gChartInit.php");


include ('base_cad_n.php'); 

 
if(!empty($_POST['lang0pt'])) {
    $campo0 = $_POST['lang0pt'];
    $string0 = '"' . implode('","', $campo0) . '"';
  // echo $string0;
}


if(!empty($_POST['lang0pt1'])) {
    $campo1 = $_POST['lang0pt1'];
    $string1 = '"' . implode('","', $campo1) . '"';
  //  echo $string1;
}

if(!empty($_POST['lang0pt3'])) {
    $campo3 = $_POST['lang0pt3'];
    $string3 = '"' . implode('","', $campo3) . '"';
  // echo $string3;
}

///SEM LOGIN//////////

//SO LOGIN/////////////////////////////////

if($string0!="" AND $string1=="" AND $string3==""){

    $aviso_listatual = " &#x2022; FILTRADO POR LOGIN";

    $query = "select * from rotas where login in($string0) order by login, lista, rota, sequencia";
    

    $query_pizza1 = "select id from rotas where status=1 AND login in($string0)";													
    $rs_pizza1 = mysql_query($query_pizza1);
    $num_rows_pizza1 = mysql_num_rows($rs_pizza1);
  
    
    $query_pizza2 = "select id from rotas where status=2 AND login in($string0)";															
    $rs_pizza2 = mysql_query($query_pizza2);
    $num_rows_pizza2 = mysql_num_rows($rs_pizza2);
  
    
    $query_pizza3 = "select id from rotas where status=0 AND login in($string0)";															
    $rs_pizza3 = mysql_query($query_pizza3);
    $num_rows_pizza3 = mysql_num_rows($rs_pizza3);
  
    
    $query_pizza4 = "select id from rotas where status=3 AND login in($string0)";														
    $rs_pizza4 = mysql_query($query_pizza4);
    $num_rows_pizza4 = mysql_num_rows($rs_pizza4);
   
    
    
    }

//SO LISTA/////////////////////////////////

if($string0=="" AND $string1!="" AND $string3==""){

    $aviso_listatual = " &#x2022; FILTRADO POR LISTA";

    $query = "select * from rotas where lista in($string1) order by login, lista, rota, sequencia";

        
    $query_pizza1 = "select id from rotas where status=1 AND lista in($string1)";													
    $rs_pizza1 = mysql_query($query_pizza1);
    $num_rows_pizza1 = mysql_num_rows($rs_pizza1);
  
    
    $query_pizza2 = "select id from rotas where status=2 AND lista in($string1)";															
    $rs_pizza2 = mysql_query($query_pizza2);
    $num_rows_pizza2 = mysql_num_rows($rs_pizza2);
    
    
    
    $query_pizza3 = "select id from rotas where status=0 AND lista in($string1)";															
    $rs_pizza3 = mysql_query($query_pizza3);
    $num_rows_pizza3 = mysql_num_rows($rs_pizza3);
   
    
    $query_pizza4 = "select id from rotas where status=3 AND lista in($string1)";														
    $rs_pizza4 = mysql_query($query_pizza4);
    $num_rows_pizza4 = mysql_num_rows($rs_pizza4);
   
    
    }

//SO OCORRENCIAS/////////////////////////////////

if($string0=="" AND $string1=="" AND $string3!=""){

    $aviso_listatual = " &#x2022; FILTRADO POR OCORRÊNCIA";

$query = "select * from rotas where status in($string3) order by login, lista, rota, sequencia";

$query_pizza1 = "select id from rotas where status=1 AND status in($string3)";													
$rs_pizza1 = mysql_query($query_pizza1);
$num_rows_pizza1 = mysql_num_rows($rs_pizza1);


$query_pizza2 = "select id from rotas where status=2 AND status in($string3)";															
$rs_pizza2 = mysql_query($query_pizza2);
$num_rows_pizza2 = mysql_num_rows($rs_pizza2);


$query_pizza3 = "select id from rotas where status=0 AND status in($string3)";															
$rs_pizza3 = mysql_query($query_pizza3);
$num_rows_pizza3 = mysql_num_rows($rs_pizza3);

$query_pizza4 = "select id from rotas where status=3 AND status in($string3)";														
$rs_pizza4 = mysql_query($query_pizza4);
$num_rows_pizza4 = mysql_num_rows($rs_pizza4);


}


//LOGIN E LISTA /////////////////////////////////

if($string0!="" AND $string1!="" AND $string3==""){

    $aviso_listatual = " &#x2022; FILTRADO POR LOGIN/LISTA";
    
    $query = "select * from rotas where login in($string0) AND lista in($string1) order by login, lista, rota, sequencia";
    

    $query_pizza1 = "select id from rotas where status=1 AND login in($string0) AND lista in($string1)";													
    $rs_pizza1 = mysql_query($query_pizza1);
    $num_rows_pizza1 = mysql_num_rows($rs_pizza1);
   
    
    $query_pizza2 = "select id from rotas where status=2 AND login in($string0) AND lista in($string1)";															
    $rs_pizza2 = mysql_query($query_pizza2);
    $num_rows_pizza2 = mysql_num_rows($rs_pizza2);
   
    
    $query_pizza3 = "select id from rotas where status=0 AND login in($string0) AND lista in($string1)";															
    $rs_pizza3 = mysql_query($query_pizza3);
    $num_rows_pizza3 = mysql_num_rows($rs_pizza3);
 
    
    $query_pizza4 = "select id from rotas where status=3 AND login in($string0) AND lista in($string1)";														
    $rs_pizza4 = mysql_query($query_pizza4);
    $num_rows_pizza4 = mysql_num_rows($rs_pizza4);
   
    
    }
    

    //LOGIN E OCORRENCIA /////////////////////////////////

if($string0!="" AND $string1=="" AND $string3!=""){

    $aviso_listatual = " &#x2022; FILTRADO POR LOGIN/OCORRÊNCIA";
    
    $query = "select * from rotas where login in($string0) AND status in($string3) order by login, lista, rota, sequencia";
    


    $query_pizza1 = "select id from rotas where status=1 AND login in($string0) AND status in($string3)";													
    $rs_pizza1 = mysql_query($query_pizza1);
    $num_rows_pizza1 = mysql_num_rows($rs_pizza1);
  
    
    $query_pizza2 = "select id from rotas where status=2 AND login in($string0) AND status in($string3)";															
    $rs_pizza2 = mysql_query($query_pizza2);
    $num_rows_pizza2 = mysql_num_rows($rs_pizza2);
   
    
    $query_pizza3 = "select id from rotas where status=0 AND login in($string0) AND status in($string3)";															
    $rs_pizza3 = mysql_query($query_pizza3);
    $num_rows_pizza3 = mysql_num_rows($rs_pizza3);
  
    
    $query_pizza4 = "select id from rotas where status=3 AND login in($string0) AND status in($string3)";														
    $rs_pizza4 = mysql_query($query_pizza4);
    $num_rows_pizza4 = mysql_num_rows($rs_pizza4);
  
    
    }
   
    //LISTA E OCORRENCIA /////////////////////////////////

if($string0=="" AND $string1!="" AND $string3!=""){

    $aviso_listatual = " &#x2022; FILTRADO POR LISTA/OCORRÊNCIA";
    $query = "select * from rotas where lista in($string1) AND status in($string3) order by login, lista, rota, sequencia";
  


    $query_pizza1 = "select id from rotas where status=1 AND lista in($string1) AND status in($string3)";													
    $rs_pizza1 = mysql_query($query_pizza1);
    $num_rows_pizza1 = mysql_num_rows($rs_pizza1);
 
    
    $query_pizza2 = "select id from rotas where status=2 AND lista in($string1) AND status in($string3)";															
    $rs_pizza2 = mysql_query($query_pizza2);
    $num_rows_pizza2 = mysql_num_rows($rs_pizza2);
  
    
    $query_pizza3 = "select id from rotas where status=0 AND lista in($string1) AND status in($string3)";															
    $rs_pizza3 = mysql_query($query_pizza3);
    $num_rows_pizza3 = mysql_num_rows($rs_pizza3);
  
    
    $query_pizza4 = "select id from rotas where status=3 AND lista in($string1) AND status in($string3)";														
    $rs_pizza4 = mysql_query($query_pizza4);
    $num_rows_pizza4 = mysql_num_rows($rs_pizza4);
  
    
    }
    

//TODAS FILTRAGENS /////////////////////////////////

if($string0!="" AND $string1!="" AND $string3!=""){

    $aviso_listatual = " &#x2022; FILTRADO POR LOGIN/LISTA/OCORRÊNCIA";
    
$query = "select * from rotas where login in($string0) AND lista in($string1) AND status in($string3) order by login, lista, rota, sequencia";


$query_pizza1 = "select id from rotas where status=1 AND login in($string0) AND lista in($string1) AND status in($string3)";													
$rs_pizza1 = mysql_query($query_pizza1);
$num_rows_pizza1 = mysql_num_rows($rs_pizza1);


$query_pizza2 = "select id from rotas where status=2 AND login in($string0) AND lista in($string1) AND status in($string3)";															
$rs_pizza2 = mysql_query($query_pizza2);
$num_rows_pizza2 = mysql_num_rows($rs_pizza2);



$query_pizza3 = "select id from rotas where status=0 AND login in($string0) AND lista in($string1) AND status in($string3)";															
$rs_pizza3 = mysql_query($query_pizza3);
$num_rows_pizza3 = mysql_num_rows($rs_pizza3);


$query_pizza4 = "select id from rotas where status=3 AND login in($string0) AND lista in($string1) AND status in($string3)";														
$rs_pizza4 = mysql_query($query_pizza4);
$num_rows_pizza4 = mysql_num_rows($rs_pizza4);



}


//NENHUM FILTRAGENS /////////////////////////////////

if($string0=="" AND $string1=="" AND $string3==""){

    $aviso_listatual = " &#x2022; VISITAS HABILITADAS NO APLICATIVO";
    $query = "select * from rotas where statusrota=1 order by login, lista, rota, sequencia";
    
    $query_pizza1 = "select id from rotas where status=1 AND statusrota=1";													
    $rs_pizza1 = mysql_query($query_pizza1);
    $num_rows_pizza1 = mysql_num_rows($rs_pizza1);
   
    
    $query_pizza2 = "select id from rotas where status=2 AND statusrota=1";															
    $rs_pizza2 = mysql_query($query_pizza2);
    $num_rows_pizza2 = mysql_num_rows($rs_pizza2);
  
    
    
    $query_pizza3 = "select id from rotas where status=0 AND statusrota=1";															
    $rs_pizza3 = mysql_query($query_pizza3);
    $num_rows_pizza3 = mysql_num_rows($rs_pizza3);
  
    
    $query_pizza4 = "select id from rotas where status=3 AND statusrota=1";														
    $rs_pizza4 = mysql_query($query_pizza4);
    $num_rows_pizza4 = mysql_num_rows($rs_pizza4);
    
    }

$rs = mysql_query($query);
$total_todos = mysql_num_rows($rs);
//echo $total_todos;



 



?> 	

	
		<div id="div_titulo">
	  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>

     	   <td align="left" valign="middle"><font size="3">PAINEL DE MONITORAMENTO</font></td>
     
		
    </tr>
</table>

	</div>

<div id="mySidenav" class="sidenav">

<div class="div" id="div" name="div">
	<br><br>
	<br><br>

    <?php
    if($nivel_acesso==3){
?>



<?php
    } else {
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-top: 25px; padding-bottom: 8px; width:100%" >
		<tr>
			
		
            <td align="left" valign="middle" nowrap="nowrap" style="width:360px; color:#000000;">
            <strong><font size="4">&nbsp;ALTERAR/SALVAR</font></strong>
            </td>
	   </tr>
        </table>
        <hr size = 1 width = '155px' color="#DCDCDC">
        <br> <br>
		<table border="0" width="auto" cellpadding="0" cellspacing="0" style="text-align: left; padding-left:20px" class="tabela">
            <tr>
	<td nowrap="nowrap" style="width: 20px">

		
		
			<i class="material-icons" style="font-size:24px; vertical-align:bottom;">dns</i>
		</a>
    </td>
    <td nowrap="nowrap">
    <a href="javascript:acao1();">
<font size="2" style="text-align: left">&nbsp;&nbsp;ALTERAR OCORRÊNCIA</font>
</a>
    </td>
    </tr>
    <tr>
	<td nowrap="nowrap" style="width: 20px">
	
			<i class="material-icons" style="font-size:24px; vertical-align:bottom">face</i>
	
    </td>
    <td nowrap="nowrap">
    <a href="javascript:acao2();">
   <font size="2"  style="text-align: left">&nbsp;&nbsp;ALTERAR LOGIN</font>
    </a>
    </td>
    </tr>
    <tr>
	<td nowrap="nowrap" style="width: 20px">
	
			<i class="material-icons" style="font-size:248x; vertical-align:bottom">format_list_bulleted</i>
	
    </td>
    <td nowrap="nowrap">
    <a href="javascript:acao4();">
    <font size="2">&nbsp;&nbsp;ALTERAR LISTA</font>
    </a>
    </td>
    </tr>
    <tr>
	<td  nowrap="nowrap" style="width: 15px">
		
			<i class="material-icons" style="font-size:24px; vertical-align:bottom">directions</i>
		
    </td>
    <td nowrap="nowrap">
    <a href="javascript:acao5();">
    <font size="2">&nbsp;&nbsp;ALTERAR ROTA</font>
    </a>
    </td>
    </tr>
    <tr>
	<td  nowrap="nowrap" style="width: 15px">
		
			<i class="material-icons" style="font-size:24px; vertical-align:bottom">remove_red_eye</i>
		
    </td>
    <td nowrap="nowrap">
    <a href="javascript:acao6();">
    <font size="2">&nbsp;&nbsp;CANHOTO CONFERIDO</font>
    </a>
    </td>
    </tr>
    
    <tr>
	<td  nowrap="nowrap" style="width: 15px">
		
			<i class="material-icons" style="font-size:24px; vertical-align:bottom">save</i>
		
    </td>
    <td nowrap="nowrap">
    <a href="javascript:acao7();">  
    <font size="2">&nbsp;&nbsp;SALVAR ORDEM DA TABELA</font>
    </a>
    <form name="salva_table" id="salva_table" method="GET" target="Pagina">
<input type="text" id="table_ordem" name="table_ordem" size="50" hidden="hidden">
</form>
    </td>
    </tr>
    
		</table>
    <br><br><hr size = 1 width = '350px' color="#d3d5d6" style="height: 1px;"><br>


<?php
    }

    ?>

    
   
<form name="search_form" method="POST" action="step2.php">

	
			
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-top: 25px; padding-bottom: 8px; width:100%" >
		<tr>
			
	
            <td align="left" valign="middle" nowrap="nowrap" style="width:360px;color:#000000;">
           
            <strong><font size="4">&nbsp;FILTRAR VISITAS/ENTREGAS</font></strong>
            </td>
	   </tr>
		</table>
        <hr size = 1 width = '250px' color="#DCDCDC">
        <br> <br>
	<table border="0" cellpadding="0" cellspacing="5" width="320px">
			
	<tr>
			<td nowrap="nowrap" height="30px" bgcolor="#ECECEC" style="padding-left: 10px;">
				<i class="material-icons" style="font-size:22px; vertical-align:bottom">&#xe853;</i><font size="2"> Login</font>
			</td>	
	</tr>
		<tr>

			<td>  <select name="lang0pt[]" multiple id="lang0pt">
                <?php
                  //print_r($_POST['lang0pt']);
                  
               //   $segura_select = $_POST['lang0pt'];

               //   $conta_select = count($segura_select);
                 // echo $conta_select;

                 
                    $result = mysql_query("select login from usuario where nivel!=1 order by login");

                    while ($rowsec = mysql_fetch_assoc($result)){

                     //   for ($x = 0; $x < $conta_select; $x++) {
                            //echo $segura_select[$x];
    
                          //  if($segura_select==$rowsec[login]){
                             //   echo("<option value='$rowsec[login]' selected>$rowsec[login]</option>");
                         //   break;
                  //          } 

    
                            echo("<option value='$rowsec[login]'>$rowsec[login]</option>");
                        //break;


                 //     }

                    }
                ?>
            </select>
            <script>
                $('#lang0pt').multiselect({
                    columns: 1,
                    placeholder: 'SELECIONAR USUÁRIO',
                    search: true
                });
            </script>
			</td></tr>

	<tr>
			<td nowrap="nowrap" height="30px" bgcolor="#ECECEC" style="padding-left: 10px;">
		<i class="material-icons" style="font-size:22px; vertical-align:bottom">&#xe875;</i><font size="2"> Lista</font>
			</td>	
	</tr>	

	<tr>
			<td><select name="lang0pt1[]" multiple id="lang0pt1">
                <?php
                  
                    $result1 = mysql_query("select DISTINCT lista from rotas order by id DESC");
                    while ($rowsec1 = mysql_fetch_assoc($result1)){
                        echo("<option value='$rowsec1[lista]'>$rowsec1[lista]</option>");
                    }
                ?>
            </select>
            <script>
                $('#lang0pt1').multiselect({
                    columns: 1,
                    placeholder: 'SELECIONAR LISTA',
                    search: true
                });
            </script>
			</td></tr>
	
	
    
		<tr>
		<td nowrap="nowrap" height="30px" bgcolor="#ECECEC" style="padding-left: 10px;">
			<i class="material-icons" style="font-size:22px; vertical-align:bottom">event_available</i><font size="2"> Ocorrência</font>
			</td>	
        </tr>
	
			<td>  <select name="lang0pt3[]" multiple id="lang0pt3">
             
                  <option value='0'>Pendentes</option>
                  <option value='2'>Negativadas</option>
                  <option value='1'>Positivadas</option>
                  <option value='3'>Alertas</option>
              
            </select>
            <script>
                $('#lang0pt3').multiselect({
                    columns: 1,
                    placeholder: 'SELECIONAR OCORRÊNCIA',
                    search: true
                });
            </script>
			</td>
    </tr>
    

		<tr>
		<td>
			
            <input type="submit" name="submit" value="APLICAR FILTRO" onclick="javascript:valida()" />
		</td> 
		</tr>

        </form>
		
	
	</table>
		<br><br>
	
        <hr size = 1 width = '350px' color="#d3d5d6" style="height: 1px;"><br>
	
		<table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 25px; padding-bottom: 8px; width:100%">
		<tr>
		
        
            <td align="left" valign="middle" nowrap="nowrap" style="width:360px;color:#000000;">
            <strong><font size="4">&nbsp;EXPORTAR/IMPRIMIR</font></strong>
            </td>

	   </tr>
        </table>
        <hr size = 1 width = '195px' color="#d3d5d6">
        <br><br>
        <table border="0" width="auto" cellpadding="0" cellspacing="0" style="text-align: left; padding-left:20px" class="tabela">
            <tr>
	<td nowrap="nowrap" style="width: 20px">
		<i class="material-icons" style="font-size:24px; vertical-align:bottom">picture_as_pdf</i>		
    </td>
    <td nowrap="nowrap">
    <a href="javascript:window.print(); closeNav();">
<font size="2" style="text-align: left">&nbsp;&nbsp;EXPORTAR PDF</font></b>
</a>
    </td>
    </tr>
    <tr>
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:24px; vertical-align:bottom">local_printshop</i>
    </td>
    <td nowrap="nowrap">
  
    <a href="javascript:window.print(); closeNav();" >
    <font size="2"  style="text-align: left">&nbsp;&nbsp;IMPRIMIR</font>
    </a>
    </td>
    </tr>
    <tr>

    <form action="export.php?acao=export_xls" method="post" id='myform'>
	<td nowrap="nowrap" style="width: 20px">
    <i class="material-icons" style="font-size:24px; vertical-align:bottom">cloud_download</i>
    </td>
    <td nowrap="nowrap">

<input type="text"  value="<?php echo "'" .implode("','", $campo0) . "'"; ?>" name="exp1" id="exp1" hidden="hidden" />
<input type="text"  value="<?php echo "'" .implode("','", $campo1) . "'"; ?>" name="exp2" id="exp2" hidden="hidden" />
<input type="text"  value="<?php echo "'" .implode("','", $campo3) . "'"; ?>" name="exp3" id="exp3" hidden="hidden"/>

	<a href="javascript:submitform();">
    <font size="2">&nbsp;&nbsp;EXPORTAR .XLS</font>
    </a>
    </td>
    </form>

    </tr>
    <tr>


    <?php
			
            /// so superbrilho //////
            if($logado=='superbrilho'){
            ?>
                
                
<input type="text"  value="<?php echo "'" .implode("','", $campo0) . "'"; ?>" name="login_exp" id="login_exp" hidden="hidden"/>
<input type="text"  value="<?php echo "'" .implode("','", $campo1) . "'"; ?>" name="lista_exp" id="lista_exp" hidden="hidden"/>
<input type="text"  value="<?php echo "'" .implode("','", $campo3) . "'"; ?>" name="ocorrencia_exp" id="ocorrencia_exp" hidden="hidden"/>


		

                <td nowrap="nowrap" style="width: 20px">
	
                  <i class="material-icons" style="font-size:248x; vertical-align:bottom">personal_video</i>

                </td>
                <td nowrap="nowrap">
                <a href="javascript:acao3();">
                  <font size="2">&nbsp;&nbsp;EXPORTAR WAYOUT</font>
                 </a>
                </td>
   
                
            <?php	
            }	
            ?>
   
    </tr>
        </table>
        
        <br>

	<br><br>
	<br>
    </div>
	
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>
	
	
</div>


<div id="interna">

    <br><br><br>
   
<table border="0" style="height: 100px; padding-left:20px; color:#000000;"  cellpadding="0" cellspacing="0">
<tr>
    <td  align="left" nowrap="nowrap">
    <i class="material-icons" style="font-size:28px">phonelink_ring</i>
    </td>
    <td valign="button" align="left" style="height: 50px;">
    <font size="4"><strong>&nbsp;LISTA DE VISITAS/ENTREGAS</strong><span style="color: #000000"><?php echo $aviso_listatual; ?></span</font>
    
    </td>
   
</tr>
<tr style="height: 25px;vertical-align: top">
<td colspan="2"><hr style="border: none; width:100%;" color="#DCDCDC"></td>
</tr>


<tr style="height: 25px;font-size: 12px;">
<td colspan="2">

<div align="left" >&nbsp;<input type="checkbox" onClick="toggle(this)" name="todos_check" id="todos_check" />&nbsp;SELECIONAR TODAS VISITAS</div>

</td>
</tr>
<tr style="height: 25px;font-size: 12px;">
<td colspan="2">

<div id="checkcount"></div>

</td>

</tr>




</table>
    

<br>

 <div id="apDiv12">
     
 
<div id="total">
                 
<table border="3" id="demo" name="demo" class="tablesorter" width="100%">
<thead>
<tr bgcolor="#589bd4" height="35px" class="active">
<?php
$pieces = explode(",", $ordem_table);
$result1 = count($pieces);

$i = 0;
    
$nome_cli=array();
$login_cli=array();
$lat_cad=array();
$lng_cad=array();
$status=array();
$lista=array();
$ocorrencia=array();
$rota=array();
$sequencia=array();
$endereco=array();
$cidade=array();
$tempo=array();
$dth_ocorrenciax=array();
$classe=array();
$obs=array();
$posicao_ocorrencia_lat = array();
$posicao_ocorrencia_lgn = array();


for ($i2 = 0; $i2 < $result1; $i2++) {
?>
<th nowrap="nowrap" headers="<?php echo $pieces[$i2]; ?>" bgcolor="#00000" style="width: 20px; color:#000000;" class="drag-enable" >

<?php
if($pieces[$i2]=="check" OR $pieces[$i2]=="geo" OR $pieces[$i2]=="foto" OR $pieces[$i2]=="edit" OR $pieces[$i2]=="exclui" OR $pieces[$i2]=="localiza"){
?>
<div align="center" ></div>
<?php
}

    if($pieces[$i2]=="status"){
    ?>
            <div align="center" >STS</div>
            <?php
        } 
        if($pieces[$i2]=="foto"){
            ?>
                    <div align="center" >FT</div>
                    <?php
                } 
    if($pieces[$i2]=="sequencia"){
?>
        <div align="center" >SQ</div>
        <?php
    } 
    if($pieces[$i2]=="codigo_pedido"){
        ?>
                <div align="center" >PEDIDO</div>
                <?php
     } 
    
     if($pieces[$i2]=="quem"){
        ?>
                <div align="center" >OP.</div>
                <?php
     } 
    
     if($pieces[$i2]=="canhoto"){
        ?>
                <div align="center" >C.C</div>
                <?php
     } 
     if($pieces[$i2]=="classificacao"){
        ?>
                <div align="center" >CLS</div>
                <?php
     } 

if($pieces[$i2]!="check" AND $pieces[$i2]!="status" AND $pieces[$i2]!="foto" AND $pieces[$i2]!="geo" AND $pieces[$i2]!="foto" AND $pieces[$i2]!="edit" AND $pieces[$i2]!="exclui" AND $pieces[$i2]!="localiza" AND $pieces[$i2]!="sequencia" AND $pieces[$i2]!="codigo_pedido" AND $pieces[$i2]!="quem" AND $pieces[$i2]!="canhoto" AND $pieces[$i2]!="classificacao"){
?>



<div align="center" ><?php echo strtoupper($pieces[$i2]); ?></div>

    <?php
    
}
?>

</th>
<?php
    
}
?>
</tr>
</thead>
<tbody>
<form method="GET" name="frm" id="frm" target="Pagina">
<?php
while($row = mysql_fetch_array($rs)){
?>

<tr height="auto">
<?php

      // ADD ARRAY MAPA
      array_push($nome_cli, $row["nome"]);
      array_push($login_cli, $row["login"]);
      array_push($lat_cad, $row["y"]);
      array_push($lng_cad, $row["x"]);
      array_push($lista, $row["lista"]);  
      $oco1 = $row["ocorrencia"];
      $query_qual1 = "select ocorrencia from ocorrencia where id=$oco1";
      $query_qual1 = mysql_query($query_qual1);	
      $dados1 = mysql_fetch_array($query_qual1);
      array_push($ocorrencia, $dados1['ocorrencia']);
      array_push($rota, $row["rota"]); 
      array_push($sequencia, $row["sequencia"]);
      array_push($endereco, $row["endereco"]);
      array_push($cidade, $row["cidade"]);
      array_push($tempo, $row["tempo"]);  
      array_push($posicao_ocorrencia_lat, $row["x_ocorrencia"]);
      array_push($posicao_ocorrencia_lgn, $row["y_ocorrencia"]);
  
     if($row["dth_ocorrencia"] =='0000-00-00 00:00:00'){
      $portuga= "";
     } else {
      $portuga = strtotime($row["dth_ocorrencia"]);
      $portuga= date('d/m/Y H:i:s', $portuga);
     }
      array_push($dth_ocorrenciax,  $portuga);     
      array_push($classe, $row["classificacao"]);
      array_push($obs, $row["obs"]);

      $status_icon = "";
      $status_number = $row["status"];

      if($row["status"] == 3 ){ 
          $status_icon = "#000000"; 
          $status_icon_mapa = "black";
         
      
      }
      if($row["status"] == 2 ){ 
          $status_icon = "#C00"; 
          $status_icon_mapa = "red";
      }
      if($row["status"] == 0 ){ 
          $status_icon = "#F90"; 
          $status_icon_mapa = "orange";
      }
      if($row["status"] == 1 ){ 
          $status_icon = "#5cbc69";
          $status_icon_mapa = "green";
      }
      
      // ICONE ARRAY MAPA   
  
      array_push($status, $status_icon_mapa);
  
  
  $guarda1 = "step2_sm.php?id=" . $row["id"] ."&login=" . $row["login"] . "&rota=" . $row["rota"] . "&cli=". $row["idcliente"]. "&end=". $row["endereco"] . "&cid=". $row["cidade"] ."&seq=" . $row["sequencia"] ."&nome=" . $row["nome"] ."&status=" . $row["status"] ."&oco=" . $row["ocorrencia"]; 
  
  $guarda = "step2_gm.php?id=" . $row["id"] ."&x=" . $row["x"] . "&y=" . $row["y"] . "&cli=". $row["idcliente"]. "&end=". $row["endereco"] . "&cid=". $row["cidade"]; 
  
  $guarda2 = "step2_gallery.php?id=" . $row["id"] ."&login=" . $row["login"] . "&rota=" . $row["rota"] . "&cli=". $row["idcliente"]. "&end=". $row["endereco"] . "&cid=". $row["cidade"] ."&seq=" . $row["sequencia"] ."&nome=" . $row["nome"] ."&status=" . $row["status"] ."&oco=" . $row["ocorrencia"]; 
      
      $id_visita = $row['id'];
      $query_img = "select id from images where id_visita='$id_visita'";
      $query_img = mysql_query($query_img);	
      
      $total = mysql_num_rows($query_img);
      //echo $total;
      
      $guarda_edit = "step2_edit.php?codigo=". $row["id"]; 
      $guarda_status = "step2_mudastatus.php?rotas_id=". $row["id"]; 
  

for ($i1 = 0; $i1 < $result1; $i1++) {

?>


<?php
    if($pieces[$i1]=="check"){
?>
<td align="center" nowrap="nowrap" width="auto"><input type="checkbox" class="marcar" name="check_list[]" id="check_list" value="<?php echo $row["id"]; ?>"></td>
   
<?php
    } 

if($pieces[$i1]=="status"){
?>
<td align="center" style="width: 20px"><i class="material-icons" style="font-size:16px; color: <?php echo $status_icon;?>">stop_circle</i>
<?php echo $status_number;?>
</td>

<?php
    } 
if($pieces[$i1]=="geo"){
        ?>
         <td align="center" nowrap="nowrap" width="auto"><a href="#" data-tooltip="Localização do Cliente" onclick="javascript:alert('Icone temporariamente desabilitado!');return false;"><i class="material-icons" style="font-size:20px">location_on</i></a></td>
        <?php
            } 
            
if($pieces[$i1]=="foto"){
                ?>
                
<td align="center" style="width: 20px"> 
<?php
if($total!=0){
?>
<a href="javascript:acao_volta(<?php echo "'" . "?id=" . $row["id"] . "'"; ?>);"><i class="material-icons" style="font-size:20px">&#xe3b0;</i></a>
<?php   
} 
?>
</td>      
<?php
} 




if($pieces[$i1]=="edit"){
    ?>
<td align="center" style="width: 20px"><a href="#" data-tooltip="Editar dados do cliente" onclick="javascript:alert('Icone temporariamente desabilitado!');return false;"><i class="material-icons" style="font-size:20px">&#xe560;</i></a></td>  
    <?php
        } 

if($pieces[$i1]=="exclui"){
    ?>  
  <td align="center" style="width: 20px"><a href="javascript:confirmaExclusao('scripts.php?acao=exclui_cliente_base_cliente&id=<?php echo $row["id"] ?>')" data-tooltip="Excluir cliente"><i class="material-icons" style="font-size:20px;color:red">&#xe5c9;</i></a></td>       
    <?php
        } 
        if($pieces[$i1]=="localiza"){
            ?> 
            <td align="center" style="width: 20px">
            <a href="javascript:map.setCenter(new google.maps.LatLng(<?php echo $row["y"]; ?>,<?php echo $row["x"]; ?>));map.setZoom(12);infobox(<?php echo $row["y"]; ?>, <?php echo $row["x"]; ?>, '<?php echo mb_strimwidth($row["nome"], 0, 60, "..."); ?>');"><i class="material-icons" style="font-size:20px;color:black">my_location</i></a>
          </td>  
           <?php
                } 

        if($pieces[$i1]=="codigo_pedido"){
                    ?> 
                  <td align="center" nowrap="nowrap" width="auto"><strong><?= $row["codigo_pedido"] ?></strong> </td>
                   <?php
                        } 

        if($pieces[$i1]=="ocorrencia"){
            $oco = $row["ocorrencia"];
            $query_qual = "select ocorrencia from ocorrencia where id=$oco";
            $query_qual = mysql_query($query_qual);	
            $dados = mysql_fetch_array($query_qual);    
            
if ($dados['ocorrencia']=='30-11--0001 00:00:00' OR $dados['ocorrencia']=='') {
  //  $dth_ocorrencia = "Não visitado!";
    ?>
    <td align="center" nowrap="nowrap" width="auto">Não visitado!</td>
    <?php
    } else {
       
?>
        <td align="center" nowrap="nowrap" width="auto"> <?= $dados['ocorrencia']; ?></td>
<?php
    }     ?>
                        

<?php
}

if($pieces[$i1]=="tempo"){
   
$entra = $row["dth_chegada"];
$sai = $row["dth_saida"];

$data_login = strtotime($entra);
$data_logout = strtotime($sai);

$tempo_con = mktime(date('H', $data_logout) - date('H', $data_login), date('i', $data_logout) - date('i', $data_login), date('s', $data_logout) - date('s', $data_login));

//$tempo_visita = $sai - $entra;
?>
<td align="center" nowrap="nowrap" width="auto"> <?= date('H:i:s', $tempo_con); ?></td>
   <?php
   } 

   if($pieces[$i1]=="ce"){
    if ($row["ce"]==true){
        $cerca = "<i class='material-icons' style='font-size:16px'>notifications_active</i>";
    } else {	
        $cerca = "";
    }
    ?> 
  <td align="center" nowrap="nowrap" width="auto"><strong><?= $cerca ?></strong> </td>
   <?php
        } 


        if($pieces[$i1]=="p.o"){
            ?> 
         
         <td align="center" nowrap="nowrap" width="auto" >

<?php
if ($row["x_ocorrencia"]!=""){
?>
<a href="javascript:map.setCenter(new google.maps.LatLng(<?php echo $row["x_ocorrencia"]; ?>,<?php echo $row["y_ocorrencia"]; ?>));map.setZoom(12);infobox(<?php echo $row["x_ocorrencia"]; ?>, <?php echo $row["y_ocorrencia"]; ?>, '<?php echo "LOCAL DO CHECK-IN: " . mb_strimwidth($row["nome"], 0, 60, "..."); ?>');"><i class='material-icons' style='font-size:16px'>mobile_friendly</i></a>
<?php
}
?>
</td>  
<?php
} 

if($pieces[$i1]=="canhoto"){
    ?> 
   <td align="center" nowrap="nowrap"  width="auto"> 
<?php 
if($row["canhoto"]=="1"){
?>
<i class='material-icons' style='font-size:16px;color: green;'>thumb_up</i>
<?php
}
?>

</td> 
   <?php
        } 

if($pieces[$i1]!="check" AND $pieces[$i1]!="status" AND $pieces[$i1]!="geo" AND $pieces[$i1]!="foto" AND $pieces[$i1]!="edit" AND $pieces[$i1]!="exclui" AND $pieces[$i1]!="localiza" AND $pieces[$i1]!="codigo_pedido" AND $pieces[$i1]!="ocorrencia" AND $pieces[$i1]!="tempo" AND $pieces[$i1]!="ce" AND $pieces[$i1]!="p.o" AND $pieces[$i1]!="canhoto"){
?>
 <td align="center" nowrap="nowrap" width="auto"><?= $row["$pieces[$i1]"]; ?></td>
        <?php
    }
 ?> 
<?php
}
?>
</tr>
<?php
}
?>
</form>
</tbody>
<tfoot>
<tr>
    <?php
for ($i2 = 0; $i2 < $result1; $i2++) {
    ?>
<th></th>
<?php
}
?>
</tr>
</tfoot>
</table>

<script>
        var contador = function() {
            var n = $( "input:checked" ).length;
         
            $("#checkcount").text( n + (n === 1 ? " SELECIONADO" : " SELECIONADOS"));
        };
        
        contador(); 

       

     //   var todos=document.getElementById("todos_check").name;
     // alert(n.name);
  //    if(n.name=="check_list"){
        $( "input[type=checkbox]" ).on( "click", contador );
   //    }
       
    </script>


<?php

if($total_todos == ""){
  
    echo "<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Filtragem vazia! Clique no Link Menu superior esquerdo e aplique um filtro válido!";
        

    } else {

        if($total_todos>=5000){
            ?>
            <script LANGUAGE="JavaScript" TYPE="text/javascript">
         
            alert("O filtragem obteve <?php echo $total_todos ?> registros. \n Essa pesquisa pode levar muito tempo para carregar a pagina! \n O limite de resultados é de 5.000 consultas.\n Faça uma pesquisa com menos resultados!");
            window.location.href ="step2.php?";

            </script>


            <?php
        } 
    }
?>




</div>
</div> 

 <br><br><br>
<table border="0" style="height: 70px; padding-left:20px; color:#000000;"  cellpadding="0" cellspacing="0">
<tr>
    <td  align="left" nowrap="nowrap">
    <i class="material-icons" style="font-size:28px">map</i>
    </td>
    <td valign="button">
    <font size="4"><strong>&nbsp;MAPA DE VISITAS/ENTREGAS</strong><span style="color: #000000"><?php echo $aviso_listatual; ?></span</font>
    
    </td>
   
</tr>
<tr style="height: 25px;vertical-align: top">
<td colspan="2"><hr style="border: none; width:100%;" color="#DCDCDC"></td>
</tr>
</table>
<br>
<script language="javascript">
 
<?php

 $result = count($lat_cad);

// echo $result;


// print_r($lat_cad);
//($lng_cad);

for ($i=0; $i < $result; $i++) {

  //  echo $lat_cad[$i]."<br>";
}

$i--;
?>


	var locations = [ 
	  <?php 
	  while($i > 0){
	   ?>[<?php echo $lat_cad[$i]?>,<?php echo $lng_cad[$i]?>,'<?php echo $status[$i]?>', '<?php echo $i?>','<?php echo $lista[$i]?>','<?php echo $ocorrencia[$i]?>','<?php echo $rota[$i]?>','<?php echo $sequencia[$i]?>','<?php echo $endereco[$i]?>','<?php echo $cidade[$i]?>','<?php echo $tempo[$i]?>','<?php echo $dth_ocorrenciax[$i]?>','<?php echo $classe[$i]?>','<?php echo $obs[$i]?>','<?php echo $nome_cli[$i]?>','<?php echo $login_cli[$i]?>',<?php echo $posicao_ocorrencia_lat[$i]?>, <?php echo $posicao_ocorrencia_lgn[$i]?>], 
	   <?php $i--; ?>
	   <?php }?>
	   [<?php echo $lat_cad[$i]?>,<?php echo $lng_cad[$i]?>,'<?php echo $status[$i]?>', '<?php echo $i?>','<?php echo $lista[$i]?>','<?php echo $ocorrencia[$i]?>','<?php echo $rota[$i]?>','<?php echo $sequencia[$i]?>','<?php echo $endereco[$i]?>','<?php echo $cidade[$i]?>','<?php echo $tempo[$i]?>','<?php echo $dth_ocorrenciax[$i]?>','<?php echo $classe[$i]?>','<?php echo $obs[$i]?>','<?php echo $nome_cli[$i]?>','<?php echo $login_cli[$i]?>',<?php echo $posicao_ocorrencia_lat[$i]?>, <?php echo $posicao_ocorrencia_lgn[$i]?>]
    ];

 var map;

function initMap() {
      
        map = new google.maps.Map(document.getElementById('total_mapa'), {
            zoom: 9,
          styles: styles,
          center: new google.maps.LatLng(<?php echo $lat?>, <?php echo$lgn?>),
     
        });
     //   var markerX = new google.maps.Marker({position: uluru, map: map});

     var infowindow = new google.maps.InfoWindow();
     var infowindow3 = new google.maps.InfoWindow();

     var bounds = new google.maps.LatLngBounds();


 for (i = 0; i < locations.length; i++) {
        var icone = "imgs/icon_" + locations[i][2] + ".png";
        marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][0], locations[i][1]),
        map: map,
        icon: icone       
        });

    //   alert(posicao_ocorrencia_lat[i][15]);
        marker3 = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][16], locations[i][17]),
        map: map,
        icon: 'imgs/man_icon.png',	    
       
        });
       


        marker2 = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lgn;?>),
        map: map,
        icon: 'imgs/icon_casa.png'
        
        });
       


     /// COR INFOBOX

      //pendente
      if (locations[i][2]=="orange"){
    var cor = "ff9900";
    
} else {
///PONTO CHECKIN


google.maps.event.addListener(marker, 'click', (function(marker3, i) {

var content_rastro3 = '<div class="checkin"><table border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><i class="material-icons" style="font-size:26px; color:#409900">phone_iphone</i></font></td></tr></table></div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
google.maps.event.addListener(map, 'click', function() {infowindow3.close();});
  google.maps.event.addListener(infowindow3, 'domready', function() {
var iwOuterX = $('.casa2');
var iwBackgroundX = iwOuterX.prev();
iwBackgroundX.children(':nth-child(2)').css({'display' : 'none'});
   iwBackgroundX.children(':nth-child(4)').css({'display' : 'none'});
});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

return function() {
  infowindow3.setContent(content_rastro3);
  infowindow3.open(map, marker3);
}
})(marker3, i));



}
    //positivado
if (locations[i][2]=="green"){
    var cor = "409900"
}
if (locations[i][2]=="red"){
    var cor = "cc0000"
}
if (locations[i][2]=="black"){
    var cor = "000000"
}




 var content_rastro2 = '<div id="iw_container2"><div class="iw_title2"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_home.png" width="22" height="22"/></td><td align="left"><?php echo "SEDE: " . $logado; ?></td></tr></table></div></div>';
 
 var infoWindow2 = new google.maps.InfoWindow({
     content: content_rastro2
    });	
 
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 google.maps.event.addListener(map, 'click', function() {infoWindow2.close();});

	  	google.maps.event.addListener(infoWindow2, 'domready', function() {
		var iwOuter1 = $('.casa');
		var iwBackground1 = iwOuter1.prev();
		iwBackground1.children(':nth-child(2)').css({'display' : 'none'});
   		iwBackground1.children(':nth-child(4)').css({'display' : 'none'});
		});
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
   google.maps.event.addListener(marker2, 'click', function() {
        infoWindow2.open(map, marker2);
    });

    
 
        google.maps.event.addListener(marker, 'click', (function(marker, i) {


	var content = '<div id="iw_container">' +'<div class="iw_title" style="background-color:#'+cor+'"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_realizado.png" width="22" height="22"/></td><td align="left">'+locations[i][14]+'</td></tr></table></div><div class="iw_content"><strong>Login: </strong>'+locations[i][15]+'<br><strong>Lista: </strong>'+locations[i][4]+'<br><strong>Rota: </strong>'+locations[i][6]+'<br><strong>Sequência: </strong>'+locations[i][7]+'<br><strong>Endereço: </strong>'+locations[i][8]+'<br><strong>Cidade: </strong>'+locations[i][9]+'<br><strong>Ocorrência: </strong>'+locations[i][5]+'<br><strong>Data da ocorrência: </strong>'+locations[i][11]+'</div></div>';
 


	 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		google.maps.event.addListener(map, 'click', function() {infowindow.close();});
	  	google.maps.event.addListener(infowindow, 'domready', function() {
		var iwOuter = $('.gm-style-iw');
		var iwBackground = iwOuter.prev();
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   		iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	


	
        return function() {
          infowindow.setContent(content);
          infowindow.open(map, marker);
        }
      })(marker, i));
	  
      //bounds.extend(marker.getPosition());
    
      bounds.extend(marker.getPosition());
    


 }



map.fitBounds(bounds);


}


</script>

 <div id="mapa">

<div id="total_mapa">


</div>
  

 </div> 
<script>
    $(document).ready(function() {
        $("table").jsdragtable();
    });
</script>
<br><br><br>
 <table border="0" style="height: 70px; padding-left:20px; color:#000000;"  cellpadding="0" cellspacing="0">
<tr>
    <td  align="left" nowrap="nowrap">
    <i class="material-icons" style="font-size:28px">dashboard</i>
    </td>
    <td style="padding-left: 0px" valign="button">
    <strong> <font size="4">&nbsp;GRÁFICO CIRCULAR</font></strong>
    
    </td>
</tr>
<tr style="height: 25px;vertical-align: top">
<td colspan="2"><hr style="border: none; width:21   0px;" color="#DCDCDC"></td>
</tr>
</table>
<br>

<table border="0" style="height: 40px; padding-left:20px; color:#CCCCCC;padding-right:20px;"  cellpadding="0" cellspacing="0" width="100%">
<tr>
    <td  align="left" nowrap="nowrap" style="width: 13%">

    <div id="categoria1">
     <div id="cat_text">Total Geral</div>    
     <div id="cat1"><?php echo $total_todos; ?></div>
     </div>
    </td>
    <td  align="left" nowrap="nowrap" style="width: 12%">
    <div id="categoria2">
     <div id="cat_text1">Pendentes</div>
     <div id="cat2"><?php echo $num_rows_pizza3; ?></div>
     </div>

    </td>
    <td  align="left" nowrap="nowrap" style="width: 25%">
    <div id="negativados1">
     <div id="neg_text">Total</div>
     <div id="neg_icon">NEGATIVADOS</div>
     <div id="neg1"><?php echo $num_rows_pizza2; ?></div>
     </div>

    </td>
    <td  align="left" nowrap="nowrap" style="width: 25%">
    <div id="positivados1">
     <div id="pos_text">Total</div>
     <div id="pos_icon">POSITIVADOS</div>
     <div id="pos1"><?php echo $num_rows_pizza1; ?></div>
     </div>

    </td>
                        
    <td  align="left" nowrap="nowrap" style="width: 25%">
    <div id="alertas1">
     <div id="ale_text">Total</div>
     <div id="ale_icon">ALERTAS</div>
     <div id="ale1"><?php echo $num_rows_pizza4; ?></div>
     </div>
    </td>
    
    

    

</tr>
<tr>
    <td  align="left" nowrap="nowrap" style="width: 25%"  colspan="2">

  
<div id="categoria">
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		var data = google.visualization.arrayToDataTable([
          ['CATEGORIA', 'RESULTADO'],
          ['POSITIVADO', <?php echo $num_rows_pizza1;?>],
          ['NEGATIVADO', <?php echo $num_rows_pizza2;?>],
		  ['PENDENTES', <?php echo $num_rows_pizza3;?>],
		  ['ALERTAS', <?php echo $num_rows_pizza4;?>],
		  
        ]);


        var options = {
          //title: 'TOTAL GERAL DE EFICIÊNCIA',
		  pieHole: 0.4,
		  colors: ["#409900", "#cc0000", "#ff9900", "#000000"],
		  chartArea: { width: '30%', height: '100%', top: '10', left: '10', right: '10', bottom: '10'},
          pieSliceTextStyle: {
          color: 'white',
		  animation: {"startup": true}
          },
		 
          legend: { position: 'right', alignment: 'center', textStyle: { fontSize: 9}, maxLines: 1},
		  pointSize: 5,
		   titleTextStyle: {fontSize: 9, fontName: 'Arial', position: 'center'},
		 //  title: 'CATEGORIAS',
		    isStacked: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


<div id="piechart"  style="width: 100%; height: 100%;"></div>

</div>
   
    </td>
   
    <td  align="left" nowrap="nowrap" style="width: 25%">

    <div id="categoria">

<?php

$query = "select * from ocorrencia where status=2";					
$rs_ok = mysql_query($query);
$num_rows = mysql_num_rows($rs_ok);

if($string0==""){
    $completa0 = "";
} else {
    $completa0 = " AND login in($string0) ";
}

if($string1==""){
    $completa1 = "";
} else {
    $completa1 = " AND lista in($string1) ";
}

if($string3==""){
    $completa3 = "";
} else {
    $completa3 = " AND status in($string3) ";
}

if($string0=="" AND $string1=="" AND $string3=="") {

    $completa0 = " AND statusrota=1";
}

///NEGATIVOS TODOS

$query_negativos_todos = "select id from rotas where status=2" . $completa0 . $completa1 . $completa3;
//echo $query_negativos_todos;
$query_negativos_todos =mysql_query($query_negativos_todos);												
$num_rows_negativos_todos = mysql_num_rows($query_negativos_todos);
// echo $num_rows_negativos_todos;
//echo $num_rows_negativos_todos;
$array_ocorrencias = array();
$array_conta = array();
?>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  
  		var data = google.visualization.arrayToDataTable([
          ['NEGATIVADOS', 'RESULTADO'],
<?php
//echo $num_rows_negativos_todos;
//if($num_rows_negativos_todos!=0){
	
while($row = mysql_fetch_array($rs_ok)){

$titulos = $row['ocorrencia'];
$titulos_id = $row['id'];

///NEGATIVOS ESCOLHIDOS
$query_negativos =  "select id from rotas where status=2 AND ocorrencia=$titulos_id" . $completa0 . $completa1 . $completa3;
$query_negativos =  mysql_query($query_negativos);									
$num_rows_negativos = mysql_num_rows($query_negativos);

$xxx = number_format(($num_rows_negativos/$num_rows_negativos_todos)*100, 1);
//echo $xxx . "<br>";


array_push($array_conta, $xxx);
$titulos_ok = $titulos . ' (' . number_format(($num_rows_negativos/$num_rows_negativos_todos)*100, 1) . "%)";
array_push($array_ocorrencias, $titulos_ok);

 echo "['".$titulos."',".$num_rows_negativos. "],";
//echo $titulos . "-" . $xxx . "<br>";

}
 ?>
 ]);

        var options = {
          //title: 'TOTAL GERAL DE EFICIÊNCIA',
		  pieHole: 0.4,
		  colors: ["#ac1212", "#cc0000", "#d21515","#db3a3a","#e04c4c", "#e25e5e", "#e47070", "#e88585", "#eb9393", "#f2b1b1", "#f5c7c7", "#fadada", "#feefef"],
	
		  chartArea: { width: '30%', height: '100%', top: '10', left: '10', right: '10', bottom: '10'},
          pieSliceTextStyle: {
          color: 'white',
		 
          },
		
          legend: { position: 'right', alignment: 'center', textStyle: { fontSize: 9}, maxLines: 1},
		  pointSize: 5,
		   titleTextStyle: {fontSize: 9, fontName: 'Arial', position: 'center'},
		  // title: 'EFICIÊNCIA POR USUÁRIO',
		    isStacked: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>
    

<?php	
//} 
?>


<div id="piechart1" style="width: 100%; height: 100%;"></div>

</div>


    </td>
                        
    <td  align="left" nowrap="nowrap" style="width: 25%">
  
    <div id="categoria">
<?php

$query1 = "select * from ocorrencia where status=1";															
$rs1= mysql_query($query1);

$array_ocorrencias1 = array();
$array_conta1 = array();

///POSITIVOS TODOS
$query_positivos_todos = "select id from rotas where status=2" . $completa0 . $completa1 . $completa3;		
$query_positivos_todos =  mysql_query($query_positivos_todos);		
$num_rows_positivos_todos = mysql_num_rows($query_positivos_todos);
//echo $num_rows_positivos_todos;

?>
 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  
  		var data = google.visualization.arrayToDataTable([
          ['POSITIVADOS', 'RESULTADO'],
		  
<?php
//if($num_rows_positivos_todos!=0){

while($row1 = mysql_fetch_array($rs1)){

$titulos1 = $row1['ocorrencia'];
$titulos1_id = $row1['id'];

///POSITIVOS ESCOLHIDOS
$query_positivos =  "select id from rotas where status=1 AND ocorrencia=$titulos1_id" . $completa0 . $completa1 . $completa3;	
$query_positivos =  mysql_query($query_positivos);															
$num_rows_positivos = mysql_num_rows($query_positivos);

$zzz = number_format(($num_rows_positivos/$num_rows_positivos_todos)*100, 1);
//echo $xxx . "<br>";

array_push($array_conta1, $zzz);
$titulos1_ok = $titulos1 . ' (' . number_format(($num_rows_positivos/$num_rows_positivos_todos)*100, 1) . "%)";
array_push($array_ocorrencias1, $titulos1_ok);

 echo "['".$titulos1."',".$num_rows_positivos. "],";
 
 
}
 ?>
 ]);
 
   var options = {
          //title: 'TOTAL GERAL DE EFICIÊNCIA',
		  pieHole: 0.4,
		  colors: ["#409900", "#48a306", "#55b013", "#63be22", "#7acf3d", "#8bdb52", "#98e262", "#a9ea7a", "#b9f290", "#c8f8a5", "#d8fabf", "#e9fbdb", "#f3fcec", "#eaf0e6", "#c7d8bb"],
		  chartArea: { width: '30%', height: '100%', top: '10', left: '10', right: '10', bottom: '10'},
          pieSliceTextStyle: {
          color: 'white',
		
          },
		  
          legend: { position: 'right', alignment: 'center', textStyle: { fontSize: 9}, maxLines: 6},
		  pointSize: 5,
		 //  title: 'POSITIVADOS',
		   titleTextStyle: {fontSize: 10, fontName: 'Arial', position: 'center'},
		 
		    isStacked: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>

<?php
//}
?>

<div id="piechart2" style="width: 100%; height: 100%;"></div>


</div>
   

    </td>
    <td>

    <div id="categoria">

<?php

$query2 = "select * from ocorrencia where status=3";															
$rs2= mysql_query($query2);
//$num_rows = mysql_num_rows($rs);
$array_ocorrencias2 = array();
$array_conta2 = array();

///ALERTAS TODOS
$query_alertas_todos =  "select id from rotas where status=3" . $completa0 . $completa1 . $completa3;				
$query_alertas_todos =  mysql_query($query_alertas_todos);															
$num_rows_alertas_todos = mysql_num_rows($query_alertas_todos);


?>
 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  
  		var data = google.visualization.arrayToDataTable([
          ['ALERTAS', 'RESULTADO'],
		  
<?php

//if($num_rows_alertas_todos!=0){
	

while($row2 = mysql_fetch_array($rs2)){

$titulos2 = $row2['ocorrencia'];
$titulos2_id = $row2['id'];

///ALERTAS ESCOLHIDOS
//$query_alertas =  mysql_query("select * from rotas where ocorrencia='$titulos2' and status=3");		
$query_alertas =  "select id from rotas where status=3 AND ocorrencia=$titulos2_id" . $completa0 . $completa1 . $completa3;	
$query_alertas =  mysql_query($query_alertas);													
$num_rows_alertas = mysql_num_rows($query_alertas);

//echo $num_rows_alertas . "<br>";


$yyy = number_format(($num_rows_alertas/$num_rows_alertas_todos)*100, 1);
//echo $xxx . "<br>";

array_push($array_conta2, $yyy);
$titulos2_ok = $titulos2 . ' (' . number_format(($num_rows_alertas/$num_rows_alertas_todos)*100, 1) . "%)";
array_push($array_ocorrencias2, $titulos2_ok);

echo "['".$titulos2."',".$num_rows_alertas. "],";
}
 ?>
]);
 
   var options = {
          //title: 'TOTAL GERAL DE EFICIÊNCIA',
		  pieHole: 0.4,
		  colors: ["#000000", "#2f2f2f", "#484848", "#616161", "#767676", "#8e8e8d", "#a5a5a5", "#bcbcbc", "#d7d7d7", "#efefef", "#f8f8f8"],
		  chartArea: { width: '30%', height: '100%', top: '10', left: '10', right: '10', bottom: '10'},
          pieSliceTextStyle: {
          color: 'white',
		 
          },
		 
          legend: { position: 'right', alignment: 'center', textStyle: { fontSize: 9}, maxLines: 1},
		  pointSize: 5,
		   titleTextStyle: {fontSize: 10, fontName: 'Arial', position: 'center'},
		  // title: 'EFICIÊNCIA POR USUÁRIO',
		    isStacked: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
    </script>

<?php
//}

?>

<div id="piechart3" style="width: 100%; height: 100%;"></div>


</div>




    </td>
    

    

</tr>
</table>
<br><br><br>
</div>


<br><br>
<script>
    function fecha_foto() {
        
        document.getElementById("Pagina1").style.display = "none";

            };

            function fecha_filtro() {
        
        document.getElementById("Pagina2").style.display = "none";

            };

</script>
<style>


    
	#pag1{
position: absolute;
	width: 100%;
	left: 0px;
	top: 0px;
	height:1900px;

z-index:9997;
background-color: white;
opacity: 0.95;
		
}
	#pag2{
width: 400px;
height: 304px;
top: 50%;
left: 50%;
margin-top: -200px;
margin-left: -152px;
position: absolute;
border: 1px solid silver;

	
	z-index:9998;
	

}
        


    
#pag1x{
position: absolute;
	width: 100%;
	left: 0px;
	top: 0px;
	height:1900px;

z-index:9997;
background-color: white;
opacity: 0.95;

		
}
	#pag2x{
width: 520px;
height: 586px;
top: 50%;
left: 50%;
margin-top: -298px;
margin-left: -260px;
position: absolute;
border: 1px solid silver;
background-color: white;
	z-index:9998;
	

}

#pag2x_filtro{
width: 220px;
height: 286px;
top: 50%;
left: 50%;
margin-top: -298px;
margin-left: -260px;
position: absolute;
border: 1px solid silver;
background-color: white;
	z-index:9998;
	

}

			
	#botao{
	position: absolute;
	top: 50%;
	left: 50%;
		width: 30px;
		height: 30px;
        margin-top: -220px;
margin-left: -172px;
	z-index:99999;
		
	}
	
			
	#botao1{
	position: absolute;
    width: 30px;
		height: 30px;
top: 50%;
left: 50%;
margin-top: -316px;
margin-left: -280px;
position: absolute;
	z-index:99999;
		
	}
		
		.button {
    display: inline-block;
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    background-color: #538fbe;
    padding: 8px 20px;
    font-size: 11px;
    border: 1px solid #2d6898;
 
    background-image: -webkit-gradient(
        linear,
        left bottom,
        left top,
        color-stop(0, rgb(73,132,180)),
        color-stop(1, rgb(97,155,203))
    );

    text-shadow: 0px -1px 0px rgba(0,0,0,.5);
 
			cursor: pointer;
}
		
		
</style>


<div id="Pagina" style="display: none;">
	  
   <div id="botao"><a href="javascript:void(0); " onclick="window.location.reload();" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
    <iframe name="pag1" frameborder="0" id="pag1" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
   <iframe name="pag2" src="" frameborder=0 id="pag2" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
</div>           



<div id="Pagina1" style="display: none;">
	  
   <div id="botao1"><a href="#" onclick="fecha_foto();" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
    <iframe name="pag1x" frameborder="0" id="pag1x" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
   <iframe name="pag2x" src="" frameborder=0 id="pag2x" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
</div>           




</body>
</html>