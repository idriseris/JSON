# JSON
Json dosyası üzerinde kolay işlem yapılmasını sağlayan PHP sınıfıdır.
<br /><br />
## Örnek
### php
```
<?php
// Dosya ekleniyor.
include("lib/class.json.php");

// Sınıf çağırılırken kaynak veriliyor.
// Eğer dosya yoksa oluşacaktır!..
$json = new Json("data.json");

// Dosyaya yeni parametreler ekleniyor.
// Eğer parametre mevcutsa güncellenecektir!..
$json->add("lab1","Value 1");
$json->add("lab2","Value 2");
$json->add("lab3","Value 3");

// Tüm dosya çağrılır.
print_r($json->get());

// Tek paramerte çağrılır.
echo "Sadece bir dosya : ".$json->get()->lab2;

// Bir parametre siler.
$json->del("lab1");

// Dosyayı kople siler.
$json->remove();
?>
```
