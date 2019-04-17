/**
 * Created by Aleck on 11/12/2018.
 *
 */

import {url} from '../../base_url.js'
let instance = axios.create({
    baseURL : url
});

let Responsables={
    template:"#responsables",
    data(){
        return {
            responsables:[

            ], newResponsable:{
                nom:'',
                prenoms : '',
                profession:'',
                sexe:'F',
                code_postal:'',
                email:'',
                bureau:'',
                domicile:'',
                adresse:'',
                nom_complet: '',


            },/*newResponsable:{
                nom:'',
                prenoms : 'aezae',
                profession:'zae',
                sexe:'F',
                code_postal:'aze',
                email:'zre',
                bureau:'dsf',
                domicile:'aze',
                adresse:'aze',
                nom_complet: '',


            },*/
            updateResponsable:{},
            deleteResponsable:{},
        }
    },
    methods:{

        addResponsable(){

            this.newResponsable.nom_complet=this.nomComplet,
            instance.post('add_responsable',this.newResponsable).then(res=> {

                toastr.success("Le Responsable "+this.newResponsable.nom+''+this.newResponsable.prenoms+" a été Ajouté avec Success")

                this.responsables.push(res.data);
                this.loadDatas();
            }).catch(err=>{
                toastr.error("Erreur d'ajout")
            })


        },

        del(){

            instance.get('delete_responsable/'+this.deleteResponsable.id).then(res=>{
                this.loadDatas()

                toastr.success("Le Responsable "+this.deleteResponsable.nom+' '+this.deleteResponsable.prenoms+" a été supprimer avec Success")
            }).catch(err=>{

                toastr.error("Erreur de Supppression du Responsable"+this.deleteResponsable.nom+' '+this.deleteResponsable.prenoms)

            })
        },

        showDeleteModal(responsable){
            this.deleteResponsable=responsable;
            $('#mod-danger').modal('show')
        },


        showEditorModal(responsable){

            this.updateResponsable=responsable;
            $('#form-bp2').modal('show')


        },

        updateresponsable(){


            this.updateResponsable.nom_complet=this.nomComplets,
            instance.put('update_Responsable/'+this.updateResponsable.id,this.updateResponsable).then(res=> {

                toastr.success("Modification effectuée avec success")
                this.loadDatas();
            }).catch(err=>{
                toastr.error("Erreur de Modification")
            })
        },

        loadDatas(){

            instance.get('load_responsables').then(res=>{
                console.log(res.data);
                this.responsables=res.data
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
        nomComplet(){
            return this.newResponsable.nom+' '+this.newResponsable.prenoms
        },
        nomComplets(){
            return this.updateResponsable.nom+' '+this.updateResponsable.prenoms

        }
    }
}
new Vue(
    {
        el:"#app",
        data:{},
        methods: {

        },
        components:{
            Responsables
        }


    }

)
