<?php

return [
    'page_title' => 'Penyunting Menu Tetapan - Furkan Kalafat',
    'settings' => [
        'title' => 'Penyunting Menu Tetapan',
        'description' => 'Susun tajuk bahagian tetapan dan item bahagian.',
    ],
    'groups' => [
        'settings' => 'Menu Tetapan',
        'system' => 'Menu Sistem',
    ],
    'permissions' => [
        'menu_editor' => 'Penyunting Menu Tetapan',
    ],
    'defaults' => [
        'custom_section_title' => 'Tersuai :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Data susun atur tidak sah.',
        'saved' => 'Susunan menu tetapan berjaya disimpan.',
        'save_failed' => 'Tidak dapat menyimpan susun atur. Semak log.',
        'reset_success' => 'Susunan menu tetapan telah ditetapkan semula.',
        'reset_failed' => 'Tidak dapat menetapkan semula susun atur. Semak log.',
    ],
    'ui' => [
        'header_title' => 'Penyunting Menu Tetapan - Furkan Kalafat',
        'header_description' => 'Seret tajuk dan kad. Tambah, edit, padam tajuk tersuai, alihkan kad antara tajuk, dan togol keterlihatan.',
        'reset' => 'Tetapkan semula',
        'save_order' => 'Simpan',
        'sortable_missing' => 'Pustaka Sortable tiada. Muat semula halaman.',
        'new_heading' => 'Tajuk Baharu',
        'new_heading_placeholder' => 'Contoh: Pembayaran, Integrasi, Logistik',
        'target_group_label' => 'Kawasan sasaran',
        'add_heading' => 'Tambah Tajuk',
        'heading_hint' => 'Cipta kumpulan tersuai dan alihkan kad antara kumpulan dengan seret dan lepas.',
        'group_help' => 'Seret dan susun tajuk serta kad dalam blok ini.',
        'drag_heading' => 'Seret tajuk',
        'drag_card' => 'Seret kad',
        'item_count' => ':count item',
        'show_heading_and_items' => 'Tunjukkan tajuk dan item',
        'hide_heading_and_items' => 'Sembunyikan tajuk dan item',
        'edit_heading' => 'Edit tajuk',
        'delete_heading' => 'Padam tajuk',
        'move_menu_item' => 'Alihkan item menu',
        'move_menu_item_to_group' => 'Alihkan item menu ke :group',
        'show_menu_item' => 'Tunjukkan item menu',
        'hide_menu_item' => 'Sembunyikan item menu',
        'drop_cards_here' => 'Lepaskan kad di sini',
        'heading_title_prompt' => 'Tajuk heading',
        'delete_custom_heading_confirm' => 'Padam tajuk tersuai?',
        'reset_saved_order_confirm' => 'Tetapkan semula susunan yang disimpan?',
    ],
];
