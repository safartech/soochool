/**
 * Created by Aleck on 17/12/2018.
 */


import {url} from '../../base_url.js'
let instance = axios.create({
    baseURL : url
});

let Personnels={
    template:"#Personnels",

    data(){
        return {

            personnels:[

            ],

            newPersonnel:{
                nom: '',
                prenoms : '',
                sexe:'F',
                diplomes:'',
                adresse:'',
                nom_complet:'',
                quartier:'',
                tel_mobile:'',
                tel_domicile:'',




            },/*newPersonnel:{
                nom: 'fdf',
                prenoms : 'fef',
                sexe:'F',
                diplomes:'dsf',
                adresse:'dsf',
                nom_complet:'',
                quartier:'sdf',
                tel_mobile:'sdf',
                tel_domicile:'sdf',




            },*/
            updatePersonnel:{},
            deletePersonnel:{},
        }
    },
    methods:{


        addPersonnel(){
            //


            this.newPersonnel.nom_complet=this.nomComplet
            instance.post('add_personnel',this.newPersonnel).then(res=> {
                this.personnels.push(res.data);
                toastr.success("Nouveau personnel ajouté",this.newPersonnel.nom+'  '+this.newPersonnel.prenoms+" a été Ajouté avec Success")
                //this.loadDatas();
            }).catch(err=>{
                toastr.error("Erreur d'ajout")

            })


        },

        del(){

            instance.get('delete_personnel/'+this.deletePersonnel.id).then(res=>{
                this.loadDatas(),
                    toastr.success('Suppression',this.deletePersonnel.nom+' '+this.deletePersonnel.prenoms+" a été supprimer avec Success")

            }).catch(err=>{
                toastr.error("Echec de suppression","Une erreure s'est produite")
            })
        },

        showDeleteModal(responsable){
            this.deletePersonnel=responsable;
            $('#mod-danger').modal('show')
        },


        showEditorModal(personnel){

            this.updatePersonnel=personnel;
            $('#form-bp2').modal('show')


        },
        updatepersonnel(){

            this.updatePersonnel.nom_complet=this.nomComplets,
                instance.put('update_personnel/'+this.updatePersonnel.id,this.updatePersonnel).then(res=> {
                    toastr.success('Modification effectuée avec Success')
                }).catch(err=>{
                    toastr.error('Erreur de modification')
                })
        },

        loadDatas(){

            instance.get('load_personnels').then(res=>{
                console.log(res.data);
                this.personnels=res.data
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
            return this.newPersonnel.nom+' '+this.newPersonnel.prenoms
        },
        nomComplets(){
            return this.updatePersonnel.nom+' '+this.updatePersonnel.prenoms

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
            Personnels
        }


    }

)

