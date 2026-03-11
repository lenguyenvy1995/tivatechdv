<?php

return [
    'page_title' => 'Redigerare för inställningsmeny - Furkan Kalafat',
    'settings' => [
        'title' => 'Redigerare för inställningsmeny',
        'description' => 'Sortera rubriker för inställningssektioner och sektionsobjekt.',
    ],
    'groups' => [
        'settings' => 'Inställningsmenyer',
        'system' => 'Systemmenyer',
    ],
    'permissions' => [
        'menu_editor' => 'Redigerare för inställningsmeny',
    ],
    'defaults' => [
        'custom_section_title' => 'Anpassad :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Ogiltig layoutdata.',
        'saved' => 'Ordningen för inställningsmenyn har sparats.',
        'save_failed' => 'Kunde inte spara layouten. Kontrollera loggarna.',
        'reset_success' => 'Ordningen för inställningsmenyn har återställts.',
        'reset_failed' => 'Kunde inte återställa layouten. Kontrollera loggarna.',
    ],
    'ui' => [
        'header_title' => 'Redigerare för inställningsmeny - Furkan Kalafat',
        'header_description' => 'Dra rubriker och kort. Lägg till, redigera och ta bort anpassade rubriker, flytta kort mellan rubriker och växla synlighet.',
        'reset' => 'Återställ',
        'save_order' => 'Spara',
        'sortable_missing' => 'Sortable-biblioteket saknas. Uppdatera sidan.',
        'new_heading' => 'Ny rubrik',
        'new_heading_placeholder' => 'Exempel: Betalningar, Integrationer, Logistik',
        'target_group_label' => 'Målområde',
        'add_heading' => 'Lägg till rubrik',
        'heading_hint' => 'Skapa anpassade grupper och flytta kort mellan grupper med dra och släpp.',
        'group_help' => 'Dra och sortera rubriker och kort i detta block.',
        'drag_heading' => 'Dra rubrik',
        'drag_card' => 'Dra kort',
        'item_count' => ':count objekt',
        'show_heading_and_items' => 'Visa rubrik och objekt',
        'hide_heading_and_items' => 'Dölj rubrik och objekt',
        'edit_heading' => 'Redigera rubrik',
        'delete_heading' => 'Ta bort rubrik',
        'move_menu_item' => 'Flytta menyobjekt',
        'move_menu_item_to_group' => 'Flytta menyobjekt till :group',
        'show_menu_item' => 'Visa menyobjekt',
        'hide_menu_item' => 'Dölj menyobjekt',
        'drop_cards_here' => 'Släpp kort här',
        'heading_title_prompt' => 'Rubriktitel',
        'delete_custom_heading_confirm' => 'Ta bort anpassad rubrik?',
        'reset_saved_order_confirm' => 'Återställa sparad ordning?',
    ],
];
