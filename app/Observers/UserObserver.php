<?php

namespace App\Observers;

use App\Enum\UserRoleEnum;
use App\Models\User;
use Hash;

class UserObserver
{
    /**
     * 监听数据即将创建的事件。
     *
     * @param  User $user
     * @return void
     */
    public function creating(User $user)
    {

    }

    /**
     * 监听数据创建后的事件。
     *
     * @param  User $user
     * @return void
     */
    public function created(User $user)
    {

    }

    /**
     * 监听数据即将更新的事件。
     *
     * @param  User $user
     * @return void
     */
    public function updating(User $user)
    {

    }

    /**
     * 监听数据更新后的事件。
     *
     * @param  User $user
     * @return void
     */
    public function updated(User $user)
    {

    }

    /**
     * 监听数据即将保存的事件。
     *
     * @param  User $user
     * @return void
     */
    public function saving(User $user)
    {

    }

    /**
     * 监听数据保存后的事件。
     *
     * @param  User $user
     * @return void
     */
    public function saved(User $user)
    {

    }

    /**
     * 监听数据即将删除的事件。
     *
     * @param  User $user
     * @return void
     */
    public function deleting(User $user)
    {

    }

    /**
     * 监听数据删除后的事件。
     *
     * @param  User $user
     * @return void
     */
    public function deleted(User $user)
    {

    }

    /**
     * 监听数据即将从软删除状态恢复的事件。
     *
     * @param  User $user
     * @return void
     */
    public function restoring(User $user)
    {

    }

    /**
     * 监听数据从软删除状态恢复后的事件。
     *
     * @param  User $user
     * @return void
     */
    public function restored(User $user)
    {

    }
}
