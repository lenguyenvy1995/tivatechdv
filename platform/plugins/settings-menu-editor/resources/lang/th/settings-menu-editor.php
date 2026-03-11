<?php

return [
    'page_title' => 'ตัวแก้ไขเมนูการตั้งค่า - Furkan Kalafat',
    'settings' => [
        'title' => 'ตัวแก้ไขเมนูการตั้งค่า',
        'description' => 'จัดเรียงหัวข้อส่วนการตั้งค่าและรายการในส่วน',
    ],
    'groups' => [
        'settings' => 'เมนูการตั้งค่า',
        'system' => 'เมนูระบบ',
    ],
    'permissions' => [
        'menu_editor' => 'ตัวแก้ไขเมนูการตั้งค่า',
    ],
    'defaults' => [
        'custom_section_title' => 'กำหนดเอง :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'ข้อมูลเลย์เอาต์ไม่ถูกต้อง',
        'saved' => 'บันทึกลำดับเมนูการตั้งค่าแล้ว',
        'save_failed' => 'ไม่สามารถบันทึกเลย์เอาต์ได้ โปรดตรวจสอบบันทึก',
        'reset_success' => 'รีเซ็ตลำดับเมนูการตั้งค่าแล้ว',
        'reset_failed' => 'ไม่สามารถรีเซ็ตเลย์เอาต์ได้ โปรดตรวจสอบบันทึก',
    ],
    'ui' => [
        'header_title' => 'ตัวแก้ไขเมนูการตั้งค่า - Furkan Kalafat',
        'header_description' => 'ลากหัวข้อและการ์ด เพิ่ม แก้ไข ลบหัวข้อแบบกำหนดเอง ย้ายการ์ดข้ามหัวข้อ และสลับการมองเห็น',
        'reset' => 'รีเซ็ต',
        'save_order' => 'บันทึก',
        'sortable_missing' => 'ไม่พบไลบรารี Sortable โปรดรีเฟรชหน้า',
        'new_heading' => 'หัวข้อใหม่',
        'new_heading_placeholder' => 'ตัวอย่าง: การชำระเงิน, การเชื่อมต่อ, โลจิสติกส์',
        'target_group_label' => 'พื้นที่เป้าหมาย',
        'add_heading' => 'เพิ่มหัวข้อ',
        'heading_hint' => 'สร้างกลุ่มแบบกำหนดเองและย้ายการ์ดระหว่างกลุ่มด้วยการลากและวาง',
        'group_help' => 'ลากและเรียงหัวข้อและการ์ดในบล็อกนี้',
        'drag_heading' => 'ลากหัวข้อ',
        'drag_card' => 'ลากการ์ด',
        'item_count' => ':count รายการ',
        'show_heading_and_items' => 'แสดงหัวข้อและรายการ',
        'hide_heading_and_items' => 'ซ่อนหัวข้อและรายการ',
        'edit_heading' => 'แก้ไขหัวข้อ',
        'delete_heading' => 'ลบหัวข้อ',
        'move_menu_item' => 'ย้ายรายการเมนู',
        'move_menu_item_to_group' => 'ย้ายรายการเมนูไปที่ :group',
        'show_menu_item' => 'แสดงรายการเมนู',
        'hide_menu_item' => 'ซ่อนรายการเมนู',
        'drop_cards_here' => 'วางการ์ดที่นี่',
        'heading_title_prompt' => 'ชื่อหัวข้อ',
        'delete_custom_heading_confirm' => 'ลบหัวข้อแบบกำหนดเองหรือไม่?',
        'reset_saved_order_confirm' => 'รีเซ็ตลำดับที่บันทึกไว้หรือไม่?',
    ],
];
