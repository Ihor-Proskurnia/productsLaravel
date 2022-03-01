<?php

namespace App\Http\Models;

use App\Library\SoftDelete\SoftDeletes;
use App\Http\Library\Utility\AccessUtil;
use Illuminate\Database\Eloquent\Model;

class AppModel extends Model
{
    use AccessUtil;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(
            function ($model) {
                $model->addServerModifiedTimestamp();
                $model->addModifiedBy();
            }
        );

        static::updating(
            function ($model) {
                $model->addServerModifiedTimestamp();
                $model->addModifiedBy();
            }
        );

        static::deleting(
            function ($model) {
                $model->addServerModifiedTimestamp();
                $model->addModifiedBy();
            }
        );

        // static::restoring(
        //     function ($model) {
        //         $model->addServerModifiedTimestamp();
        //         $model->addModifiedBy();
        //     }
        // );
    }

    /**
     * @return void
     */
    public function addServerModifiedTimestamp()
    {
        if (isset($this->server_modified)) {
            $this->server_modified = microtime(true);
        }
    }

    /**
     * @param int|null $userId
     *
     * @return void
     */
    public function addModifiedBy($userId = null)
    {
        if (isset($this->modified_by)) {
            $this->modified_by = $userId ?? $this->getSessionUserId();
        }
    }

    /**
     * @param int|null $userId
     *
     * @return void
     */
    public function deleteBy($userId = null)
    {
        $this->addModifiedBy($userId);
        $this->save();
        $this->touch();
        $this->delete();
    }

    /**
     * @param int|null $userId
     *
     * @return void
     */
    public function touchBy($userId = null)
    {
        $this->addServerModifiedTimestamp();
        $this->addModifiedBy($userId);
        $this->save();
        $this->touch();
    }
}
