<?php

//custom image type

class ACFImage {
    public $src;
    public $srcset;
    public $srcset_sizes;
    public $alt_text;
    public $meta;
    public $title;
    public $caption;

    // setters

    function set_src($src) {
        $this->src = $src;
    }

    function set_srcset($srcset) {
        $this->srcset = $srcset;
    }

    function set_srcset_sizes($srcset_sizes) {
        $this->srcset_sizes = $srcset_sizes;
    }

    function set_alt_text($alt_text) {
        $this->alt_text = $alt_text;
    }

    function set_meta($meta) {
        $this->meta = $meta;
    }

    function set_title($title) {
        $this->title = $title;
    }

    function set_caption($caption) {
        $this->caption = $caption;
    }

    //getters

    function get_src() {
        return $this->src;
    }

    function get_srcset() {
        return $this->srcset;
    }

    function get_srcset_sizes() {
        return $this->srcset_sizes;
    }

    function get_alt_text() {
        return $this->alt_text;
    }

    function get_meta() {
        return $this->meta;
    }

    function get_title() {
        return $this->title;
    }

    function get_caption() {
        return $this->caption;
    }

}

function GetACFImage($img){

    if($img) {

        $output = new ACFImage;

        $output->set_src( wp_get_attachment_image_src( $img, null ) );
        $output->set_srcset( wp_get_attachment_image_srcset( $img, null ) );
        $output->set_srcset_sizes( wp_get_attachment_image_sizes( $img, null ) );
        $output->set_alt_text( get_post_meta( $img, '_wp_attachment_image_alt', true ) );
        $output->set_meta( wp_get_attachment_metadata( $img ) );
        $output->set_title( get_the_title( $img ) );
        $output->set_caption( get_the_excerpt( $img ) );

        return $output;

    } else {

        return null;
    }

}