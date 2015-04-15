<?php

// Set attribute category

$attr_set = AttributeSet::getByHandle('ml');
if( !is_object($attr_set) ) {
	$akCat = AttributeKeyCategory::getByHandle('collection');
	$akCat->setAllowAttributeSets(AttributeKeyCategory::ASET_ALLOW_SINGLE);
	$akCatSet = $akCat->addSet('ml', t('Mentions légales'), $pkg);
}

// Add attribute
$ak = CollectionAttributeKey::getByHandle('ml_entreprise');
if( !is_object($ak) ) {
	CollectionAttributeKey::add(AttributeType::getByHandle('text'), array('akHandle' => 'ml_entreprise', 'akName' => t('Nom de l\'entreprise'), 'akIsSearchable' => true, 'akCheckedByDefault' => false), $pkg)->setAttributeSet($akCatSet);
}
// Add attribute
$ak = CollectionAttributeKey::getByHandle('ml_adresse');
if( !is_object($ak) ) {
	CollectionAttributeKey::add(AttributeType::getByHandle('text'), array('akHandle' => 'ml_adresse', 'akName' => t('Adresse de l\'entreprise'), 'akIsSearchable' => true, 'akCheckedByDefault' => false), $pkg)->setAttributeSet($akCatSet);
}
// Add attribute
$ak = CollectionAttributeKey::getByHandle('ml_capital');
if( !is_object($ak) ) {
	CollectionAttributeKey::add(AttributeType::getByHandle('text'), array('akHandle' => 'ml_capital', 'akName' => t('Capital de l\'entreprise'), 'akIsSearchable' => true, 'akCheckedByDefault' => false), $pkg)->setAttributeSet($akCatSet);
}
// Add attribute
$ak = CollectionAttributeKey::getByHandle('ml_tva');
if( !is_object($ak) ) {
	CollectionAttributeKey::add(AttributeType::getByHandle('text'), array('akHandle' => 'ml_tva', 'akName' => t('TVA de l\'entreprise'), 'akIsSearchable' => true, 'akCheckedByDefault' => false), $pkg)->setAttributeSet($akCatSet);
}
// Add attribute
$ak = CollectionAttributeKey::getByHandle('ml_rcs');
if( !is_object($ak) ) {
	CollectionAttributeKey::add(AttributeType::getByHandle('text'), array('akHandle' => 'ml_rcs', 'akName' => t('RCS de l\'entreprise'), 'akIsSearchable' => true, 'akCheckedByDefault' => false), $pkg)->setAttributeSet($akCatSet);
}
// Add attribute
$ak = CollectionAttributeKey::getByHandle('ml_siret');
if( !is_object($ak) ) {
	CollectionAttributeKey::add(AttributeType::getByHandle('text'), array('akHandle' => 'ml_siret', 'akName' => t('SIRET de l\'entreprise'), 'akIsSearchable' => true, 'akCheckedByDefault' => false), $pkg)->setAttributeSet($akCatSet);
}
// Add attribute
$ak = CollectionAttributeKey::getByHandle('ml_annee');
if( !is_object($ak) ) {
	CollectionAttributeKey::add(AttributeType::getByHandle('number'), array('akHandle' => 'ml_annee', 'akName' => t('Année de création du site'), 'akIsSearchable' => true, 'akCheckedByDefault' => false), $pkg)->setAttributeSet($akCatSet);
}
// Add attribute
$ak = CollectionAttributeKey::getByHandle('ml_responsable_publication');
if( !is_object($ak) ) {
	CollectionAttributeKey::add(AttributeType::getByHandle('text'), array('akHandle' => 'ml_responsable_publication', 'akName' => t('Responsable de publication du site'), 'akIsSearchable' => true, 'akCheckedByDefault' => false), $pkg)->setAttributeSet($akCatSet);
}

$nom = $c->getAttribute('ml_entreprise');
$adresse = $c->getAttribute('ml_adresse');
$capital = $c->getAttribute('ml_capital');
$tva = $c->getAttribute('ml_tva');
$rcs = $c->getAttribute('ml_rcs');
$siret = $c->getAttribute('ml_siret');
$annee = $c->getAttribute('ml_annee');
$responsable = $c->getAttribute('ml_responsable_publication');
?>

<h1>Mentions légales</h1>

<h2>Informations générales</h2>

<p>Propriétaire : <?php echo $nom ?>

Adresse : <?php echo $adresse ?>

<?php if ($capital) echo "Capital social: $capital<br />"; ?>
<?php if ($tva) echo "Numéro TVA: $tva<br />"; ?>
<?php if ($rcs) echo "RCS: $rcs<br />"; ?>
<?php if ($siret) echo "SIRET: $siret<br />"; ?>
<?php if ($annee) echo "Année de création du site: $annee<br />"; ?>
<?php if ($responsable) echo "Responsable de publication: $responsable<br />"; ?>

Ce site a été créé par : <a href="http://www.coteo.net/" target="_blank">Agence Coteo</a>
Ce site est maintenu par : <a href="http://www.coteo.net/" target="_blank">Agence Coteo</a>
</p>



<h2>Contenu du site</h2>

<p>On entend par contenu du site la structure générale, les textes, les images animées ou non, et les sons dont le site est composé.
<?php echo $nom ?> se réserve le droit de modifier ou de corriger le contenu de ce site à tout moment et sans préavis.</p>


<h2>Conception technique du site</h2>

<p>La conception des pages du site a été réalisée pour une résolution à l'écran de l'ordinateur de l'utilisateur de 1024*768 en milliers de couleurs ou plus.
Pour l'affichage de certains documents proposés au format PDF ou flash l'ordinateur de l'internaute doit disposer d'un logiciel tel que Acrobat Reader, et d'un plug-in flash téléchargeables gratuitement sur le site www.adobe.fr
Les informations affichées sur l'écran de l'internaute sont au format HTML.</p>


<h2>Décharge de responsabilité</h2>

<p><?php echo $nom ?> n’est tenue que d’une simple obligation de moyens concernant les informations qu’elle met à disposition des personnes qui accèdent à son site Internet.
Alors même que nous avons effectué toutes les démarches pour nous assurer de la fiabilité des informations contenues sur ce site Internet, <?php echo $nom ?> ne peut encourir aucune responsabilité du fait d’erreurs, d’omissions, où pour les résultats qui pourraient être obtenus par l’usage de ces informations. Notamment, l’usage des liens hypertextes peut conduire votre consultation de notre site vers d’autres serveurs pour prendre connaissance de l’information recherchée, serveurs sur lesquels <?php echo $nom ?> n’a aucun contrôle.</p>


<h2>Droits de propriété intellectuelle</h2>

<p>Conformément au code de la propriété intellectuelle, l’internaute dispose exclusivement :
- D’un droit d'usage privé, personnel et non transmissible sur le contenu du site ou de l'un de ses éléments ;
- D’un droit de reproduction pour stockage aux fins de représentation sur un écran mono poste et de reproduction, en un exemplaire, pour copie de sauvegarde ou tirage sur papier.
Tout autre usage est soumis à l'autorisation express préalable de <?php echo $nom ?> ou des producteurs de contenus concernés. Il en est ainsi de toute représentation et/ou reproduction, même partielle du contenu de ce site et/ou de l'un de ses éléments et notamment :
- A des fins commerciales et/ou publicitaires et/ou de distribution ;
- A des fins d’utilisation de l'un des éléments du site dans un environnement informatique en réseau. Sont notamment interdites la présentation d'une page de ce site dans un cadre n'appartenant pas à <?php echo $nom ?> (par la technique du « framing ») ainsi que l'insertion d'une image appartenant à <?php echo $nom ?> dans une page n'appartenant pas à <?php echo $nom ?> (par la technique du « in line linking ») ;
- L’extraction répétée et systématique d'éléments protégés ou non du site causant un préjudice quelconque à <?php echo $nom ?> ou aux producteurs de contenus. Sont notamment visés les éléments protégés par les articles L 341-1 et suivants du Code de la Propriété Intellectuelle.
<?php echo $nom ?> avise les utilisateurs de ce site que de nombreux éléments de ce site :
a) sont protégés par la législation sur le droit d'auteur : ce peut être notamment le cas des photographies, des articles, des dessins, des séquences animées,...;
b) et/ou sont protégés par la législation sur les dessins et modèles ;
c) sont protégés par la législation sur les marques.
Les éléments ainsi protégés sont la propriété de <?php echo $nom ?> ou de tiers ayant autorisé <?php echo $nom ?> à les exploiter.
A ce titre, toute reproduction, représentation, utilisation, adaptation, modification, incorporation, traduction, commercialisation, partielles ou intégrales par quelque procédé et sur quelque support que ce soit (papier, numérique, ...) sont interdites, sans l'autorisation écrite préalable de <?php echo $nom ?>, hormis les exceptions visées à l'article L 122.5 du Code de la Propriété Intellectuelle, sous peine de constituer un délit de contrefaçon de droit d'auteur et/ou de dessins et modèles et/ou de marque. La violation de ces dispositions peut entraîner l’application des sanctions pénales et civiles prévues par la législation en vigueur. (puni de deux ans d'emprisonnement et de 150 000 € d’amende à cette date).
Droits d'auteur et/ou Droits sur les Dessins et Modèles
Le présent site constitue une oeuvre dont <?php echo $nom ?> est l'auteur au sens des articles L. 111.1 et suivants du Code de la propriété intellectuelle. La conception et le développement dudit site ont été assurés par la société Coteo.
Les photographies, textes, slogans, dessins, images, séquences animées sonores ou non ainsi que toutes les oeuvres intégrées dans le site sont la propriété de <?php echo $nom ?> ou de tiers ayant autorisés <?php echo $nom ?> à les utiliser.
Les reproductions, sur un support papier ou informatique, dudit site sont autorisées sous réserve qu'elles soient strictement réservées à un usage personnel excluant tout usage à des fins publicitaires et/ou commerciales et/ou d'information et/ou qu'elles soient conformes aux dispositions de l'article L122-5 du Code de la Propriété Intellectuelle.</p>


<h2>La reproduction sur support papier</h2>

<p>A l’exception de l'iconographie, la reproduction des pages de ce site sur un support papier est autorisée, sous réserve du respect des trois conditions suivantes :
- gratuité de la diffusion ;
- respect de l'intégrité des documents reproduits (aucune modification, ni altération d'aucune sorte) ;
- citation explicite de ce site comme source et mention que les droits de reproduction sont réservés et strictement limités.</p>


<h2>La reproduction sur support électronique</h2>

<p>La reproduction de tout ou partie de ce site sur un support électronique est autorisée sous réserve de l'ajout de façon claire et lisible de la source et de la mention "Droits réservés".
Les informations utilisées ne doivent l'être qu'à des fins personnelles, associatives ou professionnelles.</p>


<h2>Protection des données personnelles</h2>

<p>La consultation du site est possible sans que vous ayez à révéler votre identité ou toute autre information à caractère personnel vous concernant.
Concernant les informations à caractère nominatif que vous seriez amenés à nous communiquer, vous bénéficiez d'un droit d'accès et de rectification conformément à la loi française Informatique et Liberté n° 78-17 du 6 janvier 1978. Vous pouvez exercer ce droit auprès de <?php echo $nom ?> – 2 Rue des Coins 62100 CALAIS - 7 Rue du Camp de Droite 62200 BOULOGNE SUR MER - Créanor 2 Route de Bergues 59412 COUDEKERQUE BRANCHE – 62100 – calais.
La collecte de ces informations est nécessaire pour répondre à vos demandes d’offres commerciales et vous adresser, le cas échéant, une lettre d'information électronique.
Si vous êtes abonnés à des services d'information par courrier électronique (" newsletter ") vous pouvez demander à ne plus recevoir ces courriers.</p>


<h2>Sécurité</h2>

<p>Nous prenons toutes les précautions utiles afin de préserver l’intégrité des données, leur confidentialité et empêcher toute communication à des tiers non autorisés.</p>


<h2>Limitation de responsabilité</h2>

<p>Vous utilisez ce site sous votre seule et entière responsabilité. <?php echo $nom ?> ne pourra être tenue pour responsable des dommages directs ou indirects, tels que, notamment, préjudice matériel, pertes de données ou de programmes, préjudice financier, résultant de l'utilisation de ce site ou de sites qui lui sont liés.</p>


<h2>Mise à jour</h2>

<p><?php echo $nom ?> se réserve le droit de modifier et de mettre à jour, sans préavis, les présentes mentions légales et tous les éléments, produits présentés sur le site.
	L'ensemble de ces modifications s'impose aux internautes qui doivent consulter les présentes Conditions Générales lors de chaque connexion.</p>
