<?php

namespace App\DataFixtures;

use App\Entity\ChambreFroide;
use App\Entity\Officine;
use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UtilisateurFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /** AJOUTER UN ADMIN **/
        $utilisateur = new Utilisateur();
        $utilisateur->setNom('admin');
        $utilisateur->setPrenom('Nadine');
        $utilisateur->setPassword('$2a$10$BZukITPgky.D5Iv8sHy5S.twQYI11pY6Q5Rd8bxh4NH4xyMvosTq2');
        $utilisateur->setRole('admin');
        $manager->persist($utilisateur);
        /** AJOUTER UN TECHNICEN **/
        $technicien = new Utilisateur();
        $technicien->setNom('technicien');
        $technicien->setPrenom('nico');
        $technicien->setPassword('$2a$10$BZukITPgky.D5Iv8sHy5S.twQYI11pY6Q5Rd8bxh4NH4xyMvosTq2');
        $technicien->setRole('technicien');
        $manager->persist($technicien);
        /** AJOUTER UNE OFFICINE **/
        $officine = new Officine();
        $officine->setLibelle('pharmacie du centre');
        $officine->setAdresse('nico');
        $officine->setPassword('$2a$10$BZukITPgky.D5Iv8sHy5S.twQYI11pY6Q5Rd8bxh4NH4xyMvosTq2');
        $officine->setCustomIdentifiant('PHARMA - 62 -10');
        $officine->setTelephone('0321151515');
        $manager->persist($officine);
        /** AJOUTER UNE CHAMBRE FROIDE **/
        $chambre_froide = new ChambreFroide();
        $chambre_froide->setLibell('chambre-1');
        $chambre_froide->setOfficine($officine);
        $manager->persist($chambre_froide);

        $manager->flush();
    }
}
