/**
 * Created by Aleck on 20/02/2019.
 */
import {url} from '../base_url.js'
let instance = axios.create({
    baseURL : url
});

let Setting={
    template:"#setting",
    data(){
        return {
            seting:{

                email:'',
                emailold:'',
                password : '',
                passwordold : '',
            },
            userId:{},
        }
    },
    methods:{





        para(az){
            this.userId=az



        },

        para(){

            instance.put('update_settingUser',this.seting).then(res=> {
                $.gritter.add({
                    title:"Modification",
                    time:2000,
                    text:"mod",
                    class_name:"color success"});


            }).catch(err=>{

                $.gritter.add({
                    title:"Modification",
                    time:2000,
                    text:"Echec de la Modification de l' Article",
                    class_name:"color danger"});
                console.log(err.response.data)
            })
        },

        loadDatas(){
            instance.get('load_mail').then(res=>{
                this.seting.email=res.data





            }).catch(err=>{
                console.log(err.response.data);
            })
        }

    },
    mounted(){
        this.loadDatas();
        $("#editor1").summernote({height: 300})
        $("#editor2").summernote({height: 300})
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
            Setting
        }


    }

)

