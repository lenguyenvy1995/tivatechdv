<?php

return [
    'page_title' => 'Redigerer for innstillingsmeny - Furkan Kalafat',
    'settings' => [
        'title' => 'Redigerer for innstillingsmeny',
        'description' => 'Sorter titler for innstillingsseksjoner og seksjonselementer.',
    ],
    'groups' => [
        'settings' => 'Innstillingsmenyer',
        'system' => 'Systemmenyer',
    ],
    'permissions' => [
        'menu_editor' => 'Redigerer for innstillingsmeny',
    ],
    'defaults' => [
        'custom_section_title' => 'Egendefinert :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Ugyldige layoutdata.',
        'saved' => 'Rekkefølgen i innstillingsmenyen er lagret.',
        'save_failed' => 'Kunne ikke lagre layouten. Sjekk logger.',
        'reset_success' => 'Rekkefølgen i innstillingsmenyen er tilbakestilt.',
        'reset_failed' => 'Kunne ikke tilbakestille layouten. Sjekk logger.',
    ],
    'ui' => [
        'header_title' => 'Redigerer for innstillingsmeny - Furkan Kalafat',
        'header_description' => 'Dra overskrifter og kort. Legg til, rediger og slett egendefinerte overskrifter, flytt kort mellom overskrifter og veksle synlighet.',
        'reset' => 'Tilbakestill',
        'save_order' => 'Lagre',
        'sortable_missing' => 'Sortable-biblioteket mangler. Oppdater siden.',
        'new_heading' => 'Ny overskrift',
        'new_heading_placeholder' => 'Eksempel: Betalinger, Integrasjoner, Logistikk',
        'target_group_label' => 'Målområde',
        'add_heading' => 'Legg til overskrift',
        'heading_hint' => 'Opprett egendefinerte grupper og flytt kort mellom grupper med dra og slipp.',
        'group_help' => 'Dra og sorter overskrifter og kort i denne blokken.',
        'drag_heading' => 'Dra overskrift',
        'drag_card' => 'Dra kort',
        'item_count' => ':count elementer',
        'show_heading_and_items' => 'Vis overskrift og elementer',
        'hide_heading_and_items' => 'Skjul overskrift og elementer',
        'edit_heading' => 'Rediger overskrift',
        'delete_heading' => 'Slett overskrift',
        'move_menu_item' => 'Flytt menyelement',
        'move_menu_item_to_group' => 'Flytt menyelement til :group',
        'show_menu_item' => 'Vis menyelement',
        'hide_menu_item' => 'Skjul menyelement',
        'drop_cards_here' => 'Slipp kort her',
        'heading_title_prompt' => 'Overskriftstittel',
        'delete_custom_heading_confirm' => 'Slette egendefinert overskrift?',
        'reset_saved_order_confirm' => 'Tilbakestille lagret rekkefølge?',
    ],
];
