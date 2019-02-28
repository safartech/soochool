/**
 * Created by User on 11/01/2019.
 */
import {url} from '../../base_url.js'
let ajax = axios.create({
    baseURL : url
});

let coef = {
    template:'#coef',
    data(){
        return {

        }
    },

    mounted(){
        // alert()
    },
    computed:{},
    methods:{

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
            coef
        }
    },
);