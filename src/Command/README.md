# Strategy Design Pattern
Command tasarım deseni belirli işlevlerin nesneye dönüştürülerek sarmalanıp başka bir nesne tarafından çağırılması
gerektiği durumlarda kullanılır.

Örnek kod bir elektronik ticaret sitesindeki alışveriş sepetinin command paterni kullanılarak hesaplanmasını 
gösterir.

## Örnek ile ilgili açıklama:
Örnek kod sabir tuarlı bir indirime ve belirli bir orandaki KDV ye sahip yeni bir sipariş oluşturur. Command patternine
göre kodlanan hesaplayıcı ise siparişin indirim tutarını, kdv tutarını ve son olarak bu verilerle birlikte genel toplamı
hesaplar ve hesaplanan sipariş objesini döner.
