<?php

return [
    'page_title' => '설정 메뉴 편집기 - Furkan Kalafat',
    'settings' => [
        'title' => '설정 메뉴 편집기',
        'description' => '설정 섹션 제목과 섹션 항목의 순서를 정렬합니다.',
    ],
    'groups' => [
        'settings' => '설정 메뉴',
        'system' => '시스템 메뉴',
    ],
    'permissions' => [
        'menu_editor' => '설정 메뉴 편집기',
    ],
    'defaults' => [
        'custom_section_title' => '사용자 지정 :number',
    ],
    'messages' => [
        'invalid_layout_payload' => '잘못된 레이아웃 데이터입니다.',
        'saved' => '설정 메뉴 순서가 저장되었습니다.',
        'save_failed' => '레이아웃을 저장할 수 없습니다. 로그를 확인하세요.',
        'reset_success' => '설정 메뉴 순서가 초기화되었습니다.',
        'reset_failed' => '레이아웃을 초기화할 수 없습니다. 로그를 확인하세요.',
    ],
    'ui' => [
        'header_title' => '설정 메뉴 편집기 - Furkan Kalafat',
        'header_description' => '제목과 카드를 드래그하세요. 사용자 지정 제목을 추가, 편집, 삭제하고 제목 간 카드를 이동하며 표시 여부를 전환할 수 있습니다.',
        'reset' => '초기화',
        'save_order' => '저장',
        'sortable_missing' => 'Sortable 라이브러리가 없습니다. 페이지를 새로고침하세요.',
        'new_heading' => '새 제목',
        'new_heading_placeholder' => '예: 결제, 연동, 물류',
        'target_group_label' => '대상 영역',
        'add_heading' => '제목 추가',
        'heading_hint' => '사용자 지정 그룹을 만들고 드래그 앤 드롭으로 그룹 간 카드를 이동하세요.',
        'group_help' => '이 블록에서 제목과 카드를 드래그하여 정렬하세요.',
        'drag_heading' => '제목 드래그',
        'drag_card' => '카드 드래그',
        'item_count' => ':count개 항목',
        'show_heading_and_items' => '제목 및 항목 표시',
        'hide_heading_and_items' => '제목 및 항목 숨기기',
        'edit_heading' => '제목 편집',
        'delete_heading' => '제목 삭제',
        'move_menu_item' => '메뉴 항목 이동',
        'move_menu_item_to_group' => '메뉴 항목을 :group(으)로 이동',
        'show_menu_item' => '메뉴 항목 표시',
        'hide_menu_item' => '메뉴 항목 숨기기',
        'drop_cards_here' => '여기에 카드를 놓으세요',
        'heading_title_prompt' => '제목 이름',
        'delete_custom_heading_confirm' => '사용자 지정 제목을 삭제하시겠습니까?',
        'reset_saved_order_confirm' => '저장된 순서를 초기화하시겠습니까?',
    ],
];
