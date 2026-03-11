<?php

return [
    'page_title' => 'Trình chỉnh sửa menu cài đặt - Furkan Kalafat',
    'settings' => [
        'title' => 'Trình chỉnh sửa menu cài đặt',
        'description' => 'Sắp xếp tiêu đề phần cài đặt và các mục trong phần.',
    ],
    'groups' => [
        'settings' => 'Menu cài đặt',
        'system' => 'Menu hệ thống',
    ],
    'permissions' => [
        'menu_editor' => 'Trình chỉnh sửa menu cài đặt',
    ],
    'defaults' => [
        'custom_section_title' => 'Tùy chỉnh :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Dữ liệu bố cục không hợp lệ.',
        'saved' => 'Đã lưu thứ tự menu cài đặt.',
        'save_failed' => 'Không thể lưu bố cục. Hãy kiểm tra nhật ký.',
        'reset_success' => 'Đã đặt lại thứ tự menu cài đặt.',
        'reset_failed' => 'Không thể đặt lại bố cục. Hãy kiểm tra nhật ký.',
    ],
    'ui' => [
        'header_title' => 'Trình chỉnh sửa menu cài đặt - Furkan Kalafat',
        'header_description' => 'Kéo tiêu đề và thẻ. Thêm, sửa, xóa tiêu đề tùy chỉnh, di chuyển thẻ giữa các tiêu đề và bật/tắt hiển thị.',
        'reset' => 'Đặt lại',
        'save_order' => 'Lưu',
        'sortable_missing' => 'Thiếu thư viện Sortable. Hãy làm mới trang.',
        'new_heading' => 'Tiêu đề mới',
        'new_heading_placeholder' => 'Ví dụ: Thanh toán, Tích hợp, Hậu cần',
        'target_group_label' => 'Khu vực đích',
        'add_heading' => 'Thêm tiêu đề',
        'heading_hint' => 'Tạo nhóm tùy chỉnh và di chuyển thẻ giữa các nhóm bằng kéo thả.',
        'group_help' => 'Kéo và sắp xếp tiêu đề và thẻ trong khối này.',
        'drag_heading' => 'Kéo tiêu đề',
        'drag_card' => 'Kéo thẻ',
        'item_count' => ':count mục',
        'show_heading_and_items' => 'Hiển thị tiêu đề và mục',
        'hide_heading_and_items' => 'Ẩn tiêu đề và mục',
        'edit_heading' => 'Sửa tiêu đề',
        'delete_heading' => 'Xóa tiêu đề',
        'move_menu_item' => 'Di chuyển mục menu',
        'move_menu_item_to_group' => 'Di chuyển mục menu đến :group',
        'show_menu_item' => 'Hiển thị mục menu',
        'hide_menu_item' => 'Ẩn mục menu',
        'drop_cards_here' => 'Thả thẻ tại đây',
        'heading_title_prompt' => 'Tên tiêu đề',
        'delete_custom_heading_confirm' => 'Xóa tiêu đề tùy chỉnh?',
        'reset_saved_order_confirm' => 'Đặt lại thứ tự đã lưu?',
    ],
];
