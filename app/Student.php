<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use Notifiable;
    use LogsActivity;
        
    protected $fillable = [
        'active','name','birthDate','paymentDay','CPF','RG','cellphone','sponsorCPF','sponsorRG',
        'mail','street','neighborhood','CEP','city','classDays','familyHistory',
        'medicine','medicineName','frequency','paymentAmount'
    ];

    protected static $logAttributes = [
        'active','name','birthDate','paymentDay','CPF','RG','cellphone','sponsorCPF','sponsorRG',
        'mail','street','neighborhood','CEP','city','classDays','familyHistory',
        'medicine','medicineName','frequency','paymentAmount'
    ];
    
    public function payments(){
        return $this->hasMany('App\Payment','student_id');
    }
}
