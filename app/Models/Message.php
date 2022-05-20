<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  use HasFactory;
  protected $fillable = [
    'from', 'to', 'message', 'is_read'
  ];


  public function toUser()
  {
    return $this->belongsTo(User::class, 'to');
  }

  public function fromUser()
  {
    return $this->belongsTo(User::class, 'from');
  }
}
