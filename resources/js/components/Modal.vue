<template>
    <div :id="modalId" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ modalTitle }}</h4>
                    <button type="button" class="close pull-right" data-dismiss="modal" >&times;</button>

                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">
                    <!--<slot name="footer"></slot>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    export default{
        props:['id','title'],
        data(){
            return {
                modalstyle: {
                    fontSize: '13px',
                    display:'none'
                },
                modalId:this.id,
                modalTitle:this.title,
            }
        },
        methods:{
            close(){
               // alert('closed triggered!!!');
                this.closed=true;
            }
        },
        created(){
          this.closed = false;
        },

    }
</script>