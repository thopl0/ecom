<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'password'=> bcrypt('password'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password'=> bcrypt('password'),
            'role' => '',
        ]);

        $categories = [
            ['name'=>'GPU', 'image'=>'3209a5ac-ec36-4195-b682-e634a19df621-1717163921.svg'], 
            ['name'=>'CPU', 'image'=>'d1981155-90e0-416f-9e28-8f16920282bd-1717164067.svg'], 
            ['name'=>'RAM', 'image'=>'6638ea39-5456-405c-9126-3633b57ff1c6-1717164074.svg'], 
            ['name'=>'Motherboard', 'image'=>'8cf15f47-6494-4977-886b-1bc384e080da-1717164081.svg'], 
            ['name'=>'Storage', 'image'=>'b7c2030b-17e3-4134-a9a2-29aa385cb48c-1717164087.svg']
        ];

        foreach ($categories as $category_) {
            $category = new \App\Models\Category();
            $category->name = $category_['name'];
            $category->image = $category_['image'];
            $category->save();
        }

        $products = [
            [
                'name'=> 'ASUS Dual GeForce RTX™ 4060 OC White Edition',
                'image'=> 'bca54839-470d-4ff3-a20f-1b8b9f5ae212-1717137750.jpg',
                'description'=>"NVIDIA Ada Lovelace Streaming Multiprocessors: Up to 2X performance and power efficiency 4th Generation Tensor Cores: Up to 4x performance with DLSS 3 vs. brute-force rendering 3rd Generation RT Cores: Up to 2x ray tracing performance OC Mode: 2535 MHz (Boost Clock) Default Mode : 2505 MHz (Boost Clock) Axial-tech fan design features a smaller fan hub that facilitates longer blades and a barrier ring that increases downward air pressure A 2.5-slot design maximizes compatibility and cooling efficiency for superior performance in small chassis 0dB technology lets you enjoy light gaming in relative silence Dual BIOS switch lets you toggle between Quiet and Performance BIOS profiles sans software Dual ball fan bearings can last up to twice as long as sleeve bearing designs",
                'price'=>400,
                'category_id'=>1
            ],
            [
                'name'=>'AMD Ryzen 5 3600',
                'image'=> 'bca54839-470d-4ff3-a20f-1b8b9f5ae212-1717137750.jpg',
                'description'=>'The AMD Ryzen 5 3600 is a powerful processor that offers impressive performance and great value for money. It features six cores and 12 threads, and clocks in at 3.6 GHz. It also has excellent multi-threading performance and supports up to 64 GB of RAM. Overall, the Ryzen 5 3600 is a great choice for anyone looking for a high-performance processor.',
                'price'=> 300,
                'category_id'=> 2
            ],
            [
                'name'=>'G.SKILL TridentZ RGB 16GB (2X8GB) DDR4 3200MHz C16',
                'image'=> 'bca54839-470d-4ff3-a20f-1b8b9f5ae212-1717137750.jpg',
                'description'=> 'G.SKILL TridentZ RGB 16GB (2X8GB) DDR4 3200MHz C16 Gaming Memory Kit - TridentZ RGB 16GB (2X8GB) DDR4 3200MHz C16 Gaming Memory Kit - TridentZ RGB 16GB (2X8GB) DDR4 3200MHz C16 Gaming Memory Kit, RGB 16GB (2X8GB) DDR4 3200MHz C16 Gaming Memory Kit',
                'price'=> 300,
                'category_id'=> 3
            ],
            [
                'name'=>'ASUS ROG Strix B550-A Gaming AMD ATX Motherboard',
                'image'=> 'bca54839-470d-4ff3-a20f-1b8b9f5ae212-1717137750.jpg',
                'description'=> 'AMD AM4 Socket and PCIe 4. 0: The perfect pairing for Zen 3 Ryzen 5000 and 3rd Gen AMD Ryzen CPUs.Audio: Supports up to 32-Bit/192kHz playback
Robust Power Design: 12 plus 2 DrMOS power stages with high-quality alloy chokes and durable capacitors provide reliable power for the last AMD high-count-core CPUs
High-performance Gaming Networking: 2.5 Gb LAN with ASUS LANGuard
Best Gaming Connectivity: Supports HDMI 2.1(4K at 60HZ) and DisplayPort 1.2 output, featuring dual M.2 slots (NVMe SSD)—one with PCIe 4.0 x4 connectivity, USB 3.2 Gen 2 Type-C port and Thunderbolt 3 header
Industry-leading Gaming Audio and AI Noise Cancelling Mic Technology: High fidelity audio from a SupremeFX S1220A codec with DTS Sound Unbound and Sonic Studio III draws you deeper into the action. Communicate clearly with ASUS AI Noise Cancelling Mic technology.',
                'price'=> 110,
                'category_id'=> 4
            ],
            [
                'name' => 'Samsung 870 EVO SATA III SSD 1TB 2.5” Internal Solid State Drive',
                'image'=> 'bca54839-470d-4ff3-a20f-1b8b9f5ae212-1717137750.jpg',
                'description' => "THE SSD ALL-STAR: The latest 870 EVO has indisputable performance, reliability and compatibility built upon Samsung's pioneering technology. S.M.A.R.T. Support: Yes
EXCELLENCE IN PERFORMANCE: Enjoy professional level SSD performance which maximizes the SATA interface limit to 560 530 MB/s sequential speeds,* accelerates write speeds and maintains long term high performance with a larger variable buffer, Designed for gamers and professionals to handle heavy workloads of high-end PCs, workstations and NAS
INDUSTRY-DEFINING RELIABILITY: Meet the demands of every task — from everyday computing to 8K video processing, with up to 600 TBW** under a 5-year limited warranty***
MORE COMPATIBLE THAN EVER: The 870 EVO has been compatibility tested**** for major host systems and applications, including chipsets, motherboards, NAS, and video recording devices
UPGRADE WITH EASE: Using the 870 EVO SSD is as simple as plugging it into the standard 2.5 inch SATA form factor on your desktop PC or laptop; The renewed migration software takes care of the rest
SAMSUNG MAGICIAN SOFTWARE: Samsung Magician 6 software**** helps you easily manage your drive, keep up the latest updates, monitor the drive's health and status, or even enhance its performance
WORLD'S #1 FLASH MEMORY BRAND: Experience the performance and reliability from the world's #1 brand for flash memory since 2003;***** All firmware & components, including Samsung's world-renowned DRAM & NAND, are produced in-house. AES 256-bit Encryption (Class 0),TCG/Opal, IEEE1667 (Encrypted drive)",
"price"=> 80,
"category_id"=> 5
            ]
        ];

        foreach ($products as $product_) {
            $product = new \App\Models\Product();
            $product->name = $product_['name'];
            $product->image = $product_['image'];
            $product->description = $product_['description'];
            $product->price = $product_['price'];
            $product->category_id = $product_['category_id'];
            $product->save();
        }
        
        // \App\Models\Product::factory()->create([
        //     'name'=> 'ASUS Dual GeForce RTX™ 4060 OC White Edition',
        //     'image'=> 'bca54839-470d-4ff3-a20f-1b8b9f5ae212-1717137750.jpg',
        //     'description'=>"NVIDIA Ada Lovelace Streaming Multiprocessors: Up to 2X performance and power efficiency 4th Generation Tensor Cores: Up to 4x performance with DLSS 3 vs. brute-force rendering 3rd Generation RT Cores: Up to 2x ray tracing performance OC Mode: 2535 MHz (Boost Clock) Default Mode : 2505 MHz (Boost Clock) Axial-tech fan design features a smaller fan hub that facilitates longer blades and a barrier ring that increases downward air pressure A 2.5-slot design maximizes compatibility and cooling efficiency for superior performance in small chassis 0dB technology lets you enjoy light gaming in relative silence Dual BIOS switch lets you toggle between Quiet and Performance BIOS profiles sans software Dual ball fan bearings can last up to twice as long as sleeve bearing designs",
        //     'price'=>400,
        //     'category_id'=>1
        // ]);
        
        // \App\Models\Product::factory()->create([
        //     'name'=> 'GeForce RTX 3060 Deluxe Edition',
        //     'image'=> 'bca54839-470d-4ff3-a20f-1b8b9f5ae212-1717137750.jpg',
        //     'description'=>"NVIDIA Ada Lovelace Streaming Multiprocessors: Up to 2X performance and power efficiency 4th Generation Tensor Cores: Up to 4x performance with DLSS 3 vs. brute-force rendering 3rd Generation RT Cores: Up to 2x ray tracing performance OC Mode: 2535 MHz (Boost Clock) Default Mode : 2505 MHz (Boost Clock) Axial-tech fan design features a smaller fan hub that facilitates longer blades and a barrier ring that increases downward air pressure A 2.5-slot design maximizes compatibility and cooling efficiency for superior performance in small chassis 0dB technology lets you enjoy light gaming in relative silence Dual BIOS switch lets you toggle between Quiet and Performance BIOS profiles sans software Dual ball fan bearings can last up to twice as long as sleeve bearing designs",
        //     'price'=>300,
        //     'category_id'=>1
        // ]);

    }
}