<?php

return [
    'page_title' => 'Editor menu nastavení - Furkan Kalafat',
    'settings' => [
        'title' => 'Editor menu nastavení',
        'description' => 'Seřaďte názvy sekcí nastavení a položky sekcí.',
    ],
    'groups' => [
        'settings' => 'Nabídky nastavení',
        'system' => 'Systémové nabídky',
    ],
    'permissions' => [
        'menu_editor' => 'Editor menu nastavení',
    ],
    'defaults' => [
        'custom_section_title' => 'Vlastní :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Neplatná data rozvržení.',
        'saved' => 'Pořadí menu nastavení bylo uloženo.',
        'save_failed' => 'Rozvržení se nepodařilo uložit. Zkontrolujte logy.',
        'reset_success' => 'Pořadí menu nastavení bylo resetováno.',
        'reset_failed' => 'Rozvržení se nepodařilo resetovat. Zkontrolujte logy.',
    ],
    'ui' => [
        'header_title' => 'Editor menu nastavení - Furkan Kalafat',
        'header_description' => 'Přetahujte nadpisy a karty. Přidávejte, upravujte a mažte vlastní nadpisy, přesouvejte karty mezi nadpisy a přepínejte viditelnost.',
        'reset' => 'Resetovat',
        'save_order' => 'Uložit',
        'sortable_missing' => 'Chybí knihovna Sortable. Obnovte stránku.',
        'new_heading' => 'Nový nadpis',
        'new_heading_placeholder' => 'Příklad: Platby, Integrace, Logistika',
        'target_group_label' => 'Cílová oblast',
        'add_heading' => 'Přidat nadpis',
        'heading_hint' => 'Vytvářejte vlastní skupiny a přesouvejte mezi nimi karty pomocí přetažení.',
        'group_help' => 'V tomto bloku přetahujte a řaďte nadpisy a karty.',
        'drag_heading' => 'Přetáhnout nadpis',
        'drag_card' => 'Přetáhnout kartu',
        'item_count' => ':count položek',
        'show_heading_and_items' => 'Zobrazit nadpis a položky',
        'hide_heading_and_items' => 'Skrýt nadpis a položky',
        'edit_heading' => 'Upravit nadpis',
        'delete_heading' => 'Smazat nadpis',
        'move_menu_item' => 'Přesunout položku menu',
        'move_menu_item_to_group' => 'Přesunout položku menu do :group',
        'show_menu_item' => 'Zobrazit položku menu',
        'hide_menu_item' => 'Skrýt položku menu',
        'drop_cards_here' => 'Sem přetáhněte karty',
        'heading_title_prompt' => 'Název nadpisu',
        'delete_custom_heading_confirm' => 'Smazat vlastní nadpis?',
        'reset_saved_order_confirm' => 'Resetovat uložené pořadí?',
    ],
];
