<?php
require_once('bootstrapping.php');
// $session = new SessionHandle();
// if ($session->confirm_logged_in()) {
//   $redirect = new Redirector("login");
// } else {
  $r = new RouterController();
  $request = $_SERVER['REQUEST_URI'];
  $r->routerRedirect($request);
  // $r->routerRedirect($request, '/', 'home');


?>