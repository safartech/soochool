
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
                toastr.success("Scolarité Ajouté avec Success")

                this.loadDatas();
            }).catch(err=>{
                toastr.error("Erreur Ajout Scolarite")

            })


        },

        updatescolarite(){
            instance.put('update_scolarite/'+this.updateScolarite.id,this.updateScolarite).then(res=> {

                toastr.success("Modification effectuée avec Success")
                this.loadDatas();
            }).catch(err=>{
                toastr.error("Erreur Modification")
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

