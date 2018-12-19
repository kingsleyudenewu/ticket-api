# Ticket
An API that helps you to connect tickets with their ticket type


<p>
  <blockquote style="color:red">
    **Please follow the steps below to view and generate voucher codes** 
  </blockquote>
</p>  
  
<div class="highlight">
<pre>
    - Clone project
    - Run composer install
    - Rename .env.example to .env
    - Create you database and set dname, username and password on the new .env file
    - Generate your laravel key
    - Run php artisan migrate
    - Run php artisan db:seed to generate dummy datas for both countries, states and cities
    - Start your vouche pool app by running php artisan serve 
    - To run your <b>TEST</b> go to your console and type ./vendor/bin/phpunit
</pre>
</div>