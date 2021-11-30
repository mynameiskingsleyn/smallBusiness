<template>
    <div class="row table">
        <div class=" col-6">
            {{ bus.name }}
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" :data-target="modalTarget">
                view/Edit
            </button>
            <modal :id="modalId" :title="bus.name">
                <business-details :business="bus" :types="bustypes" @updated="refresh"></business-details>
                <template #footer>
                    <p>Update and use close button to close </p>
                </template>
            </modal>
        </div>
        <div class="col-3">
          <button> delete</button>
        </div>
    </div>

</template>

<script>
    import businessDetails from './businessDetails';
    export default{
        components:{businessDetails},
        props:['business','btypes'],
        data(){
            return{
                bus:this.business,
                bustypes:this.btypes
            }
        },
        computed:{
            modalTarget(){
                return '#bus'+this.bus.id;
            },
            modalId(){
                return 'bus'+this.bus.id;
            }
        },
        methods:{
            refresh(data){
                this.bus = data.business;
            }
        }
    }
</script>