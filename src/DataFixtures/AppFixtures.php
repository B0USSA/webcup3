<?php

namespace App\DataFixtures;

use App\Entity\AnalyseAnswers;
use App\Entity\AnalyseQuestions;
use App\Entity\Hero;
use App\Entity\Level;
use App\Entity\NegotiationAnswers;
use App\Entity\NegotiationQuestions;
use App\Entity\PositionAnswers;
use App\Entity\PositionQuestions;
use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager)
    {
        $data = [
            [
                "question" => "Une ville est attaquée par des ennemis volants. En tant que héros de type défense, où devriez-vous vous positionner pour mieux protéger les civils ?",
                "answers" => [
                    "Sur un immeuble élevé pour avoir une vue d'ensemble.",
                    "Près des civils pour les protéger directement.",
                    "En retrait, en coordonnant les défenses avec d'autres héros."
                ]
            ],
            [
                "question" => "Un monstre géant menace de détruire un quartier entier. Où devriez-vous vous positionner pour minimiser les dégâts ?",
                "answers" => [
                    "Directement en face du monstre pour l'affronter.",
                    "Sur les côtés pour guider les civils vers la sécurité.",
                    "Derrière le monstre pour attaquer ses points faibles."
                ]
            ],
            [
                "question" => "Une attaque ennemie est imminente et des civils sont regroupés dans un abri. Où devriez-vous vous positionner pour assurer leur sécurité ?",
                "answers" => [
                    "À l'extérieur de l'abri pour contrer l'attaque avant qu'elle ne commence.",
                    "À l'intérieur de l'abri pour protéger directement les civils.",
                    "Sur le toit de l'abri pour surveiller les mouvements ennemis."
                ]
            ],
            [
                "question" => "Des criminels menacent de prendre en otage des civils dans un bâtiment. Où devriez-vous vous positionner pour intervenir ?",
                "answers" => [
                    "Juste devant le bâtiment pour empêcher les criminels d'entrer.",
                    "Sur le toit du bâtiment pour une vue d'ensemble et une entrée stratégique.",
                    "Autour du bâtiment pour empêcher toute fuite des criminels."
                ]
            ],
            [
                "question" => "Une catastrophe naturelle approche et les civils évacuent la ville. Où devriez-vous vous positionner pour aider à l'évacuation ?",
                "answers" => [
                    "À l'avant de la file d'évacuation pour guider les gens.",
                    "À l'arrière de la file d'évacuation pour protéger contre les attaques surprises.",
                    "Sur les côtés pour détecter les dangers potentiels et les obstacles sur la route."
                ]
            ],
            [
                "question" => "Une invasion extraterrestre est imminente et les civils cherchent refuge dans un centre de secours. Où devriez-vous vous positionner pour protéger le centre et ses occupants ?",
                "answers" => [
                    "À l'entrée du centre pour empêcher les extraterrestres d'y pénétrer.",
                    "Sur le toit du centre pour une vue d'ensemble et une défense stratégique.",
                    "À l'intérieur du centre pour organiser l'évacuation et la défense des civils."
                ]
            ],
            [
                "question" => "Une attaque terroriste se déroule dans un grand stade rempli de spectateurs. Où devriez-vous vous positionner pour minimiser les pertes ?",
                "answers" => [
                    "Au centre du stade pour être prêt à intervenir rapidement.",
                    "Autour des sorties pour empêcher les terroristes de s'échapper.",
                    "Sur les gradins pour protéger les spectateurs et faciliter l'évacuation."
                ]
            ],
            [
                "question" => "Une organisation criminelle lance une attaque contre un centre de recherche où des technologies avancées sont développées. Où devriez-vous vous positionner pour protéger les recherches en cours ?",
                "answers" => [
                    "À l'intérieur du centre pour défendre les laboratoires et les scientifiques.",
                    "Autour du périmètre du centre pour repousser l'attaque avant qu'elle n'atteigne l'intérieur.",
                    "Sur les voies d'accès au centre pour intercepter les attaquants avant qu'ils n'arrivent."
                ]
            ],
            [
                "question" => "Une tempête dévastatrice s'abat sur la ville, provoquant des inondations et des coupures de courant. Où devriez-vous vous positionner pour aider les services de secours ?",
                "answers" => [
                    "Sur les routes principales pour dégager les débris et aider les véhicules de secours.",
                    "Près des zones inondées pour évacuer les personnes piégées.",
                    "Dans les quartiers résidentiels pour fournir une assistance directe aux sinistrés."
                ]
            ],
            [
                "question" => "Un laboratoire secret est attaqué par des mercenaires qui cherchent à voler une substance dangereuse. Où devriez-vous vous positionner pour empêcher le vol ?",
                "answers" => [
                    "À l'intérieur du laboratoire pour protéger les substances et les scientifiques.",
                    "Autour du périmètre du laboratoire pour repousser les assaillants avant qu'ils n'atteignent l'intérieur.",
                    "Sur les voies de fuite connues pour intercepter les mercenaires en fuite."
                ]
            ],
            [
                "question" => "Une épidémie se propage rapidement dans la ville, causant la panique parmi les habitants. Où devriez-vous vous positionner pour aider à contenir la situation ?",
                "answers" => [
                    "Aux frontières de la ville pour empêcher la propagation de l'épidémie.",
                    "Dans les hôpitaux pour aider à traiter les personnes infectées.",
                    "Dans les quartiers résidentiels pour fournir des informations et des directives aux habitants."
                ]
            ],
            [
                "question" => "Un incendie se déclare dans un gratte-ciel et les occupants paniquent. Où devriez-vous vous positionner pour aider à l'évacuation ?",
                "answers" => [
                    "En haut du gratte-ciel pour guider les hélicoptères de secours.",
                    "Dans les escaliers pour aider à évacuer les personnes bloquées.",
                    "Au sol pour coordonner les efforts de secours et recevoir les personnes évacuées."
                ]
            ],
            [
                "question" => "Un groupe de criminels prend en otage un train rempli de passagers. Où devriez-vous vous positionner pour intervenir ?",
                "answers" => [
                    "À l'avant du train pour stopper les criminels dès qu'ils sortent.",
                    "À l'arrière du train pour empêcher une fuite.",
                    "Sur le toit du train pour accéder discrètement aux criminels."
                ]
            ],
            [
                "question" => "Des manifestations violentes éclatent dans la ville, mettant en danger la sécurité des civils. Où devriez-vous vous positionner pour maintenir l'ordre ?",
                "answers" => [
                    "Au centre des manifestations pour calmer la foule et éviter les débordements.",
                    "Aux abords des manifestations pour empêcher les infiltrations de criminels.",
                    "À l'écart des manifestations pour observer et agir en cas d'urgence."
                ]
            ],
            [
                "question" => "Une attaque bioterroriste est signalée dans un quartier densément peuplé. Où devriez-vous vous positionner pour coordonner la réponse d'urgence ?",
                "answers" => [
                    "Dans un poste de commandement central pour superviser les opérations.",
                    "Sur les lieux de l'attaque pour évaluer les dégâts et dispenser les premiers soins.",
                    "Dans les hôpitaux pour gérer l'afflux de victimes et organiser la distribution d'antidotes."
                ]
            ]
        ];

        foreach ($data as $item) {
            $question = new PositionQuestions();
            $question->setQuestion($item['question']);
            $manager->persist($question);

            $answers = $item['answers'];
            $positionAnswer = new PositionAnswers();
            $positionAnswer->setFirstAnswer($answers[0])
                ->setSecondAnswer($answers[1])
                ->setThirdAnswer($answers[2])
                ->setIdquestion($question);

            $manager->persist($positionAnswer);
        }

        $data = [
            [
                "question" => "Vous voyez une voiture foncer à toute vitesse vers un groupe de piétons. Que faites-vous ?",
                "answers" => [
                    "Vous essayez d'arrêter la voiture avec votre force physique.",
                    "Vous utilisez vos pouvoirs pour ralentir ou arrêter la voiture.",
                    "Vous alertez les piétons et les aidez à se mettre en sécurité."
                ]
            ],
            [
                "question" => "Un bâtiment est en feu et des personnes sont coincées à l'intérieur. Que faites-vous ?",
                "answers" => [
                    "Vous entrez dans le bâtiment pour les sauver, peu importe le danger.",
                    "Vous utilisez vos pouvoirs pour éteindre le feu et libérer les personnes.",
                    "Vous appelez les services d'urgence et coordonnez l'évacuation depuis l'extérieur."
                ]
            ],
            [
                "question" => "Une attaque terroriste est signalée dans un centre commercial bondé. Que faites-vous ?",
                "answers" => [
                    "Vous affrontez directement les terroristes pour les arrêter.",
                    "Vous cherchez à désamorcer la situation en parlant aux terroristes.",
                    "Vous évacuez discrètement les civils et appelez les autorités."
                ]
            ],
            [
                "question" => "Un enfant est tombé dans une rivière agitée. Que faites-vous ?",
                "answers" => [
                    "Vous plongez immédiatement pour le sauver.",
                    "Vous utilisez vos pouvoirs pour le sortir de l'eau en toute sécurité.",
                    "Vous cherchez à atteindre l'enfant avec une corde ou un dispositif de sauvetage."
                ]
            ],
            [
                "question" => "Des criminels tentent de cambrioler une banque. Que faites-vous ?",
                "answers" => [
                    "Vous intervenez directement pour arrêter les criminels.",
                    "Vous les surveillez discrètement et alertez les autorités.",
                    "Vous prévenez les employés de la banque et les aidez à se protéger."
                ]
            ],
            [
                "question" => "Une explosion se produit dans un immeuble de bureaux. Que faites-vous ?",
                "answers" => [
                    "Vous vous précipitez dans le bâtiment pour secourir les personnes piégées.",
                    "Vous utilisez vos pouvoirs pour contenir les dégâts et éviter l'effondrement.",
                    "Vous évacuez les personnes à proximité et appelez les services d'urgence."
                ]
            ],
            [
                "question" => "Un avion perd le contrôle et s'écrase près d'une zone résidentielle. Que faites-vous ?",
                "answers" => [
                    "Vous utilisez vos pouvoirs pour ralentir ou arrêter l'avion avant l'impact.",
                    "Vous vous précipitez sur les lieux pour secourir les survivants et empêcher les incendies.",
                    "Vous éloignez les civils du site de l'accident et appelez les services d'urgence."
                ]
            ],
            [
                "question" => "Une éruption volcanique menace une ville entière. Que faites-vous ?",
                "answers" => [
                    "Vous vous rendez sur le volcan pour tenter de le calmer ou de le détourner.",
                    "Vous utilisez vos pouvoirs pour protéger les zones habitées des coulées de lave et des débris.",
                    "Vous coordonnez l'évacuation de la population vers des zones sûres."
                ]
            ],
            [
                "question" => "Des extraterrestres hostiles envahissent la Terre. Que faites-vous ?",
                "answers" => [
                    "Vous vous engagez directement dans la bataille pour défendre la planète.",
                    "Vous cherchez à communiquer avec les extraterrestres pour trouver un terrain d'entente.",
                    "Vous aidez à évacuer les civils vers des zones sûres et à organiser la résistance."
                ]
            ],
            [
                "question" => "Un virus mortel se propage rapidement dans le monde entier. Que faites-vous ?",
                "answers" => [
                    "Vous travaillez avec des scientifiques pour trouver un remède ou un vaccin.",
                    "Vous utilisez vos pouvoirs pour contenir la propagation du virus et guérir les malades.",
                    "Vous aidez à organiser les efforts de secours et à fournir des ressources aux personnes touchées."
                ]
            ],
            [
                "question" => "Un super-vilain menace de détruire la ville avec une arme de destruction massive. Que faites-vous ?",
                "answers" => [
                    "Vous affrontez directement le super-vilain pour l'arrêter.",
                    "Vous cherchez à désamorcer la situation en parlant au super-vilain.",
                    "Vous évacuez rapidement la population et alertez les autorités."
                ]
            ],
            [
                "question" => "Un tremblement de terre dévastateur frappe une région densément peuplée. Que faites-vous ?",
                "answers" => [
                    "Vous cherchez à localiser et à secourir les survivants piégés dans les décombres.",
                    "Vous utilisez vos pouvoirs pour stabiliser les structures endommagées et éviter de nouvelles victimes.",
                    "Vous coordonnez les efforts de secours et aidez à évacuer les zones les plus touchées."
                ]
            ],
            [
                "question" => "Des démons envahissent le monde des mortels. Que faites-vous ?",
                "answers" => [
                    "Vous engagez directement les démons dans le combat.",
                    "Vous recherchez des artefacts ou des connaissances anciennes pour les bannir.",
                    "Vous organisez la défense des zones les plus vulnérables et aidez à évacuer les civils."
                ]
            ],
            [
                "question" => "Une intelligence artificielle malveillante prend le contrôle des systèmes informatiques mondiaux. Que faites-vous ?",
                "answers" => [
                    "Vous tentez de pirater ou de neutraliser l'intelligence artificielle directement.",
                    "Vous cherchez à négocier ou à convaincre l'intelligence artificielle de renoncer à sa menace.",
                    "Vous mettez en place des contre-mesures pour limiter les dégâts et protéger les systèmes vitaux."
                ]
            ],
            [
                "question" => "Un culte mystique cherche à invoquer une entité démoniaque. Que faites-vous ?",
                "answers" => [
                    "Vous affrontez les membres du culte pour les arrêter avant qu'ils ne réussissent.",
                    "Vous cherchez à trouver des artefacts ou des rituels pour contrer l'invocation.",
                    "Vous protégez les lieux de pouvoir potentiellement utilisés dans le rituel et alertez les autorités."
                ]
            ]
        ];

        foreach ($data as $item) {
            $question = new AnalyseQuestions();
            $question->setQuestion($item['question']);
            $manager->persist($question);

            $answers = $item['answers'];
            $positionAnswer = new AnalyseAnswers();
            $positionAnswer->setFirstAnswer($answers[0])
                ->setSecondAnswer($answers[1])
                ->setThirdAnswer($answers[2])
                ->setIdquestion($question);

            $manager->persist($positionAnswer);
        }

        $data = [
            [
                "question" => "Un groupe de criminels détient des otages dans une banque. Comment abordez-vous la situation ?",
                "answers" => [
                    "Je tente de négocier avec les criminels pour libérer les otages.",
                    "Je cherche à comprendre les motivations des criminels avant de prendre des mesures.",
                    "Je m'efforce de trouver une solution pacifique tout en préparant des plans d'action au cas où la négociation échoue."
                ]
            ],
            [
                "question" => "Un pays voisin menace de déclencher une guerre. Comment réagissez-vous ?",
                "answers" => [
                    "Je cherche des canaux diplomatiques pour résoudre le conflit de manière pacifique.",
                    "Je m'engage dans des pourparlers de paix avec le pays voisin pour désamorcer la situation.",
                    "Je coordonne les efforts de défense et de dissuasion pour protéger ma nation tout en maintenant le dialogue diplomatique."
                ]
            ],
            [
                "question" => "Une manifestation violente éclate dans la ville. Comment gérez-vous la situation ?",
                "answers" => [
                    "Je cherche à dialoguer avec les manifestants pour comprendre leurs revendications et trouver des solutions.",
                    "Je travaille avec les autorités locales pour maintenir l'ordre public tout en respectant le droit de manifester.",
                    "Je déploie des tactiques de désescalade et de médiation pour calmer la situation et éviter les confrontations violentes."
                ]
            ],
            [
                "question" => "Une organisation criminelle exige un paiement de protection des commerçants locaux. Que faites-vous ?",
                "answers" => [
                    "Je cherche des preuves pour affaiblir l'organisation et la traduire en justice.",
                    "Je discute avec les chefs de l'organisation pour trouver des alternatives au paiement de protection.",
                    "Je coordonne avec les forces de l'ordre pour démanteler l'organisation tout en protégeant les commerçants vulnérables."
                ]
            ],
            [
                "question" => "Un conflit entre deux super-héros menace la sécurité de la ville. Comment intervenez-vous ?",
                "answers" => [
                    "Je m'implique en tant que médiateur pour résoudre le différend de manière pacifique.",
                    "Je cherche à comprendre les motivations des super-héros et à les convaincre de trouver un terrain d'entente.",
                    "Je coordonne avec d'autres héros et les autorités locales pour minimiser les dommages et restaurer la paix."
                ]
            ],
            [
                "question" => "Une entreprise pollue délibérément l'environnement. Comment réagissez-vous ?",
                "answers" => [
                    "Je cherche des moyens légaux pour contraindre l'entreprise à réduire sa pollution et à réparer les dommages.",
                    "Je dialogue avec les dirigeants de l'entreprise pour les sensibiliser aux conséquences de leurs actions.",
                    "Je mobilise l'opinion publique et les autorités environnementales pour sanctionner l'entreprise et promouvoir des pratiques durables."
                ]
            ],
            [
                "question" => "Un groupe de nations refuse de coopérer pour lutter contre le changement climatique. Comment agissez-vous ?",
                "answers" => [
                    "Je m'engage dans des pourparlers internationaux pour trouver des compromis et des solutions acceptables pour tous.",
                    "Je sensibilise les populations à l'urgence climatique et à l'importance de la coopération mondiale.",
                    "Je travaille avec des organisations internationales pour mettre en œuvre des mesures de protection de l'environnement et encourager la coopération entre les nations."
                ]
            ],
            [
                "question" => "Une crise humanitaire se produit dans une région du monde. Que faites-vous ?",
                "answers" => [
                    "Je travaille avec des organisations humanitaires pour fournir une aide d'urgence et mobiliser des ressources.",
                    "Je dialogue avec les parties impliquées pour garantir un accès sûr et équitable à l'aide humanitaire.",
                    "Je sensibilise l'opinion publique mondiale à la crise et exerce une pression diplomatique pour promouvoir des solutions durables."
                ]
            ],
            [
                "question" => "Un groupe terroriste menace de commettre un attentat. Comment réagissez-vous ?",
                "answers" => [
                    "Je coordonne avec les agences de renseignement pour identifier et neutraliser la menace.",
                    "Je dialogue avec les membres du groupe terroriste pour comprendre leurs revendications et rechercher des solutions alternatives.",
                    "Je mobilise les forces de sécurité pour prévenir l'attaque tout en recherchant des solutions diplomatiques pour résoudre le conflit sous-jacent."
                ]
            ],
            [
                "question" => "Une crise économique mondiale se profile à l'horizon. Comment intervenez-vous ?",
                "answers" => [
                    "Je travaille avec des experts économiques pour élaborer des plans de relance et de stabilisation.",
                    "Je dialogue avec les dirigeants mondiaux pour coordonner une réponse internationale concertée.",
                    "Je sensibilise les populations à l'importance de la solidarité et de la coopération pour surmonter la crise."
                ]
            ],
            [
                "question" => "Un conflit racial divise une communauté. Comment agissez-vous ?",
                "answers" => [
                    "Je dialogue avec les membres des deux côtés pour promouvoir la compréhension mutuelle et la réconciliation.",
                    "Je mobilise des ressources pour soutenir les initiatives de justice sociale et d'égalité des chances.",
                    "Je m'engage dans des actions concrètes pour combattre le racisme systémique et promouvoir l'inclusion et la diversité."
                ]
            ],
            [
                "question" => "Une épidémie de maladie contagieuse se propage rapidement. Comment réagissez-vous ?",
                "answers" => [
                    "Je coordonne avec les autorités sanitaires pour mettre en place des mesures de prévention et de contrôle.",
                    "Je sensibilise les populations à l'importance de l'hygiène et de la distanciation sociale pour freiner la propagation de la maladie.",
                    "Je mobilise des ressources pour soutenir la recherche médicale et fournir des soins aux malades."
                ]
            ],
            [
                "question" => "Un conflit territorial met en péril la paix entre deux nations. Comment intervenez-vous ?",
                "answers" => [
                    "Je m'implique en tant que médiateur neutre pour faciliter des pourparlers de paix et trouver un accord mutuellement acceptable.",
                    "Je travaille avec des experts juridiques et des diplomates pour rechercher des solutions conformes au droit international.",
                    "Je mobilise la communauté internationale pour exercer une pression diplomatique sur les parties en conflit et promouvoir une résolution pacifique."
                ]
            ],
            [
                "question" => "Une crise politique éclate dans un pays en voie de développement. Comment agissez-vous ?",
                "answers" => [
                    "Je travaille avec des organisations internationales pour promouvoir la démocratie et les droits de l'homme.",
                    "Je dialogue avec les dirigeants politiques et la société civile pour faciliter un processus de transition pacifique.",
                    "Je mobilise des ressources pour soutenir les initiatives de développement économique et social et renforcer les institutions démocratiques."
                ]
            ],
            [
                "question" => "Un accord de paix fragile est menacé par des violations des droits de l'homme. Comment réagissez-vous ?",
                "answers" => [
                    "Je m'engage avec les parties signataires pour garantir le respect des engagements pris et la protection des droits fondamentaux.",
                    "Je mobilise l'opinion publique internationale pour dénoncer les violations et exercer une pression diplomatique sur les responsables.",
                    "Je travaille avec des organisations de défense des droits de l'homme pour documenter les abus et soutenir les victimes."
                ]
            ]
        ];

        foreach ($data as $item) {
            $question = new NegotiationQuestions();
            $question->setQuestion($item['question']);
            $manager->persist($question);

            $answers = $item['answers'];
            $positionAnswer = new NegotiationAnswers();
            $positionAnswer->setFirstAnswer($answers[0])
                ->setSecondAnswer($answers[1])
                ->setThirdAnswer($answers[2])
                ->setIdquestion($question);

            $manager->persist($positionAnswer);
        }

        #region
        $level = new Level();
        $level->setCategory('Attaque')
            ->setLevel('1')
            ->setLeveltitle('Technique de frappe');

        $manager->persist($level);

        $level = new Level();
        $level->setCategory('Attaque')
            ->setLevel('2')
            ->setLeveltitle('Mouvement');

        $manager->persist($level);

        $level = new Level();
        $level->setCategory('Attaque')
            ->setLevel('3')
            ->setLeveltitle('Analyse rapide');

        $manager->persist($level);

        $level = new Level();
        $level->setCategory('Defense')
            ->setLevel('1')
            ->setLeveltitle("Technique de blocage");

        $manager->persist($level);

        $level = new Level();
        $level->setCategory('Defense')
            ->setLevel('2')
            ->setLeveltitle("Positionnement");

        $manager->persist($level);

        $level = new Level();
        $level->setCategory('Defense')
            ->setLevel('3')
            ->setLeveltitle("Potection d'équipe");

        $manager->persist($level);

        $level = new Level();
        $level->setCategory('Support')
            ->setLevel('1')
            ->setLeveltitle("Analyse de situation");

        $manager->persist($level);

        $level = new Level();
        $level->setCategory('Support')
            ->setLevel('2')
            ->setLeveltitle("Diplomatie et négociation");

        $manager->persist($level);

        $level = new Level();
        $level->setCategory('Support')
            ->setLevel('3')
            ->setLeveltitle("Prise de décision");

        $manager->persist($level);
        #endregion

        $data = [
            [
                "heroName" => "Ultron",
                "superpowerDescription" => "Ultron est un androïde doté d'une intelligence artificielle avancée et d'une force physique surhumaine. Il peut contrôler les machines et les robots, ainsi que générer des armes énergétiques.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Aegis",
                "superpowerDescription" => "Aegis possède une peau indestructible qui le rend impénétrable aux attaques physiques et aux balles. Il peut également générer un bouclier énergétique pour protéger ses alliés.",
                "powerCategory" => "Defense"
            ],
            [
                "heroName" => "Oracle",
                "superpowerDescription" => "Oracle a le pouvoir de prédire l'avenir avec une grande précision, ce qui lui permet de anticiper les événements et de prendre des décisions stratégiques. Elle peut également manipuler les informations et pirater les systèmes informatiques.",
                "powerCategory" => "Support"
            ],
            [
                "heroName" => "Phoenix",
                "superpowerDescription" => "Phoenix peut manipuler et générer le feu à volonté. Elle peut voler et projeter des rafales de flammes, ainsi que résister aux températures extrêmes.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Titan",
                "superpowerDescription" => "Titan possède une force surhumaine et une durabilité accrue. Il peut également modifier sa taille pour devenir géant, ce qui lui confère une plus grande puissance et une portée de combat étendue.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Sentinel",
                "superpowerDescription" => "Sentinel peut générer des champs de force protecteurs pour repousser les attaques ennemies. Il peut également créer des barrières énergétiques pour bloquer les projectiles et protéger les civils.",
                "powerCategory" => "Defense"
            ],
            [
                "heroName" => "Vortex",
                "superpowerDescription" => "Vortex a le pouvoir de manipuler les flux d'air et de créer des tornades et des tempêtes. Il peut voler et contrôler les déplacements des objets en lévitation.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Medicus",
                "superpowerDescription" => "Medicus a le pouvoir de guérir les blessures et les maladies avec un simple toucher. Il peut également renforcer la résistance physique et mentale de ses alliés.",
                "powerCategory" => "Support"
            ],
            [
                "heroName" => "Specter",
                "superpowerDescription" => "Specter peut se rendre invisible et traverser les objets solides. Il peut aussi manipuler les ombres pour créer des illusions et désorienter ses ennemis.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Guardian",
                "superpowerDescription" => "Guardian est doté d'une armure indestructible qui lui confère une force surhumaine et une résistance aux attaques. Il peut également projeter des champs d'énergie pour repousser les ennemis.",
                "powerCategory" => "Defense"
            ],
            [
                "heroName" => "Eclipse",
                "superpowerDescription" => "Eclipse peut manipuler les photons et créer des champs de camouflage optique pour se dissimuler. Il peut également générer des éclairs de lumière intense pour éblouir ses ennemis.",
                "powerCategory" => "Support"
            ],
            [
                "heroName" => "Nebula",
                "superpowerDescription" => "Nebula peut créer et manipuler des champs de gravité pour léviter et déplacer des objets. Elle peut également générer des vagues d'énergie gravitationnelle pour repousser ou attirer ses adversaires.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Pulse",
                "superpowerDescription" => "Pulse peut manipuler les ondes sonores pour créer des boucliers de force et des attaques soniques. Il peut également amplifier ou annuler les sons environnants pour influencer le comportement des gens.",
                "powerCategory" => "Defense"
            ],
            [
                "heroName" => "Chronos",
                "superpowerDescription" => "Chronos a le pouvoir de manipuler le temps, lui permettant de ralentir, d'accélérer ou de figer le mouvement des objets et des personnes. Il peut également prévoir les événements à venir et les éviter.",
                "powerCategory" => "Support"
            ],
            [
                "heroName" => "Sphinx",
                "superpowerDescription" => "Sphinx peut lire les pensées et les émotions des autres, ainsi que projeter des illusions mentales. Il peut également contrôler les esprits et influencer les décisions des gens.",
                "powerCategory" => "Support"
            ],
            [
                "heroName" => "Blaze",
                "superpowerDescription" => "Blaze peut générer et contrôler le feu à volonté. Il peut projeter des boules de feu, créer des murs de flammes et même se déplacer à grande vitesse en enveloppant son corps de flammes.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Fortress",
                "superpowerDescription" => "Fortress possède une force physique surhumaine et une constitution robuste qui le rendent pratiquement invulnérable aux attaques physiques. Il peut également projeter des ondes de choc pour repousser les ennemis.",
                "powerCategory" => "Defense"
            ],
            [
                "heroName" => "Serenity",
                "superpowerDescription" => "Serenity peut générer un champ d'énergie apaisant qui calme les esprits agités et guérit les blessures émotionnelles. Elle peut également projeter des vagues d'énergie positive pour renforcer le moral de ses alliés.",
                "powerCategory" => "Support"
            ],
            [
                "heroName" => "Storm",
                "superpowerDescription" => "Storm a le pouvoir de manipuler les éléments atmosphériques, y compris le vent, la pluie, la foudre et la neige. Elle peut créer des tempêtes dévastatrices et invoquer des éclairs pour frapper ses ennemis.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Sentinel",
                "superpowerDescription" => "Sentinel possède une technologie avancée qui lui permet de voler et de tirer des projectiles énergétiques. Il peut également analyser les environnements et les situations pour prendre des décisions tactiques éclairées.",
                "powerCategory" => "Support"
            ],
            [
                "heroName" => "Mirage",
                "superpowerDescription" => "Mirage peut créer des illusions visuelles et auditives pour désorienter ses ennemis et protéger ses alliés. Elle peut également se camoufler et se fondre dans son environnement pour éviter la détection.",
                "powerCategory" => "Defense"
            ],
            [
                "heroName" => "Chrono",
                "superpowerDescription" => "Chrono a le pouvoir de manipuler le temps en ralentissant ou en accélérant les mouvements des objets et des personnes autour de lui. Il peut également prédire les événements futurs et agir en conséquence.",
                "powerCategory" => "Support"
            ],
            [
                "heroName" => "Titan",
                "superpowerDescription" => "Titan possède une force et une endurance surhumaines qui lui permettent de soulever des objets lourds et de résister aux attaques physiques. Il peut également générer des ondes de choc pour repousser les ennemis.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Nova",
                "superpowerDescription" => "Nova peut manipuler l'énergie cosmique pour créer des explosions d'énergie et des rayons destructeurs. Elle peut également voler à des vitesses supersoniques et résister aux températures extrêmes de l'espace.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Guardian",
                "superpowerDescription" => "Guardian possède une armure haute technologie qui lui confère une force et une résistance surhumaines. Il peut également déployer des boucliers énergétiques pour protéger ses alliés des attaques.",
                "powerCategory" => "Defense"
            ],
            [
                "heroName" => "Spectre",
                "superpowerDescription" => "Spectre peut devenir intangible et traverser les objets solides. Il peut également manipuler les ombres pour créer des attaques furtives et se déplacer rapidement sans être détecté.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Aurora",
                "superpowerDescription" => "Aurora peut générer des champs d'énergie lumineuse pour éblouir ses ennemis et illuminer les zones sombres. Elle peut également créer des illusions visuelles pour distraire et désorienter ses adversaires.",
                "powerCategory" => "Support"
            ],
            [
                "heroName" => "Blizzard",
                "superpowerDescription" => "Blizzard peut manipuler la glace et le froid pour créer des tempêtes de neige et des rafales de vent glacial. Il peut également geler les surfaces et les ennemis pour les immobiliser.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Eclipse",
                "superpowerDescription" => "Eclipse a le pouvoir de manipuler les ombres et les ténèbres pour se dissimuler et piéger ses ennemis dans l'obscurité. Il peut également générer des vagues d'énergie sombre pour affaiblir ses adversaires.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Quasar",
                "superpowerDescription" => "Quasar peut manipuler les forces gravitationnelles pour déplacer des objets et des personnes à volonté. Il peut également créer des champs de force pour bloquer les attaques et repousser les ennemis.",
                "powerCategory" => "Defense"
            ],
            [
                "heroName" => "Phoenix",
                "superpowerDescription" => "Phoenix peut manipuler et générer le feu à volonté. Elle peut voler et projeter des rafales de flammes, ainsi que résister aux températures extrêmes.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Apex",
                "superpowerDescription" => "Apex possède une force, une vitesse et une agilité surhumaines qui en font un combattant redoutable. Il peut également projeter des champs d'énergie pour repousser les attaques et renforcer ses coups.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Luminary",
                "superpowerDescription" => "Luminary peut générer et manipuler la lumière à volonté. Il peut créer des faisceaux d'énergie lumineuse pour aveugler ses ennemis et projeter des rayons laser dévastateurs.",
                "powerCategory" => "Attaque"
            ],
            [
                "heroName" => "Paragon",
                "superpowerDescription" => "Paragon possède une constitution physique parfaite qui lui confère une force, une endurance et une agilité surhumaines. Il peut également guérir rapidement de ses blessures et résister aux toxines et poisons.",
                "powerCategory" => "Defense"
            ],
            [
                "heroName" => "Cascade",
                "superpowerDescription" => "Cascade peut manipuler l'eau à volonté, créant des jets d'eau puissants et des tourbillons dévastateurs. Elle peut également purifier et guérir les blessures avec de l'eau régénératrice.",
                "powerCategory" => "Support"
            ]
        ];

        $attackers = [];
        $defensers = [];
        $supporters = [];
        foreach ($data as $item) {
            $hero = new Hero();
            $hero->setCategory($item['powerCategory'])
                ->setEmail($this->faker->email)
                ->setHeroname($item['heroName'])
                ->setPowerdescription($item['superpowerDescription'])
                ->setPassword(password_hash($item['heroName'], PASSWORD_DEFAULT));

            if ($item['powerCategory'] == "Attaque") {
                $attackers[] = $hero;
            } elseif ($item['powerCategory'] == "Defense") {
                $defensers[] = $hero;
            } else {
                $supporters[] = $hero;
            }

            $manager->persist($hero);
        }

        $availableHeroes = array_merge($attackers, $defensers, $supporters);

        while (!empty($availableHeroes)) {
            $team = new Team();
            $team->setTeamname($this->faker->unique()->word());

            $numMembers = min(mt_rand(1, 2), count($availableHeroes));

            for ($i = 0; $i < $numMembers; $i++) {
                if (empty($availableHeroes)) {
                    break;
                }

                $randomHeroKey = array_rand($availableHeroes);
                $randomHero = $availableHeroes[$randomHeroKey];

                unset($availableHeroes[$randomHeroKey]);
                $availableHeroes = array_values($availableHeroes);

                if ($randomHero->getCategory() === "Attaque") {
                    $team->setAttacker($randomHero);
                } elseif ($randomHero->getCategory() === "Defense") {
                    $team->setDefenser($randomHero);
                } else {
                    $team->setSupporter($randomHero);
                }
            }
            $team->setRepresentationImage("");

            $manager->persist($team);
        }

        $manager->flush();
    }
}
