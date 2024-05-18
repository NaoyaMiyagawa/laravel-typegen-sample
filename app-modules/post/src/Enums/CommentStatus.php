<?php

namespace Modules\Post\Enums;

enum CommentStatus: string
{
    case Visible = 'visible';
    case Hidden = 'hidden';
}
