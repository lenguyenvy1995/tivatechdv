<?php

return [
    'page_title' => 'Éditeur du menu des paramètres - Furkan Kalafat',
    'settings' => [
        'title' => 'Éditeur du menu des paramètres',
        'description' => 'Triez les titres des sections de paramètres et les éléments de section.',
    ],
    'groups' => [
        'settings' => 'Menus de paramètres',
        'system' => 'Menus système',
    ],
    'permissions' => [
        'menu_editor' => 'Éditeur du menu des paramètres',
    ],
    'defaults' => [
        'custom_section_title' => 'Personnalisé :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Données de mise en page invalides.',
        'saved' => 'Ordre du menu des paramètres enregistré.',
        'save_failed' => 'Impossible de sauvegarder la mise en page. Vérifiez les journaux.',
        'reset_success' => 'Ordre du menu des paramètres réinitialisé.',
        'reset_failed' => 'Impossible de réinitialiser la mise en page. Vérifiez les journaux.',
    ],
    'ui' => [
        'header_title' => 'Éditeur du menu des paramètres - Furkan Kalafat',
        'header_description' => 'Faites glisser les en-têtes et les cartes. Ajoutez, modifiez et supprimez des en-têtes personnalisés, déplacez des cartes entre les en-têtes et basculez la visibilité.',
        'reset' => 'Réinitialiser',
        'save_order' => 'Enregistrer',
        'sortable_missing' => 'La bibliothèque Sortable est absente. Actualisez la page.',
        'new_heading' => 'Nouvel en-tête',
        'new_heading_placeholder' => 'Exemple : Paiements, Intégrations, Logistique',
        'target_group_label' => 'Zone cible',
        'add_heading' => 'Ajouter un en-tête',
        'heading_hint' => 'Créez des groupes personnalisés et déplacez des cartes entre les groupes avec glisser-déposer.',
        'group_help' => 'Faites glisser et triez les en-têtes et les cartes dans ce bloc.',
        'drag_heading' => 'Faire glisser l en-tête',
        'drag_card' => 'Faire glisser la carte',
        'item_count' => ':count éléments',
        'show_heading_and_items' => 'Afficher l en-tête et les éléments',
        'hide_heading_and_items' => 'Masquer l en-tête et les éléments',
        'edit_heading' => 'Modifier l en-tête',
        'delete_heading' => 'Supprimer l en-tête',
        'move_menu_item' => 'Déplacer un élément de menu',
        'move_menu_item_to_group' => 'Déplacer un élément de menu vers :group',
        'show_menu_item' => 'Afficher l élément de menu',
        'hide_menu_item' => 'Masquer l élément de menu',
        'drop_cards_here' => 'Déposez les cartes ici',
        'heading_title_prompt' => 'Titre de l en-tête',
        'delete_custom_heading_confirm' => 'Supprimer l en-tête personnalisé ?',
        'reset_saved_order_confirm' => 'Réinitialiser l ordre enregistré ?',
    ],
];
