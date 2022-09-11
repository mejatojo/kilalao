<h2 style="text-align: center;">
    NDAO ATAKALO
</h2>
<p>
    #tz_wcc2
</p>
<p>
    This project is build with Laravel, so after cloning this, you should
</p>
<ul>
    <li>run "composer install" to generate depedencies in vendor folder</li>
    <li>change ".env.example" to ".env"</li>
    <li>run "php artisan key:generate"</li>
    <li>Create database named "kilalao"</li>
    <li>configure .env by editing DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD</li><li>run "php artisan migrate" for creating table</li>
    <li>Finally, run "php artisan storage:link"</li>
</ul>
<p>Here are its features</p>
<ul>
    <li> /api/jouet with GET method will return all user with their toys</li>
    <li> /api/jouet with POST method will insert a row on the table 'jouets' and a row on the table 'users'  if only this user don't have any toy</li>
    <li> /api/desactive/{id} will desactive the toy</li>
</ul>
<p>To insert a new toy, there are the usefull keys needed in the body</p>
<ul>
    <li>"name" : name of the user</li>
    <li>"contact" : contact of the user</li>
    <li>"nom_jouet" : name of the toy</li>
    <li>"photo" : photo of the toy (file)</li>
    <li>"echange" : name of the toy needed for exchange</li>
</ul>
<p>
    #tz_wcc2
</p>