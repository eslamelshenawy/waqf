<?php

return [
    'name' => [
        'required' => 'الاسم مطلوب'
    ],
    'number' => [
        'required' => 'حقل الرقم مطلوب'
    ],
    'court' => [
        'required' => 'حقل المحكمة مطلوب'
    ],
    'space' => [
        'required' => 'حقل المساحة مطلوب'
    ],
    'type' => [
        'required' => 'حقل النوع ضروري'
    ],
    'email' => [
        'required' => 'الايميل مطلوب',
        'unique' => 'البريد الالكتروني مسجل من قبل',
        'already_existed' => 'البريد الالكتروني موجود مسبقا',
        'invalid' => 'ايميل غير صالح',
        'valid' => 'ايميل صالح',
        'regex' => 'القيمة المدخلة لا تصلح كبريد الكتروني',
        'max' => 'لقد تعديت عدد الاحرف المتاح',
        'min' => 'ليس لديك الحد الادني للعدد الاحرف',
    ],
    'mobile' => [
        'required' => 'رقم الجوال مطلوب',
        'unique' => 'رقم الجوال مسجل من قبل',
        'already_existed' => 'رقم الجوال مسجل مسبقا',
        'invalid' => 'رقم الجوال غير لايصلح',
        'valid' => 'رقم الجوال صحيح',
        'regex' => 'رقم الجوال غير سعودي',
        'max' => 'لقد تعديت عدد الاحرف المتاح',
        'min' => 'ليس لديك الحد الادني للعدد الاحرف',
    ],
    'identity_number' => [
        'required' => 'يرجي ادخال رقم الهوية',
        'unique' => 'رقم الهوية سجل مسبقا',
        'already_existed' => 'رقم الهوية موجود مسبقا',
        'invalid' => 'رقم الهوية غير صالح',
        'valid' => 'رقم الهوية صحيح',
        'regex' => 'رقم الهوية غير صالح',
        'max' => 'يرجي ادخال عشرة ارقام فقط',
        'min' => 'يرجي ادخال عشرة ارقام',
        'numeric' => 'يجب ان يكون رقم الهوية مكون من أرقام فقط'
    ],
    'job' => [
        'required' => 'يرجي اختيار الوظيفة',
        'rule' => [
            'in' => 'الوظيفة ليست من القائمة',
            'exists' => 'الوظيفة ليست من القائمة'
        ]
    ],
    'martial_status' => [
        'required' => 'يرجي اختيار الحالة الاجتماعية',
        'rule' => [
            'in' => 'الحالة الاجتماعية ليست من القائمة',
            'exists' => 'الحالة الاجتماعية ليست من القائمة'
        ]
    ],
    'city' => [
        'required' => 'يرجي اختيار المدينة',
        'rule' => [
            'in' => 'المدينة ليست من القائمة',
            'exists' => 'المدينة ليست من القائمة',
        ]
    ],
    'birth_of_date_at' => [
        'required' => 'يرجي تحديد تاريخ الميلاد',
        'date' => 'يجب ان تكون القيمة تاريخ',
        'before' => 'يجب ان يكون التاريخ قبل التاريخ المدخل',
        'after' => 'يجب ان يكون التاريخ بعد هذا التاريخ'
    ],
    'end_at' => [
        'required' => 'يرجي تحديد تاريخ الانتهاء',
        'date' => 'يجب ان تكون القيمة تاريخ',
        'before' => 'يجب ان يكون التاريخ قبل التاريخ المدخل',
        'after' => 'يجب ان يكون التاريخ بعد هذا التاريخ'
    ],
    'release_at' => [
        'required' => 'يرجي تحديد تاريخ الاصدار',
        'date' => 'يجب ان تكون القيمة تاريخ',
        'before' => 'يجب ان يكون التاريخ قبل التاريخ المدخل',
        'after' => 'يجب ان يكون التاريخ بعد هذا التاريخ'
    ],
    'kids' => [
        'required' => 'يرجي تحديد اذا كان لديك أطفال ام لا',
        'boolean' => 'القيمة غير صحيحة',
    ],
    'bank' => [
        'required' => 'من الضروري تحديد البنك',
    ],
    'iban_number' => [
        'required' => 'من الضروري تحديد رقم الايبان',
    ],
    'account_number' => [
        'required' => 'من الضروري تحديد رقم البنك',
    ],
    'password' => [
        'required' => 'كلمة المرور ضرورية',
        'min' => 'كلمة المرور ضعيفة يجب ان تكون علي الاقل ٦ حروف',
        'max' => 'الباسوورد لا يصلح',
        'confirmed' => 'كلمتا المرور غير متطابقة',
    ],
    'company_name' => [
        'required' => 'اسم الشركة التي تعمل بها ضروري'
    ],
    'job_title' => [
        'required' => 'المسمي الوظيفي ضروري'
    ],
    'check_agree' => [
        'required' => 'الموافقه على الشروظ والاحكام'
    ],
    'address' => [
        'required' => 'يجب عليك ادخال العنوان'
    ],
    'instrument_number' => [
        'required' => 'رقم الصك ضروري'
    ],
    'instrument_date_at' => [
        'required' => 'تاريخ الصك',
        'date' => 'يجب ان تكون القيمة تاريخ',
    ],
    'instrument_image' => [
        'required' => 'صورة الصك ضروري',
        'mimes' => 'نوع الصورة لايصلح',
        'max' => 'حجم الصورة كبير',
    ],
    'building_license_image' => [
        'required' => 'صورة ترخيص البناء ضروري',
    ],
    'construction_license_number' => [
        'required' => 'رقم ترخيص البناء ضروري',
    ],
    'building_image' => [
        'required' => 'صورة البناء ضروري',
    ],
    'building_type' => [
        'required' => 'نوع البناء ضروري',
    ],
    'rent_type' => [
        'required' => 'نوع الايجار ضروري',
    ],
    'price' => [
        'required' => 'السعر ضروري',
        'numeric' => 'يجب ان تكون القيمة رقمية'
    ],
    'construction_license_date_at' => [
        'required' => 'تاريخ ترخيص البناء ضروري',
        'date' => 'يجب ان تكون القيمة تاريخ'
    ],
    'extra_details' => [
        'required' => 'اذكر التفاصيل'
    ],
    'district' => [
        'required' => 'حقل الحي ضروري'
    ],
    'street' => [
        'required' => 'حقل الشارع ضروري'
    ],
    'images' => [
        'required' => 'يجب اضافة صور'
    ],
    'is_has_air_conditioner' => [
        'required' => 'يجب تحديد هل يوجد مكيف هواء'
    ],
    'is_has_decoration' => [
        'required' => 'يجب تحديد هل يوجد ديكور'
    ],
    'is_has_license' => [
        'required' => 'يجب تحديد هل يوجد ترخيص'
    ],
    'is_has_warehouse' => [
        'required' => 'يجب تحديد هل يوجد مستودع'
    ],
    'commercial_activities' => [
        'required' => 'يجب تحديد الانشطة التجارية'
    ],
    'is_on_street_front' => [
        'required' => 'يجب تحديد هل علي واجهة الشارع'
    ],
    'building' => [
        'required' => 'يجب تحديد البناء التابع له'
    ],
];