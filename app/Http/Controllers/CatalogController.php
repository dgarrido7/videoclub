<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\CatalogController;
    use Illuminate\Support\Facades\Auth;
	use App\movies;
	use App\Review;
	use Illuminate\Http\Request;
	use App\Fav;
	use App\Picture;
	use App\User;
	use App\Category;
	use Notify;

    class CatalogController extends Controller
    //El controlador extén la classe base HomeController de Laravel
    {

		public function getShow($id)
			{

    			return view('catalog.show', array('arrayPeliculas'=>movies::findOrFail($id),
    				'arrayReviews'=>$results=Review::where('movie_id', $id)->orderBy('created_at', 'desc')->take(3)->get())
    						);
			}

		public function getEdit($id)
			{
    			return view('catalog.edit', array('id'=>movies::findOrFail($id),'pelicula'=>movies::findOrFail($id),'categoria'=>Category::all()));
			}
		public function getIndex()
			{
    			return view('catalog.index',array('arrayPeliculas'=>movies::all()));
			}
		public function getCreate()
			{

    			return view('catalog.create',array('categoria'=>Category::all()));
			}

		public function postCreate(Request $request)
			{
				$p = new Movies;
				$p->title = $request->input('title');
				$p->year = $request->input('year');
				$p->director = $request->input('director');
				$p->poster = $request->input('img');
				$p->category_id=$request->input('category');
				$p->trailer=$request->input('trailer');
				$p->synopsis = $request->input('synopsis');
				$p->save();

				Notify::success('Pelicula creada correctament');

    			return redirect('/catalog');
			}

		public function putEdit(Request $request,$id)
			{


				$p = new Movies;
				$p = movies::findOrFail($id);
				$p->title = $request->input('title');
				$p->year = $request->input('year');
				$p->director = $request->input('director');
				$p->poster = $request->input('img');
				$p->category_id=$request->input('category');
				$p->trailer=$request->input('trailer');
				$p->synopsis = $request->input('synopsis');
				$p->save();

				Notify::success('Pelicula Modificada correctament');

    			return redirect('catalog/show/'.$id);
			}

		public function putRent($id)
			{


				$p = new Movies;
				$p = movies::findOrFail($id);
				$p->rented = true;
				$p->save();

				Notify::success('Pelicula alquilada correctament');
    			
    			return redirect('catalog/show/'.$id);

			}

		public function putReturn($id)
			{

				$p = new Movies;
				$p = movies::findOrFail($id);
				$p->rented = false;
				$p->save();

				Notify::success('Pelicula tornada correctament');
    			return redirect('catalog/show/'.$id);
			}

		public function putFav($id)
			{


				$p = new Fav;
				$p = Fav::where('user_id', Auth::id())->where('movies_id', $id)->first();

				if ($p!=null) {
					$p->delete();
					Notify::success('Pelicula quitada de Favoritos');
				}

				else{
				$p = new Fav;
				$p->user_id = Auth::id();
				$p->movies_id = $id;
				$p->save();
				Notify::success('Pelicula añadida a Favoritos');
				}



    			
    			return redirect('catalog/show/'.$id);

			}


		public function showFav()
			{

			$arrayPeliculas = Fav::with(['user','movies'])->where('user_id',Auth::id())->get();

    			return view('catalog.favs', compact('arrayPeliculas'));


			}

		public function showBest()
			{


			$arrayPeliculas = Review::with(['user','movies'])->groupBy( 'movie.id' )->get();

			dd($arrayPeliculas);
			die();
    			return view('catalog.best', compact('arrayPeliculas'));


			}


		public function deleteMovie($id)
			{

				$p = new Movies;
				$p = movies::findOrFail($id);
				$p->delete();

				Notify::success('Pelicula eliminada correctament');
    			return redirect('/catalog');
			}

			public function postReviewCreate(Request $request,$id){
				$r = new Review;
				$r->title = $request->input('title');
				$r->review = $request->input('review');
				$r->stars = $request->input('stars');
				$r->user_id = Auth::id();
				$r->movie_id = $id;
				$r->save();

				Notify::success('Comentari creat correctament');

    			return redirect('/catalog');
			}

			public function searchDash(Request $request){
			        $buscar = $request->input('buscar');

			        $arrayPeliculas = movies::where('title', 'LIKE', '%' . $buscar . '%')->get();
			        return view('catalog.index',compact('arrayPeliculas'));
			    }

    }
?>