<!--
	Referência https://stackoverflow.com/questions/804399/codeigniter-create-new-helper
 -->

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_session'))
{
    function check_session()
    {
		$CI =& get_instance();

		if ($CI->session->tempdata('logado') != true) {
			$CI->load->helper('url');

			redirect('login/login', 'location');
			die();
		}

        return true;
    }
}
