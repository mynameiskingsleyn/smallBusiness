<template>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Here are Businesses registered to this account</strong>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li v-for="(business) in userBusinesses" class="list-group-item">
                        <business :business="business" :btypes="businessT"></business>
                    </li>
                </ul>


            </div>
        </div>

    </div>
</template>

<script>
    import business from './Business';
    export default{
        props:['businesses','btypes'],
        components:{ business },
        data(){
            return{
                userBusinesses: this.businesses,
                businessT:this.btypes,
            }
        },
        watch:{
            businesses:function(val){
                this.userBusinesses = val;
            }
        }
    }
</script>