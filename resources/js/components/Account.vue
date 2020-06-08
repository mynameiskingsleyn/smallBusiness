<template>
        <div class="container-fluid">
            <flash></flash>
            <div class="row">
                <div class="col-12">
                    hello {{currentUser.name}} you can manage your account here <br>
                    {{ businessSentence }}

                </div>
                <div class="col-12" v-if="hasBusiness">
                    <businesses :businesses="userbusinesses" :btypes="busTypes"></businesses>
                </div>
                <div class="col-12">
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg float-right" data-toggle="modal" data-target="#businessModal">
                        Add a Business
                    </button>

                </div>

                <!-- Modal -->
                <modal :id="modalId" :title="modalTitle">
                    <business-form :user="currentUser" @created ="businessAdded" :btypes="busTypes"></business-form>
                </modal>
            </div>

        </div>
</template>


<script>
    import businessForm from '../Forms/BusinessForm';
    import businesses from './Businesses';
    import modal from './Modal';
    export default{
        props:['user','btypes'],
        components:{
          businesses,businessForm,modal
        },

        data(){
            return{
                currentUser:this.user,
                userbusinesses:this.user.businesses ? this.user.businesses: [],
                showModal:true,
                busTypes: this.btypes,
                modalId:'businessModal',
                modalTitle: 'Add new business'
            }
        },
        computed:{

            businessSentence(){
                return 'You have '+this.getBusinessCount()+' '+this.pluralize('businesses',this.getBusinessCount())  +
                    ' registered to your account';
            },
            hasBusiness(){
                return this.getBusinessCount() > 0;
            }
        },
        methods:{
            getBusinessCount(){
                return this.userbusinesses.length;
            },
            businessAdded(data){
                console.log(data.businesses);
                this.showModal = false;
                this.userbusinesses = data.businesses;

            }
        },

    }
</script>