<?php
define ("CKFINDER_VERSION","1.4.2.G");
/*
Version History:
  1.4.2.g (2012-09-10)
    1) Now uses db_connect.php for DB connection
  1.4.2.f (2011-07-31)
    1) Changed path for include config and shared for new location of this file
  1.4.2.e (2010-09-03)
    1) Include path for shared now set depending on platform
  1.4.2.d (2010-09-01)
    1) Removed almost everything into new ckfinder class
       Previous 1.4.5 releases had the wrong version codes
  1.4.5.c (2010-05-17)
    1) Changed label on Images folder to Image to remove some confusion
    2) Added 'ico' to list of acceptable image extensions
  1.4.5.b (2010-05-13)
    1) Disabled image resizing 'feature'
  1.4.5.a (2010-02-03)
    1) Now configured for CK Finder 1.4.5 (was 1.2.2 - failed with FF 3.6)
  1.2.2.d (2008-12-01)
    1) Now system always checks for site URL to establish BASE_PATH
  1.2.2.c (2008-06-23)
    1) Added code in CheckAuthentication() to load system record and establish site base path
  1.2.2.b (2008-05-13)
    1) Added Portal authentication code in CheckAuthentication() and configured
       for legacy UserFiles paths
  1.2.2
    1) Initial Release from CKFinder site
*/

switch(strToUpper(PHP_OS)){
  case "WIN32":
  case "WINDOWS":
  case "WINNT":
    define("SYS_SHARED","c:/shared/");
  break;
  default:
    define("SYS_SHARED","../../../../../shared/");
  break;
}
@include_once("../../../../../config.php");
include_once(SYS_SHARED."db_connect.php");
include_once(SYS_SHARED."codebase.php");

$Obj_Ckfinder = new CKFinder;
$Obj_Ckfinder->config($config);

function CheckAuthentication() {
  $Obj_Ckfinder = new CKFinder;
  return $Obj_Ckfinder->check_authentication();
}

?>