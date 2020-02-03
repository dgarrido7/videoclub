<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\CatalogController;
	use App\movies;
	use Illuminate\Http\Request;
	use Notify;

    class CatalogController extends Controller
    //El controlador extén la classe base HomeController de Laravel
    {

		public function getShow($id)
			{
    			return view('catalog.show', array('arrayPeliculas'=>movies::findOrFail($id)));
			}

		public function getEdit($id)
			{
    			return view('catalog.edit', array('id'=>movies::findOrFail($id),'pelicula'=>movies::findOrFail($id)));
			}
		public function getIndex()
			{
    			return view('catalog.index',array('arrayPeliculas'=>movies::all()));
			}
		public function getCreate()
			{
    			return view('catalog.create');
			}

		public function postCreate(Request $request)
			{
				$p = new Movies;
				$p->title = $request->input('title');
				$p->year = $request->input('year');
				$p->director = $request->input('director');
				$p->poster = $request->input('img');
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


		public function deleteMovie($id)
			{

				$p = new Movies;
				$p = movies::findOrFail($id);
				$p->delete();

				Notify::success('Pelicula eliminada correctament');
    			return redirect('/catalog');
			}

    }
?>