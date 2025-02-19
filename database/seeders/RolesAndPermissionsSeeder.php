<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use App\Models\SinhVien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        // Tạo quyền (permissions)
        $permissions = [
            'create-user',
            'edit-user',
            'delete-user',
            'manage-document',
            'borrow-document',
            'view-document',
            'suggest-document',
            'access-admin'
        ];

        foreach ($permissions as $perm) {
            Permission::findOrCreate($perm);
        }

        // Tạo vai trò (roles)
        $roles = [
            'admin' => ['create-user', 'edit-user', 'delete-user', 'manage-document', 'borrow-document', 'view-document', 'suggest-document', 'access-admin'],
            'librarian' => ['manage-document', 'borrow-document', 'view-document', 'access-admin'],
            'teacher' => ['borrow-document', 'view-document', 'suggest-document'],
            'student' => ['borrow-document', 'view-document']
        ];

        foreach ($roles as $role => $perms) {
            $roleInstance = Role::findOrCreate($role);
            $roleInstance->givePermissionTo($perms);
        }

        // Tạo tài khoản mẫu
        $users = [
            ['name' => 'Quân', 'email' => 'vquan.dev@gmail.com', 'password' => 'vanquan2509', 'role' => 'admin'],
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => 'password', 'role' => 'admin'],
            ['name' => 'Hoàng', 'email' => 'nguyenvanhoang130820@gmail.com', 'password' => 'vanhoang123', 'role' => 'admin'],
            ['name' => 'Librarian User', 'email' => 'librarian@gmail.com', 'password' => 'password', 'role' => 'librarian'],
            ['name' => 'Teacher User', 'email' => 'teacher@gmail.com', 'password' => 'password', 'role' => 'teacher'],
            ['name' => 'Student User', 'email' => 'student@gmail.com', 'password' => 'password', 'role' => 'student']
        ];

        foreach ($users as $userData) {
            // Tạo user
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => bcrypt($userData['password'])
            ]);

            if ($userData['role'] === 'student') {
                SinhVien::create([
                    'ho_ten'    => $userData['name'],
                    'email'     => $userData['email'],
                    'password'  => bcrypt($userData['password']),
                ]);
            }
            if (
                $userData['role'] === 'librarian' || $userData['role'] === 'teacher'
            ) {
                NhanVien::create([
                    'user_id'   => $user->id,
                    'ho_ten'    => $userData['name'],
                ]);
            }
            $user->assignRole($userData['role']);
        }
    }
}
