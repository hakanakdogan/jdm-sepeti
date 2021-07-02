# JDM NEDİR
Japon iç pazarı veya JDM, Japon üreticilerin araçları için ana pazarı ifade eder. JDM araçları, Japonya'daki kanuni düzenlemelere uymaları ve Japon müşterilerin ihtiyaçlarını karşılamaları için Japonya dışına aynı isimle pazarlanan araçlardan farklı özellikler içerebilir.

# JDM SEPETİ
JDM SEPETİ sadece Japon araç üreticileri tarafından üretilmiş araçların alışverişinin yapıldığı bir online araç pazarıdır.

## JDM SEPETİ'NE NASIL ULAŞIRIM?
JDM SEPETİNE bu linke tıklayarak ulaşabilirsiniz [JDM-SEPETİ](http://jdm-sepeti.eu5.org/)

## JDM SEPETİ'Nİ NASIL KULLANIRIM
JDM SEPETİ'ni kullanabilmek için öncelikle siteye kayıt olmalısınız. Kayıt olduktan sonra bilgilerinizle giriş yapabilir, siteye araç ekleyebilir, eklediğiniz araçları satışa koyup/kaldırabilir, başka araçlara teklif verebilir ya da araçlarınıza gelen teklifleri kabul/red edebilirsiniz.

## VERİTABANI
Veritabanında 5 adet tablo bulunmaktadır.
* users Tablosu: Bu tabloda kullanıcıların email, password ve name alanları tutulmaktadır. Kullanıcıların şifreleri güvenlik açıkları olmaması amacıyla hashlenerek kaydedilmektedir.
* car Tablosu: Bu tabloda brand, model, year, mileage, isforsale durumu ve image tutulmaktadır.
* car_owner Tablosu: Bu tabloda car_ID ve owner_ID tutulmaktadır. Bu alanlardan car_ID, car tablosunun foreign keyidir, owner_ID ise users tablosunun foreign keyidir.
* car_customer Tablosu: Bu tabloda car_ID ve customer_ID tutulmaktadır. Bu alanlardan car_ID, car tablosunun foreign keyidir, customer_ID ise users tablosunun foreign keyidir.
* buy_request Tablosu: Bu tabloda owner_ID, customer_ID, car_ID, pending, accepted, rejected, price alanları tutulmaktadır. Bu alanlardan owner_ID ve customer_ID users tablosunun foreign keyleriyken car_ID car tablosunun foreign keyidir.

![jdm-tablolar](https://user-images.githubusercontent.com/54938929/122386893-fb0dac80-cf76-11eb-931a-57af569386aa.png)
 

## JDM SEPETİ'NDEN GÖRÜNTÜLER
![index](https://user-images.githubusercontent.com/54938929/122376242-a5340700-cf6c-11eb-9650-469cfbaab758.png)
![JDM-login](https://user-images.githubusercontent.com/54938929/122376430-d1e81e80-cf6c-11eb-8ab6-4f0b916ddd04.png)
![JDM-register](https://user-images.githubusercontent.com/54938929/122376542-ea583900-cf6c-11eb-931b-dcb9d94ea90e.png)
![JDM-yayındakiaraclar](https://user-images.githubusercontent.com/54938929/122376581-f3490a80-cf6c-11eb-937b-2a1364f277ad.png)
![jdm-araclarim](https://user-images.githubusercontent.com/54938929/122376607-f7752800-cf6c-11eb-8f4b-7c11591765ae.png)
![jdm-gonderilenteklif](https://user-images.githubusercontent.com/54938929/122376621-fa701880-cf6c-11eb-8778-c2c938aef89f.png)
![gelen-teklifler](https://user-images.githubusercontent.com/54938929/122376624-fba14580-cf6c-11eb-97a1-dc05bd7561a0.png)

## Kullanılan Teknolojiler
   * HTML:  Web sayfasının iskeleti HTML diliyle yazılmıştır
   * CSS:  Siteyi stillendirmek için CSS kullanılmıştır
   * PHP:  Arkaplan ile bağlantı kurmak ve veri akışını sağlamak için PHP dili kullanılmıştır
   * PHPMyAdmin: Veritabanı oluşturmak ve tablolar arası ilişkileri tanımlamak için PHPMyAdmin kullanılmıştır.

## Projeyi Geliştirenler
 * Hakan AKDOĞAN
   * [LinkedIn](https://www.linkedin.com/in/hakan-akdogan/)

## Lisans
    MIT License
    Copyright (c) 2021 Hakan Akdoğan
