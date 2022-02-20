<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_create',
            ],
            [
                'id'    => 18,
                'title' => 'product_edit',
            ],
            [
                'id'    => 19,
                'title' => 'product_show',
            ],
            [
                'id'    => 20,
                'title' => 'product_delete',
            ],
            [
                'id'    => 21,
                'title' => 'product_access',
            ],
            [
                'id'    => 22,
                'title' => 'shop_create',
            ],
            [
                'id'    => 23,
                'title' => 'shop_edit',
            ],
            [
                'id'    => 24,
                'title' => 'shop_show',
            ],
            [
                'id'    => 25,
                'title' => 'shop_delete',
            ],
            [
                'id'    => 26,
                'title' => 'shop_access',
            ],
            [
                'id'    => 27,
                'title' => 'customer_create',
            ],
            [
                'id'    => 28,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 29,
                'title' => 'customer_show',
            ],
            [
                'id'    => 30,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 31,
                'title' => 'customer_access',
            ],
            [
                'id'    => 32,
                'title' => 'order_create',
            ],
            [
                'id'    => 33,
                'title' => 'order_edit',
            ],
            [
                'id'    => 34,
                'title' => 'order_show',
            ],
            [
                'id'    => 35,
                'title' => 'order_delete',
            ],
            [
                'id'    => 36,
                'title' => 'order_access',
            ],
            [
                'id'    => 37,
                'title' => 'courier_create',
            ],
            [
                'id'    => 38,
                'title' => 'courier_edit',
            ],
            [
                'id'    => 39,
                'title' => 'courier_show',
            ],
            [
                'id'    => 40,
                'title' => 'courier_delete',
            ],
            [
                'id'    => 41,
                'title' => 'courier_access',
            ],
            [
                'id'    => 42,
                'title' => 'order_product_create',
            ],
            [
                'id'    => 43,
                'title' => 'order_product_edit',
            ],
            [
                'id'    => 44,
                'title' => 'order_product_show',
            ],
            [
                'id'    => 45,
                'title' => 'order_product_delete',
            ],
            [
                'id'    => 46,
                'title' => 'order_product_access',
            ],
            [
                'id'    => 47,
                'title' => 'send_sms_create',
            ],
            [
                'id'    => 48,
                'title' => 'send_sms_edit',
            ],
            [
                'id'    => 49,
                'title' => 'send_sms_show',
            ],
            [
                'id'    => 50,
                'title' => 'send_sms_delete',
            ],
            [
                'id'    => 51,
                'title' => 'send_sms_access',
            ],
            [
                'id'    => 52,
                'title' => 'setting_create',
            ],
            [
                'id'    => 53,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 54,
                'title' => 'setting_show',
            ],
            [
                'id'    => 55,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 56,
                'title' => 'setting_access',
            ],
            [
                'id'    => 57,
                'title' => 'product_purchase_create',
            ],
            [
                'id'    => 58,
                'title' => 'product_purchase_edit',
            ],
            [
                'id'    => 59,
                'title' => 'product_purchase_show',
            ],
            [
                'id'    => 60,
                'title' => 'product_purchase_delete',
            ],
            [
                'id'    => 61,
                'title' => 'product_purchase_access',
            ],
            [
                'id'    => 62,
                'title' => 'stock_create',
            ],
            [
                'id'    => 63,
                'title' => 'stock_edit',
            ],
            [
                'id'    => 64,
                'title' => 'stock_show',
            ],
            [
                'id'    => 65,
                'title' => 'stock_delete',
            ],
            [
                'id'    => 66,
                'title' => 'stock_access',
            ],
            [
                'id'    => 67,
                'title' => 'inventory_access',
            ],
            [
                'id'    => 68,
                'title' => 'report_access',
            ],
            [
                'id'    => 69,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 70,
                'title' => 'ticket_create',
            ],
            [
                'id'    => 71,
                'title' => 'ticket_edit',
            ],
            [
                'id'    => 72,
                'title' => 'ticket_show',
            ],
            [
                'id'    => 73,
                'title' => 'ticket_delete',
            ],
            [
                'id'    => 74,
                'title' => 'ticket_access',
            ],
            [
                'id'    => 75,
                'title' => 'reply_create',
            ],
            [
                'id'    => 76,
                'title' => 'reply_edit',
            ],
            [
                'id'    => 77,
                'title' => 'reply_show',
            ],
            [
                'id'    => 78,
                'title' => 'reply_delete',
            ],
            [
                'id'    => 79,
                'title' => 'reply_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
