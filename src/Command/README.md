# Strategy Design Pattern
Command tasarım deseni belirli işlevlerin nesneye dönüştürülerek sarmalanıp başka bir nesne tarafından çağırılması
gerektiği durumlarda kullanılır.

Örnek kod bir elektronik ticaret sitesindeki alışveriş sepetinin command paterni kullanılarak hesaplanmasını 
gösterir.

## Örnek ile ilgili açıklama:
Örnek kod, belirli bir net toplam, indirim kuponu ve  kdv oranına sahip yeni bir sipariş oluşturarak invoker
(Cart\Calculator sınıfı) tarafından çağırılan komutlarla siparişe ait indirim, kdv ve genel toplam tutarlarını 
hesaplar.
