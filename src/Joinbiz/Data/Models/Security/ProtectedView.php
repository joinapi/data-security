<?php

namespace Joinbiz\Data\Models\Security;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $group_id
 * @property string $view_name_id
 * @property float $max_hits
 * @property float $max_hits_duration
 * @property float $tarpit_duration
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property SecurityGroup $securityGroup
 */
class ProtectedView extends Model
{
    const CREATED_AT = 'created_stamp';

    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'protected_view';

    /**
     * @var array
     */
    protected $fillable = ['max_hits', 'max_hits_duration', 'tarpit_duration', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function securityGroup()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Security\SecurityGroup', 'group_id', 'group_id');
    }
}
