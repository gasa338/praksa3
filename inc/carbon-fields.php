<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'komoyu_carbon_fields' );
function komoyu_carbon_fields() {
    Container::make( 'post_meta', __( 'Home header' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/homepage.php' )
    ->add_fields( array(
        Field::make( 'complex', 'crb_header_home', __( 'Header' ) )
        ->set_max( 1 )
        ->set_min( 1 )
        ->add_fields( array(
            Field::make( 'image', 'crb_header_image', __( 'Header Image' ) ),
            Field::make( 'text', 'crb_head_1', __( 'Header 1' ) ),
            Field::make( 'text', 'crb_head_2', __( 'Header 2' ) ),
            Field::make( 'textarea', 'crb_header_description', __( 'Header Description' ) )
                ->set_rows( 2 )
        ) ),

        Field::make( 'complex', 'crb_onama', __( 'O nama' ) )
        ->set_max( 1 )
        ->set_min( 1 )
        ->add_fields( array(
            Field::make( 'image', 'crb_onama_image', __( 'O Nama / Image' ) ),
            Field::make( 'rich_text', 'crb_onama_text_1', __( 'O nama / text 1' ) )
                ->set_rows( 2 ),
            Field::make( 'rich_text', 'crb_onama_text_2', __( 'O nama / text 2' ) )
                ->set_rows( 2 )
        ) ),

        Field::make( 'complex', 'crb_partneri', __( 'Partnery' ) )
        ->set_max( 1 )
        ->set_min( 1 )
        ->add_fields( array(
            Field::make( 'rich_text', 'crb_onama_text', __( 'O nama / text' ) ),
            Field::make( 'complex', 'crb_partner_div', __( 'Logo Partnera' ) )
            ->add_fields(array(                
                Field::make( 'image', 'crb_partner_logo', __( 'Logo' ) ),
                Field::make( 'text', 'crb_partner_link', __( 'Link partnera' ) )
            ))
        ) ),

        Field::make( 'complex', 'crb_sertifikati', __( 'Sertifikati' ) )
        ->set_max( 1 )
        ->set_min( 1 )
        ->add_fields( array(
            Field::make( 'text', 'crb_naslov_sertifikati', __( 'Naslov' ) ),
            Field::make( 'textarea', 'crb_sertifikati_opis', __( 'Opis' ) ),
            Field::make( 'complex', 'crb_sertifikat_pdf', __( 'Sertifikati' ) )
            ->add_fields(array(                
                Field::make( 'file', 'crb_sertifikat_pdf', __( 'PDF' ) ),
                Field::make( 'image', 'crb_sertifikat_slika', __( 'Slika' ) ),
                Field::make( 'text', 'crb_sertifikat_name', __( 'Naziv Sertifikata' ) )
            ))
        ) ),

        Field::make( 'complex', 'crb_podrska', __( 'Tehnička podrška' ) )
        ->set_max( 1 )
        ->set_min( 1 )
        ->add_fields( array(
            Field::make( 'text', 'crb_podrska_naslov', __( 'Naslov' ) ),
            Field::make( 'image', 'crb_podrska_slika', __( 'Slika' ) ),
            Field::make( 'image', 'crb_podrska_bgslika', __( 'Background Image' ) ),
            Field::make( 'complex', 'crb_podrska_texts', __( 'Tekst' ) )
            ->add_fields(array(
                Field::make( 'text', 'crb_podrska_opis', 'Tekst' )
            ))

        ) ),

        Field::make( 'complex', 'crb_reference', __( 'Nase reference' ) )
        ->set_max( 1 )
        ->set_min( 1 )
        ->add_fields( array(
            Field::make( 'text', 'crb_reference_naslov', __( 'Naslov' ) ),
            Field::make( 'textarea', 'crb_reference_opis', __( 'Opis' ) )
                ->set_rows( 2 ),
            Field::make( 'complex', 'crb_reference_logos', __( 'Reference' ) )
            ->add_fields(array(                
                Field::make( 'image', 'crb_reference_logo', __( 'Slika' ) )
            ))
        ) ),
            
    ) );

    // dodavanje slike taksonomiji
    Container::make( 'term_meta', __( 'Category Properties' ) )
    ->where( 'term_taxonomy', '=', 'proizvodi_cat' )
    ->add_fields( array(
        Field::make( 'image', 'crb_tax_image', __( 'Thumbnail' ) ),
    ) );

    // dodavanje naslova glavnoj stranici taksonomije
    Container::make( 'post_meta', __( 'Home header' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/proizvodi.php' )
    ->add_fields( array(
        Field::make( 'complex', 'crb_proizvodi_head', __( 'Header' ) )
        ->set_max( 1 )
        ->set_min( 1 )
        ->add_fields( array(
            Field::make( 'text', 'crb_proizvodi_head_naslov', __( 'Naslov' ) ),
            Field::make( 'text', 'crb_proizvodi_head_opis', __( 'Opis' ) ),

        ))
    ));

    // dodavanje PDF fajla
    Container:: make( 'post_meta', __( 'Upload PDF' ) )
    ->where( 'post_type', '=', 'proizvodi' )
    ->add_fields( array(
        Field::make( 'complex', 'crb_pdf_sekcija', __( "PDF SEKCIJA" ) )
        ->set_min( 1 )
        ->add_fields( array(
                Field::make( 'text', 'crb_docs_pdf_ime', 'Ime PDFa' ),
                Field::make( 'file', 'crb_docs_pdf', __( 'PDF' ) ),
            ))
        
            
    ));
}
add_action( 'after_setup_theme', 'crb_load' );

add_action( 'carbon_fields_register_fields', 'komoyu_theme_options' );
function komoyu_theme_options() {
    // Default options page
    $basic_options_container = Container::make( 'theme_options', __( 'KOMO-YU' ) )
    ->set_page_menu_position( 58 )
    ->add_fields( array(
        Field::make( 'complex', 'crb_contact', __( 'Contact data' ) )
        ->set_layout( 'tabbed-vertical' )
        ->add_fields( array(
            Field::make( 'image', 'crb_contact_photo', __( 'Image' ) ),
            Field::make( 'text', 'crb_contact_text', __( 'Number or mail' ) ),
        ) )
    ) );

    // Add second options page under 'Basic Options'
    Container::make( 'theme_options', __( 'Call to Action' ) )
    ->set_page_parent( $basic_options_container ) // reference to a top level container
    ->add_fields( array(
        Field::make( 'text', 'crb_cta_text', __( 'Header Text' ) )
            ->set_attribute( 'placeholder', 'Unesi header tekst' ),
        Field::make( 'text', 'crb_cta_btn_text', __( 'Button text' ) )
            ->set_attribute( 'placeholder', 'Unesi naziv dugmeta' ),
        Field::make( 'text', 'crb_cta_link', __( 'Button link' ) )
            ->set_attribute( 'placeholder', 'Kopiraj link ka stranici' ),
        Field::make( 'image', 'crb_cta_image', __( 'Background Image' ) )
    ) );
}

/////////////////////////////
/*
add_action( 'after_setup_theme', 'crb_load' );

function crb_load() {
    require_once(  ABSPATH . '\wp-content\plugins/carbon-fields/vendor/autoload.php' );
    ///\Carbon_Fields\Carbon_Fields::boot();
}
*/