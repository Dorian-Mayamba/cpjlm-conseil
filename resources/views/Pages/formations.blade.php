@extends('layouts.app')

@section('content')
<div class="text-green">
	<h1 class="text-center">Formations</h1>
</div>
<section class="my-4" id="trainee-banner">
	<div class="trainee-text">
		<h1 class="text-light text-center py-3"><small>Qualité-Sécurité et Environnement</small></h1>
	</div>
</section>

<div class="intro-formations">
	<p class="px-5 py-2">
		Se former à la Qualité, à la Sécurité, à l’Environnement : CPJLM-CONSEIL réalise des <strong>formations de type intra entreprise</strong> dans le domaine QSE. Notre société a développé différents <strong>modules de formation</strong> basés sur une pédagogie « apprenante » au service des stagiaires (ISO 9001, Audit, Processus, consultant qualité, école QSE) :
	</p>
</div>

<div class="formations">
	<h1 class="formation-headings"><small><a class="formations-links" href="http://qualinove.fr/produit/formation-auditeurs-qualite/">Formation des auditeurs Qualité (QSE) internes :</a></small></h1>
	<p class="formations-paragraphes">Cette formation permet aux futurs auditeurs internes de connaître et de mettre en pratiques les techniques pour auditer un Système de Management Qualité (S/E) dans une logique conformité et efficacité.</p>
</div>

<div class="formations">
	<h1 class="formation-headings"><small><a class="formations-links" href="http://qualinove.fr/produit/formation-optimiser-systeme-qualite/">Optimiser sa démarche processus :</a></small></h1>
	<p class="formations-paragraphes">Cette formation permet de faire une évaluation sur la démarche processus pour renforcer le pilotage. L’approche pédagogique permet de tester en situation réelle les outils proposés.</p>
</div>

<div class="formations">
	<h1 class="formation-headings"><small><a class="formations-links" href="http://qualinove.fr/catalogue/#62">Se former à distance : </a></small></h1>
	<p class="formations-paragraphes">
		Notre Cabinet conseil qualité sécurité environnement propose toute une gamme de formation à distance dans le domaine de la Qualité et de la norme ISO 9001 2015. Elles permettent d’assimiler les exigences de <strong class="def">la norme ISO 9001</strong> version 2015 en conjuguant une expertise technique et une vulgarisation des concepts par de nombreuses mises en situation, des exemples, des cas pratiques, …. Ces formations à distance sont accessibles via une plateforme d’apprentissage pédagogique (en mode e-learning) avec possibilité d’avoir une assistance personnalisée par l’intermédiaire d’un formateur à distance pour suivre le déroulement des leçons et répondre aux interrogations … l’apprenant n’est plus seul dans le suivi de son parcours pédagogique… Nos formations ont été développées en intégrant de nombreuses images et des voix qui permettent de commenter chaque diapositive. Cette approche rend vivante la formation en vous mettant vraiment en situation d’acteurs de votre propre apprentissage.
	</p>
</div>

<div class="formations">
	<h1 class="formation-headings"><small><a class="formations-links" href="http://qualinove.fr/produit/formation-iso-9001-en-ligne/">La formation e-learning ISO 9001 version 2015 version complète:</a></small></h1>
	<p class="formations-paragraphes">
		Cette formation permet de se former à son rythme et de pouvoir assimiler dans le temps de nouvelles compétences en management Qualité. En effet, les formations condensées (de type intra-entreprise ou inter-entreprises) peuvent s’avérer parfois inadaptées au regard des objectifs pédagogiques.
	</p>
</div>

<script type="text/javascript" src="{{ asset('js/formations/formations.js') }}"></script>


@endsection

