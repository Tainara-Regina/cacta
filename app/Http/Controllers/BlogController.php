<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use App\Segmento;
use App\Posts;
use App\Categories;
use DB;
use Auth;

class BlogController extends Controller
{
	public function home(){

		$fundo_vaga    = DB::table('fundo_vaga_home')
		->inRandomOrder()
		->where('disponivel', 1)
		->first();

		$mais_visualizados =  Posts::take(3)
		->where('status','PUBLISHED')
		->orderBy('visualizacoes', 'DESC')->get();


		$ultimo_post =  Posts::orderByDesc('id')
		->where('status','PUBLISHED')
		->first();


		$ultimos_posts = Posts::where('slug','!=',$ultimo_post->slug)->take(7)
		->where('status','PUBLISHED')
		->orderByDesc('posts.id')->skip(1)->take(3)->orderByDesc('id')->paginate(3);




		return view('blog.home-blog',compact('fundo_vaga','ultimos_posts','ultimo_post','mais_visualizados'));
	}





	public function post($slug){


		$post =  Posts::where('slug',$slug)
		->where('status','PUBLISHED')
		->first();

		if(empty($post)){

			return redirect('/blog',301);
		}else{

			$fundo_vaga    = DB::table('fundo_vaga_home')
			->inRandomOrder()
			->where('disponivel', 1)
			->first();

			$visualizacoes = Posts::select('visualizacoes')
			->where('status','PUBLISHED')
			->where('slug',$slug)->first();
			$visualizacoes_atualizada = $visualizacoes->visualizacoes + 1;



			Posts::where('slug',$slug)
			->where('status','PUBLISHED')
			->update(['visualizacoes' => $visualizacoes_atualizada]);

			$ultimos_posts = DB::table('posts')
			->join('categories', 'posts.category_id', '=', 'categories.id')
			->select('posts.title','posts.image','posts.slug','categories.name')
			->where('posts.status','PUBLISHED')
			->where('posts.slug','!=',$slug)->take(7)->orderByDesc('posts.id')
			->get();

			return view('blog.post',compact('fundo_vaga','post','ultimos_posts'));

		}
	}



	public function busca(Request $request){

		$input = $request->input('s');


//dd($input);

		$posts = Posts::where('title','LIKE', '%'.$input.'%')
		->orWhere('body','LIKE', '%'.$input.'%')
		->orWhere('excerpt','LIKE', '%'.$input.'%')
		->where('status','PUBLISHED')
		->paginate(5);

		$total = $posts->count();

		return view('blog.busca',compact('posts','total','input'));
	}





	function categoria($slug){
		//dd($categoria);

		$title =  DB::table('posts')
		->join('categories', 'posts.category_id', '=', 'categories.id')
		->select('categories.name')
		->where('categories.slug',$slug)
		->where('posts.status','PUBLISHED')
		->first();

		if(empty($title)){
			return redirect('/blog',301);
		}




		$posts = DB::table('posts')
		->join('categories', 'posts.category_id', '=', 'categories.id')
		->select('posts.*','categories.slug')
		->where('categories.slug',$slug)
		->where('posts.status','PUBLISHED')
		->paginate(3);
		//dd($posts->all());

		return view('blog.categoria',compact('posts','title'));
	}

	function menu(){
		$categories = Categories::select('name','slug')
		->get();

		return $categories;
	}

}
