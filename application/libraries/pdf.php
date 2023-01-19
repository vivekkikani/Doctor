<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
// reference the Dompdf namespace

class Pdf extends Dompdf
{
    public function __construct(){
        
        // include autoloader
        parent::__construct();
        require_once APPPATH.'asset';
 
        // instantiate and use the dompdf class
        // $pdf = new DOMPDF();
        
        // $CI =& get_instance();
        // $CI->dompdf = $pdf;
        
    }
}
?>