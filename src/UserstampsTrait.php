<?php

namespace Hrshadhin\Userstamps;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserstampsTrait
 *
 * @property int created_by
 * @property int updated_by
 * @property int deleted_by
 * @method   string getTable()
 * @method   void observe($observer)
 * @method   BelongsTo belongsTo($related, $foreignKey = null, $otherKey = null, $relation = null)
 * @package  Hrshadhin\Userstamps
 */

trait UserstampsTrait
{
    /**
     * Boot the userstamps trait for a model.
     *
     * @return void
     */
    public static function bootUserstampsTrait()
    {
        static::observe(new UserstampsTraitObserver);
    }
    
}