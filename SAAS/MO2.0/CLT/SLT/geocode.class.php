<?php
   //todo http://maps.googleapis.com/maps/api/geocode/xml?sensor=false&address=ulica%20nr%201%202,Warsaw,pl

  class geocode {

    private $_URL = "http://maps.googleapis.com/maps/api/geocode/xml?sensor=false&language=pt-BR&address=";
    private $_LAT;
    private $_LNG;
    private $_ACCURACY;
    private $_PARTIAL = false;
    private $_STATUS = -4;
    private $_FORMAT;
    private $_STREET;
    private $_NUMBER;
    private $_POSTAL;
    private $_PRECISSION = 0;

    /* bool returns true or false, true on result false on no result
     */
    public function __construct ($address, $city, $estado, $cep, $country) {
      $url = $this->_URL . urlencode($address) . "," . urlencode($city) . "-" . urlencode($estado) . "," . urlencode($CEP) . "," . urlencode($country);
      if ($xml = @simplexml_load_file($url)) {
		  //print_r($xml);
        switch ($xml->status) {
          case "OK":
            $this->_LAT = $xml->result->geometry->location->lat;
            $this->_LNG = $xml->result->geometry->location->lng;
            $this->_ACCURACY = $xml->result->geometry->location_type;
			
            if ($xml->result->partial_match) {
              $this->_PARTIAL = true;
            }
            if (!is_array ($xml->result->type)) {
              switch ($xml->result->type) {
                case "post_box":
                case "floor":
                case "room":
                  $this->_PRECISSION = 3;
                break;
                case "street_number":
                  $this->_PRECISSION = 2;
                break;
                case "street_address":
                  $this->_PRECISSION = 1;
                break;

                default :
                  $this->_PRECISSION = 0;
                break;
              }
            } else {
              	  $this->_PRECISSION = -1;
            }
            $this->_FORMAT = $xml->result->formatted_address;
            foreach ($xml->result->address_component as $_list) {
              switch ($_list->type) {
                case "street_number":
                  $this->_NUMBER = $_list->long_name;
                break;			
                case "postal_code":
                  $this->_POSTAL = $_list->long_name;
                break;
                case "postal_code_prefix":
                  $this->_POSTALPREFIX = $_list->long_name;
                break;				
                case "neighborhood":
                  $this->_NEIGH = $_list->long_name;
                break;
                case "route":
                  $this->_STREET = $_list->long_name;
                break;
                case "country":
                  $this->_COUNTRY = $_list->short_name;
                break;
                case "administrative_area_level_2":
                  $this->_CIDADE = $_list->long_name;
                break;				
                case "administrative_area_level_1":
                  $this->_ESTADO = $_list->short_name;
                break;					
                default:
                break;
              }
            }
            $this->_STATUS = 1;
          break;
          case "ZERO_RESULTS":
            $this->_STATUS = 0;
          break;
          case "OVER_QUERY_LIMIT":
            $this->_STATUS = -1;
          break;
          case "REQUEST_DENIED":
            $this->_STATUS = -2;
          break;
          case "INVALID_REQUEST":
            $this->_STATUS = -3;
          break;
          default:
            $this->_STATUS = -4;
          break;
        }
        return true;
      }
      return false;
    }

    /* double returns latitude
     */
    public function lat () {
      return $this->_LAT;
    }

    /* double returns longtitude
     */
    public function lng () {
      return $this->_LNG;
    }


    public function country () {
      return $this->_COUNTRY;
    }
    /* string returns streetname
     */
    public function street () {
      return $this->_STREET;
    }

    /* string returns street number
     */
    public function number () {
      return $this->_NUMBER;
    }

    public function postal () {
      return $this->_POSTAL;
    }
	
    public function postalprefix () {
      return $this->_POSTALPREFIX;
    }
	
    public function neighborhood () {
      return $this->_NEIGH;
    }
	
	public function cidade () {
      return $this->_CIDADE;
    }
	public function estado () {
      return $this->_ESTADO;
    }	
    /* string returns postal code
     */
    public function format () {
      return $this->_FORMAT;
    }

    /* int returns precission -1 to 3
     * -1: multiple results
     *  0: from route level to up (default)
     *  1: street address
     *  2: street number
     *  3: room, floor, post box
     */
    public function precission () {
      return $this->_PRECISSION;
    }

    /* bool return true on partialmatch otherwise false
     */
    public function partial () {
      return $this->_PARTIAL;
    }

    /* int returns range from 2 to -2, ..
     *  2: indica que o resultado retornado é um geocódigo preciso para os quais temos informações sobre a localização exata de rua, precisão do endereço.
     *  1: indica que o resultado retornado reflete uma aproximação interpolada entre dois pontos precisos (como interseções ) . 
     *  0: default
     * -1: indica que o resultado devolvido é o centro geométrico do resultado , tais como um polígono ( por exemplo , uma rua ) ou polígono ( região ) .
     * -2: indica que o resultado retornado é aproximada.
     */
    public function accuracy () {
      switch ($this->_ACCURACY) {
        case "ROOFTOP":
          return 2;
        break;
        case "RANGE_INTERPOLATED":
          return 1;
        break;
        case "GEOMETRIC_CENTER":
          return -1;
        break;
        case "APPROXIMATE":
          return -2;
        break;
        default:
          return 0;
        break;
      }
    }

    /* int returns range from 1 to -4
     *  1: indica que nenhum erro ocorreu ; o endereço foi analisado com êxito e , pelo menos, um geocódigo foi devolvido.
     *  0: indica que a geocodificação foi bem sucedida, mas nao teve resultados. Isso pode ocorrer se foi passado um endereço inexistente para a geocodificação  ou um latlng em um local remoto.
     * -1: indica que está sobre a sua quota.
     * -2: indica que o seu pedido foi negado, geralmente devido à falta de um parâmetros.
     * -3: geralmente indica que a consulta ( endereço ) está ausente.
     * -4: Padrão, ou nenhum pedido foi feito , ou foi feito sem sucesso
     */
    public function status () {
      return $this->_STATUS;
    }

    public function __destruct () {
      unset ($this->_URL);
      unset ($this->_LAT);
      unset ($this->_LNG);
      unset ($this->_PARTIAL);
      unset ($this->_ACCURACY);
      unset ($this->_STATUS);
      unset ($this->_FORMAT);
      unset ($this->_STREET);
      unset ($this->_NUMBER);
      unset ($this->_POSTAL);
      unset ($this->_PRECISSION);
      foreach(get_object_vars($this) as $k => $v) {
        unset($this->$k);
      }
    }
  }

?> 