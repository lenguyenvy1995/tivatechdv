<?php

return [
    'page_title' => 'Editor del menu impostazioni - Furkan Kalafat',
    'settings' => [
        'title' => 'Editor del menu impostazioni',
        'description' => 'Ordina i titoli delle sezioni impostazioni e gli elementi delle sezioni.',
    ],
    'groups' => [
        'settings' => 'Menu impostazioni',
        'system' => 'Menu di sistema',
    ],
    'permissions' => [
        'menu_editor' => 'Editor del menu impostazioni',
    ],
    'defaults' => [
        'custom_section_title' => 'Personalizzato :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Payload del layout non valido.',
        'saved' => 'Ordine del menu impostazioni salvato.',
        'save_failed' => 'Impossibile salvare il layout. Controlla i log.',
        'reset_success' => 'Ordine del menu impostazioni ripristinato.',
        'reset_failed' => 'Impossibile ripristinare il layout. Controlla i log.',
    ],
    'ui' => [
        'header_title' => 'Editor del menu impostazioni - Furkan Kalafat',
        'header_description' => 'Trascina intestazioni e schede. Aggiungi, modifica, elimina intestazioni personalizzate, sposta schede tra intestazioni e attiva/disattiva la visibilità.',
        'reset' => 'Ripristina',
        'save_order' => 'Salva',
        'sortable_missing' => 'La libreria Sortable manca. Ricarica la pagina.',
        'new_heading' => 'Nuova intestazione',
        'new_heading_placeholder' => 'Esempio: Pagamenti, Integrazioni, Logistica',
        'target_group_label' => 'Area di destinazione',
        'add_heading' => 'Aggiungi intestazione',
        'heading_hint' => 'Crea gruppi personalizzati e sposta le schede tra gruppi con drag and drop.',
        'group_help' => 'Trascina e ordina intestazioni e schede in questo blocco.',
        'drag_heading' => 'Trascina intestazione',
        'drag_card' => 'Trascina scheda',
        'item_count' => ':count elementi',
        'show_heading_and_items' => 'Mostra intestazione ed elementi',
        'hide_heading_and_items' => 'Nascondi intestazione ed elementi',
        'edit_heading' => 'Modifica intestazione',
        'delete_heading' => 'Elimina intestazione',
        'move_menu_item' => 'Sposta elemento menu',
        'move_menu_item_to_group' => 'Sposta elemento menu in :group',
        'show_menu_item' => 'Mostra elemento menu',
        'hide_menu_item' => 'Nascondi elemento menu',
        'drop_cards_here' => 'Rilascia qui le schede',
        'heading_title_prompt' => 'Titolo intestazione',
        'delete_custom_heading_confirm' => 'Eliminare l\'intestazione personalizzata?',
        'reset_saved_order_confirm' => 'Ripristinare l\'ordine salvato?',
    ],
];
