<div align="center">
    
  <p>
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white">
    <img src="https://img.shields.io/badge/Docker-2CA5E0?style=for-the-badge&logo=docker&logoColor=white">
    <img src="https://img.shields.io/badge/Nginx-009639?style=for-the-badge&logo=nginx&logoColor=white">
    <img src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white">
  </p>
</div><br>

<section id="test-db" style="padding: 10px;">
<h2>Running and testing our project.</h2>
<p>With all set up let's bring our environment to life.</p>
<p>In <code>/environmentProject/</code> directory, build all images with:</p>
<pre>
docker-compose build
</pre>
<p>When its over, let's run all containers with:</p>
<pre>
docker-composer up -d
</pre>
<p>Get in your <a href="https://localhost">localhost</a> and voilá!</p>
<p>With all running, you can test your MySql connection navigating to <a href="http://localhost/index.php">localhost/index.php</a>. If all is okay you will receive a successfully message.</p>
<p>For laravel test, you will need to edit <code>/example-app/.env</code> and set your connection with mysql. Example:</p>
<pre>
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=test_db
DB_USERNAME=devuser
DB_PASSWORD=devpass
</pre>
<p>Save and exec follow commands:</p>
<pre>
docker exec (container_id) composer dump-autoload
docker exec (container_id) php artisan migrate
</pre>
<p>If you don't receive any error message your connection is fine and you are ready to codding.</p>
</section>


