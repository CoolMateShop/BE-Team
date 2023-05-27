<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //table roles
        DB::table('roles')->insert(
            [
                'name' => 'admin',
                'description' => 'Nguoi quan ly voi vai tro admin',
            ]
        );
        DB::table('roles')->insert(
            [
                'name' => 'user',
                'description' => 'Khach hang voi vai tro la nguoi mua hang va trai nghiem dich vu',
            ]
        );
        // table users
        DB::table('users')->insert(
            [
                'full_name' => 'haibang',
                'password' => Hash::make('haibang'),
                'email' => 'haibang@email.com',
                'phone_number' => '0355511436',
                'address' => 'Dong Thap',
                'role_id' => 1,
            ]
        );
        DB::table('users')->insert(
            [
                'full_name' => 'vanthanh',
                'password' => Hash::make('vanthanh'),
                'email' => 'vanthanh@email.com',
                'phone_number' => '0123456789',
                'address' => 'Binh Dinh',
                'role_id' => 1,
            ]
        );
        DB::table('users')->insert(
            [
                'full_name' => 'thanhtam',
                'password' => Hash::make('thanhtam'),
                'email' => 'thanhtam@email.com',
                'phone_number' => '9876543210',
                'address' => 'Tay Ninh',
                'role_id' => 1,
            ]
        );
        DB::table('users')->insert(
            [
                'full_name' => 'user1',
                'password' => Hash::make('user1'),
                'email' => 'user1@email.com',
                'phone_number' => '0147258369',
                'address' => 'TPHCM',
                'role_id' => 2,
            ]
        );
        //categories
        DB::table('categories')->insert(
            [
                'name' => 'Áo polo',
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => 'Áo sơ mi',
            ]
        );
        //table products 
        // products have category_id 1
        DB::table('products')->insert(
            [
                "name" => "Áo Polo nam co giãn công nghệ Graphene",
                "price" => "200000",
                "sale" => 10,
                "description" => "Chiếc áo polo nam đầu tiên cả 6 tính năng: mát mẻ, khử mùi, chống UV, chống tĩnh điện, kháng khuẩn và hút ẩm tốt  Co giãn tối đa đảm bảo sự thoải mái trong mọi hoạt động, đặt biệt trong các hoạt động thể thao",
                "category_id" => 1,
            ]
        );
        DB::table('products')->insert(
            [
                "name" => "Áo Polo nam Excool",
                "price" => "250000",
                "sale" => 0,
                "description" => "Co dãn 4 chiều, chống tia UV SPF 50+, siêu nhẹ siêu mềm",
                "category_id" => 1,
            ]
        );

        DB::table('products')->insert(
            [
                "name" => "Áo Polo nam Pique Cotton USA thấm hút (trơn)",
                "price" => "300000",
                "sale" => 0,
                "description" => "97% Cotton USA mềm mại, 3% Spandex tăng độ mềm mại",
                "category_id" => 1,
            ]
        );
        //product have category_id2
        DB::table('products')->insert(
            [
                "name" => "Áo Sơ mi nam Excool Limited ngắn tay chui đầu",
                "price" => "300000",
                "sale" => 20,
                "description" => "Thấm hút mồ hôi và nhanh khô đến từ sự kết hợp giữa các sợi dài Filament tạo nên Excool. Chùm sợi nền tạo nên Excool với thiết diện tròn tạo sự mềm mại X2 cotton. Độ co giãn và đàn hồi đến từ cấu trúc phân tử hình Zigzac của sợi nền Sorona. Bề mặt vải Excool mướt hơn, được ví như vải lụa bởi sợi Sorona tạo nên.",
                "category_id" => 2,
            ]
        );
        DB::table('products')->insert(
            [
                "name" => "Áo sơ mi nam dài tay Café-DriS khử mùi hiệu quả",
                "price" => "300000",
                "sale" => 0,
                "description" => "Vải S-Café Sticky Free là ứng dụng thông minh từ công nghệ vào ngành dệt may, công nghệ sản xuất vải từ bã cafe và chai nhựa, nhằm tạo ra vòng đời mới và đem đến sản phẩm thân thiện với môi trường. ",
                "category_id" => 2,
            ]
        );
        //table product_images
        //images product_id 1
        DB::table('product_images')->insert(
            [
                "product_id" => 1,
                "url" => "http://127.0.0.1:8000/images/poloaqua1.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 1,
                "url" => "http://127.0.0.1:8000/images/poloaqua2.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 1,
                "url" => "http://127.0.0.1:8000/images/poloaqua3.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 1,
                "url" => "http://127.0.0.1:8000/images/poloaqua4.png",
            ]
        );
        //images product_id 2
        DB::table('product_images')->insert(
            [
                "product_id" => 2,
                "url" => "http://127.0.0.1:8000/images/navy1.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 2,
                "url" => "http://127.0.0.1:8000/images/navy2.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 2,
                "url" => "http://127.0.0.1:8000/images/navy3.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 2,
                "url" => "http://127.0.0.1:8000/images/navy4.png",
            ]
        );
        //images product_id 3
        DB::table('product_images')->insert(
            [
                "product_id" => 3,
                "url" => "http://127.0.0.1:8000/images/PoloQuiveNavy1.jpg",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 3,
                "url" => "http://127.0.0.1:8000/images/PoloQuiveNavy2.jpg",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 3,
                "url" => "http://127.0.0.1:8000/images/PoloQuiveNavy3.jpg",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 3,
                "url" => "http://127.0.0.1:8000/images/PoloQuiveNavy4.jpg",
            ]
        );
        //images product_id 4
        DB::table('product_images')->insert(
            [
                "product_id" => 4,
                "url" => "http://127.0.0.1:8000/images/excoolsomiden1.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 4,
                "url" => "http://127.0.0.1:8000/images/excoolsomiden2.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 4,
                "url" => "http://127.0.0.1:8000/images/excoolsomiden3.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 4,
                "url" => "http://127.0.0.1:8000/images/excoolsomiden4.png",
            ]
        );
        //images product_id 5
        DB::table('product_images')->insert(
            [
                "product_id" => 5,
                "url" => "http://127.0.0.1:8000/images/somicfaqua1.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 5,
                "url" => "http://127.0.0.1:8000/images/somicfaqua2.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 5,
                "url" => "http://127.0.0.1:8000/images/somicfaqua3.png",
            ]
        );
        DB::table('product_images')->insert(
            [
                "product_id" => 5,
                "url" => "http://127.0.0.1:8000/images/somicfaqua4.png",
            ]
        );
        // table product_colors
        // colors product_id 1
        DB::table('product_colors')->insert(
            [
                "product_id" => 1,
                "color" => "Xanh aqua",
                "color_value" => "#4975a9",
            ]
        );
        DB::table('product_colors')->insert(
            [
                "product_id" => 1,
                "color" => "Đen",
                "color_value" => "#000000",
            ]
        );
        DB::table('product_colors')->insert(
            [
                "product_id" => 1,
                "color" => "Xanh navy",
                "color_value" => "#223249",
            ]
        );
        // colors product_id 2
        DB::table('product_colors')->insert(
            [
                "product_id" => 2,
                "color" => "Xanh aqua",
                "color_value" => "#4975a9",
            ]
        );
        DB::table('product_colors')->insert(
            [
                "product_id" => 2,
                "color" => "Đen",
                "color_value" => "#000000",
            ]
        );
        DB::table('product_colors')->insert(
            [
                "product_id" => 2,
                "color" => "Xanh navy",
                "color_value" => "#223249",
            ]
        );
        // colors product_id 3
        DB::table('product_colors')->insert(
            [
                "product_id" => 3,
                "color" => "Xanh aqua",
                "color_value" => "#4975a9",
            ]
        );
        DB::table('product_colors')->insert(
            [
                "product_id" => 3,
                "color" => "Đen",
                "color_value" => "#000000",
            ]
        );
        DB::table('product_colors')->insert(
            [
                "product_id" => 3,
                "color" => "Xanh navy",
                "color_value" => "#223249",
            ]
        );
        // colors product_id 4
        DB::table('product_colors')->insert(
            [
                "product_id" => 4,
                "color" => "Xanh aqua",
                "color_value" => "#4975a9",
            ]
        );
        DB::table('product_colors')->insert(
            [
                "product_id" => 4,
                "color" => "Xanh navy",
                "color_value" => "#223249",
            ]
        );
        // colors product_id 5
        DB::table('product_colors')->insert(
            [
                "product_id" => 5,
                "color" => "Xanh aqua",
                "color_value" => "#4975a9",
            ]
        );
        DB::table('product_colors')->insert(
            [
                "product_id" => 5,
                "color" => "Xanh navy",
                "color_value" => "#223249",
            ]
        );
        //table product_details
        //product_color_id 1
        DB::table('product_details')->insert(
            [
                "product_color_id" => 1,
                "sold" => 1,
                "in_stock" => 49,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 1,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 1,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 2
        DB::table('product_details')->insert(
            [
                "product_color_id" => 2,
                "sold" => 0,
                "in_stock" => 49,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 2,
                "sold" => 50,
                "in_stock" => 0,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 2,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 3
        DB::table('product_details')->insert(
            [
                "product_color_id" => 3,
                "sold" => 0,
                "in_stock" => 49,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 3,
                "sold" => 50,
                "in_stock" => 50,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 3,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 4
        DB::table('product_details')->insert(
            [
                "product_color_id" => 4,
                "sold" => 0,
                "in_stock" => 49,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 4,
                "sold" => 50,
                "in_stock" => 50,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 4,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 5
        DB::table('product_details')->insert(
            [
                "product_color_id" => 5,
                "sold" => 0,
                "in_stock" => 49,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 5,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 5,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 6
        DB::table('product_details')->insert(
            [
                "product_color_id" => 6,
                "sold" => 0,
                "in_stock" => 49,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 6,
                "sold" => 20,
                "in_stock" => 0,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 6,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 7
        DB::table('product_details')->insert(
            [
                "product_color_id" => 7,
                "sold" => 0,
                "in_stock" => 49,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 7,
                "sold" => 20,
                "in_stock" => 0,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 7,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 8
        DB::table('product_details')->insert(
            [
                "product_color_id" => 8,
                "sold" => 0,
                "in_stock" => 49,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 8,
                "sold" => 20,
                "in_stock" => 0,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 8,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 9
        DB::table('product_details')->insert(
            [
                "product_color_id" => 9,
                "sold" => 0,
                "in_stock" => 49,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 9,
                "sold" => 20,
                "in_stock" => 30,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 9,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 10
        DB::table('product_details')->insert(
            [
                "product_color_id" => 10,
                "sold" => 0,
                "in_stock" => 49,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 10,
                "sold" => 20,
                "in_stock" => 30,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 10,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 11
        DB::table('product_details')->insert(
            [
                "product_color_id" => 11,
                "sold" => 0,
                "in_stock" => 49,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 11,
                "sold" => 20,
                "in_stock" => 30,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 11,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 12
        DB::table('product_details')->insert(
            [
                "product_color_id" => 12,
                "sold" => 30,
                "in_stock" => 0,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 12,
                "sold" => 20,
                "in_stock" => 30,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 12,
                "sold" => 0,
                "in_stock" => 50,
                "size" => "L",
            ]
        );
        //product_color_id 13
        DB::table('product_details')->insert(
            [
                "product_color_id" => 13,
                "sold" => 30,
                "in_stock" => 20,
                "size" => "XL",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 13,
                "sold" => 20,
                "in_stock" => 30,
                "size" => "M",
            ]
        );
        DB::table('product_details')->insert(
            [
                "product_color_id" => 13,
                "sold" => 30,
                "in_stock" => 0,
                "size" => "L",
            ]
        );

        //table orders
        DB::table('orders')->insert(
            [
                "user_id" => 4,
                "fullname" => "User 1",
                "address" => "Quận 3,TPHCM",
                "phone_number" => "0147258369",
                "note" => "Giao vào ngày thứ 7 hoặc chủ nhât",
                "total_price" => 300000,
            ]
        );
        DB::table('orders')->insert(
            [
                "user_id" => 4,
                "fullname" => "User 1",
                "address" => "Quận 3,TPHCM",
                "phone_number" => "0147258369",
                "note" => "Giao vào ngày thứ 7 hoặc chủ nhât",
                "total_price" => 550000,
                "status" => 1
            ]
        );
        //table order_details
        DB::table('order_details')->insert(
            [
                "product_detail_id" => 39,
                "order_id" => 1,
                "count" => 1,
                "price" => 300000,
                "subtotal" => 300000,
            ]
        );
        DB::table('order_details')->insert(
            [
                "product_detail_id" => 39,
                "order_id" => 2,
                "count" => 1,
                "price" => 300000,
                "subtotal" => 300000,
            ]
        );
        DB::table('order_details')->insert(
            [
                "product_detail_id" => 17,
                "order_id" => 2,
                "count" => 1,
                "price" => 250000,
                "subtotal" => 250000,
            ]
        );

        //table user_comments
        DB::table('user_comment')->insert(
            [
                "content" => "Sản phẩm tốt quá trời",
                "user_id" => 4,
                "product_detail_id" => 1,
                "star" => 5,
            ]
        );
        DB::table('user_comment')->insert(
            [
                "content" => "Sản phẩm hơi tệ nha",
                "user_id" => 4,
                "product_detail_id" => 3,
                "star" => 3,
            ]
        );
    }
}
