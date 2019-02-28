/**
 * Created by User on 06/12/2018.
 */
import { url } from '../../base_url.js'

let instance = axios.create({
    baseURL : url
});

let retards = {
    template:'#retards',
    data(){
        return {
            classes:[],
            eleves:[],
            selectedClasse:{},
            selectedClasseId:null,
            selectedEleve:{},
            selectedEleveId:null,
            date_retard:null,
            motif_retard:null,
        }
    },
    mounted(){
      //  moment.locale('fr')
        this.loadDatas()
        this.initView()
    },
    computed:{
        isReady(){
            return this.selectedClasseId !=0
        },

    },
    methods:{
     /*   moment(date){
            return new moment(date).locale('fr')
        },*/
        reload(){ this.loadDatas()},
        initView(){
            $('#select2-classe')
            // init select2
                .select2()
                .trigger('change')
                // emit event on change.
                .on('change',(e)=> {
                    // alert($('#select2-classe').val())
                    this.onClasseChange($('#select2-classe').val())
                });
        },

        loadDatas(){
            instance.get('load_classes_eleves_from_retard').then(resp=>{
                console.log(resp.data)
                this.classes = resp.data.classes
            }).catch(err=>{
                console.log(err.response.data)
            })
        },
        onClasseChange(classeId){
            // alert(classeId)
            this.selectedClasseId = classeId
            this.selectedClasse = this.classes.filter(it=>it.id==classeId)[0]
            this.eleves = this.selectedClasse.eleves
            console.log(this.eleves)
        },
        addRetard(eleve_id){
          this.selectedEleveId=eleve_id
          this.selectedEleve=this.eleves.find(x=>x.id==eleve_id)
    },
        submitRetard(){
            let data={
                eleve_id:this.selectedEleveId,
                date: this.date_retard,
                motif:this.motif_retard
            }
            console.log(data)
            instance.post('store/retard',data)
                .then((response)=>{
                console.log(response.data)
                    if(response.data=='ok'){
                    console.log('cool')
                  //  $('#not-success').trigger('click');
                    }

                })
                .catch((err)=>{
                console.log(err.response.data)
                })
        }
    }
};

let vm = new Vue({
    el:"#app",
    data:{},
    components:{ retards },
    mounted(){}
})
