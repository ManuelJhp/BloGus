<?php

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
        Post::truncate();
        Category::truncate();
        Tag::truncate();

        $category = new Category();
        $category->name = "Actualidad";
        $category->save();
        $category = new Category();
        $category->name = "Software";
        $category->save();
        $category = new Category();
        $category->name = "Hardware";
        $category->save();
        $category = new Category();
        $category->name = "Herramientas";
        $category->save();
        $category = new Category();
        $category->name = "Eventos";
        $category->save();

        $tag = new Tag();
        $tag->name = "Lenovo";
        $tag->save();
        $tag = new Tag();
        $tag->name = "Asus";
        $tag->save();
        $tag = new Tag();
        $tag->name = "PHP";
        $tag->save();

        $post = new Post();
        $post->title = "Laravel 7";
        $post->url = str_slug("Laravel 7");
        $post->excerpt = "Laravel 7 fue lanzado el 3 de marzo del 2020 e
        incluye una serie de novedades muy interesantes";
        $post->body = "
        <p>Laravel 7 continues the improvements made in Laravel 6.x by introducing Laravel Sanctum,
        routing speed improvements, custom Eloquent casts, Blade component tags,
        fluent string operations, a developer focused HTTP client, first-party CORS support,
        improved scoping for route model binding, stub customization, database queue improvements,
        multiple mail drivers, query-time casts, a new artisan test command, and a variety of other
        bug fixes and usability improvements</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->created_at = Carbon::now()->subDays(4);
        $post->updated_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();
        $post->photos()->create(['url' => '/storage/posts/ZKFd93zDPWW80B4uoBiyfSFdujriRQnYVDsRLWem.png']);
        $post->tags()->attach(Tag::create(['name' => 'Laravel']));

        $post = new Post();
        $post->title = "Vue.js";
        $post->url = str_slug("Vue.js");
        $post->excerpt = "Por qué elegir VueJS: 5 razones para considerarlo nuestro próximo framework de referencia";
        $post->body = "
        <h1>Un framework para aprender y usar de manera progresiva</h1>
        <p>VueJS se autodenomina como un framework progresivo. Cuando encaramos un desarrollo con VueJS,
        podemos indicar qué partes del framework queremos incluir. VueJS está modularizado en diferentes
        librerías separadas que permiten ir añadiendo funcionalidad en el momento que las
        vayamos necesitando</p>
        <h1>Funcionalidades intuitivas, modernas y fáciles de usar</h1>
        <p>VueJS no ha reinventado la rueda. Nuestro amigo verde fue creado como proyecto personal
        por Evan You, antiguo desarrollador de Google, en un intento de simplificar el funcionamiento
        de AngularJS. El framework empezó a ser tan fácil y simple de usar que, una vez que su creador
        decidió subirlo a los repositorios de Github, la comunidad fue usándolo en cada vez más proyectos.

        Empresas como Xiaomi, Alibaba o Gitlab son algunos de sus grandes exponentes. Si miramos las
        estadísticas de las expectativas de uso en el año 2018 encontramos que muchas personas y empresas
        están interesadas en conocerlo y usarlo</p>
        ";
        $post->published_at = Carbon::now()->subDays(3);
        $post->created_at = Carbon::now()->subDays(3);
        $post->updated_at = Carbon::now()->subDays(3);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();
        $post->photos()->create(['url' => '/storage/posts/2BbBSn1fPxYUuX13hOF2LdEEdQ5wv4U9xWsddGCS.jpeg']);
        $post->tags()->attach(Tag::create(['name' => 'Vue']));

        $post = new Post();
        $post->title = "MSI";
        $post->url = str_slug("MSI");
        $post->excerpt = "MSI nos presenta sus últimas novedades";
        $post->body = "<p>Uno de los primeros puntos que nos destacó MSI es la reciente
        salida de la serie PS con cuatro modelos a destacar en la versión portátil: PS42, PS63, P65 y P75.
         Los tres primeros ya lo hemos analizado y podéis revisar nuestros reviews en la web.
         Mientras que el PS75 llega con un formato de 17 pulgadas, procesador de novena
         generación (i7 ó i9), tarjeta gráfica RTX, 16 GB de memoria RAM como partida y una unidad
         SSD en formato NVMe para ofrecernos la mejor experiencia tanto en el arranque como nuestras
         principales aplicaciones</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->created_at = Carbon::now()->subDays(2);
        $post->updated_at = Carbon::now()->subDays(2);
        $post->category_id = 2;
        $post->user_id = 2;
        $post->save();
        $post->photos()->create(['url' => '/storage/posts/9ipgLwrrbfoj7C8iyGsaeT40I6V9N55DejErjDS4.jpeg']);
        $post->tags()->attach(Tag::create(['name' => 'MSI']));

        $post = new Post();
        $post->title = "EMUI 10";
        $post->url = str_slug("EMUI 10");
        $post->excerpt = "EMUI10 permite una experiencia fluida y
        conectada para aprovechar los dispositivos en todos los escenarios.";
        $post->body = "<p>La Colaboración Multi-pantalla permite la conexión simultánea entre el ordenador portátil
        y tu smartphone, La esencia del diseño de animación EMUI10 es explorar y seguir las leyes de la naturaleza
        potenciando al máximo el componente intuitivo, Elimina todos los elementos triviales que dificultan
        la lectura y aplica grandes tipografías con líneas de cuadrícula para focalizar tu atención </p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->created_at = Carbon::now()->subDays(1);
        $post->updated_at = Carbon::now()->subDays(1);
        $post->category_id = 2;
        $post->user_id = 2;
        $post->save();
        $post->photos()->create(['url' => '/storage/posts/AjjiVPp708479vHN2QYcbtNZHXBC3IgiMVA5APN3.jpeg']);
        $post->tags()->attach(Tag::create(['name' => 'Huawei']));

        $post = new Post();
        $post->title = "Mobile World Congress";
        $post->url = str_slug("Mobile World Congress");
        $post->excerpt = "Mobile World Congress 2019: 5G, Internet de las cosas,
        lectores de huellas ultrasónicos e inteligencia artificial";
        $post->body = "
        <p>
        Vuelve la mayor cita mobile del año.
        Es cierto que hace unos años que el MWC ha dejado de ser ese gran espacio
        para los grandes lanzamientos, pero también lo es que ha ganado peso como foro en el
        que lanzar nuevas tecnologías y proposiciones de valor para toda la industria, como puede
        ser el desarrollo del 5G
        Entre los ponentes de este año destacan nombres como el de Eugene Kaspersky (CEO de Kaspersky),
        Rajeev Suri (CEO de Nokia), Steve Mollenkopf (CEO de Qualcomm), Jim Whitehurst (CEO de Red Hat),
        Pat Gelsinger (CEO de VMware) o José María Álvarez-Pallete (CEO de Telefónica)
        </p>
        <p>Barcelona, 24-27 febrero</p>
        <a href='https://www.mwcbarcelona.com'>www.mwcbarcelona.com</a>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->created_at = Carbon::now()->subDays(1);
        $post->updated_at = Carbon::now()->subDays(1);
        $post->category_id = 5;
        $post->user_id = 2;
        $post->save();
        $post->photos()->create(['url' => '/storage/posts/Mobile-World-Congress.jpeg']);
        $post->tags()->attach(Tag::create(['name' => 'Movil']));
    }
}
