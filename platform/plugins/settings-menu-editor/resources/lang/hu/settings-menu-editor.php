<?php

return [
    'page_title' => 'Beállítások menü szerkesztő - Furkan Kalafat',
    'settings' => [
        'title' => 'Beállítások menü szerkesztő',
        'description' => 'Rendezze a beállítások szakaszcímeit és a szakasz elemeit.',
    ],
    'groups' => [
        'settings' => 'Beállítások menük',
        'system' => 'Rendszermenük',
    ],
    'permissions' => [
        'menu_editor' => 'Beállítások menü szerkesztő',
    ],
    'defaults' => [
        'custom_section_title' => 'Egyedi :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Érvénytelen elrendezésadatok.',
        'saved' => 'A beállítások menü sorrendje mentve.',
        'save_failed' => 'Nem sikerült menteni az elrendezést. Ellenőrizze a naplókat.',
        'reset_success' => 'A beállítások menü sorrendje visszaállítva.',
        'reset_failed' => 'Nem sikerült visszaállítani az elrendezést. Ellenőrizze a naplókat.',
    ],
    'ui' => [
        'header_title' => 'Beállítások menü szerkesztő - Furkan Kalafat',
        'header_description' => 'Húzza a fejléceket és a kártyákat. Adjon hozzá, szerkesszen és töröljön egyedi fejléceket, mozgassa a kártyákat a fejlécek között, és kapcsolja a láthatóságot.',
        'reset' => 'Visszaállítás',
        'save_order' => 'Mentés',
        'sortable_missing' => 'A Sortable könyvtár hiányzik. Frissítse az oldalt.',
        'new_heading' => 'Új fejléc',
        'new_heading_placeholder' => 'Példa: Fizetések, Integrációk, Logisztika',
        'target_group_label' => 'Célterület',
        'add_heading' => 'Fejléc hozzáadása',
        'heading_hint' => 'Hozzon létre egyedi csoportokat, és húzással helyezze át a kártyákat a csoportok között.',
        'group_help' => 'Húzza és rendezze a fejléceket és kártyákat ebben a blokkban.',
        'drag_heading' => 'Fejléc húzása',
        'drag_card' => 'Kártya húzása',
        'item_count' => ':count elem',
        'show_heading_and_items' => 'Fejléc és elemek megjelenítése',
        'hide_heading_and_items' => 'Fejléc és elemek elrejtése',
        'edit_heading' => 'Fejléc szerkesztése',
        'delete_heading' => 'Fejléc törlése',
        'move_menu_item' => 'Menüelem áthelyezése',
        'move_menu_item_to_group' => 'Menüelem áthelyezése ide: :group',
        'show_menu_item' => 'Menüelem megjelenítése',
        'hide_menu_item' => 'Menüelem elrejtése',
        'drop_cards_here' => 'Dobja ide a kártyákat',
        'heading_title_prompt' => 'Fejléc címe',
        'delete_custom_heading_confirm' => 'Törli az egyedi fejlécet?',
        'reset_saved_order_confirm' => 'Visszaállítja a mentett sorrendet?',
    ],
];
