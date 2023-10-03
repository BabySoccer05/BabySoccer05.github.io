<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Konfigurasi_model;
use App\Models\Berita_model;
use App\Models\Kategori_model;

class News extends BaseController
{

	// index
	public function index()
	{
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_berita		= new Berita_model();
		$konfigurasi 	= $m_konfigurasi->listing();
		$berita 		= $m_berita->home();

		$data = [
			'title'			=> 'News ' . $konfigurasi['namaweb'],
			'description'	=> 'News ' . $konfigurasi['namaweb'],
			'keywords'		=> 'News ' . $konfigurasi['namaweb'],
			'berita'		=> $berita,
			'content'		=> 'news/index'
		];
		echo view('layout/wrapper', $data);
	}

	// read
	public function read($slug_berita)
	{
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_berita		= new Berita_model();
		$konfigurasi 	= $m_konfigurasi->listing();
		$berita 		= $m_berita->read($slug_berita);

		// Update hits
		$data = [
			'id_berita'	=> $berita['id_berita'],
			'hits'		=> $berita['hits'] + 1
		];
		$m_berita->edit($data);
		// Update hits

		$data = [
			'title'			=> $berita['judul_berita'],
			'description'	=> $berita['judul_berita'],
			'keywords'		=> $berita['judul_berita'],
			'berita'		=> $berita,
			'content'		=> 'news/read'
		];
		echo view('layout/wrapper', $data);
	}

	// profil
	public function profil($slug_berita)
	{
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_berita		= new Berita_model();
		$konfigurasi 	= $m_konfigurasi->listing();
		$berita 		= $m_berita->read($slug_berita);

		// Update hits
		$data = [
			'id_berita'	=> $berita['id_berita'],
			'hits'		=> $berita['hits'] + 1
		];
		$m_berita->edit($data);
		// Update hits

		$data = [
			'title'			=> $berita['judul_berita'],
			'description'	=> $berita['judul_berita'],
			'keywords'		=> $berita['judul_berita'],
			'berita'		=> $berita,
			'content'		=> 'news/profil'
		];
		echo view('layout/wrapper', $data);
	}

	// layanan
	public function layanan($slug_berita)
	{
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_berita		= new Berita_model();
		$konfigurasi 	= $m_konfigurasi->listing();
		$berita 		= $m_berita->read($slug_berita);

		// Update hits
		$data = [
			'id_berita'	=> $berita['id_berita'],
			'hits'		=> $berita['hits'] + 1
		];
		$m_berita->edit($data);
		// Update hits

		$data = [
			'title'			=> $berita['judul_berita'],
			'description'	=> $berita['judul_berita'],
			'keywords'		=> $berita['judul_berita'],
			'berita'		=> $berita,
			'content'		=> 'news/layanan'
		];
		echo view('layout/wrapper', $data);
	}

	// kategori
	public function kategori($slug_kategori)
	{
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_berita		= new Berita_model();
		$m_kategori		= new Kategori_model();
		$konfigurasi 	= $m_konfigurasi->listing();
		$kategori 		= $m_kategori->read($slug_kategori);
		$berita 		= $m_berita->kategori($kategori['id_kategori']);
		// Update hits
		$data = [
			'id_kategori'	=> $kategori['id_kategori'],
			'hits'			=> $kategori['hits'] + 1
		];
		$m_kategori->edit($data);
		// Update hits

		$data = [
			'title'			=> $kategori['nama_kategori'],
			'description'	=> $kategori['nama_kategori'],
			'keywords'		=> $kategori['nama_kategori'],
			'kategori'		=> $kategori,
			'berita'		=> $berita,
			'content'		=> 'news/index'
		];
		echo view('layout/wrapper', $data);
	}
}
