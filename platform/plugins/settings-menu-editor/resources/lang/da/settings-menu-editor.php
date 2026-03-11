<?php

return [
    'page_title' => 'Indstillingsmenu-editor - Furkan Kalafat',
    'settings' => [
        'title' => 'Indstillingsmenu-editor',
        'description' => 'Sorter titler på indstillingssektioner og sektionspunkter.',
    ],
    'groups' => [
        'settings' => 'Indstillingsmenuer',
        'system' => 'Systemmenuer',
    ],
    'permissions' => [
        'menu_editor' => 'Indstillingsmenu-editor',
    ],
    'defaults' => [
        'custom_section_title' => 'Brugerdefineret :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Ugyldige layoutdata.',
        'saved' => 'Rækkefølgen i indstillingsmenuen er gemt.',
        'save_failed' => 'Kunne ikke gemme layoutet. Tjek logfilerne.',
        'reset_success' => 'Rækkefølgen i indstillingsmenuen er nulstillet.',
        'reset_failed' => 'Kunne ikke nulstille layoutet. Tjek logfilerne.',
    ],
    'ui' => [
        'header_title' => 'Indstillingsmenu-editor - Furkan Kalafat',
        'header_description' => 'Træk overskrifter og kort. Tilføj, rediger og slet brugerdefinerede overskrifter, flyt kort mellem overskrifter, og skift synlighed.',
        'reset' => 'Nulstil',
        'save_order' => 'Gem',
        'sortable_missing' => 'Sortable-biblioteket mangler. Opdater siden.',
        'new_heading' => 'Ny overskrift',
        'new_heading_placeholder' => 'Eksempel: Betalinger, Integrationer, Logistik',
        'target_group_label' => 'Målområde',
        'add_heading' => 'Tilføj overskrift',
        'heading_hint' => 'Opret brugerdefinerede grupper og flyt kort mellem grupper med træk og slip.',
        'group_help' => 'Træk og sorter overskrifter og kort i denne blok.',
        'drag_heading' => 'Træk overskrift',
        'drag_card' => 'Træk kort',
        'item_count' => ':count elementer',
        'show_heading_and_items' => 'Vis overskrift og elementer',
        'hide_heading_and_items' => 'Skjul overskrift og elementer',
        'edit_heading' => 'Rediger overskrift',
        'delete_heading' => 'Slet overskrift',
        'move_menu_item' => 'Flyt menupunkt',
        'move_menu_item_to_group' => 'Flyt menupunkt til :group',
        'show_menu_item' => 'Vis menupunkt',
        'hide_menu_item' => 'Skjul menupunkt',
        'drop_cards_here' => 'Slip kort her',
        'heading_title_prompt' => 'Overskriftstitel',
        'delete_custom_heading_confirm' => 'Slet brugerdefineret overskrift?',
        'reset_saved_order_confirm' => 'Nulstil gemt rækkefølge?',
    ],
];
