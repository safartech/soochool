/**
 * Created by Aleck on 11/12/2018.
 *
 */

import {url} from '../../base_url.js'
let instance = axios.create({
    baseURL : url
});

let Payements={
    template:"#payements",
    data(){
        return {
            elevest:[


            ],
            filteredPayements:'',
            search:'',
            paye:'0',
            listpayerest:'0',
            totals:'',
            infoeleve:'0',
            resteleve:'0',
            eleves:{},
            elevess:{},
            listepayements:{},
            updatePayement:{
                nouveau_payement:'',


            },
            newPayement:{
              eleve_id:'',
                paye:'',
            },
            updatelistePayement:{


            },
           
        }
    },
    methods:{

        notnull(classe){
            return classe !=null
        },


        addPayement(){
            //console.log(this.newPersonnel);
            instance.post('add_payement',this.updatePayement).then(res=> {
                toastr.success("Ajout Solde effectué avec success")
                this.loadDatas();
            }).catch(err=>{
                toastr.error("Erreur survenu lors du payement")
            })


        },
        editpayement(){
            instance.put('update_payement/'+this.updatelistePayement.id,this.updatelistePayement).then(res=> {
                toastr.success("Solde Modifier  avec Success")
                this.loadDatas();
            }).catch(err=>{
                toastr.error("Erreur Modification Solde")
            })
        },



        showEditorPayement(eleve){

            this.updatePayement.eleve_id=eleve.id;
            this.infoeleve=this.sumpaye(eleve),
                this.resteleve=this.sumresatant(eleve),
                this.totals=this.total(eleve),
            $('#form-bp1').modal('show')


        },
        showConfirmeModal(){
            $('#mod-danger').modal('show')
        },
        showConfirmeModal2(){
            $('#mod-dangere').modal('show')
        },

        showEditorlistePayement(listepayement){
           /* alert(listepayement.paye);*/
            this.updatelistePayement=listepayement;
            this.paye=listepayement.paye;
          this.listpayerest=this.restlistelev(listepayement);


            $('#form-bp7').modal('show')


        },
        filterPayement(){

           // alert(this.search);
            if(this.search =='' || this.search==' '){
                this.filteredPayements=this.listepayements;
            }
            else{

                this.filteredPayements=this.listepayements.filter(x=>x.eleve.nom.toLowerCase().includes(this.search.toLowerCase()));
            }

        },

        sumpaye(eleve){
            var payement= eleve.payements;
            var sum =0;
            payement.forEach(p=>{
                sum+=Number.parseInt(p.paye);

            })
            return sum;
        },
        sumresatant(eleve){
            var payement= eleve.payements;
            var sum =0;
            payement.forEach(p=>{
                sum+=Number.parseInt(p.paye);
            })
            var total=Number.parseInt(eleve.classe.niveau.scolarite.solde);
            var result= total-sum;
            return result;


        },
        total(eleve){
            var total=Number.parseInt(eleve.classe.niveau.scolarite.solde);
            return total;
        },

        statut(eleve){

            var payement= eleve.payements;
            var sum =0;
            payement.forEach(p=>{
                sum+=Number.parseInt(p.paye);
            })
            var total=Number.parseInt(eleve.classe.niveau.scolarite.solde);
            var result= (sum*100)/total;
            return result;
        },
        restlistelev(listepayement){
            var eleveId=listepayement.eleve_id;
            var payet=this.listepayements.filter(x=>x.eleve_id==eleveId)
            var sum =0;
            payet.forEach(o=>{
                sum+=Number.parseInt(o.paye);
            })
            var totale=Number.parseInt(listepayement.eleve.classe.niveau.scolarite.solde);

            var restt=totale-sum;
            return restt;

        },

        addNewpaye(){
            //console.log(this.newPersonnel);
            instance.post('add_newPayement',this.newPayement).then(res=> {
                toastr.success("Payement effectué avec succes")

                this.loadDatas();
            }).catch(err=>{

                toastr.error("payement non effectué")
            })


        },
        initView(){
            $('#select2-paye')
            // init select2
                .select2()
                .trigger('change')
                // emit event on change.
                .on('change', (e) => {
                    this.onPayeChange($('#select2-paye').val())
                });
            $(".select2")
                .select2({
                    width:"100%"
                });
        }
        ,

        loadDatas(){

            instance.get('load_payement').then(res=>{
                this.eleves=res.data.eleve;
                this.listepayements=res.data.listepayement
                this.filteredPayements=res.data.listepayement

                this.elevess=res.data.elevet



            }).catch(err=>{
                console.log(err.response.data);
            })
        },

        onPayeChange(eleve_id){
           this.newPayement.eleve_id = eleve_id

        }

    },
    mounted(){

        this.loadDatas();
        this.initView();

    },


    computed:{

    },
}
new Vue(
    {
        el:"#app",
        data:{

        },
        methods: {

        },
        components:{
            Payements
        }


    },

)
