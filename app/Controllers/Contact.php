<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Konfigurasi_model;
use App\Models\Galeri_model;

class Contact extends BaseController
{
	// Kontak
	public function index()
	{
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_galeri		= new Galeri_model();
		$konfigurasi 	= $m_konfigurasi->listing();
		$slider 		= $m_galeri->slider();

		$data = [
			'title'			=> 'Contact Us',
			'description'	=> 'Contact Us ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
			'keywords'		=> 'Contact Us ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
			'slider'		=> $slider,
			'konfigurasi'	=> $konfigurasi,
			'content'		=> 'contact/index'
		];
		echo view('layout/wrapper', $data);
	}
}
