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

    'accepted' => ':attribute mora biti prihvaćen.',
    'active_url' => ':attribute nije važeći URL.',
    'after' => ':attribute mora biti datum posle :date.',
    'after_or_equal' => ':attribute mora biti datum posle ili jednak :date.',
    'alpha' => ':attribute može sadržavati samo slova.',
    'alpha_dash' => ':attribute može sadržavati samo slova, brojeve, crtice i donje crte.',
    'alpha_num' => ':attribute može sadržavati samo slova i brojeve.',
    'array' => ':attribute mora biti niz.',
    'before' => ':attribute mora biti datum pre :date.',
    'before_or_equal' => ':attribute mora biti datum pre ili jednak :date.',
    'between' => [
        'numeric' => ':attribute mora biti između :min i :max.',
        'file' => ':attribute mora biti između :min i :max kilobajta',
        'string' => ':attribute mora biti između :min i :max znakova.',
        'array' => ':attribute mora imati između :min i :max stavki.',
    ],
    'boolean' => 'Polje :attribute mora biti tačno ili netačno.',
    'confirmed' => 'Konfirmacija :attribute se ne podudara.',
    'date' => ':attribute nije važeći datum',
    'date_equals' => ':attribute mora biti datum jednak :date.',
    'date_format' => ':attribute ne odgovara formatu :format.',
    'different' => ':attribute i :other moraju biti različiti.',
    'digits' => ':attribute mora biti :digits cifre.',
    'digits_between' => ':attribute mora biti između :min i :max cifara.',
    'dimensions' => ':attribute ima nevažeće dimenzije slike.',
    'distinct' => ':attribute atribut ima dupliranu vrednost.',
    'email' => ':attribute mora biti važeća adresa e-pošte.',
    'ends_with' => ':attribute mora se završiti sa jednom od sledećih: :values.',
    'exists' => ':attribute izabrani nevažeći.',
    'file' => ':attribute mora biti fajl.',
    'filled' => ':attribute atribut mora imati vrednost.',
    'gt' => [
        'numeric' => ':attribute mora biti veći od: :value.',
        'file' => ':attribute mora biti veći :value kilobajta vrednosti.',
        'string' => ':attribute atribut mora biti veći od :value vrednost',
        'array' => ':attribute mora imati više od :value stavki.',
    ],
    'gte' => [
        'numeric' => ':attribute mora biti veći ili jednak :value.',
        'file' => ':attribute mora biti veći ili jednak :value kilobajta.',
        'string' => ':attribute mora biti veći ili jednak znakovi :value.',
        'array' => 'attribute mora imati :value stavki ili više.',
    ],
    'image' => ':attribute mora biti slika.',
    'in' => ' :attribute izabrani nevažeći.',
    'in_array' => ':attribute polje ne postoji u :other.',
    'integer' => ':attribute mora biti ceo broj.',
    'ip' => ':attribute mora biti važeća IP adresa.',
    'ipv4' => ':attribute mora biti važeća IPv4 adresa.',
    'ipv6' => ':attribute mora biti važeća IPv6 adresa.',
    'json' => ':attribute mora biti važeći JSON niz.',
    'lt' => [
        'numeric' => ':attribute mora biti manje od :value.',
        'file' => ':attribute mora biti manji od :value kilobajta.',
        'string' => ':attribute mora biti manje od :value znakova.',
        'array' => ':attribute mora imati manje od :value predmeta.',
    ],
    'lte' => [
        'numeric' => ':attribute atribut mora biti manji od :value.',
        'file' => ':attribute mora biti manji ili jednak :value kilobajta.',
        'string' => ':attribute mora biti manji ili jednak  :value znakova.',
        'array' => ':attribute ne sme imati više od :value stavki.',
    ],
    'max' => [
        'numeric' => ':attribute ne sme biti veći od :max.',
        'file' => ':attribute ne sme biti veći :max kilobajta.',
        'string' => ':attribute ne sme biti veći :max znakova.',
        'array' => ':attribute ne sme biti veći :max stavki.',
    ],
    'mimes' => ':attribute mora biti fajl tipa: :values.',
    'mimetypes' => ':attribute mora biti fajl tipa: :values.',
    'min' => [
        'numeric' => ':attribute mora biti najmanje :min.',
        'file' => ':attribute mora biti najmanje :min kilobajta.',
        'string' => ':attribute mora biti najmanje :min znakova.',
        'array' => ':attribute mora biti najmanje :min stavki.',
    ],
    'not_in' => 'Format :attribute je nevažeći..',
    'not_regex' => 'Format :attribute je nevažeći..',
    'numeric' => ':attribute mora biti broj.',
    'password' => 'Lozinka je netačna.',
    'present' => 'Polje :attribute mora biti prisutan.',
    'regex' => 'Format :attribute je nevažeći.',
    'required' => 'Polje :attribute je obavezan',
    'required_if' => 'Polje :attribute potrebno je kada :other je :value.',
    'required_unless' => 'Polje :attribute je potrebno osim ako :other je u :values.',
    'required_with' => 'Polje :attribute potrebno je kada :values je prisutan.',
    'required_with_all' => 'Polje :attribute potrebno je kada :values su prisutni.',
    'required_without' => 'Polje :attribute potrebno je kadan :values nije prisutan.',
    'required_without_all' => 'Polje :attribute  je obavezno kada nije prisutna nijedna od :values.',
    'same' => ':attribute i :other moraju se podudarati..',
    'size' => [
        'numeric' => ':attribute mora biti :size.',
        'file' => ':attribute mora biti :size kilobajta.',
        'string' => ':attribute mora biti :size znakova.',
        'array' => ':attribute mora da sadrži :size stavki.',
    ],
    'starts_with' => ':attribute mora početi sa jednim od sledećih: :values.',
    'string' => ':attribute mora biti niz.',
    'timezone' => ':attribute mora biti važeća zona.',
    'unique' => ':attribute već je zauzet.',
    'uploaded' => ':attribute otpremanje nije uspelo.',
    'url' => 'Format :attribute je nevažeći..',
    'uuid' => ':attribute mora biti važeći UUID..',
];