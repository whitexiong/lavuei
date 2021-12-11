<?php

namespace App\Enum;

enum ArticleStatusEnum: int
{
    case ENABLE = 1;  // 启用
    case DISABLE = 0; // 禁用
}