@extends('frontend.layouts.master')


@section('head')
    <title>Le Boukarou</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">
            <div class="row mt-20">
                <div class="">
                    <div class="head-desc">
                        <p>L’accompagnement au Boukarou se déploie autour de 3 axes</p>
                        <div class="col-sm-12 title">3 programmes, du développement de l’idée au changement d’échelle</div>
                    </div>
                    <div class="container">
                    	<div class="row">
                    	<ul>
                    		<div class="col-lg-4 col-md-4 Services-tab item">
                    			<div class="folded-corner service_tab_1">
                    				<div class="text">
                    					<i class="ion-settings"></i>
                    						<p class="item-title">
                    								<h3>Madiba (pré-incubation)</h3>
                    							</p><!-- /.item-title -->
                                                <p>i. <b> <u>Principe</u> </b>: sur la thématique choisie, nous allons donc vous accompagner à rechercher et comprendre la problématique
                                                la plus importante, pour l’humain, à résoudre pour espérer plus tard faire émerger la meilleure solution.</p>
                                                <p>ii.	<b> <u>Objectifs</u> </b>: définir le problème et trouver la solution adéquate. l’objet de la démarche entrepreneuriale est la réponse à un problème identifié.  donc avec notre aide, vous allez vous assurer que selon la thématique
                                                    choisie, l’idée que vous vous apprêtez à développer a le potentiel pour séduire le plus grand nombre.</p>
                    				</div>
                    			</div>
                    	    </div>
                    		<div class="col-lg-4 col-md-4 Services-tab item">
                    			<div class="folded-corner service_tab_1">
                    				<div class="text">
                    					<i class="ion-help-buoy"></i>
                    						<p class="item-title">
                    							<h3>Mpodol (incubation)</h3>
                    						</p><!-- /.item-title -->
                                            <p>i.	<b> <u>Principe</u> </b>: Période pendant laquelle l’idée devient véritablement l’objet de la démarche entrepreneuriale : nous allons
                                                t’aider à confirmer ou infirmer les différentes hypothèses et avoir un retour direct et réel du terrain</p>
                                            <p>ii.	<b> <u>Objectifs</u> </b>: Avoir un produit qui répond aux attentes du marché, une équipe projet structurée prête à répondre à tous les défis de la société, avoir un premier track record, c’est-à-dire des
                                                premiers clients et les premières rentrées d’argents et être prêt pour accueillir les premiers financements.</p>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="col-lg-4 col-md-4 Services-tab item">
                    			<div class="folded-corner service_tab_1">
                    				<div class="text">
                    					<i class="ion-clipboard"></i>
                    						<p class="item-title">
                    							<h3>mandingue (accélération)</h3>
                    						</p><!-- /.item-title -->
                                            <p>i.	<b> <u>Principe</u> </b>: changer d’échelle ! programme court visant à solidifier l’entreprise
                                                et à la faire grandir via des partenariats stratégiques et/ou des investissements externes.</p>
                                            <p>ii.	<b> <u>Objectifs</u> </b>: Transformer l’équipe pour qu’elle corresponde à la taille de l’entreprise recherchée ; Augmenter l’activité
                                                existante pour que la valeur de l’entreprise et du marché atteint, augmentent ; être ready to be finance</p>
                    				</div>
                    			</div>
                    		</div>
                    	   </ul>
                    	</div>
                    </div>


                    <div class="head-desc">
                        <div class="col-sm-12 title">une pédagogie structurée sur 3 éléments essentiels</div>
                    </div>
                    <div class="container">
                    	<div class="row">
                    	<ul>
                    		<div class="col-lg-4 col-md-4 Services-tab item">
                    			<div class="folded-corner service_tab_1">
                    				<div class="text">
                    					<i class="ion-bag"></i>
                                                <p>i.	<b> <u>Go to market</u> </b>: Il faut aller sur le marché dès le début du développement, et s’adapter
                                                    soi-même ainsi que son produit en fonction des retours des différentes parties prenantes.</p>


                    				</div>
                    			</div>
                    	    </div>
                    		<div class="col-lg-4 col-md-4 Services-tab item">
                    			<div class="folded-corner service_tab_1">
                    				<div class="text">
                    					<i class="ion-wand"></i>
                                                <p>ii.	<b> <u>L’intelligence collective et collaborative</u> </b>: Il faut mutualiser les talents et
                                                    les interactions pour accroitre les performances et aboutir à des solutions. </p>
                    				</div>
                    			</div>
                    	    </div>
                    		<div class="col-lg-4 col-md-4 Services-tab item">
                    			<div class="folded-corner service_tab_1">
                    				<div class="text">
                    					<i class="ion-filing"></i>
                                                <p>iii.	<b> <u>Etre connecté à son écosystème</u> </b>: il faut être en alerte et rester informé
                                                    sur toutes les actualités utiles et indispensables pour le développement de nos idées, projets.</p>
                    				</div>
                    			</div>
                    	    </div>

                    	   </ul>
                    	</div>
                    </div>


                    <div class="head-desc">
                        <div class="col-sm-12 title">Un suivi individualisé, collectif et intégré</div>
                    </div>
                    <div class="container">
                    	<div class="row">
                    	<ul>
                    		<div class="col-lg-12 col-md-12 Services-tab item">
                    			<div class="folded-corner service_tab_1">
                    				<div class="text">
                    					<i class="ion-hammer"></i>
                                        <p>la co construction du parcours est essentielle : nous permettons à
                                                chacun d’être sa propre chance et de construire son avenir</p>
                    				</div>
                    			</div>
                    	    </div>

                    	   </ul>
                    	</div>
                    </div>

                    <div class="join text-center">
                        <a class="btn btn-md btn-primary" href="/boukarians/nous-rejoindre">
                            <i class="ion-log-in"></i>  Nous Rejoindre
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- fin programmes d'accompagnement  --}}

@endsection
