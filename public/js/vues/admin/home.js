/**
 * Created by User on 26/12/2018.
 */
import {url} from '../../base_url.js'
let instance = axios.create({
    baseURL : url
});

let Dashboard = {
    template:'#dashboard',
    data(){
        return{
            nbreEleves:null,
            nbreClasses:null,
            nbreProfs:null,
            effPersonnel:null,
        }
    },
    mounted(){
        // alert()
        this.loadDatas()
    },
    computed:{},
    methods:{
        loadDatas(){
            instance.get('load_dashboard').then(res=>{
                console.log(res.data)
                this.nbreClasses = res.data.nbreClasses
                this.nbreEleves = res.data.nbreEleves
                this.nbreProfs = res.data.nbreProfs
                this.effPersonnel = res.data.effPersonnel

                new CountUp('nbreClasses',10, this.nbreClasses).start();
                new CountUp('nbreEleves',10, this.nbreEleves).start();
                new CountUp('nbreProfs',10, this.nbreProfs).start();
                new CountUp('effPersonnel',10, this.effPersonnel).start();
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
        mounted(){
            // alert()
        },
        methods: {

        },
        components:{
            Dashboard
        }
    },
);
