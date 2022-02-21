<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Role extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public const NEW_COURIER_ADD_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    public const STOCK_MANAGEMENT_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    public const VALIDITY_SELECT = [
        'Monthly' => 'Monthly',
        'Yearly'  => 'Yearly',
    ];

    public $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'price',
        'features',
        'validity',
        'products_limit',
        'shop_limit',
        'customers_limit',
        'orders_limit',
        'stock_management',
        'new_courier_add',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
