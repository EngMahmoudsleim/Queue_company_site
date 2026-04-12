<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Restaurant POS System',
                'slug' => 'restaurant-pos-system',
                'short_description' => 'Cloud-enabled POS tailored for restaurants with table, kitchen, and delivery workflows.',
                'full_description' => 'A full-featured POS solution built for modern restaurants. It handles dine-in, takeaway, and delivery operations while providing real-time kitchen updates, branch-level analytics, and cashier-level auditing.',
                'category' => 'POS',
                'industry' => 'Food & Beverage',
                'features' => ['Table and hall management', 'Kitchen display system', 'Split billing and discounts', 'Real-time sales analytics'],
                'tech_stack' => ['Laravel', 'MySQL', 'Bootstrap 5', 'Redis'],
                'gallery_images' => ['/images/projects/restaurant-pos-1.jpg', '/images/projects/restaurant-pos-2.jpg'],
                'featured_image' => '/images/projects/restaurant-pos-cover.jpg',
                'demo_url' => 'https://demo.queue-company.test/restaurant-pos/login',
                'demo_username' => 'manager@restaurant.demo',
                'demo_password' => 'Demo@123',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 1,
                'meta_title' => 'Restaurant POS System Demo',
                'meta_description' => 'Restaurant POS software with kitchen and delivery workflows.',
            ],
            [
                'title' => 'Cloud ERP System',
                'slug' => 'cloud-erp-system',
                'short_description' => 'Modular ERP platform for finance, HR, procurement, and inventory.',
                'full_description' => 'Enterprise-ready ERP designed for growing organizations. The solution unifies accounting, procurement, inventory, HR, and approval workflows through configurable modules and role-based access control.',
                'category' => 'ERP',
                'industry' => 'Enterprise',
                'features' => ['Multi-branch support', 'Role-based approvals', 'Procurement and inventory cycle', 'Financial dashboard'],
                'tech_stack' => ['Laravel', 'MySQL', 'Bootstrap 5', 'Vue.js widgets'],
                'gallery_images' => ['/images/projects/cloud-erp-1.jpg'],
                'featured_image' => '/images/projects/cloud-erp-cover.jpg',
                'demo_url' => 'https://demo.queue-company.test/erp/login',
                'demo_username' => 'admin@erp.demo',
                'demo_password' => 'ERP@123',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 2,
                'meta_title' => 'Cloud ERP Demo',
                'meta_description' => 'ERP software for procurement, finance, HR, and operations.',
            ],
            [
                'title' => 'Pharmacy Management System',
                'slug' => 'pharmacy-management-system',
                'short_description' => 'Retail pharmacy software with prescription tracking and stock alerts.',
                'full_description' => 'Designed for pharmacies with high compliance requirements, this platform tracks prescriptions, controls medicine batches, and manages expiry alerts to reduce waste and protect patient safety.',
                'category' => 'Ready-made Solution',
                'industry' => 'Healthcare',
                'features' => ['Prescription history', 'Expiry alerts', 'Supplier and purchase workflows', 'Barcode billing'],
                'tech_stack' => ['Laravel', 'MySQL', 'Tailored reporting engine'],
                'gallery_images' => ['/images/projects/pharmacy-1.jpg'],
                'featured_image' => '/images/projects/pharmacy-cover.jpg',
                'demo_url' => 'https://demo.queue-company.test/pharmacy/login',
                'demo_username' => 'owner@pharmacy.demo',
                'demo_password' => 'Pharma@123',
                'status' => 'private_demo',
                'is_featured' => false,
                'sort_order' => 3,
                'meta_title' => 'Pharmacy Management System',
                'meta_description' => 'Pharmacy software for stock, prescriptions, and invoicing.',
            ],
            [
                'title' => 'Delivery Ordering Platform',
                'slug' => 'delivery-ordering-platform',
                'short_description' => 'End-to-end delivery platform with customer app, dispatcher panel, and rider tracking.',
                'full_description' => 'A scalable ordering and delivery ecosystem for restaurants and retailers. Includes customer ordering, merchant order management, rider assignment, and real-time dispatch monitoring.',
                'category' => 'SaaS Platform',
                'industry' => 'Logistics & Retail',
                'features' => ['Order lifecycle tracking', 'Live rider dispatch map', 'Zone-based delivery charges', 'Merchant analytics'],
                'tech_stack' => ['Laravel', 'MySQL', 'REST API', 'WebSocket notifications'],
                'gallery_images' => ['/images/projects/delivery-1.jpg'],
                'featured_image' => '/images/projects/delivery-cover.jpg',
                'demo_url' => null,
                'demo_username' => null,
                'demo_password' => null,
                'status' => 'coming_soon',
                'is_featured' => false,
                'sort_order' => 4,
                'meta_title' => 'Delivery Ordering Platform',
                'meta_description' => 'Ordering and rider dispatch platform for delivery operations.',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}
