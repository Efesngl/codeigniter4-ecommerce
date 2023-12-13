# php-ecommerce
## tr
php codeigniter ile e-ticaret sitesi
- Siteyi kullanmak için öncelikle bilgisayarınızda composer kurulu olması lazım.
- Sitenin klasörünü açıp ana dizinde cmd açmanız lazım. Cmd açtıktan sonra 'composer install --ignore-platform-reqs' komuut ile proje gereksinimlerini indiriyoruz.
- Bu işlemden sonra ana dizinde bulunan 'db.sql' adlı dosyayı mysql(veya tercihiniz olan bir veirtabanına) veritabanında içeri aktarmamız lazım. Sonrasında ise kendi veritabani ayarlarınıza göre 'app/Config/Database.php' dosyasını değiştirin.
- Bu işlemleri yaptıktan sonra ana dizinde tekrar cmd açıp 'php spark serve' komutunu çalıştırın. Projemiz 'http://localhost:8080' portundan çalışacaktır.
## en
php e-commerce app with codeigniter
- Firstly you need composer to installed on your computer. 
- In the root of the folder you need to install cmd and run that command 'composer install --ignore-platform-reqs' for install dependencies.
- After that you need to import 'db.sql' to mysql or your choices of database. After you import that you need to configure 'app/Config/Database.php' file based on your database settings.
- After these steps open cmd in the root of the folder and run 'php spark serve' command for run the project.
