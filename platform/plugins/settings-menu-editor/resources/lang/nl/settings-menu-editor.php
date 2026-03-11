<?php

return [
    'page_title' => 'Instellingenmenu-editor - Furkan Kalafat',
    'settings' => [
        'title' => 'Instellingenmenu-editor',
        'description' => 'Sorteer titels van instellingensecties en sectie-items.',
    ],
    'groups' => [
        'settings' => 'Instellingenmenu\'s',
        'system' => 'Systeemmenu\'s',
    ],
    'permissions' => [
        'menu_editor' => 'Instellingenmenu-editor',
    ],
    'defaults' => [
        'custom_section_title' => 'Aangepast :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Ongeldige lay-outgegevens.',
        'saved' => 'Volgorde van het instellingenmenu is opgeslagen.',
        'save_failed' => 'Kon lay-out niet opslaan. Controleer de logs.',
        'reset_success' => 'Volgorde van het instellingenmenu is gereset.',
        'reset_failed' => 'Kon lay-out niet resetten. Controleer de logs.',
    ],
    'ui' => [
        'header_title' => 'Instellingenmenu-editor - Furkan Kalafat',
        'header_description' => 'Sleep koppen en kaarten. Voeg aangepaste koppen toe, bewerk of verwijder ze, verplaats kaarten tussen koppen en schakel zichtbaarheid in of uit.',
        'reset' => 'Reset',
        'save_order' => 'Opslaan',
        'sortable_missing' => 'Sortable-bibliotheek ontbreekt. Vernieuw de pagina.',
        'new_heading' => 'Nieuwe kop',
        'new_heading_placeholder' => 'Voorbeeld: Betalingen, Integraties, Logistiek',
        'target_group_label' => 'Doelgebied',
        'add_heading' => 'Kop toevoegen',
        'heading_hint' => 'Maak aangepaste groepen en verplaats kaarten tussen groepen met slepen en neerzetten.',
        'group_help' => 'Sleep en sorteer koppen en kaarten in dit blok.',
        'drag_heading' => 'Kop slepen',
        'drag_card' => 'Kaart slepen',
        'item_count' => ':count items',
        'show_heading_and_items' => 'Kop en items tonen',
        'hide_heading_and_items' => 'Kop en items verbergen',
        'edit_heading' => 'Kop bewerken',
        'delete_heading' => 'Kop verwijderen',
        'move_menu_item' => 'Menu-item verplaatsen',
        'move_menu_item_to_group' => 'Menu-item verplaatsen naar :group',
        'show_menu_item' => 'Menu-item tonen',
        'hide_menu_item' => 'Menu-item verbergen',
        'drop_cards_here' => 'Laat kaarten hier vallen',
        'heading_title_prompt' => 'Koptitel',
        'delete_custom_heading_confirm' => 'Aangepaste kop verwijderen?',
        'reset_saved_order_confirm' => 'Opgeslagen volgorde resetten?',
    ],
];
