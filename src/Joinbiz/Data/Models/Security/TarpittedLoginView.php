<?php

namespace Joinbiz\Data\Models\Security;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $view_name_id
 * @property string $user_login_id
 * @property float $tarpit_release_date_time
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 */
class TarpittedLoginView extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tarpitted_login_view';

    /**
     * @var array
     */
    protected $fillable = ['tarpit_release_date_time', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];
}
