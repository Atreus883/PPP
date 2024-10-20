<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function logout()
    {
        // Hapus semua sesi user yang aktif
        session()->destroy();

        // Arahkan kembali ke halaman utama setelah logout
        return redirect()->to('/homepage');
    }
}