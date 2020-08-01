<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                Detail Permintaan
            </div>
            <div class="card-body">
                <div class="row my-4">
                    <div class="col-md-4">
                        <table class="table">
                            <tr>
                                <td>Nama Karyawan</td>
                                <td>:</td>
                                <td>{{ permintaan.karyawan.nama }}</td>
                            </tr>
                            <tr>
                                <td>Departemen</td>
                                <td>:</td>
                                <td>{{ permintaan.karyawan.departemen }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>{{ permintaan.tanggal }}</td>
                            </tr>
                        </table>
                    </div>

                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(detail, index) in details" :key="detail.kode">
                            <th scope="row">{{ index+1 }}</th>
                            <td>{{ detail.kode_barang }}</td>
                            <td>{{ detail.barang.nama }}</td>
                            <td>{{ detail.sub_qty }}</td>
                            <td>{{ detail.keterangan }}</td>
                        </tr>
                    </tbody>
                </table>
                <router-link :to="{name:'home'}" class="btn btn-outline-secondary">Kembali</router-link>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                details : [],
                permintaan : {},
            }
        },
        created() {
            let uri = `/api/detail/${this.$route.params.id}`;
            let uri_2 = `/api/permintaan/${this.$route.params.id}`;
            this.axios.get(uri).then(response => {
                this.details = response.data;
            });
            this.axios.get(uri_2).then(response => {
                this.permintaan = response.data[0];
            });
        },
        methods: {

        }
    }
</script>
