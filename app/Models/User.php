<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\CountryManage\Entities\City;
use Modules\CountryManage\Entities\Country;
use Modules\CountryManage\Entities\State;
use Modules\Wallet\Entities\Wallet;
use Modules\Wallet\Entities\WalletTenantList;
use Spatie\Activitylog\LogOptions;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'has_subdomain',
        'username',
        'email_verified',
        'email_verify_token',
        'mobile',
        'company',
        'address',
        'postal_code',
        'city',
        'state',
        'country',
        'image',
        'api_token_plan_text',
        'temp_password'
    ];
    
    
    public function tenant_info(): BelongsTo
    {
        return $this->belongsTo(Tenant::class,'id','user_id')->latest();
    }
    public function tenant_details(): HasMany
    {
        return $this->hasMany(Tenant::class,'user_id','id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'email_verified' => 'integer',
    ];

    protected $dates = ['deleted_at'];

    public function payment_log(): HasMany
    {
        return $this->hasMany(PaymentLogs::class,'user_id','id')->orderBy('id','desc');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email','username']);
        // Chain fluent methods for configuration options
    }

    public function domains()
    {
        return $this->hasMany(UserDomain::class, 'tenant_id', 'id');
    }

    public function custom_domains(): HasMany
    {
        return $this->hasMany(CustomDomain::class, 'user_id', 'id');
    }

    public function delivery_address(): HasOne
    {
        return $this->hasOne(UserDeliveryAddress::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'country', 'name');
    }

    public function state()
    {
        return $this->hasOne(State::class, 'state', 'name');
    }

    public function userCountry()
    {
        return $this->hasOne(Country::class, 'id', 'country');
    }

    public function userState()
    {
        return $this->hasOne(State::class, 'id', 'state');
    }

    public function userCity()
    {
        return $this->hasOne(City::class, 'id', 'city');
    }

    public function wallet_tenant_list(): HasMany
    {
        return $this->hasMany(WalletTenantList::class, 'user_id', 'id');
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class, 'user_id', 'id');
    }

 


}
