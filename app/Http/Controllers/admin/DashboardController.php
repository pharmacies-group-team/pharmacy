<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\FinancialOperationsServices;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  //********* get all financial operations *********//
  public function getFinancialOperations()
  {
    return FinancialOperationsServices::getFinancialOperations('admin');
  }
}
