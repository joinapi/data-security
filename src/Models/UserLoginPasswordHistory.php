<?php

namespace Joinbiz\Data\Models\Security;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $user_login_id
 * @property string $from_date
 * @property string $thru_date
 * @property string $current_password
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property UserLogin $userLogin
 */
class UserLoginPasswordHistory extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_login_password_history';

    /**
     * @var array
     */
    protected $fillable = ['thru_date', 'current_password', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLogin()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Security\UserLogin', 'user_login_id', 'user_login_id');
    }
}
