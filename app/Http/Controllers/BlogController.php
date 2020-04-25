<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use App\Segmento;
use App\Posts;
use DB;
use Auth;

class BlogController extends Controller
{
	public function home(){

		$fundo_vaga    = DB::table('fundo_vaga_home')
		->inRandomOrder()
		->where('disponivel', 1)
		->first();

		$mais_visualizados =  Posts::take(3)->orderBy('visualizacoes', 'DESC')->get();
		$ultimo_post =  Posts::orderByDesc('id')->first();
		$ultimos_posts = Posts::where('slug','!=',$ultimo_post->slug)->take(7)->orderByDesc('posts.id')->skip(1)->take(3)->orderByDesc('id')->paginate(3);

		return view('blog.home-blog',compact('fundo_vaga','ultimos_posts','ultimo_post','mais_visualizados'));
	}





	public function post($slug){

		$fundo_vaga    = DB::table('fundo_vaga_home')
		->inRandomOrder()
		->where('disponivel', 1)
		->first();

		$post =  Posts::where('slug',$slug)->first();

		$visualizacoes = Posts::select('visualizacoes')->where('slug',$slug)->first();
		$visualizacoes_atualizada = $visualizacoes->visualizacoes + 1;



		Posts::where('slug',$slug)
		->update(['visualizacoes' => $visualizacoes_atualizada]);

		$ultimos_posts = DB::table('posts')
		->join('categories', 'posts.category_id', '=', 'categories.id')
		->select('posts.title','posts.image','posts.slug','categories.name')
		->where('posts.slug','!=',$slug)->take(7)->orderByDesc('posts.id')
		->get();

		return view('blog.post',compact('fundo_vaga','post','ultimos_posts'));

	}



	public function busca(Request  $request){

		$input = $request->input('s');


//dd($input);

		$posts = Posts::where('title','LIKE', '%'.$input.'%')
		->orWhere('body','LIKE', '%'.$input.'%')
		->orWhere('excerpt','LIKE', '%'.$input.'%')
		->paginate(5);

		$total = $posts->count();

		return view('blog.busca',compact('posts','total','input'));
	}


}
