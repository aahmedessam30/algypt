<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'                  => 'يجب قبول :attribute',
    'accepted_if'               => 'يجب قبول :attribute عندما يكون :other :value.',
    'active_url'                => 'الرابط :attribute غير صحيح.',
    'after'                     => 'يجب أن يكون تاريخ :attribute بعد :date.',
    'after_or_equal'            => 'يجب أن يكون تاريخ :attribute بعد أو يساوي :date.',
    'alpha'                     => 'يجب أن يحتوي :attribute على حروف فقط.',
    'alpha_dash'                => 'يجب أن يحتوي :attribute على حروف وأرقام وشرطات وشرطات سفلية فقط.',
    'alpha_num'                 => 'يجب أن يحتوي :attribute على حروف وأرقام فقط.',
    'array'                     => 'يجب أن يكون :attribute ًمصفوفة.',
    'before'                    => 'يجب أن يكون تاريخ :attribute قبل :date.',
    'before_or_equal'           => 'يجب أن يكون تاريخ :attribute قبل أو يساوي :date.',
    'between'                   => [
        'array'                 => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max.',
        'file'                  => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'numeric'               => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'string'                => 'يجب أن يكون طول النص :attribute بين :min و :max حروف.',
    ],
    'boolean'                   => 'يجب أن تكون قيمة :attribute إما true أو false.',
    'confirmed'                 => 'حقل التأكيد غير متطابق مع :attribute.',
    'current_password'          => 'كلمة المرور غير صحيحة.',
    'date'                      => 'التاريخ :attribute غير صحيح.',
    'date_equals'               => 'يجب أن يكون التاريخ :attribute يساوي :date.',
    'date_format'               => 'لا يتوافق :attribute مع الشكل :format.',
    'declined'                  => ':attribute مرفوض.',
    'declined_if'               => ':attribute مرفوض عندما يكون :other :value.',
    'different'                 => 'يجب أن يكون الحقلان :attribute و :other مختلفان.',
    'digits'                    => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام.',
    'digits_between'            => 'يجب أن يحتوي :attribute بين :min و :max رقمًا/أرقام.',
    'dimensions'                => 'الصورة :attribute لها أبعاد غير صالحة.',
    'distinct'                  => 'للحقل :attribute قيمة مكررة.',
    'doesnt_end_with'           => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values',
    'doesnt_start_with'         => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values',
    'email'                     => 'يجب على :attribute أن يكون بريد إلكتروني صحيح.',
    'ends_with'                 => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values',
    'enum'                      => 'الحقل :attribute يجب أن يكون قيمة من القائمة المحددة.',
    'exists'                    => ':attribute غير موجود.',
    'file'                      => 'الملف :attribute يجب أن يكون ملف.',
    'filled'                    => 'يجب تعبئة الحقل :attribute.',
    'gt'                        => [
        'array'                 => 'يجب أن يحتوي :attribute على أكثر من :value عناصر.',
        'file'                  => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت.',
        'numeric'               => 'يجب أن تكون قيمة :attribute أكبر من :value.',
        'string'                => 'يجب أن يكون طول النص :attribute أكبر من :value حروف.',
    ],
    'gte'                       => [
        'array'                 => 'يجب أن يحتوي :attribute على :value عناصر أو أكثر.',
        'file'                  => 'يجب أن يكون حجم الملف :attribute أكبر من أو يساوي :value كيلوبايت.',
        'numeric'               => 'يجب أن تكون قيمة :attribute أكبر من أو تساوي :value.',
        'string'                => 'يجب أن يكون طول النص :attribute أكبر من أو يساوي :value حروف.',
    ],
    'image'                     => 'يجب أن يكون :attribute صورةً.',
    'in'                        => 'القيمة المحددة :attribute غير موجودة.',
    'in_array'                  => 'الحقل :attribute غير موجود في :other.',
    'integer'                   => 'يجب على :attribute أن يكون عددًا صحيحًا.',
    'ip'                        => 'يجب على :attribute أن يكون عنوان IP صحيحًا.',
    'ipv4'                      => 'يجب على :attribute أن يكون عنوان IPv4 صحيحًا.',
    'ipv6'                      => 'يجب على :attribute أن يكون عنوان IPv6 صحيحًا.',
    'json'                      => 'يجب على :attribute أن يكون نص من نوع JSON.',
    'lowercase'                 => 'يجب أن يكون الحقل :attribute بالأحرف الصغيرة.',
    'lt'                        => [
        'array'                 => 'يجب أن يحتوي :attribute على أقل من :value عناصر.',
        'file'                  => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت.',
        'numeric'               => 'يجب أن تكون قيمة :attribute أصغر من :value.',
        'string'                => 'يجب أن يكون طول النص :attribute أصغر من :value حروف.',
    ],
    'lte'                       => [
        'array'                 => 'يجب أن يحتوي :attribute على :value عنصر أو أقل.',
        'file'                  => 'يجب أن يكون حجم الملف :attribute أصغر من أو يساوي :value كيلوبايت.',
        'numeric'               => 'يجب أن تكون قيمة :attribute أصغر من أو تساوي :value.',
        'string'                => 'يجب أن يكون طول النص :attribute أصغر من أو يساوي :value حروف.',
    ],
    'mac_address'               => 'يجب على :attribute أن يكون عنوان MAC صحيحًا.',
    'max'                       => [
        'array'                 => 'يجب أن يحتوي :attribute على :max عنصرًا أو أقل.',
        'file'                  => 'يجب أن يكون حجم الملف :attribute أصغر من :max كيلوبايت.',
        'numeric'               => 'يجب أن تكون قيمة :attribute أصغر من :max.',
        'string'                => 'يجب أن يكون طول النص :attribute أصغر من :max حروف.',
    ],
    'max_digits'                => 'يجب أن يحتوي :attribute على :max رقمًا/أرقام.',
    'mimes'                     => 'يجب أن يكون :attribute ملفًا من نوع: :values.',
    'mimetypes'                 => 'يجب أن يكون :attribute ملفًا من نوع: :values.',
    'min'                       => [
        'array'                 => 'يجب أن يحتوي :attribute على الأقل على :min عنصرًا/عناصر.',
        'file'                  => 'يجب أن يكون حجم الملف :attribute أكبر من :min كيلوبايت.',
        'numeric'               => 'يجب أن تكون قيمة :attribute أكبر من :min.',
        'string'                => 'يجب أن يكون طول النص :attribute أكبر من :min حروف.',
    ],
    'min_digits'                => 'يجب أن يحتوي :attribute على الأقل على :min رقمًا/أرقام.',
    'multiple_of'               => 'يجب أن تكون قيمة :attribute مضاعفة من :value',
    'not_in'                    => 'القيمة المحددة :attribute غير موجودة.',
    'not_regex'                 => 'صيغة :attribute .غير صحيحة',
    'numeric'                   => 'يجب على :attribute أن يكون رقمًا.',
    'password'                  => [
        'letters'               => 'يجب أن تحتوي كلمة المرور على حروف.',
        'mixed'                 => 'يجب أن تحتوي كلمة المرور على حروف وأرقام.',
        'numbers'               => 'يجب أن تحتوي كلمة المرور على أرقام.',
        'symbols'               => 'يجب أن تحتوي كلمة المرور على رموز.',
        'uncompromised'         => 'يجب أن تكون كلمة المرور آمنة.',
    ],
    'present'                   => 'يجب تقديم :attribute.',
    'prohibited'                => 'حقل :attribute محظور.',
    'prohibited_if'             => 'حقل :attribute محظور عندما تكون :other :value.',
    'prohibited_unless'         => 'حقل :attribute محظور ما لم يكن :other موجودًا في :values.',
    'prohibits'                 => 'حقل :attribute يمنع :other من الحقول.',
    'regex'                     => 'صيغة :attribute .غير صحيحة',
    'required'                  => 'حقل :attribute مطلوب.',
    'required_array_keys'       => 'حقل :attribute مطلوب.',
    'required_if'               => 'حقل :attribute مطلوب عندما تكون :other :value.',
    'required_if_accepted'      => 'حقل :attribute مطلوب عندما يتم قبول :other.',
    'required_unless'           => 'حقل :attribute مطلوب ما لم يكن :other موجودًا في :values.',
    'required_with'             => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_with_all'         => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_without'          => 'حقل :attribute مطلوب عندما تكون :values غير موجودة.',
    'required_without_all'      => 'حقل :attribute مطلوب عندما لا تكون :values موجودة.',
    'same'                      => 'يجب أن يتطابق :attribute مع :other.',
    'size'                      => [
        'array'                 => 'يجب أن يحتوي :attribute على :size عنصرًا/عناصر.',
        'file'                  => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت.',
        'numeric'               => 'يجب أن تكون قيمة :attribute :size.',
        'string'                => 'يجب أن يكون طول النص :attribute :size حروف.',
    ],
    'starts_with'               => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values',
    'string'                    => 'يجب أن يكون :attribute نصًا.',
    'timezone'                  => 'يجب أن تكون :attribute منطقة زمنية صحيحة.',
    'unique'                    => 'قيمة :attribute مُستخدمة من قبل.',
    'uploaded'                  => 'فشل في تحميل :attribute.',
    'uppercase'                 => 'يجب أن يحتوي :attribute على حروف كبيرة فقط.',
    'url'                       => 'صيغة :attribute .غير صحيحة',
    'uuid'                      => 'يجب أن يكون :attribute رقم UUID صحيح.',
    'phone'                     => 'يجب أن يكون :attribute رقم هاتف صحيح.',
    'doc'                       => 'يجب أن يكون :attribute ملف صحيح.',
    'media'                     => 'يجب أن يكون :attribute صورة أو فيديو صحيح.',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'                    => [
        'attribute-name'        => [
            'rule-name'         => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes'                => [
        'name'                  => 'الاسم',
        'username'              => 'اسم المستخدم',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم الاول',
        'last_name'             => 'الاسم الاخير',
        'password'              => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'العنوان',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'state'                 => 'المنطقة',
        'postal_code'           => 'الرمز البريدي',
    ],
];
