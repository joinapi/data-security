<?php

namespace Joinbiz\Data\Models\Security;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $user_login_id
 * @property string $from_date
 * @property string $party_id
 * @property string $visit_id
 * @property string $thru_date
 * @property string $password_used
 * @property string $successful_login
 * @property string $origin_user_login_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Party $party
 * @property UserLogin $userLogin
 */
class UserLoginHistory extends Model
{
    const CREATED_AT = 'created_stamp';

    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_login_history';

    /**
     * @var array
     */
    protected $fillable = ['party_id', 'visit_id', 'thru_date', 'password_used', 'successful_login', 'origin_user_login_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLogin()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Security\UserLogin', 'user_login_id', 'user_login_id');
    }
}
