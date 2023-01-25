@extends('layouts.app')

@section('content')

<div>
    <h1 class="text-center text-green"><small>Bienvenue sur le site CPJLM-CONSEIL</small></h1>
</div>

<section class="banner-block">
    <div class="container-fluid p-2" id="banner">
        <h1 class="text-light text-center py-4">Audit Expertise Conseil</h1>
        <h2 class="text-light px-4 text-responsive">
            Des compétences multiples, la proximité et réactivité pour tous vos projets en Sécurité, Qualité et
            environnement.

            Au travers de missions d’Audit, d’Expertise, de Conseil et de Formation, CPJLM-CONSEIL aide aussi les
            entreprises et les collectivités locales dans La prise en compte de l’impact environnemental de leurs
            activités, l’évaluation de cet impact et sa réduction.

            Réduire vos coûts, accroître votre compétitivité, détecter de nouvelles opportunités, homogénéiser vos
            pratiques, réduire vos risques, valoriser vos produits … les avantages d’une politique qualité
            structurée
            sont aujourd’hui indéniables.

            Qualité de produit, de service, d’organisation… Les compétences de CPJLM-CONSEIL permettent d’intervenir
            sur
            l’ensemble des systèmes qui composent le Management de la Qualité, la Sécurité et de l’Environnement
        </h2>
    </div>
</section>

<section class="services-block">
    <div class="container-fluid">
        <h1 class="text-center">
            Nos Services
        </h1>
        <div class="row my-5">
            <div class="col-sm-4 text-center">
                <h1 class="text-green">
                    Audit
                </h1>
                <p>
                    Nous faisons des diagnostics en audit interne et audit externe pour
                    verifier si la démarche adoptée et l'échange des informations entre la
                    société et le client/partenaire sont conformes à la réglementation.
                </p>
            </div>

            <div class="col-sm-4 text-center">
                <h1 class="text-green">
                    Expertise
                </h1>
                <p>
                    Pour chaque réclamation, nous relevons la description du défaut
                    faite par le particulier. Ensuite nous faisons des analyses profondes du
                    défaut et enfin nous faisons parvenir un compte-rendu d'analyse en guise de conclusion
                </p>
            </div>

            <div class="col-sm-4">
                <h1 class="text-center text-green">
                    Conseil
                </h1>
                <p>
                    Nous apporterons les informations necessaires afin que la démarche
                    adoptée vous permette d'atteindre les objects fixés.
                </p>
            </div>

        </div>
    </div>
</section>

<script type="text/javascript">
    $('section').toggleClass('my-4');
</script>
@endsection
