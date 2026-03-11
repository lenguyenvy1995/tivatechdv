<?php

return [
    'page_title' => 'محرر قائمة الإعدادات - Furkan Kalafat',
    'settings' => [
        'title' => 'محرر قائمة الإعدادات',
        'description' => 'رتّب عناوين أقسام الإعدادات وعناصر الأقسام.',
    ],
    'groups' => [
        'settings' => 'قوائم الإعدادات',
        'system' => 'قوائم النظام',
    ],
    'permissions' => [
        'menu_editor' => 'محرر قائمة الإعدادات',
    ],
    'defaults' => [
        'custom_section_title' => 'مخصص :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'بيانات التخطيط غير صالحة.',
        'saved' => 'تم حفظ ترتيب قائمة الإعدادات.',
        'save_failed' => 'تعذر حفظ التخطيط. تحقق من السجلات.',
        'reset_success' => 'تمت إعادة تعيين ترتيب قائمة الإعدادات.',
        'reset_failed' => 'تعذر إعادة تعيين التخطيط. تحقق من السجلات.',
    ],
    'ui' => [
        'header_title' => 'محرر قائمة الإعدادات - Furkan Kalafat',
        'header_description' => 'اسحب العناوين والبطاقات. أضف عناوين مخصصة أو عدّلها أو احذفها، وانقل البطاقات بين العناوين، وبدّل مستوى الرؤية.',
        'reset' => 'إعادة تعيين',
        'save_order' => 'حفظ',
        'sortable_missing' => 'مكتبة Sortable مفقودة. قم بتحديث الصفحة.',
        'new_heading' => 'عنوان جديد',
        'new_heading_placeholder' => 'مثال: المدفوعات، التكاملات، الخدمات اللوجستية',
        'target_group_label' => 'المنطقة المستهدفة',
        'add_heading' => 'إضافة عنوان',
        'heading_hint' => 'أنشئ مجموعات مخصصة وانقل البطاقات بين المجموعات بالسحب والإفلات.',
        'group_help' => 'اسحب ورتب العناوين والبطاقات داخل هذه الكتلة.',
        'drag_heading' => 'اسحب العنوان',
        'drag_card' => 'اسحب البطاقة',
        'item_count' => ':count عناصر',
        'show_heading_and_items' => 'إظهار العنوان والعناصر',
        'hide_heading_and_items' => 'إخفاء العنوان والعناصر',
        'edit_heading' => 'تعديل العنوان',
        'delete_heading' => 'حذف العنوان',
        'move_menu_item' => 'نقل عنصر القائمة',
        'move_menu_item_to_group' => 'نقل عنصر القائمة إلى :group',
        'show_menu_item' => 'إظهار عنصر القائمة',
        'hide_menu_item' => 'إخفاء عنصر القائمة',
        'drop_cards_here' => 'أفلت البطاقات هنا',
        'heading_title_prompt' => 'عنوان الترويسة',
        'delete_custom_heading_confirm' => 'حذف العنوان المخصص؟',
        'reset_saved_order_confirm' => 'إعادة تعيين الترتيب المحفوظ؟',
    ],
];
