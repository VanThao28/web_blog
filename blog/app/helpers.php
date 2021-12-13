<?php
 use Illuminate\Support\Str;
 if (!function_exists('ShowImageUsers')) {
     function ShowImageUsers($image_user)
     {
         if (Str::contains($image_user, 'http')) {
             return $image_user;
         }
         return asset('storage/users_image/' . $image_user);
     }
 }
