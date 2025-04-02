<?php

namespace App\Enums;

enum JobType:string
{
    case CLT = 'clt';
    case PJ = 'pj';
    case FREELANCER = 'freelancer';
   

    public function label():string
    {
        return match($this){
            self::CLT => 'Clt',
            self::PJ => 'Pessoa Jurídica',
            self::FREELANCER => 'Freelancer'
        };
    }
    
    public static function options():array
    {
        return array_map( fn($case) => [
            'value' => $case->value,
            'label' => $case->label()
        ],self::cases());
    }
}


