<?php

return [
    'page_title' => 'Editor do Menu de Configurações - Furkan Kalafat',
    'settings' => [
        'title' => 'Editor do Menu de Configurações',
        'description' => 'Ordene os títulos das seções de configurações e os itens das seções.',
    ],
    'groups' => [
        'settings' => 'Menus de Configurações',
        'system' => 'Menus do Sistema',
    ],
    'permissions' => [
        'menu_editor' => 'Editor do Menu de Configurações',
    ],
    'defaults' => [
        'custom_section_title' => 'Personalizado :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Dados de layout inválidos.',
        'saved' => 'A ordem do menu de configurações foi salva.',
        'save_failed' => 'Não foi possível salvar o layout. Verifique os logs.',
        'reset_success' => 'A ordem do menu de configurações foi redefinida.',
        'reset_failed' => 'Não foi possível redefinir o layout. Verifique os logs.',
    ],
    'ui' => [
        'header_title' => 'Editor do Menu de Configurações - Furkan Kalafat',
        'header_description' => 'Arraste títulos e cartões. Adicione, edite e exclua títulos personalizados, mova cartões entre títulos e alterne a visibilidade.',
        'reset' => 'Redefinir',
        'save_order' => 'Salvar',
        'sortable_missing' => 'A biblioteca Sortable está ausente. Atualize a página.',
        'new_heading' => 'Novo título',
        'new_heading_placeholder' => 'Exemplo: Pagamentos, Integrações, Logística',
        'target_group_label' => 'Área de destino',
        'add_heading' => 'Adicionar título',
        'heading_hint' => 'Crie grupos personalizados e mova cartões entre grupos com arrastar e soltar.',
        'group_help' => 'Arraste e ordene títulos e cartões neste bloco.',
        'drag_heading' => 'Arrastar título',
        'drag_card' => 'Arrastar cartão',
        'item_count' => ':count itens',
        'show_heading_and_items' => 'Mostrar título e itens',
        'hide_heading_and_items' => 'Ocultar título e itens',
        'edit_heading' => 'Editar título',
        'delete_heading' => 'Excluir título',
        'move_menu_item' => 'Mover item de menu',
        'move_menu_item_to_group' => 'Mover item de menu para :group',
        'show_menu_item' => 'Mostrar item de menu',
        'hide_menu_item' => 'Ocultar item de menu',
        'drop_cards_here' => 'Solte os cartões aqui',
        'heading_title_prompt' => 'Título do cabeçalho',
        'delete_custom_heading_confirm' => 'Excluir título personalizado?',
        'reset_saved_order_confirm' => 'Redefinir ordem salva?',
    ],
];
