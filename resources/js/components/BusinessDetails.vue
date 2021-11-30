<template #body>
    <div class="container">
        <div class="row mButtom-3">
            <div class="col-3">
                Business website
            </div>
            <div class="col-6">
                <a :href="webLink">{{ base_url}}/{{bus.website.slug}}</a>
            </div>
            <div class="3">
                <button>
                    <a :href="webEditLink">Edit Site</a>
                </button>
            </div>
        </div>
        <div class="row mButtom-3">
            <div class="col-3">
                Business type
            </div>
            <div class="col-9">
                <select name="type" id="" v-model="bus.b_type_id">
                    <option value="">Select Type </option>
                    <option value="" v-for="btype in btypes" :value="btype.id">{{ btype.name }}</option>
                </select>
            </div>
        </div>
        <div class="row mButtom-3">
            <div class="col-3">
                Business Name
            </div>
            <div class="col-9">
                <input type="text" name="name" class="form-control" v-model="bus.name" required>
            </div>
        </div>
        <div class="row mButtom-3">
            <div class="col-3">
                Address 1
            </div>
            <div class="col-9">
                <input type="text" name="name" class="form-control" v-model="bus.Address1" required>
            </div>
        </div>
        <div class="row mButtom-3">
            <div class="col-3">
                Address 2
            </div>
            <div class="col-9">
                <input type="text" name="name" class="form-control" v-model="bus.Address2" required>
            </div>
        </div>
        <div class="row mButtom-3">
            <div class="col-3">
                City
            </div>
            <div class="col-9">
                <input type="text" name="name" class="form-control" v-model="bus.city" required>
            </div>
        </div>
        <div class="row mButtom-3">
            <div class="col-3">
                State
            </div>
            <div class="col-9">
                <input type="text" name="name" class="form-control" v-model="bus.state" required>
            </div>
        </div>
        <div class="row mButtom-3">
            <div class="col-3">
                Country
            </div>
            <div class="col-9">
                <input type="text" name="name" class="form-control" v-model="bus.country" required>
            </div>
        </div>
        <div class="row mButtom-3">
            <div class="col-3">
                ZipCode
            </div>
            <div class="col-9">
                <input type="text" name="name" class="form-control" v-model="bus.zipcode" required>
            </div>
        </div>
        <div class="row mButtom-3">
            <div class="col-3">
            </div>
            <div class="col-9 text-center">
                <button @click="update" data-dismiss="modal">
                    Update
                </button>

            </div>
        </div>
    </div>
</template>

<script>
    import collection from '../mixins/collection';
    export default {
        props:['business','types'],
        mixins:[collection],
        data(){
            return{
                bus:this.business,
                btypes:this.types,
                base_url: window.location.origin
            }
        },
        computed:{
          webLink(){
              return this.base_url+'/'+this.bus.website.slug;
          },
          webEditLink(){
              return this.base_url+'/account/website/'+this.bus.website.id+'/edit';
          }
        },
        watch:{
          business: function(val){
              this.bus = val;
          }
        },
        methods:{
            update(){
                var info = {
                    'id': this.bus.id,
                    'name': this.bus.name,
                    'Address1' : this.bus.Address1,
                    'Address2' : this.bus.Address2,
                    'city' : this.bus.city,
                    'state' : this.bus.state,
                    'country' : this.bus.country,
                    'zipcode' : this.bus.zipcode,
                    'b_type_id' : this.bus.b_type_id,
                }
                var dont =['Address2'];
                var error = this.validate(info,dont);
                if(error.length == 0){// send request
                    this.post('/api/business/update',info,'Business Has been updated','updated')
                }else{
                    flash(error,'danger');
                }
            },

            validate(obj,dont){
                console.log(dont);
                var error ='';
                var error_s=' can not be Empty';
                for(var key in obj) {
                    var value = obj[key];
                    value = String(value);
                    console.log(key);
                    if(value.trim() == ''){
                        if(dont.indexOf(key) != -1){
                            console.log('found key '+key);
                            continue;
                        }
                        var first = key;
                        first = first[0].toUpperCase()+first.slice(1);

                        error = first+error_s;
                        return error;
                    }
                }
                return '';
            },
        }
    }

</script>