<?php

return [
    'page_title' => 'Settings Menu Editor - Furkan Kalafat',
    'settings' => [
        'title' => 'Settings Menu Editor',
        'description' => 'Sort settings section titles and section items.',
    ],
    'groups' => [
        'settings' => 'Settings Menus',
        'system' => 'System Menus',
    ],
    'permissions' => [
        'menu_editor' => 'Settings Menu Editor',
    ],
    'defaults' => [
        'custom_section_title' => 'Custom :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Invalid layout payload.',
        'saved' => 'Settings menu order saved.',
        'save_failed' => 'Could not save layout. Check logs.',
        'reset_success' => 'Settings menu order reset.',
        'reset_failed' => 'Could not reset layout. Check logs.',
    ],
    'ui' => [
        'header_title' => 'Settings Menu Editor - Furkan Kalafat',
        'header_description' => 'Drag headings and cards. Add, edit, delete custom headings, move cards across headings, and toggle visibility.',
        'reset' => 'Reset',
        'save_order' => 'Save',
        'sortable_missing' => 'Sortable library is missing. Refresh the page.',
        'new_heading' => 'New Heading',
        'new_heading_placeholder' => 'Example: Payments, Integrations, Logistics',
        'target_group_label' => 'Target area',
        'add_heading' => 'Add Heading',
        'heading_hint' => 'Create custom groups and move cards between groups with drag and drop.',
        'group_help' => 'Drag and sort headings and cards in this block.',
        'drag_heading' => 'Drag heading',
        'drag_card' => 'Drag card',
        'item_count' => ':count items',
        'show_heading_and_items' => 'Show heading and items',
        'hide_heading_and_items' => 'Hide heading and items',
        'edit_heading' => 'Edit heading',
        'delete_heading' => 'Delete heading',
        'move_menu_item' => 'Move menu item',
        'move_menu_item_to_group' => 'Move menu item to :group',
        'show_menu_item' => 'Show menu item',
        'hide_menu_item' => 'Hide menu item',
        'drop_cards_here' => 'Drop cards here',
        'heading_title_prompt' => 'Heading title',
        'delete_custom_heading_confirm' => 'Delete custom heading?',
        'reset_saved_order_confirm' => 'Reset saved order?',
    ],
];
