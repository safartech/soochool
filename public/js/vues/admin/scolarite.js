
/**
 * Created by Aleck on 11/12/2018.
 *
 */

import {url} from '../../base_url.js'
let instance = axios.create({
    baseURL : url
});

let Scolarites={
    template:"#scolarites",
    data(){
        return {
            scolarites:[

            ],
            updateScolarite:{},
            newScolarite:{
                solde:'',
                niveau_id:'',
                niveaux:{},
            },

        }
    },
    methods:{

        showEditorModal(scolarite){

            this.updateScolarite=scolarite;
            $('#form-bp2').modal('show')


        },

        addScolarite(){

            instance.post('add_scolarite',this.newScolarite).then(res=> {
                $.gritter.add({
                    title:"BRAVO",
                    time:4000,
                    text:"Le solde   été Ajouté avec succes.",
                    class_name:"color success"});

                this.loadDatas();
            }).catch(err=>{
                console.log(err)
                $.gritter.add({
                    title:"Erreur!!!!",
                    time:4000,
                    text:"Le solde  n'a pas été Ajouté. Réesayer SVP!",
                    class_name:"color danger"});
            })


        },

        updatescolarite(){
            instance.put('update_scolarite/'+this.updateScolarite.id,this.updateScolarite).then(res=> {

                console.log(res.data);
                $.gritter.add({
                    title:"Modification",
                    time:2000,
                    text:"Modification effectué avec Success.",
                    class_name:"color success"});
                this.loadDatas();
            }).catch(err=>{
                console.log(err)
                $.gritter.add({
                    title:"Modification",
                    time:2000,
                    text:"Echec de la Modification.",
                    class_name:"color danger"});
            })
        },
        loadDatas(){
            instance.get('load_scolarite').then(res=>{

                this.scolarites=res.data.scolarite
                this.niveaux=res.data.niveau
                console.log(niveau);




            }).catch(err=>{
                console.log(err.response.data);
            })
        }

    },
    mounted(){
        this.loadDatas();
    }

    ,
    computed:{

    }
}
new Vue(
    {
        el:"#app",
        data:{

        },
        methods: {

        },
        components:{
            Scolarites
        }


    }

)

