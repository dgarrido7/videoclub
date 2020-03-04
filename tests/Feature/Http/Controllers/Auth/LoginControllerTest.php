<?php

namespace Tests\Feature\Http\Controllers\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Tests\TestCase;
use App\User;

class LoginControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function testLoginPostOk(){
        
        $response = $this->post(route('login'), ['email' => 'dylanhurtos@gmail.com','password'=>'Admin1234']);

        $response->assertStatus(302);
        $response->assertRedirect('/catalog');
    }

    /** @test */
    public function testbadLogin()
    {
        $response = $this->post(route('login'), []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function testgetcategory()
    {
        $this->withoutMiddleware();
        $response = $this->get('/catalog');

        $response->assertStatus(200);
        $response->assertViewIs('catalog.index');
    }

    /** @test */
    public function testgetshowpeli1()
    {
        $this->withoutMiddleware();
        $response = $this->get('/catalog/show/1');

        $response->assertStatus(200);
        $response->assertViewIs('catalog.show');
    }

    /** @test */
    public function testPutCommentBuit(){
        $user = User::find(1);

        $this->actingAs($user);
    $response = $this->post('/review/create/1',[
        'title' => '',
        'review' => '',
        'stars' => '',
    ]);

    $this->assertDatabaseHas('reviews',[
        'title' => NULL,
    ]);
    }



        /** @test */
        public function testPutComment(){
           $user = User::find(1);

           $this->actingAs($user);
    
        $response = $this->post('/review/create/1',[
            "title"=> "hola3",
            "review"=> "CACA",
            "stars"=> 1,
            "movie_id"=> 1
        ]);
    
        $this->assertDatabaseHas('reviews',[
            'title' => 'hola3'
          ]);
        }

        
            /** @test */
            public function editar_peli(){
        
                $user = User::find(1);
        
                $this->actingAs($user);
        
                $response = $this->put('/catalog/edit/1',[
                  'title' => 'El pepino',
                  'year' => '1999',
                  'director' => 'Dylan',
                  'img' => 'https://m.media-amazon.com/images/M/MV5BMjEyMjcyNDI4MF5BMl5BanBnXkFtZTcwMDA5Mzg3OA@@._V1_SX214_AL_.jpg',
                  'synopsis' => "Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de 'Il consigliere' Tom Hagen (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.",
                  'category' => 2,
                  'trailer' => 'https://m.media-amazon.com/images/M/MV5BMjEyMjcyNDI4MF5BMl5BanBnXkFtZTcwMDA5Mzg3OA@@._V1_SX214_AL_.jpg',
                ]);
        
                $this->assertDatabaseHas('movies',[
                    'title' => 'El Pepino'
                  ]);
        
                }

            /** @test */
        public function crear_pelibuida(){
        
        $user = User::find(1);

        $this->actingAs($user);

        $response = $this->post('/catalog/create',[
          'title' => '',
          'year' => '',
          'director' => '',
          'img' => '',
          'synopsis' => '',
          'category' => 1,
          'trailer' => '',
        ]);

        $this->assertDatabaseHas('movies',[
            'title' => NULL
          ]);

        }

            /** @test */
            public function crear_peli(){
        

            $this->withoutMiddleware();


        $response = $this->json('POST','/api/v1/catalog', [
                'title' => 'Dylan',
                'year' => '1999',
                'director' => 'MANOLO',
                'img' => 'https://m.media-amazon.com/images/M/MV5BZTJjMjNlZTItMWI2Mi00Zjk0LWJlYTgtYzZiMGM3NjA4MzU2XkEyXkFqcGdeQXVyNzA4ODc3ODU@._V1_UY1200_CR165,0,630,1200_AL_.jpg',
                'trailer' => 'http://www.youtube.com',
                'synopsis' => 'La vida de Dylan',
                'category_id' => 4
              ]);

          $this->assertDatabaseHas('movies',[
              'title' => 'Dylan'
            ]);
      }


        /** @test */
    public function AlternarAlquilar(){
        $this->withoutMiddleware();

        //DEVOLVER PELI
        $response = $this->json('PUT','api/v1/catalog/1/return');
        $response->assertStatus(200);

        //ALQUILAR PELI
        $response = $this->json('PUT','api/v1/catalog/1/rent');
        $response->assertStatus(200);


  
      }
  
      


        

}
