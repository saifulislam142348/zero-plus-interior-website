<?php

namespace App\Enums;

use App\Enums\Concerns\EnumAttributes;

enum ProjectStatuses: string
{
    use EnumAttributes;

    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';

}
