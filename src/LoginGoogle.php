<?php 

use Composer\Autoload\ClassLoader;

class LoginGoogle
{
     public function index()
     {
          $client = new Google_Client();
          if($client)
          {
               echo "Không xảy ra lỗi gì";
               die;
          }
     }
}



?>