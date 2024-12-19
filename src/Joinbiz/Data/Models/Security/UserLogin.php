<?php

namespace Joinbiz\Data\Models\Security;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $user_login_id
 * @property string $party_id
 * @property string $current_password
 * @property string $password_hint
 * @property string $is_system
 * @property string $enabled
 * @property string $has_logged_out
 * @property string $require_password_change
 * @property string $last_currency_uom
 * @property string $last_locale
 * @property string $last_time_zone
 * @property string $disabled_date_time
 * @property float $successive_failed_logins
 * @property string $external_auth_id
 * @property string $user_ldap_dn
 * @property string $disabled_by
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property OrderPaymentPreference[] $orderPaymentPreferencesByCreatedByUserLogin
 * @property FinAccountStatus[] $finAccountStatusesByChangeByUserLoginId
 * @property QuoteAdjustment[] $quoteAdjustmentsByCreatedByUserLogin
 * @property CustRequestStatus[] $custRequestStatusesByChangeByUserLoginId
 * @property OrderItem[] $orderItemsByDontCancelSetUserLogin
 * @property OrderItem[] $orderItemsByChangeByUserLoginId
 * @property SalesOpportunity[] $salesOpportunitiesByCreatedByUserLogin
 * @property ProductFeaturePrice[] $productFeaturePricesByCreatedByUserLogin
 * @property ProductFeaturePrice[] $productFeaturePricesByLastModifiedByUserLogin
 * @property ProductPrice[] $productPricesByCreatedByUserLogin
 * @property ProductPrice[] $productPricesByLastModifiedByUserLogin
 * @property ProductPriceChange[] $productPriceChangesByChangedByUserLogin
 * @property OrderHeader[] $orderHeadersByCreatedBy
 * @property ProductReview[] $productReviews
 * @property InventoryItemStatus[] $inventoryItemStatusesByChangeByUserLoginId
 * @property OrderAdjustment[] $orderAdjustmentsByCreatedByUserLogin
 * @property Party[] $partiesByCreatedByUserLogin
 * @property Party[] $partiesByLastModifiedByUserLogin
 * @property ContentAssoc[] $contentAssocsByCreatedByUserLogin
 * @property ContentAssoc[] $contentAssocsByLastModifiedByUserLogin
 * @property OrderItemChange[] $orderItemChangesByChangeUserLogin
 * @property ContactListCommStatus[] $contactListCommStatusesByChangeByUserLoginId
 * @property Party $party
 * @property OrderStatus[] $orderStatusesByStatusUserLogin
 * @property ContactList[] $contactListsByCreatedByUserLogin
 * @property ContactList[] $contactListsByLastModifiedByUserLogin
 * @property Product[] $productsByCreatedByUserLogin
 * @property Product[] $productsByLastModifiedByUserLogin
 * @property InvoiceStatus[] $invoiceStatusesByChangeByUserLoginId
 * @property BudgetStatus[] $budgetStatusesByChangeByUserLoginId
 * @property ShipmentStatus[] $shipmentStatusesByChangeByUserLoginId
 * @property ItemIssuance[] $itemIssuancesByIssuedByUserLoginId
 * @property WorkEffortPartyAssignment[] $workEffortPartyAssignmentsByAssignedByUserLoginId
 * @property Content[] $contentsByCreatedByUserLogin
 * @property Content[] $contentsByLastModifiedByUserLogin
 * @property SalesOpportunityHistory[] $salesOpportunityHistoriesByModifiedByUserLogin
 * @property PartyStatus[] $partyStatusesByChangeByUserLoginId
 * @property SalesForecastHistory[] $salesForecastHistoriesByModifiedByUserLoginId
 * @property DataResource[] $dataResourcesByCreatedByUserLogin
 * @property DataResource[] $dataResourcesByLastModifiedByUserLogin
 * @property SalesForecast[] $salesForecastsByCreatedByUserLoginId
 * @property SalesForecast[] $salesForecastsByModifiedByUserLoginId
 * @property ReturnStatus[] $returnStatusesByChangeByUserLoginId
 * @property JobSandbox[] $jobSandboxesByAuthUserLoginId
 * @property JobSandbox[] $jobSandboxesByRunAsUser
 * @property ProductPromo[] $productPromosByCreatedByUserLogin
 * @property ProductPromo[] $productPromosByLastModifiedByUserLogin
 * @property ReturnAdjustment[] $returnAdjustmentsByCreatedByUserLogin
 * @property ProductPromoCode[] $productPromoCodesByCreatedByUserLogin
 * @property ProductPromoCode[] $productPromoCodesByLastModifiedByUserLogin
 * @property ShipmentReceipt[] $shipmentReceiptsByReceivedByUserLoginId
 * @property RequirementStatus[] $requirementStatusesByChangeByUserLoginId
 * @property PicklistRole[] $picklistRolesByCreatedByUserLogin
 * @property PicklistRole[] $picklistRolesByLastModifiedByUserLogin
 * @property PicklistStatusHistory[] $picklistStatusHistoriesByChangeUserLoginId
 * @property UserLoginSecurityQuestion[] $userLoginSecurityQuestions
 * @property UserLoginHistory[] $userLoginHistories
 * @property UserLoginSecurityGroup[] $userLoginSecurityGroups
 * @property WorkEffortStatus[] $workEffortStatusesBySetByUserLogin
 * @property WorkEffortReview[] $workEffortReviews
 * @property UserLoginPasswordHistory[] $userLoginPasswordHistories
 * @property Timesheet[] $timesheetsByApprovedByUserLoginId
 * @property WebUserPreference[] $webUserPreferences
 * @property TestingStatus[] $testingStatusesByChangeByUserLoginId
 * @property UserLoginSession $userLoginSession
 */
class UserLogin extends Model
{
    const CREATED_AT = 'created_stamp';

    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_login';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_login_id';

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
    protected $fillable = ['party_id', 'current_password', 'password_hint', 'is_system', 'enabled', 'has_logged_out', 'require_password_change', 'last_currency_uom', 'last_locale', 'last_time_zone', 'disabled_date_time', 'successive_failed_logins', 'external_auth_id', 'user_ldap_dn', 'disabled_by', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderPaymentPreferencesByCreatedByUserLogin()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\OrderPaymentPreference', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteAdjustmentsByCreatedByUserLogin()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\QuoteAdjustment', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\CustRequestStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemsByDontCancelSetUserLogin()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\OrderItem', 'dont_cancel_set_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemsByChangeByUserLoginId()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\OrderItem', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesOpportunitiesByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\SalesOpportunity', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productFeaturePricesByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductFeaturePrice', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productFeaturePricesByLastModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductFeaturePrice', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPricesByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductPrice', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPricesByLastModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductPrice', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPriceChangesByChangedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductPriceChange', 'changed_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderHeadersByCreatedBy()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\OrderHeader', 'created_by', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productReviews()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductReview', 'user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventoryItemStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\InventoryItemStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderAdjustmentsByCreatedByUserLogin()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\OrderAdjustment', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partiesByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Party\Party', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partiesByLastModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Party\Party', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contentAssocsByCreatedByUserLogin()
    {
        return $this->hasMany('\ContentAssoc', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contentAssocsByLastModifiedByUserLogin()
    {
        return $this->hasMany('\ContentAssoc', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemChangesByChangeUserLogin()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\OrderItemChange', 'change_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactListCommStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\ContactListCommStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderStatusesByStatusUserLogin()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\OrderStatus', 'status_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactListsByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\ContactList', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactListsByLastModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\ContactList', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productsByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\Product', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productsByLastModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\Product', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itemIssuancesByIssuedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ItemIssuance', 'issued_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workEffortPartyAssignmentsByAssignedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Workeffort\WorkEffortPartyAssignment', 'assigned_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contentsByCreatedByUserLogin()
    {
        return $this->hasMany('\Content', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contentsByLastModifiedByUserLogin()
    {
        return $this->hasMany('\Content', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesOpportunityHistoriesByModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\SalesOpportunityHistory', 'modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partyStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Party\PartyStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesForecastHistoriesByModifiedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\SalesForecastHistory', 'modified_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataResourcesByCreatedByUserLogin()
    {
        return $this->hasMany('\DataResource', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataResourcesByLastModifiedByUserLogin()
    {
        return $this->hasMany('\DataResource', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesForecastsByCreatedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\SalesForecast', 'created_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesForecastsByModifiedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\SalesForecast', 'modified_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\ReturnStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobSandboxesByAuthUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\JobSandbox', 'auth_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobSandboxesByRunAsUser()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\JobSandbox', 'run_as_user', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPromosByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductPromo', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPromosByLastModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductPromo', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnAdjustmentsByCreatedByUserLogin()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\ReturnAdjustment', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPromoCodesByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductPromoCode', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPromoCodesByLastModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductPromoCode', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentReceiptsByReceivedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentReceipt', 'received_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirementStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('App\Joinbiz\Data\Models\Order\RequirementStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picklistRolesByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\PicklistRole', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picklistRolesByLastModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\PicklistRole', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picklistStatusHistoriesByChangeUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\PicklistStatusHistory', 'change_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userLoginSecurityQuestions()
    {
        return $this->hasMany('Joinbiz\Data\Models\Security\UserLoginSecurityQuestion', 'user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userLoginHistories()
    {
        return $this->hasMany('Joinbiz\Data\Models\Security\UserLoginHistory', 'user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userLoginSecurityGroups()
    {
        return $this->hasMany('Joinbiz\Data\Models\Security\UserLoginSecurityGroup', 'user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workEffortStatusesBySetByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Workeffort\WorkEffortStatus', 'set_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workEffortReviews()
    {
        return $this->hasMany('Joinbiz\Data\Models\Workeffort\WorkEffortReview', 'user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userLoginPasswordHistories()
    {
        return $this->hasMany('Joinbiz\Data\Models\Security\UserLoginPasswordHistory', 'user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timesheetsByApprovedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Workeffort\Timesheet', 'approved_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function webUserPreferences()
    {
        return $this->hasMany('\WebUserPreference', 'user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testingStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('\TestingStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userLoginSession()
    {
        return $this->hasOne('Joinbiz\Data\Models\Security\UserLoginSession', 'user_login_id', 'user_login_id');
    }
}
