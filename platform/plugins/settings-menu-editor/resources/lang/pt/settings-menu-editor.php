<?php

return [
    'page_title' => 'Editor de Menu de Definições - Furkan Kalafat',
    'settings' => [
        'title' => 'Editor de Menu de Definições',
        'description' => 'Ordene os títulos das secções de definições e os itens das secções.',
    ],
    'groups' => [
        'settings' => 'Menus de Definições',
        'system' => 'Menus do Sistema',
    ],
    'permissions' => [
        'menu_editor' => 'Editor de Menu de Definições',
    ],
    'defaults' => [
        'custom_section_title' => 'Personalizado :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Dados de layout inválidos.',
        'saved' => 'A ordem do menu de definições foi guardada.',
        'save_failed' => 'Não foi possível guardar o layout. Verifique os registos.',
        'reset_success' => 'A ordem do menu de definições foi reposta.',
        'reset_failed' => 'Não foi possível repor o layout. Verifique os registos.',
    ],
    'ui' => [
        'header_title' => 'Editor de Menu de Definições - Furkan Kalafat',
        'header_description' => 'Arraste cabeçalhos e cartões. Adicione, edite e elimine cabeçalhos personalizados, mova cartões entre cabeçalhos e alterne a visibilidade.',
        'reset' => 'Repor',
        'save_order' => 'Guardar',
        'sortable_missing' => 'A biblioteca Sortable está em falta. Atualize a página.',
        'new_heading' => 'Novo cabeçalho',
        'new_heading_placeholder' => 'Exemplo: Pagamentos, Integrações, Logística',
        'target_group_label' => 'Área de destino',
        'add_heading' => 'Adicionar cabeçalho',
        'heading_hint' => 'Crie grupos personalizados e mova cartões entre grupos com arrastar e largar.',
        'group_help' => 'Arraste e ordene cabeçalhos e cartões neste bloco.',
        'drag_heading' => 'Arrastar cabeçalho',
        'drag_card' => 'Arrastar cartão',
        'item_count' => ':count itens',
        'show_heading_and_items' => 'Mostrar cabeçalho e itens',
        'hide_heading_and_items' => 'Ocultar cabeçalho e itens',
        'edit_heading' => 'Editar cabeçalho',
        'delete_heading' => 'Eliminar cabeçalho',
        'move_menu_item' => 'Mover item do menu',
        'move_menu_item_to_group' => 'Mover item do menu para :group',
        'show_menu_item' => 'Mostrar item do menu',
        'hide_menu_item' => 'Ocultar item do menu',
        'drop_cards_here' => 'Largue os cartões aqui',
        'heading_title_prompt' => 'Título do cabeçalho',
        'delete_custom_heading_confirm' => 'Eliminar cabeçalho personalizado?',
        'reset_saved_order_confirm' => 'Repor ordem guardada?',
    ],
];
