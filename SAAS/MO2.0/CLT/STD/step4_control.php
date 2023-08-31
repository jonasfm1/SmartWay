<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/step4.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
     <script src="https://maps.googleapis.com/maps/api/js"></script></script> 
<style type="text/css">

   
</style>
 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&language=pt-BR&amp;libraries=places"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js">
    <script src="js/jquery.geocomplete.js"></script>
    <script src="js/logger.js"></script>

<script LANGUAGE="JavaScript">

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
				"hue": "#0095FF"
			},
			{
				"saturation": -100
			},
			{
				"lightness": 44
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
				"hue": "#6200FF"
			},
			{
				"saturation": -100
			},
			{
				"lightness": 61.39999999999998
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "road.arterial",
		"stylers": [
			{
				"hue": "#00FF1A"
			},
			{
				"saturation": -100
			},
			{
				"lightness": 51.19999999999999
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "road.local",
		"stylers": [
			{
				"hue": "#0067FF"
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
	},
	{
		"featureType": "water",
		"stylers": [
			{
				"hue": "#0067FF"
			},
			{
				"saturation": 90
			},
			{
				"lightness": 6.6000000000000085
			},
			{
				"gamma": 1
			}
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


</SCRIPT>
<?php

include ('session.php');
include ('conecta.php');
ini_set('max_execution_time',12000);
  
$id_do_login = $_GET["id_login"]; 
$id_da_data = $_GET["id_data"];
?>
</head>

<body>
<?php include ('base4.php'); ?>
<div id="apDiv11"><img src="imgs/bg_box_step4.png" width="447" height="82" />
  <div id="apDiv13_todos">
    <div id="apDiv13d"><form name="go_step3" action="scripts.php?acao=rastro_auto" method="post">
	 	<input type="text" name="id_login" id="id_login" value="<?php echo $id_do_login ?>" hidden="hidden"/>
  		<input type="text" name="id_data" id="id_data" value="<?php echo $id_da_data ?>" hidden="hidden"/>
        <input type="text" name="dentro" id="dentro" hidden="hidden"/><input type='submit' value='ATUALIZAR RASTRO'/>
       </table>
    </form>


</div>

</div>
  
  <div id="help" class="help"><img src="imgs/help.png" width="45" height="45" alt=""/><div id="sidebar">
  <p>• Faça a filtragem sobre o login ou rota desejados.</p><br />
  <p>• <strong>MAPA:</strong> Visualize os locais onde foram geradas coordenadas de rastreamento!</p><br />
    
    </div>

  </div> 
  
<?php

if($_GET["id_login"]!=''){
$pega_login = $_GET["id_login"];
}
else{
$pega_login = '';
}


if($_GET["id_data"]!=''){
$pega_rota = $_GET["id_data"];
}else{
$pega_rota = '';
}

//echo $pega_rota;
	
if ($pega_login!='' and $pega_rota==''){	
$query = "select * from rastro where login='$pega_login' ORDER BY day, dth DESC";
//echo "Login:".$pega_login."  (".$total.") registros";
$rs = mysql_query($query);
$total = mysql_num_rows($rs);
}

//if ($pega_rota!='' and $pega_login=='' ){	
//$query = "select * from rastro where day ='$pega_rota' ORDER BY day, dth ASC";
//echo "Data:".$pega_data."  (".$total.") registros";
//}

if ($pega_rota!='' and $pega_login!='' ){	
$query = "select * from rastro where login='$pega_login' and day ='$pega_rota' ORDER BY day, dth DESC";
$rs = mysql_query($query);
$total = mysql_num_rows($rs);
//echo "Data:".$pega_data." Login:".$pega_login."  (".$total.") registros";
}


	
?> 
   <div id="apDiv12a">
   
   
<table width="100%" border="0" cellspacing="4" cellpadding="0">
  <tbody>
    <tr height="35px" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#FFFFFF; width:450px;">
 
<form name='theForm' id='theForm'>
 
      
<td bgcolor="#2867b1" >
  <table width="750" border="0" align="center" cellpadding="0" cellspacing="0"  height="35px">
    <tbody>
      <tr>
        <td width="15" valign="middle">&nbsp;</td>
        <td width="54" valign="middle">LOGIN</td>
        <td width="200" valign="middle">   
          
          <label>
  <select name="id_login">
  <option value="">Usuário</option>
  <?php 
	$query3 = "select login from rastro GROUP BY login";																
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
  </label></td>
        <td width="29" valign="middle"><input type="image" src="imgs/troca_cad.png" alt="Submit Form"  width="25" height="23" /></td>
        <td width="14" valign="middle">&nbsp;</td>
        <td width="50" valign="middle">DATA</td>
        <td width="181" valign="middle">
        
             
          <label>
  <select name="id_data">
  <option value="">Data</option>
  <?php 
	$query3 = "select * from rastro WHERE login='$pega_login' GROUP BY day";														
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
  //	 echo $id_data;
	 
	if ($pega_rota== $id_data){
	?>
    <option selected value="<?= $id_data ?>"><?= $id_data_portuga ?></option>
    <?php }
	
	else {
		?>
    <option value="<?= $id_data ?>"><?= $id_data_portuga ?></option>
    <?php
		}
    ?>
    <?php
	}
  ?>
  </select>	
  </label>
        </td>
        <td width="181" valign="middle"><input type="image" src="imgs/troca_cad.png" alt="Submit Form"  width="25" height="23" /></td>
        </tr>
      </tbody>
  </table></td>


      
</form>
    </tr>
  
  
  
  </tbody>
</table>
</div> 
      
<div id="apDiv12">
<?php

if ($total==0){
echo "<font size='2' style='line-height:70px;'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FILTRAGEM VAZIA!</strong></font>";
	
} else {



    $i = 0;
	$lat_cad[]=null;
	$lng_cad[]=null;
	$login[]=null;
	$data[]=null;
	
	//////////////////////////////////
	while($row = mysql_fetch_array($rs)){
		$lat_cad[$i] = $row["y"];
		$lng_cad[$i] = $row["x"];
		$login[$i] = strtoupper($row["login"]) . " - Dia: " . $row["day"] . " - Hora: " . $row["dth"] ;
		$data[$i] = $row["day"];
		$i++; 
			
	}


}
?>

</div>
</div>
 <div id="Pagina" style="display: none;">
   <div id="botao"><a href="javascript:void(0);" onclick="document.getElementById('Pagina').style.display = 'none';" ><img src="imgs/botao_fechar.png" width="46" height="45" border="0" alt="FECHAR" /></a></div>
   <?php  echo $login[i];?>
   <iframe src="form.php" name="pag1" frameborder=0 id="pag1" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</div>                                                      
<script type="text/javascript">

  var map = new google.maps.Map(document.getElementById('apDiv12'), {
       zoom: 10,
	   styles: styles,
       //center: new google.maps.LatLng(<?php echo $lat_cad[$i]?>, <?php echo $lng_cad[$i]?>),
       mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();
	var bounds = new google.maps.LatLngBounds();
    var marker, i;
	
	

    var x, y, nome;
	var locations = [ 
	  <?php
	  
	  $i--; 
	  
	  
 while($i > 0){
	  ?>['<?php echo $login[$i]?>',<?php echo $lat_cad[$i]?>,<?php echo $lng_cad[$i]?>,<?php echo $i?>], 
	   <?php $i--; ?>
	   <?php }?>
      ['<?php echo $login[$i]?>',<?php echo $lat_cad[$i]?>,<?php echo $lng_cad[$i]?>,<?php echo $i?>]
    ];

  

    for (i = 0; i < locations.length; i++) { 
		ii = i + 1;
		var locate = new google.maps.LatLng(parseFloat(locations[i][1]), parseFloat(locations[i][2])); 
		//alert(locate);
      	marker = new MarkerWithLabel({
        position: locate,
        map: map,
		optimized: true,
		clickable: true,	
		icon: 'imgs/man_icon.png',	
		
		labelContent: ii,
      	labelAnchor: new google.maps.Point(12, 64),
       	labelClass: 'labels', // the CSS class for the label
		labelInBackground: true,
		labelStyle: {opacity: 0.90}
      });
	
	  bounds.extend(marker.getPosition());
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
	  
	   map.fitBounds(bounds);
	   
    }
	var visitados = [];
//	marker = [];
//	mrktx = [];
//	infowindow = [];

  
  <?php
  
 /////////PONTOS//////////////
$query_pontos = mysql_query("select * from rotas where login='$pega_login'");														
$ie= 999999;
//////////////////////////////////
while($row = mysql_fetch_array($query_pontos)){
	
	$nome_cad_pontos[$ie] = $row["rota"];
	$lat_cad_pontos[$ie] = $row["y"];
	$lng_cad_pontos[$ie] = $row["x"];
	$raio[$ie] = $row["raio"];
	$id_darota[$ie] = $row["id"];
	$rastro_true = $row["ce"];
	
/////VISITADO OU NAO ///////////////
if ($rastro_true==0){
		echo "pointX$ie = new google.maps.LatLng($lat_cad_pontos[$ie],$lng_cad_pontos[$ie]);\n";	
    	echo "mrktxX$ie = \"<div id='box_map'><h1><p id='legenda1'>$nome_cad_pontos[$ie]</div>\";";
		echo "infowindowX$ie = new google.maps.InfoWindow({content: mrktxX$ie});\n";
    	echo "marker$ie = new google.maps.Marker({position: pointX$ie, map: map, title: '$nome_cad_pontos[$ie]', icon: 'imgs/icon_red.png',});\n";
		echo "google.maps.event.addListener(marker$ie,
         'click',  function() {
   		     infowindowX$ie.open(map,marker$ie);
          });\n";
		  
		echo "var sunCircle = {
          strokeColor: '#47fa00',
          strokeOpacity: 0.15,
          strokeWeight: 1,
          fillColor: '#FF0000',
          fillOpacity: 0.15,
          map: map,
          center: pointX$ie,
          radius: $raio[$ie]
        };\n";
		
		echo "cityCircle = new google.maps.Circle(sunCircle)\n";
	
} else {
	
		echo "pointX$ie = new google.maps.LatLng($lat_cad_pontos[$ie],$lng_cad_pontos[$ie]);\n";	
    	echo "mrktxX$ie = \"<div id='box_map'><h1><p id='legenda1'>$nome_cad_pontos[$ie]</div>\";";
		echo "infowindowX$ie = new google.maps.InfoWindow({content: mrktxX$ie});\n";
    	echo "marker$ie = new google.maps.Marker({position: pointX$ie, map: map, title: '$nome_cad_pontos[$ie]', icon: 'imgs/icon_green.png',});\n";
		echo "google.maps.event.addListener(marker$ie,
         'click',  function() {
   		     infowindowX$ie.open(map,marker$ie);
          });\n";
		  
		echo "var sunCircle = {
          strokeColor: '#47fa00',
          strokeOpacity: 0.15,
          strokeWeight: 1,
          fillColor: '#47fa00',
          fillOpacity: 0.15,
          map: map,
          center: pointX$ie,
          radius: $raio[$ie]
        };\n";
		
		echo "cityCircle = new google.maps.Circle(sunCircle)\n";
	
	
}
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
		
<?php
	
	$ie++;
}


  
?>
  
document.getElementById("dentro").value = visitados;
  
//'(JSON.stringify(visitados, null, 4));
//circle$ie = new google.maps.Circle({map: map, radius: 16093, fillColor: '#AA0000'});
//circle$ie.bindTo('center', marker$ie, 'pointX$ie');

  </script>

</body>
</html>