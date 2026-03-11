<?php

return [
    'page_title' => 'Editor del menú de configuración - Furkan Kalafat',
    'settings' => [
        'title' => 'Editor del menú de configuración',
        'description' => 'Ordena los títulos de las secciones de configuración y los elementos de las secciones.',
    ],
    'groups' => [
        'settings' => 'Menús de configuración',
        'system' => 'Menús del sistema',
    ],
    'permissions' => [
        'menu_editor' => 'Editor del menú de configuración',
    ],
    'defaults' => [
        'custom_section_title' => 'Personalizado :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Datos de diseño no válidos.',
        'saved' => 'Se guardó el orden del menú de configuración.',
        'save_failed' => 'No se pudo guardar el diseño. Revisa los registros.',
        'reset_success' => 'Se restableció el orden del menú de configuración.',
        'reset_failed' => 'No se pudo restablecer el diseño. Revisa los registros.',
    ],
    'ui' => [
        'header_title' => 'Editor del menú de configuración - Furkan Kalafat',
        'header_description' => 'Arrastra encabezados y tarjetas. Agrega, edita y elimina encabezados personalizados, mueve tarjetas entre encabezados y alterna la visibilidad.',
        'reset' => 'Restablecer',
        'save_order' => 'Guardar',
        'sortable_missing' => 'Falta la biblioteca Sortable. Actualiza la página.',
        'new_heading' => 'Nuevo encabezado',
        'new_heading_placeholder' => 'Ejemplo: Pagos, Integraciones, Logística',
        'target_group_label' => 'Área de destino',
        'add_heading' => 'Agregar encabezado',
        'heading_hint' => 'Crea grupos personalizados y mueve tarjetas entre grupos con arrastrar y soltar.',
        'group_help' => 'Arrastra y ordena encabezados y tarjetas en este bloque.',
        'drag_heading' => 'Arrastrar encabezado',
        'drag_card' => 'Arrastrar tarjeta',
        'item_count' => ':count elementos',
        'show_heading_and_items' => 'Mostrar encabezado y elementos',
        'hide_heading_and_items' => 'Ocultar encabezado y elementos',
        'edit_heading' => 'Editar encabezado',
        'delete_heading' => 'Eliminar encabezado',
        'move_menu_item' => 'Mover elemento del menú',
        'move_menu_item_to_group' => 'Mover elemento del menú a :group',
        'show_menu_item' => 'Mostrar elemento del menú',
        'hide_menu_item' => 'Ocultar elemento del menú',
        'drop_cards_here' => 'Suelta las tarjetas aquí',
        'heading_title_prompt' => 'Título del encabezado',
        'delete_custom_heading_confirm' => '¿Eliminar encabezado personalizado?',
        'reset_saved_order_confirm' => '¿Restablecer el orden guardado?',
    ],
];
