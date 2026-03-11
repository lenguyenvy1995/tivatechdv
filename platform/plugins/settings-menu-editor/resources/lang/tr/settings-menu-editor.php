<?php

return [
    'page_title' => 'Ayar Menüsü Düzenleyici - Furkan Kalafat',
    'settings' => [
        'title' => 'Ayar Menüsü Düzenleyici',
        'description' => 'Ayar bölüm başlıklarını ve bölüm öğelerini sıralayın.',
    ],
    'groups' => [
        'settings' => 'Ayar Menüleri',
        'system' => 'Sistem Menüleri',
    ],
    'permissions' => [
        'menu_editor' => 'Ayar Menüsü Düzenleyici',
    ],
    'defaults' => [
        'custom_section_title' => 'Özel :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Düzen verisi geçersiz.',
        'saved' => 'Ayar menüsü sıralaması kaydedildi.',
        'save_failed' => 'Düzen kaydedilemedi. Logları kontrol edin.',
        'reset_success' => 'Ayar menüsü sıralaması sıfırlandı.',
        'reset_failed' => 'Düzen sıfırlanamadı. Logları kontrol edin.',
    ],
    'ui' => [
        'header_title' => 'Ayar Menüsü Düzenleyici - Furkan Kalafat',
        'header_description' => 'Başlıkları ve kartları sürükleyin. Özel başlık ekleyin, düzenleyin, silin, kartları başlıklar arasında taşıyın ve görünürlüğü değiştirin.',
        'reset' => 'Sıfırla',
        'save_order' => 'Kaydet',
        'sortable_missing' => 'Sortable kütüphanesi eksik. Sayfayı yenileyin.',
        'new_heading' => 'Yeni Başlık',
        'new_heading_placeholder' => 'Örnek: Ödemeler, Entegrasyonlar, Lojistik',
        'target_group_label' => 'Hedef alan',
        'add_heading' => 'Başlık Ekle',
        'heading_hint' => 'Özel gruplar oluşturun ve kartları sürükle-bırak ile gruplar arasında taşıyın.',
        'group_help' => 'Bu blokta başlıkları ve kartları sürükleyerek sıralayın.',
        'drag_heading' => 'Başlığı sürükle',
        'drag_card' => 'Kartı sürükle',
        'item_count' => ':count öğe',
        'show_heading_and_items' => 'Başlık ve öğeleri göster',
        'hide_heading_and_items' => 'Başlık ve öğeleri gizle',
        'edit_heading' => 'Başlığı düzenle',
        'delete_heading' => 'Başlığı sil',
        'move_menu_item' => 'Menü öğesini taşı',
        'move_menu_item_to_group' => 'Menü öğesini :group alanına taşı',
        'show_menu_item' => 'Menü öğesini göster',
        'hide_menu_item' => 'Menü öğesini gizle',
        'drop_cards_here' => 'Kartları buraya bırakın',
        'heading_title_prompt' => 'Başlık adı',
        'delete_custom_heading_confirm' => 'Özel başlık silinsin mi?',
        'reset_saved_order_confirm' => 'Kaydedilen sıralama sıfırlansın mı?',
    ],
];
