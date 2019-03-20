/**
 * Created by Aleck on 11/12/2018.
 *
 */

import {url} from '../../base_url.js'
let instance = axios.create({
    baseURL : url
});



let Eleves={
    template:"#eleves",
    props:{
        // amis:Array
    },
    data(){
        return {
            mode:0,
            eleves:[],
            newEleve:{
                nom : '',
                prenoms:'',
                sexe:'F',
                date_nsce:'',
                adresse:'',
                nationalite:'',
                pays_nsce:'',
                telephone:'',
                classe_id:'',
                nom_complet:'',
                lieu_nsce:'',

            },/*newEleve:{
                nom : 'aezae',
                prenoms:'zae',
                sexe:'F',
                date_nsce:'1999-02-12',
                adresse:'eaze',
                nationalite:'aze',
                pays_nsce:'zre',
                telephone:'dsf',
                classe_id:'',
                nom_complet:'',
                lieu_nsce:'rfg',
                nom_complet:'',

            },*/
            updateEleve:{},
            deleteEleve:{},
            classes:[
            ],
            dataTable:{}
        }
    },
    methods:{

        notnull(classe){
            return classe !=null
        },
        initView(){
          $('#select2-session').select2({
              $dropdownParent: '#form-bp1',
          }),

            // $("#nsce").mask("9999-99-99");
            $('#date-nsce1').datetimepicker(
                {
                    autoclose: !0,
                    componentIcon: ".mdi.mdi-calendar",
                    viewMode:"years",
//                    useCurrent:true,
                    navIcons: {rightIcon: "mdi mdi-chevron-right", leftIcon: "mdi mdi-chevron-left"}
                }
            )
            $('#date-nsce2').datetimepicker(
                {
                    autoclose: !0,
                    componentIcon: ".mdi.mdi-calendar",
                    viewMode:"years",
//                    useCurrent:true,
                    navIcons: {rightIcon: "mdi mdi-chevron-right", leftIcon: "mdi mdi-chevron-left"}
                }
            )


            $('#date-nsce1').on('change',(e)=> {
                this.newEleve.date_nsce = $('#date-nsce1').data('date')
                // console.log(this.newEleve.date_nsce)
             })
            $('#date-nsce2').on('change',(e)=> {
                this.updateEleve.date_nsce = $('#date-nsce2').data('date')
                // console.log(this.updateEleve.date_nsce)
             })


        },

        addEleve(){
                //console.log(this.newEleve);
                this.newEleve.nom_complet=this.nomComplet,

                    instance.post('add_eleve',this.newEleve).then(res=> {
                        $.gritter.add({
                            title:"Ajout",
                            time:2000,
                            text:"L'Eleve  "+this.newEleve.nom+' '+this.newEleve.prenoms+" a été Ajouté avec Success",
                            class_name:"color success"});

                    this.eleves.push(res.data);
                    this.loadDatas();

                }).catch(err=>{
                        console.log(err.response.data);
                })


            },

        del(){

            instance.get('delete_eleve/'+this.deleteEleve.id).then(res=>{
                this.loadDatas(),
                    $.gritter.add({
                        title:"Suppresion",
                        time:2000,
                        text:"L' Eleve "+this.deleteEleve.nom+' '+this.deleteEleve.prenoms+" a été supprimer avec Success",
                        class_name:"color success"});
            }).catch(err=>{
                $.gritter.add({
                    title:"Suppresion",
                    time:2000,
                    text:"Erreur de Supppression de l'Eleve "+this.deleteEleve.nom+' '+this.deleteEleve.prenoms,
                    class_name:"color danger"});
            })
        },

        showDeleteModal(eleve){
            this.deleteEleve=eleve;
            $('#mod-danger').modal('show');
        },

        showEditorModal(eleve){

            this.updateEleve=eleve;
            // $('#date-nsce2').attr('data-date',eleve.date_nsce)

            $('#form-bp2').modal('show');


        },

        moment(date){
            return moment(date).format('DD MMMM YYYY')
        },

        UpdateEleves(){

            this.updateEleve.nom_complet=this.u_nomComplet,


                instance.put('update_Eleve/'+this.updateEleve.id,this.updateEleve).then(res=> {
                    $.gritter.add({
                        title:"Modification",
                        time:2000,
                        text:"Modification effectué avec Success.",
                        class_name:"color success"});
                    this.loadDatas();
                }).catch(err=>{
                    $.gritter.add({
                        title:"Modification",
                        time:2000,
                        text:"Echec de la Modification.",
                        class_name:"color danger"});
                })
        },

        loadDatas(){

            instance.get('load_eleves').then(res=>{
                // console.log(res.data.eleves[0].classe.nom);
                this.eleves=res.data.eleves;
                this.classes=res.data.classes;
                let table = $('#myTable').DataTable({
                    data:this.eleves,
                    dom: 'Bfrtip',
                    buttons: [
                        // 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis',
                        /*{
                            extend:'columnsToggle'
                        },*/
                        {
                          extend:'pageLength',
                            text:'Lignes'
                        },
                        {
                            extend: 'colvis',
                            key:'l',
                            text:'Colonnes visibles',
                            postfixButtons: [ 'colvisRestore' ],
                            columns: ':not(.noVis)'
                        },
                        /*{
                            extend: 'copy',
                            key:'c',
                            text:'Copier Tableau',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },*/
                        {
                            extend: 'excel',
                            text: 'Excel',
                            key:"x",
                            exportOptions: {
                                columns: ':visible'
                            },
                            title:'LISTE DES ELEVES',

                        },
                        {
                            extend: 'pdf',
                            text:'PDF',
                            key:'f',
                            title:'LISTE DES ELEVES',
                            // messageTop:'Liste des élèves',
                            exportOptions: {
                                columns: ':visible'
                            },
                            footer:true,
                        },
                        {
                            extend: 'print',
                            key:'p',
                            text:'Imprimer',
                            title:'LISTE DES ELEVES',
                            // messageTop:'Liste des élèves',
                            exportOptions: {
                                columns: ':visible'
                            },
                            customize: function ( win ) {
                                $(win.document.body)
                                    .css( 'font-size', '10pt' )
                                    .prepend(
                                        '<img src="http://localhost/soochool/public/assets/img/logo.png" style="position:absolute; top:0; left:0;" />'
                                    );

                                $(win.document.body).find( 'table' )
                                    .addClass( 'compact' )
                                    .removeClass('table-bordered')
                                    .css( 'font-size', 'inherit' );
                            }
                        },
                        /*{
                         text: 'Red',
                         className: ' btn-danger',
                         action: function ( e, dt, node, config ) {
                         alert( 'Button activated' );
                         }
                         },*/

                    ],
                    lengthMenu: [[10, 20, 50, -1], ['10 Lignes', '20 Lignes', '50 Lignes', "Toutes"]],
                    pageLength: 6,
                    rowReorder: true,
                    order: [[ 1, 'asc' ]],
                    columnDefs: [
                        {
                            searchable: false,
                            orderable: false,
                            targets:0
                        },
                        {

                    columnDefs: [
                        {

                            targets: -2,
                            visible: false
                        },
                        {
                            targets: -3,
                            visible: false
                        },

                        {
                            targets: 1,
                            className: 'noVis'
                        }
                    ],
                    columns: [

                        {
                            data: "",
                            defaultContent: ""
                        },
                        /*{ data: '#',
                            render(data,type,row,meta){
                            // console.log(meta)
                            return meta.row+1;
                            }
                        },*/

                        { data: 'nom'},
                        { data: 'prenoms' },
                        { data: 'sexe' },
                        { data: 'date_nsce' },
                        { data: 'adresse' },
                        { data: 'telephone' },
                        { data: 'classe.nom' },
                    ],
                    // paging: true,
                    // scrollY: 400,
                    // searching: true,
                    ordering:  true,
                    /*select:{
                        style:    'os',
                        selector: 'td:first-child',
                        blurable: true
                    },*/

                }]});

                table.on('order.dt search.dt', function () {
                    table.column(0).nodes().each( function (cell, i) {
                        // console.log(table.columns[0].data)
                        // console.log(cell)
                        cell.innerHTML = i+1;
                        // cell.innerText = i+1;
                        table.cell(cell).invalidate('dom');
                    } );
                } ).draw();

                /*table.on( 'click', 'tr', function () {
                 alert( 'Row index: '+table.row( this ).index() );
                 } );*/

                
                    // .rows().invalidate('data')
                    // .draw(false);


                table.on( 'click', 'tr', function () {
                    alert( 'Row index: '+table.row( this ).index() );
                } );

                table.on( 'search.dt', function (a,b,c) {
                    console.log( 'Row index: '+table.row( this ).index() );
                    // alert();
                    // console.log("a",a)
                    // console.log("b",b)
                    // console.log("c",c)
                    $('#filterInfo').html( 'Currently applied global search: '+table.search() );
                } );

                /*t.button().add(0,{
                    extend: 'print',
                    text:'Imprimer',
                    className:'danger',
                    exportOptions: {
                        columns: ':visible'
                    }
                });*/


                /*table.button().add(0,{
                    extend: 'csv',
                    text:'CSV',
                    exportOptions: {
                        columns: ':visible'
                    }
                });*/


            }).catch(err=>{
                console.log(err.response.data);
            })
        }

    },
    mounted(){
        moment.locale('fr')
        this.loadDatas();
       this.initView();
    },


    computed:{
        isConsultMode(){
            return this.mode==0
        },
        isModifMode(){
            return this.mode==1
        },

        nomComplet(){
            return this.newEleve.nom+' '+this.newEleve.prenoms;
        },
        u_nomComplet(){
            return this.updateEleve.nom+' '+this.updateEleve.prenoms;

        },
    },
}
new Vue(
    {
        el:"#app",
        data:{
            amis:[
                {
                    nom:"Messi",
                    prenoms:"Lionel",
                    age:31,
                },
                    {
                        nom:"CR7",
                        prenoms:"Jr",
                        age:34,
                    },
                    {
                        nom:"Neymar",
                        prenoms:"Jr",
                        age:26,
                    },

                ]
        },
        mounted(){
            // this.loadDatas()
        },
        methods: {
            loadDatas(){
                this.amis.push({
                    nom:"Alfagaz",
                    prenoms:"Alfagaz",
                    age:12,
                });
                $('#myTables').DataTable(
                    {
                        data:[
                            {
                                "name":       "Nixon",
                                "firstname":       "Tiger",
                                "position":   "System Architect",
                                "salary":     "$3,120",
                                "start_date": "2011/04/25",
                                "office":     "Edinburgh",
                                "extn":       "5421"
                            },
                            {
                                "name":       "Garrett",
                                "firstname":       "Garrett",
                                "position":   "Director",
                                "salary":     "$5,300",
                                "start_date": "2011/07/25",
                                "office":     "Edinburgh",
                                "extn":       "8422"
                            }
                        ],
                        columns: [
                            { data: 'name' ,
                                render: function ( data, type, row ) {
                                return data.name +' '+ data.firstname;
                            }
                            },
                            { data: 'salary' },
                            { data: 'office' },
                            { data: 'position' }
                        ],

                    }
                )

                instance.get('load_eleves').then(res=>{
                    // console.log(res.data.eleves[0].classe.nom);
                    this.amis=res.data.eleves;


                }).catch(err=>{
                    console.log(err.response.data);
                })
            }
        },
        components:{
            Eleves
        }


    },

)
