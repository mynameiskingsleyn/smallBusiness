<template>
    <div>
        <div v-if="hasPages">
            {{pagesSentence}}
            <div>
                <!--list pages-->
                <div class="panel-body">
                    <ul class="list-group">
                        <li v-for="(pager) in pages" class="list-group-item">
                            <page :pager="pager" :pstyles="styles"></page>
                        </li>
                    </ul>


                </div>

            </div>
        </div>
        <div v-else> There are currently 0 pages associated with this web site</div>
        <div>
            <div class="col-12">
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg float-right" data-toggle="modal" data-target="#pageModal">
                    Add a Page
                </button>

            </div>

            <!-- Modal -->
            <modal :id="modalId" :title="modalTitle">
                <page-form :dataSet="dataSet" @created ="pageAdded"></page-form>
            </modal>
        </div>
    </div>
</template>

<script>
    import page from './Page';
    import pageForm from '../Forms/PageForm';
    export default{
        props:['website','pstyles'],
        components:{ page,pageForm },
        data(){
            return {
                web:this.website,
                styles: this.pstyles,
                dataSet:{
                    website:this.website,
                    styles:this.pstyles
                },
                modelId:'pageModel',
                modalTitle:'Add Page'

            }
        },
        methods:{
          pageCount(){
              return this.dataSet.website.pages.length;
          },
          pageAdded(){
              //alert('working');
          }
        },
        computed:{
            hasPages(){
                return this.pageCount() > 0;
            },
            pagesSentence(){
                var pagecount = this.pageCount();
                return 'This website has '+pagecount+' '+this.pluralize('pages',pagecount)+
                    '.';
            },
            pages(){
                return this.dataSet.website.pages;
            }
        },

    }
</script>