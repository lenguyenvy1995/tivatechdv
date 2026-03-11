<?php

return [
    'page_title' => 'Einstellungsmenü-Editor - Furkan Kalafat',
    'settings' => [
        'title' => 'Einstellungsmenü-Editor',
        'description' => 'Sortieren Sie Titel von Einstellungsabschnitten und Abschnittselemente.',
    ],
    'groups' => [
        'settings' => 'Einstellungsmenüs',
        'system' => 'Systemmenüs',
    ],
    'permissions' => [
        'menu_editor' => 'Einstellungsmenü-Editor',
    ],
    'defaults' => [
        'custom_section_title' => 'Benutzerdefiniert :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Ungültige Layoutdaten.',
        'saved' => 'Reihenfolge des Einstellungsmenüs wurde gespeichert.',
        'save_failed' => 'Layout konnte nicht gespeichert werden. Prüfen Sie die Protokolle.',
        'reset_success' => 'Reihenfolge des Einstellungsmenüs wurde zurückgesetzt.',
        'reset_failed' => 'Layout konnte nicht zurückgesetzt werden. Prüfen Sie die Protokolle.',
    ],
    'ui' => [
        'header_title' => 'Einstellungsmenü-Editor - Furkan Kalafat',
        'header_description' => 'Ziehen Sie Überschriften und Karten. Fügen Sie benutzerdefinierte Überschriften hinzu, bearbeiten oder löschen Sie sie, verschieben Sie Karten zwischen Überschriften und schalten Sie die Sichtbarkeit um.',
        'reset' => 'Zurücksetzen',
        'save_order' => 'Speichern',
        'sortable_missing' => 'Sortable-Bibliothek fehlt. Aktualisieren Sie die Seite.',
        'new_heading' => 'Neue Überschrift',
        'new_heading_placeholder' => 'Beispiel: Zahlungen, Integrationen, Logistik',
        'target_group_label' => 'Zielbereich',
        'add_heading' => 'Überschrift hinzufügen',
        'heading_hint' => 'Erstellen Sie benutzerdefinierte Gruppen und verschieben Sie Karten per Drag-and-drop zwischen Gruppen.',
        'group_help' => 'Ziehen und sortieren Sie Überschriften und Karten in diesem Block.',
        'drag_heading' => 'Überschrift ziehen',
        'drag_card' => 'Karte ziehen',
        'item_count' => ':count Elemente',
        'show_heading_and_items' => 'Überschrift und Elemente anzeigen',
        'hide_heading_and_items' => 'Überschrift und Elemente ausblenden',
        'edit_heading' => 'Überschrift bearbeiten',
        'delete_heading' => 'Überschrift löschen',
        'move_menu_item' => 'Menüpunkt verschieben',
        'move_menu_item_to_group' => 'Menüpunkt nach :group verschieben',
        'show_menu_item' => 'Menüpunkt anzeigen',
        'hide_menu_item' => 'Menüpunkt ausblenden',
        'drop_cards_here' => 'Karten hier ablegen',
        'heading_title_prompt' => 'Überschriftstitel',
        'delete_custom_heading_confirm' => 'Benutzerdefinierte Überschrift löschen?',
        'reset_saved_order_confirm' => 'Gespeicherte Reihenfolge zurücksetzen?',
    ],
];
