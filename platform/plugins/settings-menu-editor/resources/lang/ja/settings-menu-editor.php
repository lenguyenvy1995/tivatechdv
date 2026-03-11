<?php

return [
    'page_title' => '設定メニューエディター - Furkan Kalafat',
    'settings' => [
        'title' => '設定メニューエディター',
        'description' => '設定セクションの見出しとセクション項目を並べ替えます。',
    ],
    'groups' => [
        'settings' => '設定メニュー',
        'system' => 'システムメニュー',
    ],
    'permissions' => [
        'menu_editor' => '設定メニューエディター',
    ],
    'defaults' => [
        'custom_section_title' => 'カスタム :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'レイアウトデータが無効です。',
        'saved' => '設定メニューの並び順を保存しました。',
        'save_failed' => 'レイアウトを保存できませんでした。ログを確認してください。',
        'reset_success' => '設定メニューの並び順をリセットしました。',
        'reset_failed' => 'レイアウトをリセットできませんでした。ログを確認してください。',
    ],
    'ui' => [
        'header_title' => '設定メニューエディター - Furkan Kalafat',
        'header_description' => '見出しとカードをドラッグします。カスタム見出しの追加・編集・削除、見出し間でのカード移動、表示切り替えができます。',
        'reset' => 'リセット',
        'save_order' => '保存',
        'sortable_missing' => 'Sortable ライブラリが見つかりません。ページを再読み込みしてください。',
        'new_heading' => '新しい見出し',
        'new_heading_placeholder' => '例: 支払い、連携、物流',
        'target_group_label' => '対象エリア',
        'add_heading' => '見出しを追加',
        'heading_hint' => 'カスタムグループを作成し、ドラッグ＆ドロップでグループ間にカードを移動できます。',
        'group_help' => 'このブロックで見出しとカードをドラッグして並べ替えます。',
        'drag_heading' => '見出しをドラッグ',
        'drag_card' => 'カードをドラッグ',
        'item_count' => ':count 件',
        'show_heading_and_items' => '見出しと項目を表示',
        'hide_heading_and_items' => '見出しと項目を非表示',
        'edit_heading' => '見出しを編集',
        'delete_heading' => '見出しを削除',
        'move_menu_item' => 'メニュー項目を移動',
        'move_menu_item_to_group' => 'メニュー項目を :group に移動',
        'show_menu_item' => 'メニュー項目を表示',
        'hide_menu_item' => 'メニュー項目を非表示',
        'drop_cards_here' => 'ここにカードをドロップ',
        'heading_title_prompt' => '見出しタイトル',
        'delete_custom_heading_confirm' => 'カスタム見出しを削除しますか？',
        'reset_saved_order_confirm' => '保存済みの並び順をリセットしますか？',
    ],
];
