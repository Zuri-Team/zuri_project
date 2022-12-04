<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function routeNotificationForWhatsApp()
{
    $phone_number = '08121326225';
  return $this->$phone_number;
}
}
