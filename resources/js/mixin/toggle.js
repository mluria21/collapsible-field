export default {
    data(){
        return {
            show:false
        }
    },

    computed:{
        btnText(){
            return this.show ? 'Hide' : 'Show More'
        }
    },

    methods:{
        open(){
            this.show = true
        },

        close(){
            this.show = false
        },

        toggle(){
            this.show = !this.show
        }
    },

    watch:{
        'field.showDefault':{
            handler(value){
                this.show = value
            },
            immediate:true
        }
    }
}