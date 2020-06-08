export default{
    data(){
        return {
            items:[]
        }
    },
    methods: {
        get(url){
            axios.get(url)
                .then(this.refresh)
        },

        post(url,data,successMessage='post was successful',action='created'){
            //alert('here now');
            axios.post(url,data)
                .catch(error => {
                    var errors = error.response.data.body;
                    var message = errors.join(',');
                    console.log(message);
                    flash(message, 'danger');
                })
                .then(({data})=>{
                    this.body ='';
                    flash(successMessage);
                    this.$emit(action,data);
                });
        },

        getCount(item){

            if(item){
                if((typeof item === 'function') || (typeof item === 'object') && !(item === null)){
                    return Object.keys(item).length;
                }
                else
                    item.length;
            }else{
                return 0;
            }

        },
        add(item){
            console.log('item was added');
            this.items.push(item);
            this.$emit('added');
        },
        remove(index){
            this.items.splice(index, 1);
            flash('Reply deleted');
            this.$emit('removed')
        }
    }
}