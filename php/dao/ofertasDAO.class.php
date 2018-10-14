<?php

include_once '/home/futebolnamidia/www/chignall/dao/demandasDAO.class.php';
include_once '/home/futebolnamidia/www/chignall/dao/profissionaisDAO.class.php';
include_once '/home/futebolnamidia/www/chignall/dao/paisesDAO.class.php';
include_once '/home/futebolnamidia/www/chignall/dao/cargoDAO.class.php';
include_once '/home/futebolnamidia/www/chignall/modelo/ofertas.class.php';





class OfertasDAO{

	private $conexao = null;
		
	public function __construct(){
		/* Buscando uma instancia de banco na classe
		   ConexaoBanco.class.php */
	 $this->conexao = Conexao::getInstancia();   
	}//fecha construtor
	
	
	 
	
	public function cadastrarOfertas($o){
		try{                  
                
            $stat = $this->conexao->prepare("insert into ofertas
			values(null,?,?,?,?)");
	
            $stat->bindValue(1,$o->iddemandas);
			$stat->bindValue(2,$o->idprofissionais);
            $stat->bindValue(3,$o->data_oferta);
			$stat->bindValue(4,$o->status_oferta);
					
			
		 	$stat->execute();
			
		 
		 	//encerrando conexão com o banco
		 	$this->conexao=null;
		 
		}catch(PDOException $e){
		   echo 'erro ao cadastrar oferta da demanda';
		}//fecha catch
	}//fecha método
	
	
	
	public function buscarOfer(){
		try{
			$stat = $this->conexao->query("select * from ofertas");
			
			$array = array();
		 	$array = $stat->fetchAll(PDO::FETCH_CLASS,'ofertas');
	
			$this->conexao = null;
			return $array;
			
		}catch(PDOException $e){
			echo 'erro ao buscar ofertas';
		}
	}//fecha método buscar Cargos
	
	
	
	public function buscarTodasOfertas(){
		
		try{
		function montaObjTO($idofertas,
                                    $id_demandas,
									$id_profissionais,
									$data_oferta,
									$status_oferta,
									$iddemandas,
									$idTipo_Demanda,
                                    $idPaisD,
									$idClubeD,
                                    $idCargoD,
									$caracteristicas,
                                    $moeda_sal,
                                    $salario,
									$periodo,
									$tempo_contrato,
									$bonus,
                                    $perfil,
                                    $campeonato_disp_clube,
                                    $livre_mercado,
									$moeda_emp,
                                    $custo_emprestimo,
									$moeda_compra,
                                    $percent_opcao_compra,
									$por_compra,
									$moeda_venda,
                                    $percent_venda,
									$por_venda,
									$idProfissionaisD,
                                    $comissionamento,
                                    $pessoas_envolvidas,
                                    $observacaoD,
                                    $data_indicacaoD,
                                    $statusD,
                                    $data_cadastroD,
                                    $data_ultima_atualizacaoD,
									$idprofissionais,
                                    $origem,
									$idCargo,
                                    $idCargo2,
                                    $nome_profissional,
                                    $data_nascimento,
                                    $idNacionalidadeP,
									$idNacionalidade2P,
                                    $link,
                                    $link_2,
                                    $link_3,
                                    $observacao,
                                    $status,
                                    $video,
                                    $video_2,
                                    $video_3,
                                    $idIndicacaoP,
                                    $data_indicacao,
                                    $meio_indicacao,
									$whatsapp,
									$email,
									$caminho_curriculo,
									$idAvaliacao,
                                    $data_cadastro,
                                    $data_ultima_atualizacao,
									$idpais,
                                    $pais,
                                    $sigla_pais,
									$idclube,
                                    $clube,
                                    $diretor,
									$idPais,
									$idEstadoBrasil,
									$data_cadastro_clube,
									$data_ultima_atualizacao_clube,
									$idcargo,
                                    $cargo,
                                    $ingles
									
                                ){
									
								$o = new ofertas();
								$o->idofertas = $idofertas;
								$o->id_demandas = $id_demandas;
								$o->id_profissionais = $id_profissionais;
                                $o->data_oferta = $data_oferta;
								$o->status_oferta = $status_oferta;
								
								
								$d = new Demandas();
								$d->iddemandas = $iddemandas;
								$d->idTipo_Demanda = $idTipo_Demanda;
								$d->idPaisD = $idPaisD;
								$d->idClubeD = $idClubeD;
								$d->idCargoD = $idCargoD;
								$d->caracteristicas = $caracteristicas;
								$d->moeda_sal = $moeda_sal;	
                                $d->salario = $salario;
								$d->periodo = $periodo;
								$d->tempo_contrato = $tempo_contrato;
								$d->bonus = $bonus;
                                $d->perfil = $perfil;
                                $d->campeonato_disp_clube = $campeonato_disp_clube;
                                $d->livre_mercado = $livre_mercado;
								$d->moeda_emp = $moeda_emp;
                                $d->custo_emprestimo = $custo_emprestimo;
								$d->moeda_compra = $moeda_compra;
                                $d->percent_opcao_compra = $percent_opcao_compra;
								$d->por_compra = $por_compra;
								$d->moeda_venda = $moeda_venda;
                                $d->percent_venda = $percent_venda;
								$d->por_venda = $por_venda;
								$d->idProfissionaisD = $idProfissionaisD;
                                $d->comissionamento = $comissionamento;
                                $d->pessoas_envolvidas = $pessoas_envolvidas;
                                $d->observacaoD = $observacaoD;
                                $d->data_indicacaoD = $data_indicacaoD;	
								$d->statusD = $statusD;
                                $d->data_cadastroD = $data_cadastroD;
                                $d->data_ultima_atualizacaoD = $data_ultima_atualizacaoD;
								
								
								$p = new profissionais();
								$p->idprofissionais = $idprofissionais;
                                $p->origem = $origem;
								$p->idCargo = $idCargo;
								$p->idCargo2 = $idCargo2;
                                $p->nome_profissional = $nome_profissional;	
                                $p->data_nascimento = $data_nascimento;
                                $p->idNacionalidadeP = $idNacionalidadeP;
								$p->idNacionalidade2P = $idNacionalidade2P;
                                $p->link = $link;
                                $p->link_2 = $link_2;
                                $p->link_3 = $link_3;
                                $p->observacao = $observacao;
                                $p->status = $status;
                                $p->video = $video;
                                $p->video_2 = $video_2;
                                $p->video_3 = $video_3;
                                $p->idIndicacaoP = $idIndicacaoP;
                                $p->data_indicacao = $data_indicacao;	
                                $p->meio_indicacao = $meio_indicacao;
								$p->whatsapp = $whatsapp;
								$p->email = $email;
								$p->caminho_curriculo = $caminho_curriculo;
								$p->idAvaliacao = $idAvaliacao;
                                $p->data_cadastro = $data_cadastro;
                                $p->data_ultima_atualizacao = $data_ultima_atualizacao;
								
								$ps = new paises();
								$ps->idpais = $idpais;
								$ps->pais = $pais;
								$ps->pais_ingles = $pais_ingles;
								
								
								$cb = new clubes();
								$cb->idclube = $idclube;
								$cb->clube = $clube;
								$cb->diretor = $diretor;
								$cb->idPais = $idPais;
								$cb->idEstadoBrasil = $idEstadoBrasil;
								$cb->data_cadastro_clube = $data_cadastro_clube;
								$cb->data_ultima_atualizacao_clube = $data_ultima_atualizacao_clube;
								
								$carg = new cargos();
								$carg->idcargo = $idcargo;
								$carg->cargo = $cargo;
								$carg->ingles = $ingles;
								
								
								$o->demandas = $d;
								$o->profissionais = $p;
								$o->paises = $ps;
								$o->clubes = $cb;
								$o->cargos = $carg;
								return $o;	
				
                     
                                
								}
								
								$stat = $this->conexao->prepare("select * 
								from ofertas as o, demandas as d, profissionais as p, paises as ps, clubes as cb, cargos as carg
								where o.id_demandas = d.iddemandas
								and o.id_profissionais = p.idprofissionais
								and d.idPaisD = ps.idpais
								and d.idClubeD = cb.idclube
								and d.idCargoD = carg.idcargo
								order by data_oferta desc
								");
								
							

								$array = $stat->fetchAll(PDO::FETCH_FUNC, 'montaObjTO');
								
								$this->conexao = null;
								return $array;
								
            }catch(PDOException $e){
				echo 'Erro ao buscar ofertas';
            }//Fecha Catch
	}//Fecha buscarofertas
	
	
	
	
	
	
	
	
	
	
	
	
	public function buscarOfertas($id){
		
		try{
		function montaObjO($idofertas,
                                    $id_demandas,
									$id_profissionais,
									$data_oferta,
									$status_oferta,
									$iddemandas,
									$idTipo_Demanda,
                                    $idPaisD,
									$idClubeD,
                                    $idCargoD,
									$caracteristicas,
                                    $moeda_sal,
                                    $salario,
									$periodo,
									$tempo_contrato,
									$bonus,
                                    $perfil,
                                    $campeonato_disp_clube,
                                    $livre_mercado,
									$moeda_emp,
                                    $custo_emprestimo,
									$moeda_compra,
                                    $percent_opcao_compra,
									$por_compra,
									$moeda_venda,
                                    $percent_venda,
									$por_venda,
									$idProfissionaisD,
                                    $comissionamento,
                                    $pessoas_envolvidas,
                                    $observacaoD,
                                    $data_indicacaoD,
                                    $statusD,
                                    $data_cadastroD,
                                    $data_ultima_atualizacaoD,
									$idprofissionais,
                                    $origem,
									$idCargo,
                                    $idCargo2,
                                    $nome_profissional,
                                    $data_nascimento,
                                    $idNacionalidadeP,
									$idNacionalidade2P,
                                    $link,
                                    $link_2,
                                    $link_3,
                                    $observacao,
                                    $status,
                                    $video,
                                    $video_2,
                                    $video_3,
                                    $idIndicacaoP,
                                    $data_indicacao,
                                    $meio_indicacao,
									$whatsapp,
									$email,
									$caminho_curriculo,
									$idAvaliacao,
                                    $data_cadastro,
                                    $data_ultima_atualizacao,
									$idpais,
                                    $pais,
                                    $sigla_pais,
									$idclube,
                                    $clube,
                                    $diretor,
									$idPais,
									$idEstadoBrasil,
									$data_cadastro_clube,
									$data_ultima_atualizacao_clube,
									$idcargo,
                                    $cargo,
                                    $ingles
									
                                ){
									
								$o = new ofertas();
								$o->idofertas = $idofertas;
								$o->id_demandas = $id_demandas;
								$o->id_profissionais = $id_profissionais;
                                $o->data_oferta = $data_oferta;
								$o->status_oferta = $status_oferta;
								
								
								$d = new Demandas();
								$d->iddemandas = $iddemandas;
								$d->idTipo_Demanda = $idTipo_Demanda;
								$d->idPaisD = $idPaisD;
								$d->idClubeD = $idClubeD;
								$d->idCargoD = $idCargoD;
								$d->caracteristicas = $caracteristicas;
								$d->moeda_sal = $moeda_sal;	
                                $d->salario = $salario;
								$d->periodo = $periodo;
								$d->tempo_contrato = $tempo_contrato;
								$d->bonus = $bonus;
                                $d->perfil = $perfil;
                                $d->campeonato_disp_clube = $campeonato_disp_clube;
                                $d->livre_mercado = $livre_mercado;
								$d->moeda_emp = $moeda_emp;
                                $d->custo_emprestimo = $custo_emprestimo;
								$d->moeda_compra = $moeda_compra;
                                $d->percent_opcao_compra = $percent_opcao_compra;
								$d->por_compra = $por_compra;
								$d->moeda_venda = $moeda_venda;
                                $d->percent_venda = $percent_venda;
								$d->por_venda = $por_venda;
								$d->idProfissionaisD = $idProfissionaisD;
                                $d->comissionamento = $comissionamento;
                                $d->pessoas_envolvidas = $pessoas_envolvidas;
                                $d->observacaoD = $observacaoD;
                                $d->data_indicacaoD = $data_indicacaoD;	
								$d->statusD = $statusD;
                                $d->data_cadastroD = $data_cadastroD;
                                $d->data_ultima_atualizacaoD = $data_ultima_atualizacaoD;
								
								
								$p = new profissionais();
								$p->idprofissionais = $idprofissionais;
                                $p->origem = $origem;
								$p->idCargo = $idCargo;
								$p->idCargo2 = $idCargo2;
                                $p->nome_profissional = $nome_profissional;	
                                $p->data_nascimento = $data_nascimento;
                                $p->idNacionalidadeP = $idNacionalidadeP;
								$p->idNacionalidade2P = $idNacionalidade2P;
                                $p->link = $link;
                                $p->link_2 = $link_2;
                                $p->link_3 = $link_3;
                                $p->observacao = $observacao;
                                $p->status = $status;
                                $p->video = $video;
                                $p->video_2 = $video_2;
                                $p->video_3 = $video_3;
                                $p->idIndicacaoP = $idIndicacaoP;
                                $p->data_indicacao = $data_indicacao;	
                                $p->meio_indicacao = $meio_indicacao;
								$p->whatsapp = $whatsapp;
								$p->email = $email;
								$p->caminho_curriculo = $caminho_curriculo;
								$p->idAvaliacao = $idAvaliacao;
                                $p->data_cadastro = $data_cadastro;
                                $p->data_ultima_atualizacao = $data_ultima_atualizacao;
								
								$ps = new paises();
								$ps->idpais = $idpais;
								$ps->pais = $pais;
								$ps->pais_ingles = $pais_ingles;
								
								
								$cb = new clubes();
								$cb->idclube = $idclube;
								$cb->clube = $clube;
								$cb->diretor = $diretor;
								$cb->idPais = $idPais;
								$cb->idEstadoBrasil = $idEstadoBrasil;
								$cb->data_cadastro_clube = $data_cadastro_clube;
								$cb->data_ultima_atualizacao_clube = $data_ultima_atualizacao_clube;
								
								$carg = new cargos();
								$carg->idcargo = $idcargo;
								$carg->cargo = $cargo;
								$carg->ingles = $ingles;
								
								
								$o->demandas = $d;
								$o->profissionais = $p;
								$o->paises = $ps;
								$o->clubes = $cb;
								$o->cargos = $carg;
								return $o;	
				
                     
                                
								}
								
								$stat = $this->conexao->prepare("select * 
								from ofertas as o, demandas as d, profissionais as p, paises as ps, clubes as cb, cargos as carg
								where d.iddemandas = :iddemandas 
								and o.id_demandas = d.iddemandas
								and o.id_profissionais = p.idprofissionais
								and d.idPaisD = ps.idpais
								and d.idClubeD = cb.idclube
								and d.idCargoD = carg.idcargo
								order by data_oferta desc
								");
								
								$stat->bindValue(':iddemandas',$id);
			
								$stat->execute();

								$array = $stat->fetchAll(PDO::FETCH_FUNC, 'montaObjO');
								
								$this->conexao = null;
								return $array;
								
            }catch(PDOException $e){
				echo 'Erro ao buscar ofertas';
            }//Fecha Catch
	}//Fecha buscarofertas
	
	
	
	
	
	//Método alterar Usuario
	public function alterarStatusOfertas($o){
		try{
			$stat = $this->conexao->prepare('update ofertas set 
												status_oferta = ?
												where iditem_oferta = ?');

		
			
            $stat->bindValue(1,$o->status_oferta);
			$stat->bindValue(2,$o->idofertas);

			$stat->execute();
			$this->conexao = null;

		}catch(PDOException $e){
			echo 'Erro ao alterar staus da oferta';
		}//fecha catch
	}//fecha método alterarUsuario
	
	
	
	
	
	
	
	
	
	
	
	public function qtdProfissionaisOfertados(){
		try{
			$stat = $this->conexao->query("select count(id_profissionais) from ofertas");
			
			$qtd_ofertas = $stat->fetchColumn();
			
			echo $qtd_ofertas;

			$this->conexao = null;
			
			
			
			
		}catch(PDOException $e){
			echo 'erro ao buscar Qtd Ofertas';
		}
	}//fecha método qtd ofertas
	
	
	public function qtdProfissionaisOfertadosDia(){
		try{
			$stat = $this->conexao->query("SELECT COUNT(DISTINCT(iditem_oferta)) / DATEDIFF(CURRENT_DATE(), MIN(DATE_FORMAT(data_oferta, '%Y-%m-%d'))) from ofertas");
			//id_profissionais
					
			$qtd_oferta_dia = $stat->fetchColumn();
			
			echo number_format($qtd_oferta_dia, 2, ",",".");

			$this->conexao = null;
			
			
			
			
		}catch(PDOException $e){
			echo 'erro ao buscar Qtd Oferta/Dia';
		}
	}//fecha método qtd ofertas/dia
	

}//FECHA CLASS OfertasDAO
