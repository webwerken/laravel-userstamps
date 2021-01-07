<?php

namespace Hrshadhin\Userstamps;

/**
 * Class Userstamps
 *
 * @package Hrshadhin\Userstamps
 */
class UserstampsTraitObserver
{
    /**
     * Model's creating event hook.
     *
     * @param \Hrshadhin\Userstamps\UserstampsTrait $model
     */
    public function creating($model)
    {
        if (! $model->created_by) {
            $model->created_by = $this->getAuthenticatedUsername();
        }

        if (! $model->updated_by) {
            $model->updated_by = $this->getAuthenticatedUsername();
        }
       
    }

    /**
     * Model's updating event hook.
     *
     * @param \Hrshadhin\Userstamps\UserstampsTrait $model
     */
    public function updating($model)
    {
        if (! $model->isDirty('updated_by')) {
            $model->updated_by = $this->getAuthenticatedUsername();
        }
    }
    
     /**
     * Model's saving event hook.
     *
     * @param \Hrshadhin\Userstamps\UserstampsTrait $model
     */
    public function saving($model)
    {
        if (! $model->isDirty('updated_by')) {
            $model->updated_by = $this->getAuthenticatedUsername();
        }
    }

    /**
     * Get authenticated user id depending on model's auth guard.
     *
     * @return int
     */
    protected function getAuthenticatedUsername()
    {
        return auth()->check() ? auth()->user()->username : '';
    }
}
