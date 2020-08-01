<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                Daftar Barang
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Status</th>
                        <th scope="col">Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product, index) in products" :key="product.kode">
                            <th scope="row">{{ index+1 }}</th>
                            <td>{{ product.kode }}</td>
                            <td>{{ product.nama }}</td>
                            <td>{{ product.stok }}</td>
                            <td v-if="product.status"><span class="badge badge-success">Tersedia</span></td>
                            <td v-else><span class="badge badge-danger">Tidak tersedia</span></td>
                            <td>{{ product.lokasi.nama }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                products : [],
                // data : {}
            }
        },
        created() {
            let uri = 'api/list-barang';
            this.axios.get(uri).then(response => {
                this.products = response.data;
                // this.data = response;
            });
        },
        methods: {
            nama_lokasi: async function(kode){
                // let uri = 'api/lokasi/'+kode;
                // let result = await this.axios.get(uri).then(response => {
                //     return response.data[0].nama;
                // });
                // return result;
                // console.log(this.data);
            }
        }
    }
</script>
