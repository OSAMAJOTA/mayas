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
            'أسماء وأسعار الأصناف',
            'أسماء الأقسام',
            'أسماء الوظائف',
            'الجنسيات',
            'أسماء الموظفين',
            'مجموعة الخياطين',
            'أسماء الفروع والشركات',


            'عملاء الفروع',
            ' عملاء بانتظار التوجيه',
            'عملاء بانتظار التواصل معهم',
            'عملاء طلبوا زيارة منزلية',
            'عملاء محظورين',
            'التقارير',


            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

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
