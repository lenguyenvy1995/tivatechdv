<?php

return [
    'page_title' => 'Edytor menu ustawień - Furkan Kalafat',
    'settings' => [
        'title' => 'Edytor menu ustawień',
        'description' => 'Sortuj tytuły sekcji ustawień i elementy sekcji.',
    ],
    'groups' => [
        'settings' => 'Menu ustawień',
        'system' => 'Menu systemowe',
    ],
    'permissions' => [
        'menu_editor' => 'Edytor menu ustawień',
    ],
    'defaults' => [
        'custom_section_title' => 'Niestandardowe :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Nieprawidłowe dane układu.',
        'saved' => 'Kolejność menu ustawień została zapisana.',
        'save_failed' => 'Nie udało się zapisać układu. Sprawdź logi.',
        'reset_success' => 'Kolejność menu ustawień została zresetowana.',
        'reset_failed' => 'Nie udało się zresetować układu. Sprawdź logi.',
    ],
    'ui' => [
        'header_title' => 'Edytor menu ustawień - Furkan Kalafat',
        'header_description' => 'Przeciągaj nagłówki i karty. Dodawaj, edytuj i usuwaj niestandardowe nagłówki, przenoś karty między nagłówkami i przełączaj widoczność.',
        'reset' => 'Resetuj',
        'save_order' => 'Zapisz',
        'sortable_missing' => 'Brakuje biblioteki Sortable. Odśwież stronę.',
        'new_heading' => 'Nowy nagłówek',
        'new_heading_placeholder' => 'Przykład: Płatności, Integracje, Logistyka',
        'target_group_label' => 'Obszar docelowy',
        'add_heading' => 'Dodaj nagłówek',
        'heading_hint' => 'Twórz niestandardowe grupy i przenoś karty między grupami metodą przeciągnij i upuść.',
        'group_help' => 'Przeciągaj i sortuj nagłówki oraz karty w tym bloku.',
        'drag_heading' => 'Przeciągnij nagłówek',
        'drag_card' => 'Przeciągnij kartę',
        'item_count' => ':count elementów',
        'show_heading_and_items' => 'Pokaż nagłówek i elementy',
        'hide_heading_and_items' => 'Ukryj nagłówek i elementy',
        'edit_heading' => 'Edytuj nagłówek',
        'delete_heading' => 'Usuń nagłówek',
        'move_menu_item' => 'Przenieś element menu',
        'move_menu_item_to_group' => 'Przenieś element menu do :group',
        'show_menu_item' => 'Pokaż element menu',
        'hide_menu_item' => 'Ukryj element menu',
        'drop_cards_here' => 'Upuść karty tutaj',
        'heading_title_prompt' => 'Tytuł nagłówka',
        'delete_custom_heading_confirm' => 'Usunąć niestandardowy nagłówek?',
        'reset_saved_order_confirm' => 'Zresetować zapisaną kolejność?',
    ],
];
