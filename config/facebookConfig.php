<?php
session_start();
require_once('./Facebook/autoload.php');

$FBObject = new \Facebook\Facebook([
  'app_id'=> '669471120136390',
  'app_secret'=> '12b21eb84677092e20cb08040353964c',
  'default_graph_version'=> 'v2.10'
]);

$handler =$FBObject -> getRedirectLoginHelper();