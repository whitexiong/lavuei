<?php

namespace App\Enum;

enum UserRoleEnum: int
{
    case ADMIN = 0;  // 管理员权限
    case USER = 1; // 用户权限
}