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

    'accepted' => ':attribute qəbul edilməlidir.',
    'accepted_if' => ':attribute :other :value olduqda qəbul edilməlidir.',
    'active_url' => ':attribute etibarlı URL deyil.',
    'after' => ':attribute :date -dən sonrakı tarix olmalıdır.',
    'after_or_equal' => ':attribute :date -dən sonrakı və ya ona bərabər olan tarix olmalıdır.',
    'alpha' => ':attribute yalnız hərflər olmalıdır.',
    'alpha_dash' => ':attribute yalnız hərflər, rəqəmlər, tire və alt xətt olmalıdır.',
    'alpha_num' => ':attribute yalnız hərflər və rəqəmlər olmalıdır.',
    'array' => ':attribute massiv olmalıdır.',
    'before' => ':attribute :date -dən əvvəlki tarix olmalıdır.',
    'before_or_equal' => ':attribute :date -dən əvvəl və ya ona bərabər bir tarix olmalıdır.',
    'between' => [
        'numeric' => ':attribute :min və :max arasında olmalıdır.',
        'file' => ':attribute :min və :max kilobayt arasında olmalıdır.',
        'string' => ':attribute :min və :max simvolları arasında olmalıdır.',
        'array' => ':attribute :min və :max elementləri olmalıdır.',
    ],
    'boolean' => ':attribute sahəsi doğru və ya yalan olmalıdır.',
    'confirmed' => ':attribute təsdiqi uyğun gəlmir.',
    'current_password' => 'Parol səhvdir.',
    'date' => ':attribute etibarlı tarix deyil.',
    'date_equals' => ':attribute :date ilə bərabər tarix olmalıdır.',
    'date_format' => ':attribute :format formatına uyğun gəlmir.',
    'declined' => ':attribute rədd edilməlidir.',
    'declined_if' => ':other :value olduqda :attribute rədd edilməlidir.',
    'different' => ':attribute və :other fərqli olmalıdır.',
    'digits' => ':attribute :digits rəqəmləri olmalıdır.',
    'digits_between' => ':attribute :min və :max rəqəmləri arasında olmalıdır.',
    'dimensions' => ':attribute yanlış şəkil ölçüləri var.',
    'distinct' => ':attribute sahəsinin dublikat dəyəri var.',
    'email' => ':attribute etibarlı e-poçt ünvanı olmalıdır.',
    'ends_with' => ':attribute aşağıdakılardan biri ilə bitməlidir: :values.',
    'exists' => 'Seçilmiş :attribute etibarsızdır.',
    'file' => ':attribute fayl olmalıdır.',
    'filled' => ':attribute sahəsinin dəyəri olmalıdır.',
    'gt' => [
        'numeric' => ':attribute :value -dən böyük olmalıdır.',
        'file' => ':attribute :value kilobaytdan böyük olmalıdır.',
        'string' => ':attribute :value simvollarından böyük olmalıdır.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute :value-dən böyük və ya ona bərabər olmalıdır.',
        'file' => ':attribute :value kilobaytdan böyük və ya ona bərabər olmalıdır.',
        'string' => ':attribute :value simvollarından böyük və ya ona bərabər olmalıdır.',
        'array' => ':attribute :value elementləri və ya daha çox olmalıdır.',
    ],
    'image' => ':attribute şəkil olmalıdır.',
    'in' => 'Seçilmiş :attribute etibarsızdır.',
    'in_array' => ':attribute sahəsi :other mövcud deyil.',
    'integer' => ':attribute tam ədəd olmalıdır.',
    'ip' => ':attribute etibarlı IP ünvanı olmalıdır.',
    'ipv4' => ':attribute etibarlı IPv4 ünvanı olmalıdır.',
    'ipv6' => ':attribute etibarlı IPv6 ünvanı olmalıdır.',
    'json' => ':attribute etibarlı JSON sətri olmalıdır.',
    'lt' => [
        'numeric' => ':attribute :value-dən kiçik olmalıdır.',
        'file' => ':attribute :value kilobaytdan kiçik olmalıdır.',
        'string' => ':attribute :value simvollarından kiçik olmalıdır.',
        'array' => ':attribute :value elementlərindən az olmalıdır.',
    ],
    'lte' => [
        'numeric' => ':attribute :value -dən kiçik və ya ona bərabər olmalıdır.',
        'file' => ':attribute :value kilobaytdan kiçik və ya ona bərabər olmalıdır.',
        'string' => ':attribute :value simvollarından kiçik və ya ona bərabər olmalıdır.',
        'array' => ':attribute :value elementindən çox olmamalıdır.',
    ],
    'max' => [
        'numeric' => ':attribute :max -dan böyük olmamalıdır.',
        'file' => ':attribute :max kilobaytdan çox olmamalıdır.',
        'string' => ':attribute :max simvollarından çox olmamalıdır.',
        'array' => ':attribute :max elementlərindən çox olmamalıdır.',
    ],
    'mimes' => ':attribute :value tipli fayl olmalıdır.',
    'mimetypes' => ':attribute :value tipli fayl olmalıdır.',
    'min' => [
        'numeric' => ':attribute ən azı :min olmalıdır.',
        'file' => ':attribute ən azı :min kilobayt olmalıdır.',
        'string' => ':attribute ən azı :min simvoldan ibarət olmalıdır.',
        'array' => ':attribute ən azı :min elementləri olmalıdır.',
    ],
    'multiple_of' => ':attribute :value çoxluğu olmalıdır.',
    'not_in' => 'Seçilmiş :attribute etibarsızdır.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute formatı yanlışdır.',
    'password' => 'Parol səhvdir.',
    'present' => ':attribute sahəsi mövcud olmalıdır.',
    'prohibited' => ':attribute sahəsi qadağandır.',
    'prohibited_if' => ':other :value olduqda :attribute sahəsi qadağandır.',
    'prohibited_unless' => ':other :values olmadığı halda :attribute sahəsi qadağandır.',
    'prohibits' => ':attribute sahəsi :other mövcud olmasını qadağan edir.',
    'regex' => ':attribute formatı yanlışdır.',
    'required' => ':attribute sahəsi tələb olunur.',
    'required_if' => ':attribute sahəsi :other :value olduqda tələb olunur.',
    'required_unless' => ':other :values olmadığı halda :attribute sahəsi tələb olunur.',
    'required_with' => ':attribute sahəsi :values mövcud olduqda tələb olunur.',
    'required_with_all' => ':attribute sahəsi :values mövcud olduqda tələb olunur.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => ':attribute sahəsi :values heç biri mövcud olmadıqda tələb olunur.',
    'same' => ':attribute və :digər uyğun olmalıdır.',
    'size' => [
        'numeric' => ':attribute :size olmalıdır.',
        'file' => ':attribute :size kilobayt olmalıdır.',
        'string' => ':attribute :size simvolları olmalıdır.',
        'array' => ':attribute :size elementləri olmalıdır.',
    ],
    'starts_with' => ':attribute aşağıdakılardan biri ilə başlamalıdır: :values.',
    'string' => ':attribute sətir olmalıdır.',
    'timezone' => ':attribute etibarlı saat qurşağı olmalıdır.',
    'unique' => ':attribute artıq götürülüb.',
    'uploaded' => ':attribute yükləmək alınmadı.',
    'url' => ':attribute etibarlı URL olmalıdır.',
    'uuid' => ':attribute etibarlı UUID olmalıdır.',

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

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
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

    'attributes' => [],

];
