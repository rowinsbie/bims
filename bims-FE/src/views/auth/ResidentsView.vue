<template>
    <LayOut>
        <div class="col-lg-12 col-sm-12  ">
            <div class="card  ">
                <div class="card-body">
                    <h2>Residents</h2>
                    <p>List of all the residents</p>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>RID</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>2023-36363</th>
                                    <th>Seiki Rowins </th>
                                    <th>Limpin</th>
                                    <th>Bie</th>
                                </tr>
                                <tr>
                                    <th>2023-36363</th>
                                    <th>Seiki Rowins </th>
                                    <th>Limpin</th>
                                    <th>Bie</th>
                                </tr>
                                <tr>
                                    <th>2023-36363</th>
                                    <th>Seiki Rowins </th>
                                    <th>Limpin</th>
                                    <th>Bie</th>
                                </tr>
                                <tr>
                                    <th>2023-36363</th>
                                    <th>Seiki Rowins </th>
                                    <th>Limpin</th>
                                    <th>Bie</th>
                                </tr>
                                <tr>
                                    <th>2023-36363</th>
                                    <th>Seiki Rowins </th>
                                    <th>Limpin</th>
                                    <th>Bie</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </LayOut>
</template>

<script  lang="ts">
import  { defineComponent } from 'vue';
import LayOut from '../../components/layout/LayOut.vue';
export default defineComponent({
    components:{
        LayOut
    }
});
</script>

<style lang="scss">

</style>