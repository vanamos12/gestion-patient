<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'patient_id',
        'type_consult',
        'montant_consult',
        'nombre_consult',
        'type_examen',
        'montant_examen',
        'nombre_examen',
        'date_consult',
        'commission_cabinet',
        'net_percu',
        
    ];

    protected $with = [
        'patient',
    ];

    public function patient():BelongsTo{
        return $this->belongsTo(Patient::class, 'patient_id');
    }

}
