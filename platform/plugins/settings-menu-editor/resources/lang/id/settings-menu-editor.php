<?php

return [
    'page_title' => 'Editor Menu Pengaturan - Furkan Kalafat',
    'settings' => [
        'title' => 'Editor Menu Pengaturan',
        'description' => 'Urutkan judul bagian pengaturan dan item bagian.',
    ],
    'groups' => [
        'settings' => 'Menu Pengaturan',
        'system' => 'Menu Sistem',
    ],
    'permissions' => [
        'menu_editor' => 'Editor Menu Pengaturan',
    ],
    'defaults' => [
        'custom_section_title' => 'Kustom :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Payload tata letak tidak valid.',
        'saved' => 'Urutan menu pengaturan berhasil disimpan.',
        'save_failed' => 'Tidak dapat menyimpan tata letak. Periksa log.',
        'reset_success' => 'Urutan menu pengaturan berhasil direset.',
        'reset_failed' => 'Tidak dapat mereset tata letak. Periksa log.',
    ],
    'ui' => [
        'header_title' => 'Editor Menu Pengaturan - Furkan Kalafat',
        'header_description' => 'Seret heading dan kartu. Tambah, edit, hapus heading kustom, pindahkan kartu antar heading, dan ubah visibilitas.',
        'reset' => 'Reset',
        'save_order' => 'Simpan',
        'sortable_missing' => 'Library Sortable tidak ditemukan. Muat ulang halaman.',
        'new_heading' => 'Heading Baru',
        'new_heading_placeholder' => 'Contoh: Pembayaran, Integrasi, Logistik',
        'target_group_label' => 'Area target',
        'add_heading' => 'Tambah Heading',
        'heading_hint' => 'Buat grup kustom dan pindahkan kartu antar grup dengan drag and drop.',
        'group_help' => 'Seret dan urutkan heading serta kartu di blok ini.',
        'drag_heading' => 'Seret heading',
        'drag_card' => 'Seret kartu',
        'item_count' => ':count item',
        'show_heading_and_items' => 'Tampilkan heading dan item',
        'hide_heading_and_items' => 'Sembunyikan heading dan item',
        'edit_heading' => 'Edit heading',
        'delete_heading' => 'Hapus heading',
        'move_menu_item' => 'Pindahkan item menu',
        'move_menu_item_to_group' => 'Pindahkan item menu ke :group',
        'show_menu_item' => 'Tampilkan item menu',
        'hide_menu_item' => 'Sembunyikan item menu',
        'drop_cards_here' => 'Lepas kartu di sini',
        'heading_title_prompt' => 'Judul heading',
        'delete_custom_heading_confirm' => 'Hapus heading kustom?',
        'reset_saved_order_confirm' => 'Reset urutan yang disimpan?',
    ],
];
