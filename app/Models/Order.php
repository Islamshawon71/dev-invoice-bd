<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use MultiTenantModelTrait;
    use HasFactory;

    public const STATUS_SELECT = [
        'Processing'     => 'Processing',
        'On hold'        => 'On hold',
        'Completed'      => 'Completed',
        'Cancelled'      => 'Cancelled',
        'Shipped'        => 'Shipped',
        'Delivered'      => 'Delivered',
        'Returned' => 'Returned',
    ];

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'invoice_number',
        'delivery_charge',
        'total_bill',
        'discount',
        'status',
        'created_at',
        'customer_id',
        'courier_id',
        'courier_tracking_number',
        'shop_id',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class, 'courier_id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class,'order_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
