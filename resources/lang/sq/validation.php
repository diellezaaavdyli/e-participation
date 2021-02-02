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

    'accepted' => ':attribute duhet të pranohet.',
    'active_url' => ':attribute nuk është një URL e vlefshme.',
    'after' => ':attribute duhet të jetë një datë pas :date.',
    'after_or_equal' => ':attribute duhet të jetë një datë pas ose e barabartë me :date.',
    'alpha' => ':attribute mund të përmbajë vetëm shkronja.',
    'alpha_dash' => ':attribute mund të përmbajë vetëm shkronja, numra, viza dhe nënvizime.',
    'alpha_num' => ':attribute mund të përmbajë vetëm shkronja dhe numra.',
    'array' => ':attribute duhet të jetë një rreshtim.',
    'before' => ':attribute duhet të jetë një datë para :date.',
    'before_or_equal' => ':attribute duhet të jetë një datë para ose e barabartë me :date.',
    'between' => [
        'numeric' => ':attribute duhet të jetë mes :min dhe :max.',
        'file' => ':attribute duhet të jetë :min dhe :max kilobytes.',
        'string' => ':attribute duhet të jetë :min dhe :max characters.',
        'array' => ':attribute duhet të jetë :min dhe :max items.',
    ],
    'boolean' => 'Fusha e :attribute duhet të jetë e saktë ose e pasaktë.',
    'confirmed' => ' Konfirmimi i :attribute nuk përputhet.',
    'date' => ':attribute nuk është një datë valide',
    'date_equals' => ':attribute duhet të jetë një datë e barabartë me :date.',
    'date_format' => ':attribute nuk përputhet me formatin :format.',
    'different' => ':attribute dhe :other duhet të jenë të ndryshëm.',
    'digits' => ':attribute duhet të jetë shifra :digits.',
    'digits_between' => ':attribute duhet të jetë midis shifrave :min dhe :max.',
    'dimensions' => ':attribute ka dimensione të pavlefshme të imazhit.',
    'distinct' => 'Fusha e :attribute  ka një vlerë dublikuar.',
    'email' => ':attribute duhet të jetë një email adresë e vlefshme.',
    'ends_with' => ':attribute duhet të përfundojë me një nga: :values.',
    'exists' => ':attribute i zgjedhur është i pavlefshëm.',
    'file' => ':attribute duhet të jetë një skedar.',
    'filled' => 'Fusha e :attribute duhet të ketë një vlerë.',
    'gt' => [
        'numeric' => ':attribute duhet të jetë më i madh se :value.',
        'file' => ':attribute duhet të jetë më i madh se :value kilobajt.',
        'string' => ':attribute duhet të jetë më i madh se :value karaktere.',
        'array' => ':attribute duhet të ketë më shumë se :value artikuj.',
    ],
    'gte' => [
        'numeric' => ':attribute duhet të jetë më i madh ose i barabartë se :value.',
        'file' => ':attribute duhet të jetë më i madh ose i barabartë se :value kilobajt.',
        'string' => ':attribute duhet të jetë më i madh ose i barabartë se :value karaktere.',
        'array' => ':attribute duhet të ketë :value ose më shumë artikuj.',
    ],
    'image' => ':attribute duhet të jetë imazh',
    'in' => ':attribute i selektuar nuk është valid.',
    'in_array' => 'Fusha :attribute nuk ekziston në :other.',
    'integer' => ':attribute duhet të jetë numër i plotë',
    'ip' => ':attribute duhet të jetë një IP adresë valide.',
    'ipv4' => ':attribute duhet të jetë një IPv4 adresë valide.',
    'ipv6' => ':attribute duhet të jetë një  IPv6 adresë valide.',
    'json' => ':attribute duhet të jetë një JSON varg.',
    'lt' => [
        'numeric' => ':attribute duhet të jetë më i vogël se :value.',
        'file' => ':attribute duhet të jetë më i vogël se :value kilobajt.',
        'string' => ':attribute duhet të jetë më i vogël se :value karaktere.',
        'array' => ':attribute duhet të ketë më pak se :value artikuj.',
    ],
    'lte' => [
        'numeric' => ':attribute duhet të jetë më i vogel ose i barabartë me :value.',
        'file' => ':attribute duhet të jetë më i vogel ose i barabartë me :value kilobajt.',
        'string' => ':attribute duhet të jetë më i vogel ose i barabartë me :value karaktere.',
        'array' => ':attribute nuk duhet të ketë më pak se :value artikuj.',
    ],
    'max' => [
        'numeric' => ':attribute nuk duhet të jetë më i madh se :max.',
        'file' => ':attribute nuk duhet të jetë më i madh se :max kilobajt.',
        'string' => ':attribute nuk duhet të jetë më i madh se :max karaktere.',
        'array' => ':attribute nuk duhet të ketë më shume se :max artikuj.',
    ],
    'mimes' => ':attribute duhet të jetë nje skedar i type: :values.',
    'mimetypes' => ':attribute duhet të jetë nje skedar i llojit: :values.',
    'min' => [
        'numeric' => ':attribute duhet të jetë të paktën :min.',
        'file' => ':attribute duhet të jetë të paktën :min kilobajt.',
        'string' => ':attribute duhet të jetë të paktën :min karaktere.',
        'array' => ':attribute duhet të ketë të paktën :min artikuj.',
    ],
    'not_in' => ':attribute i selektuar është valid.',
    'not_regex' => 'Formati i :attribute është valid.',
    'numeric' => ':attribute duhet të jetë numër.',
    'password' => 'Fjalëkalimi është i pasaktë.',
    'present' => 'Fusha e :attribute duhet të jetë e pranishme.',
    'regex' => 'Formati i :attribute është valid.',
    'required' => 'Fusha e :attribute kërkohet.',
    'required_if' => 'Fusha e :attribute kërkohet kur :other është :value.',
    'required_unless' => 'Fusha e :attribute kërkohet përveç nëse :other është në :values.',
    'required_with' => 'Fusha e :attribute kërkohet kur :values është e pranishme.',
    'required_with_all' => 'Fusha :attribute kërkohet kur :values janë të pranishme.',
    'required_without' => 'Fusha :attribute kërkohet when :values nuk janë të pranishme',
    'required_without_all' => 'Fusha :attribute kërkohet kur asnjë nga :values nuk janë të pranishme.',
    'same' => ':attribute dhe :other duhet të përputhen.',
    'size' => [
        'numeric' => ':attribute duhet të jetë :size.',
        'file' => ':attribute duhet të jetë  :size kilobajt.',
        'string' => ':attribute duhet të jetë  :size karaktere.',
        'array' => ':attribute duhet të përmbajë :size artikuj.',
    ],
    'starts_with' => ':attribute duhet të fillojë me njërën nga vlerat në vijim: :values.',
    'string' => ':attribute duhet të jetë varg.',
    'timezone' => ':attribute duhet të jetë zonë valide.',
    'unique' => ':attribute është tashmë i zënë.',
    'uploaded' => ':attribute dështoi të ngarkohet.',
    'url' => 'Formati i :attribute nuk është valid.',
    'uuid' => ':attribute duhet të jetë një UUID valide.',

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
    | with something more reader friendly such as "E-mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
