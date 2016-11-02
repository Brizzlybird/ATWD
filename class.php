<?php

/**
  * @author Clare Marsh
*/

abstract class BaseEndpoint {

  //use DateTime;
//  use Exception;

  private $httpversion = "HTTPS/1.1";

  const DEFAULT_PROTOCOL = "https";
  const DEFAULT_CLIENT = "curl";
  const API = 'https://openexchangerates.org/api';
  const LATEST = 'https://openexchangerates.org/api/latest.json';
  const CURRENCIES = 'https://openexchangerates.org/api/currencies.json';
  const BASE_CURRENCY = 'GBP';

  /**
  *  @var array
  *    app_id -> API Key
  *    base -> Currency used as base for conversion
  *    All data required for connecting to Open Currency Exchange
  */

  protected $config = array(
    'app_id'    => 'd1558d5cc7d9480d866a9f51e6e0ccdb',
    'client'    => DEFAULT_CLIENT,
    'protocol'  => DEFAULT_PROTOCOL,
    'base'      => BASE_CURRENCY
  );


  /**
    * @param $date, $config
  */

  //Should I be using curl subrequest handling?

    function __construct($date, $config) {

      //$post_data = $config;
      $app_id = $config['app_id'];

      $url = LATEST . '?app_id=' . $app_id;

      //Open curl
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      //Retrieve latest
      $json_data = curl_exec($curl);
      if ($json_data === false) {
        $error = curl_getinfo($curl);
        curl_close($curl);
        //return XML error
        die('An error occured:' . var_export($error));
      }
      curl_close($curl);

      //var_dump($json_data);
      //Decode response
      $latest = json_decode($json_data);

      printf(
        "1 %s equals %s GBP",
        $latest->base,
        $latest->rates->GBP
      );

    }

    function build_xml($json_data) {
        //$url = 'http://www.currency-iso.org/dam/downloads/lists/list_one.xml';



    }


  }
