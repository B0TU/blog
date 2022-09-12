<?php

namespace App\Support\Enums;

enum PostState: string
{
    case Draft = 'draft';
    case Pending = 'pending';
    case Approved = 'approved';
}