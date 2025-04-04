# PHP CLI imajını temel alıyoruz
FROM php:8.1-cli

# Çalışma dizinini ayarlıyoruz
WORKDIR /var/www/html

# Uygulama dosyalarını konteynıra kopyalıyoruz (router.php, index.php, service.php vb.)
COPY . .

# PHP yerleşik sunucusunun kullanacağı portu açıyoruz
EXPOSE 8000

# PHP yerleşik sunucusunu, router script ile başlatıyoruz
CMD ["php", "-S", "0.0.0.0:8000", "router.php"]
