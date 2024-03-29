<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'الرئيسة',
            'الاعدادات',
            'التأمين',
            'المستخدمون',
            'الصلاحيات',
            'الملفات الشخصية',
            'ملف الشركة',
            'الملف الشخصي للمستخدم',
            'مدخلات النظام',

            'أسماء الأقسام',
            'أسماء الوظائف',
            'الجنسيات',
            'الموظفين',
            'أسماء الموظفين',

            'أسماء الفروع والشركات',
            'العملاء',

            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',
            'اظهر المستخدمون المتصلين',
            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',


        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
