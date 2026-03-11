<?php

return [
    'page_title' => 'Uređivač izbornika postavki - Furkan Kalafat',
    'settings' => [
        'title' => 'Uređivač izbornika postavki',
        'description' => 'Sortirajte naslove odjeljaka postavki i stavke odjeljaka.',
    ],
    'groups' => [
        'settings' => 'Izbornici postavki',
        'system' => 'Sistemski izbornici',
    ],
    'permissions' => [
        'menu_editor' => 'Uređivač izbornika postavki',
    ],
    'defaults' => [
        'custom_section_title' => 'Prilagođeno :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Neispravni podaci rasporeda.',
        'saved' => 'Redoslijed izbornika postavki je sačuvan.',
        'save_failed' => 'Nije moguće spremiti raspored. Provjerite logove.',
        'reset_success' => 'Redoslijed izbornika postavki je resetiran.',
        'reset_failed' => 'Nije moguće resetirati raspored. Provjerite logove.',
    ],
    'ui' => [
        'header_title' => 'Uređivač izbornika postavki - Furkan Kalafat',
        'header_description' => 'Povlačite naslove i kartice. Dodajte, uredite i obrišite prilagođene naslove, premještajte kartice između naslova i mijenjajte vidljivost.',
        'reset' => 'Resetiraj',
        'save_order' => 'Spremi',
        'sortable_missing' => 'Nedostaje Sortable biblioteka. Osvježite stranicu.',
        'new_heading' => 'Novi naslov',
        'new_heading_placeholder' => 'Primjer: Plaćanja, Integracije, Logistika',
        'target_group_label' => 'Ciljno područje',
        'add_heading' => 'Dodaj naslov',
        'heading_hint' => 'Kreirajte prilagođene grupe i premještajte kartice između grupa povlačenjem i ispuštanjem.',
        'group_help' => 'Povlačite i sortirajte naslove i kartice u ovom bloku.',
        'drag_heading' => 'Povuci naslov',
        'drag_card' => 'Povuci karticu',
        'item_count' => ':count stavki',
        'show_heading_and_items' => 'Prikaži naslov i stavke',
        'hide_heading_and_items' => 'Sakrij naslov i stavke',
        'edit_heading' => 'Uredi naslov',
        'delete_heading' => 'Obriši naslov',
        'move_menu_item' => 'Premjesti stavku izbornika',
        'move_menu_item_to_group' => 'Premjesti stavku izbornika u :group',
        'show_menu_item' => 'Prikaži stavku izbornika',
        'hide_menu_item' => 'Sakrij stavku izbornika',
        'drop_cards_here' => 'Ispustite kartice ovdje',
        'heading_title_prompt' => 'Naslov zaglavlja',
        'delete_custom_heading_confirm' => 'Obrisati prilagođeni naslov?',
        'reset_saved_order_confirm' => 'Resetirati sačuvani redoslijed?',
    ],
];
