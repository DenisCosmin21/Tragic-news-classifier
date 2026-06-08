<?php

namespace App\Enums;

use function Laravel\Prompts\select;

enum DomainScoreClass: string
{
    case TRAGIC = 'tragic';

    case NORMAL = 'normal';

    case GOOD = 'good';

    case UNEXISTENT = 'unexistent';

    public static function fromScore(?float $score): self
    {
        return match(true) {
            $score == NULL => self::UNEXISTENT,
            $score >= 70 => self::TRAGIC,
            $score >= 30 && $score < 70 => self::NORMAL,
            $score < 30 => self::GOOD,
        };
    }
}
