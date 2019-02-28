/**
 * Created by User on 10/01/2019.
 */
import {url} from '../../base_url.js'
let ajax = axios.create({
    baseURL : url
});

let interventions = {
    template:'#interventions',
    data(){
        return {
            classes:[],
            interventions:[],
            profs:[],
            matieres:[],
            currentClasse:{},
            currentMatiere:{},
            currentProf:{},
            currentIntervention:{
                classe_id:0,
                matiere_id:0,
                personnel_id:0,
            },
            selectedProf:{},
            selectedMatiere:{},
            selectedClasses:[],
            multipleIntevention:{
                prof_id:0,
                matiere_id:0,
                classes:[]
            }
        }
    },
    mounted(){
        // alert()
        this.initView()
        this.loadDatas()
    },
    computed:{
        interventionReadyForSetting(){
            return this.notNullable(this.currentIntervention.classe_id) &&
                this.notNullable(this.currentIntervention.matiere_id) &&
                this.notNullable(this.currentIntervention.personnel_id)
        }
    },
    methods:{
        notNullable(data){
          return data!=null && data!=0 && data!=""
        },
        reload(){
          this.loadDatas()
        },
        initView(){
            $('#select2-classes')
            // init select2
                .select2()
                .trigger('change')
                // emit event on change.
                .on('change',(e)=> {
                    this.onClassesChange($('#select2-classes').val())
                });
            $('#select2-matiere')
            // init select2
                .select2()
                .trigger('change')
                // emit event on change.
                .on('change',()=> {
                    // alert(this.value)
                    this.onMatiereChange($('#select2-matiere').val())
                });
            $('#select2-prof')
            // init select2
                .select2()
                .trigger('change')
                // emit event on change.
                .on('change', ()=> {
                    // alert(this.value)
                    this.onProfChange($('#select2-prof').val())
                });

        },
        loadDatas(){
            ajax.get('load_interventions').then(res=>{
                console.log(res.data);
                this.classes = res.data.classes
                this.interventions = res.data.interventions
                this.profs = res.data.profs
                this.matieres = res.data.matieres
            }).catch(err=>{
                console.log(err.response.data)
            })
        },
        getInterventionProfName(classeId,matId){
            let classe = this.classes.find(c=>c.id==classeId)
            let matiere = classe.niveau.matieres.find(m=>m.id==matId)
            let interv = matiere.interventions.find(i=>i.classe_id==classeId&&i.matiere_id==matId)
            // console.log("ii",interv)
            return (interv==null)?"":interv.prof.nom_complet
        },
        getInterventionProf(classeId,matId){
            let classe = this.classes.find(c=>c.id==classeId)
            let matiere = classe.niveau.matieres.find(m=>m.id==matId)
            let interv = matiere.interventions.find(i=>i.classe_id==classeId&&i.matiere_id==matId)
            return (interv==null)?"":interv.prof
        },
        showInterventionSetterModal(classe,matiere){
            this.currentClasse = classe
            this.currentMatiere = matiere;
            this.currentProf = this.getInterventionProf(classe.id,matiere.id)
            this.currentIntervention.classe_id=classe.id
            this.currentIntervention.matiere_id=matiere.id
            this.currentIntervention.personnel_id=this.currentProf.id
            $('#interv-setter-modal').modal('show')
        },
        setIntervention(){
            ajax.post('set_intervention',this.currentIntervention).then(res=>{
                console.log(res.data)
                $.gritter.add({
                    title:"Modification",
                    time:2000,
                    text:"Modification effectué avec Success.",
                    class_name:"color success"});
                this.reload()
            }).catch(err=>{
                console.log(err.response.data)
                $.gritter.add({
                    title:"Modification échouée",
                    time:4000,
                    text:"Une erreur s'est produite lors cette modification.",
                    class_name:"color danger"});
            })
        },
        onProfChange(id){
            this.selectedProf = id
        },
        onClassesChange(array){
            this.selectedClasses = array
        },
        onMatiereChange(id){
            this.selectedMatiere = id
        },
        createMultipleIntervention(){
            console.log($('#select2-classes').val())
            ajax.post('create_multiple_interventions',[this.selectedProf,this.selectedMatiere,this.selectedClasses]).then(res=>{
                console.log(res.data)
            }).catch(err=>{
                console.log(err.response.data)
            })
        }
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
            interventions
        }
    },
);