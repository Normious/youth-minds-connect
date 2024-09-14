<?php

namespace App\Http\Controllers;

abstract class Controller
{
  public function someFunction()
  {
      if (auth()->user()->hasRole('admin')) {
          // Perform admin actions
      }
  
      if (auth()->user()->can('edit articles')) {
          // Perform edit actions
      }
  }
  
}
