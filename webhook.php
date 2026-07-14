<?php
// این فایل ورودی‌های تلگرام رو دریافت میکنه و به ربات اصلی (index.php) می‌ده

// مسیر فایل اصلی ربات
require_once __DIR__ . '/index.php';

// اینجا ربات باید درخواست رو پردازش کنه
// اگه ربات شما از Webhook پشتیبانی میکنه، کدش اینجاست
// معمولاً ربات‌های ساده به این شکل هستن:

// دریافت داده‌های ورودی از تلگرام
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if ($update) {
    // اینجا کد پردازش پیام رو قرار میدیم
    // مثلاً: 
    // $bot = new Bot();
    // $bot->handle($update);
    
    // برای تست، یه پاسخ ساده برمیگردونیم
    http_response_code(200);
    echo "OK";
} else {
    http_response_code(400);
    echo "Invalid request";
}
?>