<?php
    namespace Admin\Asm\Commons;

    class Helper{
        public static function debug($data){
            echo '<pre>';
            print_r($data);
            die;
        }
    }