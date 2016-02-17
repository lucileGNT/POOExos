<?php

namespace MonApp\Classes;

trait MonTrait
{
  public function hello()
  {
    echo 'Hello world !';
  }

  public function formaterPrix($prix){
  	return number_format($prix,2,',',' ')."€";
  }
}