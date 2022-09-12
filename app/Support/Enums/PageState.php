<?php

namespace App\Support\Enums;

enum PageState: string
{
    case Published = 'published';
    case Unpublished = 'unpublished';
}