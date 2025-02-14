<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string|null $nombre
 * @property string|null $passwd
 * @property string|null $email
 * 
 * @property Collection|LogAcceso[] $log_accesos
 * @property Collection|Rol[] $rols
 */
class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';  // Nombre de la tabla en la BD
    public $timestamps = false;    // Desactivar timestamps si la tabla no tiene `created_at` y `updated_at`

    protected $fillable = [
        'nombre',
        'passwd',
        'email'
    ];

    protected $hidden = [
        'passwd'  // Oculta la contraseña en respuestas JSON
    ];

    // Laravel necesita este método para reconocer la contraseña
    public function getAuthPassword()
    {
        return $this->passwd;
    }

    /* Relaciones */
    public function log_accesos()
    {
        return $this->hasMany(LogAcceso::class, 'id_usuario');
    }

    public function rols()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol', 'id_usuario', 'id_rol')
                    ->withPivot('id', 'fecha_creacion');
    }
}
