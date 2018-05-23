<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use Notifiable;

    protected $fillable = ['full_name', 'acc_name', 'cpf'];
}
