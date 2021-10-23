<template>
    <div class="modal fade" :ref="id" :id="id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <slot name="header"></slot>
                    </h5>
                    <button type="button" class="close" aria-label="Close" @click.prevent="hideModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot name="body">
                        <label>Name</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="name"
                        />

                        <label>Start Date</label>
                        <input
                            type="date"
                            class="form-control"
                            v-model="fromdate"
                        />

                        <label>End Date</label>
                        <input
                            type="date"
                            class="form-control"
                            v-model="todate"
                        />

                        <label>Total Budget</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="totalbudget"
                        />

                        <label>Daily Budget</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="dailybudget"
                        />

                        <div v-if="imagepreview">
                            <img
                                :src="imagepreview"
                                class="figure-img img-fluid rounded"
                                style="max-height: 100px;"
                            />
                        </div>

                    </slot>
                </div>
                <div class="modal-footer">
                    <slot name="footer"></slot>
                    <button type="button" class="btn btn-secondary" @click.prevent="hideModal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
    props: {
        id: Number
    },
    data() {
        return {
            modal: null,
            name: null,
            fromdate: null,
            todate: null,
            totalbudget: null,
            dailybudget: null,
            imagepreview: null
        }
    },
    mounted() {
        this.modal = new bootstrap.Modal(this.$refs[this.id]);
    },
    methods: {
        getModal() {
            this.axios
                .get(`http://127.0.0.1:8000/api/ads/${this.id}}}`)
                .then(response => {
                    this.name = response.data.name;
                    this.fromdate = response.data.fromdate;
                    this.todate = response.data.todate;
                    this.totalbudget = response.data.totalbudget;
                    this.dailybudget = response.data.dailybudget;
                    this.imagepreview = response.data.image;
                })
                .catch(err => console.log(err));
        },
        showModal() {
            this.getModal();
            this.modal.show();
        },
        hideModal() {
            this.modal.hide();
        }
    }
}
</script>
