<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
  use Notifiable;

      protected $guard = 'admin';

      protected $fillable = [
          'name', 'email', 'password',
      ];

      protected $hidden = [
          'password', 'remember_token',
      ];
}
