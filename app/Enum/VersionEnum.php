<?php

namespace App\Enum;

enum VersionEnum: int
{
    case ENABLE = 1;  // 保存为历史版本
    case DISABLE = 0; // 不保存
}