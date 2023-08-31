
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
(function($) {
$.fn.waiting = function(options) {
options = $.extend({modo: 'normal'}, options);
this.fadeOut(options.modo);
return this;
};
})(jQuery);;

	
$(document).ready(function(){
$(".jquery-waiting-base-container1").waiting({modo:"slow"});
});



function Mudarestado(el) {
    var display = document.getElementById(el).style.display;


    if(display == "none")
        document.getElementById(el).style.display = 'block';
    else
        document.getElementById(el).style.display = 'none';
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
	 
	 //alert(obs_pedido_concatena);	 
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
	
	
	//alert(endereco_cli_concatena);
 	var rota = waypoints_concatena;
	
	var cliente = cliente_concatena_nome;
	var cliente_nome = cliente_concatena_nome_ok;
	
	var carro_nome = carro_nome_concatena;
	var endereco_cliente = endereco_cli_concatena;
	var codigo_ped = codigo_pedido_concatena;
	var obs_ped = obs_pedido_concatena;
	
    jsonArray[h] = rota_concatena_nome;
	
	jsonArray1[h] = cliente_concatena_nome;
	jsonArray2[h] = cliente_concatena_nome_ok;
	jsonArray3[h] = carro_concatena_nome;
	jsonArray4[h] = rota_concatena_nome;
	jsonArray5[h] = endereco_cli_concatena;
	jsonArray6[h] = codigo_pedido_concatena;
	jsonArray7[h] = obs_pedido_concatena;
	
	//jsonArray_idcliente[cliente] = obs_pedido_concatena;
	
 }


 function pontos(varTexto, Max) { 
  if (varTexto.length > Max) {
      return(varTexto.substring(0, Max)+"...");
  }
  else {
      return(varTexto);
  }
}


// Poligonos individuais


function generateRequests(){
//alert(jsonArray);
for(route in jsonArray){
            var waypts = []; 
		        
            var start, finish;         
            var lastpoint;			
            data = jsonArray[route];
            limit = data.length;
			
			//alert(limit);
			for (var waypoint = 0; waypoint < limit; waypoint++) {

				 if (data[waypoint] === lastpoint){
                    // Duplicate of of the last waypoint - don't bother
                    continue;
                }
                
                // Prepare the lastpoint for the next loop
                lastpoint = data[waypoint];
				

                waypts.push({
                    location: data[waypoint],
                    stopover: true
                });
		
	
			}
		
            // inicio da rota
             start = inicio;
            // final da rota
             finish = final;
			 
			 
			 	if(waypts.length > 25){
          alert("\nALERTA!\n\nPELO MENOS UMA ROTA PASSOU DO LIMITE DE 25 PEDIDOS!\nESCOLHA NO MENU SUPERIOR ESQUERD0 DO PASSO 4 A OPÇÃO PONTO-A-PONTO PARA AS ROTAS QUE EXCEDERAM O LIMITE.");
          window.location.href="step4.php";
      /*
          array_novo = waypts.slice(0, 23);
				//alert(JSON.stringify(array_novo.length, null, 4));
				
				var request = {
                origin: start,
                destination: finish,
                waypoints: array_novo,
				unitSystem: google.maps.UnitSystem.METRIC,
				optimizeWaypoints: true,			
                travelMode: google.maps.TravelMode.DRIVING
           	
           		 };
				 
        */
        
				} else {
					
				
				var request = {
                origin: start,
                destination: finish,
                waypoints: waypts,
				unitSystem: google.maps.UnitSystem.METRIC,
				optimizeWaypoints: false,			
                travelMode: google.maps.TravelMode.DRIVING
           	
           		 };
			
				}
			
			
            // cria objeto rota ponto a ponto
	 
          
            // salva na requestArray
            requestArray.push({"route": route, "request": request});	
		 	
		
			
			
        }
	 
	
       processRequests();
		 
}
	
	
    function processRequests(){
			
        var i = 0;
        
        function submitRequest(){
		
		//alert(JSON.stringify(requestArray[i], null, 4));
		
         directionsService.route(requestArray[i].request, directionResults);
				
        }
		
requestArray1 = [];
junta_veiculo = [];

for (var cliente in jsonArray1){
		
				data1 = jsonArray1[cliente];
				data2 = jsonArray2[cliente];
				datax = jsonArray4[cliente];
				data_endereco = jsonArray5[cliente];
				data_codigopedido =  jsonArray6[cliente];
				data_obspedido =  jsonArray7[cliente];
				data_id = jsonArray3[cliente];	
				limit1 = data1.length;
				
				data3 = jsonArray3[cliente];
				
				
		//	alert(limit1);
			
			if(limit1>25){
				
				limit1 =25;
		
			}
		
			for (var waypoint1 = 0; waypoint1 < limit1; waypoint1++) {
		
					
				requestArray1.push({"id_veiculo":  data_id[waypoint1],"veiculo":  data1[waypoint1], "cliente": data2[waypoint1], "local": datax[waypoint1], "endereco": data_endereco[waypoint1], "codigo_pedido": data_codigopedido[waypoint1], "obs_pedido": data_obspedido[waypoint1]});
				//alert(nome_veiculo[n]);
				
				
			}
			
			
				

				var novaArr = data3.filter(function(este, i) {
    			return data3.indexOf(este) == i;   
				});
			//alert(jsonArray3[cliente]);
			
			for (var n = 0; n < id_veiculo.length; n++) {
			
				if(id_veiculo[n] == novaArr){
				junta_veiculo.push({
          		veiculo: concatena_carro[n],
				cor: color_carro[n],
				nome_veiculo: nome_veiculo[n],
				id_do_veiculo:id_veiculo[n],
          	 	});
			
				}			
			
		}
				 		
}		

        // Used as callback for the above request for current 'i'
function directionResults(result, status) {
			
			
			//alert(JSON.stringify(requestArray1, null, 4));	
		if (status == google.maps.DirectionsStatus.MAX_WAYPOINTS_EXCEEDED) {
			
			
			//alert(JSON.stringify(requestArray1, null, 4));	
			//alert(status);	
			
	
		}	
		
		
        if (status == google.maps.DirectionsStatus.OK) {
			
				var orders = result.routes[0].waypoint_order; 
				var datay = requestArray1;
				
						var meu_array_iddocara= new Array();
						meu_array_iddocara[i]= new Array();
						
						var meu_array = new Array();
						meu_array[i] = new Array();
						
						var meu_array2 = new Array();
						meu_array2[i] = new Array();

						var meu_endereco = new Array();
						meu_endereco[i] = new Array();
						
						var meu_pedido = new Array();
						meu_pedido[i] = new Array();
						
						var meu_obs = new Array();
						meu_obs[i] = new Array();
																
						var meu_iddoveiculo = new Array();
						meu_iddoveiculo[i] = new Array();	
						
						var meu_ordem = new Array();
						meu_ordem[i] = new Array();	
						
						var meu_distancia = new Array();
						meu_distancia[i] = new Array();
			
						var ordem_certo_entrega= new Array();
						ordem_certo_entrega[i] = new Array();
			
            var ordem_certo_tempo= new Array();
						ordem_certo_tempo[i] = new Array();

        
            var meu_tempo = new Array();
						meu_tempo[i] = new Array();	
						
						var meu_rota = new Array();
						meu_rota[i] = new Array();	
						
			
						//maismais = i + 1;
				
		
				
            document.getElementById('div16').innerHTML += '<div id="div_nova">' + junta_veiculo[i].nome_veiculo + '</div>';
            document.getElementById('div16').innerHTML += '<div id="div_nova2">';
            document.getElementById('div16').innerHTML += '<table width="100%" height="40px;" border="0" cellpadding="0" cellspacing="0" class="div_nova2_tabela"><tbody><tr><td width="50%;" align="left"><img src=' + "'" + junta_veiculo[i].veiculo + "'" +  "width='30' height='28' /></td><td width='50%'>Pedidos: " + "<font size='4px'><b>" + orders.length + "</b></font></td></tr></tbody></table>";
            document.getElementById('div16').innerHTML += '</div>';
		
		
				var legs = result.routes[0].legs.length;
				var totaldistance=0;
				var totaltime=0;
				for (var j = 0; j < legs; j++) {
					
				// markers legs inicial
				if (j==0){
					icone = "imgs/icon_start.png";
					latlng = result.routes[0].legs[j].start_location;	
					marker0 = new google.maps.Marker({
    				position: latlng,
     				map: map,
					icon: icone,
    				optimized: true,
					clickable: true,			
 					});
				google.maps.event.addListener(marker0, 'click', (function(marker0, j) {
                return function() {
                    infowindow.setContent(
					'<div id="info"><h1><p id="legenda1">'
					 + "Ponto Inicial" + 
					 '</h1></p></div>'
					 
					 );
                    infowindow.open(map, marker0);
                }
            	})(marker0, j));

				} 

				// markers legs final
				if (j==legs-1) {
					icone1 = "imgs/icon_finish.png";				
					latlng1 = result.routes[0].legs[j].end_location;
					marker1 = new google.maps.Marker({
    				position: latlng1,
     				map: map,
					icon: icone1,
    				optimized: true,
					clickable: true,	
					
							
 					});				
					google.maps.event.addListener(marker1, 'click', (function(marker1, j) {
               		 return function() {
                    infowindow.setContent('<div id="info"><h1><p id="legenda1">' + "Ponto Final" + '</h1></p></div>'	);
                    infowindow.open(map, marker1);
                }
            	})(marker1, j));
				
				// deleta listas	

					
				} 

				//document.getElementById('apDiv16').innerHTML +="<b>Route" + i +  " Segmento: " + j + "</b><br />";					
	            // document.getElementById('apDiv16').innerHTML += "•" + result.routes[0].legs[j].start_address + "<br>";
	            // document.getElementById('apDiv16').innerHTML += "•" + result.routes[0].legs[j].end_address + "<br>";
                //document.getElementById('apDiv16').innerHTML += result.routes[0].legs[j].distance.text + " - ";				
	            //document.getElementById('apDiv16').innerHTML += result.routes[0].legs[j].duration.text + "<br />";
			    //conta_distancia[j] = result.routes[0].legs[j].distance.text;
			   					

				totaldistance = totaldistance + result.routes[0].legs[j].distance.value;
				
				totaltime = totaltime + result.routes[0].legs[j].duration.value;
				
				
				//document.getElementById('apDiv16').innerHTML += Math.floor(result.routes[0].legs[j].distance.value / 1000);
				//alert(waypts_cli_nome[j].cliente);
 				}
				
				document.getElementById('div16').innerHTML += '<div id="div_nova3">Distancia Total</div>';
				document.getElementById('div16').innerHTML += '<div id="div_nova4">Tempo Total</div>';
		
		
				document.getElementById('div16').innerHTML +='<div id="div_nova3a">' + (totaldistance/1000).toFixed(2) + " km";
				document.getElementById('div16').innerHTML += '</div>' ;
				
		
			function secondsToHms(d) {
				d = Number(d);
			 	var h = Math.floor(d / 3600);
				var m = Math.floor(d % 3600 / 60);
				var s = Math.floor(d % 3600 % 60);
				return ((h > 0 ? h + ":" + (m < 10 ? "0" : "") : "") + m + ":" + (s < 10 ? "0" : "") + s); 
				
				}
	 			segundos = totaltime/60;
	
				
				document.getElementById('div16').innerHTML += '<div id="div_nova4a">' + secondsToHms(segundos) + ' min' + '</div>';
	
				var vistitaae = "visita" + [i];

				
				document.getElementById('div16').innerHTML +="<div id='div_nova_titulo_ordem'>";
				document.getElementById('div16').innerHTML += "<table border='0' cellpadding='0' cellspacing='0' class='div_nova_tabela_titulo_ordem'><tr><td><h4>Ordem de visita</h4></td><td><button type='button' onclick=Mudarestado('"+ vistitaae + "');>&nbsp;+&nbsp;</button></td></tr></table>";
	

				
				document.getElementById('div16').innerHTML +="</div>";
				
	
						
						
						
						
				
				// valor input recebe
				
				
				var ultima_veiculo = new Array();
				ultima_veiculo[i] = new Array();	
				
				var ultima_distancia = new Array();
				ultima_distancia[i] = new Array();	
				
				var ultima_tempo = new Array();
				ultima_tempo[i] = new Array();	
				
				ultima_veiculo[i].push((totaldistance/1000).toFixed(2));
				ultima_distancia[i].push(junta_veiculo[i].id_do_veiculo);
				ultima_tempo[i].push(secondsToHms(segundos));
				
				
				
				document.getElementById('ultimao').value += ultima_veiculo;
				document.getElementById('ultimao_2').value += ultima_distancia;
				document.getElementById('ultimao_3').value += ultima_tempo;
				
				var infowindow = new google.maps.InfoWindow();
				
				var nome_best=[];
				var endereco_best=[];
				var codigo_pedido_best=[];
				var obs_pedido_best=[];
				var id_cli_best=[];
				var id_veiculo_best=[];
				
				var ordem_best=[];
				
				var rota_qual=[];
				
				document.getElementById('div16').innerHTML += "<div id=" + vistitaae + ">";

        document.getElementById(vistitaae).innerHTML += "<br>";
				for (var w = 0; w < orders.length; w++) {
					
							ordem = orders[w];	
						
							meu_array_iddocara[i].push(datay[ordem].veiculo);
											
							meu_array[i].push(datay[ordem].cliente);
							meu_array2[i].push(datay[ordem].local);
							meu_endereco[i].push(datay[ordem].endereco);
							meu_pedido[i].push(datay[ordem].codigo_pedido);
							meu_obs[i].push(datay[ordem].obs_pedido);							
							meu_iddoveiculo[i].push(datay[ordem].id_veiculo);
					
							ordem_certo_entrega[i].push(result.routes[0].legs[w].distance.value/1000);
					
							meu_distancia[i].push(result.routes[0].legs[ordem].distance.value/1000);


              ordem_certo_tempo[i].push(secondsToHms(result.routes[0].legs[w].duration.value/60));

							meu_tempo[i].push(secondsToHms(result.routes[0].legs[ordem].duration.value/60));
             // alert(meu_distancia[i]);
						//	alert(meu_tempo[i]);
							somai = i+1;
							
							meu_rota[i].push(somai);
							
							nome_best[w] = meu_array[i][w];
							endereco_best[w] = meu_endereco[i][w];
							codigo_pedido_best[w] = meu_pedido[i][w];
							obs_pedido_best[w] = meu_obs[i][w];						
							id_cli_best[w] = meu_array_iddocara[i][w];							
							id_veiculo_best[w] = meu_iddoveiculo[i][w];
					
							
							rota_qual[w] = meu_rota[i][w];
							
							//alert("Rota " + somai);						
							ww = w + 1;
							///ordem
							meu_ordem[i].push(ww);
							
						
							var n = ww.toString();	
              document.getElementById(vistitaae).innerHTML += "<p>&nbsp;&nbsp;&nbsp;&nbsp;" + ww + ' - ' + 	pontos(meu_array[i][w], 36) + " - <strong>" + result.routes[0].legs[w].distance.text + "</strong></p>";	
							//document.getElementById(vistitaae).innerHTML += endereco_best[w];
							//document.getElementById(vistitaae).innerHTML += "•" + result.routes[0].legs[w].end_address;
							//document.getElementById(vistitaae).innerHTML +=  + " - ";	
							
							
							
				
							icone = junta_veiculo[i].veiculo;
							latlng = meu_array2[i][w];
							
							    var lat = latlng.replace(/\s*\,.*/, ''); // first 123
      						var lng = latlng.replace(/.*,\s*/, ''); // second ,456
       						var locate = new google.maps.LatLng(parseFloat(lat), parseFloat(lng)); 
							

							//ordem_best[w] = meu_ordem[i][w];

							marker = new MarkerWithLabel({
    						position: locate,
     						map: map,
							icon: icone,
    						optimized: true,
							clickable: true,	
							
							 labelContent: n,
      						 labelAnchor: new google.maps.Point(12, 64),
       						 labelClass: 'labels', // the CSS class for the label
							 labelInBackground: true,
							 labelStyle: {opacity: 0.90}
							
 							});
									
							google.maps.event.addListener(marker, 'click', (function(marker, w) {
                			return function() {
                    		infowindow.setContent('<div id="info"><p id="legenda1"><strong>' +  nome_best[w]  + '</strong></p></div>' + '<p id="legenda3"><strong>Cód. do pedido:</strong>' + codigo_pedido_best[w]  + '</p><p id="legenda3"><strong>Obs. do pedido:</strong>' + obs_pedido_best[w]  + '</p>' + '<p id="legenda3">' + endereco_best[w]  + '</p></div>');
                    		infowindow.open(map, marker);
               		 		}})(marker, w)); 	
							
	
							}
							//www= ww + 1
				document.getElementById(vistitaae).innerHTML += "<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;RETORNO - " + result.routes[0].legs[ww].distance.text + "</strong></p>";
				
			
				//meu_distancia = meu_distancia.reverse();
				document.getElementById('div16').innerHTML += "</div>";	
				document.getElementById('div16').innerHTML += "<br />";			
				document.getElementById('yyy').value += meu_ordem;
				document.getElementById('xxx').value += meu_array_iddocara;							
				document.getElementById('zzz').value += meu_iddoveiculo;							
				document.getElementById('www').value += meu_rota;							
				document.getElementById('qqq').value += ordem_certo_entrega;
				document.getElementById('kkk').value += ordem_certo_tempo;
				document.getElementById('eee').value += meu_pedido;

				document.getElementById('inicio').value = inicio;	
        document.getElementById('final').value = final;	
				
				

				
				//alert(result.routes[0].legs[ww].distance.text);
							
				
				datay.splice(0, orders.length);
				datax.splice(0, orders.length);
				
				
                // Create a unique DirectionsRenderer 'i'
                renderArray[i] = new google.maps.DirectionsRenderer(); 
                renderArray[i].setMap(map);
			

			  
                renderArray[i].setOptions({
                    preserveViewport: false,
                    suppressInfoWindows: true,
					suppressMarkers: true,
					    polylineOptions: {
                        strokeWeight: 3,
                        strokeOpacity: 1,
                        strokeColor: junta_veiculo[i].cor,
                    	},
                });
				
				
       
				Mudarestado_fechado(vistitaae);
				
                renderArray[i].setDirections(result);				
				
                nextRequest();
                
				
            }
           
				
 	
        } 
		
	
			
		
		

        function nextRequest(){
            // Increase the counter
            i++;
			
            // Make sure we are still waiting for a request
            if(i >= requestArray.length){
                // No more to do
                document.forms["salvala"].submit();
                return;
                
            }
            // Submit another request
          setTimeout(submitRequest, 500);
			
        	}

       	 // This request is just to kick start the whole process
         setTimeout(submitRequest, 500);
         
   		 }

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
        
        
   
    // Called Onload
    function init() {

        
        var mapOptions = {
            center: new google.maps.LatLng(-23, -46.13),
            zoomControl: true,
		 	      zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.HORIZONTAL_BAR,
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },
            mapTypeControl: false,
			streetViewControl: false,
			disableDefaultUI: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles: styles
        };
            
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
	//	alert(haversine(-23.571335, -46.658728, -23.5294357, -46.8862839));

		//var TrafficLayer = new google.maps.TrafficLayer();
  		//TrafficLayer.setMap(map);
  
        // Start the request making
        generateRequests();
       
    }
	
   
    // Get the ball rolling and trigger our init() on 'load'
    google.maps.event.addDomListener(window, 'load', init);
    




