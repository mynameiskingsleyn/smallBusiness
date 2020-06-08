<template>
    <div  class="form-group">
        <!--<div>-->
            <!--<input type="hidden" name="user_id" v-model="user.id">-->
        <!--</div>-->
        <div class="form-group">
            <label for="type">Business type</label>
            <select name="type" id="" v-model="busType">
                <option value="">Select Type </option>
                <option value="" v-for="btype in btypes" :value="btype.id">{{ btype.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name"> Business Name</label>
            <input type="text" name="name" class="form-control" v-model="businessName" required>
        </div>
        <div class="form-group">
            <label for="Address 1"> Address 1</label>
            <input type="text" name="address1" class="form-control" v-model="businessAddress1" required>
        </div>
        <div class="form-group">
            <label for="Address 2"> Address 2</label>
            <input type="text" name="address2" class="form-control" v-model="businessAddress2">
        </div>
        <div class="form-group">
            <label for="city"> City</label>
            <input type="text" name="city" class="form-control" v-model="businessCity">
        </div>
        <div class="form-group">
            <label for="state"> State </label>
            <input type="text" name="state" class="form-control" v-model="businessState">
        </div>
        <div class="form-group">
            <label for="country"> Country </label>
            <input type="text" name="country" class="form-control" v-model="businessCountry">
        </div>
        <div class="form-group">
            <label for="zip"> ZipCode </label>
            <input type="number" name="zip" class="form-control" v-model="businessZip">
        </div>
        <div>
            <button @click="addBusiness" class="btn btn-primary">Submit</button>
        </div>

        <!-- <input type="file" name="avatar" value="" accept="image/*" @change="onChange"> -->
    </div>

</template>

<script>
    import textInput from './inputs/textInput';
    import collection from '../mixins/collection';

    export default{
        components:{ textInput },
        props:['user','btypes'],
        mixins:[collection],
        data(){
            return{
                businessName:'Enter Name',
                businessAddress1:'',
                businessAddress2:'',
                businessCity:'',
                businessState:'',
                businessCountry:'USA',
                businessZip:'',
                busType:''
            }
        },
        methods:{
            addBusiness(){
                var ok = this.validate();
                if(ok.length==0){ //process
                    var data = {
                        user_id:this.user.id,
                        name:this.businessName,
                        Address1:this.businessAddress1,
                        Address2:this.businessAddress2,
                        city:this.businessCity,
                        state:this.businessState,
                        country:this.businessCountry,
                        zipcode:this.businessZip,
                        b_type_id: this.busType
                    }
                    this.post('/api/business/create',data,'Business added to your account')

                }else{
                    flash(ok,'danger');
                }




            },
            validate(){
                if(this.busType.length==0){
                    return 'business Type is required';
                }
                if(this.businessName.length==0){
                    return 'business name is required';
                }
                if(this.businessAddress1.length==0){
                    return 'business address is required';
                }
                if(this.businessCity.length==0){
                    return 'business city is required';
                }
                if(this.businessState.length==0){
                    return 'business State is required';
                }
                if(this.businessCountry.length==0){
                    return 'business country is required';
                }
                if(this.businessZip.length==0){
                    return 'business Zip is required';
                }
                return '';

            }

        }

    }
</script>