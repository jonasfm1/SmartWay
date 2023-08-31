<?php

include ('session.php');
include ('conecta.php');
ini_set('max_execution_time',12000);


$id_login = $_GET["id_login"]; 
$id_data = $_GET["id_data"];
$id_lista = $_GET["id_lista"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='300;URL=#'>";
?>
<title>::. MONITORAMENTO .:: CADD</title>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src='https://momentjs.com/downloads/moment.min.js'></script>


<script>

		
function openNav() {
  document.getElementById("mySidenav").style.width = "460px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
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
	
	
	//  document.getElementById("off_alerta").style.display = "none";
	
	
	 
})
</script>


<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/step4.css">

 <link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
    </script> 
<style type="text/css">

   
.labels_1 {
     color: white;
     background-color: #F80004;
     font-family: Arial, Helvetica, sans-serif;
     font-size: 10px;
     text-align: center;
     width: auto;
	 height:auto;
     white-space: nowrap;
	 border: 2px solid #F80004;
	 line-height:20px;
	 text-transform:uppercase;
	
	 padding-left:5px;
	 padding-right:5px;
	
   }
   


.labels_2 {
     color: white;
     background-color: #32cd32;
     font-family: Arial, Helvetica, sans-serif;
     font-size: 10px;
     text-align: center;
     width: auto;
	 height:auto;
     white-space: nowrap;
	 border: 2px solid #32cd32;
	 line-height:20px;
	 text-transform:uppercase;
	
	 padding-left:5px;
	 padding-right:5px;
	
   }
 
   .labels_3 {
     color: white;
     background-color: orange;
     font-family: Arial, Helvetica, sans-serif;
     font-size: 10px;
     text-align: center;
     width: auto;
	 height:auto;
     white-space: nowrap;
	 border: 2px solid orange;
	 line-height:20px;
	 text-transform:uppercase;
	
	 padding-left:5px;
	 padding-right:5px;
	
   }

</style>
<script src="https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/src/markerclusterer.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $chave; ?>&sensor=false&language=pt-BR&amp;libraries=places"></script>



    <script src="js/jquery.geocomplete.js"></script>
    <script src="js/logger.js"></script>

<script LANGUAGE="JavaScript">


	function mostraDIV(){
		document.getElementById("off_alerta").style.display = "block";
		//alert("testes");
	}
	

function MarkerLabel_(marker, crossURL, handCursorURL) {
  this.marker_ = marker;
  this.handCursorURL_ = marker.handCursorURL;

  this.labelDiv_ = document.createElement("div");
  this.labelDiv_.style.cssText = "position: absolute; overflow: hidden;";


  this.eventDiv_ = document.createElement("div");
  this.eventDiv_.style.cssText = this.labelDiv_.style.cssText;

  // This is needed for proper behavior on MSIE:
  this.eventDiv_.setAttribute("onselectstart", "return false;");
  this.eventDiv_.setAttribute("ondragstart", "return false;");

  // Get the DIV for the "X" to be displayed when the marker is raised.
  this.crossDiv_ = MarkerLabel_.getSharedCross(crossURL);
}

// MarkerLabel_ inherits from OverlayView:
MarkerLabel_.prototype = new google.maps.OverlayView();


MarkerLabel_.getSharedCross = function (crossURL) {
  var div;
  if (typeof MarkerLabel_.getSharedCross.crossDiv === "undefined") {
    div = document.createElement("img");
    div.style.cssText = "position: absolute; z-index: 1000002; display: none;";
    // Hopefully Google never changes the standard "X" attributes:
    div.style.marginLeft = "-8px";
    div.style.marginTop = "-9px";
    div.src = crossURL;
    MarkerLabel_.getSharedCross.crossDiv = div;
  }
  return MarkerLabel_.getSharedCross.crossDiv;
};


MarkerLabel_.prototype.onAdd = function () {
  var me = this;
  var cMouseIsDown = false;
  var cDraggingLabel = false;
  var cSavedZIndex;
  var cLatOffset, cLngOffset;
  var cIgnoreClick;
  var cRaiseEnabled;
  var cStartPosition;
  var cStartCenter;
  // Constants:
  var cRaiseOffset = 20;
  var cDraggingCursor = "url(" + this.handCursorURL_ + ")";

  // Stops all processing of an event.
  //
  var cAbortEvent = function (e) {
    if (e.preventDefault) {
      e.preventDefault();
    }
    e.cancelBubble = true;
    if (e.stopPropagation) {
      e.stopPropagation();
    }
  };

  var cStopBounce = function () {
    me.marker_.setAnimation(null);
  };

  this.getPanes().overlayImage.appendChild(this.labelDiv_);
  this.getPanes().overlayMouseTarget.appendChild(this.eventDiv_);
  // One cross is shared with all markers, so only add it once:
  if (typeof MarkerLabel_.getSharedCross.processed === "undefined") {
    this.getPanes().overlayImage.appendChild(this.crossDiv_);
    MarkerLabel_.getSharedCross.processed = true;
  }

  this.listeners_ = [
    google.maps.event.addDomListener(this.eventDiv_, "mouseover", function (e) {
      if (me.marker_.getDraggable() || me.marker_.getClickable()) {
        this.style.cursor = "pointer";
        google.maps.event.trigger(me.marker_, "mouseover", e);
      }
    }),
    google.maps.event.addDomListener(this.eventDiv_, "mouseout", function (e) {
      if ((me.marker_.getDraggable() || me.marker_.getClickable()) && !cDraggingLabel) {
        this.style.cursor = me.marker_.getCursor();
        google.maps.event.trigger(me.marker_, "mouseout", e);
      }
    }),
    google.maps.event.addDomListener(this.eventDiv_, "mousedown", function (e) {
      cDraggingLabel = false;
      if (me.marker_.getDraggable()) {
        cMouseIsDown = true;
        this.style.cursor = cDraggingCursor;
      }
      if (me.marker_.getDraggable() || me.marker_.getClickable()) {
        google.maps.event.trigger(me.marker_, "mousedown", e);
        cAbortEvent(e); // Prevent map pan when starting a drag on a label
      }
    }),
    google.maps.event.addDomListener(document, "mouseup", function (mEvent) {
      var position;
      if (cMouseIsDown) {
        cMouseIsDown = false;
        me.eventDiv_.style.cursor = "pointer";
        google.maps.event.trigger(me.marker_, "mouseup", mEvent);
      }
      if (cDraggingLabel) {
        if (cRaiseEnabled) { // Lower the marker & label
          position = me.getProjection().fromLatLngToDivPixel(me.marker_.getPosition());
          position.y += cRaiseOffset;
          me.marker_.setPosition(me.getProjection().fromDivPixelToLatLng(position));
          // This is not the same bouncing style as when the marker portion is dragged,
          // but it will have to do:
          try { // Will fail if running Google Maps API earlier than V3.3
            me.marker_.setAnimation(google.maps.Animation.BOUNCE);
            setTimeout(cStopBounce, 1406);
          } catch (e) {}
        }
        me.crossDiv_.style.display = "none";
        me.marker_.setZIndex(cSavedZIndex);
        cIgnoreClick = true; // Set flag to ignore the click event reported after a label drag
        cDraggingLabel = false;
        mEvent.latLng = me.marker_.getPosition();
        google.maps.event.trigger(me.marker_, "dragend", mEvent);
      }
    }),
    google.maps.event.addListener(me.marker_.getMap(), "mousemove", function (mEvent) {
      var position;
      if (cMouseIsDown) {
        if (cDraggingLabel) {
          // Change the reported location from the mouse position to the marker position:
          mEvent.latLng = new google.maps.LatLng(mEvent.latLng.lat() - cLatOffset, mEvent.latLng.lng() - cLngOffset);
          position = me.getProjection().fromLatLngToDivPixel(mEvent.latLng);
          if (cRaiseEnabled) {
            me.crossDiv_.style.left = position.x + "px";
            me.crossDiv_.style.top = position.y + "px";
            me.crossDiv_.style.display = "";
            position.y -= cRaiseOffset;
          }
          me.marker_.setPosition(me.getProjection().fromDivPixelToLatLng(position));
          if (cRaiseEnabled) { // Don't raise the veil; this hack needed to make MSIE act properly
            me.eventDiv_.style.top = (position.y + cRaiseOffset) + "px";
          }
          google.maps.event.trigger(me.marker_, "drag", mEvent);
        } else {
          // Calculate offsets from the click point to the marker position:
          cLatOffset = mEvent.latLng.lat() - me.marker_.getPosition().lat();
          cLngOffset = mEvent.latLng.lng() - me.marker_.getPosition().lng();
          cSavedZIndex = me.marker_.getZIndex();
          cStartPosition = me.marker_.getPosition();
          cStartCenter = me.marker_.getMap().getCenter();
          cRaiseEnabled = me.marker_.get("raiseOnDrag");
          cDraggingLabel = true;
          me.marker_.setZIndex(1000000); // Moves the marker & label to the foreground during a drag
          mEvent.latLng = me.marker_.getPosition();
          google.maps.event.trigger(me.marker_, "dragstart", mEvent);
        }
      }
    }),
    google.maps.event.addDomListener(document, "keydown", function (e) {
      if (cDraggingLabel) {
        if (e.keyCode === 27) { // Esc key
          cRaiseEnabled = false;
          me.marker_.setPosition(cStartPosition);
          me.marker_.getMap().setCenter(cStartCenter);
          google.maps.event.trigger(document, "mouseup", e);
        }
      }
    }),
    google.maps.event.addDomListener(this.eventDiv_, "click", function (e) {
      if (me.marker_.getDraggable() || me.marker_.getClickable()) {
        if (cIgnoreClick) { // Ignore the click reported when a label drag ends
          cIgnoreClick = false;
        } else {
          google.maps.event.trigger(me.marker_, "click", e);
          cAbortEvent(e); // Prevent click from being passed on to map
        }
      }
    }),
    google.maps.event.addDomListener(this.eventDiv_, "dblclick", function (e) {
      if (me.marker_.getDraggable() || me.marker_.getClickable()) {
        google.maps.event.trigger(me.marker_, "dblclick", e);
        cAbortEvent(e); // Prevent map zoom when double-clicking on a label
      }
    }),
    google.maps.event.addListener(this.marker_, "dragstart", function (mEvent) {
      if (!cDraggingLabel) {
        cRaiseEnabled = this.get("raiseOnDrag");
      }
    }),
    google.maps.event.addListener(this.marker_, "drag", function (mEvent) {
      if (!cDraggingLabel) {
        if (cRaiseEnabled) {
          me.setPosition(cRaiseOffset);

          me.labelDiv_.style.zIndex = 1000000 + (this.get("labelInBackground") ? -1 : +1);
        }
      }
    }),
    google.maps.event.addListener(this.marker_, "dragend", function (mEvent) {
      if (!cDraggingLabel) {
        if (cRaiseEnabled) {
          me.setPosition(0); // Also restores z-index of label
        }
      }
    }),
    google.maps.event.addListener(this.marker_, "position_changed", function () {
      me.setPosition();
    }),
    google.maps.event.addListener(this.marker_, "zindex_changed", function () {
      me.setZIndex();
    }),
    google.maps.event.addListener(this.marker_, "visible_changed", function () {
      me.setVisible();
    }),
    google.maps.event.addListener(this.marker_, "labelvisible_changed", function () {
      me.setVisible();
    }),
    google.maps.event.addListener(this.marker_, "title_changed", function () {
      me.setTitle();
    }),
    google.maps.event.addListener(this.marker_, "labelcontent_changed", function () {
      me.setContent();
    }),
    google.maps.event.addListener(this.marker_, "labelanchor_changed", function () {
      me.setAnchor();
    }),
    google.maps.event.addListener(this.marker_, "labelclass_changed", function () {
      me.setStyles();
    }),
    google.maps.event.addListener(this.marker_, "labelstyle_changed", function () {
      me.setStyles();
    })
  ];
};


MarkerLabel_.prototype.onRemove = function () {
  var i;
  this.labelDiv_.parentNode.removeChild(this.labelDiv_);
  this.eventDiv_.parentNode.removeChild(this.eventDiv_);

  // Remove event listeners:
  for (i = 0; i < this.listeners_.length; i++) {
    google.maps.event.removeListener(this.listeners_[i]);
  }
};


MarkerLabel_.prototype.draw = function () {
  this.setContent();
  this.setTitle();
  this.setStyles();
};

MarkerLabel_.prototype.setContent = function () {
  var content = this.marker_.get("labelContent");
  if (typeof content.nodeType === "undefined") {
    this.labelDiv_.innerHTML = content;
    this.eventDiv_.innerHTML = this.labelDiv_.innerHTML;
  } else {
    this.labelDiv_.innerHTML = ""; // Remove current content
    this.labelDiv_.appendChild(content);
    content = content.cloneNode(true);
    this.eventDiv_.appendChild(content);
  }
};


MarkerLabel_.prototype.setTitle = function () {
  this.eventDiv_.title = this.marker_.getTitle() || "";
};


MarkerLabel_.prototype.setStyles = function () {
  var i, labelStyle;

  // Apply style values from the style sheet defined in the labelClass parameter:
  this.labelDiv_.className = this.marker_.get("labelClass");
  this.eventDiv_.className = this.labelDiv_.className;

  // Clear existing inline style values:
  this.labelDiv_.style.cssText = "";
  this.eventDiv_.style.cssText = "";
  // Apply style values defined in the labelStyle parameter:
  labelStyle = this.marker_.get("labelStyle");
  for (i in labelStyle) {
    if (labelStyle.hasOwnProperty(i)) {
      this.labelDiv_.style[i] = labelStyle[i];
      this.eventDiv_.style[i] = labelStyle[i];
    }
  }
  this.setMandatoryStyles();
};


MarkerLabel_.prototype.setMandatoryStyles = function () {
  this.labelDiv_.style.position = "absolute";
  this.labelDiv_.style.overflow = "hidden";
  // Make sure the opacity setting causes the desired effect on MSIE:
  if (typeof this.labelDiv_.style.opacity !== "undefined" && this.labelDiv_.style.opacity !== "") {
    this.labelDiv_.style.MsFilter = "\"progid:DXImageTransform.Microsoft.Alpha(opacity=" + (this.labelDiv_.style.opacity * 100) + ")\"";
    this.labelDiv_.style.filter = "alpha(opacity=" + (this.labelDiv_.style.opacity * 100) + ")";
  }

  this.eventDiv_.style.position = this.labelDiv_.style.position;
  this.eventDiv_.style.overflow = this.labelDiv_.style.overflow;
  this.eventDiv_.style.opacity = 0.01; // Don't use 0; DIV won't be clickable on MSIE
  this.eventDiv_.style.MsFilter = "\"progid:DXImageTransform.Microsoft.Alpha(opacity=1)\"";
  this.eventDiv_.style.filter = "alpha(opacity=1)"; // For MSIE

  this.setAnchor();
  this.setPosition(); // This also updates z-index, if necessary.
  this.setVisible();
};


MarkerLabel_.prototype.setAnchor = function () {
  var anchor = this.marker_.get("labelAnchor");
  this.labelDiv_.style.marginLeft = -anchor.x + "px";
  this.labelDiv_.style.marginTop = -anchor.y + "px";
  this.eventDiv_.style.marginLeft = -anchor.x + "px";
  this.eventDiv_.style.marginTop = -anchor.y + "px";
};


MarkerLabel_.prototype.setPosition = function (yOffset) {
  var position = this.getProjection().fromLatLngToDivPixel(this.marker_.getPosition());
  if (typeof yOffset === "undefined") {
    yOffset = 0;
  }
  this.labelDiv_.style.left = Math.round(position.x) + "px";
  this.labelDiv_.style.top = Math.round(position.y - yOffset) + "px";
  this.eventDiv_.style.left = this.labelDiv_.style.left;
  this.eventDiv_.style.top = this.labelDiv_.style.top;

  this.setZIndex();
};

MarkerLabel_.prototype.setZIndex = function () {
  var zAdjust = (this.marker_.get("labelInBackground") ? -1 : +1);
  if (typeof this.marker_.getZIndex() === "undefined") {
    this.labelDiv_.style.zIndex = parseInt(this.labelDiv_.style.top, 10) + zAdjust;
    this.eventDiv_.style.zIndex = this.labelDiv_.style.zIndex;
  } else {
    this.labelDiv_.style.zIndex = this.marker_.getZIndex() + zAdjust;
    this.eventDiv_.style.zIndex = this.labelDiv_.style.zIndex;
  }
};

/**
 * Sets the visibility of the label. The label is visible only if the marker itself is
 * visible (i.e., its visible property is true) and the labelVisible property is true.
 * @private
 */
MarkerLabel_.prototype.setVisible = function () {
  if (this.marker_.get("labelVisible")) {
    this.labelDiv_.style.display = this.marker_.getVisible() ? "block" : "none";
  } else {
    this.labelDiv_.style.display = "none";
  }
  this.eventDiv_.style.display = this.labelDiv_.style.display;
};

function MarkerWithLabel(opt_options) {
  opt_options = opt_options || {};
  opt_options.labelContent = opt_options.labelContent || "";
  opt_options.labelAnchor = opt_options.labelAnchor || new google.maps.Point(0, 0);
  opt_options.labelClass = opt_options.labelClass || "markerLabels";
  opt_options.labelStyle = opt_options.labelStyle || {};
  opt_options.labelInBackground = opt_options.labelInBackground || false;
  if (typeof opt_options.labelVisible === "undefined") {
    opt_options.labelVisible = true;
  }
  if (typeof opt_options.raiseOnDrag === "undefined") {
    opt_options.raiseOnDrag = true;
  }
  if (typeof opt_options.clickable === "undefined") {
    opt_options.clickable = true;
  }
  if (typeof opt_options.draggable === "undefined") {
    opt_options.draggable = false;
  }
  if (typeof opt_options.optimized === "undefined") {
    opt_options.optimized = false;
  }
  opt_options.crossImage = opt_options.crossImage || "http" + (document.location.protocol === "https:" ? "s" : "") + "://maps.gstatic.com/intl/en_us/mapfiles/drag_cross_67_16.png";
  opt_options.handCursor = opt_options.handCursor || "http" + (document.location.protocol === "https:" ? "s" : "") + "://maps.gstatic.com/intl/en_us/mapfiles/closedhand_8_8.cur";
  opt_options.optimized = false; // Optimized rendering is not supported

  this.label = new MarkerLabel_(this, opt_options.crossImage, opt_options.handCursor); // Bind the label to the marker

  // Call the parent constructor. It calls Marker.setValues to initialize, so all
  // the new parameters are conveniently saved and can be accessed with get/set.
  // Marker.set triggers a property changed event (called "propertyname_changed")
  // that the marker label listens for in order to react to state changes.
  google.maps.Marker.apply(this, arguments);
}

// MarkerWithLabel inherits from <code>Marker</code>:
MarkerWithLabel.prototype = new google.maps.Marker();

/**
 * Overrides the standard Marker setMap function.
 * @param {Map} theMap The map to which the marker is to be added.
 * @private
 */
MarkerWithLabel.prototype.setMap = function (theMap) {

  // Call the inherited function...
  google.maps.Marker.prototype.setMap.apply(this, arguments);

  // ... then deal with the label:
  this.label.setMap(theMap);
};

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

function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir este cliente?')) {

location.href = aURL;

//target=ver;

}
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


</SCRIPT>

</head>
<div class="jquery-waiting-base-container">
<body>

 
</div>
<div id="div_titulo">
	  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>

     	   <td align="left" valign="middle"><font size="3">RASTROS</font></td>
     
		
    </tr>
</table>

	</div>
<?php 

include ('base_cad_n.php');

date_default_timezone_set('Etc/GMT+3');






if($user==$logado){
  $user = '%%';
  }
  
  if($_GET["id_login"]!=''){
  $pega_login = $_GET["id_login"];
  }
  else{
  $pega_login = '%%';
  }
  
  
  if($_GET["id_data"]!=''){
  $pega_rota = $_GET["id_data"];
  }else{
  $pega_rota = '%%';
  }
  
  
  if($_GET["id_lista"]!=''){
    $pega_lista = $_GET["id_lista"];
    }else{
    $pega_lista = '%%';
    }
  
	
?> 

<div id="mySidenav" class="sidenav">
  
<div class="div" id="div" name="div">



<br><br>
	<br><br>
  

    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-top: 25px; padding-bottom: 8px; width:370px" >
    <form name='theForm' id='theForm'>
		<tr>
			
	
            <td align="left" valign="middle" nowrap="nowrap" style="width:350px;color:#000000;">
           
            <strong><font size="4">&nbsp;FILTRAR RASTRO</font></strong>
            </td>
	   </tr>
    </table>
 
   <hr size = 1 width = '160px' color="#DCDCDC">
    <br>
		<table border="0" width="350px" cellpadding="0" cellspacing="0" style="text-align: left; padding-left:20px; padding-right:30px;" class="tabela">
            <tr height="45px">

    <td nowrap="nowrap">
    
<font size="2" style="text-align: left"><strong>LOGIN</strong></font>

    </td>
    </tr>
    <tr>

    <td nowrap="nowrap">

    <select name="id_login" style="width:370px">
  <option value="">LOGIN</option>
  <?php 

$query3 = "select * from usuario where nivel=2 order by login";

//	$query3 = "select rotas.* from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.nivel=2 GROUP BY rotas.login order by rotas.login";				
	
	//$query3 = "SELECT usuario.login FROM rastro INNER JOIN usuario ON rastro.login = usuario.login GROUP BY usuario.login, usuario.nivel HAVING (((usuario.nivel)=2) OR ((usuario.nivel)=3)) INNER JOIN rotas ON rastro.login=rotas.login GROUP BY rotas.login, rotas.coordenador HAVING (((usuario.coordenador)=$user))";
	
	//$query3 = "SELECT Rastro.login, Usuario.nivel, Rotas.coordenador FROM Rastro INNER JOIN (Usuario INNER JOIN Rotas ON Usuario.login = Rotas.login) ON Rastro.login = Usuario.login GROUP BY Rastro.login, Usuario.nivel, Rotas.coordenador HAVING (((Usuario.nivel)<>'1'))";
	
	
									
	$rs3 = mysql_query($query3);
	while($row3 = mysql_fetch_array($rs3)){
	$id_login = $row3["login"];
	?>
    
    <?php 
	if ($pega_login== $id_login){
	?>
    <option selected value="<?= $id_login ?>"><?= strtoupper($id_login) ?></option>
    <?php }
	
	else {
		?>
    <option value="<?= $id_login ?>"><?= strtoupper($id_login) ?></option>
    <?php
		}
    ?>
    <?php
	}
  ?>
  </select>	
</td>
    
    <tr  height="45px">

    <td nowrap="nowrap">
  
    <font size="2"><strong>DATA</strong></font>
  
    </td>
    </tr>
    <tr>

     
<td width="100%" valign="middle">
  
  
  
  <select name="id_data" style="width:100%">
    <option value="">DATA</option>
    <?php 
//$query3 = "select * from rastro WHERE login='$pega_login' GROUP BY day limit 31";	
$query3 = "select * from rastro WHERE login='$pega_login' GROUP BY day order by day DESC limit 30";	
                    
$rs3 = mysql_query($query3);

          
while($row3 = mysql_fetch_array($rs3)){
//$timestamp = strtotime($row3["dth2"]); 
//  $id_data = date('d-m-Y', $timestamp);
$id_data = $row3["day"];

$id_data_portuga = strtotime($id_data); 
$id_data_portuga = date('d-m-Y', $id_data_portuga);
?>
    <?php 

// echo $pega_data;
//  echo $id_data;
// echo "teste";


if ($pega_rota == $id_data){
?>
    <option selected value="<?= $id_data ?>"><?= $id_data_portuga ?></option>
    <?php }

else {
?>
    <option value="<?= $id_data ?>"><?= $id_data_portuga ?></option>
    <?php
}

}
?>
    </select>	
  
</td>

</tr>

<tr  height="45px">

<td nowrap="nowrap">

<font size="2"><strong>LISTA</strong></font>

</td>
</tr>

 

<tr>

     
<td width="100%" valign="middle">
  
  
  
  <select name="id_lista" style="width:100%">
    <option value="">LISTA</option>
    <?php 
	
$query4 = "select * from rotas WHERE login='$pega_login' group by lista order by id DESC";	
                    
$rs4 = mysql_query($query4);

          
while($row4 = mysql_fetch_array($rs4)){

$id_lista = $row4["lista"];


?>
    <?php 

// echo $pega_data;
//  echo $id_data;
// echo "teste";


if ($pega_lista == $id_lista){
?>
    <option selected value="<?= $id_lista ?>"><?= $id_lista ?></option>
    <?php }

else {
?>
    <option value="<?= $id_lista ?>"><?= $id_lista ?></option>
    <?php
}

}
?>
    </select>	
  
</td>
</tr>

<tr height="75px">
        <td width="100%" valign="middle"><input type="submit" value="APLICAR FILTRO"></td>  
      
        </tr>

</table>

<br><br>
  


  
    <br><hr size = 1 width = '4000px' color="#d3d5d6" style="height: 2px;"><br>
    
    

    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-top: 25px; padding-bottom: 8px; width:360px" >
		<tr>
			
		
            <td align="left" valign="middle" nowrap="nowrap" style="width:360px; color:#000000;">
            <strong><font size="4">&nbsp;CONTROLE DE USUÁRIOS</font></strong>
            </td>
	   </tr>
    </table>
   <hr size = 1 width = '226px' color="#DCDCDC"><br><br>
		<table border="0" width="auto" cellpadding="0" cellspacing="0" style="text-align: left; padding-left:20px" class="tabela">
            <tr>

    <td nowrap="nowrap">
  

    </td>
    </tr>

    </table>

    <div id="capaefectos" style="background-color: #FFF; color:fff;">


<div id="online_scroll"> 
     
  <table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#ffffff">
  <tbody>
  
 <?php
  
  
 $visivel = 0;
 
 $query_rotas = "SELECT * from usuario where nivel=2 order by login ASC";
 $rs_rotas = mysql_query($query_rotas);
 
  while($row_rotas = mysql_fetch_array($rs_rotas)){
	  
 $nome_rotas = $row_rotas["login"];	  
 
 $query_online = "SELECT login, Max(CONCAT(day,' ', dth)) AS Ultimo_Rastro FROM rastro WHERE login='$nome_rotas' GROUP BY login ORDER BY Ultimo_Rastro DESC"; 
 $rs_online = mysql_query($query_online);
	
 ?>


 

  <?php
  while($row_online = mysql_fetch_array($rs_online)){

  $nome1 = $row_online["login"];
  $data1 = $row_online["Ultimo_Rastro"];

  //$hour1 = $row_online["Hora"];
  $hoje = date('Y-m-d H:i:s', time());

  //echo $data1 . "<br>";
  //echo $hoje . "<br>";
 // echo  $nome1 . " - " . $data1. " - " . $hoje .  "<br>";
  
  $compara_hora = date_diff(date_create($hoje), date_create($data1))->format('%Y ano(s) %M mês(es) %D dia(s) - %H:%I:%S'); 
 
  ?>

    <tr>
       <?php 
    //VERMELHO
	  if($compara_hora >= '00 ano(s) 00 mês(es) 01 dia(s) - 00:00:00'){
      $visivel = 1;
      $status_icon = "#C00";

	  } 
	  //LARANJA
	  else if($compara_hora >= '00 ano(s) 00 mês(es) 00 dia(s) - 00:15:51'){
     
      $status_icon = "#F90";
		 

	  } 
	  //VERDE
	  else if($compara_hora < '00 ano(s) 00 mês(es) 00 dia(s) - 00:15:50'){
    
      $status_icon = "#5cbc69";
	
	    }
	  
    ?>
     <td width="15" align="center" style="background-color: <?php echo $status_icon; ?>" >  
  </td>
      <td width="100" style="padding-left: 5px;"><font size="2"><?php echo  strtoupper($nome1); ?></font></td>

      <td width="220" align="left"><font size="2"><?php echo $compara_hora; ?></font></td>
    </tr>


<?php
 	}
 }
 
?>
    </tbody>
</table>

  </div>
  </div>  
  <br><br><br><hr size = 1  width = '450px' color="#d3d5d6" style="height: 2px;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>
	



</div>


  </div>  
 
 
  

    
    
  
<div id="apDiv12">

<?php


$today = date("Y-m-d");  

$query_rotas3 = "SELECT rotas.* from rotas INNER JOIN usuario ON rotas.login=usuario.login GROUP BY rotas.login";
$rs_rotas3 = mysql_query($query_rotas3);


if ($pega_rota!='%%' and $pega_login!='%%'){	

//$query = "select * from rastro where dth >='07:00:00' AND dth <='19:00:00' AND login='$pega_login' and day ='$pega_rota' ORDER BY day, dth DESC";

//$query = "select * from rastro where login LIKE '$pega_login' AND day LIKE '$pega_rota' ORDER BY day, dth DESC";

$query = "select *, CONCAT(day,' ', dth) AS Ultimo_Rastro from rastro where login LIKE '$pega_login' AND day LIKE '$pega_rota' ORDER BY day, dth DESC";




//echo "Data:".$pega_data." Login:".$pega_login."  (".$total.") registros";
} 

if ($pega_rota=='%%' and $pega_login!='%%'){	

//$query = "select * from rastro where login='$pega_login' and day='$today'";

$query = "select *, CONCAT(day,' ', dth) AS Ultimo_Rastro FROM rastro where login LIKE '$pega_login' ORDER BY id DESC limit 1";


}

if ($pega_rota=='%%' and $pega_login=='%%'){	

  
//$query = "SELECT MAX(r1.id), r1.x, r1.y, MAX(r1.day) AS day, r1.login, Max(CONCAT(r1.day,' ', r1.dth)) AS Ultimo_Rastro FROM rastro r1 INNER JOIN usuario ON usuario.login = r1.login WHERE r1.id = (SELECT max(r2.id) FROM rastro r2 WHERE r2.login = r1.login) AND usuario.nivel>0";
  
//$query = "SELECT id, x, y, day, login, CONCAT(day,' ', dth) AS Ultimo_Rastro FROM rastro GROUP BY login order by id DESC";

 //$query = "SELECT r1.* FROM rastro r1 WHERE r1.id = (SELECT max(r2.id) FROM rastro r2 WHERE r2.login = r1.login)";

$query = "SELECT CONCAT(r1.day,' ', r1.dth) AS Ultimo_Rastro, r1.id, r1.x, r1.y, r1.dth, r1.login, r1.day, usuario.coordenador, usuario.login FROM rastro r1 INNER JOIN usuario ON usuario.login = r1.login WHERE r1.id = (SELECT max(r2.id) FROM rastro r2 WHERE r2.login = r1.login) AND usuario.nivel=2";


 }

 

$rs = mysql_query($query);
$total = mysql_num_rows($rs);



if ($total==0){
echo "<font size='2' style='line-height:70px;'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FILTRAGEM VAZIA!</strong></font>";
	
} else {

  $i = 0;
	$lat_cad[]=null;
	$lng_cad[]=null; 
	$login[]=null;
	$usuario_x[]=null;
	$data[]=null;
	$data_formatada[]=null;
	$hora[]=null;
	
	//////////////////////////////////
	while($row = mysql_fetch_array($rs)){

		$lat_cad[$i] = $row["y"];
		$lng_cad[$i] = $row["x"];
		$data[$i] = $row["day"];
		$hora[$i] = $row["Ultimo_Rastro"];
    
		$timestamp = strtotime($row["day"]);
		$data_formatada[$i] = date('d/m/Y', $timestamp);
		$usuario_x[$i] = $row["login"];
		$login[$i] = strtoupper($row["login"]);	
		$i++; 
			
	}


}
?>

</div>
                                   
<script type="text/javascript">


	 
  var map = new google.maps.Map(document.getElementById('apDiv12'), {
       zoom: 10,
	   styles: styles,
       //center: new google.maps.LatLng(<?php echo $lat_cad[$i]?>, <?php echo $lng_cad[$i]?>),
   //    mapTypeId: google.maps.MapTypeId.ROADMAP
	   
	      mapTypeControl: true,
          mapTypeControlOptions: {
              style: styles,
              position: google.maps.ControlPosition.BOTTOM_CENTER
          },
          zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.RIGHT_CENTER
          },
          scaleControl: true,
          streetViewControl: true,
          streetViewControlOptions: {
          position: google.maps.ControlPosition.BOTTOM_CENTER
	
          },
    });

 				map.get('streetView').setOptions({
               addressControlOptions: { 
                 position: google.maps.ControlPosition.BOTTOM_CENTER,
               },
               zoomControlOptions: {
                 position: google.maps.ControlPosition.RIGHT_CENTER
               },
               panControlOptions: {
                 position: google.maps.ControlPosition.RIGHT_BOTTOM
               },
			  fullscreenControl: false
            })
			
  
  var infowindow = new google.maps.InfoWindow();
	var bounds = new google.maps.LatLngBounds();
  var marker, i;
	var markers = [];
  var x, y, nome;
	
	 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		google.maps.event.addListener(map, 'click', function() {infowindow.close();});
	  	google.maps.event.addListener(infowindow, 'domready', function() {;
		var iwOuter = $('.gm-style-iw');
		var iwBackground = iwOuter.prev();
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   		iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		});
	    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	var locations = [ 
	  <?php  
	  $i--; 
	  
 while($i > 0){
	  ?>['<?php echo $login[$i]?>',<?php echo $lat_cad[$i]?>,<?php echo $lng_cad[$i]?>,<?php echo $i?>,'<?php echo $usuario_x[$i]?>','<?php echo $data_formatada[$i]?>','<?php echo $hora[$i]?>'], 
	   <?php $i--; ?>
	   <?php }?>
      ['<?php echo $login[$i]?>',<?php echo $lat_cad[$i]?>,<?php echo $lng_cad[$i]?>,<?php echo $i?>,'<?php echo $usuario_x[$i]?>','<?php echo $data_formatada[$i]?>','<?php echo $hora[$i]?>']
    ];

	<?php 
		if ($pega_rota=='%%' and $pega_login=='%%' OR $pega_rota=='%%' and $pega_login!='%%'){

			//$icon = 'labels_2';	
			$localizacao = 'locations[i][0]';
			?>	
		
let data = new Date();
const today = new Date();
const mes = today.getMonth() + 1;
let todayMonth;

		 for (i = 0; i < locations.length; i++) { 
	
      var time1 = locations[i][6];

const today = new Date();
const mes = today.getMonth()+1;
let todayMonth;
if (mes < 10) {
  todayMonth = '0' + mes;
} else {
  todayMonth = mes.toString();
}


//  alert(todayMonth);




//var time2 = data.getDate() + "-" + todayMonth + "-" + data.getFullYear() + ' ' + data.getHours() + ':' + data.getMinutes() + ':' + data.getSeconds();


var time2 =  data.getFullYear() + "-" + todayMonth + "-" +data.getDate() + ' ' + data.getHours() + ':' + data.getMinutes() + ':' + data.getSeconds();

     
//alert(time1);
//alert(time2);

var diff = moment(time2,"YYYY/MM/DD HH:mm:ss").diff(moment(time1,"YYYY/MM/DD HH:mm:ss"));
var dias = moment.duration(diff).asDays();


//alert(dias);

if(dias<=0.011){
label = 'labels_2';
icon= 'imgs/on_line_ok.gif'
} else if( dias>0.011 && dias <=1) {
label = 'labels_3';
icon= 'imgs/off_line_orange.gif'
} else if(dias>1) {
label = 'labels_1';
icon= 'imgs/off_line_ok.gif'
}




		ii = i + 1;
		var locate = new google.maps.LatLng(parseFloat(locations[i][1]), parseFloat(locations[i][2])); 
    marker = new MarkerWithLabel({
    position: locate,
    map: map,
		optimized: true,
		clickable: true,	
		icon: icon,	
		labelContent: <?php echo $localizacao; ?>,
  	labelAnchor: new google.maps.Point(8, 38),
    labelClass: label, // the CSS class for the label
		labelInBackground: true,
		labelStyle: {opacity: 0.90}
		
      });
	
	
	  bounds.extend(marker.getPosition());
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
		  
		  var content_rastro = '<div id="iw_container1"><div class="iw_title1" style="background-color:#579bd3"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_app.png" width="22" height="22"/></td><td align="left">' + locations[i][0] + '</td></tr></table></div>' + 
'<div class="iw_content1"><strong>Data: </strong>' + locations[i][5] + '<br><strong>Hora: </strong>' + locations[i][6] + '</div>' + '</div>';

        return function() {
          infowindow.setContent(content_rastro);
          infowindow.open(map, marker);
        }
		
		
		
      })(marker, i));
	     
	
	   map.fitBounds(bounds);
	   markers.push(marker);
	   
	   
  }





	
			<?php
		} else {

      // login e data


			$icon = 'labels';
			$localizacao = 'ii';	
			?>
	for (i = 0; i < locations.length; i++) { 
	
		ii = i + 1;
		var locate = new google.maps.LatLng(parseFloat(locations[i][1]), parseFloat(locations[i][2])); 
		//alert(locate);
	
      	marker =  marker1 = new google.maps.Marker({
        position: locate,
        map: map,
		//optimized: true,
	//	clickable: true,	
		icon: 'imgs/man_icon.png',
		//labelContent: <?php echo $localizacao;?>,
    //  labelAnchor: new google.maps.Point(12, 34),
   //   labelClass: "<?php echo $icon;?>", // the CSS class for the label
	//	labelInBackground: true,
	//	labelStyle: {opacity: 0.90}
		
		  
      });
		
	
	  bounds.extend(marker.getPosition());
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
		  
		  var content_rastro = '<div id="iw_container1"><div class="iw_title1" style="background-color:#579bd3"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_app.png" width="22" height="22"/></td><td align="left">' + locations[i][0] + '</td></tr></table></div>' + 
'<div class="iw_content1"><strong>Data: </strong>' + locations[i][5] + '<br><strong>Hora: </strong>' + locations[i][6] + '</div>' + '</div>';

        return function() {
          infowindow.setContent(content_rastro);
          infowindow.open(map, marker);
        }
		
      })(marker, i));
	     

	   map.fitBounds(bounds);
	   markers.push(marker);
	   
	   
  }
  
  ///SETA///////////////////////////////////////////////////////////////////
	
	     
		var iconsetngs = {
   		 path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW
		};
		
	   ////////////////////////////////////////////////////////////////////

	 // alert(locations.length);
	  ////////////////////////////////////////////////////////////////////
	  for (ii = 0; ii < locations.length; ii++) { 
	  iii = ii + 1;
		  if(iii != locations.length){
			  
			  	var line_novaordem = new google.maps.Polyline({
   					path: [new google.maps.LatLng(locations[iii][1], locations[iii][2]), new google.maps.LatLng(locations[ii][1], locations[ii][2])],
   					strokeColor: '#000000',
   					strokeOpacity: 1.0,
    	 			strokeWeight: 1,
   	     			map: map,
					icons: [{
         			icon: iconsetngs,
        			offset: '0',
					repeat: '50px'}]
					});	
		  }
	  
	  
	  }
	    
	
	
			<?php
		}
		
		?>	
//alert (locations.length - 10);

	var visitados = [];
	
	
	  
 
//	marker = [];
//	mrktx = [];
//	infowindow = [];
//var mcOptions = {gridSize: 50, maxZoom: 10, imagePath: 'images/m'};
//alert(markers);


//	var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'imgs/m', gridSize: 2, maxZoom: 20});
	
	
//	mc.addMarker(marker, markers);
  // var saifora = $(".fecha");
  <?php
  
 ////DATA/////PONTOS//////////////
$query_pontos = mysql_query("select * from rotas where login='$pega_login' AND lista='$pega_lista'");
$ie= 999999;
//////////////////////////////////
while($row = mysql_fetch_array($query_pontos)){
	
	$nome_cad_pontos[$ie] = $row["rota"];
	$lat_cad_pontos[$ie] = $row["y"];
	$lng_cad_pontos[$ie] = $row["x"];
	$raio[$ie] = $row["raio"];
	$id_darota[$ie] = $row["id"];
	$rastro_true = $row["status"];
	
	
	$testa_tamanho = strlen($row["endereco"]);
	 if ($testa_tamanho>30){
		$var = substr($row["endereco"], 0, 30);
		$var = trim($var) . "...";
	 
	 } else {
		 $var =$row["endereco"];
		 
	}
	
	$nome_tiraaspas= str_replace("'", ' ', $row['nome']);
	
	$cidade_tiraaspas= str_replace("'", ' ', $row['cidade']);
	
	
	
	$linha_tex_infobox = "Rota: ". $row["rota"] . "Seq.: ". $row["sequencia"]." - ".$nome_tiraaspas." (".$row["idcliente"].") ";
	
	$cor_icone= "";
///CONTROLE DOS ICONES E BOX DE INFORMACAO
if ($rastro_true==0){
	$icone_status = "icon_orange";
	$color_box = "F90";
} 
if ($rastro_true==1){
	$icone_status = "icon_green";
	$color_box = "5cbc69";
}
if ($rastro_true==2){
	$icone_status = "icon_red";
	$color_box = "C00";
}
if ($rastro_true==3){
	$icone_status = "icon_black";
	$color_box = "000000";
}	
///CONTROLE DOS ICONES E BOX DE INFORMACAO	
	
	if($rastro_true==0){
		?>
		var content = '<div id="iw_container">' +
      '<div class="iw_title" style="background-color:#<?php echo $color_box ?>"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_realizado.png" width="22" height="22"/></td><td align="left"><?php echo $nome_tiraaspas; ?></td></tr></table></div>' +
      '<div class="iw_content"><strong>Lista: </strong><?php echo $row["lista"]; ?><br><strong>Rota: </strong><?php echo $row["rota"]; ?><br><strong>Sequência: </strong><?php echo $row["sequencia"]; ?><br><strong>Endereço: </strong><?php echo $var; ?><br><strong>Cidade: </strong><?php echo $cidade_tiraaspas . " - " . $row["uf"]; ?><br><strong>Classe: </strong><?php echo $row["classificacao"]; ?><br><strong>T. estimado: </strong><?php echo $row["tempo"]; ?> min.<br><strong>Obs: </strong><?php echo $row["obs"]; ?></div>' +
   	 '</div>';
		<?php
		$cor_icone="";
	} else {
		
	 $id_data_portuga1 = strtotime($row["dth_ocorrencia"]); 
	 $id_data_portuga1 = date('d/m/Y H:i:s', $id_data_portuga1);
	 
	 /////conta tempo real de visita
	  $data_inicio = strtotime($row["dth_ocorrencia"]); 
	 
	 
	 	$oco = $row["ocorrencia"];
		$query_qual = "select * from ocorrencia where id=$oco";														
		$query_qual = mysql_query($query_qual);	
		$dados = mysql_fetch_array($query_qual);

		$ocorrencia = $dados['ocorrencia'];
		
		?>
		var content = '<div id="iw_container">' +
      '<div class="iw_title" style="background-color:#<?php echo $color_box ?>"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_realizado.png" width="22" height="22"/></td><td align="left"><?php echo $nome_tiraaspas; ?></td></tr></table></div>' +
      '<div class="iw_content"><strong>Lista: </strong><?php echo $row["lista"]; ?><br><strong>Rota: </strong><?php echo $row["rota"]; ?><br><strong>Sequência: </strong><?php echo $row["sequencia"]; ?><br><strong>Endereço: </strong><?php echo $var; ?><br><strong>Cidade: </strong><?php echo $cidade_tiraaspas . " - " . $row["uf"]; ?><br><strong>Ocorrência: </strong><?php echo $ocorrencia; ?><br><strong>Data da ocorrência: </strong><?php echo $id_data_portuga1; ?><br><strong>T. estimado: </strong><?php echo $row["tempo"]; ?> min.</div>' +
   	 '</div>';
		<?php
	}

/////VISITADO OU NAO ///////////////
if ($rastro_true==0){
		echo "pointX$ie = new google.maps.LatLng($lat_cad_pontos[$ie],$lng_cad_pontos[$ie]);\n";	
    	echo "mrktxX$ie = \"$linha_tex_infobox\";";
		echo "infowindowX$ie = new google.maps.InfoWindow({content: content});\n";
    	echo "marker$ie = new google.maps.Marker({position: pointX$ie, map: map, title: '$linha_tex_infobox', icon: 'imgs/$icone_status.png',});\n";
		echo "google.maps.event.addListener(marker$ie,
         'click',  function() {
   		     infowindowX$ie.open(map,marker$ie);
          });\n";
		  
		echo "var sunCircle = {
          strokeColor: '#F90',
          strokeOpacity: 0.05,
          strokeWeight: 1,
          fillColor: '#F90',
          fillOpacity: 0.05,
          map: map,
          center: pointX$ie,
          radius: $raio[$ie]
        };\n";
		
		echo "cityCircle = new google.maps.Circle(sunCircle)\n";
		
		
	
    
	
} else {
	
		echo "pointX$ie = new google.maps.LatLng($lat_cad_pontos[$ie],$lng_cad_pontos[$ie]);\n";	
    	echo "mrktxX$ie = \"$linha_tex_infobox\";";
		echo "infowindowX$ie = new google.maps.InfoWindow({content: content});\n";
    	echo "marker$ie = new google.maps.Marker({position: pointX$ie, map: map, title: '$linha_tex_infobox', icon: 'imgs/$icone_status.png',});\n";
		echo "google.maps.event.addListener(marker$ie,
         'click',  function() {
   		     infowindowX$ie.open(map,marker$ie);
          });\n";
		  
		echo "var sunCircle = {
          strokeColor: '#47fa00',
          strokeOpacity: 0.05,
          strokeWeight: 1,
          fillColor: '#47fa00',
          fillOpacity: 0.05,
          map: map,
          center: pointX$ie,
          radius: $raio[$ie]
        };\n";
		
		echo "cityCircle = new google.maps.Circle(sunCircle)\n";
	
	
	
	
}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		echo "google.maps.event.addListener(map, 'click', function() {infowindowX$ie.close();});\n";		
		echo "google.maps.event.addListener(infowindowX$ie, 'domready', function() {\n";
		echo "var iwOuter = $('.gm-style-iw');\n";
		echo "var iwBackground = iwOuter.prev();\n";
		echo "iwBackground.children(':nth-child(2)').css({'display' : 'none'});\n";
   		echo "iwBackground.children(':nth-child(4)').css({'display' : 'none'});\n";	
		echo "iwBackground2.children(':nth-child(1)').css({'display' : 'none'});\n";
		echo "iwBackground2.children(':nth-child(3)').css({'display' : 'none'});});\n";
	    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////VISITADO OU NAO ///////////////
?>
	for (i = 0; i < locations.length; i++) { 
	
	
	distlatLng = new google.maps.LatLng(parseFloat(locations[i][1]), parseFloat(locations[i][2]));


	var latLngBounds = cityCircle.getBounds();
			
			if(latLngBounds.contains(distlatLng)){
				
				visitados.push(<?php echo $id_darota[$ie];?>)
				
     	
			} else {
		
			}

  



	}
/////VISITADO OU NAO ///////////////		

 
<?php
	
	$ie++;
}

 
?>
  
   

  
document.getElementById("dentro").value = visitados;
  
//'(JSON.stringify(visitados, null, 4));
//circle$ie = new google.maps.Circle({map: map, radius: 16093, fillColor: '#AA0000'});
//circle$ie.bindTo('center', marker$ie, 'pointX$ie');

 </script>

<?php

///// LOCALIZACAO DA EMPRESA///
$query_cli = "select * from usuario where login='$logado'";
$rs_cli = mysql_query($query_cli);

$dados = mysql_fetch_array($rs_cli);

$lat = $dados['lat'];
$lgn = $dados['lgn'];

///// LOCALIZACAO DO COLABORADOR///
$query_cli1 = "select * from usuario where login='$pega_login'";
$rs_cli1 = mysql_query($query_cli1);

$dados1 = mysql_fetch_array($rs_cli1);

$lat1 = $dados1['lat'];
$lgn1 = $dados1['lgn'];

?>
<script>


 ///ICONE CASA
	  <?php
 	if ($pega_login!="%%"){
 	  ?>
  
    	
		
	 	marker2 = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $lat1;?>, <?php echo $lgn1;?>),
        map: map,
		icon: 'imgs/icon_casa.png'
      });

 
  //  var infoWindowContent = '<?php echo "Residência: " . $pega_login; ?>';
  
  	  
		  var content_rastro2 = '<div id="iw_container2"><div class="iw_title2" style="background-color:#2867b1"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_home.png" width="22" height="22"/></td><td align="left"><?php echo "RESIDÊNCIA: " . $pega_login; ?></td></tr></table></div>' + '</div>';


    var infoWindow2 = new google.maps.InfoWindow({
        content: content_rastro2
    });	
	
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		google.maps.event.addListener(map, 'click', function() {infoWindow2.close();});
	  	google.maps.event.addListener(infoWindow2, 'domready', function() {;
		var iwOuter = $('.gm-style-iw');
		var iwBackground = iwOuter.prev();
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   		iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		});
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		
		
		
	
   google.maps.event.addListener(marker2, 'click', function() {
        infoWindow2.open(map, marker2);
    });
	

	 <?php
	}
 	  ?>
  
	 ///ICONE EMPRESA
  
	    marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lgn;?>),
        map: map,
		icon: 'imgs/icon_job.png'
      });
	  
	    var content_rastro3 = '<div id="iw_container2"><div class="iw_title2" style="background-color:#2867b1"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_home.png" width="22" height="22"/></td><td align="left"><?php echo "SEDE: " . strtoupper($logado); ?></td></tr></table></div>' + '</div>';
		
		
    var infoWindow1 = new google.maps.InfoWindow({
        content: content_rastro3
    });	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		google.maps.event.addListener(map, 'click', function() {infoWindow1.close();});
	  	google.maps.event.addListener(infoWindow1, 'domready', function() {;
		var iwOuter = $('.gm-style-iw');
		var iwBackground = iwOuter.prev();
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   		iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		});
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		
		
	
	
   google.maps.event.addListener(marker1, 'click', function() {
        infoWindow1.open(map, marker1);
    });
	
	///ICONE EMPRESA
  
 
	  
	  
</script>
</body>
</html>