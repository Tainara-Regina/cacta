<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use App\CadastrarVaga;
use App\DadosContratante;
use DB;


class AdminContratanteControllerAjax extends Controller
{
	public function vagasInicio(Request $request){

		$area = array();
		$regime = array();
		$local = null;

		if($request->area){
			$area =  $request->area;
		}

		if($request->regime){
			$regime =  $request->regime;
		}

		if($request->local && $request->local != null){
			$local =  $request->local;
		}

		$vaga = DB::table('cadastrar_vaga')
		->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
		->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
		->select('cadastrar_vaga.contratacao',
			'cadastrar_vaga.vaga_em_destaque','cadastrar_vaga.id','cadastrar_vaga.data_de_criacao',
			'titulo_vaga.titulo','titulo_vaga.slug','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade')
		->where('titulo_vaga.titulo','LIKE', '%'.$request->buscar.'%')
		//->where('cacta_users.nome_empresa','LIKE', '%'.$request->buscar.'%')

		->where(function($query) use ($area)  {
			if(!empty($area)) {
				$query->whereIn('titulo_vaga.id_segmento',$area);
			}

		})
		->where(function($query) use ($regime)  {
			if(!empty($regime)) {
				$query->whereIn('cadastrar_vaga.contratacao',$regime);
			}

		})

		->where(function($query) use ($local)  {
			if(!is_null($local)) {
				$query->orWhere('cacta_users.localidade','LIKE','%'.$local.'%')
				->orWhere('cacta_users.logradouro','LIKE','%'.$local.'%')
				->orWhere('cacta_users.bairro','LIKE','%'.$local.'%')
				->orWhere('cacta_users.uf','LIKE','%'.$local.'%');
			}
		})

		
		->where('cacta_users.cadastro_ativo',1)
		->where('cadastrar_vaga.disponivel',1)
		->orderBy('cadastrar_vaga.vaga_em_destaque', 'desc')
		->limit(4)
		->get();





		$total = DB::table('cadastrar_vaga')
		->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
		->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
		->select('cadastrar_vaga.contratacao',
			'cadastrar_vaga.vaga_em_destaque','cadastrar_vaga.id','cadastrar_vaga.data_de_criacao',
			'titulo_vaga.titulo','titulo_vaga.slug','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade')

		->where(function($query) use ($area)  {
			if(!empty($area)) {
				$query->whereIn('titulo_vaga.id_segmento',$area);
			}

		})
		->where(function($query) use ($regime)  {
			if(!empty($regime)) {
				$query->whereIn('cadastrar_vaga.contratacao',$regime);
			}

		})

		->where(function($query) use ($local)  {
			if(!is_null($local)) {
				$query->orWhere('cacta_users.localidade','LIKE','%'.$local.'%')
				->orWhere('cacta_users.logradouro','LIKE','%'.$local.'%')
				->orWhere('cacta_users.bairro','LIKE','%'.$local.'%')
				->orWhere('cacta_users.uf','LIKE','%'.$local.'%');
			}
		})

		->where('titulo_vaga.titulo','LIKE', '%'.$request->buscar.'%')
		//->where('cacta_users.nome_empresa','LIKE', '%'.$request->buscar.'%')
		->where('cacta_users.cadastro_ativo',1)
		->where('cadastrar_vaga.disponivel',1)
		->orderBy('cadastrar_vaga.vaga_em_destaque', 'desc')
		->count();

		return array($vaga,$total);
	}



	public function vagas(Request $request){
		if($request->skip){
		//	dd("tai");
			$skip = $request->skip;
		}else{
			$skip = 0;
		}

		$area = array();
		$regime = array();
		$local = null;

		if($request->area){
			$area =  $request->area;
		}

		if($request->regime){
			$regime =  $request->regime;
		}

		if($request->local && $request->local != null){
			$local =  $request->local;
		}

		$vaga = DB::table('cadastrar_vaga')
		->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
		->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
		->select('cadastrar_vaga.contratacao',
			'cadastrar_vaga.vaga_em_destaque','cadastrar_vaga.id','cadastrar_vaga.data_de_criacao',
			'titulo_vaga.titulo','titulo_vaga.slug','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade')

		->where(function($query) use ($area)  {
			if(!empty($area)) {
				$query->whereIn('titulo_vaga.id_segmento',$area);
			}

		})
		->where(function($query) use ($regime)  {
			if(!empty($regime)) {
				$query->whereIn('cadastrar_vaga.contratacao',$regime);
			}

		})

		->where(function($query) use ($local)  {
			if(!is_null($local)) {
				$query->orWhere('cacta_users.localidade','LIKE','%'.$local.'%')
				->orWhere('cacta_users.logradouro','LIKE','%'.$local.'%')
				->orWhere('cacta_users.bairro','LIKE','%'.$local.'%')
				->orWhere('cacta_users.uf','LIKE','%'.$local.'%');
			}
		})

		->where('titulo_vaga.titulo','LIKE', '%'.$request->buscar.'%')
		
		->where('cacta_users.cadastro_ativo',1)
		->where('cadastrar_vaga.disponivel',1)
		->orderBy('cadastrar_vaga.vaga_em_destaque', 'desc')
		->skip($skip)->take(4)
		->get();


		// $data = DB::table('cadastrar_vaga')
		// ->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
		// ->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
		// ->select('cadastrar_vaga.contratacao',
		// 	'cadastrar_vaga.vaga_em_destaque','cadastrar_vaga.id','cadastrar_vaga.data_de_criacao',
		// 	'titulo_vaga.titulo','titulo_vaga.slug','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade')
		// ->where('titulo_vaga.titulo','LIKE', '%'.$request->buscar.'%')
		// ->where('cadastrar_vaga.disponivel',1)
		// ->orderBy('cadastrar_vaga.vaga_em_destaque', 'desc')
		// ->orderBy('cadastrar_vaga.id', 'desc')
		// ->skip($skip)->take(4)
		// ->get();

		$output = '';

		$output .='<div class="row">
		<div class="col">
		<div class="w-100 sticky-top publicidade-aqui">
		
		</div>
		</div>
		</div>'; 





		if(!$vaga->isEmpty())
		{

			foreach ($vaga as $row) 
			{

				if ($row->vaga_em_destaque == "on") {
					$destaque = '<p class="vaga-destaque">Destaque</p>';
				}else{
					$destaque = '<p>Divulgada em '.\Carbon\Carbon::parse($row->data_de_criacao)->format('d/m/Y').'</p>';
				}


				$output .='
				<a href="/vaga/'.$row->id.'/'.$row->slug.'">
				<div class="row text-center py-3" style="border-bottom: 1px solid #bdbdbd">
				<div class="col d-none d-sm-block"><img width="125px" src="storage/'.$row->logo.'">  
				</div>

				<div class="col">
				<p><b>'.$row->titulo.'</b></p>
				<p>'.$row->nome_empresa.'</p>  
				</div>

				<div class="col">
				<p><b>'.$row->contratacao.'</b></p>
				<p>'.$row->localidade.'</p> 
				</div>

				<div class="col mt-4">
				<p class="vaga-destaque">'.$destaque.'</p>
				</div>
				</div>
				</a>

				';
				$last_id = $row->id;

// <p> Divulgada em {{ Carbon\Carbon::parse($vaga->data_de_criacao)->format('d/m/Y')}}</p>

			}

			$skip = $skip + 4;
			$output .='
			<div id="load_more">
			<button type = "button" name="load_more_button"
			class="btn my-3 cadastre animated rubberBand btn-cadastre-se form-control" data-id="'.$skip.'" id="load_more_button">Mostrar mais vagas</button>
			</div>
			';


		}else{

			$output .='
			<div id="load_more">
			<button type = "button" name="load_more_button"
			class="btn my-3 cadastre btn-cadastre-se form-control">Não há mais vagas</button>
			</div>
			';
		}
		echo $output;



		$total = DB::table('cadastrar_vaga')
		->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
		->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
		->select('cadastrar_vaga.contratacao',
			'cadastrar_vaga.vaga_em_destaque','cadastrar_vaga.id','cadastrar_vaga.data_de_criacao',
			'titulo_vaga.titulo','titulo_vaga.slug','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade')

		->where(function($query) use ($area)  {
			if(!empty($area)) {
				$query->whereIn('titulo_vaga.id_segmento',$area);
			}

		})
		->where(function($query) use ($regime)  {
			if(!empty($regime)) {
				$query->whereIn('cadastrar_vaga.contratacao',$regime);
			}

		})

		->where(function($query) use ($local)  {
			if(!is_null($local)) {
				$query->orWhere('cacta_users.localidade','LIKE','%'.$local.'%')
				->orWhere('cacta_users.logradouro','LIKE','%'.$local.'%')
				->orWhere('cacta_users.bairro','LIKE','%'.$local.'%')
				->orWhere('cacta_users.uf','LIKE','%'.$local.'%');
			}
		})

		->where('titulo_vaga.titulo','LIKE', '%'.$request->buscar.'%')
		->where('cacta_users.cadastro_ativo',1)
		->where('cadastrar_vaga.disponivel',1)
		->orderBy('cadastrar_vaga.vaga_em_destaque', 'desc')
		->count();




		return "<input type='hidden' id='total_value' value='". $total."'>";

	}






	public function vagas_desativado(Request $request){
		if($request->ajax())
		{

			if ($request->id > 0)
			{
				$data = DB::table('cadastrar_vaga')
				->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
				->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
				->select('cadastrar_vaga.contratacao',
					'cadastrar_vaga.vaga_em_destaque','cadastrar_vaga.id','cadastrar_vaga.data_de_criacao',
					'titulo_vaga.titulo','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade')
				->where('titulo_vaga.titulo','LIKE', '%'.$request->buscar.'%')
				->where('cadastrar_vaga.id','<', $request->id)
				->where('cadastrar_vaga.disponivel',1)
				->orderBy('cadastrar_vaga.id', 'desc')
				->orderBy('cadastrar_vaga.vaga_em_destaque', 'desc')
				->limit(3)
				->get();
			}else{
				$data = DB::table('cadastrar_vaga')
				->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
				->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
				->select('cadastrar_vaga.contratacao',
					'cadastrar_vaga.vaga_em_destaque','cadastrar_vaga.id','cadastrar_vaga.data_de_criacao',
					'titulo_vaga.titulo','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade')
				->where('titulo_vaga.titulo','LIKE', '%'.$request->buscar.'%')
				->where('cadastrar_vaga.disponivel',1)
				->orderBy('cadastrar_vaga.id', 'desc')
				->orderBy('cadastrar_vaga.vaga_em_destaque', 'desc')
				->limit(3)
				->get();

			}
			$output = '';
			$last_id ='';
			if(!$data->isEmpty())
			{

				$output .='<div class="row">
				<div class="col">
				<div class="w-100 sticky-top publicidade-aqui">
				
				</div>
				</div>
				</div>'; 


				foreach ($data as $row) 
				{

					if ($row->vaga_em_destaque == "on") {
						$destaque = '<p class="vaga-destaque">Destaque</p>';
					}else{
						$destaque = '<p>Divulgada em '.\Carbon\Carbon::parse($row->data_de_criacao)->format('d/m/Y').'</p>';
					}


					$output .='
					<a href="/vaga/'.$row->id.'">
					<div class="row text-center py-3" style="border-bottom: 1px solid #bdbdbd">
					<div class="col d-none d-sm-block"><img width="125px" src="storage/'.$row->logo.'">  
					</div>

					<div class="col">
					<p><b>'.$row->titulo.'</b></p>
					<p>'.$row->nome_empresa.'</p>  
					</div>

					<div class="col">
					<p><b>'.$row->contratacao.'</b></p>
					<p>'.$row->localidade.'</p> 
					</div>

					<div class="col mt-4">
					<p class="vaga-destaque">'.$destaque.'</p>
					</div>
					</div>
					</a>

					';
					$last_id = $row->id;

// <p> Divulgada em {{ Carbon\Carbon::parse($vaga->data_de_criacao)->format('d/m/Y')}}</p>

				}


				$output .='
				<div id="load_more">
				<button type = "button" name="load_more_button"
				class="btn my-3 cadastre animated rubberBand btn-cadastre-se form-control" data-id="'.$last_id.'" id="load_more_button">Mostrar mais vagas</button>
				</div>
				';

			}else{
				$output .='
				<div id="load_more">
				<button type = "button" name="load_more_button"
				class="btn my-3 cadastre btn-cadastre-se form-control">Não há mais vagas</button>
				</div>
				';
			}
			echo $output;
		}
	}






	// public function vagas(Request $request){
	// 	$vaga = DB::table('cadastrar_vaga')
	// 	->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
	// 	->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
	// 	->select('cadastrar_vaga.contratacao',
	// 		'cadastrar_vaga.vaga_em_destaque','cadastrar_vaga.id','cadastrar_vaga.data_de_criacao',
	// 		'titulo_vaga.titulo','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade')
	// 	->where('titulo_vaga.titulo','LIKE', '%'.$request->buscar.'%')
	// 	->orderBy('cadastrar_vaga.vaga_em_destaque', 'desc')
	// 	->skip(2)->take(3)
	// 	->get();

	// 	return $vaga;
	// }

}






