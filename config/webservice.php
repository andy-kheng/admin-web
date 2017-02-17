<?php
   $config = array();
   if(env('APP_ENV')=='local'){

      $config = array(
          'scheme'        => env('SCHEME' , 'http'),
          'hostname'      => env('HOSTNAME' , 'localhost:3000'),
          'client_id'     => '50e5cae0632948c5a94ea6a11ebbb902',
          'client_secret' => '4da6a5e899a94f3d9aa314219519b7eae0768c4a',
      );

   }elseif(env('APP_ENV')=='development'){

      $config = array(
          'scheme'        => env('SCHEME' , 'https'),
          'hostname'      => env('HOSTNAME' , 'apidev.tesjor.com'),
          'client_id'     => '4be8674673d0438e9601d0120466118e',
          'client_secret' => '8c189340db0ee8dfcc96db4ccabe8cf489e68497',
      );

   }elseif(env('APP_ENV')=='production'){

      $config = array(
          'scheme'        => env('SCHEME' , 'https'),
          'hostname'      => env('HOSTNAME' , 'api.tesjor.com'),
          'client_id'     => '50e5cae0632948c5a94ea6a11ebbb902',
          'client_secret' => '4da6a5e899a94f3d9aa314219519b7eae0768c4a',
      );

   }else{

      $config = array(
          'scheme'        => env('SCHEME' , 'http'),
          'hostname'      => env('HOSTNAME' , '104.155.233.209:3000'),
          'client_id'     => '50e5cae0632948c5a94ea6a11ebbb902',
          'client_secret' => '4da6a5e899a94f3d9aa314219519b7eae0768c4a',

      );
   }

  return $config;
