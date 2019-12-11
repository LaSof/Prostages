<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $fakerFR = \Faker\Factory::create('fr_FR');// Faker Français
        $fakerUS = \Faker\Factory::create('en_US');// Faker Anglais

        $tableauStages = array(); // Tableau contenant tous les stages

        ##### Création des entreprises (l'association a chaque entreprise de ses stages se gere au niveau de la création des stages) #####
		$entreprise1 = new Entreprise;
		$entreprise1->setNom($fakerUS->company);
		$entreprise1->setAdresse($fakerFR->regexify('([1-2][0-9][0-9]) Avenue '.$fakerFR->name));
		$entreprise1->setActivite($fakerFR->sentence($nbWords = 6, $variableNbWords = true));
		$entreprise1->setSite($fakerFR->url);

		$entreprise2 = new Entreprise;
		$entreprise2->setNom($fakerUS->company);
		$entreprise2->setAdresse($fakerFR->regexify('([1-2][0-9][0-9]) Avenue '.$fakerFR->name));
		$entreprise2->setActivite($fakerFR->sentence($nbWords = 6, $variableNbWords = true));
		$entreprise2->setSite($fakerFR->url);

		$entreprise3 = new Entreprise;
		$entreprise3->setNom($fakerUS->company);
		$entreprise3->setAdresse($fakerFR->regexify('([1-2][0-9][0-9]) Avenue '.$fakerFR->name));
		$entreprise3->setActivite($fakerFR->sentence($nbWords = 6, $variableNbWords = true));
		$entreprise3->setSite($fakerFR->url);

		$entreprise4 = new Entreprise;
		$entreprise4->setNom($fakerUS->company);
		$entreprise4->setAdresse($fakerFR->regexify('([1-2][0-9][0-9]) Avenue '.$fakerFR->name));
		$entreprise4->setActivite($fakerFR->sentence($nbWords = 6, $variableNbWords = true));
		$entreprise4->setSite($fakerFR->url);

		$entreprise5 = new Entreprise;
		$entreprise5->setNom($fakerUS->company);
		$entreprise5->setAdresse($fakerFR->regexify(' ([0-9][0-9]) Avenue '.$fakerFR->name));
		$entreprise5->setActivite($fakerFR->sentence($nbWords = 6, $variableNbWords = true));
		$entreprise5->setSite($fakerFR->url);

		$tableauEntrepises = array($entreprise1,$entreprise2,$entreprise3,$entreprise4,$entreprise5); // Tableau contenant toutes les entreprises

       	##### Création des formations #####

        /// DUT Info \\\
        $formationDUTInfo = new Formation();
        $formationDUTInfo->setNomCourt("DUT Info");
        $formationDUTInfo->setNomLong("Diplôme Universitaire en Technologies de l'Informatique");
        $manager->persist($formationDUTInfo);

        	// Création des stages associés a DUT Info \\
			$stageDUTInfo1 = new Stage();
        	$stageDUTInfo1->setIntitule("Developpement d'un site web");
			$stageDUTInfo1->setMissions("Création d'une page d'accueil, modification d'une page de contact");
			$stageDUTInfo1->setContact($fakerFR->email);
			$stageDUTInfo1->setEntreprise($entreprise1);
			$stageDUTInfo1->addFormation($formationDUTInfo);
			$manager->persist($stageDUTInfo1);
			$tableauStages[] = $stageDUTInfo1;

				// Ajout du stage dans son entreprise
				$entreprise1->addStage($stageDUTInfo1);

			$stageDUTInfo2 = new Stage();
        	$stageDUTInfo2->setIntitule("Création d'une base de données");
			$stageDUTInfo2->setMissions("Adaptation d'un diagramme de classes, peuplement de la table");
			$stageDUTInfo2->setContact($fakerFR->email);
			$stageDUTInfo2->setEntreprise($entreprise2);
			$stageDUTInfo2->addFormation($formationDUTInfo);
			$manager->persist($stageDUTInfo2);
			$tableauStages[] = $stageDUTInfo2;

				// Ajout du stage dans son entreprise
				$entreprise2->addStage($stageDUTInfo2);


        /// DU TIC \\\
        $formationDUTIC = new Formation();
        $formationDUTIC->setNomCourt("DU TIC");
        $formationDUTIC->setNomLong("Diplôme Universitaire en Technologies de l'Information et de la Communication");
        $manager->persist($formationDUTIC);

        	// Création des stages associés a DU TIC \\
        	$stageDUTIC1 = new Stage();
        	$stageDUTIC1->setIntitule("Developpement d'une application mobile");
			$stageDUTIC1->setMissions("Création d'une interface, developement pour Android et iOS");
			$stageDUTIC1->setContact($fakerFR->email);
			$stageDUTIC1->setEntreprise($entreprise3);
			$stageDUTIC1->addFormation($formationDUTIC);
			$manager->persist($stageDUTIC1);
			$tableauStages[] = $stageDUTIC1;

				// Ajout du stage dans son entreprise
				$entreprise3->addStage($stageDUTIC1);


        	$stageDUTIC2 = new Stage();
        	$stageDUTIC2->setIntitule("Mise en place d'un réseau informatique");
			$stageDUTIC2->setMissions("Création de routes, mise en place de restrictions");
			$stageDUTIC2->setContact($fakerFR->email);
			$stageDUTIC2->setEntreprise($entreprise4);
			$stageDUTIC2->addFormation($formationDUTIC);
			$manager->persist($stageDUTIC2);
			$tableauStages[] = $stageDUTIC2;

				// Ajout du stage dans son entreprise
				$entreprise4->addStage($stageDUTIC2);


        /// LPM \\\
        $formationLPM = new Formation();
        $formationLPM->setNomCourt("LPM");
        $formationLPM->setNomLong("License Professionnelle Multimédia");
        $manager->persist($formationLPM);

        	// Création des stages associés a LPM \\
        	$stageLPM1 = new Stage();
        	$stageLPM1->setIntitule("Developpement d'une application");
			$stageLPM1->setMissions("Réalisation de maquettes, mise en place d'une base de données");
			$stageLPM1->setContact($fakerFR->email);
			$stageLPM1->setEntreprise($entreprise5);
			$stageLPM1->addFormation($formationLPM);
			$manager->persist($stageLPM1);
			$tableauStages[] = $stageLPM1;

				// Ajout du stage dans son entreprise
				$entreprise5->addStage($stageLPM1);


			$stageLPM2 = new Stage();
        	$stageLPM2->setIntitule("Réalisation d'une interface");
			$stageLPM2->setMissions("Création de maquettes, usage d'une charte graphique");
			$stageLPM2->setContact($fakerFR->email);
			$stageLPM2->setEntreprise($entreprise4);
			$stageLPM2->addFormation($formationLPM);
			$manager->persist($stageLPM2);
			$tableauStages[] = $stageLPM2;

				// Ajout du stage dans son entreprise
				$entreprise4->addStage($stageLPM2);

        $tableauFormations = array($formationDUTInfo, $formationDUTIC, $formationLPM); // Tableau contenant toutes les formations

        foreach ($tableauEntrepises as $entreprise) 
        {
        	$manager->persist($entreprise);
        }


        $manager->flush();
    }
}
