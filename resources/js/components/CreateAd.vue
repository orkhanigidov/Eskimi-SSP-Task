<template>
    <div class="text-center">
        <h3>Create Ad</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addAd" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="name"
                        />
                    </div>
                    <div class="form-group">
                        <label>Start Date</label>
                        <input
                            type="date"
                            class="form-control"
                            v-model="fromdate"
                        />
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input
                            type="date"
                            class="form-control"
                            v-model="todate"
                        />
                    </div>
                    <div class="form-group">
                        <label>Total Budget</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="totalbudget"
                        />
                    </div>
                    <div class="form-group">
                        <label>Daily Budget</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="dailybudget"
                        />
                    </div>
                    <div class="form-group">
                        <label>Choose file</label>
                        <input
                            type="file"
                            class="form-control"
                            v-on:change="onChange"
                        />
                    </div>
                    <div v-if="imagepreview">
                        <img
                            :src="imagepreview"
                            class="figure-img img-fluid rounded"
                            style="max-height: 100px;"
                        />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: null,
            fromdate: null,
            todate: null,
            totalbudget: null,
            dailybudget: null,
            image: null,
            imagepreview: null
        };
    },
    methods: {
        onChange(event) {
            this.image = event.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = event => {
                this.imagepreview = event.target.result;
            };
        },
        addAd() {
            let data = new FormData();
            data.append("name", this.name);
            data.append("fromdate", this.fromdate);
            data.append("todate", this.todate);
            data.append("totalbudget", this.totalbudget);
            data.append("dailybudget", this.dailybudget);
            data.append("image", this.image);

            this.axios
                .post("http://127.0.0.1:8000/api/ads", data)
                .then(response => {
                    this.$router.push({ name: "home" });
                })
                .catch(err => console.log(err));
        }
    }
};
</script>
