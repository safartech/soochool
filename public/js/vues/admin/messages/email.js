import {url} from '../../../base_url.js'
let ajax = axios.create({
    baseURL : url
});

let Email = {
    template:'#email',
    data(){
        return {
            persons:[],
            parents:[],
            profs:[],
            eleves:[],
            newMessage:{
                subject:'Bonjour Farid',
                message:'',
                email:'aleckabed@gmail.com',
                to:[]
            }
        }
    },
    mounted(){
        this.initView()
        this.loadDatas()
    }
    ,
    computed:{

    },
    methods:{
        initView(){
            $("#email-editor").summernote({height: 200})
            $("#email-editor").summernote('code','Wellcome')
            $("#select2-to")
                .select2()
                .trigger('change')
                .on('change',(e)=>{

                })
            $("#select2-cc")
                .select2()
                .trigger('change')
                .on('change',(e)=>{
                    this.newMessage.to = $("#select2-cc").val()
                })

        },
        loadDatas(){
            ajax.get('load_emails_from_admin').then(res=>{
                // console.log(res.data)
                this.parents = res.data.parents
                this.profs = res.data.profs
                this.eleves = res.data.eleves
                this.parents.forEach(p=>{
                    this.persons.push(p)
                })
                console.log(this.persons)

            }).catch(err=>{
                console.log(err.response.data)
            })
        },
        sendMail(){
            this.newMessage.message = $("#email-editor").summernote('code')
            // console.log(this.newMessage )
            ajax.post('send_mail_from_admin',this.newMessage).then(res=>{
                console.log(res.data)
                $.gritter.add({
                    title:"OK",
                    time:2000,
                    text:"Message envoyé avec Success",
                    class_name:"color success"});
            }).catch(err=>{
                console.log(err.response.data)
                $.gritter.add({
                    title:"Erreur",
                    time:4000,
                    text:"Message non envoyé",
                    class_name:"color danger"});
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
            Email
        }
    },
);