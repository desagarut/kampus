<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wrap_site extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->modul_ini = 400;
	}

	public function w_siakad()
	{
		$this->sub_modul_ini = 401;

		$this->set_minsidebar(1);
		$this->render('wrap/siakad', $data);
	}
	public function w_neofeeder()
	{
		$this->sub_modul_ini = 402;

		$this->set_minsidebar(1);
		$this->render('wrap/neofeeder', $data);
	}
	public function w_elearning()
	{
		$this->sub_modul_ini = 403;

		$this->set_minsidebar(1);
		$this->render('wrap/elearning', $data);
	}

	public function w_jurnal()
	{
		$this->sub_modul_ini = 404;

		$this->set_minsidebar(1);
		$this->render('wrap/jurnal', $data);
	}
	
	public function w_perpustakaan()
	{
		$this->sub_modul_ini = 405;

		$this->set_minsidebar(1);
		$this->render('wrap/perpustakaan', $data);
	}

	public function w_pin()
	{
		$this->sub_modul_ini = 406;

		$this->set_minsidebar(1);
		$this->render('wrap/pin', $data);
	}

	public function w_sister()
	{
		$this->sub_modul_ini = 407;

		$this->set_minsidebar(1);
		$this->render('wrap/sister', $data);
	}

	public function w_sierra()
	{
		$this->sub_modul_ini = 408;

		$this->set_minsidebar(1);
		$this->render('wrap/sierra', $data);
	}

	public function w_jad()
	{
		$this->sub_modul_ini = 409;

		$this->set_minsidebar(1);
		$this->render('wrap/jad', $data);
	}

	public function w_sisinfo()
	{
		$this->sub_modul_ini = 410;

		$this->set_minsidebar(1);
		$this->render('wrap/sisinfo', $data);
	}

	public function w_simantu()
	{
		$this->sub_modul_ini = 411;

		$this->set_minsidebar(1);
		$this->render('wrap/simantu', $data);
	}

	public function w_bkd()
	{
		$this->sub_modul_ini = 412;

		$this->set_minsidebar(1);
		$this->render('wrap/bkd', $data);
	}


	public function w_homebase()
	{
		$this->sub_modul_ini = 413;

		$this->set_minsidebar(1);
		$this->render('wrap/homebase', $data);
	}

	public function w_skp()
	{
		$this->sub_modul_ini = 414;

		$this->set_minsidebar(1);
		$this->render('wrap/skp', $data);
	}

	public function w_digilibrary()
	{
		$this->sub_modul_ini = 415;

		$this->set_minsidebar(1);
		$this->render('wrap/digilibrary', $data);
	}

	public function w_empat()
	{
		$this->sub_modul_ini = 416;

		$this->set_minsidebar(1);
		$this->render('wrap/empat', $data);
	}

	public function w_kip_kemdikbud()
	{
		$this->sub_modul_ini = 417;

		$this->set_minsidebar(1);
		$this->render('wrap/kip_kemdikbud', $data);
	}

	public function w_sapto()
	{
		$this->sub_modul_ini = 418;

		$this->set_minsidebar(1);
		$this->render('wrap/sapto', $data);
	}

	public function w_sapta()
	{
		$this->sub_modul_ini = 419;

		$this->set_minsidebar(1);
		$this->render('wrap/sapta', $data);
	}


}
