<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Notifications\Messages\SlackMessage;
use Slack;
use App\CadastrarVaga;

class DesativarVaga extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'desativar:vaga';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Desativa vagas que passaram da data.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


     Slack::to('#cacta-vagas')->send('Rodando cron que desativa vagas expiradas...');

     $mytime = \Carbon\Carbon::now();

     $total = CadastrarVaga::where('disponivel', 1)
     ->whereDate('data_de_expiracao', '<=', $mytime)->count();

     $atualizar =  CadastrarVaga::where('disponivel', 1)
     ->whereDate('data_de_expiracao', '<=', $mytime)->update(['disponivel' => 0]);

     echo 'cron desativar vaga rodando '.$atualizar;

     Slack::to('#cacta-vagas')->send($total.'  vaga(s) desativada(s).');


 }
}
