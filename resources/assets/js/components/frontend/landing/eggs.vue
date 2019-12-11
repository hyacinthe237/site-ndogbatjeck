<template lang="html">
    <section>
        <div class="_eggs">
            <div class="row">
                <div class="col-sm-12">
                    <div class="intro">
                        Trouver des solutions aux besoins de l'humain, lui donner les moyens d’incarner son avenir :
                        tel est notre crédo. Nous vous donnons au moins 9 raisons de le faire ensemble, peu importe le coût.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4" v-for="e in eggs">
                    <div class="_egg" @click="selectEgg(e)">
                        <img :src="e.image" class="img-responsive">
                        <div class="_egg-text" >
                            {{ e.title }}
                        </div>
                    </div>
                </div>

                <DescriptionModal :element="egg"></DescriptionModal>
            </div>
        </div>
    </section>
</template>

<script>
import DescriptionModal from '../../../commons/modals/description'

export default {
    components: { DescriptionModal },
    data: () => ({
        egg: {},
        eggs: []
    }),

    mounted () {
        this.makeEggs()
    },

    methods: {
        selectEgg (egg) {
            this.egg = egg

            setTimeout(() => {
                $('#DescriptionModal').modal({ show: true})
            }, 150)
        },

        displayDesc (egg) {
            return this.egg == egg
        },

        makeEggs () {
            this.eggs = [
                {
                    id: 1,
                    title: 'L’Humain',
                    image: '/assets/img/eggs/01.jpg',
                    desc: 'L’humain est au centre de nos préoccupations, actions et comportements. Notre engagement lui est dédié. La satisfaction de ses besoins réels est un impératif, lui permettre de mieux vivre une priorité.'
                },

                {
                    id: 2,
                    title: 'L’Ecosystème',
                    image: '/assets/img/eggs/02.jpg',
                    desc: 'Chez nous, au Boukarou, l’intelligence collaborative et collective ne sont pas des concepts : elles sont des organes vitaux de notre corps. Nous partageons tout : -	les échecs parce qu’ils sont l’un des meilleurs moyens de savoir comment  faire mieux; -	les réussites ou plutôt le parcours de chacune de ces réussites pour que nous croyons au pouvoir de la pensée positive commune; -	les talents pour leur capacité, si elle est mise en œuvre, à faire passer un cap. Nous développons un écosystème d’impact au sein duquel les différentes parties prenantes doivent coopérer pour donner les moyens à une innovation durable et responsable d’émerger.'
                },
                {
                    id: 3,
                    title: 'L’Ambition',
                    image: '/assets/img/eggs/03.jpg',
                    desc: 'Nous ne nous cachons pas : nous voulons créer le bonheur et changer le monde. Pour y arriver, nous voulons porter ce message à tous les niveaux et surtout celui des jeunes et  des femmes, et les pousser à l’action. Nous voulons réveiller les génies, tous ces talents puissants qui vont développer des choses qui contribuent à notre bien-être commun. Notre volonté est donc claire : Aider à créer des marques fortes, aux standards élevés qui vont être compétitives et concurrentielles tant au niveau local que international. Une part de notre ambition se situe là, faire réaliser et faire consommer du 237 dans tous les domaines.'
                },
                {
                    id: 4,
                    title: 'Le Réalisme',
                    image: '/assets/img/eggs/04.jpg',
                    desc: '«  Life is not a Joke, Entrepreneurship is not a Game » est une phrase qui correspond bien à l’écosystème de l’entrepreneuriat au Cameroun, voir même au-delà. Notre présence aussi bien  digitale que sur le terrain,  nous a permis de tester, confronter nos idées, nos positions et celles de toutes les parties prenantes concernées. Il ya différents points que nous souhaitons signaler à l’attention de toutes les personnes, physiques ou morales, qui veulent nous côtoyer ou nous rejoindre : Être entrepreneur pour nous, ce n’est pas être une star car cette posture ne cadre pas avec l’esprit de notre démarche, avec nos convictions; Ne pas financer les TPE/PME est une erreur et a une conséquence claire : la mort de notre économie dans les 10 ans à venir; Développer l’économie numérique sans structurer l’économie réelle, sans comprendre les acteurs du quotidien, revient à faire du pain sans farine.'
                },

                {
                    id: 5,
                    title: 'Le Pragmatisme',
                    image: '/assets/img/eggs/05.jpg',
                    desc: 'Il faut rêver et avoir des projets ambitieux ; mais encore faudrait-il que ces projets ambitieux apportent une réponse aux besoins des Camerounais qui sont nombreux (les camerounais et les besoins). Oui nous savons que ce n’est pas exactement le mindset ambiant ; Oui il faut penser à la scalabilité sur d’autres territoires comme le M-PESA. Oui, enfin, il faut suivre l’adage « Think Global, Act Local ». Nous sommes un peu disruptif, notamment en marge de cet adage qui exprime un mindset global, et finalement souvent peut local : il provoque en effet la création de beaucoup de copie de l’existant ailleurs avant d’être source d’innovation locale. Nous disons et nous assumons parfaitement cela «  Think Useful, Act smart » : C’est le meilleur moyen pour espérer lever du financement de base, car c’est concret. Si ça marche à domicile, ça crée des records qui vont permettre d’aller chercher la confiance des investisseurs et ainsi se développer.'
                },
                {
                    id: 6,
                    title: 'Le Réseau',
                    image: '/assets/img/eggs/06.jpg',
                    desc: 'Réussir à implémenter son projet nécessite d’en avoir les capacités bien sûr, mais aussi de rencontrer la bonne personne, au bon moment, au bon endroit. Aucune des parties prenantes de notre écosystème ne peut faire ça seule. Pour que nous nous construisions ensemble, il y a une nécessité de collaborer et de faire interagir les compétences de chacune des parties. Mais pour le faire, encore faudrait-il que toutes ces parties se connaissent véritablement, se rencontrent pour échanger et ainsi passer à l’action. Au Boukarou, nous faisons ce travail de manière constante et régulière ; nous avons donc la capacité  de connecter chacune des parties prenantes les unes aux autres, dans un esprit collaboratif de réussite efficace.'
                },
                {
                    id: 7,
                    title: 'La Détermination',
                    image: '/assets/img/eggs/07.jpg',
                    desc: 'Le cœur de notre démarche est le changement d’échelle du projet. Nous nous attachons toujours à ce qu’il y ait une progression constante, un dépassement des niveaux. Venez nous rejoindre pour trouver des projets équilibrés lancés dans une démarche positive d’amélioration continue. Nous nous engageons à toujours remplir notre obligation de moyens de vous aider à  atteindre le résultat que vous espérez, voir à le dépasser.'
                },

                {
                    id: 8,
                    title: 'Les Ressources',
                    image: '/assets/img/eggs/08.jpg',
                    desc: 'Ne nous mentons pas, il faut des ressources financières importantes pour, quel que soit le stade de développement, mais ça ne suffit pas et surtout ce n’est pas la ressource préalable : Les porteurs de projets et/ou de structure accompagnés ont besoin de ressources intelligentes qui vont leur permettre de développer leur projet dans le bon sens; Les autres parties prenantes ont-elles besoin d’être rassurées sur la qualité des personnes dont elles doivent soutenir des projets et bien sûr, aussi sur la qualité de leurs projets; Parties prenantes, rassurez-vous nous avons rassemblé, et nous continuons, les meilleures ressources disponibles pour que vous soyez confortées chacune.'
                },
                {
                    id: 9,
                    title: 'La joie',
                    image: '/assets/img/eggs/09.jpg',
                    desc: 'Bon nous sommes aussi une joyeuse bande motivée à réussir. La collaboration est le maître mot. Nous sommes une famille. Les faiblesses que nous avons sont autant de forces qui nous donnent le courage de se préserver, de se protéger, de s’éduquer, pour prospérer ensemble.'
                }
            ]
        }
    }
}
</script>

<style lang="css">
._egg { cursor: pointer }
.desc-egg {
    text-align: justify;
}
</style>
