<template>
    <div>
        <h2 class="text-center">Ads List</h2>

        <Modal :ref="ref" :id="ref">
            <template v-slot:header></template>
            <template v-slot:body></template>
            <template v-slot:footer></template>
        </Modal>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Total Budget</th>
                <th>Daily Budget</th>
                <!--                    <th>Image</th>-->
            </tr>
            </thead>
            <tbody>
            <tr v-for="ad in ads" :key="ad.id">
                <td>{{ ad.id }}</td>
                <td>{{ ad.name }}</td>
                <td>{{ ad.fromdate }}</td>
                <td>{{ ad.todate }}</td>
                <td>{{ ad.totalbudget }}</td>
                <td>{{ ad.dailybudget }}</td>
                <!--                    <td>-->
                <!--                        <img-->
                <!--                            :src="ad.image"-->
                <!--                            class="figure-img img-fluid rounded"-->
                <!--                            style="max-height: 70px;"-->
                <!--                        />-->
                <!--                    </td>-->
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-success" href="#" v-on:click.prevent="getId(ad.id); $refs[ref].showModal();">Preview</a>
                    </div>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link
                            :to="{ name: 'edit', params: { id: ad.id } }"
                            class="btn btn-success"
                        >Edit
                        </router-link>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import Modal from './Modal.vue';

export default {
    data() {
        return {
            ads: [],
            ref: Number
        };
    },
    created() {
        this.axios
            .get("http://127.0.0.1:8000/api/ads")
            .then(response => {
                this.ads = response.data;
            })
            .catch(err => console.log(err));
    },
    components: {
        Modal
    },
    methods: {
        getId: function (id) {
            this.ref = id;
        }
    }
};
</script>
