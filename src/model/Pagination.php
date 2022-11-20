<?php

namespace MyApp\model;

class Pagination
{
   public function drawPager($totalItems, $perPage){

       $pages = ceil($totalItems / $perPage);

       if(!isset($_GET['page']) || intval($_GET['page']) == 0){
           $page = 1;
       } elseif (intval($_GET['page'])> $totalItems){
           $page = $pages;
       } else {
           $page = intval($_GET['page']);
       }
   }
}