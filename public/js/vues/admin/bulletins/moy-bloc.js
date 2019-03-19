/**
 * Created by User on 01/03/2019.
 */
import {url} from '../../../base_url.js'
let instance=axios.create({
    baseURL: url
});

let MoyBloc = {
    template:'#moybloc',
    data(){
        return {
            niveaux:[],
            classes:[],
            appreciations:[],
            clickedClasse:{},
            clickedClasseMatieres:[],
            selectedClasses:[],
            apprMatieres:[],
            clickedEleveMoyennes:[],
            eleves:[],
            selectedEleveAppr:{},
            sessions:[],
            filteredEleves:[],
            selectedSessionId:null,
            selectedSession:{},
            progressState:0,
            couleur: "red",
            genApprColumnClicked:false,
            currentGenAppr:"",
            selectedEleveForConseil:{},
            newConseil:{
                eleve_id:0,
                session_id:0,
                assiduite:"",
                conduite:"",
                travail:"",
                retards:null,
                absences:null
            },
            selectedClasse:{},
            selectedEleveConseil:{},
            elevesOfClasse:[],
        }
    },
    mounted(){
        this.initView()
        this.loadDatas();
    },
    computed:{
        progressText(){
            if(this.progressState<100) return "Processus en cours ...";
            else return "Terminé"
        },
        progressOver(){
          return this.progressState>=100
        },
        disabledBtn(){
            return this.selectedSessionId==null
        },
        readyBtn(){
            return this.selectedSessionId!=null && this.selectedClasse.id!=null;
        }

    },
    methods:{
        refrech(){
            this.loadDatas()
        },
        initView(){
            $('#select2-classes').select2().on('change',(e)=>{
                this.selectedClasses = $('#select2-classes').val()
                // console.log(this.selectedClasses)
                this.filterElevesList(this.selectedClasses)
            });

            $('#select2-classe').select2().on('change',(e)=>{
                // alert()
                let classeId = $('#select2-classe').val()
                this.selectedClasse = this.classes.find(c=>c.id==classeId)
                // console.log(this.selectedClasses)
                this.getElevesOfClasse(classeId)
            });

            $('#select2-session').select2().on('change',(e)=>{
                this.selectedSessionId = $('#select2-session').val()
                this.selectedSession = this.sessions.find(s=>s.id==this.selectedSessionId)
                // alert(this.selctedSessionId)
            });
        },

        startProcess(){
            $("#loader").modal('show')
            let data = {}
            data.classes= this.selectedClasses
            data.session_id = this.selectedSessionId
            // console.log(data)
            instance.post('bulletins/process_bloc_moyennes_for_classes',data).then(res=>{
                console.log(res.data)
                $("#loader").modal('hide')
                $.gritter.add({
                    title:"Calcul des moyennes",
                    text:"Moyennes calculées et sauvegardées avec success",
                    class_name: "color success",
                    time:3000
                })
            }).catch(err=>{
                console.error(err.response.data)
                $("#loader").modal('hide')
                $.gritter.add({
                    title:"Calcul des moyennes",
                    text:"Une erreur s'est produite",
                    class_name: "color danger",
                    time:3000
                })
            })
        },

        startPreocessForClasses(){},

        loopProcess(){
            this.progressState = 0;
            $('#progressModal').modal('show')
            let length = this.filteredEleves.length

            this.filteredEleves.forEach(e=>{
                // this.progressState +=1
                // this.progressState = parseInt(this.progressState.toFixed(2)) + parseInt((length/100).toFixed(2))
                /*console.log(this.progressState)
                console.log("length",length)
                console.log("ceil",Math.ceil(100/length))
                console.log("floor",Math.floor(100/length))
                console.log("float",parseFloat((100/length).toFixed(2)))*/
                // this.processForEleve(e.id)
                // this.progressState = (this.progressState<100)?((this.progressState) + Math.ceil((100/length).toFixed(2))):100

                instance.get('bulletins/process_bloc_moyennes_for_eleve/'+e.id+"/"+this.selectedSessionId).then(res=>{
                    console.log(res.data)
                    this.progressState = (this.progressState<100)?((this.progressState) + Math.ceil((100/length).toFixed(2))):100
                }).catch(err=>{
                    console.error(err.response.data)
                    this.progressState = (this.progressState<100)?((this.progressState) + Math.ceil((100/length).toFixed(2))):100
                    $.gritter.add({
                        title:"Calcul des moyennes",
                        text:"Une erreur s'est produite",
                        class_name: "color danger",
                        time:3000
                    })
                })
            })
            // $('#progressModal').modal('hide')
            // console.log("total",length)
        },

        processForEleve(eleveId){
            $("#loader").modal('show')
            instance.get('bulletins/process_bloc_moyennes_for_eleve/'+eleveId+"/"+this.selectedSessionId).then(res=>{
                console.log(res.data)
                $("#loader").modal('hide')
                $.gritter.add({
                    title:"Calcul des moyennes",
                    text:"Moyennes calculées et sauvegardées avec success",
                    class_name: "color success",
                    time:3000
                })
            }).catch(err=>{
                console.error(err.response.data)
                $("#loader").modal('hide')
                $.gritter.add({
                    title:"Calcul des moyennes",
                    text:"Une erreur s'est produite",
                    class_name: "color danger",
                    time:3000
                })
            })
        },

        moyGenCalcForClasses(){
            $("#loader").modal('show')
            let data = {}
            data.classes= this.selectedClasses
            data.session_id = this.selectedSessionId
            // console.log(data)
            instance.post('bulletins/process_bloc_moyennes_gen_for_classes',data).then(res=>{
                console.log(res.data)
                $("#loader").modal('hide')
                $.gritter.add({
                    title:"Calcul des moyennes",
                    text:"Moyennes calculées et sauvegardées avec success",
                    class_name: "color success",
                    time:3000
                })
            }).catch(err=>{
                console.error(err.response.data)
                $("#loader").modal('hide')
                $.gritter.add({
                    title:"Calcul des moyennes",
                    text:"Une erreur s'est produite",
                    class_name: "color danger",
                    time:3000
                })
            })
        },

        determineRanksInClasses(){
            $("#loader").modal('show')
            let data = {}
            data.classes= this.selectedClasses
            data.session_id = this.selectedSessionId
            // console.log(data)
            instance.post('bulletins/determine_ranks_in_classes',data).then(res=>{
                console.log(res.data)
                $("#loader").modal('hide')
                $.gritter.add({
                    title:"Calcul des moyennes",
                    text:"Moyennes calculées et sauvegardées avec success",
                    class_name: "color success",
                    time:3000
                })
            }).catch(err=>{
                console.error(err.response.data)
                $("#loader").modal('hide')
                $.gritter.add({
                    title:"Calcul des moyennes",
                    text:"Une erreur s'est produite",
                    class_name: "color danger",
                    time:3000
                })
            })
        },

        moyGenCalcForEleve(eleveId){
            $("#loader").modal('show')
            instance.get('bulletins/process_bloc_moyennes_gen_for_eleve/'+eleveId+"/"+this.selectedSessionId).then(res=>{
                console.log(res.data)
                $("#loader").modal('hide')
                $.gritter.add({
                    title:"Calcul des moyennes",
                    text:"Moyennes calculées et sauvegardées avec success",
                    class_name: "color success",
                    time:3000
                })
            }).catch(err=>{
                console.error(err.response.data)
                $("#loader").modal('hide')
                $.gritter.add({
                    title:"Calcul des moyennes",
                    text:"Une erreur s'est produite",
                    class_name: "color danger",
                    time:3000
                })
            })
        },

        getElevesOfClasse(classeId){
            this.elevesOfClasse = this.eleves.filter(e=>e.classe_id==classeId)
        },

        filterElevesList(classes){
            // this.filteredEleves = this.eleves.filter(e=>classes.includes(`${e.classe_id}`));
            if (classes){
                this.filteredEleves = this.eleves.filter(e=>classes.includes(e.classe_id.toString()))
            }else {
                this.filteredEleves = this.eleves
            }
        },
        showAppreciationModal(){
            $("#apprecition-modal").modal('show')
        },
        loadDatas(){
            $("#loader").modal('show')
            instance.get('bulletins/load_datas_for_bloc_moy').then(res=>{
                this.sessions = res.data.sessions
                this.niveaux = res.data.niveaux
                this.eleves = res.data.eleves
                this.classes = res.data.classes
                this.appreciations = res.data.appreciations
                this.filteredEleves = res.data.eleves
                console.log(res.data)
                $("#loader").modal('hide')
            }).catch(err=>{
                console.log(err.response.data)
                $("#loader").modal('hide')
            })
        },

        countMatieresArretees(classe){
            let bloqued = classe.matieres_arretees.filter(a=>a.session_id==this.selectedSessionId)
            // console.log(bloqued);
            return bloqued.length
        },

        countMatieres(classe){
            return classe.niveau.matieres.length
        },

        getBloquedClassesForMatiere(matiere){
            let bloqued = this.clickedClasse.matieres_arretees.find(a=>a.session_id==this.selectedSessionId && a.matiere_id==matiere.id)
            if (bloqued){
                return "mdi mdi-check-circle text-success"
            }else {
                return "mdi mdi-alert-circle text-danger"
            }

        },

        getBloquedClasses(classe){
            let bloqued = classe.matieres_arretees.filter(a=>a.session_id==this.selectedSessionId)
            let matieres = classe.niveau.matieres
            if(bloqued.length==matieres.length){
                return "mdi mdi-check-circle text-success"
            }else {
                return "mdi mdi-alert-circle text-danger"
            }
        },

        verification1(classe){
            this.clickedClasse = classe
            this.clickedClasseMatieres = classe.niveau.matieres
            $('#verification-modal-1').modal('show')
        },

        moyCalculee(classe){
            let bloqued = classe.moyennes_calculees.find(a=>a.session_id==this.selectedSessionId)
            if(bloqued){
                return "mdi mdi-check-circle text-success"
            }else {
                return "mdi mdi-alert-circle text-danger"
            }
        },

        getMoyClasse(matiere){
            let moy = this.selectedEleveAppr.moyennes.find(m=>m.matiere_id==matiere.id && m.session_id==this.selectedSessionId)
            if(moy)return moy.moy_classe; else return ""
        },
        getNoteCompo(matiere){
            let moy = this.selectedEleveAppr.moyennes.find(m=>m.matiere_id==matiere.id && m.session_id==this.selectedSessionId)
            if(moy)return moy.note_compo; else return ""
        },
        getMoyGen(matiere){
            let moy = this.selectedEleveAppr.moyennes.find(m=>m.matiere_id==matiere.id && m.session_id==this.selectedSessionId)
            if(moy)return moy.moy_gen; else return ""
        },
        getRangCompo(matiere){
            let moy = this.selectedEleveAppr.moyennes.find(m=>m.matiere_id==matiere.id && m.session_id==this.selectedSessionId)
            if(moy)return moy.rang_compo; else return ""
        },
        getAppreciation(matiere){
            let moy = this.selectedEleveAppr.moyennes.find(m=>m.matiere_id==matiere.id && m.session_id==this.selectedSessionId)
            if(moy)return moy.appreciation; else return ""
        },
        getRangCompoSuffix(matiere){
            let moy = this.selectedEleveAppr.moyennes.find(m=>m.matiere_id==matiere.id && m.session_id==this.selectedSessionId)
            if(moy){
                if(moy.rang_compo == 1) return "er"
                else return "e"
            }else {
                return ""
            }
        },

        generateAppreciations(){
            $("#loader").modal('show')
            let data = {}
            data.classes= this.selectedClasses
            data.appreciations = this.appreciations
            data.session_id = this.selectedSessionId
          instance.post('bulletins/generate_appreciations_for_classes',data).then(res=>{
              console.log(res.data)
              $("#loader").modal('hide')
              $.gritter.add({
                  title:"Appréciations",
                  text:"Les appréciations ont été enrégistrées avec succès",
                  class_name: "color success",
                  time:3000
              })
          }).catch(err=>{
              console.log(err.response.data)
              $("#loader").modal('hide')
              $.gritter.add({
                  title:"Echec",
                  text:"Une erreur est survenue lors du processus",
                  class_name: "color danger",
                  time:3000
              })
          })
        },



        showAppreciationsForEleve(eleve){
            this.selectedEleveAppr = eleve
            this.apprMatieres = eleve.classe.niveau.matieres
            this.clickedEleveMoyennes = eleve.moyennes
        },
        eleveSelectedBgColor(eleve){
            if(this.isSelectedEleve(eleve)) return "primary" ; else return ""
        },
        isSelectedEleve(eleve){
            return this.selectedEleveAppr.id == eleve.id
        },

        getMoyGenerale(eleve){
            let moy = eleve.resultats.find(r=>r.session_id==this.selectedSessionId)
            if(moy) return moy.moyenne
        },
        getRangGeneral(eleve){
            let moy = eleve.resultats.find(r=>r.session_id==this.selectedSessionId)
            if(moy) return moy.rang
        },
        getAppreciationGenerale(eleve){
            let moy = eleve.resultats.find(r=>r.session_id==this.selectedSessionId)
            if(moy) return moy.appreciation
        },
        showGeneralResultsOfEleve(eleve){
            this.selectedEleveAppr = eleve
            $('#gen-results-modal').modal('show')
        },
        getGenMoyOfSession(sessionId){
            let results = this.selectedEleveAppr.resultats
            if(results){
                let r = results.find(r=>r.session_id==sessionId)
                if(r) return r.moyenne
            }

        },
        getGenRankOfSession(sessionId){
            let results = this.selectedEleveAppr.resultats
            if(results){
                let r = results.find(r=>r.session_id==sessionId)
                if(r) return r.moyenne
            }
        },
        getGenApprOfSession(sessionId){
            let results = this.selectedEleveAppr.resultats
            if(results){
                let r = results.find(r=>r.session_id==sessionId)
                if(r) return r.appreciation
            }
        },
        genApprClick(){
            this.genApprColumnClicked = true
        },
        showGenApprInput(){
            return this.genApprColumnClicked
        },
        genApprFocus(eleve){
            let moy = eleve.resultats.find(r=>r.session_id==this.selectedSessionId)
            if(moy) this.currentGenAppr = moy.appreciation ;else this.currentGenAppr = ""
            // this.currentGenAppr = this.getAppreciationGenerale(e)
            console.log("GA",this.currentGenAppr)
            eleve.gen_appr = this.currentGenAppr
        },
        toast(e){
            // alert(e.nom_complet)
            console.log("dd",e)
        },
        updateGenAppr(eleve){
            let res = eleve.resultats.find(r=>r.session_id==this.selectedSessionId)
            if(res){
                res.appreciation = eleve.gen_appr
                console.log(res)
                instance.put('bulletins/update_appreciation_generale/'+res.id,res).then(res=>{
                    console.log(res.data)
                }).catch(err=>{
                    console.log(err.response.data)
                })
            }else {
                alert("NO")
            }
        },
        showGeneralApprModal(eleve){
            $('#gen-appr-modal').modal('show')
            this.selectedEleveAppr = eleve
            let moy = eleve.resultats.find(r=>r.session_id==this.selectedSessionId);
            if(moy) this.currentGenAppr = moy.appreciation ;else this.currentGenAppr = ""
        },
        updateGenAppOfEleve(){
            let res =  this.selectedEleveAppr.resultats.find(r=>r.session_id==this.selectedSessionId);
            if(res){
                res.appreciation = this.currentGenAppr
                console.log(res)
                instance.put('bulletins/update_appreciation_generale/'+res.id,res).then(res=>{
                    console.log(res.data)
                }).catch(err=>{
                    console.log(err.response.data)
                })
            }
        },

        showAssiduiteSetter(eleve){
            // console.log(this.selectedEleveConseil)
            this.selectedEleveForConseil = eleve
            let c = eleve.conseils.find(x=>x.eleve_id==eleve.id && x.session_id==this.selectedSession.id)
            if(c){
                this.selectedEleveConseil = c
            }else {
                this.selectedEleveConseil = this.newConseil
            }

            $('#conseil-setting-modal').modal('show')
        },
        getEleveAssiduite(eleve){
            let conseil = eleve.conseils.find(x=>x.eleve_id==eleve.id && x.session_id==this.selectedSession.id)
            if(conseil)return conseil.assiduite
        },
        getEleveConduite(eleve){
            let conseil = eleve.conseils.find(x=>x.eleve_id==eleve.id && x.session_id==this.selectedSession.id)
            if(conseil)return conseil.conduite
        },
        getEleveTravail(eleve){
            let conseil = eleve.conseils.find(x=>x.eleve_id==eleve.id && x.session_id==this.selectedSession.id)
            if(conseil)return conseil.travail
        },
        getEleveRetards(eleve){
            let conseil = eleve.conseils.find(x=>x.eleve_id==eleve.id && x.session_id==this.selectedSession.id)
            if(conseil)return conseil.retards
        },
        getEleveAbsences(eleve){
            let conseil = eleve.conseils.find(x=>x.eleve_id==eleve.id && x.session_id==this.selectedSession.id)
            if(conseil)return conseil.absences
        },
        validateConseil(){
            // console.log(this.selectedEleveConseil)
            this.selectedEleveConseil.eleve_id = this.selectedEleve.id
            this.selectedEleveConseil.session_id = this.selectedSession.id
            ajax.post('set_conseil_for_eleve',this.selectedEleveConseil).then(res=>{
                console.log(res.data)
            }).catch(err=>{
                console.log(err.response.data)
            })
            this.selectedEleveConseil = {}
        },

        printBuelletinForEleve(eleve){
            instance.get('bulletins/print_bulletin_of_eleve/'+eleve.id+'/'+this.selectedSessionId).then(res=>{
                console.log(res.data)
            }).catch(err=>{
                console.log(err.response.data)
            })
        },
        print_bulletin_of_eleve(eleve){
            return url+'bulletins/print_bulletin_of_eleve/'+eleve.id+'/'+this.selectedSessionId
        },
        printTest(){
            var doc = new jsPDF();
            var elementHandler = {
                '#ignorePDF': function (element, renderer) {
                    return true;
                }
            };
            var source = window.document.getElementById("mydiv");
            doc.fromHTML(
                source,
                15,
                15,
                {
                    'width': 180
                });

            doc.output("dataurlnewwindow");

            /*var printDoc = new jsPDF();
            printDoc.fromHTML($('#body').get(0), 10, 10, {'width': 180});
            printDoc.autoPrint();
            printDoc.output("dataurlnewwindow");*/
        },

        multiplePrintLink(){
            return url+'bulletins/print_multiple_bulletin/'+this.selectedClasse.id+"/"+this.selectedSessionId;
        },

        printMultipleBulletin(){
            // alert()
            let data = {}
            data.classes= this.selectedClasses
            data.session_id = this.selectedSessionId
            // return url+'bulletins/generate_multiple_bulletin';
            $("#loader").modal('show')

            instance.post('bulletins/generate_multiple_bulletin',data).then(res=>{
                console.log(res.data)
                $("#loader").modal('hide')
            }).catch(err=>{
                console.log(err.response.data)
                $("#loader").modal('hide')
            })
        }

    }
}

new Vue({
    el:"#app",
    components:{ MoyBloc }
})