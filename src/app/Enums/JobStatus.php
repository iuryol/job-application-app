<?php

namespace App\Enums;

enum JobStatus:string
{
    case STOPPED = 'stopped';
    case OPENED = 'opened';
    case CLOSED = 'closed';

    public function label():string
    {
        return match($this) {
            self::STOPPED => 'Pausado',
            self::OPENED => 'Aberto',
            self::CLOSED => 'Concluido',
        };
    }

    public static function options():array
    {
        return array_map(fn($case) => [
            'value' => $case->value,
            'label' => $case->label()
        ],self::cases());
    }

}
