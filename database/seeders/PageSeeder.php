<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['slug' => 'home', 'title_en' => 'Home', 'title_ar' => 'الرئيسية', 'hero_title_en' => 'Build smarter digital products with a team that understands operations.', 'hero_title_ar' => 'ابنِ منتجات رقمية أذكى مع فريق يفهم العمليات.', 'hero_subtitle_en' => 'From custom software to ERP, POS, and SaaS platforms, we craft systems that help teams move faster and scale with confidence.', 'hero_subtitle_ar' => 'من البرمجيات المخصصة إلى ERP وPOS ومنصات SaaS، نبني أنظمة تساعد فرقك على العمل بسرعة والتوسع بثقة.', 'cta_text_en' => 'Talk to Our Team', 'cta_text_ar' => 'تحدث مع فريقنا', 'cta_link' => '/contact', 'status' => 'published', 'sort_order' => 1, 'sections' => ['trust_badge_en' => 'Trusted Product Engineering Partner', 'trust_badge_ar' => 'شريك موثوق في هندسة المنتجات', 'featured_intro_en' => 'Production-ready systems shipped for real operations.', 'featured_intro_ar' => 'أنظمة جاهزة للإنتاج تم تسليمها لعمليات حقيقية.', 'services' => [['title_en' => 'Custom Software', 'title_ar' => 'برمجيات مخصصة', 'description_en' => 'Purpose-built internal systems and customer-facing platforms.', 'description_ar' => 'أنظمة داخلية ومنصات للعملاء مصممة خصيصاً.'], ['title_en' => 'ERP Systems', 'title_ar' => 'أنظمة ERP', 'description_en' => 'Integrated modules for finance, HR, procurement, and inventory.', 'description_ar' => 'وحدات متكاملة للمالية والموارد البشرية والمشتريات والمخزون.'], ['title_en' => 'POS Solutions', 'title_ar' => 'حلول نقاط البيع', 'description_en' => 'Reliable POS workflows for retail, F&B, and healthcare.', 'description_ar' => 'مسارات عمل موثوقة لقطاع التجزئة والمطاعم والرعاية الصحية.']]]],
            ['slug' => 'about', 'title_en' => 'About', 'title_ar' => 'من نحن', 'hero_title_en' => 'About Queue Company', 'hero_title_ar' => 'عن كيو كومباني', 'hero_subtitle_en' => 'We help organizations modernize operations through practical software engineering and business-focused product delivery.', 'hero_subtitle_ar' => 'نساعد المؤسسات على تطوير عملياتها عبر هندسة برمجية عملية وتسليم منتجات يركز على الأعمال.', 'status' => 'published', 'sort_order' => 2],
            ['slug' => 'services', 'title_en' => 'Services', 'title_ar' => 'الخدمات', 'hero_title_en' => 'Services', 'hero_title_ar' => 'الخدمات', 'hero_subtitle_en' => 'From strategy to delivery, we design scalable systems that fit your workflow.', 'hero_subtitle_ar' => 'من الاستراتيجية إلى التنفيذ، نصمم أنظمة قابلة للتوسع تناسب سير عملك.', 'status' => 'published', 'sort_order' => 3, 'sections' => ['services' => [['title_en' => 'Custom Software Development', 'title_ar' => 'تطوير البرمجيات المخصصة', 'description_en' => 'Tailored web platforms and internal systems built around your operations.', 'description_ar' => 'منصات ويب وأنظمة داخلية مصممة حول عملياتك.']]]],
            ['slug' => 'contact', 'title_en' => 'Contact', 'title_ar' => 'اتصل بنا', 'hero_title_en' => 'Contact Us', 'hero_title_ar' => 'اتصل بنا', 'hero_subtitle_en' => 'Tell us about your software goals and we will respond with a practical roadmap.', 'hero_subtitle_ar' => 'أخبرنا بأهدافك البرمجية وسنعود لك بخارطة طريق عملية.', 'status' => 'published', 'sort_order' => 4],
            ['slug' => 'demo-login', 'title_en' => 'Demo Login', 'title_ar' => 'تسجيل الدخول التجريبي', 'hero_title_en' => 'Demo Login', 'hero_title_ar' => 'تسجيل الدخول التجريبي', 'hero_subtitle_en' => 'Use these credentials to evaluate selected solutions.', 'hero_subtitle_ar' => 'استخدم هذه البيانات لتجربة الحلول المتاحة.', 'status' => 'published', 'sort_order' => 5],
            ['slug' => 'projects', 'title_en' => 'Projects', 'title_ar' => 'المشاريع', 'hero_title_en' => 'Projects', 'hero_title_ar' => 'المشاريع', 'hero_subtitle_en' => 'Browse ERP, POS, SaaS, and custom software solutions built by our team.', 'hero_subtitle_ar' => 'تصفح حلول ERP وPOS وSaaS والبرمجيات المخصصة التي نفذها فريقنا.', 'status' => 'published', 'sort_order' => 6],
            ['slug' => 'feedback', 'title_en' => 'Feedback', 'title_ar' => 'الملاحظات', 'hero_title_en' => 'Feedback & Bug Reports', 'hero_title_ar' => 'الملاحظات وتقارير الأخطاء', 'hero_subtitle_en' => 'Help us improve quality and support.', 'hero_subtitle_ar' => 'ساعدنا على تحسين الجودة والدعم.', 'status' => 'published', 'sort_order' => 7],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
