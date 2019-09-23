<?php


function getBuyerName($id_buyer){

     $user = App\User::find($id_buyer);
     return $user->email;


}