<?php

namespace Joinbiz\Data\Models\Security;

use Illuminate\Database\Eloquent\Model;
use Joinbiz\Data\Models\Common\Enumeration;

/**
 * @property string $question_enum_id
 * @property string $user_login_id
 * @property string $security_answer
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Enumeration $enumerationByQuestionEnumId
 * @property UserLogin $userLogin
 */
class UserLoginSecurityQuestion extends Model
{
    const CREATED_AT = 'created_stamp';

    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_login_security_question';

    /**
     * @var array
     */
    protected $fillable = ['security_answer', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByQuestionEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Enumeration', 'question_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLogin()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Security\UserLogin', 'user_login_id', 'user_login_id');
    }
}
