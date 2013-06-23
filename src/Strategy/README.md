# Strategy Design Pattern
Strateji tasarım deseni, bir işlemin birden fazla yolla yapılması gerektiği durumlarda kullanılır. 

Örnek kod, bir elektronik ticaret sitesindeki kupon hesaplama işleminin strateji paterni ile nasıl 
gerçekleştiğini gösterir. 

## Örnek ile ilgili açıklama:
Gerçekleştirilecek işlem kupon hesabıdır. Ancak kupon, sabit bir tutara veya yüzde cinsinden 
oransal bir değere sahip olabilir. Dolayısıyla kupon hesabını iki farklı yoldan gerçekleştirebilme
ihtimalimiz var. Bu nedenle stratejiyi uygulayacak olan sınıf (Calculator.php), construction 
sırasında kuponun tipine göre hesaplayıcı sınıflardan birini seçerek hesaplama işleminin seçilen 
hesaplayıcı üzerinden gerçekleştirilmesini sağlar.

**example1.php:** Sabit tutarlı kupon kullanarak indirim hesabı gerçekleştirilmesi ile ilgili örnek içerir.

**example2.php:** Yüzde cinsinden orana sahip bir kupon kullanarak indirim hesabı gerçekleştirilmesi ile ilgili örnek içerir.
