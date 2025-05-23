<?php

namespace Joinbiz\Data\Models\Security;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $group_id
 * @property string $permission_id
 * @property string $from_date
 * @property string $thru_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property SecurityGroup $securityGroup
 */
class SecurityGroupPermission extends Model
{
    const CREATED_AT = 'created_stamp';

    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'security_group_permission';

    /**
     * @var array
     */
    protected $fillable = ['thru_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function securityGroup()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Security\SecurityGroup', 'group_id', 'group_id');
    }
}
