<?php

namespace Joinbiz\Data\Models\Security;

use Joinbiz\Data\Models\Common\PortalPage;
use Joinbiz\Data\Models\Party\PartyRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $group_id
 * @property string $group_name
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PartyRelationship[] $partyRelationshipsBySecurityGroupId
 * @property ProtectedView[] $protectedViews
 * @property PortalPage[] $portalPagesBySecurityGroupId
 * @property SecurityGroupPermission[] $securityGroupPermissions
 * @property UserLoginSecurityGroup[] $userLoginSecurityGroups
 */
class SecurityGroup extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'security_group';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'group_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['group_name', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partyRelationshipsBySecurityGroupId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Party\PartyRelationship', 'security_group_id', 'group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function protectedViews()
    {
        return $this->hasMany('Joinbiz\Data\Models\Security\ProtectedView', 'group_id', 'group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function portalPagesBySecurityGroupId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Common\PortalPage', 'security_group_id', 'group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function securityGroupPermissions()
    {
        return $this->hasMany('Joinbiz\Data\Models\Security\SecurityGroupPermission', 'group_id', 'group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userLoginSecurityGroups()
    {
        return $this->hasMany('Joinbiz\Data\Models\Security\UserLoginSecurityGroup', 'group_id', 'group_id');
    }
}
