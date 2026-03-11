<?php

return [
    'page_title' => '设置菜单编辑器 - Furkan Kalafat',
    'settings' => [
        'title' => '设置菜单编辑器',
        'description' => '对设置分组标题和分组项目进行排序。',
    ],
    'groups' => [
        'settings' => '设置菜单',
        'system' => '系统菜单',
    ],
    'permissions' => [
        'menu_editor' => '设置菜单编辑器',
    ],
    'defaults' => [
        'custom_section_title' => '自定义 :number',
    ],
    'messages' => [
        'invalid_layout_payload' => '布局数据无效。',
        'saved' => '设置菜单顺序已保存。',
        'save_failed' => '无法保存布局。请检查日志。',
        'reset_success' => '设置菜单顺序已重置。',
        'reset_failed' => '无法重置布局。请检查日志。',
    ],
    'ui' => [
        'header_title' => '设置菜单编辑器 - Furkan Kalafat',
        'header_description' => '拖拽标题和卡片。可新增、编辑、删除自定义标题，在标题之间移动卡片，并切换可见性。',
        'reset' => '重置',
        'save_order' => '保存',
        'sortable_missing' => '缺少 Sortable 库。请刷新页面。',
        'new_heading' => '新建标题',
        'new_heading_placeholder' => '示例：支付、集成、物流',
        'target_group_label' => '目标区域',
        'add_heading' => '添加标题',
        'heading_hint' => '创建自定义分组，并通过拖放在分组之间移动卡片。',
        'group_help' => '在此区块中拖拽并排序标题和卡片。',
        'drag_heading' => '拖拽标题',
        'drag_card' => '拖拽卡片',
        'item_count' => ':count 项',
        'show_heading_and_items' => '显示标题和项目',
        'hide_heading_and_items' => '隐藏标题和项目',
        'edit_heading' => '编辑标题',
        'delete_heading' => '删除标题',
        'move_menu_item' => '移动菜单项',
        'move_menu_item_to_group' => '将菜单项移动到 :group',
        'show_menu_item' => '显示菜单项',
        'hide_menu_item' => '隐藏菜单项',
        'drop_cards_here' => '将卡片拖放到此处',
        'heading_title_prompt' => '标题名称',
        'delete_custom_heading_confirm' => '删除自定义标题？',
        'reset_saved_order_confirm' => '重置已保存顺序？',
    ],
];
