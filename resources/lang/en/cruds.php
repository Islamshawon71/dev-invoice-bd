<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'title'                   => 'Title',
            'title_helper'            => ' ',
            'permissions'             => 'Permissions',
            'permissions_helper'      => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'price'                   => 'Price',
            'price_helper'            => ' ',
            'features'                => 'Features',
            'features_helper'         => ' ',
            'validity'                => 'Validity',
            'validity_helper'         => ' ',
            'products_limit'          => 'Products Limit',
            'products_limit_helper'   => ' ',
            'shop_limit'              => 'Shop Limit',
            'shop_limit_helper'       => ' ',
            'customers_limit'         => 'Customers Limit',
            'customers_limit_helper'  => ' ',
            'orders_limit'            => 'Orders Limit',
            'orders_limit_helper'     => ' ',
            'stock_management'        => 'Stock Management',
            'stock_management_helper' => ' ',
            'new_courier_add'         => 'New Courier Add',
            'new_courier_add_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Product',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'product_name'         => 'Product Name',
            'product_name_helper'  => ' ',
            'product_code'         => 'Product Code',
            'product_code_helper'  => ' ',
            'product_price'        => 'Product Price',
            'product_price_helper' => ' ',
            'product_photo'        => 'Product Photo',
            'product_photo_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
        ],
    ],
    'shop' => [
        'title'          => 'Shop',
        'title_singular' => 'Shop',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'shop_name'                => 'Shop Name',
            'shop_name_helper'         => ' ',
            'shop_address'             => 'Shop Address',
            'shop_address_helper'      => ' ',
            'shop_phone_number'        => 'Shop Phone Number',
            'shop_phone_number_helper' => ' ',
            'shop_logo'                => 'Shop Logo',
            'shop_logo_helper'         => ' ',
            'status'                   => 'Status',
            'status_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'created_by'               => 'Created By',
            'created_by_helper'        => ' ',
        ],
    ],
    'customer' => [
        'title'          => 'Customer',
        'title_singular' => 'Customer',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'customer_name'           => 'Customer Name',
            'customer_name_helper'    => ' ',
            'customer_phone'          => 'Customer Phone',
            'customer_phone_helper'   => ' ',
            'customer_address'        => 'Customer Address',
            'customer_address_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'created_by'              => 'Created By',
            'created_by_helper'       => ' ',
            'order'                   => 'Order',
            'order_helper'            => ' ',
        ],
    ],
    'order' => [
        'title'          => 'Order',
        'title_singular' => 'Order',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => ' ',
            'invoice_number'                 => 'Invoice ID',
            'invoice_number_helper'          => ' ',
            'delivery_charge'                => 'Delivery Charge',
            'delivery_charge_helper'         => ' ',
            'total_bill'                     => 'Total Bill',
            'total_bill_helper'              => ' ',
            'discount'                       => 'Discount / Advance',
            'discount_helper'                => ' ',
            'created_at'                     => 'Created at',
            'created_at_helper'              => ' ',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => ' ',
            'status'                         => 'Status',
            'status_helper'                  => ' ',
            'created_by'                     => 'Created By',
            'created_by_helper'              => ' ',
            'customer'                       => 'Customer',
            'customer_helper'                => ' ',
            'courier'                        => 'Courier',
            'courier_helper'                 => ' ',
            'courier_tracking_number'        => 'Courier Tracking Number',
            'courier_tracking_number_helper' => ' ',
            'shop'                           => 'Shop',
            'shop_helper'                    => ' ',
            'customer_info'                  => 'Customer Info',

        ],
    ],
    'courier' => [
        'title'          => 'Courier',
        'title_singular' => 'Courier',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'courier_name'        => 'Courier Name',
            'courier_name_helper' => ' ',
            'status'              => 'Status',
            'status_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'shop'                => 'Shop',
            'shop_helper'         => ' ',
        ],
    ],
    'orderProduct' => [
        'title'          => 'Order Product',
        'title_singular' => 'Order Product',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'price'             => 'Price',
            'price_helper'      => ' ',
            'order'             => 'Order',
            'order_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'sendSms' => [
        'title'          => 'Send Sms',
        'title_singular' => 'Send Sms',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'order'                  => 'Order ID',
            'order_helper'           => ' ',
            'customer_number'        => 'Customer Number',
            'customer_number_helper' => ' ',
            'sms_content'            => 'Sms Content',
            'sms_content_helper'     => ' ',
            'status'                 => 'Status',
            'status_helper'          => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'created_by'             => 'Created By',
            'created_by_helper'      => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'productPurchase' => [
        'title'          => 'Product Purchase',
        'title_singular' => 'Product Purchase',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'product'              => 'Product',
            'product_helper'       => ' ',
            'purchase_date'        => 'Purchase Date',
            'purchase_date_helper' => ' ',
            'quantity'             => 'Quantity',
            'quantity_helper'      => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
        ],
    ],
    'stock' => [
        'title'          => 'Product Stock',
        'title_singular' => 'Product Stock',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'purchase'          => 'Purchase',
            'purchase_helper'   => ' ',
            'stock'             => 'Stock',
            'stock_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'inventory' => [
        'title'          => 'Inventory',
        'title_singular' => 'Inventory',
    ],
    'report' => [
        'title'          => 'Report',
        'title_singular' => 'Report',
    ],
    'ticket' => [
        'title'          => 'Ticket',
        'title_singular' => 'Ticket',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'subject'            => 'Subject',
            'subject_helper'     => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'priority'           => 'Priority',
            'priority_helper'    => ' ',
            'file'               => 'File',
            'file_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
        ],
    ],
    'reply' => [
        'title'          => 'Reply',
        'title_singular' => 'Reply',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'ticket'            => 'Ticket',
            'ticket_helper'     => ' ',
            'reply'             => 'Reply',
            'reply_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
