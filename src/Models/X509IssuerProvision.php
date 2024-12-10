<?php

namespace Joinbiz\Data\Models\Security;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $cert_provision_id
 * @property string $common_name
 * @property string $organizational_unit
 * @property string $organization_name
 * @property string $city_locality
 * @property string $state_province
 * @property string $country
 * @property string $serial_number
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 */
class X509IssuerProvision extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'x509_issuer_provision';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'cert_provision_id';

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
    protected $fillable = ['common_name', 'organizational_unit', 'organization_name', 'city_locality', 'state_province', 'country', 'serial_number', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];
}
