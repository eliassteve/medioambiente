<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LogAcceso extends Model
{
    protected $table = 'log_acceso';
    public $timestamps = false;

    protected $casts = [
        'id_usuario' => 'int',
        'fecha_reg' => 'datetime'
    ];

    protected $fillable = [
        'id_usuario',
        'fecha_reg',
        'descripcion'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
