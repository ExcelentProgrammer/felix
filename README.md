# Felix its

admin panel

- email: admin@gmail.com
- password: root
- url: /admin/login

## Qo'shimcha

- Test yozilgan
- Admin panel Filamentphp ishlatilgan<br>
- Resourcelardan Foydalanilgan<br>
- Form Request va Custom rule foydalanilgan<br>
- qo'shimcha imkoniyat faqat Ko'ylak va shim emas hohlagancha maxsulot qo'shsa bo'ladi

## Post paramsdagi code va count
- code: maxsulot codi
- count: nechta maxsulot kerak ekanligi 

## Eslatma !!!
- Composer install qilinganda xatolik bo'lishi mumkun filamentphp ishlashi uchun php intl extension yoqilgan bo'lishi kerak

## Foydalanish
```php
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://127.0.0.1:8000/api/info',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('products' => '[
    {
        "code": 1,
        "count": 30
    },
    {
        "code": 2,
        "count": 20
    },
    
]'),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
  
        
```
