<?php
$item_terms = get_terms( array(
    'taxonomy' => 'item_cat',
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => false,
) );

$item_term_array = array();
$item_term_array['none'] = '--';

foreach ( $item_terms as $term ) {
    $item_term_array[$term->term_id] = $term->name;
}



$cmb_demo->add_field(array(
    'name'    => __( 'item Category', 'naiau' ),
    'desc'    => __( 'Select item Category', 'naiau' ),
    'id'      => 'item_term_id',
    'type'    => 'select',
    'options' =>  $item_term_array,
    'default' => 'none',

) );