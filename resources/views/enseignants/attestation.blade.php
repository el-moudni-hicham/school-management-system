@extends('adminlte::page')
@extends('layouts.app2')
@section('title', 'Attestation | ' . $enseignant->prenom)

@section('content')
    <div class="container" id="exportContent">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card my-5">
                    <div class="card-header ">
                        <img src="{{ asset('img/ena3.png') }}" alt="description of myimage" />
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="card-body">
                        <p class="lead">
                            <pre style="display: inline-block; border:2px solid white;">
                        <b><b>CONVENTION DE VACATION</b></b>
                    L’année universitaire @if (date('m') < 9)
{{ date('Y') - 1 }}/{{ date('Y') }}@else{{ date('Y') }}/{{ date('Y') + 1 }}
@endif
                    {{-- {{\Carbon\Carbon::now()->year - 1}} --}}


<B><U> Entre :</U></B>

L’Ecole Nationale d’Architecture d’AGADIR (ENA-AGADIR), désignée ci-après par
« ENA-AGADIR », sise au complexe universitaire d’Ibn Zohr Hay Dakhla, représentée par
son Directeur Mr TITA Mohammed :

<b><U>D’une part</b></U>



<b><U>Et :</b></U>
<div style="font-weight:bold">
Monsieur                        : {{ $enseignant->nom }} {{ $enseignant->prenom }}
Diplôme                         : @forelse ($enseignant->Diplomes  as $item ) {{$item->libelle}}
                                    @empty
                                    @endforelse

Identification fiscale ou       : ---------------------

Grade et échelle                : @forelse ($enseignant->Diplomes  as $item ) {{$item->theme}}
                                    @empty
                                    @endforelse

Adresse                         : {{ $enseignant->adresse }}
Tél
Bureaux                         :
Domicile                        :
Mobile                          : {{ $enseignant->telephone }}
Fax                             :
E-mail                          : {{ $enseignant->email }}
CIN                             : {{ $enseignant->cin }}
</div>
Désigné ci-après par vacataire
<U><B>D’autre part</b></U>

        IL A ETE CONVENU CE QUI SUIT :

<U><B>ARTICLE 1 : Objet de la convention</B></U>

La présente convention a pour objet la réalisation de vacations semestrielles pour le compte
de l’Ecole Nationale d’Architecture d’AGADIR.

<U><b>ARTICLE 2 : Consistance des vacations</b></U>

Monsieur <b>{{ $enseignant->nom }} {{ $enseignant->prenom }}</b> est sollicité pour assurer des vacations sous forme de cours,
d’encadrements, de formation continue et de travaux divers, ayant trait entre autres, à la
recherche.

<U><b>ARTICLE 3 : Modalités d’exécution des enseignements</b></U>


Le vacataire s’engage à remettre à la Direction le syllabus, annuel ou semestriel, au début de
chaque année universitaire et à respecter les règlements de l’ENA-AGADIR.
A ce titre, il doit respecter le planning des enseignements, assurer le contrôle continu des
connaissances et remettre à la direction des études les notes d’évaluation des élèves après
chaque contrôle et suivant les notes circulaires qui seront établies à cet effet.

Le vacataire s’engage à remettre aux élèves les copies corrigées des contrôles de connaissance
après chaque examen.

Le vacataire s’engage à informer la Direction de l’ENA-AGADIR une semaine au moins à
l’avance de toute indisponibilité ou absence programmée. Il doit proposer en même temps une
date pour le rattrapage destiné à compenser cette absence. Pour toute autre absence imprévue
le rattrapage est obligatoire.
En outre, le vacataire s’engage à :

    -  Fournir un CV, les syllabus des cours et / ou ateliers qu’il encadre.
    -  Fournir une autorisation d’enseignement ou une patente.
    -  Assister aux réunions de coordination et aux conseils de classe.
    -  Encadrer les travaux de recherche, et assister aux jurys de diplôme en tant que
       représentant de l’administration et/ou enseignant de l’ENA-AGADIR
    -  Participer à l’élaboration des programmes d’enseignement et de formation.
    -  Contribuer à l’actualisation des contenus et des méthodes d’enseignement.
    -  Participer à l’animation de la vie scolaire.


<U><b>ARTICLE 4 : Appropriation des résultats</b></U>

Tous résultats des travaux du vacataire, quelque soit leur forme et particulièrement toute note,
rapport, étude et autres documents produits dans le cadre de cette convention, restent la
propriété exclusive de l’ENA-AGADIR.


<U><b>ARTICLE 5 : Indemnités</b></U>

L’Ecole Nationale d’Architecture d’AGADIR (ENA-AGADIR) s’engage à régler les
prestations fournies dans le cadre de la présente convention.
Le montant de la rémunération globale, arrêté conformément aux taux en vigueur, sera calculé
au prorata d’heures d’enseignement réellement fournis.


<U><b>ARTICLE 6 : Secret professionnel</b></U>

Le vacataire s’engage pendant la durée de la convention et après expiration à observer une
discrétion absolue à l’égard de tout fait, information et document dont il a eu connaissance en
raison de l’exercice de ses fonctions ou à l’occasion de celle-ci, il se déclare à cet égard obligé
par la réglementation en vigueur en matière de secret professionnel.


<U><b>ARTICLE 7 : Résiliation</b></U>

Les deux parties peuvent résilier par écrit la présente convention à tout moment avec un mois
de préavis, sans que cela puisse ouvrir droit à une quelconque indemnisation au profit du
vacataire.

L’administration peut prononcer la résiliation sans préavis, en cas de manquement grave aux
règlements de l’ENA-AGADIR et/ou de cette convention.


<U><b>ARTICLE 8 : Litige</b></U>

Tous les litiges découlant de l’exécution de la présente convention seront réglés à l’amiable
ou à défaut portés devant les tribunaux d’AGADIR.


<U><b>ARTICLE 9 : Validité</b></U>

La présente convention concerne le 2ème semestre de l’année universitaire 2020/2021


                            Date :
                            Le vacataire
                            (Lu et accepté en manuscrit)




                            AGADIR, le <b>{{ \Carbon\Carbon::today()->toDateString() }}</b>
                            Présenté par le Directeur de l’ENA-AGADIR




    </pre>
                            <center>
                        </p>
                        {{-- <p>
                    <img src="{{ asset('img/footer1.png') }}" alt="description of myimage"/>
                    </p> --}}
                        <a href="#" id="printPageButton" class="btn btn-sm btn-danger mb-3" onclick="document.getElementById('printPageButton').style.display = 'none';
                        setTimeout(function(){
                            document.getElementById('printPageButton').style.display = 'inline-block';
                        }
                        ,1000
                        )
                        window.print();" class="btn btn-md btn-danger mr-2 mb-2">
                            <i class="fa-solid fa-file-pdf"></i>
                        </a>




                        <a id="printPageButton1" class="btn btn-sm btn-primary mb-3" onclick="Export2Doc('exportContent', 'test'); document.getElementById('printPageButton1').style.display = 'none';
                        setTimeout(function(){
                            document.getElementById('printPageButton1').style.display = 'inline-block';
                        }
                        ,1000
                        )"><i class="fa-solid fa-file-word"></i></a>

                        <script>
                            function Export2Doc(element, filename = '') {
                                var preHtml =
                                    "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
                                var postHtml = "</body></html>";
                                var html = preHtml + document.getElementById(element).innerHTML + postHtml;

                                var blob = new Blob(['\ufeff', html], {
                                    type: 'application/msword'
                                });

                                var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html)

                                filename = filename ? filename + '.doc' : 'document.doc';

                                var downloadLink = document.createElement("a");

                                document.body.appendChild(downloadLink);

                                if (navigator.msSaveOrOpenBlob) {
                                    navigator.msSaveOrOpenBlob(blob, filename);
                                } else {
                                    downloadLink.href = url;

                                    downloadLink.download = filename;

                                    downloadLink.click();
                                }

                                document.body.removeChild(downloadLink);


                            }
                        </script>

                        </center>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
