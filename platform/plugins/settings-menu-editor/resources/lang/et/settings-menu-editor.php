<?php

return [
    'page_title' => 'Seadete menüü redaktor - Furkan Kalafat',
    'settings' => [
        'title' => 'Seadete menüü redaktor',
        'description' => 'Sorteeri seadete sektsioonide pealkirju ja sektsioonide üksusi.',
    ],
    'groups' => [
        'settings' => 'Seadete menüüd',
        'system' => 'Süsteemimenüüd',
    ],
    'permissions' => [
        'menu_editor' => 'Seadete menüü redaktor',
    ],
    'defaults' => [
        'custom_section_title' => 'Kohandatud :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Vigased paigutuse andmed.',
        'saved' => 'Seadete menüü järjestus salvestati.',
        'save_failed' => 'Paigutust ei saanud salvestada. Kontrolli logisid.',
        'reset_success' => 'Seadete menüü järjestus lähtestati.',
        'reset_failed' => 'Paigutust ei saanud lähtestada. Kontrolli logisid.',
    ],
    'ui' => [
        'header_title' => 'Seadete menüü redaktor - Furkan Kalafat',
        'header_description' => 'Lohista pealkirju ja kaarte. Lisa, muuda ja kustuta kohandatud pealkirju, liiguta kaarte pealkirjade vahel ning lülita nähtavust.',
        'reset' => 'Lähtesta',
        'save_order' => 'Salvesta',
        'sortable_missing' => 'Sortable teek puudub. Värskenda lehte.',
        'new_heading' => 'Uus pealkiri',
        'new_heading_placeholder' => 'Näide: Maksed, Integratsioonid, Logistika',
        'target_group_label' => 'Sihtala',
        'add_heading' => 'Lisa pealkiri',
        'heading_hint' => 'Loo kohandatud gruppe ja liiguta kaarte gruppide vahel lohista-ja-tila abil.',
        'group_help' => 'Lohista ja sorteeri selles plokis pealkirju ja kaarte.',
        'drag_heading' => 'Lohista pealkirja',
        'drag_card' => 'Lohista kaarti',
        'item_count' => ':count üksust',
        'show_heading_and_items' => 'Kuva pealkiri ja üksused',
        'hide_heading_and_items' => 'Peida pealkiri ja üksused',
        'edit_heading' => 'Muuda pealkirja',
        'delete_heading' => 'Kustuta pealkiri',
        'move_menu_item' => 'Teisalda menüüüksus',
        'move_menu_item_to_group' => 'Teisalda menüüüksus gruppi :group',
        'show_menu_item' => 'Kuva menüüüksus',
        'hide_menu_item' => 'Peida menüüüksus',
        'drop_cards_here' => 'Lohista kaardid siia',
        'heading_title_prompt' => 'Pealkirja nimi',
        'delete_custom_heading_confirm' => 'Kas kustutada kohandatud pealkiri?',
        'reset_saved_order_confirm' => 'Kas lähtestada salvestatud järjestus?',
    ],
];
