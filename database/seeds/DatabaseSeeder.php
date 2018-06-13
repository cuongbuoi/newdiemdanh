<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // $this->call('seedAdmin');
        // $this->call('seedlop');
        $this->call('seedsinhvien');
    }
}
class seedAdmin extends Seeder
{
    public function run()
    {
        DB::table('admin')->insert([
            ['taikhoan' => 'admin', 'password' => bcrypt('123456')],
        ]);
    }
}

class seedlop extends Seeder
{
    public function run()
    {
        DB::table('lops')->insert([
            ['malop' => 'HTTT', 'tenlop' => 'Hệ thống thông tin'],
        ]);
    }
}
class seedsinhvien extends Seeder
{
    public function run()
    {
        DB::table('sinh_viens')->insert([
            // ['masv' => '15c4802020029', 'hoten' => 'Nguyễn Văn Phước', 'gioitinh' => 'nam', 'malop' => 'HTTT'],
            // ['masv' => '15c4802020028', 'hoten' => 'Nguyễn Trường thuận', 'gioitinh' => 'nam', 'malop' => 'HTTT'],
            // ['masv' => '15c4802020027', 'hoten' => 'Trương Quốc Cường', 'gioitinh' => 'nam', 'malop' => 'HTTT'],
            // ['masv' => '15c4802020026', 'hoten' => 'Ngô Minh Thư', 'gioitinh' => 'nữ', 'malop' => 'HTTT'],
            // ['masv' => '15c4802020025', 'hoten' => 'Phan Minh Đại', 'gioitinh' => 'nữ', 'malop' => 'HTTT'],
            // ['masv' => '15c4802020024', 'hoten' => 'Dư Thanh Hiền', 'gioitinh' => 'nữ', 'malop' => 'HTTT'],
            // ['masv' => '15c4802020023', 'hoten' => 'Diễm Võ', 'gioitinh' => 'nữ', 'malop' => 'HTTT'],
            ['masv' => '15c4802020022', 'hoten' => 'Trương Nhi', 'gioitinh' => 'nữ', 'malop' => 'HTTT']
        ]);
    }
}
