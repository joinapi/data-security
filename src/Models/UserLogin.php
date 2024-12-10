<?php

namespace Joinbiz\Data\Models\Security;

use Illuminate\Database\Eloquent\Model;
use Joinbiz\Data\Models\Accounting\BudgetStatus;
use Joinbiz\Data\Models\Accounting\FinAccountStatus;
use Joinbiz\Data\Models\Accounting\InvoiceStatus;
use Joinbiz\Data\Models\Content\Content;
use Joinbiz\Data\Models\Content\ContentAssoc;
use Joinbiz\Data\Models\Content\DataResource;
use Joinbiz\Data\Models\Content\WebUserPreference;
use Joinbiz\Data\Models\Marketing\ContactList;
use Joinbiz\Data\Models\Marketing\ContactListCommStatus;
use Joinbiz\Data\Models\Marketing\SalesForecast;
use Joinbiz\Data\Models\Marketing\SalesForecastHistory;
use Joinbiz\Data\Models\Marketing\SalesOpportunity;
use Joinbiz\Data\Models\Marketing\SalesOpportunityHistory;
use Joinbiz\Data\Models\Order\CustRequestStatus;
use Joinbiz\Data\Models\Order\OrderAdjustment;
use Joinbiz\Data\Models\Order\OrderHeader;
use Joinbiz\Data\Models\Order\OrderItem;
use Joinbiz\Data\Models\Order\OrderItemChange;
use Joinbiz\Data\Models\Order\OrderPaymentPreference;
use Joinbiz\Data\Models\Order\OrderStatus;
use Joinbiz\Data\Models\Order\QuoteAdjustment;
use Joinbiz\Data\Models\Order\RequirementStatus;
use Joinbiz\Data\Models\Order\ReturnAdjustment;
use Joinbiz\Data\Models\Order\ReturnStatus;
use Joinbiz\Data\Models\Party\Party;
use Joinbiz\Data\Models\Party\PartyStatus;
use Joinbiz\Data\Models\Product\InventoryItemStatus;
use Joinbiz\Data\Models\Product\Product;
use Joinbiz\Data\Models\Product\ProductFeaturePrice;
use Joinbiz\Data\Models\Product\ProductPrice;
use Joinbiz\Data\Models\Product\ProductPriceChange;
use Joinbiz\Data\Models\Product\ProductPromo;
use Joinbiz\Data\Models\Product\ProductPromoCode;
use Joinbiz\Data\Models\Product\ProductReview;
use Joinbiz\Data\Models\Service\JobSandbox;
use Joinbiz\Data\Models\Shipment\ItemIssuance;
use Joinbiz\Data\Models\Shipment\PicklistRole;
use Joinbiz\Data\Models\Shipment\PicklistStatusHistory;
use Joinbiz\Data\Models\Shipment\ShipmentReceipt;
use Joinbiz\Data\Models\Shipment\ShipmentStatus;
use Joinbiz\Data\Models\Workeffort\Timesheet;
use Joinbiz\Data\Models\Workeffort\WorkEffortPartyAssignment;
use Joinbiz\Data\Models\Workeffort\WorkEffortReview;
use Joinbiz\Data\Models\Workeffort\WorkEffortStatus;

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
 * @property SalesForecastHistory[] $salesForecastHistoriesByModifiedByUserLoginId
 * @property InvoiceStatus[] $invoiceStatusesByChangeByUserLoginId
 * @property ShipmentStatus[] $shipmentStatusesByChangeByUserLoginId
 * @property OrderStatus[] $orderStatusesByStatusUserLogin
 * @property SalesForecast[] $salesForecastsByCreatedByUserLoginId
 * @property SalesForecast[] $salesForecastsByModifiedByUserLoginId
 * @property ShipmentReceipt[] $shipmentReceiptsByReceivedByUserLoginId
 * @property ReturnStatus[] $returnStatusesByChangeByUserLoginId
 * @property JobSandbox[] $jobSandboxesByAuthUserLoginId
 * @property JobSandbox[] $jobSandboxesByRunAsUser
 * @property Content[] $contentsByCreatedByUserLogin
 * @property Content[] $contentsByLastModifiedByUserLogin
 * @property OrderItemChange[] $orderItemChangesByChangeUserLogin
 * @property ReturnAdjustment[] $returnAdjustmentsByCreatedByUserLogin
 * @property ContactListCommStatus[] $contactListCommStatusesByChangeByUserLoginId
 * @property FinAccountStatus[] $finAccountStatusesByChangeByUserLoginId
 * @property DataResource[] $dataResourcesByCreatedByUserLogin
 * @property DataResource[] $dataResourcesByLastModifiedByUserLogin
 * @property RequirementStatus[] $requirementStatusesByChangeByUserLoginId
 * @property OrderAdjustment[] $orderAdjustmentsByCreatedByUserLogin
 * @property ProductPromo[] $productPromosByCreatedByUserLogin
 * @property ProductPromo[] $productPromosByLastModifiedByUserLogin
 * @property ProductPromoCode[] $productPromoCodesByCreatedByUserLogin
 * @property ProductPromoCode[] $productPromoCodesByLastModifiedByUserLogin
 * @property QuoteAdjustment[] $quoteAdjustmentsByCreatedByUserLogin
 * @property CustRequestStatus[] $custRequestStatusesByChangeByUserLoginId
 * @property ProductReview[] $productReviews
 * @property OrderHeader[] $orderHeadersByCreatedBy
 * @property ProductPriceChange[] $productPriceChangesByChangedByUserLogin
 * @property ContactList[] $contactListsByCreatedByUserLogin
 * @property ContactList[] $contactListsByLastModifiedByUserLogin
 * @property ProductPrice[] $productPricesByCreatedByUserLogin
 * @property ProductPrice[] $productPricesByLastModifiedByUserLogin
 * @property ProductFeaturePrice[] $productFeaturePricesByCreatedByUserLogin
 * @property ProductFeaturePrice[] $productFeaturePricesByLastModifiedByUserLogin
 * @property Party[] $partiesByCreatedByUserLogin
 * @property Party[] $partiesByLastModifiedByUserLogin
 * @property BudgetStatus[] $budgetStatusesByChangeByUserLoginId
 * @property Product[] $productsByCreatedByUserLogin
 * @property Product[] $productsByLastModifiedByUserLogin
 * @property ItemIssuance[] $itemIssuancesByIssuedByUserLoginId
 * @property SalesOpportunity[] $salesOpportunitiesByCreatedByUserLogin
 * @property ContentAssoc[] $contentAssocsByCreatedByUserLogin
 * @property ContentAssoc[] $contentAssocsByLastModifiedByUserLogin
 * @property PicklistStatusHistory[] $picklistStatusHistoriesByChangeUserLoginId
 * @property OrderItem[] $orderItemsByDontCancelSetUserLogin
 * @property OrderItem[] $orderItemsByChangeByUserLoginId
 * @property PicklistRole[] $picklistRolesByCreatedByUserLogin
 * @property PicklistRole[] $picklistRolesByLastModifiedByUserLogin
 * @property InventoryItemStatus[] $inventoryItemStatusesByChangeByUserLoginId
 * @property OrderPaymentPreference[] $orderPaymentPreferencesByCreatedByUserLogin
 * @property WorkEffortPartyAssignment[] $workEffortPartyAssignmentsByAssignedByUserLoginId
 * @property PartyStatus[] $partyStatusesByChangeByUserLoginId
 * @property SalesOpportunityHistory[] $salesOpportunityHistoriesByModifiedByUserLogin
 * @property Party $party
 * @property UserLoginSession $userLoginSession
 * @property UserLoginSecurityGroup[] $userLoginSecurityGroups
 * @property WebUserPreference[] $webUserPreferences
 * @property WorkEffortStatus[] $workEffortStatusesBySetByUserLogin
 * @property UserLoginSecurityQuestion[] $userLoginSecurityQuestions
 * @property WorkEffortReview[] $workEffortReviews
 * @property Timesheet[] $timesheetsByApprovedByUserLoginId
 * @property UserLoginPasswordHistory[] $userLoginPasswordHistories
 * @property UserLoginHistory[] $userLoginHistories
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
    public function salesForecastHistoriesByModifiedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\SalesForecastHistory', 'modified_by_user_login_id', 'user_login_id');
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
    public function shipmentStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderStatusesByStatusUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderStatus', 'status_user_login', 'user_login_id');
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
    public function shipmentReceiptsByReceivedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentReceipt', 'received_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnStatus', 'change_by_user_login_id', 'user_login_id');
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
    public function contentsByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Content\Content', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contentsByLastModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Content\Content', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemChangesByChangeUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItemChange', 'change_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnAdjustmentsByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnAdjustment', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactListCommStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\ContactListCommStatus', 'change_by_user_login_id', 'user_login_id');
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
    public function dataResourcesByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Content\DataResource', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataResourcesByLastModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Content\DataResource', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirementStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\RequirementStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderAdjustmentsByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderAdjustment', 'created_by_user_login', 'user_login_id');
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
    public function quoteAdjustmentsByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteAdjustment', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestStatus', 'change_by_user_login_id', 'user_login_id');
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
    public function orderHeadersByCreatedBy()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderHeader', 'created_by', 'user_login_id');
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
    public function budgetStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetStatus', 'change_by_user_login_id', 'user_login_id');
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
    public function itemIssuancesByIssuedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ItemIssuance', 'issued_by_user_login_id', 'user_login_id');
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
    public function contentAssocsByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Content\ContentAssoc', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contentAssocsByLastModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Content\ContentAssoc', 'last_modified_by_user_login', 'user_login_id');
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
    public function orderItemsByDontCancelSetUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItem', 'dont_cancel_set_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemsByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItem', 'change_by_user_login_id', 'user_login_id');
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
    public function inventoryItemStatusesByChangeByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\InventoryItemStatus', 'change_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderPaymentPreferencesByCreatedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderPaymentPreference', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workEffortPartyAssignmentsByAssignedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\WorkEffort\WorkEffortPartyAssignment', 'assigned_by_user_login_id', 'user_login_id');
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
    public function salesOpportunityHistoriesByModifiedByUserLogin()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\SalesOpportunityHistory', 'modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userLoginSession()
    {
        return $this->hasOne('Joinbiz\Data\Models\Security\UserLoginSession', 'user_login_id', 'user_login_id');
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
    public function webUserPreferences()
    {
        return $this->hasMany('Joinbiz\Data\Models\Content\WebUserPreference', 'user_login_id', 'user_login_id');
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
    public function userLoginSecurityQuestions()
    {
        return $this->hasMany('Joinbiz\Data\Models\Security\UserLoginSecurityQuestion', 'user_login_id', 'user_login_id');
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
    public function timesheetsByApprovedByUserLoginId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Workeffort\Timesheet', 'approved_by_user_login_id', 'user_login_id');
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
    public function userLoginHistories()
    {
        return $this->hasMany('Joinbiz\Data\Models\Security\UserLoginHistory', 'user_login_id', 'user_login_id');
    }
}
