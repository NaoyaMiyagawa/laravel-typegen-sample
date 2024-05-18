<?php

namespace Modules\Post\Enums;

enum PostStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
    case Unpublished = 'unpublished';
}
