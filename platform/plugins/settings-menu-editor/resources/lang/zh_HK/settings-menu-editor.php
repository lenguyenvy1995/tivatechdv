<?php

return [
    'page_title' => '設定選單編輯器 - Furkan Kalafat',
    'settings' => [
        'title' => '設定選單編輯器',
        'description' => '排序設定區塊標題與區塊項目。',
    ],
    'groups' => [
        'settings' => '設定選單',
        'system' => '系統選單',
    ],
    'permissions' => [
        'menu_editor' => '設定選單編輯器',
    ],
    'defaults' => [
        'custom_section_title' => '自訂 :number',
    ],
    'messages' => [
        'invalid_layout_payload' => '版面配置資料無效。',
        'saved' => '設定選單順序已儲存。',
        'save_failed' => '無法儲存版面配置。請檢查日誌。',
        'reset_success' => '設定選單順序已重設。',
        'reset_failed' => '無法重設版面配置。請檢查日誌。',
    ],
    'ui' => [
        'header_title' => '設定選單編輯器 - Furkan Kalafat',
        'header_description' => '拖曳標題和卡片。可新增、編輯、刪除自訂標題，於標題間移動卡片，並切換可見性。',
        'reset' => '重設',
        'save_order' => '儲存',
        'sortable_missing' => '缺少 Sortable 函式庫。請重新整理頁面。',
        'new_heading' => '新標題',
        'new_heading_placeholder' => '範例：付款、整合、物流',
        'target_group_label' => '目標區域',
        'add_heading' => '新增標題',
        'heading_hint' => '建立自訂群組，並以拖放方式在群組間移動卡片。',
        'group_help' => '在此區塊拖曳並排序標題與卡片。',
        'drag_heading' => '拖曳標題',
        'drag_card' => '拖曳卡片',
        'item_count' => ':count 項目',
        'show_heading_and_items' => '顯示標題與項目',
        'hide_heading_and_items' => '隱藏標題與項目',
        'edit_heading' => '編輯標題',
        'delete_heading' => '刪除標題',
        'move_menu_item' => '移動選單項目',
        'move_menu_item_to_group' => '將選單項目移至 :group',
        'show_menu_item' => '顯示選單項目',
        'hide_menu_item' => '隱藏選單項目',
        'drop_cards_here' => '將卡片拖放到這裡',
        'heading_title_prompt' => '標題名稱',
        'delete_custom_heading_confirm' => '刪除自訂標題？',
        'reset_saved_order_confirm' => '重設已儲存的順序？',
    ],
];
