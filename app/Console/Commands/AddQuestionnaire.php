<?php

namespace App\Console\Commands;

use App\Models\Questionnaire;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;

class AddQuestionnaire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'questionnaire:titre';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ajouter un nouveau questionniare';

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
     * @return int
     */
    public function handle()
    {
        $titre = $this->ask('Quel est le titre du questionniare?');
        $proposition = $this->ask('Quel est le sujet du questionnaire?');
        $utilisateur = $this->ask('Quel est l\'ID de l\'utilisateur?');

        if($this->confirm('Voulez vous insérer ce nouveau questionnaire"'. $titre .'"?')){
            $questionnaireCommande = Questionnaire::create([
            'titre' => $titre,
            'proposition' => $proposition,
            'utilisateur_idutilisateur' => $utilisateur
            ]);

            return $this->info('Ajouter: ' . $questionnaireCommande->titre );
        }

        $this->warn('le questionniare n\'a pas été ajouté');




        //$this->info('Ajouter:' . $questionnaireCommande->titre);

    }
}
