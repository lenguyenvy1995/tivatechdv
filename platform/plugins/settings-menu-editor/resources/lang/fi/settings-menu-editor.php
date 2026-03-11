<?php

return [
    'page_title' => 'Asetusvalikon muokkain - Furkan Kalafat',
    'settings' => [
        'title' => 'Asetusvalikon muokkain',
        'description' => 'Järjestä asetusosioiden otsikot ja osioiden kohteet.',
    ],
    'groups' => [
        'settings' => 'Asetusvalikot',
        'system' => 'Järjestelmävalikot',
    ],
    'permissions' => [
        'menu_editor' => 'Asetusvalikon muokkain',
    ],
    'defaults' => [
        'custom_section_title' => 'Mukautettu :number',
    ],
    'messages' => [
        'invalid_layout_payload' => 'Virheelliset asettelutiedot.',
        'saved' => 'Asetusvalikon järjestys tallennettu.',
        'save_failed' => 'Asettelua ei voitu tallentaa. Tarkista lokit.',
        'reset_success' => 'Asetusvalikon järjestys nollattu.',
        'reset_failed' => 'Asettelua ei voitu nollata. Tarkista lokit.',
    ],
    'ui' => [
        'header_title' => 'Asetusvalikon muokkain - Furkan Kalafat',
        'header_description' => 'Vedä otsikoita ja kortteja. Lisää, muokkaa ja poista mukautettuja otsikoita, siirrä kortteja otsikoiden välillä ja vaihda näkyvyyttä.',
        'reset' => 'Nollaa',
        'save_order' => 'Tallenna',
        'sortable_missing' => 'Sortable-kirjasto puuttuu. Päivitä sivu.',
        'new_heading' => 'Uusi otsikko',
        'new_heading_placeholder' => 'Esimerkki: Maksut, Integraatiot, Logistiikka',
        'target_group_label' => 'Kohdealue',
        'add_heading' => 'Lisää otsikko',
        'heading_hint' => 'Luo mukautettuja ryhmiä ja siirrä kortteja ryhmien välillä vetämällä ja pudottamalla.',
        'group_help' => 'Vedä ja järjestä otsikoita ja kortteja tässä lohkossa.',
        'drag_heading' => 'Vedä otsikkoa',
        'drag_card' => 'Vedä korttia',
        'item_count' => ':count kohdetta',
        'show_heading_and_items' => 'Näytä otsikko ja kohteet',
        'hide_heading_and_items' => 'Piilota otsikko ja kohteet',
        'edit_heading' => 'Muokkaa otsikkoa',
        'delete_heading' => 'Poista otsikko',
        'move_menu_item' => 'Siirrä valikkokohde',
        'move_menu_item_to_group' => 'Siirrä valikkokohde ryhmään :group',
        'show_menu_item' => 'Näytä valikkokohde',
        'hide_menu_item' => 'Piilota valikkokohde',
        'drop_cards_here' => 'Pudota kortit tähän',
        'heading_title_prompt' => 'Otsikon nimi',
        'delete_custom_heading_confirm' => 'Poistetaanko mukautettu otsikko?',
        'reset_saved_order_confirm' => 'Nollataanko tallennettu järjestys?',
    ],
];
