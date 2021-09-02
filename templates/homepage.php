<?php /* Template Name: Home Page */ ?>

<?php get_header( 'custom' ); ?>

<!--  header  -->
<?php
$header = carbon_get_the_post_meta('crb_header_home');
$data = array();
foreach ($header as $value) {

   if( !empty($value["crb_header_image"])){
      $data["image"]["src"] = esc_html__(wp_get_attachment_image_src($value['crb_header_image'], 'full')[0], 'komoyu');
      $data["image"]["alt"] = esc_html__(get_post_meta($value['crb_header_image'], '_wp_attachment_image_alt', true), 'komoyu');
   }

   if( !empty($value["crb_header_image"])){
      $data["head_1"] = esc_html__($value['crb_head_1'], 'komoyu');
   }

   if( !empty($value["crb_header_image"])){
      $data["head_2"] = esc_html__($value['crb_head_2'], 'komoyu');
   }

   if( !empty($value["crb_header_image"])){
      $data["header_description"] = esc_html__($value['crb_header_description'], 'komoyu');
   }
}

$headerHome = $twig->load('header_home.twig');
if(isset($data) && !empty($data)) {
    echo $headerHome->render([ 'data' => $data ] );
}


/**
 * ==============================================================================
 *                      Sekcija O NAMA
 * ==============================================================================
 */
$o_nama = carbon_get_the_post_meta( 'crb_onama' );
$data = array();
foreach ($o_nama as $value) {

   if( !empty($value["crb_onama_image"])){
      $data["image"]["src"] = esc_html__(wp_get_attachment_image_src($value['crb_onama_image'], 'full')[0], 'komoyu');
      $data["image"]["alt"] = esc_html__(get_post_meta($value['crb_onama_image'], '_wp_attachment_image_alt', true), 'komoyu');
   }

   if( !empty($value["crb_onama_text_1"])){
      $data["onama_text_1"] = esc_html__($value['crb_onama_text_1'], 'komoyu');
   }

   if( !empty($value["crb_onama_text_1"])){
      $data["onama_text_1"] = esc_html__($value['crb_onama_text_1'], 'komoyu');
   }
}

$headerHome = $twig->load('onama.twig');
if(isset($data) && !empty($data)) {
    echo $headerHome->render([ 'data' => $data ] );
}


/**
 * ==============================================================================
 *                      Sekcija PARTNERi
 * ==============================================================================
 */

 $partneri = carbon_get_the_post_meta( 'crb_partneri' );
 $data = array();
 foreach ($partneri as $value) {
     if( !empty($value["crb_onama_text"]) ){
         $data['partneri_text'] = esc_html__($value['crb_onama_text'], 'komoyu');
     }
     if( !empty( $value['crb_partner_div'] ) ) {
         foreach ( $value['crb_partner_div'] as $key=>$sub_value) {
             $data['image'][$key]['link'] = esc_html__( $sub_value['crb_partner_link'], 'komoyu' );
             $data['image'][$key]['img'] = esc_html__( wp_get_attachment_image_src($sub_value['crb_partner_logo'], 'default')[0], 'komoyu' );
             $data['image'][$key]['alt'] = esc_html__( get_post_meta($sub_value['crb_partner_logo'], '_wp_attachment_image_alt', true), 'komoyu' );
         }
     }
 }

 $partneri = $twig->load('partneri.twig');
if(isset($data) && !empty($data)) {
    echo $partneri->render([ 'data' => $data ] );
}


/**
 * ==============================================================================
 *                      Sekcija sertifikati
 * ==============================================================================
 */

$sertifkati = carbon_get_the_post_meta( 'crb_sertifikati' );
$data = array();

foreach ($sertifkati as $value) {

    if( !empty($value['crb_naslov_sertifikati']) ){
        $data['naslov'] = esc_html__( $value['crb_naslov_sertifikati'], 'komoyu' );
    }

    if( !empty($value['crb_sertifikati_opis']) ){
        $data['opis'] = esc_html__( $value['crb_sertifikati_opis'], 'komoyu' );
    }

    if( !empty( $value['crb_sertifikat_pdf'] ) ){
        foreach($value['crb_sertifikat_pdf'] as $k=>$v) {
            $data['sertifikati'][$k]['url'] = wp_get_attachment_url($v['crb_sertifikat_pdf']);
            $data['sertifikati'][$k]['img'] = wp_get_attachment_image_src($v['crb_sertifikat_slika'], 'default')[0];
            $data['sertifikati'][$k]['txt'] = $v['crb_sertifikat_name'];
        }
    }
}
$sertifikati = $twig->load('sertifikati.twig');
if(isset($data) && !empty($data)) {
    echo $sertifikati->render([ 'data' => $data ] );
}

/**
 * ==============================================================================
 *                      Sekcija Podrska
 * ==============================================================================
 */
$podrska = carbon_get_the_post_meta( 'crb_podrska' );
$data = array();

foreach ($podrska as $value) {

    if ( !empty($value['crb_podrska_slika']) ){
        $data['slika'] = esc_html__( wp_get_attachment_image_src($value['crb_podrska_slika'], 'full')[0], 'komoyu' );
    }

    if ( !empty($value['crb_podrska_bgslika']) ){
        $data['bgimage'] = esc_html__( wp_get_attachment_image_src($value['crb_podrska_bgslika'], 'full')[0], 'komoyu' );
    }

    if ( !empty($value['crb_podrska_naslov']) ){
        $data['naslov'] = esc_html__( $value['crb_podrska_naslov'], 'komoyu' );
    }

    if ( !empty($value['crb_podrska_texts']) ){
        $data['naslov'] = esc_html__( $value['crb_podrska_naslov'], 'komoyu' );
    }

    if ( !empty($value['crb_podrska_texts']) ){
        foreach( $value['crb_podrska_texts'] as $k=>$v){
            $data['texts'][$k]['text'] = esc_html__( $v['crb_podrska_opis'], 'komoyu' );
        }
    }

}

$podrska = $twig->load('podrska.twig');
if(isset($data) && !empty($data)) {
    echo $podrska->render([ 'data' => $data ] );
}
/**
 * ==============================================================================
 *                      Sekcija reference
 * ==============================================================================
 */
$reference = carbon_get_the_post_meta( 'crb_reference' );
$data = array();

foreach ($reference as $value) {

    if ( !empty($value['crb_reference_naslov']) ){
        $data['naslov'] = esc_html__( $value['crb_reference_naslov'], 'komoyu' );
    }

    if ( !empty($value['crb_reference_opis']) ){
        $data['opis'] = esc_html__( $value['crb_reference_opis'], 'komoyu' );
    }

    if ( !empty($value['crb_reference_logos']) ){
        foreach ($value['crb_reference_logos'] as $k => $v) {
            $data['image'][$k] = esc_html__( wp_get_attachment_image_src($v['crb_reference_logo'], 'full')[0], 'komoyu' );
        }   
    }
}


$reference = $twig->load('reference.twig');
if(isset($data) && !empty($data)) {
    echo $reference->render([ 'data' => $data ] );
}
?>

<?php get_footer( 'custom' ); ?>