
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


////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
(function($){
$.fn.waiting = function(options){
options = $.extend({modo: 'normal'}, options);
this.fadeOut(options.modo);
return this;
};
})(jQuery);

	
$(document).ready(function(){
$(".jquery-waiting-base-container1").waiting({modo:"slow"});
});



function Mudarestado(el) {
    var display = document.getElementById(el).style.display;


    if(display === "none"){
        document.getElementById(el).style.display = 'block';
	} else {
        document.getElementById(el).style.display = 'none';
		
	}
	}


function Mudarestado_fechado(el) {
    var display = document.getElementById(el).style.display;
	document.getElementById(el).style.display = 'none';
	}
	

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


////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

function pontos(varTexto, Max) { 
    if (varTexto.length > Max) {
        return(varTexto.substring(0, Max)+"...");
    }
    else {
        return(varTexto);
    }
}



    // Initialise some variables
    var directionsService = new google.maps.DirectionsService();
    var num, map, data, data1, data2, data3, datax, datay, data_endereco, data_codigopedido, data_obspedido;
    var requestArray = [], renderArray = [];
	var h;
 	var options1 = [];
	inicio = document.getElementById('txtEnderecoPartida').value;
	final = document.getElementById('txtEnderecoChegada').value; 
	
	var jsonArray={}, jsonArray1 = {}, jsonArray2 = {}, jsonArray3 = {}, jsonArray4 = {}, jsonArray5 = {}, jsonArray6 = {}, jsonArray7 = {};
	
	
 	for (var h = 0; h < veiculo_numero_js; h++) {
		
	var numero = h.toString();	

	 waypoints = "waypoints";
	 waypoints_concatena = waypoints.concat(numero); 
	 
	 num_cli = "veiculo";
	 cliente_concatena = num_cli.concat(numero); 	 

	 num_cli_nome = "nome_cliente";
	 cliente_nome_concatena = num_cli_nome.concat(numero); 	 
	 
	 num_carro = "carro";
	 carro_nome_concatena = num_carro.concat(numero); 	 

	 endereco_cli = "endereco_cliente";
	 endereco_cli_concatena = endereco_cli.concat(numero); 
	
	 codigo_pedido = "codigo_pedido";
	 codigo_pedido_concatena = codigo_pedido.concat(numero);	
	 
	 obs_pedido = "obs_pedido";
	 obs_pedido_concatena = obs_pedido.concat(numero); 
	 
	
	var rota_concatena = document.getElementById(waypoints_concatena).innerHTML;
	
	var cli_concatena = document.getElementById(cliente_concatena).innerHTML;
	var cliente_nome_concatena = document.getElementById(cliente_nome_concatena).innerHTML;
	
	var carro_nome_concatena = document.getElementById(carro_nome_concatena).innerHTML;
	var endereco_cli_concatena = document.getElementById(endereco_cli_concatena).innerHTML;
	var codigo_pedido_concatena = document.getElementById(codigo_pedido_concatena).innerHTML;
	var obs_pedido_concatena = document.getElementById(obs_pedido_concatena).innerHTML;
	
	var rota_concatena_nome = eval('[' + rota_concatena + ']');
	
	var cliente_concatena_nome = eval('[' + cli_concatena + ']');	
	var cliente_concatena_nome_ok = eval('[' + cliente_nome_concatena + ']');	
	
	var carro_concatena_nome = eval('[' + carro_nome_concatena + ']');	
	var endereco_cli_concatena = eval('[' + endereco_cli_concatena + ']');	
	var codigo_pedido_concatena = eval('[' + codigo_pedido_concatena + ']');	
	var obs_pedido_concatena = eval('[' + obs_pedido_concatena + ']');	
	
	
	
	
 	var rota = waypoints_concatena;
	
	var cliente = cliente_concatena_nome;
	var cliente_nome = cliente_concatena_nome_ok;
	
	var carro_nome = carro_nome_concatena;
	var endereco_cliente = endereco_cli_concatena;
	var codigo_ped = codigo_pedido_concatena;
	var obs_ped = obs_pedido_concatena;
	
    jsonArray[cliente] = rota_concatena_nome;
	
	jsonArray1[cliente] = cliente_concatena_nome;
	jsonArray2[cliente] = cliente_concatena_nome_ok;
	jsonArray3[cliente] = carro_concatena_nome;
	jsonArray4[cliente] = rota_concatena_nome;
	jsonArray5[cliente] = endereco_cli_concatena;
	jsonArray6[cliente] = codigo_pedido_concatena;
	jsonArray7[cliente] = obs_pedido_concatena;
	
	//jsonArray_idcliente[cliente] = obs_pedido_concatena;
	
	//alert(jsonArray3[cliente]);
	
	
	
	
 }

// Poligonos individuais

/////ORDENAR VALOR ///////////////
function sortfunction(a, b){
  			 	return (a.distancia - b.distancia);
}	
	
//////////////////////////////////
///SETA
		var iconsetngs = {
   		 path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
};
		
//////////////////////////////////
	
	
function generateRequests(){

       processRequests();
	   	
}


		
function secondsToHms(d) {
				d = Number(d);
			 	var h = Math.floor(d / 3600);
				var m = Math.floor(d % 3600 / 60);
				var s = Math.floor(d % 3600 % 60);
				return ((h > 0 ? h + ":" + (m < 10 ? "0" : "") : "") + m + ":" + (s < 10 ? "0" : "") + s); 
				

}
				
function submitRequest(){	
  //      directionsService.route(requestArray[i].request, directionResults);
 		 
}	
		
				
function processRequests(){
			
var i = 0;
		
//requestArray1 = [];
junta_veiculo = [];

var lista_distancia=[];
var lista_tempo=[];

for (var cliente in jsonArray1){
	
///////////////////////////////////////////////////////////////////
			    data = jsonArray[cliente];
				data1 = jsonArray1[cliente];
				data2 = jsonArray2[cliente];
				datax = jsonArray4[cliente];
				data_endereco = jsonArray5[cliente];
				data_codigopedido = jsonArray6[cliente];
				data_obspedido = jsonArray7[cliente];
				data_id = jsonArray3[cliente];				
				data3 = jsonArray3[cliente];
///////////////////////////////////////////////////////////////////
	
		 		 var waypts = [];        
           		 var start, finish;         
            	 var lastpoint;			           		
            	 limit = data.length;		
				// junta_veiculo1 = [];
				 guarda_haversine=[];		 
				 values_inicio=inicio.split(',');
				 one_inicio_d=values_inicio[0];
				 two_inicio_d=values_inicio[1];
				 
				 
				 array_distancia_total= 0;
				 total_tempo=0;
				 total_tempo_guarda=0;
				 
				// alert(JSON.stringify(data3, null, 4));	
				 

///////////////////////////////////////////////////////////////////
		
for (var waypoint0 = 0; waypoint0 < limit; waypoint0++) {
	
			 if (data[waypoint0] === lastpoint){
                    // Duplicate of of the last waypoint
                    continue;
             }                
                // Prepare the lastpoint for the next loop
               lastpoint = data[waypoint0];
				
			    waypts.push({
                    location: data[waypoint0],
                    stopover: true
                });
	
				values_final=data[waypoint0].split(',');
				one_final_d=values_final[0];
				two_final_d=values_final[1];
		
	
		  	var novaArr1 = data3[waypoint0];
			
	
			for (var n1 = 0; n1 < id_veiculo.length; n1++) {
			
				if(id_veiculo[n1] == novaArr1){
					junta_concatena_carro = concatena_carro[n1];
					junta_cor_veiculo = color_carro[n1];
					junta_nome_veiculo = nome_veiculo[n1];			
				}	
			
			}
			//alert(JSON.stringify(junta_nome_veiculo, null, 4));	
				// cria o array LINHA
				 guarda_haversine.push({
               		    "distancia": haversine(one_inicio_d, two_inicio_d, one_final_d, two_final_d),
						"local": datax[waypoint0],
						"id_veiculo": data_id[waypoint0],
						"veiculo": data1[waypoint0], 
						"cliente": data2[waypoint0],	
						"endereco": data_endereco[waypoint0], 
						"codigo_pedido": data_codigopedido[waypoint0], 
						"obs_pedido": data_obspedido[waypoint0],
						"qual_veiculo": junta_concatena_carro,
						"cor_veiculo": junta_cor_veiculo,
						"quem_veiculo": junta_nome_veiculo,
				 });
	
	
			
		guarda_haversine.sort(sortfunction);
		

}		
///////////////////////////////////////////////////////////////////

	
				
		// LINHA RETA INICIO
		split_inicio=inicio.split(',');
		one_inicio=split_inicio[0];
		two_inicio=split_inicio[1];
	
	
		split_final=guarda_haversine[0].local.split(',');
		one_final=split_final[0];
		two_final=split_final[1];
		////////////////////////////////////	
		
		//	MARKER INICIO
		 			icone = "imgs/icon_start.png";
					latlng = new google.maps.LatLng(one_inicio, two_inicio);	
					marker0 = new google.maps.Marker({
    				position: latlng,
     				map: map,
					icon: icone,
    				optimized: true,
					clickable: true,			
 					});
					google.maps.event.addListener(marker0, 'click', (function(marker0) {
               		return function() {
                    infowindow.setContent('<div id="info"><h1><p id="legenda1">Ponto Inicial</h1></p></div>');
                    infowindow.open(map, marker0);
               		}}) (marker0));		
		////////////////////////////////////	
		distancia_inicio = haversine(one_inicio, two_inicio, one_final, two_final);
		
		// AUMENTA OU DIMINUI A VELOCIDADE MEDIA
		
		if(distancia_inicio > 40){
			total_tempo +=  distancia_inicio / 0.7;
			total_tempo_guarda = distancia_inicio / 0.7;
			
		} else {
			total_tempo +=  distancia_inicio / 0.4;
			total_tempo_guarda = distancia_inicio / 0.4;
		}	
		array_distancia_total += distancia_inicio * 1.2; 
	
	
		
	var meu_distancia = [];
	meu_distancia[i] = [];	
	
	var meu_tempo = [];
	meu_tempo[i] = [];	

	
	meu_distancia[i].push(distancia_inicio * 1.3);	
	meu_tempo[i].push(total_tempo_guarda);	
		

		
			
for (var waypoint = 0; waypoint < limit; waypoint++) {
	
		var line_inicio = new google.maps.Polyline({
   		 path: [new google.maps.LatLng(one_inicio, two_inicio), new google.maps.LatLng(one_final, two_final)],
    	 strokeColor:  guarda_haversine[waypoint].cor_veiculo,
   		 strokeOpacity: 1.0,
    	 strokeWeight: 3,
   	     map: map,
	     icons: [{
         icon: iconsetngs,
         offset: '100%'}]
		 });
		 
	
			split_local_ok=guarda_haversine[waypoint].local.split(',');
			one_final_ok=split_local_ok[0];
			two_final_ok=split_local_ok[1];
	
			maisum= 	waypoint + 1;
		
			if(limit === maisum){
					/// LINHA RETA FINAL
					split_local_ok1=final.split(',');
					one_final_ok1=split_local_ok1[0];
					two_final_ok1=split_local_ok1[1];
				
					icone1 = "imgs/icon_finish.png";				
					latlng1 = new google.maps.LatLng(one_final_ok1, two_final_ok1);
					marker1 = new google.maps.Marker({
    				position: latlng1,
     				map: map,
					icon: icone1,
    				optimized: true,
					clickable: true,							
 					});	
								
					google.maps.event.addListener(marker1, 'click', (function(marker1, limit) {
               		 return function() {
                    infowindow.setContent('<div id="info"><h1><p id="legenda1">Ponto Final</h1></p></div>'	);
                    infowindow.open(map, marker1);
              		 }})(marker1, limit));
				
			} else {
					//LINHA RETA TODAS INTERNAS
					split_local_ok1=guarda_haversine[maisum].local.split(',');
					one_final_ok1=split_local_ok1[0];
					two_final_ok1=split_local_ok1[1];
			}
	
	// CRIANDO A LINHA RETA
		
				var line1 = new google.maps.Polyline({
   				 path: [new google.maps.LatLng(one_final_ok, two_final_ok), new google.maps.LatLng(one_final_ok1, two_final_ok1)],
    	 		 strokeColor: guarda_haversine[waypoint].cor_veiculo,
   		 		 strokeOpacity: 1.0,
    			 strokeWeight: 3,
   	    		 map: map,
	     		 icons: [{
        		 icon: iconsetngs,
        		 offset: '100%'}]
		 		 });
	
	
				split_e=guarda_haversine[waypoint].local.split(',');
				one_split=split_e[0];
 				two_split=split_e[1];
			
			distancia_todos = haversine(one_final_ok, two_final_ok, one_final_ok1, two_final_ok1);


			if(distancia_todos > 40){
				total_tempo +=  distancia_todos / 0.7;
				total_tempo_guarda = distancia_todos / 0.7;
				
			} else {
				total_tempo +=  distancia_todos / 0.4;
				total_tempo_guarda = distancia_todos / 0.4;
			}




meu_distancia[i].push(distancia_todos * 1.3);	
meu_tempo[i].push(total_tempo_guarda);	


array_distancia_total += distancia_todos; 

}
	
	
//////////////////////////////////////////////////////////////

	
			var novaArr = data3.filter(function(este, i) {
				return data3.indexOf(este) === i;  
				
			}
			);
			
			//alert(id_veiculo.length);
			for (var n = 0; n < id_veiculo.length; n++) {
			
				if(id_veiculo[n] == novaArr){
					junta_veiculo.push({
          			veiculo: concatena_carro[n],
					cor: color_carro[n],
					nome_veiculo: nome_veiculo[n],
					id_do_veiculo:id_veiculo[n],
          	 	}
				);
			
			}			
	}
	
	
						var datay = guarda_haversine;
				
						var meu_array_iddocara= [];
						meu_array_iddocara[i]= [];
						
						var meu_array = [];
						meu_array[i] = [];
						
						var meu_array2 =[];
						meu_array2[i] = [];

						var meu_endereco =[];
						meu_endereco[i] = [];
						
						var meu_pedido = [];
						meu_pedido[i] = [];
						
						var meu_obs = [];
						meu_obs[i] = [];
						
											
						var meu_iddoveiculo = [];
						meu_iddoveiculo[i] = [];	
						
						var meu_ordem = [];
						meu_ordem[i] = [];	
						
	
						var meu_rota = [];
						meu_rota[i] = [];	
					
					
						var ultima_veiculo = [];
						ultima_veiculo[i] = [];	
				
						var ultima_distancia = [];
						ultima_distancia[i] = [];	
				
						var ultima_tempo = [];
						ultima_tempo[i] = [];	
				
				
						maismais = i + 1;
				
		
				
		document.getElementById('div16').innerHTML += '<div id="div_nova">Rota ' + maismais + '</div>';
		document.getElementById('div16').innerHTML += '<div id="div_nova2">';
		document.getElementById('div16').innerHTML += '<table width="100%" height="40px;" border="0" cellpadding="0" cellspacing="0" class="div_nova2_tabela"><tbody><tr><td width="60px;" align="center"><img src=' + "'" + junta_veiculo[i].veiculo + "'" +  "width='30' height='28' /></td><td><b><font size='2px'>" + junta_veiculo[i].nome_veiculo + "   </font></b></td><td width='70px'>Pedidos: " + "<font size='4px'><b>" + data3.length + "</b></font></td></tr></tbody></table>";
		document.getElementById('div16').innerHTML += '</div>';
		
	
				document.getElementById('div16').innerHTML += '<div id="div_nova3">Distancia Total</div>';
				document.getElementById('div16').innerHTML += '<div id="div_nova4">Tempo Total</div>';
		
				// MULTIPLICA MAIS 1.3 NO DISTANCIA
				
				total_distanciasomada = array_distancia_total * 1.3;
				
				
				document.getElementById('div16').innerHTML +='<div id="div_nova3a">' + total_distanciasomada.toFixed(2) + " km";
				document.getElementById('div16').innerHTML += '</div>' ;		
				////////////////////////
				
		
				////FUNCAO SEGUNDOS//////
	 			segundos = total_tempo;
				////////////////////////
	
			
				document.getElementById('div16').innerHTML += '<div id="div_nova4a">' + secondsToHms(segundos) + ' min' + '</div>';
					
				var vistitaae = "visita" + [i];

				
				document.getElementById('div16').innerHTML +="<div id='div_nova_titulo_ordem'>";
				document.getElementById('div16').innerHTML += "<table border='0' cellpadding='0' cellspacing='0' class='div_nova_tabela_titulo_ordem'><tr><td width='200px;'><h3>Ordem de visita</h3></td><td><button type='button' onclick=Mudarestado('"+ vistitaae + "');>&nbsp;+&nbsp;</button></td></tr></table>";
	

				
				document.getElementById('div16').innerHTML +="</div>";
	
	
				// valor input recebe
				
				
			
				
				ultima_veiculo[i].push(total_distanciasomada.toFixed(2));
				ultima_distancia[i].push(junta_veiculo[i].id_do_veiculo);
				ultima_tempo[i].push(secondsToHms(segundos));
				
				
				
				document.getElementById('ultimao').value += ultima_veiculo[i] + ",";
				document.getElementById('ultimao_2').value += ultima_distancia[i] + ",";
				document.getElementById('ultimao_3').value += ultima_tempo[i] + ",";
				
				
				var nome_best=[];
				var endereco_best=[];
				var codigo_pedido_best=[];
				var obs_pedido_best=[];
				var id_cli_best=[];
				var id_veiculo_best=[];
	
				
				
				
				document.getElementById('div16').innerHTML += "<div id=" + vistitaae + ">";


	
	
	 var markerBounds = new google.maps.LatLngBounds();
	 
	 
	///looping ordenado
	for (var w = 0; w < data3.length; w++) {
					
							ordem = w;	
						
							meu_array_iddocara[i].push(datay[ordem].veiculo);
							
							meu_array[i].push(datay[ordem].cliente);
							meu_array2[i].push(datay[ordem].local);
							meu_endereco[i].push(datay[ordem].endereco);
							meu_pedido[i].push(datay[ordem].codigo_pedido);
							meu_obs[i].push(datay[ordem].obs_pedido);							
							meu_iddoveiculo[i].push(datay[ordem].id_veiculo);
			
							somai = i+1;
							
							meu_rota[i].push(somai);
							nome_best[w] = meu_array[i][w];
							endereco_best[w] = meu_endereco[i][w];
							codigo_pedido_best[w] = meu_pedido[i][w];
							obs_pedido_best[w] = meu_obs[i][w];						
							id_cli_best[w] = meu_array_iddocara[i][w];							
							id_veiculo_best[w] = meu_iddoveiculo[i][w];
	
							ww = w + 1;
							///ordem
							meu_ordem[i].push(ww);
							
							
							nx = ww.toString();	
							
							//alert(pontos(meu_array[i][w], 150));
							document.getElementById(vistitaae).innerHTML += "<p><strong>" + ww + " - </strong>" + pontos(meu_array[i][w], 26) + " - <strong>" + meu_distancia[i][w].toFixed(1) + " Km</strong></p>";	
							
							
							lista_distancia.push(meu_distancia[i][w].toFixed(1));									
							lista_tempo.push(secondsToHms(meu_tempo[i][w]));	
							

							icone = junta_veiculo[i].veiculo;
							latlng = meu_array2[i][w];
							
							var lat = latlng.replace(/\s*\,.*/, ''); // first 123
      						var lng = latlng.replace(/.*,\s*/, ''); // second ,456
       						var locate = new google.maps.LatLng(parseFloat(lat), parseFloat(lng)); 
							

						    var infowindow = new google.maps.InfoWindow();
							  
							marker = new MarkerWithLabel({
    						position: locate,
     						map: map,
							icon: icone,
    						optimized: true,
							clickable: true,	
							
							 labelContent: nx,
      						 labelAnchor: new google.maps.Point(12, 64),
       						 labelClass: 'labels', // the CSS class for the label
							 labelInBackground: true,
							 labelStyle: {opacity: 0.90}
							
 							});
									
					/*		google.maps.event.addListener(marker, 'click', (function(marker, w) {
                			return function() {
                    		infowindow.setContent('<div id="info"><p id="legenda1"><strong>' +  nome_best[w]  + '</strong></p></div>' + '<p id="legenda3"><strong>Cód. do pedido:</strong>' + codigo_pedido_best[w]  + '</p><p id="legenda3"><strong>Obs. do pedido:</strong>' + obs_pedido_best[w]  + '</p>' + '<p id="legenda3">' + endereco_best[w]  + '</p></div>');
                    		infowindow.open(map, marker);
               		 		}})(marker, w)); 	
	*/
 markerBounds.extend(locate);


				document.getElementById('yyy').value += meu_ordem[i][w] + ",";
				document.getElementById('xxx').value += meu_array_iddocara[i][w] + ",";							
				document.getElementById('zzz').value += meu_iddoveiculo[i][w] + ",";							
				document.getElementById('www').value += meu_rota[i][w] + ",";
				document.getElementById('eee').value += meu_pedido[i][w] + ",";
	
	
				

}


 				
				map.fitBounds(markerBounds);
				
//////////////////////////////////////////////////////////////////

//alert(meu_ordem);
				
										
				document.getElementById('qqq').value = lista_distancia;			
				document.getElementById('kkk').value = lista_tempo;
				
				
				document.getElementById('div16').innerHTML += "</div>";	
				document.getElementById('div16').innerHTML += "<br />";	
				
						
			
				
			
				
	
							
			//alert(w);
			datay.splice(0, w);
			datax.splice(0, w);
				
				
			
				
	
				Mudarestado_fechado(vistitaae);
				
            
                nextRequest();
	
////////////////////////////////////////////////////
				 		
}		

    
	map.setZoom(8);
			
		
		

        function nextRequest(){
            // mais i
            i++;
	   
            if(i >= guarda_haversine.length){
	  
                return;
            }
           
          //  submitRequest();
			
        	}

       		 
       // 	submitRequest();
		


}


   
    // Called Onload
    function init() {

        
        var mapOptions = {
            center: new google.maps.LatLng(-23, -45.13),
            zoom: 12,
            mapTypeControl: false,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles: styles
        };
            
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		

		//var TrafficLayer = new google.maps.TrafficLayer();
  		//TrafficLayer.setMap(map);
  
        // Start the request making
        generateRequests();
		
    }
	

    // Get the ball rolling and trigger our init() on 'load'
    google.maps.event.addDomListener(window, 'load', init);



///formula de HAVERSINE//////////////	 
function haversine() {
       var radians = Array.prototype.map.call(arguments, function(deg) { return deg/180.0 * Math.PI; });
       var lat1 = radians[0], lon1 = radians[1], lat2 = radians[2], lon2 = radians[3];
       var R = 6372.8; // km
       var dLat = lat2 - lat1;
       var dLon = lon2 - lon1;
       var a = Math.sin(dLat / 2) * Math.sin(dLat /2) + Math.sin(dLon / 2) * Math.sin(dLon /2) * Math.cos(lat1) * Math.cos(lat2);
       var c = 2 * Math.asin(Math.sqrt(a));
       return R * c;
}
///////////////////////////////////
        


